<?php 
defined('BASEPATH') OR exit('NO direct script access allowed');

class Keluar_model extends CI_Model 
{
    public function getDataKeluar()
    {
        $this->db->select('*');
        $this->db->from('keluar');
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
        $sql = "Select count(id) as total from keluar";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }
    public function sumKeluar()
    {
        $sql = "Select sum(jumlah) as total from keluar";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function InsertDataKlr($data)
    {
        $this->db->insert('keluar', $data);
    }

    public function DeleteDataKlr($val)
    {
        $this->db->where('id',$val);
        $this->db->delete('keluar');
    }

    public function EditDataKlr($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('keluar', $data);
    }

    public function getDataKeluarDetail($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('keluar');
        return $query->row();
    }
}