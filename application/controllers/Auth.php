<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function login() {
    if ($this->input->post()) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $this->User_model->getByUsername($username);

      if ($user && password_verify($password, $user->password)) {
        // Ambil role user
        $role = $this->User_model->getUserRole($user->id);

        // Set session
        $this->session->set_userdata([
          'user_id'  => $user->id,
          'username' => $user->username,
          'role'     => $role,
          'logged_in'=> true
        ]);

        redirect('dashboard');
      } else {
        $this->session->set_flashdata('error', 'Username atau Password salah!');
        redirect('auth/login');
      }
    }

    $this->load->view('auth/login');
  }
  
public function register() {
  if ($this->input->post()) {
    $data = [
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    ];

    // Simpan user
    $this->db->insert('users', $data);
    $user_id = $this->db->insert_id();

    // Simpan role ke user_role
    $role_id = $this->input->post('role_id');
    $this->db->insert('user_role', [
      'id_user' => $user_id,
      'id_role' => $role_id
    ]);

    $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login.');
    redirect('auth/login');
  }

  $this->load->view('auth/register');
}


  public function logout() {
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}
