<?php
/*
		Place code to connect to your DB here.
	*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
//
$list_id = $_REQUEST['edit'];
$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
// Update Info
if(isset($_POST['save_collection'])){
  // for colors
  $color = $_POST['color'];
  if(!empty($color)){
  $N = count($color);
  for ($i = 0; $i < $N; $i++) {
    $colors = $colors . $color[$i] . ',';
  } }
  else{
  $colors = "";
  }
  $name = $_POST['name'];
  $tbl_data = addslashes($_POST['tbl_data']);
  $lead_time = addslashes($_POST['lead_time']);
  $other_para = addslashes($_POST['other_para']);
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  //
  $status = $_POST['status'];
  // Check Duplicate business name by ignouring
  $query1 = mysqli_query($con, "SELECT name FROM site_collections WHERE REPLACE(name, ' ', '') = REPLACE('$name', ' ', '') AND id!='$list_id'");
  $res1 = mysqli_num_rows($query1);
  if ($res1 >= 1) {
    //Name already Registered warning...
    echo '<script language="javascript">alert("Sorry, This Collection Already Added!")</script>';
  }
  else {
  $update_qry = "UPDATE site_collections SET name='$name', tbl_data='$tbl_data', lead_time='$lead_time', other_para='$other_para', price='$price', sale_price='$sale_price', colors='$colors', status='$status' where id='$list_id'";
  $update_do = mysqli_query($con, $update_qry);
  // Redirect after updation
  echo '<script type="text/javascript">window.location="collection-all.php?cat='.$cat.'&page='.$page.'"</script>';
}
}
?>
<?php
if (!empty($list_id)) {
  $sql = "Select * from site_collections where id=$list_id";
  $result = mysqli_query($con, $sql);
  $listing = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update <?php echo $cat;?></title>
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
  <script language="JavaScript">
    function enable_text(status) {
      status = !status;
      document.MyForm.passwd.disabled = status;
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
        <h1>Update <?php echo $cat;?> </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Update <?php echo $cat;?> </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <form action="" method="post" enctype="multipart/form-data" name="MyForm" id="MyForm">
          <div class="col-md-9 col-sm-12">
            <!-- /.col -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title margin">&nbsp; Update <?php echo $cat;?></h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <a href="collection-all.php?cat=<?php echo $cat;?>&page=<?php echo $page;?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a> &nbsp; <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body">
                
                  <div class="row pad">
                    <div class="col-md-12 col-sm-12"><label>Collection Name</label> <input type="text" class="form-control" name="name" value="<?php echo $listing['name'];?>" placeholder="Collection Name" maxlength="120" required /></div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-6 col-sm-12">
                      <input type="text" class="form-control" name="price" value="<?php echo $listing['price'];?>" placeholder="Price" maxlength="88" required />
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <input type="text" class="form-control" name="sale_price" value="<?php echo $listing['sale_price'];?>" placeholder="Sale Price" maxlength="88" />
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Table Data</label>
                      <textarea name="tbl_data" class="form-control" id="tbl_data" maxlength="3000" rows="6" placeholder="Table Info [3000 char max]"><?php echo $listing['tbl_data'];?></textarea>
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Lead Time</label>
                      <textarea name="lead_time" class="form-control" id="lead_time" maxlength="3000" rows="6" placeholder="Table Info [3000 char max]"><?php echo $listing['lead_time'];?></textarea>
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Other Para</label>
                      <textarea class="form-control" id="other_para" name="other_para" maxlength="3000" rows="6" placeholder="Other Para [3000 char max]"><?php echo $listing['other_para'];?></textarea>
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-6 col-sm-12">
                      <label>Collection Status</label>
                      <select name="status" id="status" class="form-control">
                        <option value="<?php echo $listing['status'];?>"><?php echo $listing['status'];?></option>
                        <option value="1">1 - True</option>
                        <option value="0">0 - False</option>
                      </select>
                    </div>
                  </div>
              </div><!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Select Colors</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden;">
                    <?php
                    // get colors array
                    $colors = $listing['colors'];
                    $myArray = explode(',', $colors);
                    //print_r($myArray);
                    $query = mysqli_query($con, "SELECT * FROM color_options order by id");
                    $result = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><input type="checkbox" name="color[]" value="<?php echo $row['color_code']; ?>" <?php $find = $row['color_code'];
                                                                                                                          if (in_array($find, $myArray)) {
                                                                                                                            echo "checked";
                                                                                                                          } ?> /></td>
                        <td><div style="padding:4px 4px; width:24px; height:22px; background:<?php echo $row['color_hex']; ?>">&nbsp;</div></td>
                        <td><strong><?php echo $row['color_code']; ?></strong></td>
                      </tr>
                    <?php } ?>
                  </table>
                  <hr />
                  <p><strong>Note-</strong> Select relivant color options.</p>
                  <div class="form-group"><button class="btn btn-lg btn-success" type="submit" name="save_collection" id="save_collection" value="add"><i class="fa fa-save"></i>  Save Info</button></div>
                </div>
              </div>
            </div>
        </form>
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
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  <script>
    $(function() {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      //Remove bellow line's comment mark to activate CK Editor
      CKEDITOR.replace('other_para');
      CKEDITOR.replace('tbl_data');
      CKEDITOR.replace('lead_time');
      //bootstrap WYSIHTML5 - text editor
      //$(".textarea").wysihtml5();
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