<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_model extends CI_Model
{

    function faktur_po()
    {
        $bln = date('m');
        $thn = date('Y');
        $q = $this->db->query("SELECT MAX(RIGHT(no_po,3)) AS kd_max FROM tb_po WHERE MONTH(tanggal)=$bln AND YEAR(tanggal)=$thn ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        $car = "PO";
        date_default_timezone_set('Asia/Jakarta');
        return $car . date('ym') . $kd;
    }

    public function getD()
    {
        $id = $this->input->get('idD');
        $this->db->select('d.id as idDetil, d.qty, d.harga_item, d.subtotal,d.kode_produk, b.nama_barang,b.barcode, s.id as idSatuan');
        $this->db->from('detil_po d');
        $this->db->join('satuan s', 's.id=d.id_satuan', 'left');
        $this->db->join('barang b', 'b.kode=d.kode_produk', 'left');
        $this->db->where('d.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    function cari_produk($produk)
    {
        $this->db->or_like('nama_barang', $produk, 'both');
        $this->db->or_like('barcode', $produk, 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }

    public function getharga()
    {
        $kode = $this->input->get('kode');
        // $this->db->select_max('id');
        $this->db->where('kode_produk', $kode);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('detil_po');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function simpanDetil()
    {
        $qty = str_replace('.', '', $this->input->post('qty'));
        $hrg = str_replace('.', '', $this->input->post('harga'));
        $sb = str_replace('.', '', $this->input->post('Sttl'));

        $data = [
            'faktur_po' => $this->input->post('faktur'),
            'kode_produk' => $this->input->post('kode'),
            'qty' => $qty,
            'id_satuan' => $this->input->post('satuan'),
            'harga_item' => $hrg,
            'subtotal' => $sb
        ];

        $this->db->insert('detil_po', $data);
    }

    public function ubahdetil()
    {
        $id = $this->input->post('iDetl');
        $qty = str_replace('.', '', $this->input->post('eqty'));
        $hrg = str_replace('.', '', $this->input->post('hrgItem'));
        $sb = str_replace('.', '', $this->input->post('sbttl'));
        $this->db->where('id', $id);
        $data = [
            'kode_produk' => $this->input->post('ekode'),
            'qty' => $qty,
            'id_satuan' => $this->input->post('esatuan'),
            'harga_item' => $hrg,
            'subtotal' => $sb

        ];
        $this->db->update('detil_po', $data);
    }


    public function hapusdetil($id)
    {


        $this->db->where_in('id', $id);
        $this->db->delete('detil_po');
    }



    public function proses()
    {
        $subtotal = $this->input->post('total');
        $sub = str_replace('.', '', $subtotal);
        $tanggal = $this->input->post('tanggal');
        $tgl = date('Y-m-d', strtotime($tanggal));
        $data = array(
            'no_po' => $this->input->post('no_po'),
            'tanggal' => $tgl,
            'id_suplier' => $this->input->post('id_suplier'),
            'jumlah_item' => $this->input->post('jumlah_item'),
            'total' => $sub,
            'keterangan_po' => $this->input->post('keterangan_po'),
            'id_user' => $this->input->post('id_user')
        );
        $this->db->insert('tb_po', $data);
    }


    public function poterakhir()
    {
        $this->db->select('p.id as id_po, p.no_po, p.tanggal, p.status_po, s.nama_suplier, s.alamat_suplier,s.telephone_suplier');
        $this->db->from('tb_po p');
        $this->db->join('suplier s', 's.id=p.id_suplier', 'left');
        $this->db->order_by('p.id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    public function cari_faktur($id)
    {
        $this->db->select('p.id as id_po, p.no_po, p.tanggal, p.keterangan_po, s.nama_suplier, s.id as id_sup, s.kode_suplier,s.alamat_suplier,s.telephone_suplier');
        $this->db->from('tb_po p');
        $this->db->join('suplier s', 's.id=p.id_suplier', 'left');
        $this->db->where('md5(p.id)', $id);
        $query = $this->db->get();
        return $query;
    }

    public function ubahdatapo()
    {
        $id = $this->input->post('id_po');
        $subtotal = $this->input->post('total');
        $sub = str_replace('.', '', $subtotal);
        $tanggal = $this->input->post('tanggal');
        $tgl = date('Y-m-d', strtotime($tanggal));
        $data = array(
            'no_po' => $this->input->post('no_po'),
            'tanggal' => $tgl,
            'id_suplier' => $this->input->post('id_suplier'),
            'jumlah_item' => $this->input->post('jumlah_item'),
            'total' => $sub,
            'keterangan_po' => $this->input->post('keterangan_po'),
            'id_user' => $this->input->post('id_user')
        );
        $this->db->where('id', $id);
        $this->db->update('tb_po', $data);
    }

    public function cari_detil($faktur)
    {
        $this->db->select('d.id as idDetil, d.qty, d.harga_item, d.subtotal,d.kode_produk, b.nama_barang,b.barcode, s.nama_satuan');
        $this->db->from('detil_po d');
        $this->db->join('satuan s', 's.id=d.id_satuan', 'left');
        $this->db->join('barang b', 'b.kode=d.kode_produk', 'left');
        $this->db->where('md5(d.faktur_po)', $faktur);
        $query = $this->db->get();
        return $query;
    }
}
