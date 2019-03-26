<?php

include 'include/common.php';
 $fieldid=$_SESSION['fieldid'];
 if($fieldid == 'Admin'){
    //Get field
    
 $field=$_POST['field'];                       
 //Get branch
 $branch=$_POST['branch'];
 //Get year
 $year=$_POST['year'];
 //Get sem
 $sem=$_POST['semester'];
 if($year>0 & $sem>0 )
 {

$query="select semester from questions where year LIKE $year AND semester LIKE $sem AND branchname LIKE '$branch' AND field LIKE '$field'";
$result= mysqli_query($link, $query);
$rows= mysqli_num_rows($result);
if($rows>=5)
{
    echo '<span id="exc">exceded</span>';
}
 }
 }else if($fieldid != 'Agriculture'){
     
    //Get field 
 $field=$_POST['field'];
     //Get branch
 $branch=$_POST['branch'];
 //Get year
 $year=$_POST['year'];
 //Get sem
 $sem=$_POST['semester'];
 if($year>0 & $sem>0 )
 {

$query="select semester from questions where year LIKE $year AND semester LIKE $sem AND branchname LIKE '$branch' AND field LIKE '$field'";
$result= mysqli_query($link, $query);
$rows= mysqli_num_rows($result);
if($rows>=5)
{
    echo '<span id="exc">exceded</span>';
}
 }
 }
 else{
  //Get field
   $field=$_POST['field'];  
 //Get year
 $year=$_POST['year'];
 //Get sem
 $sem=$_POST['semester'];
 if($year>0 & $sem>0 )
 {

$query="select semester from questions where year LIKE $year AND semester LIKE $sem AND field LIKE '$field'";
$result= mysqli_query($link, $query);
$rows= mysqli_num_rows($result);
if($rows>=5)
{
    echo '<span id="exc">exceded</span>';
}
 }   
     
     
     
 }
?>
