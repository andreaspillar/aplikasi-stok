<?php
 	require_once(APPPATH.'views/include/headers-guest.php');
?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-light text-left p-5">
              <h4>Stock PiP PM5/6/9</h4>
              <h5>PT. Pura Barutama</h5>
              <h6 class="font-weight-light">Daftar Sales</h6>
              <form class="pt-2" method="post" action="<?php echo site_url('login/signupchallenge') ?>">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email Anda" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Nama Pengguna" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)||(event.charCode >= 65 && event.charCode <= 90)||(event.charCode >= 97 && event.charCode <= 122)" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Kata Sandi" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="phoneNumber" name="phoneNumber" placeholder="Nomor Telepon" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                </div>
                <div class="form-group">
                  <select class="form-control form-control-lg" name="lokasi" required>
                    <option value="">--</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Surabaya">Surabaya</option>
                  </select>
                </div>
                <div class="mt-3">
                  <button type="submit" name="signup" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn">Buat Akun</button>
                </div>
                <div class="text-center mt-4 font-weight-light text-danger">
                  <?php echo $this->session->flashdata('msg'); ?></a>
                </div>
                <div class="mt-3">
                  <a href="<?php echo site_url('guest/index') ?>" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Menu Utama</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
