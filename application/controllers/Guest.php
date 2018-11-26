<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Login.php");

class Guest extends Login{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
    $this->load->Model('Detailbarang');
    if ($this->session->userdata('logged')['level'] == '2') {
      redirect('produksi/index');
    }
    elseif ($this->session->userdata('logged')['level'] == '3') {
      redirect('sales/index');
    }
  }
  function index()
  {
    $data['detailbarang']=$this->Detailbarang->readdatabarang('1');
    $this->load->view('guest/index',$data);
  }
  public function readpm5()
  {
    $data['listok'] = $this->Detailbarang->readPM5();
    $this->load->view('guest/read/index',$data);
  }
  public function readpm6()
  {
    $data['listok'] = $this->Detailbarang->readPM6();
    $this->load->view('guest/read/stokpm6',$data);
  }
  public function readpm9()
  {
    $data['listok'] = $this->Detailbarang->readPM9();
    $this->load->view('guest/read/stokpm9',$data);
  }
  public function createaccount()
  {
    $this->load->view('guest/signup');
  }
  public function signuppro()
  {
    $this->load->view('guest/signup-pro');
  }

}
