<?php 
include "databs.php";
session_start();
if (isset($_POST["name"])){

        //this is important !!!!
    $userid=$_SESSION["id"];

    
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $number=$_POST["number"];
    $start=$_POST["start"];
    $end=$_POST["end"];
    $institution=$_POST["institution"];
    
    
    $sql="UPDATE users SET name=\"$name\",surname=\"$surname\",schoolnum=\"$number\",start=\"$start\",end=\"$end\",institution=\"$institution\" WHERE id=$userid";
    $statement=$connect->prepare($sql);
    $statement->execute();
    header("location:mydata.php?sonnuc=zapzap");
    exit;
}
header("location:mydata.php?sonnuc=zupzup");
exit;
?>