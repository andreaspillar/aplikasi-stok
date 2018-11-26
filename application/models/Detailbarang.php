<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailbarang extends CI_Model{

  var $table = 'tabeldetailbarang';
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function readdatabarang($iD)
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm = produksiPM.id_pm','left');
    $this->db->order_by('sisa_stok','DESC');
    $this->db->where('tabelbarang.id_pm',$iD);
    $this->db->limit(5);
    $select = $this->db->get();
    return $select->result();
  }
  public function readByIDB($iD)
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm = produksiPM.id_pm','left');
    $this->db->where('tabelbarang.id_barang',$iD);
    $select = $this->db->get();
    return $select->result();
  }
  public function readbyID($databarang)
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->where('id_detail',$databarang);
    $select = $this->db->get();
    return $select->result();
  }
  public function searchByProd($val)
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->where('tabeldetailbarang.id_barang',$val);
    $select = $this->db->get();
    return $select->result();
  }
  public function readPM5()
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->where('id_pm','1');
    $select = $this->db->get();
    return $select->result();
  }
  public function readPM6()
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->join('tabelwarna',$this->table.'.id_warna = tabelwarna.id_warna','left');
    $this->db->where('id_pm','2');
    $select = $this->db->get();
    return $select->result();
  }
  public function readPM9()
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->where('id_pm','3');
    $select = $this->db->get();
    return $select->result();
  }
  public function whereIDBarang($data)
  {
    $this->db->from($this->table);
    $this->db->join('tabelbarang',$this->table.'.id_barang = tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm = produksiPM.id_pm','left');
    $this->db->join('tabelwarna',$this->table.'.id_warna = tabelwarna.id_warna', 'left');
    $this->db->where('id_detail',$data);
    $select = $this->db->get();
    return $select->result();
  }
  public function verification($idbarang,$ukuran)
  {
    $this->db->from($this->table);
    $this->db->where('id_barang',$idbarang);
    $this->db->where('ukuran',$ukuran);
    $select = $this->db->get();
    return $select->result();
  }
  public function verification6($idbarang, $ukuran, $warna)
  {
    $this->db->from($this->table);
    $this->db->where('id_barang',$idbarang);
    $this->db->where('ukuran',$idukuran);
    $this->db->where('id_warna',$warna);
    $select = $this->db->get();
    return $select->result();
  }
  public function insertDetail($data)
  {
    $this->db->insert($this->table, $data);
  }
  public function updateDetail($where,$data)
  {
    $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
  }
}
