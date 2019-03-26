<?php
 include 'include/common.php';
 session_start();
 if($_SESSION['loginid'])
 {
    $loginid=$_SESSION['loginid'];
     $query="select role from admin where loginid LIKE '$loginid'" or die("can't fetch data");
     $result= mysqli_query($link, $query);
     $row= mysqli_num_rows($result);
     $data= mysqli_fetch_array($result);
     if($data['role']=='admin' && $row==1){
         header('location:admincontrol');
     }
     if($data['role']=='user' && $row==1){
         header('location:usercontrol');
     }
 }else{
     header('location:login');
  } ?>
