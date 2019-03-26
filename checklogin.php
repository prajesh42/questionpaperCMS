
<?php
include 'include/common.php';
 //Get field
 if(isset($_POST['loginid']))
 {
 $loginid=$_POST['loginid'];
 $value= mysqli_escape_string($link,$loginid);
 $query ="select loginid from admin where loginid LIKE '$value'";
 $result= mysqli_query($link, $query);
 if(empty($loginid))
 {
     echo "<span style='color:blue;'>Please fill the login id.</span>";
 }else{
 if(mysqli_num_rows($result)>0)
 {
    echo "<span id='alreadyexist' class='form-error'>Login id already exists.</span>";    
 }
 else {
     echo "<span class='form-success'>Valid Login id</span>";
 }
 }
 }
 
 
 if(isset($_POST['pass']))
 {
     $pass=$_POST['pass'];
     $confirmpass=$_POST['con_pass'];
     if(empty($pass) || empty($confirmpass))
     {
       echo "<span style='color:blue;'>Please fill your passwords.</span>";  
     }else
     {
         if($pass==$confirmpass)
         {
           echo "<span class='form-success'>Password matches</span>";  
         }else{
             echo "<span class='form-error'>Password does not match.</span>";
         }
     }
 }
 ?>