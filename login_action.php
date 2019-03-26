<?php 
include 'include/common.php';
$loginid=$_POST['loginid'];
$password=$_POST['password'];
$pass= md5(md5($loginid).$password);
$query="select fieldid,status from admin where loginid LIKE '$loginid' AND password LIKE '$pass'";
$result= mysqli_query($link, $query);
$row= mysqli_num_rows($result);
$value= mysqli_fetch_array($result);
if ($row == 0) {
    header('location:login?error=wrong');
} else if($value['status']==0) {
    header('location:login?error=blk');
}
else{
    $val=$value['status'];
    $_SESSION['loginid']=$loginid;
    $_SESSION['fieldid']=$value['fieldid'];
    $_SESSION['id']= mysqli_insert_id($link);
    header("location:index");
}
    

?>

