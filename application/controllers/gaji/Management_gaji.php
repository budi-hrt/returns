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
    // $data['detil'] = $this->gaji->get_detil_gaji()->result_array();
    $data['gaji'] = $this->gaji->get_all()->result_array();
    $data['kode'] = $this->gaji->kode_gajian();
    $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('gaji/management_gaji', $data);
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

      $data = array();
      $index = 0; // Set index array awal dengan 0
      foreach ($id_kry as $id) { // Kita buat perulangan berdasarkan nis sampai data terakhir
        array_push($data, array(
          'kode_gaji' => $kode,
          'id_kryn' => $id,
          'terima_gp' => $t_gp,
          'terima_tj' => $t_tj,
          'terima_um' => $t_um,
          'id_usr' => $id_user,
          'date_update' => time()
        ));

        $index++;
      }
      $this->db->insert_batch('detil_gajian', $data);
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
}
