<?php 
 $message="";
if(isset($_GET["sonuc"])){
    switch($_GET["sonuc"]){
        case "something":
            $message="Something went wrong!";
            break;
        case "usererror":
            $message="There is a username already existed so change it...";
            break;
    }
}
?>
<html>
<head>
    <?php include "header.php"; ?>
    <style>
    .container {
            margin-top: 150px;
        }
        h5 {
            margin-top: 17px;
        }
    </style>
    
    <script>
        //we could have used validate function with its own plugin. Further look required!!.
    $(document).ready(function(){
        $("#submitform").on("click", function(){
            var username =$("#username").val();
            var password =$("#password").val();
            var email =$("#email").val();
            
            if (username=="" || password=="" || email==""){
                Swal.fire(
                'HEY!',
                'need to fill the areas...',
                'question');
                return false;
            }
        });
    });
    </script>
    </head>
    <body>
    <?php 
        if(!$message==""){
            ?>
        <script>
        Swal.fire({
            type:'error',
            title:'NOO!',
            text:'<?php echo $message;?>'
        })
        </script>
        <?php
        }
        ?>
        
        <div class="container">
            <div class="row centered-form">
                <div class="col-xl-4 mx-auto text-center">
                    <h3>Sign Up</h3><h5><small>Fill all the blanks</small></h5>
                    <div class="panel-body">
                        <form method="post" action="saveregister.php" id="register">
                            <div class="form-group">
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control input-sm">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="E-mail">
                            </div>
                            
                            <button name="submitform" id="submitform" type="submit" class="btn btn-block btn-secondary">Sign Up</button>
                            
                            <a href="login.php"><h5><small>Already have an account? Click here...</small></h5></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </body>
</html>