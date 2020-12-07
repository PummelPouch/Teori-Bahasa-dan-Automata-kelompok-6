<?php 
defined('BASEPATH') OR exit('NO direct script access allowed');

class Keluar_model extends CI_Model 
{
    public function getDataKeluar()
    {
        $this->db->select('*');
        $this->db->from('kas');
        $where = "tipe='keluar'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getKeluarById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function countKeluar()
    {
        $sql = "Select count(id) as total from kas where tipe='keluar'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }
    public function sumKeluar()
    {
        $sql = "Select sum(jumlah) as total from kas where tipe='keluar'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function InsertDataKlr($data)
    {
        $this->db->insert('kas', $data);
    }

    public function DeleteDataKlr($val)
    {
        $this->db->where('id',$val);
        $this->db->delete('kas');
    }

    public function EditDataKlr($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('kas', $data);
    }

    public function getDataKeluarDetail($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('kas');
        return $query->row();
    }
}