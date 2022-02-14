<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function list_role()
    {

        $query = $this->db->get('user_role');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // =====TAMBAH ROLE
    public function tambah_role()
    {
        $field = array(
            'role' => $this->input->post('nama')
        );
        $this->db->insert('user_role', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // ===AHIR TAMBAH ROLE

    public function getrole()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('user_role');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function ubah_role()
    {
        $id = $this->input->post('id');
        $field = array(
            'role' => $this->input->post('nama'),
        );
        $this->db->where('id', $id);
        $this->db->update('user_role', $field);
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

    // Subkategori ===

    public function getsub()
    {
        $this->db->select('s.id AS idsb, s.nama_subkategori, s.id_kategori AS idkt, k.id AS idk, k.nama_kategori');
        $this->db->from('sub_kategori s');
        $this->db->join('kategori k', 's.id_kategori=k.id');
        $quey = $this->db->get();
        return $quey;
    }

    public function getsubkategori()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('sub_kategori');
        if ($query->num_rows() > 0) {
            return $query->row();
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


    public function aktifuser()
    {
        $id = $this->input->post('id');

        $data = array(
            'is_active' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
