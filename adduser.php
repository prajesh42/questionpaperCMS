
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
            <div class="row">
                <div class="col-md-4">
                </div>
            <div class="col-md-4">
                <!--This form is for updating data and questions of the database-->
                <div id="update">
                    <form style=" box-shadow: 0px 3px 10px rgba(0,0,0,0.5); padding: 5px;" method="POST" action="adduser_action.php" enctype="multipart/form-data">
                    <a style="color:white;" class="btn btn-dark btn-block">Add Controller</a>
                                      <div class="form-group col-md-12">
                                        <label for="stream">Stream</label>
                                        <select class="form-control" id="stream" name="stream" required>
                                            <option>Select Stream</option>
                                            <option>Engineering</option>
                                          <option>Agriculture</option>
                                          <option>M.Tech</option>
                                          <option>Pharmacy</option>
                                          <option>Management</option>
                                          <option>Polytechnic</option>
                                          <option>Architecture</option>
                                          <option>Comp.Application</option>
                                          <option>Science</option>
                                          <option>Commerce</option>
                                          <option>Education</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="loginid">Loginid</label>
                                        <input type="text" class="form-control" id="loginid" name="loginid" onkeyup required><p id="check"></p>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required><span id="message"></span>
                                      </div>
                                    <button style="margin-left:15px;" id='adduser' class="btn btn-primary">Add User</button>
                                    <p id="error_register"></p>   
                    </form>
                                   
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
    
    <script type="text/javascript">
     
     $(document).ready(function(){
        $("#loginid").on('keyup',function() {
          var loginid=$("#loginid").val();
          $("#check").load("checklogin.php",{
              loginid: loginid
          });
        
         });
     });
     
       $(document).ready(function(){
        $("#password,#confirmPassword").on('keyup',function() {
          var password=$("#password").val();
          var confirmPassword=$("#confirmPassword").val();
          $("#message").load("checklogin.php",{
              pass: password,
              con_pass: confirmPassword
          });
        
         });
     });
            $(document).ready(function(){
            $("#adduser").click(function(){
                var stream=$("#stream").val();
            var loginid = $("#loginid").val();
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString ='stream=' + stream + '&loginid='+ loginid + '&password='+ password + '&confirmPassword='+ confirmPassword;
            if(loginid==''||password==''||confirmPassword=='')
            {
            $("#error_register").html("Please fill all the fields");
            $("#error_register").addClass('form-error');
            }
            else if(($("#alreadyexist").html()=='Login id already exists.')){
               $("#error_register").html("Please,validate loginid.");
                $("#error_register").addClass('form-error'); 
            } 
            else if(password!=confirmPassword){
                $("#error_register").html("Please,recheck your passwords.");
                $("#error_register").addClass('form-error');
            }
            else if(stream=='Select Stream')
            {
                $("#error_register").html("Please,Select Stream");
               $("#error_register").addClass('form-error'); 
            }
            else
            {
            // AJAX Code To Submit Form.
            $.ajax({
            type: "POST",
            url: "adduser_action.php",
            data: dataString,
            cache: false,
            timeout:900000,
            success: function(result){
                $('#error_register').html(result);
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