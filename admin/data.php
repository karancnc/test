<?php header('Content-Type: text/html; charset=utf-8'); ?>
   <table border="1">
    <tr>
    	<th>NO.</th>
        <th>שם מלא:</th>
        <th>משפחה</th>
		<th>מייל</th>		
		<th>טלפון</th>
        <th>Utm מקור</th>
        <th>Utm בינוני</th> 
		<th>תאריך רשום:</th>
	</tr>
	<?php
	//connection to mysql
	include("admin/config.php");
       $conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

	
	//query get data
	$sql = mysql_query("SELECT * FROM user_data ");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.($data['name']).'</td>
			<td>'.$data['family'].'</td>
            <td>'.$data['miles'].'</td>        
            <td>'.$data['phone'].'</td>
            <td>'.$data['utm_source'].'</td>
			<td>'.$data['utm_medium'].'</td>
			<td>'.$data['date_registered'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
 
