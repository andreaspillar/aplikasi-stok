<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata)) {
$datasess = $this->session->userdata('logged');
$username = $datasess['username'];
$id_user = $datasess['id_user'];
$namadep = $datasess['namadep'];
$namabel = $datasess['namabel'];
$namepic = $datasess['namepic'];
$locate = $datasess['location'];
// $lvls = $datasess['level'];
}
else {
header("location: login");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel']?></title>
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/select2-bootstrap.css') ?>"> -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
</head>
