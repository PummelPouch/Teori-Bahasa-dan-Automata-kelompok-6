<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Masuk_model');
    }

    public function index()
    {
        $recMasuk = $this->Masuk_model->getDataMasuk();
        $data1 = array('data_msk' => $recMasuk);
        $data['jumlah']  = $this->Masuk_model->sumMasuk();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/masuk/masuk',$data1);
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
            'tipe' => masuk,
        );
        
        $this->Masuk_model->InsertDataMsk($datainsert);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Has Been Added!</div>');
        redirect(base_url('masuk'));

    }

    public function DeleteData($val)
    {
        $this->Masuk_model->DeleteDataMsk($val);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Has Been Deleted!</div>');
        redirect(base_url('masuk'));
    }

    public function editmasuk($id)
    {
        $recordMsk = $this->Masuk_model->getDataMasukDetail($id);
        $dataedit = array('data_msk' =>$recordMsk);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/masuk/editmasuk', $dataedit);
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
        'tipe' => masuk,
        );

        $this->Masuk_model->EditDataMsk($DataUpdate, $id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Has Been Edited!</div>');
        redirect(base_url('masuk'));
    }

}?>