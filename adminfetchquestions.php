
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php   
include './include/common.php';
  if(isset($_SESSION['loginid']))
  {
      $fieldid=$_SESSION['fieldid'];
?>
<html>
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>RKDF Question Paper</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<style>
    .selected{
        background-color:blue;
        color:#FFFFFF;
        
    }
    .selected:hover{
       background-color:blue; 
       color:#FFFFFF;
    }
    ol li{
        background-color:rgba(0, 0, 0, 0.85)  !important;
        color:white !important;
    }
    .btn-link:hover{
        background-color:rgba(86, 0, 0, 0.85) !important;
        color:white !important;
        padding: 5px 25px;
        margin:0;
    }
</style>
    
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
        <div class="section">
        <div class="row content-area" style="margin-top:60px;">
            <div class="row" style="margin-left:30px;">
            </div>
            <div class="row">
                <div class="col-md-2" style="margin-top:80px;">
                    <p class="btn btn-block btn-primary"><b>Search selecting as:</b></p>
                    <ol class="accordion" id="searchSelect" class="list-group" style='text-align: center;'>
                        <li class="list-group-item list-group-item-action"><a class="btn"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Fields</a> 
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#searchSelect">
                              <form method="POST">
                                  <input hidden name="search" value="Engineering">
                                  <button class="btn btn-link" name="find">Engineering</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="M.Tech">
                                  <button class="btn btn-link" name="find">M.Tech</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Agriculture">
                                  <button class="btn btn-link" name="find">Agriculture</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Pharmacy">
                                  <button class="btn btn-link" name="find">Pharmacy</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Architecture">
                                  <button class="btn btn-link" name="find">Architecture</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Management">
                                  <button class="btn btn-link" name="find">Management</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Polytechnic">
                                  <button class="btn btn-link" name="find">Polytechnic</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Comp.Application">
                                  <button class="btn btn-link" name="find">Comp.Application</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Science">
                                  <button class="btn btn-link" name="find">Science</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Commerce">
                                  <button class="btn btn-link" name="find">Commerce</button>
                              </form>
                              <form method="POST">
                                  <input hidden name="search" value="Education">
                                  <button class="btn btn-link" name="find">Education</button>
                              </form>
                          </div>
                        </li>
                             <li class="list-group-item list-group-item-action"><a class="btn"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Year</a> 
                             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#searchSelect">
                               <?php $query="select * from qpyear";
                                if($result= mysqli_query($link, $query))
                                {
                                while($row= mysqli_fetch_array($result))
                                {
                                        ?>
                                 <form method="POST">
                                  <input hidden name="search" value="<?php echo $row['year'] ?>">
                                  <button class="btn btn-link" name="find"><?php echo $row['year'] ?></button>
                                 </form>
                                <?php }} ?>
                             </div>
                            </li>
                        </ol>
                </div>
            <div class="col-md-8">
                <form method="POST"  enctype="multipart/form-data" class="form-group">
                    <div class="row">
                        <div class="col-md-10" style="margin-bottom:5px;">
                            <input class="form-control" type="text" name="search" value="<?php if(isset($_POST['find'])){echo $_POST['search'];} ?>" placeholder="search......" required>
                        </div>
                        <div class="col-md-2">
                    <button name="find" class=" btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>
                                SN
                            </th>
                            <th>
                                Field
                            </th>
                            <th>
                                Year
                            </th>
                            <th>
                                Semester
                            </th>
                            <th>
                                Branch
                            </th>
                            <th>
                                Questions
                            </th>
                            <th>
                                <i class="fa fa-download"></i>  Download
                            </th>
                        </tr>  
                    </thead>
                    <tbody class="table-success">
                        <?php if(isset($_POST['find'])){
                                 $search=$_POST['search'];
                                 $query="select * from questions where field LIKE '%$search%' OR year LIKE '%$search%' OR branchname LIKE '%$search%' OR semester LIKE '%$search%' OR filename LIKE '%$search%'";
                                if($result= mysqli_query($link, $query))
                                {
                                $count=0;
                    while($row= mysqli_fetch_array($result))
                    {
                        $count=$count+1;
                   ?>
                      
                        <tr>
                            <td>
                               <?php echo $count; ?>
                            </td>
                            <td>
                       <?php echo $row['field'] ?> 
                            </td>
                            <td>
                       <?php echo $row['year'] ?> 
                            </td>
                            <td>
                       <?php echo $row['semester'] ?> 
                            </td>
                            <td>
                       <?php echo $row['branchname'] ?> 
                            </td>
                            <td>
                       <?php echo $row['filename'] ?> 
                            </td>
                            <td>   
                               <a style="color:blue;" href="data:<?php echo $row['filetype'].";base64,".base64_encode($row['data'])?>" download="<?php echo basename($row['filename'],".pdf") ?>"> <i class="fa fa-download"></i> Download </a> 
                            </td>
                        </tr>
                                
                                <?php }if($count==0){ ?>
                                 <div class="jumbotron alert-warning" role="alert">
                                 <h3 class="mb-0">No data found!</h3>
                                  </div> 
                    <script>$(".table").hide();</script>
                                <?php  }}else{
                                  echo "<div class=\"jumbotron alert-warning\" role=\"alert\">
                                 <h3 class=\"mb-0\">No data found!</h3>
                                  </div> 
                    <script>$('.table').hide();</script>";  
                                }}else { ?>
                    <?php 
                    $query="select * from questions";
                    $result= mysqli_query($link, $query);
                    $count=0;
                    while($row = mysqli_fetch_array($result))
                    {
                       $count=$count+1;
                     ?>
                        <tr>
                            <td>
                               <?php echo $count; ?>
                            </td>
                            <td>
                       <?php echo $row['field'] ?> 
                            </td>
                            <td>
                       <?php echo $row['year'] ?> 
                            </td>
                            <td>
                       <?php echo $row['semester'] ?> 
                            </td>
                            <td>
                       <?php echo $row['branchname'] ?> 
                            </td>
                            <td>
                       <?php echo $row['filename'] ?> 
                            </td>
                            <td>
                                <a style="color:blue;" href="data:<?php echo $row['filetype'].";base64,".base64_encode($row['data'])?>" download="<?php echo basename($row['filename'],".pdf") ?>"> <i class="fa fa-download"></i> Download </a> 
                            </td>
                        </tr>
                        <?php } } ?>   
                        </tbody>
                </table>
                </div>
            </div>
         </div>
        </div>
        </div>
<?php include 'include/footindex.php'; ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script>
      $(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    })
     });
    </script>
    <script>
          $("button").click(function(){
             $(this).addClass("selected");
          });
    </script>
    </body>
</html> 
  <?php } else{
     header('location:login.php');
  } ?>