<?php
/*
		Place code to connect to your DB here.
	*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once('class.main-header.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php include_once('class.user-panel.php'); ?>
        <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include_once('class.left-sidebar.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <a href="#biz-all.php?page=1&type=1" class="info-box-icon bg-green"><i class="fa fa-graduation-cap"></i></a>
              <div class="info-box-content">
                <span class="info-box-text">Success Leads</span>
                <?php
                /*$sql1 = "SELECT id FROM dk_business_listing where status='1' order by id DESC";
                $result = mysqli_query($con, $sql1);
                $count = mysqli_num_rows($result);*/
                ?>
                <span class="info-box-number"><?php //echo $count; ?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <a href="#biz-all.php?page=1&type=0" class="info-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></a>
              <div class="info-box-content">
                <span class="info-box-text">New Leads</span>
                <span class="info-box-number"><?php
                                             /* $query = mysqli_query($con, "Select id from dk_business_listing where status='0';");
                                              $result = mysqli_num_rows($query);
                                              echo $result;*/ ?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <a href="#biz-all.php?page=1&type=0" class="info-box-icon bg-red"><i class="fa fa-graduation-cap"></i></a>
              <div class="info-box-content">
                <span class="info-box-text">Discarted Leads</span>
                <span class="info-box-number"><?php
                                             /* $query = mysqli_query($con, "Select id from dk_business_listing where status='0';");
                                              $result = mysqli_num_rows($query);
                                              echo $result;*/ ?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Notify to Search Engines</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12 margin">
                    <h4>Use this feature to inform search engines (Google, Bing, MSN, etc.) to crawl your website faster, usually after adding some new posts.</h4>
                    <!--<a href="notify-to-search-engines.php" target="_blank" class="btn bg-green btn-lg">Notify Here</a>-->
                  </div>
                  <!-- /.col -->
                </div><!-- /.row -->
              </div><!-- ./box-body -->
              <!-- /.box-footer -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div>

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php include_once('class.footer-panel.php'); ?>
    </footer>
  </div><!-- ./wrapper -->
  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
  <!-- FastClick -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>