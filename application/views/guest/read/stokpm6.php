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
              Beli Kertas
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Produksi PM 6</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Ukuran</th>
                          <th>Stok Barang</th>
                          <th>Harga</th>
                          <th>Satuan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- foreach here -->
                        <?php foreach ($listok as $lS): ?>
                          <tr>
                            <td><?php echo $lS->id_detail; ?></td>
                            <td><?php echo $lS->nama_barang; ?></td>
                            <td><?php echo $lS->ukuran.'cm' ?></td>
                            <td><?php echo $lS->sisa_stok ?></td>
                            <td><?php echo $lS->harga_barang ?></td>
                            <td><?php echo $lS->satuan ?></td>
                            <td>
                              <a class="btn btn-block btn-sm btn-gradient-success text-white btnLogin" name="button" data-href="<?php echo site_url('login/modalin') ?>">Beli Barang</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <!-- stop foreach -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
          $(".btnLogin").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Masuk Untuk Melanjutkan");
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
