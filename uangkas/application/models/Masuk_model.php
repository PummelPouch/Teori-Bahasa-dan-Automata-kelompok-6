<?php 
defined('BASEPATH') OR exit('NO direct script access allowed');

class Masuk_model extends CI_Model 
{
    public function getDataMasuk()
    {
        $this->db->select('*');
        $this->db->from('kas');
        $where = "tipe='masuk'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getMasukById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function countMasuk()
    {
        $sql = "Select count(id) as total from kas where tipe='masuk'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }
    public function sumMasuk()
    {
        $sql = "Select sum(jumlah) as total from kas where tipe='masuk'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function InsertDataMsk($data)
    {
        $this->db->insert('kas', $data);
    }

    public function DeleteDataMsk($val)
    {
        $this->db->where('id',$val);
        $this->db->delete('kas');
    }

    public function EditDataMsk($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('kas', $data);
    }

    public function getDataMasukDetail($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('kas');
        return $query->row();
    }

}