<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_model extends CI_model
{
  public function get_all()
  {
    $this->db->select('g.id_gaji,g.gaji_pokok,g.tunjangan,g.um,g.id_kry,k.nama_karyawan,k.jabatan_karyawan,u.name,g.date_update');
    $this->db->from('tb_karyawan k');
    $this->db->join('tb_gaji g', 'g.id_kry=k.id_karyawan', 'dsc');
    $this->db->join('user u', 'u.id=g.id_user', 'dsc');
    $this->db->order_by('k.nama_karyawan', 'asc');
    $this->db->where('k.aktif', 1);
    $query =  $this->db->get();
    return $query;
  }




  public function simpan($idKry, $gp, $tj, $um)
  {
    $data = array(
      'id_kry' => $idKry,
      'gaji_pokok' => $gp,
      'tunjangan' => $tj,
      'um' => $um,
      'date_update' => time(),
      'id_user' => $this->input->post("id_user")
    );
    $this->db->insert('tb_gaji', $data);
  }


  public function ubah($id, $idKry, $gp, $tj, $um)
  {
    $data = array(
      'id_kry' => $idKry,
      'gaji_pokok' => $gp,
      'tunjangan' => $tj,
      'um' => $um,
      'date_update' => time(),
      'id_user' => $this->input->post("id_user")
    );
    $this->db->where('id_gaji', $id);
    $this->db->update('tb_gaji', $data);
  }



  // GAJIAN=========
  public function get_gajian()
  {
    $query = $this->db->get('tb_gajian');
    return $query;
  }

  public function form_gajian() {
    
  }
  
}
