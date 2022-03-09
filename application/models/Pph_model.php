<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pph_model extends CI_model
{
  public function get_all()
  {

    $query =  $this->db->get('tb_pph21');
    return $query;
  }

  public function kode()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(kode_iuran,3)) AS kd_max FROM tb_pph21");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int) $k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "001";
    }
    $car = "PAJAK-PPH21";

    return $car . "/" . $kd;
  }


  public function get_kode()
  {
    $this->db->select('*');
    $this->db->where('status', 'pending');
    $this->db->limit(1);
    $query = $this->db->get('tb_pph21');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
}