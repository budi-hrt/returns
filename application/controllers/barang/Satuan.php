<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('satuan_model', 'satuan');
    }

    public function index()
    {
        $data['title'] = 'Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/satuan', $data);
    }

    public function list_satuan()
    {
        $data = $this->satuan->list_satuan();
        echo json_encode($data);
    }


    public function tambah()
    {

        $result = $this->satuan->tambah_data();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function get()
    {

        $data = $this->satuan->get_satuan();
        echo json_encode($data);
    }

    public function ubah()
    {
        $result = $this->satuan->ubah_data();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function hapus()
    {
        $result = $this->satuan->hapus_data();
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }




    // ==============================   MEREK =============================//


    public function list_merek()
    {
        $data = $this->satuan->list_merek();
        echo json_encode($data);
    }



    public function tambah_merek()
    {

        $result = $this->satuan->tambah_merek();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // getsubkategori
    public function get_merek()
    {
        $data = $this->satuan->get_merek();
        echo json_encode($data);
    }
    // end get

    // edit merek
    public function ubah_merek()
    {
        $result = $this->satuan->ubah_merek();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // Autocomplete
    function get_autocompletemerek()
    {
        if (isset($_GET['term'])) {
            $result = $this->satuan->cari_autocompletemerek($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_merek,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    // ===========================END SUB Satuan============================//

}
