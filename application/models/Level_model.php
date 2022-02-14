<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level_model extends CI_Model
{


    public function getlevel()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('level_customer');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function editdata()
    {
        $id = $this->input->post('idedit_level');
        $data = ['nama_level' => $this->input->post('leveledit')];
        $this->db->where('id', $id);
        $this->db->update('level_customer', $data);
    }


    public function getbarang()
    {
        $quey = $this->db->select('*')
            ->from('barang b')
            ->join('suplier s', 's.id=b.id_suplier', 'left')
            ->get();
        return $quey;
    }
}
