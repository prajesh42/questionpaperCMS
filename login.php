

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

include './include/common.php';
if(isset($_SESSION['loginid'])){
    header('location:index.php');
}else{ ?>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<style type="text/css">
    body{
        background-image: url("");
    }
    .form-group{
        margin-bottom:50px;
    }
    .form-group input{
        border-top:0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        width:338px;
        
    }
    @media (min-width:280px){
      .form-group input{
        border-top:0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        width:242px;
        
    }
    @media (min-width:425px){
      .form-group input{
        border-top:0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        width:300px;
        
    }
    @media (min-width:768px){
      .form-group input{
        border-top:0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        width:300px;
        
    }
    @media (min-width:1024px){
      .form-group input{
        border-top:0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        width:338px;
        
    }
    }
    .form-control:focus{
        border-top:0px;
        box-shadow:0px 4px 9px rgba(22, 51, 103, 0.6);;
    }
</style>
    
    
    </head>
    <body>
        
        <div class="container" style='margin-top:150px;'>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    
                    <form  method="post" action="login_action" style="box-shadow: 0 2px 18px rgba(13, 76, 177, 0.96);">
                        <div class="form-group" style="text-align:center;">
                            <h3 class="btn btn-block btn-dark" style="font-size:30px;"><center>Admin login</center></h3>
                        </div>
                                      <div class="form-group">
                                          <center>
                                          <input type="text" required class="form-control" name="loginid" id="loginid" placeholder="Login Id">
                                          </center>
                                          </div>
                                      <div class="form-group">
                                          <center>
                                          <input type="password" required class="form-control" id="password" name="password" placeholder="password">
                                          </center>
                                          </div>
                                          <?php if(isset($_SERVER['HTTP_REFERER'])){if($_GET['error']=='wrong'){ ?>
                                          <p><center style="font-size:15px; color:red;">Invalid login credentials.</center></p>


                                             <?php  }if( $_GET['error'] =='blk'){ ?>
                                        <p><center style="font-size:15px; color:red;">You can't login anymore.Kindly contact the admin cell.</center></p>

                        
                                             <?php   }if( $_GET['error'] =='logout'){?>
                                           <p><center style="font-size:15px; color:red;">Logged out successfully.</center></p>

                                          <?php }}?>
                                     <div class="form-group">
                                         <center><button name="btn" class="btn btn-block btn-dark">Login</button></center>
                                     </div>
                                                                     
                                    </form>
                                </div>
                   </div>
        </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
   <!-- <script type="text/javascript">
$(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    
});
</script> -->
    </body>
</html> 
<?php } ?>