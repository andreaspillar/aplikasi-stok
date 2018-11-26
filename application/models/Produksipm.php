<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksipm extends CI_Model{

  var $table = 'produksiPM';
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function select()
  {
    $this->db->from($this->table);
    $select = $this->db->get();
    $select->result();
  }
}
