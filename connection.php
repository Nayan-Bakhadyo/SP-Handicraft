<?php
$dbserver= 'localhost';
$user = 'root';
$password='';
$db = 'sphandicraft';

$conn = mysqli_connect($dbserver,$user, $password, $db);
if (mysqli_connect_errno())
{
 echo "Failed to connect to Database: " . mysqli_connect_error();
}
?>