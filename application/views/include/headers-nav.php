<?php if ($this->session->userdata('logged')['level'] == '2'): ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="profile">
            <span class="login-status online"></span> <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></span>
            <span class="text-secondary text-small">Produksi <i class="mdi mdi-factory text-info nav-profile-badge"></i></span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">List Stock</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-format-align-justify menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('produksi/index'); ?>">Produksi PM 5</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('produksi/stokpmenam'); ?>">Produksi PM 6</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('produksi/stokpmsembilan'); ?>">Produksi PM 9</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('produksi/transaksi'); ?>">
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-cash menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('produksi/daftarInden'); ?>">
          <span class="menu-title">Daftar Inden</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
<?php elseif ($this->session->userdata('logged')['level'] == '3'): ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="profile">
            <span class="login-status online"></span> <!--change to offline or busy as needed-->
          </div>
          <?php
          $this->db->from('tabeltransaksi');
          $this->db->join('tabeldetailbarang','tabeltransaksi.id_detail=tabeldetailbarang.id_detail','left');
          $this->db->join('tabeluser','tabeltransaksi.id_user=tabeluser.id_user','left');
          $this->db->join('tabelbarang','tabeldetailbarang.id_barang=tabelbarang.id_barang','left');
          $this->db->join('produksiPM','tabelbarang.id_pm=produksiPM.id_pm','left');
          $this->db->where('tabeltransaksi.id_user',$this->session->userdata('logged')['id_user']);
          $select = $this->db->get();
          $res = $select->result();
          ?>
          <?php if (count($res)>=500000): ?>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></span>
            <span class="text-secondary text-small">Most Valuable Sales <i class="mdi mdi mdi-crown text-warning nav-profile-badge"></i></span>
          </div>
          <?php else: ?>
            <div class="nav-profile-text d-flex flex-column">
              <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('logged')['namadep'].' '.$this->session->userdata('logged')['namabel'] ?></span>
              <span class="text-secondary text-small">Enthusiast Sales <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i></span>
            </div>
          <?php endif; ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('sales/index'); ?>">
          <span class="menu-title">Yang Sering Dibeli</span>
          <i class="mdi mdi-thumb-up menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Beli Kertas</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-cart menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('sales/readpmlima'); ?>">Produksi PM 5</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('sales/readpmenam'); ?>">Produksi PM 6</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('sales/readpmsembilan'); ?>">Produksi PM 9</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('sales/transaksi/'.$this->session->userdata('logged')['id_user']) ?>">
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-cash menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('sales/indenBarang/') ?>">
          <span class="menu-title">Produk Inden</span>
          <i class="mdi mdi-wunderlist menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
<?php elseif ($this->session->userdata('logged')['level'] == '4'): ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="<?= base_url().'assets/f9591c55f4d7c6336908d56ce192a6e9/'.$this->session->userdata('logged')['namepic']; ?>" alt="profile">
            <span class="login-status online"></span>
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('logged')['username'] ?></span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('adminarea/index'); ?>">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi mdi-view-dashboard menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Transaksi Sales</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-cart menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/trpmlima'); ?>">Transaksi PM 5</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/trpmenam'); ?>">Transaksi PM 6</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/trpmsembilan'); ?>">Transaksi PM 9</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#inden-pages" aria-expanded="false" aria-controls="inden-pages">
          <span class="menu-title">Inden Sales</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-cart menu-icon"></i>
        </a>
        <div class="collapse" id="inden-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/inpmlima'); ?>">Inden PM 5</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/inpmenam'); ?>">Inden PM 6</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('adminarea/inpmsembilan'); ?>">Inden PM 9</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('sales/transaksi/'.$this->session->userdata('logged')['id_user']) ?>">
          <span class="menu-title">Sales Anda</span>
          <i class="mdi mdi-cash menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
<?php endif; ?>
