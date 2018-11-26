<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminarea extends CI_Controller{

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
    $this->load->Model('Inden');
    $this->load->Model('User');
    if (!$this->session->userdata('logged')) {
      redirect('login/index');
    }
    else if ($this->session->userdata('logged')['level'] == '2') {
      redirect('produksi/index');
    }
  }

  public function vardum()
  {
    $datb = $this->Inden->selectbestfive('Jakarta');
    var_dump($datb);
  }

  public function jsonLimitTran($locate)
  {
    header('Content-Type: application/json');
    $data = $this->Transaksi->selectbestfive($locate);
    print json_encode($data);
  }
  public function jsonLimitInd($locate)
  {
    header('Content-Type: application/json');
    $datb = $this->Inden->selectbestfive($locate);
    print json_encode($datb);
  }
  public function index()
  {
    $this->load->view('adminarea/monitoring');
  }
}
