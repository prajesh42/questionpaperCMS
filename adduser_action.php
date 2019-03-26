<?php
include 'include/common.php';
// setup PDO connection 

 //Get field 
 $fieldid=$_POST['stream'];
 //Get loginid
 $loginid=$_POST['loginid'];
 //query to fetch data from database
 $query ="select loginid from admin where loginid LIKE '$loginid'";
 $result= mysqli_query($link, $query);
 $row= mysqli_num_rows($result);
 //Get password
 $pass=$_POST['password'];
 //Get confirm password
 $confirmpass=$_POST['confirmPassword'];
 if($pass==$confirmpass && $row==0)
 {
    $password= md5(md5($loginid).$pass);
$stmt = $db->prepare("insert into admin(fieldid,loginid,password,status,role) values(?,?,?,?,?)"); 
  
// Use bindValue function 
$stmt->bindValue(1,$fieldid);
$stmt->bindValue(2,$loginid);
$stmt->bindValue(3,$password);
$stmt->bindValue(4,1);
$stmt->bindValue(5,"user");    
$stmt->execute();
echo '<span class="form-success">Inserted Successfully</span>';
}else{
   echo '<span class="form-error">Problem while inserting.</span>'; 
}
?>
