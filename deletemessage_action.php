<?php 
include 'include/common.php';
$id=$_GET['id'];
$query="delete from contactus where id LIKE '$id'";
$result= mysqli_query($link, $query);
header('location:messages');
?>

