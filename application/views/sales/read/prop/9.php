<table class="table table-hover">
  <thead>
    <tr>
      <th>Nama Barang</th>
      <th>Ukuran</th>
      <th>Stok Barang</th>
      <th>Harga</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <!-- foreach here -->
    <?php foreach ($listok as $lS): ?>
      <tr>
        <td><?php echo $lS->nama_barang; ?></td>
        <td><?php echo $lS->ukuran.'cm' ?></td>
        <?php if ($lS->sisa_stok==0): ?>
          <td class="text-danger">Stock Habis</td>
        <?php elseif (($lS->sisa_stok)<= ((33/100)*$lS->jumlah_stok)): ?>
          <td class="text-danger">Tinggal <?php echo $lS->sisa_stok ?></td>
        <?php elseif(($lS->sisa_stok)<= ((66/100)*$lS->jumlah_stok)): ?>
          <td class="text-warning"><?php echo $lS->sisa_stok ?></td>
        <?php else: ?>
          <td class="text-success"><?php echo $lS->sisa_stok ?></td>
        <?php endif; ?>
        <td><?php echo $lS->harga_barang.'/'.$lS->satuan ?></td>
        <td><?php echo $lS->keterangan ?></td>
        <td>
          <?php if ($lS->sisa_stok == 0): ?>
            <a class="btn btn-block btn-sm btn-gradient-danger text-white" href="#" name="button">Inden Sekarang</a>
          <?php else: ?>
            <a class="btn btn-block btn-sm btn-gradient-success text-white btnBUY" name="button" data-href="<?php echo site_url('sales/buy/'.$lS->id_detail) ?>">Beli Sekarang</a>
          <?php endif; ?>
      </tr>
    <?php endforeach; ?>
    <!-- stop foreach -->
  </tbody>
</table>

<script type="text/javascript">
$(document).ready(function(){
  $(".btnBUY").click(function(){
    var link = $(this).data("href");
    $('.modal').modal("show");
    $('.modal .judul').html("Beli Kertas");
    $(".modal .modal-body").load(link);
  });
  $(".btnIND").click(function(){
    var link = $(this).data("href");
    $('.modal').modal("show");
    $('.modal .judul').html("Inden Kertas");
    $(".modal .modal-body").load(link);
  });
});
</script>
