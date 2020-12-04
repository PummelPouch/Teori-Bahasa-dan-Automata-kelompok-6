<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keluar_model');
    }

    public function index()
    {
        $recKeluar = $this->Keluar_model->getDataKeluar();
        $data1 = array('data_klr' => $recKeluar);
        $data['jumlah']  = $this->Keluar_model->sumKeluar();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/keluar/keluar',$data1);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');

        $datainsert = array (
        'keterangan' => $keterangan,
        'tanggal' => $tanggal,
        'jumlah' => $jumlah,
        'tipe' => keluar,
        );

        $this->Keluar_model->InsertDataKlr($datainsert);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Has Been Added!</div>');
        redirect(base_url('keluar'));
    }

    public function DeleteData($val)
    {
        $this->Keluar_model->DeleteDataKlr($val);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Has Been Deleted!</div>');
        redirect(base_url('keluar'));
    }

    public function editkeluar($id)
    {
        $recordKlr = $this->Keluar_model->getDataKeluarDetail($id);
        $dataedit = array('data_klr' =>$recordKlr);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/keluar/editkeluar', $dataedit);
        $this->load->view('templates/footer');
    }

    public function EditAction()
    {
        $id = $this->input->post('id');
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');

        $DataUpdate = array (
        'keterangan' => $keterangan,
        'tanggal' => $tanggal,
        'jumlah' => $jumlah,
        'tipe' => keluar,
        );

        $this->Keluar_model->EditDataKlr($DataUpdate, $id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Has Been Edited!</div>');
        redirect(base_url('keluar'));
    }
}?>