<?php 
include "databs.php";

if(isset($_POST["submitte"])){
    $newid=$_GET["id"];
    $title=$_POST["title"];
    $text=$_POST["text"];
    $date=$_POST["date"];
  }  
    $updatpage="UPDATE pages SET date=\"$date\", title=\"$title\", text=\"$text\" WHERE id=$newid";
    $connect->exec($updatpage);


sleep(1);
header("location:mynotebook.php")

?>