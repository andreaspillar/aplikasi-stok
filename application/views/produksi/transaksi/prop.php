<table class="table table-hover">
  <thead>
    <tr>
      <th>Kode Transaksi</th>
      <th>Nama Barang</th>
      <th>Jumlah Pemesanan</th>
      <th>Nama Penerima</th>
      <th>Tanggal Pembelian</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($litra as $lT): ?>
      <?php if ($lT->id_pm=='2'): ?>
        <tr>
          <td><?php echo $lT->id_transaksi; ?></td>
          <td><?php echo $lT->nama_barang.' '.$lT->nama_warna; ?></td>
          <td><?php echo $lT->jumlah_pembelian; ?></td>
          <td><?php echo $lT->namadepan.' '.$lT->namabelakang; ?></td>
          <td><?php echo $lT->tanggal_pembelian; ?></td>
          <td><?php //echo $lT->status; ?></td>
        </tr>
      <?php else: ?>
        <tr>
          <td><?php echo $lT->id_transaksi; ?></td>
          <td><?php echo $lT->nama_barang; ?></td>
          <td><?php echo $lT->jumlah_pembelian; ?></td>
          <td><?php echo $lT->namadepan.' '.$lT->namabelakang; ?></td>
          <td><?php echo $lT->tanggal_pembelian; ?></td>
          <td><?php //echo $lT->status; ?></td>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>

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
