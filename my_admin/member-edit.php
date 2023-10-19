<?php
/*
		Place code to connect to your DB here.
	*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
// update members details
$id = $_REQUEST['edit'];
$redirect_to = $_REQUEST['redirect_to'];
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pwd = $_POST['passwd'];
  $is_email_verified = $_POST['is_email_verified'];
//
  if ($pwd != null) {
    $my_pwd = md5($pwd);
    $sql = "UPDATE dk_members SET email='$email', password='$my_pwd', is_email_verified='$is_email_verified' where id='$id';";
    mysqli_query($con, $sql);
    echo '<script type="text/javascript">window.location="http://' . $redirect_to . '"</script>';
  } else {
    $sql = "UPDATE dk_members SET email='$email', is_email_verified='$is_email_verified' where id='$id';";
    mysqli_query($con, $sql);
    echo '<script type="text/javascript">window.location="http://' . $redirect_to . '"</script>';
  }
}
?>
<?php
if (!empty($id)) {
  $sql = "Select * from dk_members where id=$id";
  $result = mysqli_query($con, $sql);
  $row3 = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Member Details</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins - folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script language="JavaScript">
    function enable_text(is_email_verified) {
      is_email_verified = !is_email_verified;
      document.MyForm.passwd.disabled = is_email_verified;
    }
  </script>
</head>
<body onload=enable_text(false); class="hold-transition skin-blue sidebar-mini">
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
        <h1>Update Member Details </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Update Member </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- /.col -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title margin">&nbsp; Update Member</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <a onclick="history.back()" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a> &nbsp; <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body margin">
                <form action="" method="post" enctype="multipart/form-data" name="MyForm" id="MyForm">
                  <h3>&nbsp; Login Info:</h3>
                  <div class="row pad">
                    <div class="col-md-6 col-sm-12"><label>E-Mail</label> <input name="email" type="text" id="email" class="form-control" maxlength="88" value="<?php echo $row3['email']; ?>" required></div>
                    <div class="col-md-6 col-sm-12"><label>Want to reset password?</label> <input type="checkbox" name="others" onClick="enable_text(this.checked)"> YES <input name="passwd" type="text" id="passwd" class="form-control" maxlength="44" value="" required /></div>
                  </div>
                  <div class="row pad">
                  <div class="col-md-4 col-sm-12"><label>Is Verified</label> <select name="is_email_verified" id="is_email_verified" class="form-control">
                        <option value="<?php echo $row3['is_email_verified']; ?>"><?php echo $row3['is_email_verified']; ?></option>
                        <option value="1">1 - Verified</option>
                        <option value="0">0 - Unverified</option>
                      </select>
                    </div>
                  </div>
                  <div class="row pad">
                    <div class="col-md-6 col-sm-12"><button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Save Changes </button></div>
                  </div>
                  <br />


                </form>
              </div><!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
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
</body>

</html>