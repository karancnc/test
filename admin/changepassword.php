<?php
ob_start();
$msg='';
session_start();
 function do_alert($msg)
  {
    echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
  }

if (!isset ($_SESSION['user']))
{
  do_alert("Hello stranger!! Welcome to our website.Login to get started");
  echo '<script>top.location.href="index.php"</script>';
  exit ();
}
if(isset($_REQUEST['submit'])){
include("config.php");

 $conn = mysqli_connect($dbhost, $dbusername, $dbpassword,$dbname);
 

             //select querry for the getting all the values and stat
$selectquery =mysqli_query($conn,"SELECT * FROM `admin`");
while($row=mysqli_fetch_array($selectquery)){
  $adminpass=$row['password'];
}
$cpassword=$_REQUEST['opassword'];
$newpassword=$_REQUEST['npassword'];
if($cpassword==$adminpass){
mysqli_query($conn,"update `admin` set `password`='$newpassword' where ID=1") or die(mysql_error());
$msg="Your Password is successfully updated";
}
else{
$msg="Your previous password doesn't match";
}
}
?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change Setting</title>

<meta charset=utf-8 />
<style>
  article, aside, figure, footer, header, hgroup,
  menu, nav, section { display: block; }
</style>


<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="css/styles.css"  rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="bootstrap.css" />
<script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>

</head>

<body >
<div class="container canvas">

<div class="topbar" data-scrollspy="scrollspy">
      <div class="topbar-inner">
        <div class="container canvas">
          <a class="brand" href="viewmembers.php">Dashboard</a>
          <ul class="nav">

          </ul>
           <div class="navbar pull-right" style="margin-top: 7px;">
<a href="logout.php" class="btn primary">LogOut</a></div>

        </div>
      </div>

      </div>
    <div style="margin-top: 50px;"><h1> <?php echo $msg; ?></h1></div>
 <div class="page-header" style="margin-top: 50px;">

    <h1>Update Password</h1>
  </div>



  <form method="post" action="changepassword.php">
<div class="clearfix">
<div class="xlInput">Old Password:</div>
<div class="input"><div ><input type="password" name="opassword" class="xlarge" /></div></div>
</div>
      <div class="clearfix">
<div class="xlInput"></div>
<div class="input"></div>
</div>
<div class="clearfix">
<div class="xlInput">New Password:</div>
<div class="input"><div ><input type="password" name="npassword"  class="xlarge" /></div></div>
</div>
   <div class="clearfix">
<div class="xlInput"></div>
<div class="input"></div>
</div>
<div class="clearfix">
<div class="xlInput">  </div>
<div class="input"><div ><input type="Submit" class="btn primary" name="submit" value="Change Password">
</div></div></div></form>
</div>
</body>
</html>