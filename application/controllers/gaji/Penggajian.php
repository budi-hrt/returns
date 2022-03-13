<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(array(
            'Gaji_model' => 'gaji',
            'Karyawan_model' => 'karyawan'
        ));
    }

    public function index()
    {
        $data['title'] = 'Master Gaji';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gaji'] = $this->gaji->get_all()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('gaji/index', $data);
    }


    public function cek_pending()
    {
        $cek = $this->db->get_where('tb_gaji', ['status' => 'pending']);
        if ($cek->num_rows() <> 0) {
            $msg['success'] = false;
            $msg['type'] = 'ada';
            $msg['success'] = true;
            echo json_encode([$msg]);
        } else {
            $msg['success'] = false;
            $msg['type'] = 'blm';
            $msg['success'] = true;
            echo json_encode([$msg]);
        }
    }




    public function tambah_gaji()
    {
        $idKry = $this->input->post('nama');
        $gp = $this->input->post('gaji_pokok');
        $tj = $this->input->post('tunjangan');
        $um = $this->input->post('um');
        $cek = $this->db->get_where('tb_gaji', ['id_kry' => $idKry]);
        if ($cek->num_rows() > 0) {
            $this->session->set_flashdata('message', 'kode');
            redirect('gaji/master_gaji');
        } else {
            $this->gaji->simpan($idKry, $gp, $tj, $um);
            $this->session->set_flashdata('message', 'simpan');
            redirect('gaji/master_gaji');
        }
    }



    public function ubah_gaji()
    {
        $id = $this->input->post('id');
        $idKry = $this->input->post('idKry');
        $gp = $this->input->post('gaji_pokok');
        $tj = $this->input->post('tunjangan');
        $um = $this->input->post('um');
        $this->gaji->ubah($id, $idKry, $gp, $tj, $um);
        $this->session->set_flashdata('message', 'ubah');
        redirect('gaji/master_gaji');
    }




    // ==== AHIR DATA USER ===
}
