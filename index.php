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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
        <div class="header">
            <div class="container">
                <div class="row">
            <div class="col-md-12 jumbo-layer">
  <h1 class="display-4 animated flash">Questionpaper's Control Panel</h1>

            </div>
</div>
                </div>
            </div>
        <div class="row content-area">
                        <div class="card-deck">
                            <div class="row">
  <div class="card col-md-4">
      <img src="images/questions.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title wow fadeInUp" data-wow-delay="0.4s">Edit Questions</h5>
      <a href="decidequestion_control"><span class="btn btn-dark wow fadeInUp" data-wow-delay="0.8s">Explore</span></a>
     </div>
  </div>
  <div class="card col-md-4">
      <img src="images/users.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title wow fadeInUp" data-wow-delay="0.4s">Manage Users</h5>
      <a  href="decidecontrol_action"><span class="btn btn-dark wow fadeInUp" data-wow-delay="0.8s">Explore</span></a>
     </div>
  </div>
  <div class="card col-md-4">
      <img src="images/messages.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title wow fadeInUp" data-wow-delay="0.4s">View Messages</h5>
      <a href="messages"><span class="btn btn-dark wow fadeInUp" data-wow-delay="0.8s">Explore</span></a>
     </div>
  </div>
</div>
     </div>
        </div>
        <div class="jumbotron j2">
            <div class="row">
                <div class="col-md-5 bg-info text-white rksize">
                     <h1 class="display-4 head wow fadeInLeft">RKDF University</h1>
                     <p class="lead wow fadeInUp">Moving towards the better tomorrow.</p>
                </div>
                <div id="carouselExampleControls" class="col-md-7 carousel slide carousel-fade j2img rksize" data-ride="carousel">
                          <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/rkdf.jpg" class="rksize carouselsize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rkdf1.jpg" class="rksize carouselsize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rkdf2.jpg" class="rksize carouselsize" alt="...">
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
</html>
<?php }else{
    header('location:login.php');
} ?>