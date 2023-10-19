<?php
/*
Place code to connect to your DB here.
*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
//
$list_id = $_REQUEST['id'];
$cat = $_REQUEST['cat'];
$page = $_REQUEST['page'];
//
//delete breaking
if (isset($_REQUEST['del'])) {
  $del_id = $_REQUEST['del'];
  $file = "../uploads/" . $_REQUEST['fi'];
  $sql = "Delete from collection_pix where id='$del_id';";
  $result = mysqli_query($con, $sql);
  unlink($file);
}
// Upload
if (isset($_POST["UploadPhoto"])) {
  $title = $_POST["alt"];
  $title = preg_replace("/['']/", "", $title);
  $is_main = $_POST["is_main"];
  if(!empty($is_main)){
    $is_main = "1";
  }
  else{$is_main = "0";}
  date_default_timezone_set("Asia/Kolkata");
  $new_log = date("Y-m-d H:i:s");
  $year = date("Y");
  $month = date("m");
  // Create Year folder if not exists
  if (!file_exists('../uploads/' . $year)) {
    mkdir('../uploads/' . $year, 0755, true);
  }
  // Create Month folder if not exists
  if (!file_exists('../uploads/' . $year . '/' . $month)) {
    mkdir('../uploads/' . $year . '/' . $month, 0755, true);
  }
  $target_dir = "../uploads/" . $year . "/" . $month . "/";
  $uid = $_SESSION['SESS_ADMIN_ID'];
  $file_name = basename($_FILES["ImageFile"]["name"]);
  $target_file = $target_dir . $file_name;
  // Check if file already exists
  if (file_exists($target_file)) {
    $rand = rand(0000, 9999);
    $target_file = $rand . basename($_FILES["ImageFile"]["name"]);
  } else {
    $target_file = basename($_FILES["ImageFile"]["name"]);
  }
  $target_file = $target_dir . $target_file;
  $image = substr($target_file, 11, 999);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if (isset($_POST["UploadPhoto"])) {
    $check = getimagesize($_FILES["ImageFile"]["tmp_name"]);
    if ($check !== false) {
      //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      //echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  // Check file size
  if ($_FILES["ImageFile"]["size"] > 500000) {
    echo '<script language="javascript">alert("Sorry, your file is too large!")</script>';
    $uploadOk = 0;
  }
  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo '<script language="javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed!")</script>';
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["ImageFile"]["tmp_name"], $target_file)) {
      //insert to database
      $sql = "INSERT into collection_pix (coll_id, img, alt, is_main_img) VALUES ('$list_id', '$image', '$title', $is_main)";
      mysqli_query($con, $sql);
      //echo "Photograph has been uploaded";
      //echo '<script language="javascript">alert("Done, Image Uploaded!")</script>';
      //echo "The file ". basename( $_FILES["slip"]["name"]). " has been uploaded.";
    } else {
      echo '<script language="javascript">alert("Sorry, something wrong, please try later!")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collection Image Uploader</title>
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
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include_once('class.left-sidebar.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Collection Image Uploader</h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Collection Image Uploader</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!--  Add image ad st   -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Collection Image Uploader</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <a href="collection-all.php?cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a> &nbsp; <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-3 pad"><input type="file" class="form-control" name="ImageFile" id="ImageFile" required /></div>
                    <div class="col-md-4 pad"><input type="text" class="form-control" name="alt" id="alt" placeholder="Alternate Text" /></div>
                    <div class="col-md-3 pad"><input type="checkbox" value="1" name="is_main" id="is_main"> Set As Main IMG</div>
                    <div class="col-md-2 pad"><button type="submit" class="btn btn-success" value="Upload Photo" name="UploadPhoto"><i class="fa fa-upload"> </i> Upload</button></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">All Images </h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>IMG</th>
                      <th>Alt</th>
                      <th>Is Main IMG</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM collection_pix where coll_id='$list_id' order by id DESC limit 20");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><img src="<?php echo $base_img . $row['img']; ?>" height="80" /></td>
                        <td><?php echo $row['alt']; ?></td>
                        <?php
                          $is_main = $row['is_main_img'];
                          switch ($is_main) {
                            case "1":
                              echo '<td><span class="label label-success">True</span></td>';
                              break;
                            case "0":
                              echo '<td><span class="label label-danger">False</span></td>';
                              break;
                            default:
                              echo '<td><span class="label label-default">Default</span></td>';
                          }
                        ?>
                        <td>
                        <a href="upload-img.php?del=<?php echo $row['id'];?>&fi=<?php echo $row['img'];?>&id=<?php echo $_REQUEST['id'];?>&cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>IMG</th>
                      <th>Alt</th>
                      <th>Is Main IMG</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
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
      $("#example2").DataTable();
      $('#example1').DataTable({
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