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
                <?php if (count($listok)==0): ?>
                  <div class="card-body">
                    <h4 class="card-title">
                      <i class="mdi mdi-emoticon-sad menu-icon"></i>
                      Whoops! Stok tidak ditemukan
                    </h4>
                    <p class="card-description">
                      Silahkan tambah produk, bila tidak menemukan produk yang dicari
                    </p>
                      <a class="btn btn-rounded btn-fw btn-outline-info btnInsert" data-href="<?php echo site_url('produksi/insert/') ?>"> <i class="mdi mdi-plus"></i>Tambah</a>
                  </div>
                <?php else: ?>
                  <div class="card-body">
                    <h4 class="card-title">
                      <i class="mdi mdi-thumb-up menu-icon"></i>
                      <?php echo count($listok) ?> barang ditemukan
                    </h4>
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
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($listok as $lS): ?>
                            <tr>
                              <td><?php echo $lS->id_detail; ?></td>
                              <td><?php echo $lS->nama_barang; ?></td>
                              <td><?php echo $lS->ukuran.'cm' ?></td>
                              <td>
                                <div class="progress">
                                  <?php if(($lS->sisa_stok && $lS->jumlah_stok)==0): ?>
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php elseif (($lS->sisa_stok)<= ((33/100)*$lS->jumlah_stok)): ?>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>%" aria-valuenow="<?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php elseif(($lS->sisa_stok)<= ((66/100)*$lS->jumlah_stok)): ?>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>%" aria-valuenow="<?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php else: ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>%" aria-valuenow="<?php echo ($lS->sisa_stok)/($lS->jumlah_stok)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                  <?php endif; ?>
                                </div>
                                <div class="text-center">
                                  <?php echo $lS->sisa_stok.' dari '.$lS->jumlah_stok ?>
                                </div>
                              </td>
                              <td><?php echo $lS->harga_barang ?></td>
                              <td><?php echo $lS->satuan ?></td>
                              <td><?php echo $lS->keterangan ?></td>
                              <td><a class="btn btn-block btn-sm btn-gradient-warning text-white btnUpdate" name="button" data-href="<?php echo site_url('produksi/update5/'.$lS->id_detail) ?>">Ganti</a>
                                <a class="btn btn-block btn-sm btn-gradient-danger text-white" name="button">Hapus</a></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                <?php endif; ?>
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
