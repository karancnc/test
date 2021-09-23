<?php   header('Content-Type: text/html; charset=utf-8');
error_reporting(0);session_start(); ob_start();
if (!isset ($_SESSION['user']))
{
    function do_alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
    do_alert("Hello stranger!! Welcome to our website.Login to get started");
    echo '<script>top.location.href="index.php"</script>';
    exit ();
}


include("config.php");
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword,$dbname);
 $select=mysqli_query($conn,"SELECT * FROM `extra_details`");
while($row=mysqli_fetch_array($select)){
    
    $email1=$row['email'];
    $index_header_script1=strip_tags($row['index_header_script']);
    $index_body_script1=$row['index_body_script'];
    $thankyou_header1=strip_tags($row['thankyou_header']);
    $thankyou_body1=$row['thankyou_body'];
    $title = $row['title'];
    $description = $row['description'];
    
    
}

if(isset($_REQUEST['submit'])){

    $title_new = $_REQUEST['title'];
    $description_new = $_REQUEST['description'];
    
    $admin_email=$_REQUEST['admin_email'];
    $index_header_script=htmlspecialchars($_REQUEST['index_header_script']);
    $index_header_script=addslashes($index_header_script);
    //echo $index_header_script;
    $index_body_script=$_REQUEST['index_body_script'];
    $index_body_script=addslashes($index_body_script);

    $thank_header_script=htmlspecialchars($_REQUEST['thank_header_script']);
    $thank_header_script=addslashes($thank_header_script);

    $thankyou_body_script=$_REQUEST['thankyou_body_script'];

    $thankyou_body_script=addslashes($thankyou_body_script);  
    //exit;
   
    $total = mysqli_num_rows($select);
    
    if($total == 0)
    {

        $insert="INSERT INTO `extra_details`(`description`,`title`,`email`, `index_header_script`, `index_body_script`, `thankyou_header`, `thankyou_body`) VALUES ('$description_new','$title_new','$admin_email','$index_header_script','$index_body_script','$thank_header_script','$thankyou_body_script')";
        
       // echo $insert;
        //        exit;
        mysqli_query($conn,$insert);
        header('location:email.php');
     
    }
    else{

        $update= "UPDATE `extra_details` SET `email`='$admin_email',`index_header_script`='$index_header_script',`index_body_script`='$index_body_script',`thankyou_header`='$thank_header_script',`thankyou_body`='$thankyou_body_script',`title`='$title_new',`description`='$description_new'";

        //        echo $update;
        //        exit;
        mysqli_query($conn,$update);
         header('location:email.php');
       
    }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            .bordered-table th + th, .bordered-table td + td, .bordered-table th + td {
                border-right: 1px solid #ddd !important;
            }
            table th, table td { 
                text-align: center !important;
            }

            input[type="search"] {
                padding: 4px;
                max-width: 150px;
                margin-right: 0px;
                border-radius: 0px;
                border-color: #fff;
                background: #fff;
            }
            button.btn.primary {
                margin-right: 5px;
                margin-left: -4px;
            }
            .input-xlarge, input.xlarge, textarea.xlarge, select.xlarge{width:98.4%;}
            textarea{width:98.4%;}
            .xlInput , .input{display: inline-block;}
            .xlInput{max-width: 20%; width: 100%;}
            .input{max-width:79%; width: 100%;}
            form .input{margin-left: 0px;}
        </style>
    </head>

    <body style="overflow: scroll;">
        <div class="container canvas">
            <div class="topbar" data-scrollspy="scrollspy">
                <div class="topbar-inner">
                    <div class="container canvas">
                        <a class="brand" href="viewmembers.php">Dashboard</a>
                        <ul class="nav">
                        </ul>
                        <div class="navbar pull-right" style="margin-top: 7px;">

                            <a href="logout.php" class="btn primary">LogOut</a>

                        </div>

                    </div>
                </div>

            </div>
            <a style="float: right; margin-top: 50px;" class="btn small" href="changepassword.php" >Change Password</a>
            <a style="float: right; margin-top: 50px;" class="btn small btn-primary" href="export.php" >Export Users</a>
            <a style="float: right; margin-top: 50px;" class="btn small btn-primary" href="viewmembers.php" >View users</a>
            <div class="page-header" style="margin-top: 50px;">
                <h1>Google tag manager code</h1>
            </div>

            <form  method="post">
                <div class="clearfix">
                    <div class="xlInput">Title:</div>
                    <div class="input"><div ><input type="text" name="title" class="xlarge" style="height:30px;" value="<?php echo $title;  ?>" /></div></div>
                </div>
                <div class="clearfix">    
                    <div class="xlInput">Description:</div>
                    <div class="input"><div> <textarea name="description"  rows="10"><?php echo $description;  ?></textarea></div></div>
                </div>
                
                <div class="clearfix">
                    <div class="xlInput">Admin Email:</div>
                    <div class="input"><div ><input type="text" name="admin_email" class="xlarge" style="height:30px;" value="<?php echo $email1;  ?>" /></div></div>
                </div>
                <div class="clearfix">    
                    <div class="xlInput">Main page header script:</div>
                    <div class="input"><div> <textarea name="index_header_script"  rows="10"><?php echo $index_header_script1;  ?></textarea></div></div>
                </div>
                <div class="clearfix">
                    <div class="xlInput">Main page body script:</div>
                    <div class="input"><div> <textarea  name="index_body_script" rows="10"><?php echo $index_body_script1;  ?></textarea></div></div>
                </div>
                <div class="clearfix">
                    <div class="xlInput">Thank you page header script:</div>
                    <div class="input"><div> <textarea  name="thank_header_script" rows="10"><?php echo  $thankyou_header1;  ?></textarea></div></div>
                </div>
                <div class="clearfix">
                    <div class="xlInput">Thank you page body script:</div>
                    <div class="input"><div> <textarea name="thankyou_body_script" rows="10"><?php echo $thankyou_body1;  ?></textarea></div></div>
                </div>
                  <div class="clearfix">
                    <div class="xlInput"></div>
                     <div class="input"><div> <input type="submit" class="btn primary" name="submit" value="Save Changes" style="    float: right;"></div></div>
                </div>
            
               
            </form>



        </div>
        <script>
          
        </script>
    </body>

</html>

