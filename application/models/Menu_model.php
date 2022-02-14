<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getsubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }



    public function getmenu()
    {
    $id= $this->input->get('id');
    $this->db->where('id',$id);
    $query=$this->db->get('user_menu');
    if ($query->num_rows()>0) {
        return $query->row();
    }else{
        return false;
    }
    }




    public function getsub()
    {
    $id=$this->input->get('id');
    $this->db->where('id',$id);
    $query=$this->db->get('user_sub_menu');
    if ($query->num_rows()>0) {
        return $query->row();
    }else {
        return false;
    }
    }
}
