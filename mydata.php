<?php 
session_start();
include "databs.php";

$message="";
if(isset($_GET["sonnuc"])){
    switch ($_GET["sonnuc"]){
        case "zapzap":
            $message="saved successfully!";
            break;
            
        case "zupzup":
            $message="an error occured!?";
            break;
    }
}
if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid = 0;
}

?>

<html>
<head>
    <?php include "header.php"; ?>
    <style>
        form{
            border: 3px;
            border-style: groove;
            padding: 3px;
            padding-left: 4px;
            padding-right: 4px;
        }
    </style>
</head>
<body>
    <?php 
    if(!($message=="")){
        if($_GET["sonnuc"]=="zapzap"){
            ?>
    <script>
        Swal.fire({
        type:'success',
        title:'DONE!',
        text: '<?php echo $message;?>'
    })
    </script>
       <?php } else { ?>
        <script>
        Swal.fire({
            type:'error',
            title:'Oopsie!',
            text: '<?php echo $message;?>'
        })
            </script>
    <?php }
        
    }
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 mx-auto bg-warning">
                
                <div class="row">
                    <div class="col-xl-12 mx-auto text-center">
                    <?php include "menu.php"; ?>
                    </div>
                </div>
                
                <div class="row">
                    <?php 
                    $fetchdata="SELECT * FROM users WHERE id=$userid";
                    $statement=$connect->prepare($fetchdata);
                    $statement->execute();
                    
                    $result=$statement->fetch();
                    ?>
                    <div class="col-xl-10 mx-auto">
                        <form method="post" action="savedata.php">
                            <div class="form-group"><h5>Dear <?php echo $result["username"];?>,</h5></div>
                            <div class="from-group">
                                Name:<input class="form-control" name="name" type="text" value="<?php echo $result['name']?>">
                            </div>
                            <div class="from-group">
                                Surname:<input class="form-control" name="surname" type="text" value="<?php echo $result['surname']?>">
                            </div>
                            <div class="from-group">
                                Number:<input class="form-control" name="number" type="text" value="<?php echo $result['schoolnum']?>">
                            </div>
                            <div class="from-group">
                                Email:<input class="form-control" name="email" type="email" value="<?php echo $result['email']?>">
                            </div>
                            <div class="from-group">
                                Start Date:<input class="form-control" name="start" type="date" value="<?php echo $result['start']?>">
                            </div>
                            <div class="from-group">
                                End Date:<input class="form-control" name="end" type="date" value="<?php echo $result['end']?>">
                            </div>
                            <div class="from-group">
                                Institution:<input class="form-control" name="institution" type="text" value="<?php echo $result['institution']?>">
                            </div>
                            
                            
                            <div class="text-right">
                            <button class="btn btn-primary mt-2" type="submit">Save!</button>
                            </div>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
        
    </div>
</body>
</html>