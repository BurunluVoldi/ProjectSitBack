<?php 
include "databs.php";
session_start();

if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid=0;
}
?>
<html>
<head>
    <?php include "header.php"; ?>
    <script>
    $(document).ready(function(){
        $(document).on("click",".downloadbtn",function(){
            location.href="downloadcorrect.php";
        })
    })
    </script>
    <script>
    $(document).ready(function(){
        $(document).on("click",".downloadbtn2",function(){
            location.href="downloadcorrect2.php";
        })
    })
    </script>
    <style>
        h4{
            color:#0275d8;
        }
    </style>
    </head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 mx-auto text-center">
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-center">
                    <?php include "menu.php"; ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-9 mx-auto text-center">
                        <?php 
                        $count="SELECT COUNT(userid) AS count FROM pages WHERE userid=$userid";
                        $statement=$connect->prepare($count);
                        $statement->execute();
                        $result=$statement->fetch();
                        
                        $counter=$result["count"];
                        ?>
                        <div class="card mt-5 border-primary">  
                            <div class="card-header border-primary text-center ">
                                <h4>Warning!</h4>
                            </div>
                            <div class="card-body border-primary ">
                                <span><strong>You filled <?php echo $counter;?> pages. If you haven't filled all of your internship notebook; your document may be corrupted or false...</strong></span>
                            </div>
                            <div class="card-footer border-primary">
                                <button class="downloadbtn btn btn-danger btn-block"><strong>Download Corrupted if not Full</strong></button>
                                <button class="downloadbtn2 btn btn-success btn-block"><strong>Download Till Now</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>