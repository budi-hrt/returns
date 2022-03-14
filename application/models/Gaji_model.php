<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_model extends CI_model
{
  public function get_all()
  {
    $this->db->select('g.id_gaji,g.kode_gaji,g.bulan,g.tahun,g.jumlah_kry,g.total_upah,g.status,u.name,g.date_update');
    $this->db->from('tb_gaji g');
    $this->db->join('user u', 'u.id=g.id_user', 'dsc');
    $this->db->order_by('g.id_gaji', 'desc');
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



  // GAJIAN========= gaji/sdpa/0001

  public function kode_gajian()
  {

    $q = $this->db->query("SELECT MAX(RIGHT(kode_gaji,3)) AS kd_max FROM tb_gaji");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int) $k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "001";
    }
    $car = "UPH";

    return $car . "-" . $kd;
  }

  public function get_detil($kode, $bulan, $tahun)
  {
    $this->db->select('d.id_gajian,d.kode_gaji,d.terima_gp,d.terima_tj,d.terima_um,d.status,d.id_usr,d.date_update,d.id_kryn ,k.nama_karyawan, u.name,d.pot_pph21,d.pot_pinjaman,d.pot_absensi,d.pot_lain,b.bpjs_kesehatan,b.bpjs_ktk');
    $this->db->from('detil_gajian d');
    $this->db->join('tb_karyawan k', 'k.id_karyawan=d.id_kryn', 'left');
    $this->db->join('detil_bpjs b', 'b.id_kry_bpjs=d.id_kryn', 'left');
    $this->db->join('user u', 'u.id=d.id_usr');
    $this->db->where('d.kode_gaji', $kode);
    $this->db->where('d.bulan', $bulan);
    $this->db->where('d.tahun', $tahun);
    $this->db->group_by('d.id_kryn');
    $this->db->order_by('k.nama_karyawan', 'asc');
    $query =  $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }


  public function get_gajian()
  {
    $query = $this->db->get('tb_gajian');
    return $query;
  }


  public function simpan_gajian($kode, $bulan, $tahun, $ket_gaji, $mengetahui, $id_user)
  {

    $data = array(
      'kode_gaji' => $kode,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'id_mengetahui' => $mengetahui,
      'ket_gajian' => $ket_gaji,
      'id_user' => $id_user,
      'date_update' => time()
    );
    $this->db->insert('tb_gaji', $data);
  }

  public function get_kode()
  {
    $this->db->where('status', 'pending');
    $this->db->limit(1);
    $query = $this->db->get('tb_gaji');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }



  public function update_status($id)
  {
    $this->db->where('id_gaji', $id);
    $data = array(
      'status' => 'pending'
    );
    $query = $this->db->update('tb_gaji', $data);
    return $query;
  }
}