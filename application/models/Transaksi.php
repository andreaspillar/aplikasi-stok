<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Model{

  var $table = 'tabeltransaksi';
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function readTransaksi($id_user)
  {
    $this->db->from($this->table);
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->where('tabeltransaksi.id_user',$id_user);
    $select = $this->db->get();
    return $select->result();
  }
  public function readAllTransaksi()
  {
    $this->db->from($this->table);
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->join('tabelwarna','tabeldetailbarang.id_warna=tabelwarna.id_warna','left');
    $select = $this->db->get();
    return $select->result();
  }
  public function selectbestfive($locate)
  {
    $this->db->select('tabeluser.username, jumlah_pembelian');
    $this->db->from($this->table);
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->join('tabelwarna','tabeldetailbarang.id_warna=tabelwarna.id_warna','left');
    $this->db->where('tabeluser.location',$locate);
    $this->db->order_by('jumlah_pembelian','DESC');
    $this->db->limit(5);
    $select = $this->db->get();
    return $select->result();
  }
  public function insertTransaksi($data)
  {
    $this->db->insert($this->table, $data);
  }

}
