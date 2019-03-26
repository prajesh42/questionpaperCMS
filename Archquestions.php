
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php   
include './include/common.php';
session_start();
$loginid=$_SESSION['loginid'];
$query="SELECT role FROM admin where loginid LIKE '$loginid'";
$result= mysqli_query($link, $query);
$row= mysqli_fetch_array($result);
  if(isset($loginid) && $row['role']=='user')
  {
      $field=$_SESSION['fieldid'];
      
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
            </div>
            <div class="row">
            <div class="col-md-4">
                <!--This form is for inserting data and questions into the database-->
                <form style=" box-shadow: 0px 1px 2px rgba(0,0,0,0.5); margin-bottom:5px; padding: 5px;" id="data" method="post" enctype="multipart/form-data">
                    <a style="color:white;" class="btn btn-dark btn-block">Insert Menu</a>
                                      <div class="form-group col-md-12">
                                        <label for="field">Field</label>
                                        <select class="form-control" id="field" name="field">
                                          <option><?php echo $field; ?></option>
                                      </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="branch">Branch</label>
                                        <select class="form-control" onchange="checksem()" id="branch" name="branch">
                                          <option>AR</option>
                                      </select>
                                      </div>
                                    <div class="form-group col-md-12">
                                      <label for="year">Year</label>
                                      <select class="form-control" id="year" onchange="checksem();checkyear();" name="year">
                                          <option>Year</option>
                                         <?php
                                            $query="select * from qpyear";
                                            $result= mysqli_query($link, $query);
                                            while($row= mysqli_fetch_array($result))
                                            {
                                           ?>
                                          <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
                                            <?php } ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label for="sem">Semester</label>
                                      <select class="form-control" id="sem" value="" onchange="checksem()" name="sem">
                                          <option>Semester</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                      </select> 
                                      <p hidden id="checksem"></p>
                                    </div>
                                      <div class="form-group col-md-12">
                                        <label for="myfile">File</label>
                                        <input type="file" required class="form-control" value="rkdf.pdf" name="myfile" id="myfile">
                                      </div>
                                     <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" style="margin-left:10px;"  type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" style="margin-left:28px;" for="gridCheck">
                                          Check me out
                                        </label>
                                      </div>
                                    </div>
                                   <button style="margin-left:15px;" id='insertquestion' class="btn btn-primary">Insert</button>
                                   <p class="form-error" id='submitted'></p> 
                                 </form>
                                </div>
            <div class="col-md-8">
                <form method="POST"  enctype="multipart/form-data" class="form-group">
                    <div class="row">
                        <div class="col-md-10" style="margin-bottom: 5px;">
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
                                File type
                            </th>
                            <th>
                                File name
                            </th>
                            <th style="text-align: center;">
                                Action
                            </th>
                        </tr>  
                    </thead>
                    <tbody>
                        <?php if(isset($_POST['find'])){
                                 $search=$_POST['search'];
                                 $query="select * from questions where (field LIKE '%$search%' OR year LIKE '%$search%'  OR branchname LIKE '%$search%' OR semester LIKE '%$search%' OR filename LIKE '%$search%') AND (field LIKE '$field')";
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
                       <?php echo $row['filetype'] ?> 
                            </td>
                            <td>
                       <?php echo $row['filename'] ?> 
                            </td>
                            <td>   
                                <a name="edit" class="btn" href="Updatequestions.php?qid=<?php echo $row['id']; ?>" style="color:blue;">Edit</a> | <a class="btn" style="color:blue;" data-toggle="modal" data-target="#deleteQuestion<?php echo $count; ?>"> Delete </a>
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
                                    Do you want to delete this file?
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
                    $query="select * from questions where field LIKE '$field'";
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
                       <?php echo $row['filetype'] ?> 
                            </td>
                            <td>
                       <?php echo $row['filename'] ?> 
                            </td>
                            <td>
                                <a class="btn" style="color:blue;" href="Updatequestions.php?qid=<?php echo $row['id']; ?>"> Edit </a>  | <a class="btn" style="color:blue;" data-toggle="modal" data-target="#deleteQuestion<?php echo $count; ?>"> Delete </a>
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
                                    Do you want to delete this file?
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
        function checksem(){
          $('#sem').removeClass("form-errorbox");
          var field=$("#field").val();
          var branch=$("#branch").val();
          var year=$("#year").val();
          var semester=$("#sem").val();
          $("#checksem").load("checksem.php",{
              field:field,
              branch:branch,
              semester:semester,
              year:year
          });
          }
          function checkyear(){
          $('#year').removeClass("form-errorbox");
          }
      </script>
    <script>
      $(document).ready(function(){
          $("form#data").submit(function(event){
              event.preventDefault();
              var form = $('#data')[0];
              var year=$('#year').val();
              var sem=$('#sem').val();
              
		// Create an FormData object 
                var data = new FormData(form);
              if($("#exc").html()=='exceded' && year!='Year' )
              {
                  $("#submitted").html("<b>Can't add more than five questions for sem "+sem+ " of year "+year+"</b>");
              }
              else if(year=='Year')
              {
                  $("#submitted").html("Please select year.");
                  $('#year').addClass("form-errorbox");
              }
              else if(sem=='Semester'){
                  $("#submitted").html("Please select semester.");
                  $('#sem').addClass("form-errorbox");
              }
              else
               {
            // AJAX Code To Submit Form.
             $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "insertquestion_action.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {

                $("#submitted").html(data);
                var delay=1000;
                setTimeout(function(){
               window.location.href = 'decidequestion_control.php';
             },delay);
            }
            });
            }
          });
      });
    </script>
    
    </body>
</html> 
  <?php } else{
     header('location:login.php');
  } ?>