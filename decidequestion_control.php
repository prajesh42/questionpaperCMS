<?php
 include 'include/common.php';
 if($_SESSION['loginid'])
 {
    $loginid=$_SESSION['loginid'];
     $query="select fieldid from admin where loginid LIKE '$loginid'" or die("can't fetch data");
     $result= mysqli_query($link, $query);
     $row= mysqli_num_rows($result);
     $data= mysqli_fetch_array($result);
     if($data['fieldid']=='Admin' && $row==1){
         header('location:Editquestions');
     }
     if($data['fieldid']=='Engineering' && $row==1){
         header('location:Engineeringquestions');
     }
     if($data['fieldid']=='Agriculture' && $row==1){
         header('location:Agriculturequestions');
     }
     if($data['fieldid']=='Architecture' && $row==1){
         header('location:Archquestions');
     }
     if($data['fieldid']=='Science' && $row==1){
         header('location:Sciencequestions');
     }
     if($data['fieldid']=='Comp.Application' && $row==1){
         header('location:Compappquestions');
     }
     if($data['fieldid']=='Commerce' && $row==1){
         header('location:Commercequestions');
     }
     if($data['fieldid']=='Education' && $row==1){
         header('location:Eduquestions');
     }
     if($data['fieldid']=='M.Tech' && $row==1){
         header('location:Mtechquestions.php');
     }
     if($data['fieldid']=='Management' && $row==1){
         header('location:Managementquestions');
     }
     if($data['fieldid']=='Pharmacy' && $row==1){
         header('location:Pharmacyquestions');
     }
     if($data['fieldid']=='Polytechnic' && $row==1){
         header('location:Polyquestions');
     }
 }else{
     header('location:login');
  } ?>
