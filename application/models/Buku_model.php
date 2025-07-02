<?php
class Buku_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama AS nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id', 'left');
        return $this->db->get()->result();
    }

    public function search($keyword)
    {
        $this->db->select('buku.*, kategori.nama AS nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id', 'left');
        $this->db->group_start();
            $this->db->like('buku.judul', $keyword);
            $this->db->or_like('buku.penulis', $keyword);
            $this->db->or_like('buku.penerbit', $keyword);
            $this->db->or_like('kategori.nama', $keyword);
        $this->db->group_end();
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('buku.*, kategori.nama AS nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id', 'left');
        $this->db->where('buku.id', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('buku', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('buku', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('buku');
    }

    public function get_kategori()
    {
        return $this->db->get('kategori')->result();
    }
}
