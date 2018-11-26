<?php foreach ($load as $dD): ?>
  <h6 class="text-info statusMsg"></h6>
  <h4><?php echo $dD->nama_barang ?></h4>
  <table>
    <tr hidden>
      <td hidden><h6 hidden>id_inden:</h6></td>
      <td hidden>
        <h6 hidden class="iddetail"><?php echo $dD->id_inden ?></h6>
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
      <td><h6>Pemesanan:</h6></td>
      <td>
        <h6><?php echo $dD->jumlah ?></h6>
      </td>
    </tr>
  </table>
  <form method="post" action="">
    <h6>Ganti Status</h6>
    <div class="form-group idukuran">
          Pending &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="stabar" value="Pending" id="stabar" ><br>
          In Progress&nbsp&nbsp<input type="radio" name="stabar" id="stabar" value="Process">
    </div>
    <div class="form-group iddate">
      <label for="inputtanggal">Tanggal Kirim</label>
      <div class="input-group-ukuran input-group-prepend">
        <input class="form-control" type="text" name="tanggal" id="datepicker" required size="30">
      </div>
    </div>
    <div class="mt-3">
      <button type="button" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn" onclick="kirimTransaksi()">Ganti Status</button>
    </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.iddate').hide();
      $("input[name=stabar]:radio").click(function () {
          if ($('input[name=stabar]:checked').val() == "Pending") {
              $('#datepicker').val("");
              $('.iddate').hide();

          } else if ($('input[name=stabar]:checked').val() == "Process") {
              $('.iddate').show();
          }
      });
      $("#datepicker").datepicker({
        dateFormat:"yy-mm-dd",
        dayNamesMin: [ "Mg", "Sn", "Sl", "Rb", "Km", "Jm", "Sa" ],
        monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
        minDate: 'today',
    });
    });
  </script>
  <script type="text/javascript">
    function kirimTransaksi(){
      var username = <?php echo $this->session->userdata('logged')['id_user'] ?>;
      var idinden = $(".iddetail").html();
      var status = $('input[name=stabar]:checked').val()
      var tangkir = $("#datepicker").val();
      $.ajax({
        type:"POST",
        url: "<?php echo base_url(); ?>produksi/kirimStatus",
        data: {uname:username,
          idbar:idinden,
          status:status,
          stbar:tangkir,
        },
        success: function(msg){
          $('#modal').modal('hide');// $('.statusMsg').html('Terima Kasih sudah memesan barang, Silahkan kembali ke halaman utama.');
        }
      });
    }
  </script>
</form>
<?php endforeach; ?>
