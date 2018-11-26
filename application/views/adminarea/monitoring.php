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
          <div class="page-header">
            <h3 class="page-title">
              Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4>Transaksi sales tertinggi</h4>
                  <canvas id="trancanvas" height="250"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4>Inden sales tertinggi</h4>
                  <canvas id="indcanvas" height="250"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once(APPPATH.'views/include/tagfooter.php'); ?>
        <!-- partial -->
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
              url:"<?php echo base_url('adminarea/jsonLimitTran/').$locate; ?>",
              method: "get",
              success: function(data){
                console.log(data);
                var nilaiTran = [];
                var userTran = [];
                for (var i in data) {
                  nilaiTran.push(data[i].jumlah_pembelian);
                  userTran.push(data[i].username);
                }
                var ctx = $("#trancanvas");
                var barGraph = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    datasets:[{
                        label: 'Top 5 Tansaksi',
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.5)',
                          'rgba(54, 162, 235, 0.5)',
                          'rgba(255, 206, 86, 0.5)',
                          'rgba(75, 192, 192, 0.5)',
                          'rgba(153, 102, 255, 0.5)',
                          'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                        ],
                        data: nilaiTran,
                        borderWidth:1
                    }],
                    labels:userTran,
                  },
                  options:{
                    scales: {
                        xAxes: [{
                          ticks:{
                            scaleShowLabels: false,
                            // maxRotation: 90,
                            // minRotation: 90,
                            fontSize: 9
                          },
                          scaleLabel: {
                            display: true,
                            labelString: 'Sales'
                          }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                stepSize:100,
                            },
                            scaleLabel: {
                            display: true,
                            labelString: 'Pencapaian'}
                        }]
                    }
                }
                  });
                  //end createchart
              }
            });
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
              url:"<?php echo base_url('adminarea/jsonLimitInd/').$locate; ?>",
              method: "get",
              success: function(datb){
                console.log(datb);
                var nilaiTran = [];
                var userTran = [];
                for (var i in datb) {
                  nilaiTran.push(datb[i].jumlah);
                  userTran.push(datb[i].username);
                }
                var ctx = $("#indcanvas");
                var barGraph = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    datasets:[{
                        label: 'Top 5 Tansaksi',
                        backgroundColor: [
                          'rgba(255, 159, 64, 0.5)',
                          'rgba(153, 102, 255, 0.5)',
                          'rgba(75, 192, 192, 0.5)',
                          'rgba(255, 206, 86, 0.5)',
                          'rgba(54, 162, 235, 0.5)',
                          'rgba(255, 99, 132, 0.5)',
                        ],
                        borderColor: [
                          'rgba(255, 159, 64, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 99, 132, 1)',
                        ],
                        data: nilaiTran,
                        borderWidth:1
                    }],
                    labels:userTran,
                  },
                  options:{
                    scales: {
                        xAxes: [{
                          ticks:{
                            scaleShowLabels: false,
                            // maxRotation: 90,
                            // minRotation: 90,
                            fontSize: 9
                          },
                          scaleLabel: {
                            display: true,
                            labelString: 'Sales'
                          }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                stepSize:100,
                            },
                            scaleLabel: {
                            display: true,
                            labelString: 'Pencapaian'}
                        }]
                    }
                }
                  });
                  //end createchart
              }
            });
        });
      </script>
    </div>
    </div>
</body>
<?php require_once(APPPATH.'views/include/footers.php'); ?>
</html>
