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
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($ch as $c): ?>
                    <?php echo form_open_multipart('sales/changeUser/'.base64_encode($c->id_user));?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <h5>Username</h5>
                            <input type="text" class="form-control" value="<?php echo $c->username ?>" id="username" name="username" placeholder="Nama Pengguna" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)||(event.charCode >= 65 && event.charCode <= 90)||(event.charCode >= 97 && event.charCode <= 122)" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <h5>Foto Profil</h5>
                            <input type="file" name="pic_file" class="form-control" id="pic_file">
                          </div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <h5>Nama Depan</h5>
                              <input type="text" class="form-control" value="<?php echo $c->namadepan ?>" name="namadepan" id="namadepan" placeholder="Nama Depan" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <h5>Nama Belakang</h5>
                              <input type="text" class="form-control" value="<?php echo $c->namabelakang ?>" name="namabelakang" id="namabelakang" placeholder="Nama Belakang">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <h5>Alamat Email</h5>
                              <input type="email" class="form-control" value="<?php echo $c->email_address ?>" id="email" name="email" placeholder="Alamat Email" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <h5>Kata Sandi (abaikan jika tetap)</h5>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Baru ">
                            </div>
                          </div>
                        </div>
                        <div class="text-center mt-4 font-weight-light text-success">
                          <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <br>
                    <button class="btn btn-lg btn-gradient-info" type="submit" name="kirim">Kirim</button>
                  </form>
                <?php endforeach; ?>
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
