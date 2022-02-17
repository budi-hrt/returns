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






  public function simpan_detil()
  {
    $kode = $_POST['kode'];;
    $id_user = $_POST['id_user'];
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $ket_gaji = $this->input->post('ket_gaji');
    $id_kry = $_POST['id_karyawan'];
    $t_gp = $_POST['gp'];
    $t_tj = $_POST['tj'];
    $t_um = $_POST['um'];
    $cek = $this->db->get_where('tb_gajian', ['bulan' => $bulan, 'tahun' => $tahun]);
    if ($cek->num_rows() > 0) {
      redirect('gaji/management_gaji');
      $this->session->set_flashdata('message', 'kode');
    } else {

      $result = array();
      foreach ($id_kry as $key => $value) {
        $result[] = array(
          'kode_gaji' => $kode,
          'id_kryn' => $id_kry[$key],
          'terima_gp' => $t_gp[$key],
          'terima_tj' => $t_tj[$key],
          'terima_um' => $t_um[$key],
          'id_usr' => $id_user,
          'date_update' => time()
        );
      }


      $this->db->insert_batch('detil_gajian', $result);
      $this->gaji->simpan_gajian($kode, $bulan, $tahun, $ket_gaji, $id_user);
      redirect('gaji/management_gaji');
      $this->session->set_flashdata('message', 'kode');
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

  public function kode_pending()
  {
    $data['kode_pending'] = $this->gaji->get_kode_pending();
    echo json_encode($data);
  }
}
