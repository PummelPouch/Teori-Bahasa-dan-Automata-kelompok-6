<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['jurnal'] = $this->db->query("SELECT a.ids,a.id,a.keterangan,a.tanggal,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.ids = b.id_jurnal order by a.tanggal asc")->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/laporan/laporan',$data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $type = $this->input->get('p');
        $tgl_awal = $this->input->get('tglawal');
        $tgl_akhir = $this->input->get('tglakhir');
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($type = 'excel') {
            if ($tgl_akhir == null && $tgl_awal == null) {
                $saldo_awal = "SELECT a.ids,a.id,a.keterangan,a.tanggal,kredit,debit FROM jurnal a
                LEFT JOIN jurnal_detail b on a.ids = b.id_jurnal where date(tanggal) < '$tgl_awal' order by a.tanggal asc";

                $query = "SELECT a.ids,a.id,a.keterangan,a.tanggal,kredit,debit FROM jurnal a 
               LEFT JOIN jurnal_detail b on a.ids = b.id_jurnal  order by a.tanggal asc";
            } else {
                $saldo_awal = "SELECT a.ids,a.id,a.keterangan,a.tanggal,kredit,debit FROM jurnal a
                LEFT JOIN jurnal_detail b on a.ids = b.id_jurnal where date(tanggal) < '$tgl_awal' order by a.tanggal asc";

                $query = "SELECT a.ids,a.id,a.keterangan,a.tanggal,kredit,debit FROM jurnal a 
               LEFT JOIN jurnal_detail b on a.ids = b.id_jurnal where date(tanggal)  between '$tgl_awal' and '$tgl_akhir'  order by a.tanggal asc";
            }

            $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();
            $data['jurnal'] = $this->db->query($query)->result_array();

            $this->session->set_flashdata('tglawal', $tgl_awal);
            $this->session->set_flashdata('tglakhir', $tgl_akhir);

            $this->load->view('cetak/excel', $data);
        } else {
            
        }}}