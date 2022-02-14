<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('admin_model', 'admin');
    }

    public function index()
    {

        $data['mn'] = 'Dashboard';
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }

    // =====ROLE===
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/role', $data);
    }

    public function list_role()
    {
        $data = $this->admin->list_role();
        echo json_encode($data);
    }
    public function tambah_role()
    {

        $result = $this->admin->tambah_role();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function get_role()
    {

        $data = $this->admin->getrole();
        echo json_encode($data);
    }

    public function ubah_role()
    {
        $result = $this->admin->ubah_role();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }



    public function roleaccess($role_id)
    {
        $roleId = base64_decode($role_id);
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $roleId])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/role-access', $data);
    }




    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('massege', 'roleaccess');
    }

    // === AHIR ROLE ===

    // ==== DATA USER ====
    public function datauser()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->db->where('id !=', 1);
        $data['userData'] = $this->db->get('user')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data-user', $data);
    }

    public function useraccess($user_id)
    {
        $data['title'] = 'User Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userData'] = $this->db->get_where('user', ['id' => $user_id])->row_array();

        $this->db->where('id !=', 1);
        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/user-access', $data);
    }

    public function userchangeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $submenu_id = $this->input->post('submenuId');
        $user_id = $this->input->post('userId');
        $data = [
            'user_id' => $user_id,
            'submenu_id' => $submenu_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_sub_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_sub_menu', $data);
        } else {
            $this->db->delete('user_access_sub_menu', $data);
        }
    }
    // ==== AHIR DATA USER ===
}
