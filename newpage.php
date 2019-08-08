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
    <?php include "header.php";?>
    
    
    <style>
    .btn-outline-primary{
            background-color: white;
        }
        
    span {
            font-size: 22px;
            font-weight: bold;
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
                    <div class="col-xl-12 mx-auto text-center">
                        <div class="container-fluid aaaaa bg-warning">
                            <form method="POST" action="savepage.php" id="forum">
                            
                            <div class="text-center">
                                <span>New Page</span>    
                            </div>
                                
                            <div class="form-group">
                                <input class="form-control" type="date" id="date" name="date" placeholder="Date">    
                            </div>
                                
                            <div class="form-group">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Title">    
                            </div>
                                
                            <div class="form-group">
                                <textarea rows="19" class="form-control" type="text" id="text" name="text" placeholder="Text"></textarea>   
                            </div>
                                
                            <div class="buttton text-right">
                                <button type="submit" name="submit" class="btn-outline-primary btn">Submit</button>
                            </div>
                               <br> 
                            </form>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
    </body>
</html>