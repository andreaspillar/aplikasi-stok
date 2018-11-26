<?php if ($this->session->userdata('logged')['level'] === '2'): ?>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="<?php echo site_url('guest/index') ?>"><img src="<?php echo base_url('assets/images/logo-pura.svg') ?>" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('guest/index') ?> "><img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <div class="search-field d-none d-md-block" style="width:70%;">
        <form class="d-flex align-items-center h-100" method="post" action="<?php echo site_url('produksi/cariProduk'); ?>">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent" style="width:100%;">
            <select class="form-control bg-transparent border-0 s" name="idcaribarang" id="idcaribarang" style="width:100%;" required>
              <option value=""></option>
              <optgroup label="Produksi PM5">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','1');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm5" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="Produksi PM6">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','2');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm6" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="Produksi PM9">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','3');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm9" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
            </select>
            &nbsp<button class="btn btn-primary btn-sm" type="submit" name="kirimcari">Cari</button>
            </div>
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="image">
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="<?php echo site_url('produksi/settings/'.base64_encode($this->session->userdata('logged')['username'])) ?>">
              <i class="mdi mdi-cached mr-2 text-success"></i>
              Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('login/signout') ?>">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              Signout
            </a>
          </div>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        </div>
        </nav>
<?php elseif ($this->session->userdata('logged')['level'] === '3'): ?>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="<?php echo site_url('guest/index') ?>"><img src="<?php echo base_url('assets/images/logo-pura.svg') ?>" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('guest/index') ?> "><img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <div class="search-field d-none d-md-block" style="width:70%;">
        <form class="d-flex align-items-center h-100" method="post" action="<?php echo site_url('sales/cariProduk'); ?>">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent" style="width:100%;">
            <select class="form-control bg-transparent border-0 s" name="idcaribarang" id="idcaribarang" style="width:100%;" required>
              <option value=""></option>
              <optgroup label="Produksi PM5">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','1');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm5" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="Produksi PM6">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','2');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm6" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="Produksi PM9">
                <?php
                $this->db->from('tabelbarang');
                $this->db->where('id_pm','3');
                $select = $this->db->get();
                $tbbarang = $select->result();
                ?>
                <?php foreach ($tbbarang as $tB): ?>
                  <option class="pm9" value="<?php echo $tB->id_barang ?>"><?php echo $tB->nama_barang ?></option>
                <?php endforeach; ?>
              </optgroup>
            </select>
            &nbsp<button class="btn btn-primary btn-sm" type="submit" name="kirimcari">Cari</button>
            </div>
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="image">
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="<?php echo site_url('sales/settings/'.base64_encode($this->session->userdata('logged')['username'])) ?>">
              <i class="mdi mdi-cached mr-2 text-success"></i>
              Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('login/signout') ?>">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              Signout
            </a>
          </div>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        </div>
        </nav>
<?php elseif ($this->session->userdata('logged')['level'] == '4'): ?>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="<?php echo site_url('guest/index') ?>"><img src="<?php echo base_url('assets/images/logo-pura.svg') ?>" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('guest/index') ?> "><img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="image">
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="#">
              <i class="mdi mdi-cached mr-2 text-success"></i>
              Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('login/signout') ?>">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              Signout
            </a>
          </div>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        </div>
        </nav>
<?php else: ?>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="<?php echo site_url('guest/index') ?>"><img src="<?php echo base_url('assets/images/logo-pura.svg') ?>" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('guest/index') ?> "><img src="<?php echo base_url('assets/images/logo-mini.svg'); ?>" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Cari Barang">
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-text">
            <p class="mb-1 text-black">Daftar/ Masuk</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?php echo site_url('guest/createaccount') ?>">
            <i class="mdi mdi-account-plus mr-2 text-info"></i>
            Daftar
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item btnLogin" href="#" data-href="<?php echo site_url('login/modalin') ?>">
            <i class="mdi mdi-login mr-2 text-info"></i>
            Masuk
          </a>
        </div>
      </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
      </div>
      </nav>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function() {
  $('#idcaribarang').select2({
                placeholder: "Cari Produk",
                allowClear: true
         });
  });
</script>
