<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Model{

  var $table = 'tabelbarang';
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

}
