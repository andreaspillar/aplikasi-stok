<table class="table table-hover">
  <thead>
    <tr>
      <th>Kode Inden</th>
      <th>Nama Barang</th>
      <th>Jumlah Pemesanan</th>
      <th>Nama Penerima</th>
      <th>Tanggal Pemesanan</th>
      <th>Tanggal Kirim</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($litra as $lT): ?>
      <?php if (($lT->id_pm=='1')||($lT->id_pm=='3')): ?>
        <tr>
          <td><?php echo $lT->id_inden; ?></td>
          <td><?php echo $lT->nama_barang; ?></td>
          <td><?php echo $lT->jumlah; ?></td>
          <td><?php echo $lT->namadepan.' '.$lT->namabelakang; ?></td>
          <td><?php echo $lT->tanggalinden; ?></td>
          <?php if ($lT->tanggalkirim=="0000-00-00"): ?>
            <td>--</td>
          <?php else: ?>
            <td><?php echo $lT->tanggalkirim; ?></td>
          <?php endif; ?>
          <?php if (($lT->status)=='Pending'): ?>
            <td><label class="badge badge-danger"><?php echo $lT->status ?></label></td>
          <?php else: ?>
            <td><label class="badge badge-success"><?php echo $lT->status ?></label></td>
          <?php endif; ?>
          <td><a class="btn btn-block btn-sm btn-gradient-info text-white btnCH" name="button" data-href="<?php echo site_url('produksi/chstatus/'.$lT->id_inden) ?>">Ganti Status</a></td>
        </tr>
      <?php else: ?>
        <tr>
          <td><?php echo $lT->id_inden; ?></td>
          <td><?php echo $lT->nama_barang.' '.$lT->nama_warna; ?></td>
          <td><?php echo $lT->jumlah; ?></td>
          <td><?php echo $lT->namadepan.' '.$lT->namabelakang; ?></td>
          <td><?php echo $lT->tanggalinden; ?></td>
          <?php if ($lT->tanggalkirim=="0000-00-00"): ?>
            <td>--</td>
          <?php else: ?>
            <td><?php echo $lT->tanggalkirim; ?></td>
          <?php endif; ?>
          <?php if (($lT->status)=='Pending'): ?>
            <td><label class="badge badge-danger"><?php echo $lT->status ?></label></td>
          <?php else: ?>
            <td><label class="badge badge-success"><?php echo $lT->status ?></label></td>
          <?php endif; ?>
          <td><a class="btn btn-block btn-sm btn-gradient-info text-white btnCH" name="button" data-href="<?php echo site_url('produksi/chstatus/'.$lT->id_inden) ?>">Ganti Status</a></td>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<script type="text/javascript">

</script>
<script type="text/javascript">
$(document).ready(function(){
  $(".btnCH").click(function(){
    var link = $(this).data("href");
    $('.modal').modal("show");
    $('.modal .judul').html("Update Stock");
    $(".modal .modal-body").load(link);
  });
});
</script>
