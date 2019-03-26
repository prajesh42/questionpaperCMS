<?php 
include 'include/common.php';
$userid=$_GET['userid'];
$query="delete from admin where id LIKE '$userid'";
$result= mysqli_query($link, $query);
header('location:decidecontrol_action');
?>

