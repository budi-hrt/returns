<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('kategori_model', 'kategori');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/kategori', $data);
    }

    public function list_kategori()
    {
        $data = $this->kategori->list_kategori();
        echo json_encode($data);
    }


    public function tambah()
    {

        $result = $this->kategori->tambah_data();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function get()
    {

        $data = $this->kategori->getkategori();
        echo json_encode($data);
    }

    public function ubah()
    {
        $result = $this->kategori->ubah_data();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function hapus()
    {
        $result = $this->kategori->hapus_data();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->kategori->cari_autocomplete($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_kategori,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }



    // ==============================SUB KATEGORI=============================//
    public function subkategori()
    {
        $data['title'] = 'Sub Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/sub-kategori', $data);
    }

    public function list_subkategori()
    {
        $data = $this->kategori->list_subkategori();
        echo json_encode($data);
    }

    // get kategori
    function get_kategori()
    {
        if (isset($_GET['term'])) {
            $result = $this->kategori->cari_kategori($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_kategori,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function tambah_subkategori()
    {

        $result = $this->kategori->tambah_subkategori();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // getsubkategori
    public function get_subkategori()
    {
        $data = $this->kategori->get_subkategori();
        echo json_encode($data);
    }
    // end get
    // edit subkategori
    public function ubah_sub()
    {
        $result = $this->kategori->ubah_datasub();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function get_sub()
    {
        $id = $this->input->get('kategori_id');
        $data = $this->kategori->get_sub($id)->result();

        echo "<option value='' selected='selected'>Pilih ...</option>";
        foreach ($data as $r) {

            echo "<option value='$r->id'>$r->nama_subkategori</option>";
        }
    }

    // ===========================END SUB KATEGORI============================//

}
