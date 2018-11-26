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
              <h6 class="font-weight-light">Selangkah Lagi Menuju Login Pertama Anda</h6>
              <form class="pt-2" method="post" action="<?php echo site_url('login/verifyup') ?>">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email Verifikasi">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="verificate" name="verificate" placeholder="Kode Verifikasi">
                </div>
                <div class="text-center mt-4 font-weight-light text-danger">
                  <?php echo $this->session->flashdata('msg'); ?></a>
                </div>
                <div class="mt-3">
                  <button type="submit" name="signup" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn">Verifikasi</button>
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
