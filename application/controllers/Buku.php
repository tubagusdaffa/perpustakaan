<?php
class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Buku_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $data['buku'] = $this->Buku_model->search($keyword);
        } else {
            $data['buku'] = $this->Buku_model->get_all();
        }

        $data['title'] = 'Data Buku';
        $this->load->view('template/header', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Buku';
        $data['kategori'] = $this->Buku_model->get_kategori();

        if ($this->input->post()) {
            $input = [
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'id_kategori' => $this->input->post('id_kategori')
            ];
            $this->Buku_model->insert($input);
            redirect('buku');
        }

        $this->load->view('template/header', $data);
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Buku';
        $data['buku'] = $this->Buku_model->get_by_id($id);
        $data['kategori'] = $this->Buku_model->get_kategori();

        if ($this->input->post()) {
            $input = [
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'id_kategori' => $this->input->post('id_kategori')
            ];
            $this->Buku_model->update($id, $input);
            redirect('buku');
        }

        $this->load->view('template/header', $data);
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Buku_model->delete($id);
        redirect('buku');
    }
}
