<?php 
session_start();
include "databs.php";

if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid = 0;
} 

if(isset($_POST["date"])){
    $date=$_POST["date"];
    $title=$_POST["title"];
    $text=$_POST["text"];
    
    $insertpage="INSERT INTO pages (userid,title,date,text) VALUES (\"$userid\",\"$title\",\"$date\",\"$text\")";
    $connect->exec($insertpage);
}
header("location:homepage.php");
?>