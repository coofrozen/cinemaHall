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
                <a href="<?php echo base_url("home")?>" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><img length="30px" width="30px" src="<?php echo base_url("assets/img/hole.png")?>" class="brandlogo-image"></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><img length="150px" width="150px" src="<?php echo base_url("assets/img/hole.png")?>" class="brandlogo-image"></span>
                </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-newspaper text-red"></i><span>&nbsp;NEWS</span> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fas fa-lightbulb text-yellow"></i> <span>&nbsp;TechTips</span>
                          <span class="label label-primary pull-right">6</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#"><i class="fa fa-envelope-open text-blue"></i> <span>&nbsp;Forums</span></a>
                    </li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-download text-yellow"></i><span>&nbsp;Downloads</span><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url("do_files")?>"><i class="fas fa-file-pdf text-yellow"></i> <span>&nbsp;Files</span></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fab fa-app-store text-green"></i> <span>&nbsp;Apps</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#"><i class="fas fa-file text-blue"></i> <span>&nbsp;NOSM Templates</span></a>
                    </li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-desktop text-red"></i><span>&nbsp;Dashboard</span> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="<?php echo base_url("tt_list");?>"><i class="fa fa-tasks text-blue"></i> <span>&nbsp;TT Trend</span></a>
                    </li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bicycle text-yellow"></i><span>&nbsp;Others</span><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="<?php echo base_url("Structure");?>"><i class="fa fa-sitemap text-yellow"></i> <span>&nbsp;NOSM Structure</span></a>
                    </li>
                    <li class="bg-success">LINKS</li>
                    <li>
                      <a href="https://intranet.ethiotelecom.et" target='_blank'><span>&nbsp;Intranet</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="https://mail.ethiotelecom.et/owa" target='_blank'> <span>&nbsp;ET Mail</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#" target='_blank'> <span>&nbsp;Bulk SMS</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#" target='_blank'> <span>&nbsp;FMS</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#" target='_blank'> <span>&nbsp;PMS</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="#" target='_blank'> <span>&nbsp;Net Eco</span></a>
                    </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url("contactus")?>"><i class="fas fa-lightbulb text-yellow"></i> <span>&nbsp;Contact Us</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url("faq")?>"><i class="fa fa-envelope-open text-blue"></i> <span>&nbsp;FAQ</span></a>
                    </li>
                </ul>
              </li>
              <li>
                  <a href="<?php echo base_url("login")?>">
                     <i class="text-danger fas fa-sign-in-alt"></i>&nbsp;Login 
                  </a>
              </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>





