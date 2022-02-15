<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_gaji extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model(array(
      'Gaji_model' => 'gaji',
      'Karyawan_model' => 'karyawan'
    ));
  }

  public function index()
  {
    $data['title'] = 'Kelola Gaji';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['gajian'] = $this->gaji->get_gajian()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/management_gaji', $data);
  }

  public function form_gajian() {
    $data['title'] = 'Form Gaji';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['gajian'] = $this->gaji->get_gajian()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/form_gaji', $data);
  }

public function detil_gajian() {
  $data['title'] = 'Detil Gajian';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['gajian'] = $this->gaji->get_gajian()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/detil_gajian', $data);
}


}
