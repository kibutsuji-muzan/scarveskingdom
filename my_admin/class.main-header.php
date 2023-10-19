<header class="main-header">
  <!-- Logo -->
  <a href="dashboard.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Web</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Web </b>Admin</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['SESS_ADMIN_FNAME']; ?> <?php echo $_SESSION['SESS_ADMIN_LNAME']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['SESS_ADMIN_FNAME']; ?> <?php echo $_SESSION['SESS_ADMIN_LNAME']; ?>
                <small>Administrator</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
              </div>
              <div class="pull-right">
                <a href="loggout-exec.php" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
        </li>
      </ul>
    </div>

  </nav>
</header>