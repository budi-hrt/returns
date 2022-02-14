<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{

    public function list_satuan()
    {
        $this->db->where('active', 1);
        $query = $this->db->get('satuan');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function tambah_data()
    {
        $field = array(
            'nama_satuan' => $this->input->post('namasatuan'),
            'active' => 1
        );
        $this->db->insert('satuan', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function get_satuan()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('satuan');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function ubah_data()
    {
        $id = $this->input->post('idsatuan');
        $field = array(
            'nama_satuan' => $this->input->post('namasatuan'),
        );
        $this->db->where('id', $id);
        $this->db->update('satuan', $field);
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
        $this->db->update('kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function cari_kategori($kategori)
    {
        $this->db->like('nama_kategori', $kategori, 'both');
        $this->db->order_by('nama_kategori', 'ASC');
        $this->db->limit(5);
        return $this->db->get('kategori')->result();
    }

    // Subkategori ===

    public function list_merek()
    {
        $this->db->where('is_active', 1);
        $query = $this->db->get('merek');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function tambah_merek()
    {
        $field = array(
            'nama_merek' => $this->input->post('merek'),
            'is_active' => 1
        );
        $this->db->insert('merek', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_merek()
    {
        $id = $this->input->get('id_merek');
        $this->db->where('id', $id);
        $query = $this->db->get('merek');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function ubah_merek()
    {
        $id = $this->input->post('id_merek');
        $field = array(
            'nama_merek' => $this->input->post('merek')
        );
        $this->db->where('id', $id);
        $this->db->update('merek', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function cari_autocompletemerek($merek)
    {
        $this->db->like('nama_merek', $merek, 'both');
        $this->db->order_by('nama_merek', 'ASC');
        $this->db->limit(10);
        return $this->db->get('merek')->result();
    }
}
