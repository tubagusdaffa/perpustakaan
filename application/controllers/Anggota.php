<?php
class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
          // Cek apakah user sudah login
  if (!$this->session->userdata('logged_in')) {
    redirect('auth/login');
  }

        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data['title'] = 'Data Anggota';
        $data['anggota'] = $this->Anggota_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Anggota';
        if ($this->input->post()) {
            $input = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->Anggota_model->insert($input);
            redirect('anggota');
        }

        $this->load->view('template/header', $data);
        $this->load->view('anggota/form', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Anggota';
        $data['anggota'] = $this->Anggota_model->get_by_id($id);
        if ($this->input->post()) {
            $input = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->Anggota_model->update($id, $input);
            redirect('anggota');
        }

        $this->load->view('template/header', $data);
        $this->load->view('anggota/form', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Anggota_model->delete($id);
        redirect('anggota');
    }
}
