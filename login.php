<?php 
include "databs.php";
session_start();


 $message="";
 $logout="no";
 $register="no";
if(isset($_GET["sonuc"])){
    switch ($_GET["sonuc"]){
        case "passerror":
            $temp=$_SESSION["attempt"];
            if($temp>=2){   
                $message="permission denied. contant with the admin.";
            } else {
                $message="Wrong Password!!";
            }
            break;
        case "something":
            //this error comes from register page but we still take it from bad login attempt, unfortunate!!
            $message="Something went wrong!";
            break;
        case "usererror":
            $message="Wrong username!";
            break;
        case "logout":
            $message="Logged out succesfully!!";
            $logout="yes";
            break;
        case "registersucces":
            $message="Registered succesfully. Insert your info NOW! (:";
            $register="yes";
            break;

    }
}
?>
<html>
<?php include "header.php"; ?>
    <script>
        //we could have used validate function with its own plugin. Further look required!!.
    $(document).ready(function(){
        $("#submitbuton").on("click", function(){
            var username =$("#username").val();
            var password =$("#pass").val();
            
            if (username=="" || password==""){
                Swal.fire(
                'HEY!',
                'need to fill the areas...',
                'question');
                return false;
            }
        });
    });
    </script>
<style>
    .container {
        margin-top: 150px;
    }
    h5 {
        margin-top: 17px;
    }
    </style>
<body>
    <?php 
    if(!($message=="")){
        if($logout=="yes"){
            ?>
    <script>
    Swal.fire({
        type:'succes',
        title:'DONE!',
        text: '<?php echo $message;?>'
    })
    </script>
    <?php    
    }
        else if ($register=="yes"){ ?>
            <script>
    Swal.fire({
        type:'success',
        title:'Alrighty Mighty!',
        text:'<?php echo $message;?>'
    })
    </script>
    <?php    }
        else { ?>
           <script>
    Swal.fire({
        type:'error',
        title:'Holly Molly!',
        text:'<?php echo $message;?>'
    })
    </script> 
        <?php }
    }
    ?>
    
    <div class="container">
        <div class="row centered-form">
            <div class="col-xl-4 mx-auto text-center">
                <h3 class="panel-title">Login Here</h3><h5><small>Fill all the blanks</small></h5>
                <div class="panel-body">
                    <div class="text-center">
                        <form id="formlogin" method="post" action="checklogin.php">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-sm" id="username" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <input type="password" name ="password" id="pass" class="form-control input-sm" placeholder="Password">
                            </div> 

                            <button id="submitbuton" type="submit" class="btn-primary btn-block btn">
                            LOG IN!</button>
                            
                            <a href="register.php"><h5><small>Don't have an account? Click here...</small></h5></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>