<?php 
$connect = new PDO ("mysql:host=127.0.0.1; dbname=mypdo","root","");
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>