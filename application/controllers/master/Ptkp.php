<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptkp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(
            'Ptkp_model',
            'ptkp'
        );
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

    public function input_ptkp()
    {
        $mulai = $this->input->post('start_tahun');
        $sampai = $this->input->post('end_tahun');
        $ptkp = str_replace('.', '', $this->input->post('ptkp'));
        $tanggungan = str_replace('.', '', $this->input->post('tanggungan'));
        $cek = $this->db->get_where('tb_ptkp', ['start_tahun' => $mulai, 'end_tahun' => $sampai]);
        if ($cek->num_rows() > 0) {
            $this->session->set_flashdata('messege', 'ada');
            redirect('master/ptkp');
        } else {
            $this->ptkp->insert_ptkp($mulai, $sampai, $ptkp, $tanggungan);
            $this->session->set_flashdata('messege', 'insert');
            redirect('master/ptkp');
        }
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
