<div class="container">
  <div class="container-fluid">
    <form class="insertpm9" method="post">
      <div class="form-group">
        <label for="idbarang">Nama Barang</label><br>
        <select class="form-control" id="idbarang" name="idbarang" style="width:100%;" required>
          <option value=""></option>
          <optgroup label="Produksi PM9">
            <?php
            $this->db->from('tabelbarang');
            $this->db->where('id_pm','3');
            $select = $this->db->get();
            $tbbarang3 = $select->result();
            ?>
            <?php foreach ($tbbarang3 as $t3): ?>
              <option class="pm9" value="<?php echo $t3->id_barang ?>"><?php echo $t3->nama_barang ?></option>
            <?php endforeach; ?>
          </optgroup>
        </select>
      </div>
      <div class="form-group idukuran">
        <label for="inputukuran">Ukuran</label>
        <div class="input-group-ukuran input-group-prepend">
          <input type="number" min="35" max="240" step="5" class="form-control" id="inputukuran" name="inputukuran" required><br>
        </div>
        <div class="text-center font-weight-light text-danger err">
        </div>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="inputharga">Harga Barang</label>
        <div class="input-group input-group-prepend">
          <span class="input-group-text bg-gradient-info text-white">Rp</span>
          <input type="number" min="0" class="form-control" id="inputharga" name="inputharga" required><br>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword4">Jumlah Stok</label>
        <input type="number" min="1" class="form-control" name="inputjumlah" id="inputjumlah" placeholder="Jumlah" required>
      </div>
      <div class="form-group">
        <label for="inputketerangan">Keterangan</label>
        <input type="text" class="form-control" name="inputketerangan" id="inputketerangan" placeholder="Keterangan Barang">
      </div>
      <button type="button" class="btn btn-gradient-primary mr-2" onclick="insertBarang()">Submit</button>
      <button class="btn btn-light" data-dismiss="modal">Cancel</button>
    </form>
    <div class="text-center font-weight-light text-danger err">
    </div>
  </div>
</div>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#idbarang').select2({
                    placeholder: "Pilih Produk",
                    allowClear: true
             });
      $('#idmetrik').select2({
                    placeholder: "Pilih Satuan Metrik",
                    allowClear: true
             });
    });
    </script>
    <script type="text/javascript">
    function insertBarang(){
      // var username = <?php echo $this->session->userdata('logged')['id_user'] ?>;
      form = $(".insertpm9").serialize();
      $.ajax({
        type:"POST",
        url: "<?php echo base_url(); ?>/produksi/insertStock",
        dataType: "json",
        data: form,
        success: function(list){
          if (list.status == 'already_exist') {
            $('.err').html(list.err_1);
          }
          else if (list.status == 'bound_of_size') {
            $('.err').html(list.err_2);
          }
          else if (list.status == 'success') {
            $('#modal').modal('hide');
          }
        }
      });
    }
    </script>
