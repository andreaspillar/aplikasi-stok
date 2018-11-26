<?php
 	require_once(APPPATH.'views/include/headers-guest.php');
?>
<body>
  <div class="container-scroller">
    <?php
    require_once(APPPATH.'views/include/headers-top.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <?php
      require_once(APPPATH.'views/include/headers-nav-guest.php');
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="text-danger mr-2">
                <i class="mdi mdi-heart menu-icon"></i>
              </span>
              Yang Sering Dibeli
            </h3>
          </div>
          <div class="row">
            <?php foreach ($detailbarang as $dB): ?>
              <?php if ($dB->sisa_stok != 0): ?>
                <div class="col-md-12 stretch-card grid-margin">
                  <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                      <img src="<?php echo base_url('assets/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image"/>
                      <h4 class="font-weight-normal mb-3"><?php echo $dB->nama_barang.' '.$dB->ukuran.'cm' ?></h4>
                      <h2 class="mb-5">Masih Ada <?php echo $dB->sisa_stok.' '.$dB->satuan ?></h2>
                      <h6 class="card-text"><a class="btnLogin" href="#" data-href="<?php echo site_url('login/modalin') ?>" style="color:white;">Beli Sekarang!</a></h6>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php
            $this->db->from('tabeldetailbarang');
            $this->db->join('tabelbarang','tabeldetailbarang.id_barang = tabelbarang.id_barang','left');
            $this->db->join('produksiPM','tabelbarang.id_pm = produksiPM.id_pm','left');
            $this->db->join('tabelwarna','tabeldetailbarang.id_warna = tabelwarna.id_warna','left');
            $this->db->order_by('sisa_stok','DESC');
            $this->db->where('tabelbarang.id_pm','2');
            $this->db->limit(5);
            $select = $this->db->get();
            $detail6 = $select->result();
             ?>
            <?php foreach ($detail6 as $dB): ?>
              <?php if ($dB->sisa_stok != 0): ?>
                <div class="col-md-12 stretch-card grid-margin">
                  <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                      <img src="<?php echo base_url('assets/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image"/>
                      <h4 class="font-weight-normal mb-3"><?php echo $dB->nama_barang.' '.$dB->ukuran.'cm' ?></h4>
                      <h2 class="mb-5">Masih Ada <?php echo $dB->sisa_stok.' '.$dB->satuan ?></h2>
                      <h6 class="card-text"><a class="btnLogin" href="#" data-href="<?php echo site_url('login/modalin') ?>" style="color:white;">Beli Sekarang!</a></h6>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php
            $this->db->from('tabeldetailbarang');
            $this->db->join('tabelbarang','tabeldetailbarang.id_barang = tabelbarang.id_barang','left');
            $this->db->join('produksiPM','tabelbarang.id_pm = produksiPM.id_pm','left');
            $this->db->join('tabelwarna','tabeldetailbarang.id_warna = tabelwarna.id_warna','left');
            $this->db->order_by('sisa_stok','DESC');
            $this->db->where('tabelbarang.id_pm','3');
            $this->db->limit(5);
            $select = $this->db->get();
            $detail9 = $select->result();
             ?>
            <?php foreach ($detail9 as $dB): ?>
              <?php if ($dB->sisa_stok != 0): ?>
                <div class="col-md-12 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                      <img src="<?php echo base_url('assets/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image"/>
                      <h4 class="font-weight-normal mb-3"><?php echo $dB->nama_barang.' '.$dB->ukuran.'cm' ?></h4>
                      <h2 class="mb-5">Masih Ada <?php echo $dB->sisa_stok.' '.$dB->satuan ?></h2>
                      <h6 class="card-text"><a class="btnLogin" href="#" data-href="<?php echo site_url('login/modalin') ?>" style="color:white;">Beli Sekarang!</a></h6>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
          $(".btnLogin").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Masuk Akun");
            $(".modal .modal-body").load(link);
          });
          $(".btnSignup").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Update Stock");
            $(".modal .modal-body").load(link);
          });
        });
        </script>
        <?php require_once(APPPATH.'views/include/modals.php'); ?>
        <?php require_once(APPPATH.'views/include/tagfooter.php'); ?>
        <!-- partial -->
      </div>

      <!-- partial -->
    </div>
  </div>
</body>
<?php require_once(APPPATH.'views/include/footers.php'); ?>
</html>
