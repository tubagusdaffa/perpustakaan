<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function countBuku() {
    return $this->db->count_all('buku');
  }

  public function countAnggota() {
    return $this->db->count_all('anggota');
  }

  public function countPeminjaman() {
    return $this->db->count_all('peminjaman');
  }
}
