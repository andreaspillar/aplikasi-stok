<?php foreach ($datadetail as $dD): ?>
  <h6 class="text-info statusMsg"></h6>
  <h4><?php echo $dD->nama_barang ?></h4>
  <table>
    <tr hidden>
      <td hidden><h6 hidden>id_barang:</h6></td>
      <td hidden>
        <h6 hidden class="iddetail"><?php echo $dD->id_detail ?></h6>
      </td>
    </tr>
    <tr>
      <td><h6>Ukuran:</h6></td>
      <td>
        <h6 class="ukuran"><?php echo $dD->ukuran.'cm' ?></h6>
      </td>
    </tr>
    <tr>
      <td><h6>Harga Barang:</h6></td>
      <td>
        <h6><?php echo $dD->harga_barang.'/'.$dD->satuan ?></h6>
      </td>
    </tr>
    <tr>
      <td><h6>Sisa Barang:</h6></td>
      <td>
        <h6><?php echo $dD->sisa_stok ?></h6>
      </td>
    </tr>
  </table>
  <form method="post" action="<?php //echo site_url('login/ath') ?>">
    <div class="form-group idukuran">
      <label for="inputukuran">Jumlah Pesanan Barang</label>
      <div class="input-group-ukuran input-group-prepend">
        <input type="number" min="1" max="<?php echo $dD->sisa_stok ?>" class="form-control" id="inputjumlah" name="inputjumlah" required>
      </div>
      <div class="text-center mt-4 font-weight-light text-danger err">
      </div>
    </div>
    <div class="mt-3">
      <button type="button" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn" onclick="kirimTransaksi()">Beli Sekarang</button>
    </div>
  <script type="text/javascript">
    function kirimTransaksi(){
      // var link = $(this).data("href");
      var username = <?php echo $this->session->userdata('logged')['id_user'] ?>;
      var idbarang = $(".iddetail").html();
      var jumlahbarang = $("#inputjumlah").val();
      var stockbarang = <?php echo $dD->sisa_stok ?>;
      $.ajax({
        type:"POST",
        url: "<?php echo base_url(); ?>sales/belibarang",
        dataType: "json",
        data: {uname:username,
          idbar:idbarang,
          jumbar:jumlahbarang,
          stbar:stockbarang,
        },
        success: function(data){
          if (data.status == 'false') {
            $('.err').html('Barang terakhir sudah diorder. Silahkan Inden');
          }
          else if (data.status == 'exceed') {
            $('.err').html('Jumlah order yang diinginkan melebihi stock');
          }
          else {
            $('#modal').modal('hide');
          }
        }
      });
    }
  </script>
</form>
<?php endforeach; ?>
