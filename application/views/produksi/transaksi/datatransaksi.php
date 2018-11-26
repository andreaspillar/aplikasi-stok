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
              Transaksi
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Produksi PM5</h4>
                  <p class="card-description">
                    List Dari Produksi PM5 Unit PM569
                  </p>
                  <div class="table-responsive">
                    <div class="change">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
        var refreshId = setInterval(function()
        {
          $('.change').fadeOut(0).load("<?php echo site_url('produksi/transprops'); ?>").fadeIn(0);
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
