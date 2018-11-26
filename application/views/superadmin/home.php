<?php
 	require_once(APPPATH.'views/include/headers-guest.php');
?>
<body>
  <div class="container-scroller">
    <?php
    require_once(APPPATH.'views/include/headers-top.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <?php
      require_once(APPPATH.'views/include/headers-nav-guest.php');
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Beli Kertas
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- recent update change log (contains user, activity, before_value, after_value, tableaffected) -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- recent update change log (contains user, ipaddress, user_agent, timestamp) -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
          $(".btnLogin").click(function(){
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .judul').html("Masuk Untuk Melanjutkan");
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


<table>
  <tr>
    <th>id_user</th>
    <th>log_activity</th>
    <th>before_value</th>
    <th>after_value</th>
    <th>tableaffected</th>
    <th>ip_address</th>
    <th>user_agent</th>
    <th>time_stamp</th>
  </tr>
  <?php foreach ($logan as $lg): ?>
    <tr>
      <td><?php echo $lg->id_user ?></td>
      <td><?php echo $lg->log_activity ?></td>
      <td><?php echo $lg->before_value ?></td>
      <td><?php echo $lg->after_value ?></td>
      <td><?php echo $lg->tableaffected ?></td>
      <td><?php echo $lg->ip_address ?></td>
      <td><?php echo $lg->user_agent ?></td>
      <td><?php echo $lg->time_stamp ?></td>
    </tr>
  <?php endforeach; ?>
</table>
