<style type="text/css">
 td,th {
      text-align: center;
    }
    #flot-pie-chart1{
    	width:500px;
    	height: 350px;
    	text-align: left;
    }
    
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        NOSM 
        <small>TT</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("home")?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">TT's Upload</li>
      </ol>
    </section>


  <div class="col-lg-12">
    <div class="row">
      <hr>
        <div class="col-md-6">
          <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">TT BACKLOG</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Department</th>
                    <th>TT > 2 Days</th>
                    <th>TT > 3 Days</th>
                    <th>TT > 5 Days</th>
                    <th><span class="badge bg-red">Total</th>
                  </tr>

                  <?php foreach($result_tt as $book){?>
                     <tr>
                       <td><?php echo $book->new_job;?></td>
                       <td><?php echo $book->g2d;?></td>
                       <td><?php echo $book->g3d;?></td>
                       <td><span class="badge bg-yellow"><?php echo $book->g5d;?></td>
                       <td><span class="badge bg-red"><?php echo $book->total;?></td>
                     </tr>
                  <?php }?>
                  
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

          <div class="col-md-6">
          <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">NOC TT BACKLOG</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Department</th>
                    <th>TT > 2 Days</th>
                    <th>TT > 3 Days</th>
                    <th>TT > 5 Days</th>
                    <th><span class="badge bg-red">Total</th>
                  </tr>

                  <?php foreach($result_tt as $book){?>
                     <tr>
                       <td><?php echo $book->new_job;?></td>
                       <td><?php echo $book->g2d;?></td>
                       <td><?php echo $book->g3d;?></td>
                       <td><span class="badge bg-yellow"><?php echo $book->g5d;?></td>
                       <td><span class="badge bg-red"><?php echo $book->total;?></td>
                     </tr>
                  <?php }?>
                  
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>




        <div class="col-md-6">
         <div class="box panel-red">
         	<div class="box-heading box-danger">
         		<div class="box-title">TT Backlog</div>
         	</div>
              <!-- /.panel-heading -->
              <div class="box-body">
                  <div class="flot-chart">
                      <div class="flot-chart-content" id="flot-pie-chart1"></div>
                  </div>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->

        </div>
        <!-- col-md-6 ended -->
        </div>
     </div>
 <!-- col-lg-12 end end -->
 <div class="col-lg-12">
   <div class="row">
     <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">O&M TT BACKLOG</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Region/Zone</th>
                  <th>TT > 2 Days</th>
                  <th>TT > 3 Days</th>
                  <th>TT > 5 Days</th>
                  <th style="width: 40px"><span class="badge bg-red">Total</th>
                </tr>
                <?php foreach ($region_names as $name) { ?>
                <tr>
                  <td><?php echo $name->Region_Name?></td>
                  <td><span class="badge bg-yellow">5</td>
                  <td><span class="badge bg-yellow">31</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 7%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">520</span></td>
                </tr>
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>

     <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">FAN TT BACKLOG</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Region/Zone</th>
                  <th>TT > 2 Days</th>
                  <th>TT > 3 Days</th>
                  <th>TT > 5 Days</th>
                  <th style="width: 40px"><span class="badge bg-red">Total</th>
                </tr>
                <?php foreach ($region_names as $name) { ?>
                <tr>
                  <td><?php echo $name->Region_Name?></td>
                  <td><span class="badge bg-yellow">5</td>
                  <td><span class="badge bg-yellow">31</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 7%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">520</span></td>
                </tr>
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>

   </div>
 </div>


    <script src="<?php echo base_url('assets/vendor/flot/excanvas.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/flot/jquery.flot.resize.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/flot/jquery.flot.time.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/flot-tooltip/jquery.flot.tooltip.min.js')?>"></script>


<script type="text/javascript">
  
//Flot Pie Chart
$(function() {

    var data1 = [
<?php foreach($result_tt as $book){?>
    {
        label: "<?php echo $book->new_job;?>",
        data: <?php echo $book->total;?>,

    },
<?php }?> 
            ];

    $.plot($("#flot-pie-chart1"), data1, {
          series: {
            pie: { 
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: function(label, series){
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: { 
                        opacity: 0.5,
                        color: '#000'
                    },
                }
            }
        },
        grid: {
            hoverable: true
        },

        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

</script>



</div>

</div>


  

