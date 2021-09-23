<?php
include("config.php");

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

 if(isset($_POST['bulk_delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $id){
            mysqli_query($conn,"DELETE FROM user_data WHERE id=".$id);
        }
        $_SESSION['success_msg'] = 'Users have been deleted successfully.';
        header("Location:viewmembers.php");
    }

?>