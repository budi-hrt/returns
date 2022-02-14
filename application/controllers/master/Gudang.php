<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('gudang_model', 'gudang');
    }

    public function index()
    {
        $data['title'] = 'Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/gudang', $data);
    }

    public function list_gudang()
    {
        $data = $this->gudang->list_gudang();
        echo json_encode($data);
    }


    public function tambah()
    {

        $result = $this->gudang->tambah_data();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function get()
    {

        $data = $this->gudang->get_gudang();
        echo json_encode($data);
    }

    public function ubah()
    {
        $result = $this->gudang->ubah_data();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function hapus()
    {
        $result = $this->gudang->hapus_data();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
