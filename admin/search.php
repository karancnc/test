<?php   header('Content-Type: text/html; charset=utf-8');
error_reporting(0);session_start(); ob_start();
include("config.php");
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db =  new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword,$options);
    $db->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message."Message ";
    // include 'errors/db_error_connect.php';
    exit;
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
        </style>
    </head>
    <body style="overflow: scroll;">
        <div class="container canvas">
            <div class="topbar" data-scrollspy="scrollspy">
                <div class="topbar-inner">
                    <div class="container canvas">
                        <a class="brand" href="#">Dashboard</a>
                        <ul class="nav">
                        </ul>
                        <div class="navbar pull-right" style="margin-top: 7px;">
                            <a href="logout.php" class="btn primary">LogOut</a>
                        </div>
                    </div>
                </div>
                <form name="bulk_action_form" action="delete.php" method="post" >
                    </div>
                <a style="float: right; margin-top: 50px;" class="btn small" href="changepassword.php" >Change Password</a>
                <a style="float: right; margin-top: 50px;" class="btn small btn-primary" href="export.php" >Export Users</a>
                <input style="float: right; margin-top: 50px;" type="submit" class="btn small" name="bulk_delete_submit" value="Delete" onclick="detete()"/>
                <div class="page-header" style="margin-top: 50px;">
                    <h1>View Members</h1>
                </div>
                <table class="bordered-table zebra-striped" style="direction:rtl;">
                    <thead>
                        <tr>
                            <th>שם פרטי</th>
                            <th>שם משפחה</th>
                            <th>עיר מגורים</th>                            
                            <th>טלפון</th>
                            <th>יש לי רישיון לאוטובוס</th>
                            <th>מעוניין לקבל מידע פרסומי</th>
                            <th>מקור עופרת</th>
                            <th>Utm מקור</th>
                            <th>Utm בינוני</th>
                            <th>תאריך רשום</th>
                            <th>לִמְחוֹק</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $name=$_POST['searchname'];
                        if(isset($_POST['search']))
                        {
                            $query =  "SELECT * FROM user_data WHERE f_name like '%".$name."%'";
                            try {
                                $statement = $db->prepare($query);
                                $statement->execute();
                                $results = $statement->fetchAll();
                                $statement->closeCursor();
                                $content = '';
                                $title = '';
                                foreach ($results as $row){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars( $row['f_name'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['l_name'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['city'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['mobile'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['bus_licence'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['promotional'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['lead_source'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['utm_source'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['utm_medium'] ); ?></td>
                            <td><?php echo htmlspecialchars( $row['date_registered'] ); ?></td>
                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>  
                        </tr>
                        <?php
                                }
                            } catch (PDOException $e) {
                                $error_message = $e->getMessage();
                                echo $error_message;
                                // global $app_path;
                                ///  include 'errors/db_error.php';
                                exit;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="">
                    <a href="viewmembers.php" class="btn primary">Back</a>
                </div>
            </div>
            </form>
        <script>
            function detete(){
                alert('Sure you want to detete ?');
            }    
        </script>
    </body>
</html>
