<?php
  session_start();
     if(!isset($_SESSION['loginid']))
     {
         header("location: index.php");
     }
 else {
     session_unset();
     session_destroy();
 header("location: login.php?error=logout"); }
 
 ?>