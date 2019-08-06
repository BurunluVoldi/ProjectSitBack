<?php 

//phpword implemention
require_once "vendor/autoload.php";

include "databs.php";
session_start();
if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid=0;
}

echo "Processing....";
$templateProcessor =  new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

$fetchpages="SELECT * FROM pages WHERE userid=$userid ORDER BY date ASC";
$statement=$connect->prepare($fetchpages);
$statement->execute();



$temp_text="";
$temp_title="";
$temp_date="";
$i=0;


while($result=$statement->fetch()){
    $i++;
    $temp_text=$result["text"];
    $temp_title=$result["title"];
    $temp_date=$result["date"];
    $templateProcessor->setValue("text$i", $temp_text); 
    $templateProcessor->setValue("title$i", $temp_title); 
    $templateProcessor->setValue("date$i", $temp_date); 

}
$fetchschool="SELECT school FROM users WHERE id=$userid";
$statement=$connect->prepare($fetchschool);
$statement->execute();
$result=$statement->fetch();
$templateProcessor->setValue("school", $result["school"]); 


$templateProcessor->saveAs('sonuc.docx');
sleep(1);
header("Location:homepage.php?download=true");

?>