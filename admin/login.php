<?php
ob_start();
session_start();
include("config.php");
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$user=$_REQUEST['user'];
$pass= $_REQUEST['pass'];


 $sql = "SELECT * FROM  `admin` where `username`='$user' AND `password`='$pass'";

$result = mysqli_query($conn,$sql);



if (mysqli_num_rows($result) != 1) {
$error = "Bad Login";
function do_alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
 do_alert("Enter correct combination of email and password");
  echo '<script>top.location.href="index.php"</script>';
} else {
      $_SESSION['user'] = $_REQUEST['user'];

echo '<script>top.location.href="viewmembers.php"</script>';

    require("viewmembers.php");
}

?>
