<?php
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
require_once '../Classes/yo/Classes/PHPExcel/IOFactory.php';
require_once '../Classes/yo/Classes/PHPExcel.php';
$objPHPexcel = PHPExcel_IOFactory::load('yo.xlsx');
$objWorksheet = $objPHPexcel->getActiveSheet();
$objWorksheet->getCell('L23')->setValue('John');
$objWorksheet->getCell('M23')->setValue('Smith');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPexcel, 'Excel2007');
$objWriter->save('write.xlsx');
?>