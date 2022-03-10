<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptkp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(array(
            'Ptkp_model' => 'ptkp',
            'Karyawan_model' => 'karyawan'
        ));
    }


    // ==========LEVEL HARGA
    public function index()
    {
        $data['title'] = 'PTKP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ptkp']   = $this->db->get('tb_ptkp')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/form_ptkp', $data);
    }

    public function cek_pending()
    {
        $cek = $this->db->get_where('tb_ptkp', ['status' => 'pending']);
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

    public function form_ptkp()
    {
        $data['title'] = 'Form PTKP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['karyawan'] = $this->karyawan->get_all()->result_array();
        $this->load->view('template/header_m', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('ptkp/form_ptkp', $data);
    }


    // public function getptkp()
    // {
    //     $data = $this->ptkp->getptkp();
    //     echo json_encode($data);
    // }


    // public function editlevel()
    // {
    //     $this->ptkp->editdata();
    //     $this->session->set_flashdata('updatelevel', 'updatelevel');
    //     redirect('master/level');
    // }



}