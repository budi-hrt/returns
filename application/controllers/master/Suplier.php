<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('suplier_model', 'suplier');
    }


    public function index()
    {
        $data['title'] = 'Data Suplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suplier'] = $this->db->get('suplier')->result_array();

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('master/suplier', $data);
            // $this->load->view('template/footer', $data);
        } else {

            $this->suplier->add();
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            New Suplier added</div>');
            redirect('master/suplier');
        }
    }




    public function getsuplier()
    {

        $data = $this->suplier->getsuplier();
        echo json_encode($data);
    }


    public function editsuplier()
    {

        $this->suplier->editdata();
        $this->session->set_flashdata('suplierupdate', 'suplierupdate');
        redirect('master/suplier');
    }



    public function getsubmenu()
    {
        $data = $this->menu->getsub();
        echo json_encode($data);
    }

    public function editsubmenu()
    {
        $id = $this->input->post('idsubmenu');
        $data = [
            'menu_id' => $this->input->post('menu_edit'),
            'title' => $this->input->post('titleedit'),
            'url' => $this->input->post('urledit'),
            'icon_sub' => $this->input->post('icon_subedit'),
        ];

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        $this->session->set_flashdata('submenuupdate', 'submenuupdate');
        redirect('menu/submenu');
    }


    // Autocomplete suplier
    function get_autocompletesuplier()
    {
        if (isset($_GET['term'])) {
            $result = $this->suplier->cari_autocompletesuplier($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->kode_suplier . ' | ' . $row->nama_suplier,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
