<?php

require_once '../classes/CreateDocx.inc';
require_once 'burning-functions.php';

$report_id=$_GET['report_id'];
$docx_index = new CreateDocxFromTemplate('index_page_template.docx');
createIndexPage($docx_index,$report_id);
$docx_index->createDocx('index_page');
$docx = new CreateDocx();
$docx->modifyPageLayout('A4', array('marginRight' => '1000','marginLeft' => '1000','marginHeader'=>'200','marginFooter'=>'0'));
$docx->setDefaultFont('Calibri');
addHeader($docx,$report_id);
addFooter($docx,$report_id);
//$text_box_1 = "<p style='font-size: 18; padding: 0; margin: 0; color: #FFF; text-align: center; font-family: Cambria;'><span style='font-size: 20;'>SES R</span>ECOMMENDATIONS</p>";
//addOrangeTextBox($docx,$text_box_1);
//agendaItemsAndRecommendations($docx,$report_id);
//$docx->addBreak(array('type' => 'page'));
//$text_box_2 = "<p style='font-size: 18; padding: 0; margin: 0; color: #FFF; text-align: center; font-family: Cambria;'><span style='font-size: 20;'>C</span>OMPANY <span style='font-size: 20;'>B</span>ACKGROUND</p>";
//addOrangeTextBox($docx,$text_box_2);
//companyBackground($docx,$report_id);
//$docx->addBreak(array('type' => 'page'));
//$text_box_3 = "<p style='font-size: 18; padding: 0; margin: 0; color: #FFF; text-align: center; font-family: Cambria;'><span style='font-size: 20;'>B</span>OARD <span style='font-size: 20;'>O</span>F <span style='font-size: 20;'>D</span>IRECTORS</p>";
//addOrangeTextBox($docx,$text_box_3);
//boardOfDirectorInfo($docx,$report_id);
//$docx->addBreak(array('type' => 'page'));
//$text_box_4 = "<p style='font-size: 18; padding: 0; margin: 0; color: #FFF; text-align: center; font-family: Cambria;'><span style='font-size: 20;'>R</span>EMUNERATION <span style='font-size: 20;'>A</span>NALYSIS</p>";
//addOrangeTextBox($docx,$text_box_4);
//remunerationAnalysis($docx,$report_id);
//$docx->addBreak(array('type' => 'page'));
//$text_box_5 = "<p style='font-size: 18; padding: 0; margin: 0; color: #FFF; text-align: center; font-family: Cambria;'><span style='font-size: 20;'>D</span>ISCLOSURES</p>";
//addOrangeTextBox($docx,$text_box_5);
//disclosures($docx,$report_id);
//adoptionOfAccounts($docx,$report_id);
//declarationOfDividend($docx,$report_id);
//appointmentOfAuditors($docx,$report_id);
//appointmentOfDirectors($docx,$report_id);
//directorsRemuneration($docx,$report_id);
//esops($docx,$report_id);
//relatedPartyTransaction($docx,$report_id);
//intercorporateLoans($docx,$report_id);
//schemeOfArrangement($docx,$report_id);
//corporateAction($docx,$report_id);
//issuesOfShares($docx,$report_id);
//alterrationInMoaAoa($docx,$report_id);
fillInvestmentLimits($docx,$report_id);
delistingOfShares($docx,$report_id);
donationToCharitableTrust($docx,$report_id);
officeOfProfit($docx,$report_id);

$docx->createDocx('try');
require_once '../classes/MultiMerge.inc';
$merge = new MultiMerge();
$merge->mergeDocx('index_page.docx', array('try.docx'), 'report.docx',array());
//burnExcel($report_id);
$zip_files_array = array(
//	'BoardComposition.docx',
//    'DividendAndEarning.docx',
//    'DividendPayoutRatio.docx',
//	'ExecutiveCompensation.docx',
//	'ExecutiveRemuneration.docx',
//	'MasterExcelFile.xlsx',
//	'RetireByRotation.docx',
//	'ShareholdingPattern.docx',
//	'VariationInDirectorsRemuneration.docx',
	'report.docx',
//	'graph_excel.xlsx',
//	'StockPerformance.docx',
//	'StockPrice.docx',
//	'TotalCommission.docx',
//	'UtilizationBorrowingLimits.docx',
//	'VariationInDirectorsRemuneration.docx',
//    'AuditorsRemuneration.docx',
//    'RemunerationComponents.docx',
//	'AverageCommission.docx',
);
$zip = new ZipArchive;
if($zip->open("report.zip",ZipArchive::CREATE)) {
	foreach($zip_files_array as $zip_file_name) {
		$zip->addFile($zip_file_name);
	}
}
$zip->close();
$zip_file = "report.zip";
header('Content-type: application/zip');
header('Content-Disposition: attachment; filename="'.basename($zip_file).'"');
header("Content-length: " . filesize($zip_file));
header("Pragma: no-cache");
header("Expires: 0");
ob_clean();
flush();
readfile($zip_file);
unlink($zip_file);
exit;
?>