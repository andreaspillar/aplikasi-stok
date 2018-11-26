<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

  var $table = 'tabeluser';
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function read()
  {
    $this->db->from($this->table);
    $select = $this->db->get();
    $select->result();
  }
  public function readEmail()
  {
    $this->db->select('email_address');
    $this->db->from($this->table);
    $select = $this->db->get();
    $select->result();
  }
  public function validate($email,$password){
    $this->db->where('username',$email);
    $this->db->where('password',$password);
    $this->db->or_where('email_address',$email);
    $this->db->where('password',$password);
    $result = $this->db->get($this->table,1);
    return $result;
  }
  public function readByEU($emil, $uname)
  {
    $this->db->from($this->table);
    $this->db->where('email_address',$emil);
    $this->db->or_where('username',$uname);
    $select = $this->db->get();
    return $select->result();
  }
  public function readByE($emil)
  {
    $this->db->from($this->table);
    $this->db->where('email_address',$emil);
    $select = $this->db->get();
    return $select->result();
  }
  public function readByU($username)
  {
    $this->db->from($this->table);
    $this->db->where('username',$username);
    $select = $this->db->get();
    return $select->result();
  }
  public function readById($idusername)
  {
    $this->db->from($this->table);
    $this->db->where('id_user',$idusername);
    $select = $this->db->get();
    return $select->result();
  }
  public function createUser($data)
  {
    $this->db->insert($this->table, $data);
  }
  public function updateUser($idu,$data)
  {
    $this->db->where('id_user',$idu);
    $this->db->update($this->table,$data);
  }
}
