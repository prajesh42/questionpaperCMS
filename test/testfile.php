
//        $(document).ready(function(){
//        $("#sem").on('select',function() {
//          var year=$("#year").val();
//          var semester=$("#sem").val();
//          $("#checksem").load("checksem.php",{
//              semester:semester,
//              year:year
//          });
//        
//         });
//         });
     
//     $(document).ready(function(){
//            $("#insert").submit(function(){
//            var field = $("#field").val();
//            var branch = $("#branch").val();
//            var year = $("#year").val();
//            var semester = $("#sem").val();
//            var myfile=$("#myfile").val();
//            // Returns successful data submission message when the entered information is stored in database.
//            var dataString = 'field='+ field + '&branch='+branch+'&year='+year + '&sem='+ semester + '&myfile='+myfile;
//            if($("#checksem").html()== 'more than 5'){
//                $("#submitted").html("Already 5 questions listed for year" + year +"and semester "+semester);
//            }
//            else
//            {
//            // AJAX Code To Submit Form.
//            $.ajax({
//            type: "POST",
//            url: "insertquestion_action.php",
//            data: dataString,
//            cache: false,
//            success: function(result){
//                alert(result)
//            window.location.href = 'Editquestions.php';
//            },
//            error: function(result){
//                alert(error occured);
//                alert(result)
//            }
//            });
//            }
//            return false;
//            });
//            });