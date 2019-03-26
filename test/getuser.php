<?php
$content=$_GET["q"];
header("location:testfile.php?value=$content");

$con = mysqli_connect('127.0.0.1', 'root', 'prajesh','article');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

$sql="SELECT * FROM checkarticle";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
  {
     $word=$row['searcharticle'];
     $replace="<a href=\"#\">".$word."</a>";
     $finalcontent= str_replace($word, $row, $content);
     echo $finalcontent;
  }

mysqli_close($con);
?>