<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logsignup extends CI_Model{

  var $table = 'log_signup';
  public function __construct()
  {
    parent::__construct();
  }
  public function createLogUp($data)
  {
      $this->db->insert($this->table, $data);
  }
  public function readSignUp($emil,$uname)
  {
    $this->db->from($this->table);
    $this->db->where('email',$emil);
    $this->db->or_where('username',$uname);
    $select = $this->db->get();
    return $select->result();
  }
  public function reademilath($emil,$codeath)
  {
    $this->db->from($this->table);
    $this->db->where('email',$emil);
    $this->db->where('kodegen',$codeath);
    $select = $this->db->get();
    return $select->result();
  }
  
  public function deleteAth($email,$codeath)
  {
    $this->db->where('email',$email);
    $this->db->where('kodegen',$codeath);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
  }

}
