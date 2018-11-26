<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
    $this->load->library('user_agent');
    $this->load->Model('Barang');
    $this->load->Model('Detailbarang');
    $this->load->Model('Produksipm');
    $this->load->Model('Transaksi');
    $this->load->Model('Inden');
    $this->load->Model('Logan');
    $this->load->Model('User');

    if (!$this->session->userdata('logged')) {
      redirect('login/index');
    }
    else if ($this->session->userdata('logged')['level'] == '3') {
      redirect('sales/index');
    }
  }

  // testpage

  // endtestpage


  //views
  function index()
  {
    $data['listok']=$this->Detailbarang->readPM5();
    $this->load->view('produksi/read/index',$data);
  }
  function stokpmenam()
  {
    $data['listok']=$this->Detailbarang->readPM6();
    $this->load->view('produksi/read/stokpm6',$data);
  }
  function stokpmsembilan()
  {
    $data['listok']=$this->Detailbarang->readPM9();
    $this->load->view('produksi/read/stokpm9',$data);
  }
  public function transaksi()
  {
    $this->load->view('produksi/transaksi/datatransaksi');
  }
  public function transprops()
  {
    $data['litra']=$this->Transaksi->readAllTransaksi();
    $this->load->view('produksi/transaksi/prop',$data);
  }
  public function daftarInden()
  {
    $this->load->view('produksi/inden/inden');
  }
  public function indnprops()
  {
    $data['litra']=$this->Inden->readAllInden();
    $this->load->view('produksi/inden/prop',$data);
  }
  public function cariProduk()
  {
    $val = $this->input->post('idcaribarang');
    $data['listok']=$this->Detailbarang->searchByProd($val);
    $this->load->view('produksi/search/index',$data);
  }

  //bentuk modal (MODAL DIKIT NAPAH)
  function chstatus($id_inden)
  {
    $data['load']=$this->Inden->readIndenByID($id_inden);
    $this->load->view('produksi/inden/statusinden',$data);
  }
  function insert()
  {
    $this->load->view('produksi/insert/insertall');
  }
  function insert5(){
    $this->load->view('produksi/insert/insertpm5');
  }
  function insert6(){
    $this->load->view('produksi/insert/insertpm6');
  }
  function insert9(){
    $this->load->view('produksi/insert/insertpm9');
  }
  function update5($id_detail){
    $data['updatePiC']=$this->Detailbarang->whereIDBarang($id_detail);
    $this->load->view('produksi/update/updatepm5',$data);
  }
  function update6($id_detail){
    $data['updatePiC']=$this->Detailbarang->whereIDBarang($id_detail);
    $this->load->view('produksi/update/updatepm6',$data);
  }
  function update9($id_detail){
    $data['updatePiC']=$this->Detailbarang->whereIDBarang($id_detail);
    $this->load->view('produksi/update/updatepm9',$data);
  }
  // endviews

  // functions
  public function insertStock()
  {
    $nB = $this->input->post('idbarang');
    $uB = $this->input->post('inputukuran');
    $hB = $this->input->post('inputharga');
    $jB = $this->input->post('inputjumlah');
    $kB = $this->input->post('inputketerangan');
    $chred = $this->Detailbarang->verification($nB,$uB);
    if (count($chred)>0) {
      $list['status'] = 'already_exist';
      $list['err_1'] = 'Data sudah pernah ditambahkan. Silahkan ganti ukuran atau jenis kertas';
    }
    else if ($uB<'35' || $uB>'240' || $uB%5!=0) {
      $list['status'] = 'bound_of_size';
      $list['err_2'] = 'Data ukuran tidak valid (ukuran input: '.$uB.')';
    }
    else {
      $data = array(
        'id_barang' => $nB,
        'ukuran' => $uB,
        'harga_barang' => $hB,
        'satuan' => 'kg',
        'jumlah_stok' => $jB,
        'sisa_stok' => $jB,
        'keterangan' => $kB,
      );
      $this->Detailbarang->insertDetail($data);
      $list['status'] = 'success';
    }
    echo json_encode($list);
  }
  public function insertStock6()
  {
    $nB = $this->input->post('idbarang');
    $uB = $this->input->post('inputukuran');
    $wB = $this->input->post('idwarna');
    $hB = $this->input->post('inputharga');
    $jB = $this->input->post('inputjumlah');
    $kB = $this->input->post('inputketerangan');
    $chred = $this->Detailbarang->verification6($nB,$uB,$wB);
    if (count($chred)>0) {
      $list['status'] = 'already_exist';
      $list['err_1'] = 'Data sudah pernah ditambahkan. Silahkan ganti ukuran atau jenis kertas';
    }
    elseif ($uB<'35' || $uB>'240' || $uB%5!=0) {
      $list['status'] = 'bound_of_size';
      $list['err_2'] = 'Data ukuran tidak valid (ukuran input: '.$uB.')';
    }
    else {
      $data = array(
        'id_barang' => $nB,
        'ukuran' => $uB,
        'id_warna' => $wB,
        'harga_barang' => $hB,
        'satuan' => 'kg',
        'jumlah_stok' => $jB,
        'sisa_stok' => $jB,
        'keterangan' => $kB,
       );
      $this->Detailbarang->insertDetail($data);
      $list['status'] = 'success';
    }
    echo json_encode($list);
  }
  public function updateStock()
  {
    $nB = $this->input->post('detailb');
    $hB = $this->input->post('inputharga');
    $sB = $this->input->post('inputjumlahsisa');
    $tB = $this->input->post('inputjumlahtambah');
    $jB = $tB+$sB;
    $kB = $this->input->post('inputketerangan');
    if ($jB<0) {
      $list['status'] = 'bound_of_size';
      $list['err_1'] = 'Stock baru tidak mungkin bernilai kurang dari stock lama';
    }
    else {
      $data = array(
        'harga_barang' => $hB,
        'jumlah_stok' => $jB,
        'sisa_stok' => $jB,
        'keterangan' => $kB,
      );
      $this->Detailbarang->updateDetail(array('id_detail'=>$nB),$data);
      $list['status'] = 'success';
    }
    echo json_encode($list);
  }
  public function kirimStatus()
  {
    $uN = $this->input->post('uname');
    $iB = $this->input->post('idbar');
    $sT = $this->input->post('status');
    $sB = $this->input->post('stbar');
    $data = array(
      'status' => $sT,
      'tanggalkirim' => $sB,
     );
    $datc = array(
      'id_user' => $uN,
      'log_activity' => 'ganti status dan tanggal',
      'tableaffected' => 'tabelinden',
      'before_value' => 'statusLama',
      'after_value' => $sT,
      'time_stamp' => gmdate("Y-m-d H:i:s", strtotime('+7 hours')),
      'user_agent' => $this->agent->agent_string(),
      'ip_address' => $this->input->ip_address(),
     );
     $this->Logan->createLog($datc);
     $this->Inden->updateStatus(array('id_inden'=>$iB),$data);
  }
  public function settings($id)
  {
    $usrnm = base64_decode($id);
    $data['ch']=$this->User->readByU($usrnm);
    $this->load->view('produksi/changesettings',$data);
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

  }
  // endfunctions
}
