<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extras extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }



    // icon
    public function index()
    {
        $data['title'] = 'Simple Line Icons';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('extras/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function tes()
    {
        $this->load->view('extras/tes');
    }
}
