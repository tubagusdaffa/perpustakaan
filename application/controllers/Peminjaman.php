<?php
class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Peminjaman_model');
    }

    public function index()
    {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Peminjaman';
        $data['buku'] = $this->Peminjaman_model->get_buku();
        $data['anggota'] = $this->Peminjaman_model->get_anggota();

        if ($this->input->post()) {
            $input = [
                'id_buku' => $this->input->post('id_buku'),
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => $this->input->post('status') ?: 'Dipinjam' // default kalau kosong
            ];

            $this->Peminjaman_model->insert($input);
            redirect('peminjaman');
        }

        $this->load->view('template/header', $data);
        $this->load->view('peminjaman/form', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->get_by_id($id);
        $data['buku'] = $this->Peminjaman_model->get_buku();
        $data['anggota'] = $this->Peminjaman_model->get_anggota();

        if ($this->input->post()) {
            $input = [
                'id_buku' => $this->input->post('id_buku'),
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => $this->input->post('status')
            ];

            $this->Peminjaman_model->update($id, $input);
            redirect('peminjaman');
        }

        $this->load->view('template/header', $data);
        $this->load->view('peminjaman/form', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Peminjaman_model->delete($id);
        redirect('peminjaman');
    }
}
