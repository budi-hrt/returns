<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model','menu');
    }


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('menu/index', $data);
            // $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu'),'icon' => $this->input->post('icon')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            New menu added</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('menu_model', 'menu');
        $data['subMenu'] = $this->menu->getsubMenu();
        $data['menu']   = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('menu/submenu', $data);
            // $this->load->view('template/footer', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon_sub' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            New submenu added</div>');
            redirect('menu/submenu');
        }
    }

public function getmenu()
{

$data= $this->menu->getmenu();
echo json_encode($data);
}


public function editmenu()
{
    $id=$this->input->post('idedit');
 $data=[
     'menu'=>$this->input->post('menuedit'),
     'icon'=>$this->input->post('iconedit')
 ];
$this->db->where('id',$id);
$this->db->update('user_menu',$data);
$this->session->set_flashdata('updatemenu','updatemenu');
redirect('menu');
}



public function getsubmenu()
{
$data=$this->menu->getsub();
echo json_encode($data);
}

public function editsubmenu()
{
$id= $this->input->post('idsubmenu');
$data=[
'menu_id'=> $this->input->post('menu_edit'),
'title'=> $this->input->post('titleedit'),
'url'=> $this->input->post('urledit'),
'icon_sub'=> $this->input->post('icon_subedit'),
];

$this->db->where('id',$id);
$this->db->update('user_sub_menu',$data);
$this->session->set_flashdata('submenuupdate','submenuupdate');
redirect('menu/submenu');
}



}
