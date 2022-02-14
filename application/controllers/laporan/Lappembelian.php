<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lappembelian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('terbilang');
        $this->load->model('po_model', 'po');
    }

    public function index()
    {
        $data['title'] = 'List PO';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['po'] = $this->db->get('tb_po')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/list-po', $data);
    }
}
