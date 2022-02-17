<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Karyawan_model', 'karyawan');
  }


  function get_autocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->karyawan->cari_karyawan($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = array(
            'label' => $row->nama_karyawan,
            'description'    => $row->id_karyawan,
          );
        echo json_encode($arr_result);
      }
    }
  }

  public function get_json()
  {

    $data = $this->karyawan->get_json();
    echo json_encode($data);
  }
}
