<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Masuk_model');
        $this->load->model('Keluar_model');
    }

    public function index()
    {
        $data['countMsk'] = $this->Masuk_model->countMasuk();
        $data['countKlr'] = $this->Keluar_model->countKeluar();
        $data['sumMsk'] = $this->Masuk_model->sumMasuk();
        $data['sumKlr'] = $this->Keluar_model->sumKeluar();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/dashboard/index',$data);
        $this->load->view('templates/footer');
    }

    
}?>