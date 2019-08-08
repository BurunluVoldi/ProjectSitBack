<?php
include "databs.php";
session_start();

if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid = 0;
}
?>

<html>
<head>
    <?php include "header.php"; ?>
    <script>
    $(document).ready(function(){
        $(document).on("click",".insertpage",function gg2(){
            location.href="newpage.php";
        })
    })
    </script>
</head>
<body>
    <script>
        
    $(document).ready(function (){
        $(".edit").click(function (){
            var newest_id = $(this).attr("id");
            
            $.ajax({
                url:"editpage.php",
                method:"GET",
                data:{newest_id:newest_id},
                success:function(data){
                    
                    $("#getter").html(data);   
                    $("#m1").modal("show");   
                }
            });
        });
        
        
 
    });
        
    $(document).ready(function(){
        $(document).on("click",".delet",function gg(){
            var pageid = $(this).attr("id");
            

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                                  $.get("removepage.php?pageid="+pageid);

                Swal.fire(
                  'Deleted!',
                  'Your page has been deleted.',
                  'success'
                );
                  $(this).parents(".card").fadeOut();

              }
            })
            
        
        })
    });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 mx-auto text-center">
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-center">
                    <?php include "menu.php"; ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-right">                    
                        <button class="btn btn-warning btn-block insertpage"><strong>Insert Page</strong></button>                 
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-center">
                        <div class="row">
                        <?php 
                        $fetching="SELECT * FROM pages WHERE userid=$userid ORDER BY date DESC";
                        $statement=$connect->prepare($fetching);
                        $statement->execute();
                        
                        while($result=$statement->fetch()){
                        ?>
                        <div class="col-xl-4 mx-auto">
                            <div class="card border-warning mt-3">
                                
                                <div class="card-header border-warning text-center">
                                    <div class="row" style="font-family: 'Arial';">
                                        <h3><?php echo $result["title"];?></h3>      
                                    </div>
                                    
                                    <div class="row" style="font-style: oblique;">
                                            <small><?php echo date("d-m-Y",strtotime($result["date"])); ?></small>
                                    </div>
                                </div>
                                
                                <div class="card-body" style="height:200px;">
                                    <span class="card-text"><?php echo $result["text"]; ?></span>
                                </div>
                                    
                                <div class="card-footer border-warning "> 
                                        <button id="<?php echo $result["id"]; ?>" class="btn-warning btn btn-sm edit float-right ">Edit!</button>   
                                        <button id="<?php echo $result["id"]; ?>" class="btn-danger btn btn-sm delet float-right mr-1 ">Delete!</button>
                                        </div>
                            </div>
                        </div>
                        <?php    
                        }
                        ?>
                    </div>
                    </div>    
                </div>
                
            </div>
        </div>
    </div>
    <!-- The Modal -->
<div class="modal fade" id="m1">
  <div class="modal-dialog">
    <div class="modal-content">
        <div id="getter"></div>

 
    </div>
  </div>
</div>  
    
</body>
</html>