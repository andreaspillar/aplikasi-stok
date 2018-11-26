<div class="container">
  <div class="container-fluid">
    <form class="updatepm5" method="post" >
      <?php foreach ($updatePiC as $uP): ?>
        <div class="form-group" hidden>
          <label for="idbarang">id barang</label>
          <input name="detailb" id="detailb" type="text" class="form-control" value="<?php echo $uP->id_detail ?>" readonly hidden>
        </div>
          <h5>Nama Barang: <?php echo $uP->nama_barang ?></h5>
          <h5>Produksi: <?php echo $uP->nama_pm ?></h5>
          <h5>Ukuran: <?php echo $uP->ukuran ?></h5>
        <div class="form-group">
          <label class="col-form-label" for="inputharga">Harga Barang</label>
          <div class="input-group input-group-prepend">
            <span class="input-group-text bg-gradient-info text-white">Rp</span>
            <input type="number" min="0" class="form-control" id="inputharga" name="inputharga" value="<?php echo $uP->harga_barang ?>" required><br>
          </div>
        </div>
        <div class="form-group">
          <label for="inputstocksisa">Stok Sisa</label>
          <input type="number" min="0" class="form-control" name="inputjumlahsisa" id="inputstocksisa" placeholder="Stok Sisa" value="<?php echo $uP->sisa_stok ?>" required readonly>
        </div>
        <div class="form-group">
          <label for="inputjumlahtambah">Stok Baru</label>
          <input type="number" class="form-control" name="inputjumlahtambah" id="inputjumlahtambah" placeholder="Stok Tambah" value="0" required>
          <div class="text-center font-weight-light text-danger err">
          </div>
        </div>
        <div class="form-group">
          <label for="inputketerangan">Keterangan</label>
          <input type="text" class="form-control" name="inputketerangan" id="inputketerangan" value="<?php echo $uP->keterangan ?>" placeholder="Keterangan Barang">
        </div>
        <button type="button" class="btn btn-gradient-primary mr-2" onclick="updateBarang()">Submit</button>
        <button class="btn btn-light" data-dismiss="modal">Cancel</button>
      <?php endforeach; ?>
    </form>
  </div>
</div>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#idmetrik').select2({
                    placeholder: "Pilih Satuan Metrik",
                    allowClear: true
             });
    });
    </script>
    <script type="text/javascript">
    function updateBarang(){
      form = $(".updatepm5").serialize();
      $.ajax({
        type:"POST",
        url: "<?php echo base_url(); ?>produksi/updateStock",
        dataType: "json",
        data: form,
        success: function(list){
          if (list.status == 'bound_of_size') {
            $('.err').html(list.err_1);
          }
          else if (list.status == 'success') {
            $('#modal').modal('hide');
          }
        }
      });
    }
    </script>
