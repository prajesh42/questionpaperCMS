<?php

// setup PDO connection 
include 'include/common.php';
 if(isset($_POST['year']))
 {
 //Get field
 $field=$_POST['field'];
 //Get branch
 $branch=$_POST['branch'];
 //Get year
 $year=$_POST['year'];
 //Get sem
 $sem=$_POST['sem'];
 //GET file of file to be uploaded
 $name=$_FILES['myfile']['name'];
 
 $type=$_FILES['myfile']['type'];
// GET data from the upload file
$data=file_get_contents($_FILES['myfile']['tmp_name']);
    
$stmt = $db->prepare("insert into questions(field,branchname,year,semester,filename,filetype,data) values(?,?,?,?,?,?,?)"); 
  
// Use bindValue function 
$stmt->bindValue(1,$field);
$stmt->bindValue(2,$branch);
$stmt->bindValue(3,$year);
$stmt->bindValue(4,$sem);
$stmt->bindValue(5,$name);
$stmt->bindValue(6,$type);
$stmt->bindValue(7,$data); 
  
    
if($stmt->execute()) 
{
echo '<span class="form-success" style="font-weight:bold;">Inserted successfully</span>';
}else{
    echo '<span class="form-error">Error Occured</span>';
} 
}
 else{
     echo 'Error occured';
 }
?>
