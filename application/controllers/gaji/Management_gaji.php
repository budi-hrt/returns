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
    $data['title'] = 'Management Gaji';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header_m', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/management_gaji', $data);
  }

  public function kode()
  {
    $cek = $this->db->get_where('tb_gaji', ['status' => 'pending']);
    if ($cek->num_rows() <> 0) {
      $data['kode'] = $this->gaji->get_kode();
      $msg['success'] = false;
      $msg['type'] = 'ada';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    } else {
      $data['kode'] = $this->gaji->kode_gajian();
      $msg['success'] = false;
      $msg['type'] = 'blm';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    }
  }







  public function simpan_detil()
  {
    $kode = $_POST['kode'];
    $id_user = $_POST['id_user'];
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $ket_gaji = $this->input->post('ket');
    $id_kry = $_POST['id'];
    $mengetahui = $_POST['mengetahui'];
    // $t_tj = $_POST['tj'];
    // $t_um = $_POST['um'];
    $msg['success'] = false;
    $cek = $this->db->get_where('tb_gaji', ['bulan' => $bulan, 'tahun' => $tahun]);
    if ($cek->num_rows() > 0) {
      $msg['type'] = 'ada';
      $msg['success'] = true;
      echo json_encode($msg);
    } else {

      $result = array();
      foreach ($id_kry as $key => $value) {
        $result[] = array(
          'kode_gaji' => $kode,
          'id_kryn' => $id_kry[$key],
          'bulan' => $bulan,
          'tahun' => $tahun,
          'id_usr' => $id_user,
          'date_update' => time()
        );
      }


      $this->db->insert_batch('detil_gajian', $result);
      $this->gaji->simpan_gajian($kode, $bulan, $tahun, $ket_gaji, $mengetahui, $id_user);
      $msg['type'] = 'simpan';
      $msg['success'] = true;
      echo json_encode($msg);
    }
  }
  public function get_detil()
  {
    $kode = $this->input->get('kode');
    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');
    $cek = $this->db->get_where('detil_gajian', ['kode_gaji' => $kode, 'bulan' => $bulan, 'tahun' => $tahun]);
    if ($cek->num_rows() > 0) {
      $data = $this->gaji->get_detil($kode);
      echo json_encode($data);
    } else {
      $data = "kosong";
      echo json_encode($data);
    }
  }




  public function form_gajian()
  {
    $data['title'] = 'Form Gaji';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['gajian'] = $this->gaji->get_all()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/form_gaji', $data);
  }

  public function detil_gajian()
  {
    $data['title'] = 'Detil Gajian';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['gajian'] = $this->gaji->get_gajian()->result_array();
    // $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/detil_gajian', $data);
  }
}
