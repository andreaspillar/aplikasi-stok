<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logan extends CI_Model{

  var $table = 'log_activity';
  public function __construct()
  {
    parent::__construct();
  }

  public function createLog($data)
  {
    $this->db->insert($this->table, $data);
  }
  public function readLog()
  {
    $this->db->from($this->table);
    $this->db->order_by('time_stamp', 'DESC');
    $select = $this->db->get();
    return $select->result();
  }

}
