<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public function list_kategori()
    {
        $this->db->where('active', 1);
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function tambah_data()
    {
        $field = array(
            'nama_kategori' => $this->input->post('namakategori'),
            'active' => 1
        );
        $this->db->insert('kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getkategori()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function ubah_data()
    {
        $id = $this->input->post('idkategori');
        $field = array(
            'nama_kategori' => $this->input->post('namakategori'),
        );
        $this->db->where('id', $id);
        $this->db->update('kategori', $field);
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

    public function list_subkategori()
    {
        $this->db->select('s.id AS idsb, s.nama_subkategori, s.id_kategori AS idkt, k.id AS idk, k.nama_kategori');
        $this->db->from('sub_kategori s');
        $this->db->join('kategori k', 's.id_kategori=k.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function tambah_subkategori()
    {
        $field = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_subkategori' => $this->input->post('name'),
            'active' => 1
        );
        $this->db->insert('sub_kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_subkategori()
    {
        $id = $this->input->get('sub_id');
        $this->db->select('s.id AS id_sub, s.nama_subkategori,s.id_kategori,k.nama_kategori');
        $this->db->from('sub_kategori s');
        $this->db->join('kategori k', 's.id_kategori=k.id');
        $this->db->where('s.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function ubah_datasub()
    {
        $id = $this->input->post('id_sub');
        $field = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_subkategori' => $this->input->post('name'),
        );
        $this->db->where('id', $id);
        $this->db->update('sub_kategori', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function cari_autocomplete($kategori)
    {
        $this->db->like('nama_kategori', $kategori, 'both');
        $this->db->order_by('nama_kategori', 'ASC');
        $this->db->limit(10);
        return $this->db->get('kategori')->result();
    }

    // =====getsub========//
    public function get_sub($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('sub_kategori');
    }
    // ====akhir getsub===//
}
