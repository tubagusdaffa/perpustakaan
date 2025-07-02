<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('ulasan', $data);
    }

    public function get_all()
    {
        $this->db->select('ulasan.*, buku.judul');
        $this->db->from('ulasan');
        $this->db->join('buku', 'ulasan.id_buku = buku.id', 'left');
        $this->db->order_by('ulasan.tanggal', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_buku($id_buku)
    {
        return $this->db->get_where('ulasan', ['id_buku' => $id_buku])->result();
    }
}
