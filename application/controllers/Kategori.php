
<?php
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
          // Cek apakah user sudah login
  if (!$this->session->userdata('logged_in')) {
    redirect('auth/login');
  }
    // Cek apakah user adalah admin
 if ($this->session->userdata('role') !== 'Admin') {
        redirect('dashboard');
        }

        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        if ($this->input->post()) {
            $this->Kategori_model->insert([
                'nama' => $this->input->post('nama')
            ]);
            redirect('kategori');
        }
        $this->load->view('template/header', $data);
        $this->load->view('kategori/form', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        if ($this->input->post()) {
            $this->Kategori_model->update($id, [
                'nama' => $this->input->post('nama')
            ]);
            redirect('kategori');
        }
        $this->load->view('template/header', $data);
        $this->load->view('kategori/form', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
}
