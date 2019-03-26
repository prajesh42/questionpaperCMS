<?php 
include 'include/common.php';
$bookid=$_GET['bookid'];
$query="delete from questions where id LIKE '$bookid'";
$result= mysqli_query($link, $query);
$_POST['msg']='deleted';
header('location:decidequestion_control');
    

?>

