<?php 
include "databs.php";
session_start();

$messageshow=false;
$mesaj="";
if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid=0;
}

if (!isset($_SESSION["limit"])){
    if(isset($_SESSION["message"])){
        $message=$_SESSION["message"];
        $messageshow=true;
        $_SESSION["limit"]="okok";
        $_SESSION["attempt"]=0;
    }
}

if(isset($_GET["download"])){
    if($_GET["download"]=="true"){
        $mesaj="Downloaded Successfully!";
    } else {
        $mesaj="A problem occured while downloading. Please try again later.";
    }
}
?>

<html>
<head>
    <style>
        .btn-homepage{
            height: 200px;
        } 
    </style>
    <?php include "header.php"; ?>
    </head>
<body>
    <?php 
    $statement=$connect->prepare("SELECT name,surname FROM users WHERE id=$userid");
        $statement->execute();
        $result=$statement->fetch();
        $sessioname=$result["name"]." ".$result["surname"];
    ?>
    <?php
    if ($messageshow==true){
        ?>
    <script>
            Swal.fire(
            'HEY! Welcome <?php echo $sessioname; ?>',
            '<?php echo $message; ?>',
            'success'
            )
    </script>
    
    <?php
    }
    if ($mesaj!=""){
    ?>    
    <script>
            Swal.fire(
            'HEY!',
            '<?php echo $mesaj; ?>',
            'success'  ) 
    </script> <?php
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 mx-auto text-center bg-warning">
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-center">
                    <?php include "menu.php"; ?>
                    </div>
                </div>
                
                <div class="row text-center">
                    
                    <div class="col-xl-10 mx-auto text-center">
                        <div class="card border-dark">
                            <div class="card-header border-dark"><strong>Announcements</strong></div>
                            <div class="card-body border-dark"><?php 
                                $anno="SELECT * FROM anno";
                                $statement=$connect->prepare($anno);
                                $statement->execute();
                                
                                while($result=$statement->fetch()){
                                    echo $result["announcement"]."<br>*************************<br>";
                                }
                                ?></div>
                            <div class="card-footer border-dark text-right">Copyright Claimed by Enes Kilicarslan</div>
                        </div>
                    </div>
                          
                </div>
               <br>   
            </div>
        </div>
    </div>
    </body>
</html>