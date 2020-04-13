<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	
        <title>Login</title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
			<script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">

      <link rel="shortcut icon" href="<?php echo base_url('assets/img/favi.png')?>" type="image/x-icon">
			
<style >
    .login {
  padding-top: 40px;
  padding-bottom: 40px;
  background: url("<?php echo base_url('assets/img/pattern/crissXcross.png')?>") repeat #444;
  }
  .welc{
    color: white;
  }
  img{
      margin: 12px;
    }
  
</style>
    </head>
   <body class="login">

      <div class="form-signin">
    <div class="text-center">
        <img src="assets/img/favi.png" length="200px" width="200px">
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo base_url();?>login/validate" method="post" id="login">
                <p class="text-muted text-center">
                    Please Enter your username and password
                </p>
                <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
              <div class="alert alert-danger">
                 <button class="close" data-dismiss="alert">&times</button>
                 <?php print_r($msg); ?>
              </div>
                 <?php } ?>
                <input type="text" name="username" placeholder="Username" class="form-control top">
                <input type="password" name="password" placeholder="Password" class="form-control bottom">
    <br>
                <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Please Contact System Administrator To Reset Password</p>
                <hr>
                <a class="btn btn-lg btn-danger btn-block" href="mailto:anania.mesfin@ethiotelecom.et">Contact</a>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="<?php echo site_url("home")?>">Return</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>

        </ul>
    </div>
  </div>

    <!-- jquery -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>
</html>
