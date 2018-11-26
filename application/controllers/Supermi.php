<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supermi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
    $this->load->library('user_agent');
    $this->load->Model('Detailbarang');
    $this->load->Model('Transaksi');
    $this->load->Model('Logan');
    if (!$this->session->userdata('logged')) {
      redirect('login/index');
    }
  }

  function index()
  {
    $data['logan']=$this->Logan->readLog();
    $this->load->view('superadmin/home',$data);
  }

}
