<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    //==================Serverside====================//
    var $table = 'barang b';
    var $column_order = array(null, 'b.barcode', 'b.nama_barang', 'm.nama_merek', 'k.nama_kategori', 'b.satuan1', 'b.harga'); //set column field database for datatable orderable
    var $column_search = array('b.barcode', 'b.nama_barang', 'm.nama_merek', 'k.nama_kategori', 'b.satuan1', 'b.harga'); //set column field database for datatable searchable 
    var $order = array('m.nama_merek' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        if ($this->input->post('merek')) {
            $this->db->where('m.nama_merek', $this->input->post('merek'));
        }
        if ($this->input->post('kategori')) {
            $this->db->where('k.nama_kategori', $this->input->post('kategori'));
        }

        if ($this->input->post('barcode')) {
            $this->db->like('b.barcode', $this->input->post('barcode'));
        }
        if ($this->input->post('keyword')) {
            $this->db->like('b.nama_barang', $this->input->post('keyword'));
        }


        $this->db->from($this->table)
            ->join('kategori k', 'b.id_kategori=k.id', 'left')
            ->join('sub_kategori s', 'b.id_subkategori=s.id', 'left')
            ->join('merek m', 'b.id_merek=m.id', 'left')
            ->join('level_diskon l', 'b.kode=l.id_product', 'left')
            ->where('b.is_active', 1)
            ->group_by('b.kode');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_list_merek()
    {
        $this->db->select('nama_merek');
        $this->db->from('merek');
        $this->db->order_by('nama_merek', 'asc');
        $query = $this->db->get();
        $result = $query->result();

        $merek = array();
        foreach ($result as $row) {
            $merek[] = $row->nama_merek;
        }
        return $merek;
    }

    public function get_list_kategori()
    {
        $this->db->select('nama_kategori');
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'asc');
        $query = $this->db->get();
        $result = $query->result();

        $kategori = array();
        foreach ($result as $row) {
            $kategori[] = $row->nama_kategori;
        }
        return $kategori;
    }

    //==================end sereverside===============//


    public function getbarang()
    {
        $quey = $this->db->select('*')
            ->from('barang b')
            ->join('kategori k', 'b.id_kategori=k.id', 'left')
            ->join('sub_kategori s', 'b.id_subkategori=s.id', 'left')
            ->join('merek m', 'b.id_merek=m.id', 'left')
            ->join('level_diskon l', 'b.id=l.id_product', 'left')
            ->group_by('b.id')
            ->get();
        return $quey;
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




    public function getsatuan()
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


    public function getmerek()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('merek');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // =====getsub========//
    public function get_sub($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('sub_kategori');
    }
    // ====akhir getsub===//
    // =====kode otomatis====//

    public function kode_otomatis()
    {
        $this->db->select('RIGHT(barang.kode,2) as id', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "1" . "0" . $batas;
        return $kodetampil;
    }
    //======akhir kode otomatis===//


    //========Tambah ke table barang======//
    public function tambah_data()
    {

        $harga = $this->input->post('harga');
        $hrg = str_replace('.', '', $harga);
        $data = array(
            'kode' => $this->input->post('kode_produk'),
            'barcode' => $this->input->post('barcode'),
            'nama_barang' => $this->input->post('nama'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_subkategori' => $this->input->post('subkategori'),
            'satuan1' => $this->input->post('satuan1'),
            'satuan2' => $this->input->post('satuan2'),
            'isi2' => $this->input->post('isi2'),
            'id_merek' => $this->input->post('id_merek'),
            'harga' => $hrg,
            'stok_minim' => $this->input->post('minStok')

        );
        $this->db->insert('barang', $data);
    }
    //========Akhir Tambah================//

    // Tambah ke tabel level harga
    public function save_batch($data)
    {
        return $this->db->insert_batch('level_diskon', $data);
    }
    // Akhir tambah ke level harga


    // Cek id produk
    public function cek_kode($id)
    {
        $this->db->where('kode', $id);
        return $this->db->get('barang');
    }




    // GETPRODUK
    public function getproduk($kode)
    {
        $this->db->select('*');
        $this->db->from('barang b');
        $this->db->join('kategori k', 'b.id_kategori=k.id', 'left');
        $this->db->join('sub_kategori s', 'b.id_subkategori=s.id', 'left');
        $this->db->join('merek m', 'b.id_merek=m.id', 'left');
        $this->db->where('md5(b.kode)', $kode);
        $query = $this->db->get();
        return $query;
    }
    // AKHIR GETPRODUK

    //get harga

    public function getharga($kode)
    {
        $this->db->select('l.id as level_id, l.nama_level, h.id as idharga, h.id_product,h.quantity, h.discount,h.tanggal_mulai,h.tanggal_selesai');
        $this->db->from('level_diskon h');
        $this->db->join('level_customer l', 'l.id=h.id_level_customer');
        $this->db->where('md5(h.id_product)', $kode);
        $query = $this->db->get();
        return $query;
    }
    //akhir getharga


    //====== update data produk

    public function edit_data($id_produk)
    {
        $this->db->where('kode', $id_produk);

        $harga = $this->input->post('harga');
        $hrg = str_replace('.', '', $harga);
        $data = [
            'barcode' => $this->input->post('barcode'),
            'nama_barang' => $this->input->post('nama'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_subkategori' => $this->input->post('subkategori'),
            'satuan1' => $this->input->post('satuan1'),
            'satuan2' => $this->input->post('satuan2'),
            'isi2' => $this->input->post('isi2'),
            'id_merek' => $this->input->post('id_merek'),
            'harga' => $hrg,
            'stok_minim' => $this->input->post('minStok')
        ];

        $this->db->update('barang', $data);
    }

    //========= akhir update data produk

    //==== update harga produk

    public function edit_harga()
    {

        $id = $_POST['id'];
        $disc = $_POST['discount']; // Ambil data nama dan masukkan ke variabel nama
        $discount = str_replace(".", "", $disc);
        $qty = $_POST['quantity']; // Ambil data telp dan masukkan ke variabel telp

        $tanggal_mulai = $_POST['tanggal_mulai'];

        $tanggal_selesai = $_POST['tanggal_selesai'];

        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($id as $idh) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id' => $idh,
                'quantity' => $qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                'discount' => $discount[$index],  // Ambil dan set data telepon sesuai index array dari $index
                'tanggal_mulai' => $tanggal_mulai[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'tanggal_selesai' => $tanggal_selesai[$index],  // Ambil dan set data alamat sesuai index array dari $index

            ));

            $index++;
        }
        $this->db->update_batch('level_diskon', $data, 'id');
    }
    //===== akhir update harga produk


    // ===hapus produk
    public function hapus($id)
    {
        $this->db->where('kode', $id);
        $active = 0;
        $data = [
            'is_active' => $active
        ];
        $this->db->update('barang', $data);
    }
    // akhir hapus produk===
}
