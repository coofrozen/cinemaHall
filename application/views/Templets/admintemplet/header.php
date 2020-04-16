<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ucfirst($title);?></title>
  <!-- Tell the browser to be responsive to screen width -->
    
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favi.png')?>" type="image/x-icon">
  <!-- logo of the website goes here -->
  <link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <!-- jquery -->
  <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fawesomenew/css/all.min.css');?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins-->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">

</head>


<body class="hold-transition layout-top-nav skin-purple-light">
<div class="wrapper">

  <header class="main-header">
        <nav class="navbar navbar-static-top navbar-fixed">
          <div class="container-fluid">
          <div class="navbar-header">
                <a href="<?php echo base_url("Admin/home")?>" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><img length="30px" width="30px" src="<?php echo base_url("assets/img/favi.png")?>" class="brandlogo-image"></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><img length="150px" width="150px" src="<?php echo base_url("assets/img/favi.png")?>" class="brandlogo-image"></span>
                </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li>
                  <a href="#"><i class="fas fa-film text-yellow"></i> <span>&nbsp;CINEMAS</span></a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-check-circle text-red"></i> <span>&nbsp;RESERVATIONS</span></a>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="<?php echo base_url('Admin/users')?>" ><i class="fa fa-user text-yellow"></i><span>&nbsp;USERS</span></a>
              </li>
                        <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('upload')."/". $this->session->userdata('pic');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('fullname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('upload')."/". $this->session->userdata('pic');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('fullname');?>
                  <small><?php echo ucfirst($this->session->userdata('type'));?></small>
                  <small>Member since <?php echo date("M-Y", strtotime($this->session->userdata('date_created')));?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-success btn-flat" href="<?php echo base_url('Admin/personal_info');?>">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-danger btn-flat" href="<?php echo base_url('login/admin_logout');?>">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>





