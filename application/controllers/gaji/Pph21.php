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
  public function cek_pending()
  {
    $cek = $this->db->get_where('tb_pph21', ['status' => 'pending']);
    if ($cek->num_rows() <> 0) {
      $msg['success'] = false;
      $msg['type'] = 'ada';
      $msg['success'] = true;
      echo json_encode([$msg]);
    } else {
      $msg['success'] = false;
      $msg['type'] = 'blm';
      $msg['success'] = true;
      echo json_encode([$msg]);
    }
  }

  public function form_pph21()
  {
    $data['title'] = 'Form PPh 21';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $data['status_ptkp'] = $this->pph->get_ptkp()->result_array();
    $data['ptkp'] = $this->db->get_where('tb_ptkp', ['aktif' => 'aktif'])->row_array();
    $this->load->view('template/header_m', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('pph/form-pph21', $data);
  }

  public function kode()
  {
    $cek = $this->db->get_where('tb_pph21', ['status' => 'pending']);
    if ($cek->num_rows() <> 0) {
      $data['kode'] = $this->pph->get_kode();
      $msg['success'] = false;
      $msg['type'] = 'ada';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    } else {
      $data['kode'] = $this->pph->kode();
      $msg['success'] = false;
      $msg['type'] = 'blm';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    }
  }


  public function cek_karyawan()
  {
    $id_kry = $this->input->get('idKry');
    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');
    $cek = $this->db->get_where('detil_pph21', ['id_kry_pph21' => $id_kry, 'bulan' => $bulan, 'tahun' => $tahun]);
    if ($cek->num_rows() <> 0) {
      $msg['success'] = false;
      $msg['type'] = 'ada';
      $msg['success'] = true;
      echo json_encode([$msg]);
    } else {
      $msg['success'] = false;
      $msg['type'] = 'blm';
      $msg['success'] = true;
      echo json_encode([$msg]);
    }
  }
}
