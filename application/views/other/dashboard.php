 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<div class="jumbotron">
	<div class="container">
		<h1>Welcome  <?php echo ucfirst($this->session->userdata('fullname'));?></h1>
		<p><?php echo lcfirst($this->session->userdata('admin_name'));?> Is Logged in now </p>

		<a href="<?php echo base_url('login/admin_logout')?>" class="btn btn-primary">Click me to Logout <?php echo lcfirst($this->session->userdata('admin_name'));?> only</a>
	</div>
</div>
<hr>


<!-- jquery -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<!-- jQuery Knob -->
<script src="<?php echo base_url('assets/bower_components/jquery-knob/js/jquery.knob.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script> 
	<pre>
	Currnet Session datas Are as follows !
	<?php 

	echo "<pre>";
	print_r($this->session->userdata());

	?>!
	</pre>
</div> 






