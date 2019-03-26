
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php   
include 'include/common.php';
  if(isset($_SESSION['loginid']))
  {
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
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
        <div class="section">
        <div class="row content-area" style="margin-top:60px;">
            <div class="row" style="margin-left:30px;">
                    <div class="row">
                    <a style="color:white; margin:10px 5px;" class="btn btn-dark" href="adduser.php">Add Controller</a>
                    <a style="color:white; margin:10px 5px;" class="btn btn-dark" href="decidefetch_action.php">Retrive Uploaded Questions</a>   
                    <a style="color:white; margin:10px 5px;" class="btn btn-dark" href="addyear.php">Add Year</a>
                </div>
                <div class="col-md-4">
                <div class="modal fadeInUp" id="exampleModalLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div style="text-align:center;background-color:#EBF8A4;" class="modal-body" id="changedPassword">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST" action="admincontrol"  enctype="multipart/form-data" class="form-group">
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
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                SN
                            </th>
                            <th>
                                Field id
                            </th>
                            <th>
                                Login id
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Change Status
                            </th>
                            <th>
                                Role
                            </th>
                            <th style="text-align: center;">
                                Action
                            </th>
                        </tr>  
                    </thead>
                    <tbody>
                        <?php if(isset($_POST['find'])){
                                 $search=$_POST['search'];
                                 $query="select * from admin where fieldid LIKE  '%$search%' OR loginid LIKE '%$search%' OR status LIKE '%$search%'";
                                $result= mysqli_query($link, $query);
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
                             <?php echo $row['fieldid'] ?>    
                            </td>
                            <td>
                       <?php echo $row['loginid'] ?> 
                            </td>
                            <td>
                                <input style="border:none;background-color:transparent;" type="password" value="<?php echo $row['password'] ?>">
                            </td>
                            <td>
                       <?php if($row['status']==1){echo "<span style=\"color:green;\">Active</span>";}else{echo "<span style=\"color:red;\">Blocked</span>";} ?> 
                            </td>
                            <td>
                                <a style="padding:0px;" href="<?php if($row['status']==1){ echo "block_action.php?id=".$row['id'];}else{ echo "activate_action.php?id=".$row['id'];} ?>" class="btn"><?php if($row['status']==1){echo "<span style=\"color:red;\">Block</span>";}else{echo "<span style=\"color:green;\">Activate</span>";} ?></a>   
                            </td>
                            <th>
                                <p style="text-transform: uppercase;"> <?php echo $row['role'] ?></p>
                            </th>
                            <td style="text-align: center;">   
                               <?php if($row['role']=='admin'){}else{?> <a class="btn" style="color:blue;" data-toggle="modal" data-target="#deleteQuestion<?php echo $count; ?>"> Delete </a><?php }?>
                            <div class="modal fade" id="deleteQuestion<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Do you want to delete the user <?php echo $row['loginid'] ?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary"><a style='color:white; text-decoration: none;' href="deletequestion_action?bookid=<?php echo $row['id'] ?>">Yes</a></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </td>
                        </tr>
                                
                    <?php } }else { ?>
                    <?php 
                    $query="select * from admin";
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
                              <?php echo $row['fieldid'] ?>   
                            </td>
                            <td>
                       <?php echo $row['loginid'] ?> 
                            </td>
                            <td>
                                <input data-toggle="tooltip" title="Click to change password" data-id1="<?php echo $row['loginid'] ?>" class="changePassword" style="border:none;background-color:transparent;" type="password" value="<?php echo $row['password'] ?>"> 
                            </td>
                            <td>
                       <?php if($row['status']==1){echo "<span style=\"color:green;\">Active</span>";}else{echo "<span style=\"color:red;\">Blocked</span>";} ?> 
                            </td>
                            <td>
                              <?php if($row['role']=='admin'){echo '<b>No Action</b>';}else{?> <a style="padding:0px;" href="<?php if($row['status']==1){ echo "block_action.php?id=".$row['id'];}else{ echo "activate_action.php?id=".$row['id'];} ?>"  class="btn"><?php if($row['status']==1){echo "<span style=\"color:red;\">Block</span>";}else{echo "<span style=\"color:green;\">Activate</span>";} ?></a>  <?php } ?> 
                            </td>
                            <th>
                                <p style="text-transform:uppercase; color:blueviolet;"> <?php echo $row['role'] ?></p>
                            </th>
                            <td style="text-align:center;">
                                <?php if($row['role']=='admin'){echo '<b>No Action</b>';}else{?> <a class="btn" style="color:blue;" data-toggle="modal" data-target="#deleteQuestion<?php echo $count; ?>"> Delete </a><?php }?>
                            <div class="modal fade" id="deleteQuestion<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Do you want to delete the user <?php echo $row['loginid'] ?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary"><a style='color:white; text-decoration: none;' href="deleteuser_action?userid=<?php echo $row['id'] ?>">Yes</a></button>
                                  </div>
                                </div>
                              </div>
                            </div>
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
//      $(document).ready(function () {
//    //Disable full page
////    $("body").on("contextmenu",function(e){
////        return false;
////    })
////     });
    </script>
    <script>
      function clearfield()
      {
          $('.changePassword').val("");
      }
    </script>
    <script>
      $(document).ready(function(){
        $(document).on('focus','.changePassword',function() {
            
        $(this).val("");
        
         });
     });
       
     $(document).on('blur','.changePassword',function(){
     // AJAX Code To change password
     var loginid=$(this).data("id1");
     var password=$(this).val();
     var dataString="user="+loginid+"&password="+password;
       $.ajax({
            type: "POST",
            url: "changePassAdmin.php",
            data: dataString,
            success: function(result){
                $("#exampleModalLabel").modal("show");
                $('#changedPassword').html(result);
                if(result=='Set some password'){
                    $('#changedPassword').addClass("form-error");
                }else{
                    $('#changedPassword').addClass("form-success");
                }
               var delay=1050;
                setTimeout(function(){
               window.location.href = 'admincontrol.php';
             },delay);
            }
            });
     
            });
</script>
<script>
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
</html> 
  <?php } else{
     header('location:login.php');
  } ?>