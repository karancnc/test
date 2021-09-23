<?php
include("admin/config.php");
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword,$dbname);
$select=mysqli_query($conn,"SELECT * FROM `extra_details`");
while($row=mysqli_fetch_array($select)){

    $email1=$row['email'];

}
?>
<?php
/* Set e-mail recipient */
$myemail  = "$email1";

/* Check all form inputs using check_input function */

$f_name = $_REQUEST['First_Name'];
$l_name  = $_REQUEST['Last_Name'];
$city  = $_REQUEST['City'];
$mobile  = $_REQUEST['Mobile'];
$lead_source  = $_REQUEST['Lead_Source'];
$bus_licence  = $_REQUEST['LEADCF6'];
$promotional = $_REQUEST['Email_Opt_Out'];
$us = $_REQUEST['sf'];
$um = $_REQUEST['um'];

if($promotional=='on'){
    $checkbox='Checked yes';
}
else{
    $checkbox='Checked no';
}


$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
$headers .= 'From: "noreplay@topcampaign.co.il" <Driver>'; 

$message = "Hello!\r\n";
$message .="Your form has been submitted by:\r\n <br />";
$message .='<html style="direction:rtl;"><body style="direction:rtl";>';
$message .="שם פרטי: $f_name\r\n <br />";
$message .="שם משפחה: $l_name\r\n <br />";
$message .="עיר מגורים: $city\r\n <br />";
$message .="טלפון: $mobile\r\n <br />";
$message .="יש לי רישיון לאוטובוס: $bus_licence\r\n <br />";
$message .="מעוניין לקבל מידע פרסומי: $checkbox\r\n <br />";
$message .="Utm מָקוֹר: $us\r\n <br />";
$message .="Utm בינוני: $um\r\n <br />";
$message .="</body></html>";


/* Send the message using mail() function */
mail($myemail, "Driver", $message, $headers);

include("admin/config.php");

$query = "INSERT INTO user_data (f_name, l_name, city, mobile, bus_licence, promotional, lead_source, utm_source, utm_medium) 
          VALUES('$f_name','$l_name','$city','$mobile','$bus_licence','$checkbox', '$lead_source', '$us', '$um')";
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
mysqli_set_charset($conn, 'utf8mb4');


mysqli_query($conn,$query);

mysqli_close($conn);

?>