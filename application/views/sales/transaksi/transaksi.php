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
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <button type="button" class="btn btn-rounded btn-icon btn-sm btn-outline-info btnPrint" onclick="printStock()" > <i class="mdi mdi-printer"></i></button>
                <button type="button" class="btn btn-rounded btn-icon btn-sm btn-outline-info btnPrint" onclick="history.go(0)" > <i class="mdi mdi-reload"></i></button>
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
                          <th>Kode Transaksi</th>
                          <th>Nama Barang</th>
                          <th>Ukuran</th>
                          <th>Jumlah Pembelian</th>
                          <th>Tanggal Transaksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- foreach here -->
                        <?php foreach ($listok as $lS): ?>
                          <tr>
                            <td><?php echo $lS->id_transaksi; ?></td>
                            <td><?php echo $lS->nama_barang; ?></td>
                            <td><?php echo $lS->ukuran.'cm' ?></td>
                            <td><?php echo $lS->jumlah_pembelian ?></td>
                            <td><?php echo $lS->tanggal_pembelian ?></td>
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
          $(".btnInsert").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Tambah Stok");
            $(".modal .modal-body").load(link);
          });
          $(".btnUpdate").click(function(){
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
    </div>
    </div>
</body>
<?php require_once(APPPATH.'views/include/footers.php'); ?>
</html>
