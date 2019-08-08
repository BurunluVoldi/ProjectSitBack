<?php 
include "databs.php";

if (isset($_GET["pageid"])){
   $pageid=$_GET["pageid"];
    $sql="DELETE FROM pages WHERE id=$pageid";
    $statement=$connect->prepare($sql);
    $statement->execute();
}
?>