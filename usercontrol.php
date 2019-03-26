
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php   
include './include/common.php';
$loginid=$_SESSION['loginid'];
$query="SELECT role FROM admin where loginid LIKE '$loginid'";
$result= mysqli_query($link, $query);
$row= mysqli_fetch_array($result);
  if(isset($_SESSION['loginid']) && $row['role']=='user')
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
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
        <div class="section">
        <div class="row content-area" style="margin-top:60px;">
            <div class="row" style="margin-left:30px;">
                <div class="col-md-4">
                <p>
                    <a style="color:white; margin:10px 5px;" class="btn btn-dark" href="decidefetch_action.php">Retrive Uploaded Questions</a>   
                </p>
                </div>
                <div class="col-md-8">
                </div>
            </div>
            <div class="row">
                <p id="updatedInfo"></p>
                <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST" action="usercontrol.php"  enctype="multipart/form-data" class="form-group">
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
                                Login id
                            </th>
                            <th>
                                Fieldid
                            </th>
                            <th>
                                Status
                            </th>
                            <th style="text-align: center;">
                                Action
                            </th>
                        </tr>  
                    </thead>
                    <tbody>
                        <?php if(isset($_POST['find'])){
                                 $search=$_POST['search'];
                                 $query="select * from admin where (fieldid LIKE '%$search%' OR loginid LIKE '%$search%' OR status LIKE '%$search%') AND (fieldid LIKE '$fieldid')";
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
                       <?php echo $row['loginid'] ?> 
                            </td>
                            <td>
                              <?php echo $fieldid; ?>  
                            </td>
                            <td>
                       <?php if($row['status']==1){echo "<span style=\"color:green;\">Active</span>";}else{echo "<span style=\"color:red;\">Blocked</span>";} ?> 
                            </td>
                            <td style="text-align: center;">   
                                <a class="btn" style="color:blue;" data-toggle="modal" data-target="#changePassword<?php echo $count; ?>"> Change Password </a>
                            <div class="modal fade" id="changePassword<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Do you want to change the password for user <?php echo $row['loginid'] ?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary"><a style='color:white; text-decoration: none;' href="deletequestion_action.php?bookid=<?php echo $row['id'] ?>">Yes</a></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </td>
                        </tr>
                                
                    <?php } }else { ?>
                    <?php 
                    $query="select * from admin where role LIKE 'user' AND fieldid LIKE '$fieldid'";
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
                       <?php echo $row['loginid'] ?> 
                            </td>
                            <td>
                            <?php echo $fieldid; ?>    
                            </td>
                            <td>
                       <?php if($row['status']==1){echo "<span style=\"color:green;\">Active</span>";}else{echo "<span style=\"color:red;\">Blocked</span>";} ?> 
                            </td>
                            <td style="text-align:center;">
                                <?php if($_SESSION['loginid']==$row['loginid']){ ?>
                                <a class="btn" style="color:blue;" data-toggle="modal" data-target="#changePassword<?php echo $count; ?>">Change Password</a>
                                  <div class="modal fade" id="changePassword<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Proceed to Change Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Do you want to change the password for user <?php echo $row['loginid'] ?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary"><a style='color:white; text-decoration: none;' data-toggle="modal" data-dismiss="modal" data-target="#displayPassword<?php echo $count; ?>">Yes</a></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                                <!--This modal is to change the password requested by users-->
                                    <div class="modal fade" id="displayPassword<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="changePassword_action.php" enctype="multipart/form-data">
                                              <div class="form-group col-md-12">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" class="form-control" name="password">
                                              </div>
                                              <div class="form-group col-md-12">
                                                <label for="confirmPassword">Confirm Password</label>
                                                <input type="password" id="confirmPassword" class="form-control" name="confirmPassword">
                                              </div>
                                               <p id="changeInfo"></p>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                              <button  id="updatePassword" type="submit" class="btn btn-primary"><a style='color:white; text-decoration: none;'>Confirm</a></button>
                                                 </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                <?php }else{ ?>
                                <a class="btn disabled" href="#">Change Password</a>
                                <?php } ?>
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
    $(document).ready(function(){
        $("#password,#confirmPassword").on('keyup',function() {
          var password=$("#password").val();
          var confirmPassword=$("#confirmPassword").val();
          if(password==confirmPassword)
          {
              $("#changeInfo").html("Password Mathces");
              $("#changeInfo").addClass("form-success");
          }else{
              $("#changeInfo").html("Password doesn't match");
              $("#changeInfo").addClass("form-error");
          }
          
        
         });
     });
     
     $(document).ready(function(){
            $("#updatePassword").click(function(){
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString ='password='+ password + '&confirmPassword='+ confirmPassword;
            if(password==''|| confirmPassword=='')
            {
            $("#changeInfo").html("Please fill all the fields");
            $("#changeInfo").addClass('form-error');
            } 
            else if(password != confirmPassword){
                $("#changeInfo").html("Please,recheck your passwords.");
                $("#changeInfo").addClass('form-error');
            }
            else
            {
            // AJAX Code To Submit Form.
            $.ajax({
            type: "POST",
            url: "changePassword_action.php",
            data: dataString,
            cache: false,
            success: function(result){
                $('#changeInfo').html(result);
                $('#changeInfo').addClass("form-success");
                var delay=1000;
                setTimeout(function(){
               window.location.href = 'decidecontrol_action.php';
             },delay);
            }
            });
            }
            return false;
            });
            });
    
    </script>
</html> 
  <?php } else{
     header('location:login.php');
  } ?>