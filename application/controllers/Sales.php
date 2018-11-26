<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller{

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

  // starttest
  public function test()
  {

  }
  //endtest

  public function index()
  {
    $data['detailbarang'] = $this->Detailbarang->readdatabarang('1');
    $this->load->view('sales/index',$data);
  }
  public function readpmlima()
  {
    $this->load->view('sales/read/index');
  }
  public function readpmenam()
  {
    $this->load->view('sales/read/stokpm6');
  }
  public function readpmsembilan()
  {
    $this->load->view('sales/read/stokpm9');
  }
  public function cariProduk()
  {
    $val = $this->input->post('idcaribarang');
    $data['lsbar'] =$val;
    $this->load->view('sales/search/index',$data);
  }
  public function ajaxsearch($valueid)
  {
    $data['listok']=$this->Detailbarang->searchByProd($valueid);
    $this->load->view('sales/search/prop',$data);
  }
  public function transaksi($id_user)
  {
    $data['listok'] = $this->Transaksi->readTransaksi($id_user);
    $this->load->view('sales/transaksi/transaksi',$data);
  }
  public function indenBarang()
  {
    $this->load->view('sales/inden/viewInden');
  }
  public function propIndenBarang($id_user)
  {
    $data['listok'] = $this->Inden->readIndenByIDuser($id_user);
    $this->load->view('sales/inden/propInden',$data);
  }
  public function prop5()
  {
    $data['listok'] = $this->Detailbarang->readPM5();
    $this->load->view('sales/read/prop/5',$data);
  }
  public function prop6()
  {
    $data['listok'] = $this->Detailbarang->readPM6();
    $this->load->view('sales/read/prop/6',$data);
  }
  public function prop9()
  {
    $data['listok'] = $this->Detailbarang->readPM9();
    $this->load->view('sales/read/prop/9',$data);
  }
  // bentuk modal (saya sudah punya modal usaha)
  public function buy($barangbelian)
  {
    $data['datadetail'] = $this->Detailbarang->readbyID($barangbelian);
    $this->load->view('sales/buy/buy',$data);
  }
  public function inden($barangbelian)
  {
    $data['datadetail'] = $this->Detailbarang->readbyID($barangbelian);
    $this->load->view('sales/buy/inden',$data);
  }

// start function
  public function belibarang()
  {
    $idusername=$this->input->post('uname');
    $idbarang=$this->input->post('idbar');
    $jumbar=$this->input->post('jumbar');
    $sbar=$this->input->post('stbar');
    $cekbar=$this->Detailbarang->whereIDBarang($idbarang);
    foreach ($cekbar as $a) {
    if ($a->sisa_stok==0) {
      $data['status']='false';
    }
    if ($jumbar > $a->sisa_stok) {
      $data['status']='exceed';
    }
    else {
      $data = array(
        'sisa_stok' => $sbar-$jumbar,
       );
      $datb = array(
        'id_user' => $idusername,
        'id_detail' => $idbarang,
        'jumlah_pembelian' => $jumbar,
        'tanggal_pembelian' => gmdate("Y-m-d H:i:s", strtotime('+7 hours')),
      );
      $datc = array(
        'id_user' => $idusername,
        'log_activity' => 'melakukan transaksi',
        'tableaffected' => 'tabeltransaksi',
        'before_value' => $sbar,
        'after_value' => $sbar-$jumbar,
        'time_stamp' => gmdate("Y-m-d H:i:s", strtotime('+7 hours')),
        'user_agent' => $this->agent->agent_string(),
        'ip_address' => $this->input->ip_address(),
      );
      $this->Logan->createLog($datc);
      $this->Transaksi->insertTransaksi($datb);
      $this->Detailbarang->updateDetail(array('id_detail'=>$idbarang),$data);
      $data['status']='true';
    }
    }
    echo json_encode($data);
  }
  public function tambahinden()
  {
    $idusername=$this->input->post('uname');
    $idbarang=$this->input->post('idbar');
    $jumlah=$this->input->post('jumbar');
    if ($jumlah > 100000) {
      $data['status']='exceed';
    }
    elseif ($jumlah <= 0) {
      $data['status']='impossible';
    }
    else {
      $data = array(
        'id_user' => $idusername,
        'id_detail' => $idbarang,
        'jumlah' => $jumlah,
        'tanggalinden' => gmdate("Y-m-d H:i:s", strtotime('+7 hours')),
        'status' => 'Pending',
      );
      $datc = array(
        'id_user' => $idusername,
        'log_activity' => 'inden barang',
        'tableaffected' => 'tabelinden',
        'before_value' => 'kosong',
        'after_value' => $idbarang,
        'time_stamp' => gmdate("Y-m-d H:i:s", strtotime('+7 hours')),
        'user_agent' => $this->agent->agent_string(),
        'ip_address' => $this->input->ip_address(),
      );
      $this->Logan->createLog($datc);
      $this->Inden->createInden($data);
      $data['status']='true';
    }
    echo json_encode($data);
  }
  public function settings($id)
  {
    $usrnm = base64_decode($id);
    $data['ch']=$this->User->readByU($usrnm);
    $this->load->view('sales/changesettings',$data);
  }
  public function changeUser($idu)
  {
    $conv = base64_decode($idu);
    $config['upload_path']          = APPPATH. '../assets/f9591c55f4d7c6336908d56ce192a6e9/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2048;
    $this->load->library('upload', $config);
    $us=$this->input->post('username');
    $nd=$this->input->post('namadepan');
    $nb=$this->input->post('namabelakang');
    $ne=$this->input->post('email');
    $pa=$this->input->post('password');
    $hpa=hash('sha256','rt8y039tu45iohreoyrtt'.$pa.'cvknal8wefpoke902');
    if (!$this->upload->do_upload('pic_file')) {
    }
    else{
      $data = array(
        'namepic' => $this->upload->data('file_name'),
      );
      $this->User->updateUser($conv,$data);
    }
    if ($pa=="") {
      $datb = array(
        'username' => $us,
        'namadepan' => $nd,
        'namabelakang' => $nb,
        'email_address' => $ne,
      );
      $this->User->updateUser($conv,$datb);
      $readview['ch']=$this->User->readById($conv);
      $this->load->view('produksi/changesettings',$readview);
    }
    elseif ($pa!="") {
      $datc = array(
        'username' => $us,
        'namadepan' => $nd,
        'namabelakang' => $nb,
        'email_address' => $ne,
        'password' => $hpa,
      );
      $this->User->updateUser($conv,$datc);
      $readview['ch']=$this->User->readById($conv);
      $this->load->view('produksi/changesettings',$readview);
    }

    // $this->pic_model->store_pic_data($data);
  }
}
