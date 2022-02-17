<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_model
{
  public function get_all()
  {
    $this->db->where('aktif', 1);
    $query =  $this->db->get('tb_karyawan');
    return $query;
  }

  function cari_karyawan($karyawan)
  {
    $this->db->where('aktif', 1);
    $this->db->like('nama_karyawan', $karyawan, 'both');
    $this->db->order_by('nama_karyawan', 'ASC');
    $this->db->limit(5);
    return $this->db->get('tb_karyawan')->result();
  }

  public function get_json()
  {
    $id = $this->input->get('idKry');
    $this->db->select('g.gaji_pokok,g.tunjangan,g.um');
    $this->db->from('tb_gaji g');
    $this->db->join('tb_karyawan k', 'k.id_karyawan=g.id_kry', 'right');
    $this->db->where('k.id_karyawan', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
}
