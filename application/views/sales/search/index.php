<?php
 	require_once(APPPATH.'views/include/headers-head.php');
?>
<body>
  <div class="container-scroller">
    <?php
    require_once(APPPATH.'views/include/headers-top.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <?php
      require_once(APPPATH.'views/include/headers-nav.php');
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <i class="mdi mdi-magnify menu-icon"></i>
              Hasil Pencarian
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <?php
                  $this->db->from('tabeldetailbarang');
                  $this->db->join('tabelbarang','tabeldetailbarang'.'.id_barang = tabelbarang.id_barang','left');
                  $this->db->where('tabeldetailbarang.id_barang',$lsbar );
                  $select = $this->db->get();
                  $res = $select->result();
                 ?>
                <?php if (count($res)==0): ?>
                  <div class="card-body">
                    <h4 class="card-title">
                      <i class="mdi mdi-emoticon-sad menu-icon"></i>
                      Whoops! Stok tidak ditemukan
                    </h4>
                    <p class="card-description">
                      Jenis kertas tidak ditemukan, jika menginginkan stok kertas silahkan inden melalui tombol di bawah ini
                    </p>
                      <!-- <a class="btn btn-rounded btn-fw btn-outline-info btnIND" data-href="<?php echo site_url('sales/indenexlist/') ?>"> <i class="mdi mdi-plus"></i>Tambah</a> -->
                  </div>
                <?php else: ?>
                  <div class="card-body">
                    <h4 class="card-title">
                      <i class="mdi mdi-check menu-icon"></i>
                      <?php echo count($res) ?> barang ditemukan
                    </h4>
                    <div class="table-responsive">
                        <div class="change">
                        </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        var refreshId = setInterval(function()
        {
          $('.change').fadeOut(0).load("<?php echo site_url('sales/ajaxsearch/'.$lsbar); ?>").fadeIn(0);
        }, 1000);
        </script>
        <?php require_once(APPPATH.'views/include/modals.php'); ?>
        <?php require_once(APPPATH.'views/include/tagfooter.php'); ?>
        <!-- partial -->
      </div>
    </div>
    </div>
</body>
<?php require_once(APPPATH.'views/include/footers.php'); ?>
</html>
