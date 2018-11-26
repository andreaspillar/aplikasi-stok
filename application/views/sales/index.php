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
              <span class="text-danger mr-2">
                <i class="mdi mdi-heart menu-icon"></i>
              </span>
              Kertas Favorit Sales Lain
            </h3>
          </div>
          <div class="row">
            <?php foreach ($detailbarang as $dB): ?>
              <?php if ($dB->sisa_stok != 0): ?>
                <div class="col-md-12 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <img src="<?php echo base_url('assets/images/dashboard/circle.svg') ?>" class="card-img-absolute" alt="circle-image"/>
                      <h4 class="font-weight-normal mb-3"><?php echo $dB->nama_barang ?></h4>
                      <h6 class="card-text">Sisa Stock: <?php echo $dB->sisa_stok ?><?php echo $dB->satuan ?>
                        <i class="mdi mdi-alert-circle mdi-24px float-right"></i>
                      </h6>
                      <h6 class="card-text"><a class="btnBUY" href="#" data-href="<?php echo site_url('sales/buy/'.$dB->id_detail) ?>" style="color:white;">Beli Sekarang!</a></h6>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <script type="text/javascript">
        $(document).ready(function(){
          $(".btnBUY").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Beli Kertas");
            $(".modal .modal-body").load(link);
          });
        });
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
