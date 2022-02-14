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

  function cari_sales($sales)
  {
    $this->db->like('nama_sales', $sales, 'both');
    $this->db->order_by('nama_sales', 'ASC');
    $this->db->where('is_active', 1);
    $this->db->limit(10);
    return $this->db->get('sales')->result();
  }

  public function get()
  {
    $idSales = $this->input->get('idSales');
    $this->db->where('id', $idSales);
    $query = $this->db->get('sales');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function simpan($kode, $nama)
  {
    $data = array(
      'kode_sales' => $kode,
      'nama_sales' => $nama,
      'foto' => 'no-profile.jpg',
      'is_active' => 1
    );
    $this->db->insert('sales', $data);
  }

  public function ubah($id, $nama)
  {
    $data = array(
      'nama_sales' => $nama
    );
    $this->db->where('id', $id);
    $this->db->update('sales', $data);
  }

  public function hapus($id)
  {
    $data = array(
      'is_active' => 2
    );
    $this->db->where('id', $id);
    $this->db->update('sales', $data);
  }
}
