<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inden extends CI_Model{

  var $table = 'tabelinden';
  public function __construct()
  {
    parent::__construct();
  }

  public function createInden($data)
  {
    $this->db->insert($this->table, $data);
  }
  public function readAllInden()
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
  public function readIndenByID($data)
  {
    $this->db->from($this->table);
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->join('tabelwarna','tabeldetailbarang.id_warna=tabelwarna.id_warna','left');
    $this->db->where('id_inden',$data);
    $select = $this->db->get();
    return $select->result();
  }
  public function readIndenByIDuser($data)
  {
    $this->db->from($this->table);
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->join('tabelwarna','tabeldetailbarang.id_warna=tabelwarna.id_warna','left');
    $this->db->where('tabelinden.id_user',$data);
    $select = $this->db->get();
    return $select->result();
  }
  public function selectbestfive($locate)
  {
    $this->db->select('tabeluser.username, jumlah');
    $this->db->from($this->table);
    $this->db->join('tabeluser',$this->table.'.id_user=tabeluser.id_user','left');
    $this->db->join('tabeldetailbarang',$this->table.'.id_detail=tabeldetailbarang.id_detail','left');
    $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
    $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
    $this->db->join('tabelwarna','tabeldetailbarang.id_warna=tabelwarna.id_warna','left');
    $this->db->where('tabeluser.location',$locate);
    $this->db->order_by('jumlah','DESC');
    $this->db->limit(5);
    $select = $this->db->get();
    return $select->result();
  }
  public function updateStatus($where,$data)
  {
    $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
  }
}
