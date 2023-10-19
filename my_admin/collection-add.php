<?php
/*
		Place code to connect to your DB here.
	*/
session_start();
require('auth.php');
include('config.php');  // include your code to connect to DB.
//
$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
//
if(isset($_POST['add_collection'])){
  // for colors
  $color = $_POST['color'];
  $N = count($color);
  for ($i = 0; $i < $N; $i++) {
    $colors = $colors . $color[$i] . ',';
  }
  $name = $_POST['name'];
  $tbl_data = addslashes($_POST['tbl_data']);
  $lead_time = addslashes($_POST['lead_time']);
  $other_para = addslashes($_POST['other_para']);
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  // Check Duplicate business name by ignoring spaces
  $query1 = mysqli_query($con, "SELECT name FROM site_collections WHERE REPLACE(name, ' ', '') = REPLACE('$name', ' ', '')");
  $res1 = mysqli_num_rows($query1);
  if ($res1 >= 1) {
    //Name already Registered warning...
    echo '<script language="javascript">alert("Sorry, Collection Already Added!")</script>';
  }
  else {
  //Writes the information to the database
  mysqli_query($con, "INSERT INTO site_collections (cat, name, tbl_data, lead_time, other_para, price, sale_price, status) VALUES ('$cat', '$name', '$tbl_data', '$lead_time', '$other_para', '$price', '$sale_price', '1')");
  echo '<script language="javascript">alert("Done, Collection Added Successfully!")</script>';
  $name = "";
  $tbl_data = "";
  $lead_time = "";
  $other_para = "";
  $price = "";
  $sale_price = "";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add <?php echo $cat;?></title>
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
        <h1>Add <?php echo $cat;?> </h1>
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Add New <?php echo $cat;?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <form name="business_info" id="business_info" action="" method="post">
          <div class="col-md-9 col-sm-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Add <?php echo $cat;?></h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <a href="collection-all.php?cat=<?php echo $cat;?>&page=1" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a> &nbsp; <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                  <div class="row pad">
                    <div class="col-md-12 col-sm-12"><label>Item Name</label> <input type="text" class="form-control" name="name" value="<?php if(!empty($name)){echo $name;}?>" placeholder="Enter Name" maxlength="120" required /></div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-6 col-sm-12">
                      <input type="text" class="form-control" name="price" value="<?php if(!empty($price)){echo $price;}?>" placeholder="Price" maxlength="88" required />
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <input type="text" class="form-control" name="sale_price" value="<?php if(!empty($sale_price)){echo $sale_price;}?>" placeholder="Sale Price" maxlength="88" />
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Table Data (Simpy change the values)</label>
                      <textarea name="tbl_data" class="form-control" id="tbl_data" maxlength="3000" rows="6" placeholder="Table Info [3000 char max]"><?php if(!empty($tbl_data)){echo $tbl_data;} else{echo '<table class="table table-bordered table-hover">
                                <tr>
                                    <td>Style No.</td>
                                    <td>NaN</td>
                                </tr>
                                <tr>
                                    <td>Collection Name</td>
                                    <td>XYX</td>
                                </tr>
                                <tr>
                                    <td>Composition</td>
                                    <td>XYZ</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>NaN</td>
                                </tr>
                                <tr>
                                    <td>MOQ</td>
                                    <td>NaN</td>
                                </tr>
                                <tr>
                                    <td>Production Time</td>
                                    <td>55-60 days</td>
                                </tr>
                            </table>';}?></textarea>
                    </div>
                  </div>
                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Lead Time (Simpy change the values)</label>
                      <textarea name="lead_time" class="form-control" id="lead_time" maxlength="3000" rows="6" placeholder="Table Info [3000 char max]"><?php if(!empty($tbl_data)){echo $tbl_data;} else{echo '<table class="table table-bordered table-hover">
                                <tr>
                                    <td>Quantity (pieces)</td>
                                    <td>1000-5000</td>
                                    <td>5000-10000</td>
                                    <td>10000-50000</td>
                                    <td>50000 Above</td>
                                </tr>
                                <tr>
                                  <td>Estimated Time (days)</td>
                                  <td>20</td>
                                  <td>30</td>
                                  <td>45</td>
                                  <td>60</td>
                                </tr>
                                <tr>
                                    <td>Price $ (per piece)</td>
                                    <td>2.5</td>
                                    <td>2.4</td>
                                    <td>2.25</td>
                                    <td>2.15</td>
                                </tr>
                            </table>';}?></textarea>
                    </div>
                  </div>

                  <div class="row pad">
                    <div class="col-md-12 col-sm-12">
                      <label>Other Para</label>
                      <textarea class="form-control" id="other_para" name="other_para" maxlength="3000" rows="6" placeholder="Other Para [3000 char max]"><?php if(!empty($other_para)){echo $other_para;}?></textarea>
                    </div>
                  </div>
                  <br />
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
          <div class="col-md-3 col-sm-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Select Colors</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="display: block; height: 400px; overflow-y: auto; overflow-x: hidden;">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM color_options order by id");
                    $result = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <tr>
                        <td><input type="checkbox" name="color[]" value="<?php echo $row['color_code']; ?>" /></td>
                        <td><div style="padding:4px 4px; width:24px; height:22px; background:<?php echo $row['color_hex']; ?>">&nbsp;</div></td>
                        <td><strong><?php echo $row['color_code']; ?></strong></td>
                      </tr>
                    <?php } ?>
                  </table>
                  <hr />
                  <p><strong>Note-</strong> Select relivant color options.</p>
                  <div class="form-group"><button class="btn btn-lg btn-success" type="submit" name="add_collection" id="add_collection" value="add"><i class="fa fa-plus"></i>  Collection</button></div>
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