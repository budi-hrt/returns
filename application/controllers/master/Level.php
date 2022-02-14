<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('level_model', 'level');
    }


    // ==========LEVEL HARGA
    public function index()
    {
        $data['title'] = 'Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['level']   = $this->db->get('level_customer')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('master/level', $data);
        } else {
            $data = ['nama_level' => $this->input->post('nama')];
            $this->db->insert('level_customer', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New level added</div>');
            redirect('master/level');
        }
    }


    public function getlevel()
    {

        $data = $this->level->getlevel();
        echo json_encode($data);
    }


    public function editlevel()
    {
        $this->level->editdata();
        $this->session->set_flashdata('updatelevel', 'updatelevel');
        redirect('master/level');
    }

    // ======== AKHIR LEVEL HARGA

}
