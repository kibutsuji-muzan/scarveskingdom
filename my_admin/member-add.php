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
  <title>Our Members</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins - folder instead of downloading all of them to reduce the load. -->
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
        <h1>Our Telecallers </h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Add New Telecaller</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Add New Telecaller</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <a href="member-all.php" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a> &nbsp; <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data" name="form">
                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <?php
                      $username = '';
                      $password = '';
                      //
                      if (isset($_POST['submit'])) {
                        $username = trim($_POST['username']);
                        $password = md5(trim($_POST['password']));
                        $query2 = mysqli_query($con, "SELECT * FROM site_member WHERE username='$username'");
                        $result = mysqli_num_rows($query2);
                        if ($result >= 1) {
                          echo "<p style='color:#d65906; border:1px solid #f3a62d; background:#fbdcac; padding:10px 20px 10px 20px'>" . $username . ", already registered!</p>";
                        } else {
                          //Writes the information to the database
                          mysqli_query($con, "INSERT INTO site_member (username, passwd, status) VALUES ('$username', '$password', 'True')");
                          //
                          $username = '';
                          $password = '';
                          echo "<p style='color:green; border:1px solid #8cc884; background:#bad8b6; padding:10px 20px 10px 20px'>Done, User successfully added.</p>";
                        }
                      }
                      ?>
                    </div>
                  </div>

                    <h3>&nbsp;Login Info:</h3>
                    <div class="row pad">
                      <div class="col-md-6 col-sm-12 pad"><input type="text" name="username" class="form-control" id="username" maxlength="44" placeholder="Create Username" value="<?php echo $username; ?>" required /></div>
                      <div class="col-md-6 col-sm-12 pad"><input type="password" name="password" class="form-control" id="password" maxlength="44" placeholder="Create Password" required /></div>
                    </div>

                  <div class="row pad">
                    <div class="col-md-6 col-sm-12 pad"><input type="submit" name="submit" id="submit" value="Add Now" class="btn btn-success btn-lg"></div>
                  </div>

                </form>
              </div><!-- /.box-body -->
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
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- SlimScroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
  <!-- FastClick -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "order": [
          [0, "desc"]
        ]
      });
    });
  </script>
  <!-- iCheck -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>