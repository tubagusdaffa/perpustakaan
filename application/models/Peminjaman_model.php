<?php
class Peminjaman_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('peminjaman.*, buku.judul, anggota.nama, peminjaman.status');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('peminjaman', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('peminjaman', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('peminjaman', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('peminjaman');
    }

    public function get_buku()
    {
        return $this->db->get('buku')->result();
    }

    public function get_anggota()
    {
        return $this->db->get('anggota')->result();
    }
}
