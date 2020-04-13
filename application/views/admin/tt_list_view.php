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
        <li><a href="<?php echo base_url("cofree/home")?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">TT's Upload</li>

      </ol>
    </section>




  <div class="col-lg-12">

      <hr>
        <div class="col-lg-6">

          <div class="table-responsive">
            <table id="table_id1" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" width="100%">
              <thead>
              <tr><td " class="bg-primary" colspan="5"> TT Backlog </td></tr>
              <tr>  
                <th class="success">Department</th>
                <th class="info">TT > 2 Days</th>
                <th class="warning">TT > 3 Days</th>
                <th class="warning">TT > 5 Days</th>
                <th class="danger">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($result_tt as $book){?>
                   <tr>
                    
                   <td class="success"><?php echo $book->new_job;?></td>
                   <td class="info"><?php echo $book->g2d;?></td>
                   <td class="warning"><?php echo $book->g3d;?></td>
                   <td class="warning"><?php echo $book->g5d;?></td>
                   <td class="danger"><?php echo $book->total;?></td>
                   </tr>
              <?php }?>

            </tbody>
          </table>
         </div>
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
 <!-- col-lg-12 end end -->


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


  

