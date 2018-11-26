              <h4>Stock PiP PM5/6/9</h4>
              <h5>PT. Pura Barutama</h5>
              <form method="post" action="<?php echo site_url('login/ath') ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="text-center mt-4 font-weight-light text-danger">
                  <?php echo $this->session->flashdata('msg'); ?></a>
                </div>
                <div class="mt-3">
                  <button type="submit" name="signin" class="btn btn-block btn-gradient-info btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Tidak punya akun? <a href="<?php echo site_url('guest/createaccount/') ?>" class="text-primary">Buat Sekarang</a>
                </div>
              </form>
