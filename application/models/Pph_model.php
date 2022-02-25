<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pph_model extends CI_model
{
  public function get_all()
  {

    $query =  $this->db->get('tb_pph21');
    return $query;
  }
}
