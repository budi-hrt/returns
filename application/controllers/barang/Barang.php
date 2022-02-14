<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('barang_model', 'barang');
    }

    // =============================DATA BARANG=============================//
    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // data merek
        $merek = $this->barang->get_list_merek();
        $opt = array('' => 'All Merek');
        foreach ($merek as $mrk) {
            $opt[$mrk] = $mrk;
        }
        $kategori = $this->barang->get_list_kategori();
        $opt1 = array('' => 'All kategori');
        foreach ($kategori as $ktg) {
            $opt1[$ktg] = $ktg;
        }

        $data['form_merek'] = form_dropdown('', $opt, '', 'id="merek" class="form-control form-control-sm flat"');
        $data['form_kategori'] = form_dropdown('', $opt1, '', 'id="kategori" class="form-control form-control-sm flat"');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/index', $data);
        // $this->load->view('template/footer', $data);

    }


    public function ajax_list()
    {
        $list = $this->barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $barang->nama_barang;
            $row[] = $barang->barcode;
            $row[] = $barang->nama_kategori;
            $row[] = $barang->nama_merek;
            $row[] = $barang->satuan1;
            $row[] = number_format($barang->harga, 0, ',', '.');
            $row[] = '<a class="ml-5" href="' . base_url('barang/barang/edit_produk/') . md5($barang->kode) . '" title="Edit" "><i class="fa fa-pencil text-primary"></i></a>
                     <a class="ml-2" href="javascript:void(0)" title="Hapus" onclick="delete_produk(' . "'" . $barang->kode . "'" . ')"><i class="fa fa-times text-danger"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barang->count_all(),
            "recordsFiltered" => $this->barang->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    // ===tambah peoduk

    public function tambahbarang()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori']   = $this->db->get('kategori')->result_array();
        $data['sub_kategori']   = $this->db->get('sub_kategori')->result_array();
        $data['satuan']   = $this->db->get('satuan')->result_array();
        $data['merek']   = $this->db->get('merek')->result_array();
        $data['level'] = $this->db->get('level_customer')->result_array();
        $data['kode'] = $this->barang->kode_otomatis();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/tambah-barang', $data);
    }


    // ===akhir tambah



    // simpan produk
    public function tambah()
    {
        $this->barang->tambah_data(); //Tambah data barang

        // ============== simpan diskon ===============//
        // Ambil data yang dikirim dari form
        $id_produk = $_POST['kode_barang']; // Ambil data nis dan masukkan ke variabel nis
        $disc = $_POST['discount']; // Ambil data nama dan masukkan ke variabel nama
        $discount = str_replace(".", "", $disc);
        $qty = $_POST['quantity']; // Ambil data telp dan masukkan ke variabel telp

        $tanggal_mulai = $_POST['tanggal_mulai'];

        $tanggal_selesai = $_POST['tanggal_selesai'];
        $id_level = $_POST['id_level']; // Ambil data alamat dan masukkan ke variabel alamat
        $data = array();

        $index = 0; // Set index array awal dengan 0
        foreach ($id_produk as $idP) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id_product' => $idP,
                'quantity' => $qty[$index],  // Ambil dan set data nama sesuai index array dari $index
                'discount' => $discount[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'tanggal_mulai' => $tanggal_mulai[$index],  // Ambil dan set data telepon sesuai index array dari $index
                'tanggal_selesai' => $tanggal_selesai[$index],  // Ambil dan set data alamat sesuai index array dari $index
                'id_level_customer' => $id_level[$index],  // Ambil dan set data alamat sesuai index array dari $index
            ));

            $index++;
        }

        $this->barang->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
    }




    // kode produk 
    public function kode()
    {
        $data['kode'] = $this->barang->kode_otomatis();
        echo json_encode($data);
    }

    //edit produk
    public function edit_produk($kode)
    {
        $kode = $kode;
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->barang->getproduk($kode)->row_array();
        $data['sub_kategori']  = $this->db->get('sub_kategori')->result_array();
        $data['level'] = $this->barang->getharga($kode)->result_array();
        $data['satuan']   = $this->db->get('satuan')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/edit-produk', $data);
    }
    //akhir edit produk


    // Ubah Data Barang
    public function edit()
    {
        $id_produk = $this->input->post('kode_produk');
        $this->barang->edit_data($id_produk);
        $this->barang->edit_harga($id_produk);
    }



    //===hapus produk
    public function hapus()
    {
        $id = $this->input->post('idP');
        $this->barang->hapus($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('barang');
    }
    // ===akhir hapus produk


    // Get Subkategori

    public function get_sub()
    {
        $id = $this->input->get('kategori_id');
        $data = $this->barang->get_sub($id)->result();

        echo "<option value='' selected='selected'>Pilih ...</option>";
        foreach ($data as $r) {

            echo "<option value='$r->id'>$r->nama_subkategori</option>";
        }
    }

    // akhir Get subkategori


    // ==========================END DATA BARANG==============================//








}
