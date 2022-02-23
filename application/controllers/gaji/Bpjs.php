<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpjs extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model(array(
      'Bpjs_model' => 'bpjs',
      'Karyawan_model' => 'karyawan'
    ));
  }

  public function index()
  {
    $data['title'] = 'Iuran BPJS';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['bpjs'] = $this->bpjs->get_bpjs()->result_array();
    // $data['detil'] = $this->gaji->get_detil_gaji()->result_array();
    // $data['kode'] = $this->gaji->kode_gajian();
    // $data['list_gaji'] = $this->gaji->get_list()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('bpjs/index', $data);
  }

  public function form_bpjs()
  {
    $data['title'] = 'Form BPJS';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['karyawan'] = $this->karyawan->get_all()->result_array();
    // $data['detil'] = $this->gaji->get_detil_gaji()->result_array();
    // $data['kode'] = $this->gaji->kode_gajian();
    // $data['list_gaji'] = $this->gaji->get_list()->result_array();
    $this->load->view('template/header_m', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('bpjs/form_bpjs', $data);
  }

  public function kode()
  {
    $cek = $this->db->get_where('tb_bpjs', ['status' => 'pending']);
    if ($cek->num_rows() <> 0) {
      $data['kode'] = $this->bpjs->get_kode();
      $msg['success'] = false;
      $msg['type'] = 'ada';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    } else {
      $data['kode'] = $this->bpjs->kode();
      $msg['success'] = false;
      $msg['type'] = 'blm';
      if ($data) {
        $msg['success'] = true;
        echo json_encode([$data, $msg]);
      }
    }
  }

  public function get_total()
  {
    $kode = $this->input->get('kode');
    $data = $this->bpjs->get_total($kode);
    echo json_encode($data);
  }


  public function list_iuran()
  {
    $kode = $this->input->get('kode');
    $data = $this->bpjs->list_iuran($kode);
    echo json_encode($data);
  }

  public function get_detil()
  {
    $id = $this->input->get('id');
    $data = $this->bpjs->get_detil($id);
    echo json_encode($data);
  }

  public function cek_karyawan()
  {
    $id_kry = $this->input->get('idKry');
    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');
    $cek = $this->db->get_where('detil_bpjs', ['id_kry_bpjs' => $id_kry, 'bulan' => $bulan, 'tahun' => $tahun]);
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



  public function input_iuran()
  {
    $kode = $this->input->post('kode_iuran_bpjs');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $bulan_hide = $this->input->post('bulan_hide');
    $tahun_hide = $this->input->post('tahun_hide');
    $ket = $this->input->post('ket_bpjs');
    $id_kry = $this->input->post('id_kry');
    $bpjs_ks = str_replace('.', '', $this->input->post('bpjs_ks'));
    $bpjs_ktk = str_replace('.', '', $this->input->post('bpjs_ktk'));
    $total = str_replace('.', '', $this->input->post('total'));
    $id_user = $this->input->post('id_user');
    $cek = $this->db->get_where('tb_bpjs', ['kode_bpjs' => $kode]);
    if ($cek->num_rows() <> 0) {
      $this->bpjs->simpan_detil_bpjs2($kode, $bulan_hide, $tahun_hide, $id_kry, $bpjs_ks, $bpjs_ktk, $id_user);
      redirect('gaji/bpjs/form_bpjs');
    } else {
      $this->bpjs->simpan_tb($kode, $bulan, $tahun, $ket, $id_user);
      $this->bpjs->simpan_detil_bpjs($kode, $bulan, $tahun, $id_kry, $bpjs_ks, $bpjs_ktk, $id_user);
      redirect('gaji/bpjs/form_bpjs');
    }
  }

  public function update_detil()
  {
    $id = $this->input->post('id_detil');
    $bpjs_ks = str_replace('.', '', $this->input->post('bpjs_ks'));
    $bpjs_ktk = str_replace('.', '', $this->input->post('bpjs_ktk'));
    $id_user = $this->input->post('id_user');
    $this->bpjs->update_detil($id, $bpjs_ks, $bpjs_ktk, $id_user);
    redirect('gaji/bpjs/form_bpjs');
  }


  public function selesai_keluar()
  {
    $id =  $this->input->post('id');
    $jml_org = $this->input->post('jml_org');
    $sb_iuran = $this->input->post('sb_iuran');
    $id_usr = $this->input->post('id_usr');
    $result = $this->bpjs->selesai_keluar($id, $jml_org, $sb_iuran, $id_usr);
    $msg['success'] = false;
    if ($result) {
      $msg['type'] = 'simpan';
      $msg['success'] = true;
      echo json_encode([$msg]);
    } else {
      $msg['type'] = 'error';
      $msg['success'] = true;
      echo json_encode([$msg]);
    }
  }

  public function selesai_detil()
  {
    $idDetil = $_POST['idDetil'];
    $result = array();
    foreach ($idDetil as $key => $value) {
      $result[] = array(
        'id_detil_bpjs' => $idDetil[$key],
        // 'date_update' => time(),
        'status' => 'selesai'
      );
    }
    $this->db->update_batch('detil_bpjs', $result, 'id_detil_bpjs');
  }

  public function hapus_detil()
  {
    $id = $this->input->post('idHapus');
    $this->db->where('id_detil_bpjs', $id);
    $this->db->delete('detil_bpjs');
    redirect('gaji/bpjs/form_bpjs');
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

  public function kode_pending()
  {
    $data['kode_pending'] = $this->gaji->get_kode_pending();
    echo json_encode($data);
  }


  public function tampil_copy()
  {
    $data = $this->bpjs->get_bpjs()->result();
    echo json_encode($data);
  }

  public function copy_detil()
  {
    $kode = $_POST['kd'];
    $id_user = $_POST['id_user_copy'];
    $bulan = $_POST['bulan_copy'];
    $tahun = $_POST['tahun_copy'];
    $ket = $_POST['ket_bpjs_copy'];
    $id_kry = $_POST['id_kry_copy'];
    $ks = $_POST['ks'];
    $ktk = $_POST['ktk'];
    $result = array();
    foreach ($id_kry as $key => $value) {
      $result[] = array(
        'kode_iuran_bpjs' => $kode,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'id_kry_bpjs' => $id_kry[$key],
        'bpjs_kesehatan' => $ks[$key],
        'bpjs_ktk' => $ktk[$key],
        'id_usr' => $id_user,
        'date_update' => time()
      );
    }
    $this->bpjs->simpan_tb($kode, $bulan, $tahun, $ket, $id_user);
    $this->db->insert_batch('detil_bpjs', $result);
    redirect('gaji/bpjs/form_bpjs');
  }
}
