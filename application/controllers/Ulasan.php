<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Set timezone ke WIB
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Ulasan_model');
        $this->load->model('Buku_model');
    }

    // Tampilkan form ulasan
    public function form($id_buku)
    {
        $data['title'] = 'Tulis Ulasan Buku';
        $data['buku'] = $this->Buku_model->get_by_id($id_buku);

        $this->load->view('template/header', $data);
        $this->load->view('ulasan/form', $data);
        $this->load->view('template/footer');
    }

    // Proses simpan ulasan
    public function simpan()
    {
        if ($this->input->post()) {
            $id_buku = $this->input->post('id_buku');
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $jurusan = $this->input->post('jurusan');
            $rating = $this->input->post('rating');
            $komentar = $this->input->post('komentar');

            $data = [
                'id_buku' => $id_buku,
                'nama' => $nama,
                'nim' => $nim,
                'jurusan' => $jurusan,
                'rating' => $rating,
                'komentar' => $komentar,
                'tanggal' => date('Y-m-d H:i:s')
            ];

            $this->Ulasan_model->insert($data);

            $this->session->set_flashdata('success', 'Ulasan berhasil disimpan!');
            redirect('ulasan/index/'.$id_buku);
        } else {
            redirect('buku');
        }
    }

    // Tampilkan semua ulasan untuk 1 buku
    public function index($id_buku)
    {
        $data['title'] = 'Ulasan Buku';
        $data['buku'] = $this->Buku_model->get_by_id($id_buku);
        $data['ulasan'] = $this->Ulasan_model->get_by_buku($id_buku);

        $this->load->view('template/header', $data);
        $this->load->view('ulasan/index', $data);
        $this->load->view('template/footer');
    }
}
