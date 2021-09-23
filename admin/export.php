<?php
include("config.php");
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db =  new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword,$options);
    $db->exec("SET NAMES utf8");
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    // include 'errors/db_error_connect.php';
    exit;
}
header('Content-Encoding: UTF-8');
header('Content-Type: text/csv; charset=UTF-8;');
header('Content-Transfer-Encoding: UTF-8');
header("Content-Disposition: attachment; filename=file.csv");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
$query = "SELECT * FROM user_data";
try {

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    $content = '';
    $title = '';
    foreach ($results as $rs){
        //   $content .= iconv (mb_detect_encoding( $rs["name"], 'ISO-8859-1'),"windows-1252"  ,  $rs["name"] );( htmlspecialchars($rs["name"])). ',';
        // $content .=mb_convert_encoding($rs["name"], 'UTF-8',  "auto");( htmlspecialchars($rs["name"])). ',';
        $content .=($rs["f_name"]).",";

        $content .= stripslashes($rs["l_name"]). ',';
        $content .= stripslashes($rs["city"]). ',';
        $content .= stripslashes($rs["mobile"]). ',';
        $content .= stripslashes($rs["bus_licence"]). ',';
        $content .= stripslashes($rs["promotional"]). ',';
        $content .= stripslashes($rs["lead_source"]). ',';
        $content .= stripslashes($rs["utm_source"]). ',';
        $content .= stripslashes($rs["utm_medium"]). ',';

        $content .= stripslashes($rs["date_registered"]). ',';
        $content .= "\n";

    }

    $title .= "First Name,Last Name,City,Mobile,Bus Licence,Promotional,Lead Source,Utm Source,Utm Medium,DateJoined,'"."\n";
    echo $title;
    echo  $content;

} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    // global $app_path;
    ///  include 'errors/db_error.php';
    exit;
}
