
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
        <div class="section">
        <div class="row content-area" style="margin-top:60px;">
            <div class="row">
                <div class="col-md-3">
                    <?php
                        $id=$_GET['qid'];
                        $query="select * from questions where id LIKE '$id'";
                        $result= mysqli_query($link, $query);
                        $numberofrows= mysqli_num_rows($result);
                        $row= mysqli_fetch_array($result);
                        $field=$row['field'];
                        $branch=$row['branchname'];
                        $year=$row['year'];
                        $sem=$row['semester'];
                        $filetype=$row['filetype'];
                        $filename=$row['filename'];
                        $data=$row['data'];
                        ?>
                </div>
            <div class="col-md-6">
                <!--This form is for updating data and questions of the database-->
                <div id="update">
                    <form style=" box-shadow: 0px 1px 2px rgba(0,0,0,0.5); padding: 5px;" method="POST" action="updatequestion_aciton.php" enctype="multipart/form-data">
                    <a style="color:white;" class="btn btn-dark btn-block">Update Menu</a>
                                      <div class="form-group col-md-12">
                                          <input hidden value="<?php echo $id; ?>" name="qid">
                                        <label for="field">Field</label>
                                        <select class="form-control" onclick="checkbranch()" id="field" name="field">
                                            <option><?php echo $field; ?></option>
                                            
                                      </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="branch">Branch</label>
                                        <select class="form-control" id="branch" name="branch">
                                          <option><?php echo $branch; ?></option>
                                      </select>
                                      </div>
                                    <div class="form-group col-md-12">
                                      <label for="year">Year</label>
                                      <select class="form-control" id="year" name="year">
                                          <option><?php echo $year; ?></option>
                                          <?php
                                            $query="select * from qpyear";
                                            $result= mysqli_query($link, $query);
                                            while($row= mysqli_fetch_array($result))
                                            {
                                           ?>
                                          <option><?php echo $row['year'] ?></option>
                                            <?php } ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label for="sem">Semester</label>
                                      <select class="form-control" id="sem" value="" name="sem">
                                          <option><?php echo $sem; ?></option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                          <option>6</option>
                                          <option>7</option>
                                          <option>8</option>
                                      </select> 
                                    </div>
                                      <div class="form-group col-md-12">
                                        <label for="myfile">File</label>
                                        <input type="file" required class="form-control" name="myfile" id="myfile">
                                      </div>
                                     <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" style="margin-left:10px;" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" style="margin-left:28px;" for="gridCheck">
                                          Check me out
                                        </label>
                                      </div>
                                    </div>
                                    <button style="margin-left:15px;" class="btn btn-primary">Update</button>
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
    <script>
    function checkbranch()
        {
          $('#field').removeClass("form-errorbox");
         var field=$("#field").val();
       if(field=='Engineering')
           {
         $('#branch').html("<option>CSE</option>\n\
<option>EEE</option>\n\
<option>ECE</option>\n\
<option>CE</option>\n\
<option>IT</option>\n\
<option>ME</option>");
          }
         else if(field=='Agriculture'){
             $('#branch').html("<option>BTA</option>\n\
                                <option>BAG</option>");
         }else if(field=='M.Tech'){
              $('#branch').html("<option>CS</option>\n\
                <option>DC</option>\n\
                <option>PE</option>\n\
                <option>CT</option>\n\
                <option>PS</option>\n\
                <option>VD</option>\n\
                <option>TH</option>\n\
                <option>PIE</option>");
         }
      }
    </script>
</html> 
  <?php } else{
     header('location:login');
  } ?>