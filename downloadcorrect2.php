<?php 
require_once "vendor/autoload.php";

include "databs.php";
session_start();

if(isset($_SESSION["id"])){
    $userid=$_SESSION["id"];
} else {
    $userid=0;
}
//inserting phpword to variable
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();

//database
$fetchpages="SELECT * FROM pages WHERE userid=$userid ORDER BY date ASC";
$statement=$connect->prepare($fetchpages);
$statement->execute();

$temp_text="";
$temp_title="";
$temp_date="";
$i=0;
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '111111', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableStyle2 = array('borderSize' => 6, 'borderColor' => '111111', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50, 'marginLeft' => 10000);
while ($result=$statement->fetch()){
    $i++;
    $temp_text=$result["text"];
    $temp_title=$result["title"];
    $temp_date=$result["date"];
    
    $table = $section->addTable();
    $table->addRow();
    $table->addCell(10000,$fancyTableStyle)->addText($temp_title);
   // $section->addText($temp_title);
    
    $table = $section->addTable();
    $table->addRow(12000);
    $table->addCell(10000,$fancyTableStyle)->addText($temp_text);
    //$section->addText($temp_text);
    
    $table = $section->addTable();
    $table->addRow();
    $table->addCell(10000,$fancyTableStyle2)->addText($temp_date);
    //$section->addText($temp_date);
    
    
    $section->addPageBreak();
    
}
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('testsublime.docx');

sleep(1);
header("Location:homepage.php?download=true");

?>