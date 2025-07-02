<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function getByUsername($username) {
    return $this->db->get_where('users', ['username' => $username])->row();
  }

  public function insert($data) {
    return $this->db->insert('users', $data);
  }

  public function getUserRole($user_id) {
    $this->db->select('roles.nama'); // Pastikan kolom ini sesuai dengan isi tabel roles
    $this->db->from('user_role');
    $this->db->join('roles', 'roles.id = user_role.id_role');
    $this->db->where('user_role.id_user', $user_id);
    $query = $this->db->get()->row();

    return $query ? $query->nama : null;
  }

  public function getAllRoles() {
    return $this->db->get('roles')->result();
  }
}
