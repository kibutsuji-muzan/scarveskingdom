<?php
	//
	session_start();
	include('config.php');
	//Unset the variables stored in session
	unset($_SESSION['SESS_ADMIN_ID']);
	unset($_SESSION['SESS_ADMIN_FNAME']);
	unset($_SESSION['SESS_ADMIN_LNAME']);
if(isset($_POST['submit'])){
	//
	$errmsg_arragoy = array();
	//Validation error flag
	$errflaglets = false;
	//Sanitize the POST values 
	$email = $_POST['username'];
	$passwd = mysqli_real_escape_string($con, $_POST['password']); //Prevents SQL injection
	$password = md5($passwd);
	//Create query
	$qry="SELECT * FROM site_admin WHERE login='$email' AND passwd='$password'";
	$result=mysqli_query($con, $qry);
	//
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_ADMIN_ID'] = $member['id'];
			$_SESSION['SESS_ADMIN_FNAME'] = $member['firstname'];
			$_SESSION['SESS_ADMIN_LNAME'] = $member['lastname'];
			session_write_close();
			//if ($level="admin"){
			header("location: dashboard.php");
			exit();
			//}
			//else{
			//header("location: front.php");
			//exit();
			//}
			}
		else {
			//Login failed
			$errmsg_arragoy[] = 'Invalid Username or Password!';
			$errflaglets = true;
			if($errflaglets) {
		$_SESSION['ERRMSG_ARROGOY'] = $errmsg_arragoy;
		session_write_close();
		header("location: ../my_admin");
		exit();
		}
		}
	}else {
		die("Query failed");
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator Login</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="./"><b>Web</b>Admin</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Administrator Login</p>
<?php
	if( isset($_SESSION['ERRMSG_ARROGOY']) && is_array($_SESSION['ERRMSG_ARROGOY']) && count($_SESSION['ERRMSG_ARROGOY']) >0 ) {
		foreach($_SESSION['ERRMSG_ARROGOY'] as $msg) {
			echo '<p style="color:#CC0000; padding:8px 4px;"> <i class="fa fa-warning"></i> '.$msg.'</p>'; 
		}
		unset($_SESSION['ERRMSG_ARROGOY']);
	}
?> 
        <form action="" method="post" name="form" id="form" >
          <div class="form-group has-feedback">
            <input type="text" name="username" id="username" class="form-control" value="" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-lock"></i> Secure Login</button>
            </div><!-- /.col -->
          </div>
        </form>
        <hr />
        <a href="../"><i class="fa fa-arrow-left"></i> Back to Homepage</a><br>
        <!--<a href="" class="text-center">Register a new membership</a> -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
