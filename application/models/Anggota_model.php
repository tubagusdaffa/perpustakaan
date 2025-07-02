<?php
class Anggota_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('anggota')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('anggota', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('anggota', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('anggota', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('anggota');
    }
}
