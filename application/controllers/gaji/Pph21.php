<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pph21 extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model(array(
      'pph_model' => 'pph',
      'Karyawan_model' => 'karyawan'
    ));
  }

  public function index()
  {
    $data['title'] = 'Iuran PPH 21';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pph'] = $this->pph->get_all()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('pph/pph21', $data);
  }
}