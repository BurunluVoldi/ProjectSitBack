<?php
require_once "vendor/autoload.php";

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

for ($i=1;$i<=30;$i++){
   $templateProcessor->setValue("deneme$i", "birden fazka kelimelerle denemeler"); 
}


$templateProcessor->saveAs('sonuc.docx');

?>