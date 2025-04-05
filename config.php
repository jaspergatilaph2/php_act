<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$db_Name = 'sample_db';

$conn = new mysqli($serverName, $userName, $password, $db_Name);

if(!$conn){
// echo 'Successfully connected';
die('Conntion Failed'. mysqli_error($conn));
}
?>