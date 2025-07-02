<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!is_logged_in()) {
      redirect('auth/login');
    }

    $this->load->model('Dashboard_model');
  }

  public function index() {
    $data['title'] = 'Dashboard';

    // Ambil jumlah data dari model
    $data['total_buku'] = $this->Dashboard_model->countBuku();
    $data['total_anggota'] = $this->Dashboard_model->countAnggota();
    $data['total_peminjaman'] = $this->Dashboard_model->countPeminjaman();

    $this->load->view('template/header', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('template/footer');
  }
}
