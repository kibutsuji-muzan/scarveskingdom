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
  <title>Change Password</title>
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
          Change Password
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Change Password</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-12">
            <!-- /.col -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title margin">&nbsp; Change Password</h3>
              </div>
              <div class="box-body margin">
                <form name="form" id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" method="post">
                  <div class="row">
                    <div class="col-xs-4">
                      Current Password :
                    </div>
                    <div class="col-xs-8">
                      <input name="current_pwd" type="password" id="current_pwd" class="form-control" placeholder="Current Password">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-xs-4">
                      New Password :
                    </div>
                    <div class="col-xs-8">
                      <input name="new_pwd" type="password" id="new_pwd" class="form-control" placeholder="New Password">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-xs-4">
                      Confirm New Password :
                    </div>
                    <div class="col-xs-8">
                      <input name="confirm_new_pwd" type="password" id="confirm_new_pwd" class="form-control" placeholder="Confirm New Password">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-xs-4">
                      &nbsp;
                    </div>
                    <div class="col-xs-8">
                      <button type="submit" name="Submit" class="btn btn-danger"><i class="fa fa-lock"></i> Change Password</button>
                    </div>
                  </div>

                </form>
                <?php
                if (isset($_POST["Submit"])) {
                  $userid = $_SESSION['SESS_ADMIN_ID'];
                  $current_pwd = md5($_REQUEST['current_pwd']);
                  $new_pwd = $_REQUEST['new_pwd'];
                  $confirm_new_pwd = $_REQUEST['confirm_new_pwd'];
                  $query1 = mysqli_query($con, "Select * from site_admin where id='$userid';");
                  $main = mysqli_fetch_array($query1);
                  $result = $main['passwd'];
                  if (($current_pwd == "" || $new_pwd == "" || $confirm_new_pwd == "")) {
                    echo "<h4 class='text-red margin'>&nbsp; <i class='fa fa-warning'></i> Errer!, Please fill all fields correctly!</h4>";
                  } elseif ($new_pwd != $confirm_new_pwd) {
                    echo "<h4 class='text-red margin'>&nbsp; <i class='fa fa-warning'></i> Errer!, Confirm password must be same as new password!</h4>";
                  }
                  //$result = mysql_num_rows($query1);
                  elseif ($result != $current_pwd) {
                    echo "<h4 class='text-red margin'>&nbsp; <i class='fa fa-warning'></i> Error!, You entered a wrong current password!</h4>";
                  } else {
                    $my_pwd = md5($new_pwd);
                    mysqli_query($con, "UPDATE site_admin SET passwd='$my_pwd' where id='$userid';");
                    echo "<h4 class='text-green margin'>&nbsp; <i class='fa fa-thumbs-up'></i> Done!, Password changed successfully!</h4>";
                  }
                }
                ?>
              </div><!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php include_once('class.footer-panel.php'); ?>
    </footer>
  </div>
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