<?php
include 'include/common.php';
// setup PDO connection 

 //Get year
 $year=$_POST['year'];
 //query to fetch data from database
 $query ="select year from qpyear where year LIKE '$year'";
 $result= mysqli_query($link, $query);
 $row= mysqli_num_rows($result);
 if($row==0)
 {
     $query="insert into qpyear(year) values($year)";
     $result= mysqli_query($link, $query);
echo '<span class="form-success">Inserted Successfully</span>';
}else{
   echo '<span class="form-error">Enter valid year.</span>'; 
}
?>
