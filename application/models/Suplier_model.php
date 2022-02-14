<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier_model extends CI_Model
{

    public function add()
    {
        $data = [
            'kode_suplier'      => $this->input->post('kode'),
            'nama_suplier'      => $this->input->post('nama'),
            'alamat_suplier'    => $this->input->post('alamat'),
            'telephone_suplier' => $this->input->post('telephone')
        ];
        $this->db->insert('suplier', $data);
    }

    public function getsuplier()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('suplier');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function editdata()
    {
        $id = $this->input->post('idsuplier');
        $data = [
            'kode_suplier'      => $this->input->post('kodeedit'),
            'nama_suplier'      => $this->input->post('namaedit'),
            'alamat_suplier'    => $this->input->post('alamatedit'),
            'telephone_suplier' => $this->input->post('telephoneedit')
        ];
        $this->db->where('id', $id);
        $this->db->update('suplier', $data);
    }


    public function getbarang()
    {
        $quey = $this->db->select('*')
            ->from('barang b')
            ->join('suplier s', 's.id=b.id_suplier', 'left')
            ->get();
        return $quey;
    }


    function cari_autocompletesuplier($suplier)
    {
        $this->db->like('nama_suplier', $suplier, 'both');
        $this->db->order_by('nama_suplier', 'ASC');
        $this->db->limit(10);
        return $this->db->get('suplier')->result();
    }
}
