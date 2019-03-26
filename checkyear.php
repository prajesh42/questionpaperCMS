
<?php
include 'include/common.php';
 //Get field
 if(isset($_POST['year']))
 {
 $year=$_POST['year'];
 $query ="SELECT * FROM qpyear WHERE year LIKE $year";
 $result = mysqli_query($link, $query);
 $value = mysqli_fetch_array($result);
 if(mysqli_num_rows($result)==0 && $year >2000)
 {
    echo "<span id='alreadyexist' class='form-success'>Valid Year.</span>";    
 }
 else if($year < 2000){
    echo  "<span class='form-error'>Invalid Year.</span>"; 
 }
 else{
     echo "<span class='form-error'>Year already exists.</span>";
 }
 }
 ?>