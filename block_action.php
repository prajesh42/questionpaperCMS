<?php 
include 'include/common.php';
$userid=$_GET['id'];
$query="update admin SET status=0 where id LIKE '$userid'";
$result= mysqli_query($link, $query);
header('location:decidecontrol_action');
?>



