<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generatekey extends CI_Model{

  var $table = 'generator_kode';
  public function __construct()
  {
    parent::__construct();
  }
  public function readGen()
  {
    $this->db->from($this->table);
    $select = $this->db->get();
    $select->result();
  }
  public function readGenByID($rnd)
  {
    $this->db->from($this->table);
    $this->db->where('id_gen',$rnd);
    $select = $this->db->get();
    return $select->result();
  }

}
