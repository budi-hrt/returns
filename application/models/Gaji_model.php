<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_model extends CI_model
{
  public function get_all()
  {
    $this->db->select('g.id_gaji,g.gaji_pokok,g.tunjangan,g.um,g.id_kry,k.nama_karyawan,k.jabatan_karyawan,u.name,g.date_update');
    $this->db->from('tb_karyawan k');
    $this->db->join('tb_gaji g', 'g.id_kry=k.id_karyawan', 'left');
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



  // GAJIAN========= gaji/sdpa/0001

  public function kode_gajian()
  {

    $q = $this->db->query("SELECT MAX(RIGHT(kode_gajian,3)) AS kd_max FROM tb_gajian");
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

  public function get_list()
  {
    $this->db->select('d.id_gajian,d.kode_gaji,d.terima_gp,d.terima_tj,d.terima_um,d.status,d.id_usr,d.date_update ,k.nama_karyawan, u.name,d.pot_bpjs,d.pot_pph21,d.pot_pinjaman,d.pot_absensi,d.pot_lain');
    $this->db->from('detil_gajian d');
    $this->db->join('tb_karyawan k','k.id_karyawan=d.id_kryn','left');
    $this->db->join('user u', 'u.id=d.id_usr');
    $this->db->order_by('k.nama_karyawan', 'asc');
    $this->db->where('d.status','pending');
    $query =  $this->db->get();
    return $query;
  }


  public function get_gajian()
  {
    $query = $this->db->get('tb_gajian');
    return $query;
  }


  public function simpan_gajian($kode, $bulan, $tahun, $ket_gaji, $id_user)
  {

    $data = array(
      'kode_gajian' => $kode,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'ket_gajian' => $ket_gaji,
      'id_user' => $id_user,
      'date_update' => time()
    );
    $this->db->insert('tb_gajian', $data);
  }

  public function get_kode_pending()
  {
      $this->db->select('*');
      $this->db->where('status', 'pending');
      $this->db->limit(1);
      $query = $this->db->get('tb_gajian');
      if ($query->num_rows() > 0) {
          return $query->row();
      } else {
          return false;
      }
  }
}
