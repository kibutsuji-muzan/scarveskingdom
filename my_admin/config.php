<?php
//error_reporting(0);
$host = "127.0.0.1";    /* Host name */
$user = "u719657030_GRAPHICJUS";         /* User */
$password = "kS4sS|rLq2;I";         /* Password */
$db_name = "u719657030_GRAPHICJUS";   /* Database name */
$base = 'https://www.scarveskingdom.com/';
$base_img = 'https://www.scarveskingdom.com/uploads/';
$base_img_wp = 'https://i0.wp.com/www.scarveskingdom.com/uploads/';
$con = mysqli_connect($host, $user, $password, $db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_set_charset($con, 'utf8');
?>