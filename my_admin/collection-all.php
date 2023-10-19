<?php
/*
		Place code to connect to your DB here.
	*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
// Get Category
$cat = $_REQUEST['cat'];
// Get page number
$page = $_REQUEST['page'];
if (!empty($page)) {
  $page = $page;
} else {
  $page = '1';
}
//delete member
/*if (isset($_REQUEST['del'])) {
  $del_id = $_REQUEST['del'];
  $sql = "Delete from dk_business_listing where id='$del_id';";
  $result = mysqli_query($con, $sql);
  echo '<script type="text/javascript">window.location="biz-all.php?page='.$_REQUEST['page'].'"</script>';
}*/
/* Delete Action btn
<a href="biz-all.php?del=<?php echo $row['id']; ?>&page=<?php echo $_REQUEST['page'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete <?php echo $row['biz_name'];?>')"><i class="fa fa-trash"></i></a> 
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $cat;?></title>
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
        <h1><?php echo $cat;?> </h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><?php echo $cat;?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><?php echo $cat;?> <a href="collection-add.php?cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-sm bg-maroon margin flat"><i class="fa fa-plus"></i> ADD NEW ITEM</a></h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>IMG</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_REQUEST['cat'])) {
                      $start = $page-1;
                      $start = $start*30;
                      $query = mysqli_query($con, "SELECT id, name, status FROM site_collections where cat='$cat' order by id DESC limit $start, 30");
                      // Check for next rows availability
                      $query2 = mysqli_query($con, "SELECT id, name, status FROM site_collections where cat='$cat' order by id DESC limit $start, 31");
                      $count_row = mysqli_num_rows($query2);
                    }
                    //$result = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo substr($row['name'],0,30);?></td>
                        <td><a href="upload-img.php?id=<?php echo $row['id'];?>&cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-success"><i class="fa fa-upload"></i></a></td>
                        <?php
                        $st = $row['status'];
                        switch ($st) {
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
                        <td><a href="collection-edit.php?edit=<?php echo $row['id']; ?>&cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>IMG</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td colspan="8">
                      <nav aria-label="...">
                        <ul class="pagination">
                          <?php
                          if ($page == 1) {
                            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                          } else {
                          ?>
                          <li class="page-item"><a class="page-link" href="biz-all.php?page=<?php echo $page - 1; ?>">Previous</a></li>
                          <?php } ?>
                          <li class="page-item active" aria-current="page"><span class="page-link"><?php echo $page; ?></span></li>
                          <?php
                          if($count_row > 30){
                          ?>
                          <li class="page-item"><a class="page-link" href="biz-all.php?page=<?php echo $page + 1; ?>">Next</a></li>
                          <?php }
                          else{
                            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                          }
                          ?>
                        </ul>
                      </nav>
                      </td>
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
        "paging": false,
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