<?php 
include './include/common.php';
if(isset($_SESSION['loginid']))
{
    $loginid=$_SESSION['loginid'];
    
    
    //GET password
    $password=$_POST['password'];
    //GET confirmPassword
    $confirmPassword=$_POST['confirmPassword'];
    if($password==$confirmPassword){
        $pass=md5(md5($loginid).$confirmPassword);
$query="UPDATE admin SET password='$pass' where loginid LIKE '$loginid'";
$result= mysqli_query($link, $query);
if($result){
echo 'Password Changed Successfully.';
}else{
    echo 'Something went wrong';
}
    }
}else{
    header('location:login.php');
}
?>

