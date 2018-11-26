<?php
 	require_once(APPPATH.'views/include/headers-head.php');
?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-light text-left p-5">
              <!-- <div class="brand-logo">
                <img src="../../images/logo.svg">
              </div> -->
              <h4>Stock PiP PM5/6/9</h4>
              <h5>PT. Pura Barutama</h5>
              <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
              <form class="pt-2" method="post" action="<?php echo site_url('login/ath') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="text-center mt-4 font-weight-light text-danger">
                  <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <div class="mt-3">
                  <button type="submit" name="signin" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Tidak punya akun? <a href="<?php echo site_url('guest/createaccount/') ?>" class="text-primary">Buat Sekarang</a>
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
