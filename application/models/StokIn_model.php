<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StokIn_model extends CI_Model
{

    function faktur()
    {
        $bln = date('m');
        $thn = date('Y');
        $q = $this->db->query("SELECT MAX(RIGHT(faktur_in,3)) AS kd_max FROM pembelian WHERE MONTH(tanggal_in)=$bln AND YEAR(tanggal_in)=$thn ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        $car = "PB";
        date_default_timezone_set('Asia/Jakarta');
        return $car . date('ym') . $kd;
    }

    // buat transaksi pembelian baru
    public function tambah_baru()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = date('y-m-d');
        $data = array(
            'faktur_in' => $faktur,
            'tanggal_in' => $tanggal,
            'jatuh_tempo' => $tanggal
        );
        $this->db->insert('pembelian', $data);
    }


    // Cari Faktur baru
    public function faktur_baru()
    {
        $this->db->select('*');
        $this->db->where('status_pembelian', 'Pending');
        $this->db->order_by('id', 'desc')->limit(1);
        $query = $this->db->get('pembelian');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function po()
    {
        $this->db->select('p.id as id_po,p.no_po,p.id_suplier,s.nama_suplier');
        $this->db->join('suplier s', 's.id=p.id_suplier', 'left');
        $this->db->where('status_po', 'open');
        $query = $this->db->get('tb_po p');
        return $query;
    }

    public function save_batch($data)
    {
        return $this->db->insert_batch('detil_pembelian', $data);
    }



    public function get_nomorpo()
    {
        $no_faktur = $this->input->get('no_faktur');
        $this->db->select('d.id_sup,d.nomor_po,s.nama_suplier');
        $this->db->from('detil_pembelian d');
        $this->db->join('suplier s', 's.id=d.id_sup', 'left');
        $this->db->where('no_faktur', $no_faktur);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    // Get Satuan
    public function get_satuan()
    {

        $query = $this->db->get('satuan');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


    public function get_qty()
    {
        $id = $this->input->get('id');
        $this->db->where('id_detil', $id);
        $query = $this->db->get('detil_pembelian');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function edit_qty()
    {
        $id = $this->input->post('pk');
        $field = array(
            'qty' => $this->input->post('value')
        );
        $this->db->where('id_detil', $id);
        $this->db->update('detil_pembelian', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function edittable()
    {
        $id = $this->input->post('pk');
        $field = array(
            'disc_detil' => $this->input->post('value')
        );
        $this->db->where('id_detil', $id);
        $this->db->update('detil_pembelian', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_harga()
    {
        $id = $this->input->post('pk');
        $field = array(
            'harga_detil' => $this->input->post('value')
        );
        $this->db->where('id_detil', $id);
        $this->db->update('detil_pembelian', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_satuan()
    {
        $id = $this->input->post('pk');
        $field = array(
            'id_satuan' => $this->input->post('value')
        );
        $this->db->where('id_detil', $id);
        $this->db->update('detil_pembelian', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // edit potongan pembelian
    public function potongan()
    {
        $id = $this->input->post('id');
        $potongan = str_replace('.', '', $this->input->post('pot'));

        $field = array(
            'potongan' => $potongan
        );
        $this->db->where('id', $id);
        $this->db->update('pembelian', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
