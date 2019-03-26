<?php 
include 'include/common.php';
if(isset($_SESSION['loginid']))
{
    $loginid=$_SESSION['loginid'];
    $fieldid=$_SESSION['fieldid'];
    if($fieldid=='Admin'){
        
         //GET password
    $password=$_POST['password'];
    if(!empty($password)){
    $user=$_POST['user'];
        $pass=md5(md5($loginid).$password);
$query="UPDATE admin SET password='$pass' where loginid LIKE '$user'";
$result= mysqli_query($link, $query);
if($result){
echo 'Password Changed Successfully.';
}else{
    echo 'Something went wrong';
}
    }else{
        echo "Set some password";
    }
        
    }
}
    ?>