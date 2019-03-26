
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
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <table class="table table-hover" style="text-align: center;">
                        <thead class="table-success">
                            <tr>
                                <th>Available Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-info">
                    <?php $query="select * from qpyear";
                          $result= mysqli_query($link, $query);
                          while($row= mysqli_fetch_array($result))
                          { ?>
                              <tr>
                                  <td><?php echo $row['year']; ?></td>
                                  <td><a href="deleteyear_action?id=<?php echo $row['id']; ?>">Delete</a></td>
                              </tr>
                   <?php
                              }    
                    ?>
                        </tbody>
                        </table>
                </div>
                <div class="col-md-1"></div>
            <div class="col-md-4">
                <!--This form is for updating data and questions of the database-->
                <div id="update">
                    <form style=" box-shadow: 0px 3px 10px rgba(0,0,0,0.5); padding: 5px;" method="POST" action="addyear_action.php" enctype="multipart/form-data">
                    <a style="color:white;" class="btn btn-dark btn-block">Add Year</a>
                                      <div class="form-group col-md-12">
                                        <label for="year">Year</label>
                                        <input type="text" class="form-control" id="year" name="year" onkeyup="checkyear();" required><p id="check"></p>
                                      </div>
                                    <button style="margin-left:15px;" id='addyear' class="btn btn-primary">Add Year</button>
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
     
     function checkyear(){
          var year=$("#year").val();
          $("#check").load("checkyear.php",{
              year: year
          });
        
         }
         </script>
         
         <script type="text/javascript">
            $(document).ready(function(){
            $("#addyear").click(function(){
            var year = $("#year").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString ='year=' + year;
            // AJAX Code To Submit Form.
            $.ajax({
            type: "POST",
            url: "addyear_action.php",
            data: dataString,
            timeout:90000,
            success: function(result){
                $('#error_register').html(result);
                var delay=1000;
                setTimeout(function(){
            window.location.href = 'addyear.php';
                },delay);
            }
            });
            
            return false;
            });
            });
    </script>
</html> 
  <?php } else{
     header('location:login.php');
  } ?>