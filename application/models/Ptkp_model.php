<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptkp_model extends CI_Model
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

    public function insert_ptkp($mulai, $sampai, $ptkp, $tanggungan)
    {
        $id_user = $this->input->post('id_user');
        $data = array(
            'start_tahun' => $mulai,
            'end_tahun' => $sampai,
            'ptkp' => $ptkp,
            'tanggungan' => $tanggungan,
            'date_update' => time(),
            'id_user' => $id_user
        );
        $query = $this->db->insert('tb_ptkp', $data);
        return $query;
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
