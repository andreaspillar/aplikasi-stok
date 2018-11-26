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
              List Stock PiP
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <button type="button" class="btn btn-rounded btn-icon btn-sm btn-outline-info btnPrint" onclick="printStock()" > <i class="mdi mdi-printer"></i></button>
                <button type="button" class="btn btn-rounded btn-icon btn-sm btn-outline-info btnPrint" onclick="history.go(0)" > <i class="mdi mdi-reload"></i></button>
                <button class="btn btn-rounded btn-icon btn-sm btn-outline-info btnInsert text-info" data-href="<?php echo site_url('produksi/insert9') ?>"> <i class="mdi mdi-plus"></i></button>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    List Dari Produksi PM9 Unit PM569
                  </p>
                  <div class="table-responsive">
                    <table id="table" class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Ukuran</th>
                          <th>Stok Barang</th>
                          <th>Harga</th>
                          <th>Satuan</th>
                          <th>Keterangan</th>
                          <th class="aksi">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- foreach here -->
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
                            <td class="aksibtn"><a class="btn btn-block btn-sm btn-gradient-warning text-white btnUpdate" name="button" data-href="<?php echo site_url('produksi/update9/'.$lS->id_detail) ?>">Ganti</a>
                                <a class="btn btn-block btn-sm btn-gradient-danger text-white" name="button">Hapus</a> </td>
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
        <script type="text/javascript">
        function printStock() {
            $('.progress').hide();
            $('.aksi').hide();
            $('.aksibtn').hide();
            var divToPrint=document.getElementById("table");
            var pageTitle = 'Stock PM 6 - PT Pura Barutama',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            <?php if ($this->agent->is_browser('Firefox')): ?>
            win = window.open('', 'Print', 'width=500,height=300');
            $('.table').toggleClass('table-hover table-bordered');
            win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" media="all"  href="' + stylesheet + '">' +
            '</head><body>'+ divToPrint.outerHTML +'</body></html>');
            <?php else: ?>
            win = window.open('');
            win.document.write(divToPrint.outerHTML);
            <?php endif; ?>
            win.document.close();
            win.print();
            win.close();
            return true;
        }
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
