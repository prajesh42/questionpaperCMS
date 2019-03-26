
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
        <meta http-equiv="refresh" content="15">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<style>
    .name,.phone,.email{
        width:150px;
       }
</style>
    
    
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
        <div class="section">
        <div class="row content-area" style="margin-top:60px;">
            <div class="row">
                <div class="col-md-2">
                </div>
                <?php
                        $query="SELECT * FROM contactus";
                        $result= mysqli_query($link, $query);
                        $rowcount=mysqli_num_rows($result);
                        if($rowcount!=0)
                        {
                        ?>
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead align="center">
                        <tr>
                        <th>Details</th>
                        <th>Messages</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php $count=0; while($row= mysqli_fetch_array($result)){
                            $count++;
                            ?>
                        
                        <tr>
                            
                            <td class="name">
                                <p><i class="fa fa-user" style="font-size:40px;"></i></p>
                                <p><?php echo $row['name'];?></p>
                                <p> <?php echo $row['phone'];?></p>
                        <p><?php echo $row['email'];?></p></td>
                        <td class="message"><?php echo $row['messages'];?></td>
                        <td>
                            <p><a class="btn" style="color:blue;" data-toggle="modal" data-target="#deletemessages<?php echo $count; ?>"> Delete </a></p>
                            <div class="modal fade" id="deletemessages<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete this message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary"><a style='color:white; text-decoration: none;' href="deletemessage_action?id=<?php echo $row['id'] ?>">Yes</a></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                        <?php } else{ ?>
                <div class="jumbotron col-md-8" style="text-align:center;background-color: none;">
                    <p>No messages are available.</p>
                    
                </div>
                        <?php } ?>
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
    </body>
</html> 
  <?php } else{
     header('location:login');
  } ?>