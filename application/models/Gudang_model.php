<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang_model extends CI_Model
{

    public function list_gudang()
    {
        $this->db->where('is_active', 1);
        $query = $this->db->get('gudang');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function tambah_data()
    {
        $field = array(
            'kode_gudang' => $this->input->post('kode_gudang'),
            'nama_gudang' => $this->input->post('nama_gudang'),
            'deskripsi' => $this->input->post('deskripsi'),
            'is_active' => 1
        );
        $this->db->insert('gudang', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function get_gudang()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('gudang');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function ubah_data()
    {
        $id = $this->input->post('id');
        $field = array(
            'kode_gudang' => $this->input->post('kode_gudang'),
            'nama_gudang' => $this->input->post('nama_gudang'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->db->where('id', $id);
        $this->db->update('gudang', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_data()
    {
        $id = $this->input->get('id');
        $field = array(
            'active' => 0,
        );
        $this->db->where('id', $id);
        $this->db->update('gudang', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
