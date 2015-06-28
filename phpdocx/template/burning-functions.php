<?php
session_start();
include_once("../db/databasereport.php");
date_default_timezone_set('Asia/Kolkata');
require_once '../excellib/Classes/PHPExcel/IOFactory.php';

$resolution_text_box = true;

function burnExcel($report_id) {
    $db = new ReportBurning();
    $generic = $db->getGraphData($report_id);
    $share_holding_patterns = $generic['share_holding_patterns'];
    $variation_director_remuneration = $generic['variation_director_remuneration'];
    $remuneration_growth = $generic['remuneration_growth'];
    $board_independence = $generic['board_independence'];
    $dividend_and_earnings = $generic['dividend_and_earnings'];
    $dividend_payout_ratio = $generic['dividend_payout_ratio'];
    $appointment_auditors_table_1 = $generic['appointment_auditors_table_1'];
    $executive_compensation = $generic['executive_compensation'];
    $average_commission = $generic['average_commission'];
    $director_commision = $generic['director_commision'];
    $stock_performance = $generic['stock_performance'];
    $borrowing_limits = $generic['borrowing_limits'];


    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("burning.xlsx");

    $fin1= $share_holding_patterns[0]['financial_year'];
    $fin2= $share_holding_patterns[1]['financial_year'];
    $fin3= $share_holding_patterns[2]['financial_year'];
    $fin4= $share_holding_patterns[3]['financial_year'];

    $objPHPExcel->getActiveSheet()->SetCellValue('C4', $fin1);
    $objPHPExcel->getActiveSheet()->SetCellValue('C5', $share_holding_patterns[0]['promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C6', $share_holding_patterns[0]['fii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C7', $share_holding_patterns[0]['dii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C8', $share_holding_patterns[0]['others']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D4', $fin2);
    $objPHPExcel->getActiveSheet()->SetCellValue('D5', $share_holding_patterns[1]['promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D6', $share_holding_patterns[1]['fii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D7', $share_holding_patterns[1]['dii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D8', $share_holding_patterns[1]['others']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E4', $fin3);
    $objPHPExcel->getActiveSheet()->SetCellValue('E5', $share_holding_patterns[2]['promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E6', $share_holding_patterns[2]['fii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E7', $share_holding_patterns[2]['dii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E8', $share_holding_patterns[2]['others']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F4', $fin4);
    $objPHPExcel->getActiveSheet()->SetCellValue('F5', $share_holding_patterns[3]['promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F6', $share_holding_patterns[3]['fii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F7', $share_holding_patterns[3]['dii']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F8', $share_holding_patterns[3]['others']);

    // Remuneration Growth

    for($i=38,$j=0;$i<=42;$i++,$j++) {
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $remuneration_growth[$j]['financial_year']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $remuneration_growth[$j]['md']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $remuneration_growth[$j]['indexed_tsr']);
    }

    // Retiring

    $objPHPExcel->getActiveSheet()->SetCellValue('C16', $board_independence['retiring']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C17', $board_independence['non_retiring']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C18', $board_independence['not_applicable']);

    // Board Independence

    $objPHPExcel->getActiveSheet()->SetCellValue('C28', $board_independence['id_as_per_ses']/100);
    $objPHPExcel->getActiveSheet()->SetCellValue('C29', $board_independence['nid_as_per_ses']/100);
    $objPHPExcel->getActiveSheet()->SetCellValue('C30', $board_independence['nid_as_per_company']/100);
    $objPHPExcel->getActiveSheet()->SetCellValue('C31', $board_independence['id_as_per_company']/100);

    // Variation

    $objPHPExcel->getActiveSheet()->SetCellValue('C50', $variation_director_remuneration['ex_promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C51', $variation_director_remuneration['ex_non_promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D50', $variation_director_remuneration['non_ex_promoter']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D51', $variation_director_remuneration['non_ex_non_promoter']);

    // Dividend and Earnings
    for($i=60,$j=0;$i<=62;$i++,$j++) {
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $dividend_and_earnings[$j]['financial_year']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $dividend_and_earnings[$j]['dividend']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $dividend_and_earnings[$j]['eps']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $dividend_and_earnings[$j]['dividend_payout']);
    }

    // Dividend payout ratio
    for($i=72,$j=0;$i<=74;$i++,$j++) {
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $dividend_payout_ratio[$j]['dividend']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $dividend_payout_ratio[$j]['eps']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $dividend_payout_ratio[$j]['dividend_payout']);
    }

    // appointment_auditors_table_1

//    $appointment_auditors_table_1

    $objPHPExcel->getActiveSheet()->SetCellValue('C82', $appointment_auditors_table_1[0]['financial_year']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D82', $appointment_auditors_table_1[1]['financial_year']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C83', $appointment_auditors_table_1[1]['audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D83', $appointment_auditors_table_1[1]['audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C84', $appointment_auditors_table_1[1]['audit_related_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D84', $appointment_auditors_table_1[1]['audit_related_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C85', $appointment_auditors_table_1[1]['non_audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D85', $appointment_auditors_table_1[1]['non_audit_fee']);


    $year_1 = intval(substr($appointment_auditors_table_1[2]['financial_year'],2,2));
    $year_1 = "FY ".($year_1-1)."/".$year_1;
    $year_2 = intval(substr($appointment_auditors_table_1[1]['financial_year'],2,2));
    $year_2 = "FY ".($year_2-1)."/".$year_2;
    $year_3 = intval(substr($appointment_auditors_table_1[0]['financial_year'],2,2));
    $year_3 = "FY ".($year_3-1)."/".$year_3;

    $objPHPExcel->getActiveSheet()->SetCellValue('C96', $year_1);
    $objPHPExcel->getActiveSheet()->SetCellValue('D96', $year_2);
    $objPHPExcel->getActiveSheet()->SetCellValue('E96', $year_3);

    $objPHPExcel->getActiveSheet()->SetCellValue('C97',$appointment_auditors_table_1[2]['audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C98',$appointment_auditors_table_1[2]['audit_related_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C99',$appointment_auditors_table_1[2]['non_audit_fee']);

    $objPHPExcel->getActiveSheet()->SetCellValue('D97',$appointment_auditors_table_1[1]['audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D98',$appointment_auditors_table_1[1]['audit_related_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D99',$appointment_auditors_table_1[1]['non_audit_fee']);

    $objPHPExcel->getActiveSheet()->SetCellValue('E97',$appointment_auditors_table_1[0]['audit_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E98',$appointment_auditors_table_1[0]['audit_related_fee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E99',$appointment_auditors_table_1[0]['non_audit_fee']);


    //    12th graph
    $row= 110;
    for($i=0;$i<=5;$i++) {
        $years = "FY ".(intval(substr($executive_compensation[$i]['ex_rem_years'],2,2))-1)."/".substr($executive_compensation[$i]['ex_rem_years'],2,2);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row,$years);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,$executive_compensation[$i]['ed_remuneration']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,$executive_compensation[$i]['indexed_tsr']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row,$executive_compensation[$i]['net_profit']);
        $row++;
    }

    // 11th grapah
    $objPHPExcel->getActiveSheet()->SetCellValue('D123',$average_commission[5]['text']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D124',$average_commission[6]['text']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D125',$average_commission[7]['text']);


    //    12th graph
    $row= 134;
    for($i=0;$i<=4;$i++) {
        $years = "FY ".(intval(substr($director_commision[$i]['year'],2,2))-1)."/".substr($director_commision[$i]['year'],2,2);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,$years);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,$director_commision[$i]['value']);
        $row++;
    }


    //    13th graph
    $row= 153;
    for($i=0;$i<=4;$i++) {
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,$stock_performance[$i]['company']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,$stock_performance[$i]['sp_cnx_nifty']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row,$stock_performance[$i]['cnx_finance']);
        $row++;
    }

//    15th graph

    $month_1 = substr(ucfirst($borrowing_limits[0]['quater']),0,3);
    $month_2 = substr(ucfirst($borrowing_limits[1]['quater']),0,3);

    $objPHPExcel->getActiveSheet()->SetCellValue('B484',$month_1."'".substr($borrowing_limits[0]['year'],2,2));
    $objPHPExcel->getActiveSheet()->SetCellValue('C484',$borrowing_limits[0]['existing']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D484',$borrowing_limits[0]['unavailed']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E484',$borrowing_limits[0]['proposed']);

    $objPHPExcel->getActiveSheet()->SetCellValue('B485',$month_2."'".substr($borrowing_limits[1]['year'],2,2));
    $objPHPExcel->getActiveSheet()->SetCellValue('C485',$borrowing_limits[1]['existing']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D485',$borrowing_limits[1]['unavailed']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E485',$borrowing_limits[1]['proposed']);

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save("graph_excel.xlsx");
}
function htmlParser($text,$recommendation_text=0) {
    if($recommendation_text==1) {
        $text = str_replace("&#39;","'",$text);
        $text = str_replace('<p style="margin-left: 40px;">',"<p style='margin-left:30px; margin-bottom: 0; margin-top: 0; padding-top: 8px; padding-bottom: 8px; font-size: 10;line-height:135%; padding-left: 10px; border-left: 10px solid #464646;background-color:#D9D9D9; text-align: justify; '>",$text);
        $text = str_replace("<p>","<p style='padding-top: 8px; padding-bottom: 8px; margin: 0; font-size: 10;line-height:135%; padding-left: 10px; border-left: 10px solid #464646;background-color:#D9D9D9; text-align: justify; '>",$text);
        $text = str_replace("<ul>","<ul style='font-size: 10;'>",$text);
    }
    else {
        $text = str_replace("&#39;","'",$text);
        $text = str_replace('<p style="margin-left: 40px;">',"<p style='font-size: 10; margin-left: 30px; margin-top: 0; margin-bottom: 0; margin-right: 0; line-height:135%; padding-top: 8px; padding-bottom: 8px; text-align: justify; '>",$text);
        $text = str_replace("<p>","<p style='font-size: 10; line-height:135%; padding-top: 8px; padding-bottom: 8px; margin: 0; text-align: justify; '>",$text);
        $text = str_replace("<ul>","<ul style='font-size: 10;'>",$text);
    }
    return "<div style='font-size: 10;'>$text</div>";
}
function htmlParserForTable($text,$font_size=10) {
    $text = str_replace("&#39;","'",$text);
    $text = str_replace('<p style="margin-left: 40px;">',"<p style='font-size: $font_size; margin 0; line-height:135%; padding: 0; text-align: justify; '>",$text);
    $text = str_replace("<p>","<p style='font-size: $font_size; line-height:135%; padding:0px; margin: 0; text-align: justify; '>",$text);
    $text = str_replace("<ul>","<ul style='font-size: $font_size;'>",$text);
    return $text;
}
function getDocxFormatDate($date) {
    $db_date = $date;
    $formated_day = date_format(date_create_from_format('Y-m-d', $db_date), 'd');
    $formated_month = date_format(date_create_from_format('Y-m-d', $db_date), 'M');
    $formated_year = date_format(date_create_from_format('Y-m-d', $db_date), 'Y');
    $super = "";
    switch($formated_day) {
        case "01":
        case "21":
        case "31":
            $super = "st";
            break;
        case "02":
        case "22":
            $super = "nd";
            break;
        case "03":
        case "23":
            $super = "rd";
            break;
        case "04":
        case "05":
        case "06":
        case "07":
        case "08":
        case "09":
        case "10":
        case "11":
        case "12":
        case "13":
        case "14":
        case "15":
        case "16":
        case "17":
        case "18":
        case "19":
        case "20":
        case "24":
        case "25":
        case "26":
        case "27":
        case "28":
        case "29":
        case "30":
            $super = "th";
            break;
    }
    return "<span style='font-size: 10;'>".$formated_day."<sup>$super</sup>"." ".$formated_month.", ".$formated_year."</span>";
}
function getHeaderIndexFormatDate($date) {
    $db_date = $date;
    $formated_day = date_format(date_create_from_format('Y-m-d', $db_date), 'd');
    $formated_month = date_format(date_create_from_format('Y-m-d', $db_date), 'F');
    $formated_year = date_format(date_create_from_format('Y-m-d', $db_date), 'Y');
    $super = "";
    switch($formated_day) {
        case "01":
        case "21":
        case "31":
            $super = "st";
            break;
        case "02":
        case "22":
            $super = "nd";
            break;
        case "03":
        case "23":
            $super = "rd";
            break;
        case "04":
        case "05":
        case "06":
        case "07":
        case "08":
        case "09":
        case "10":
        case "11":
        case "12":
        case "13":
        case "14":
        case "15":
        case "16":
        case "17":
        case "18":
        case "19":
        case "20":
        case "24":
        case "25":
        case "26":
        case "27":
        case "28":
        case "29":
        case "30":
            $super = "th";
            break;
    }
    return "<span style='font-size: 10;'>".$formated_day."<sup>$super</sup>"." ".$formated_month.", ".$formated_year."</span>";
}
function addHeader($docx,$report_id) {
    $db = new ReportBurning();
    $company_report_details = $db->getCompanyAndMeetingDetails($report_id);
    $imageOptions = array(
        'src' => 'logo.png',
        'dpi' => 120
    );
    $headerImage = new WordFragment($docx, 'defaultHeader');
    $headerImage->addImage($imageOptions);
    $textOptions = array(
        'fontSize' => 20,
        'color' => '000000',
        'textAlign' => 'right',
        'font'=> 'Cambria',
    );
    $textOptions2 = array(
        'fontSize' => 10,
        'color' => '000000',
        'textAlign' => 'right'
    );
    $link = array(
        'fontSize' => 10,
        'url'=>$company_report_details['website'],
        'textAlign' => 'right',
        'spacingTop'=>140
    );
    $textOptions3 = array(
        'fontSize' => 10,
        'textAlign' => 'left'
    );

    $headerText = new WordFragment($docx, 'defaultHeader');
    $headerText->addText($company_report_details['name'], $textOptions);
    $headerText->addLink(substr($company_report_details['website'],7), $link);

    $headerDate = new WordFragment($docx, 'defaultHeader');
    $headerMetType = new WordFragment($docx, 'defaultHeader');

    $headerDate->embedHTML("<span style='display:block;font-size:10; text-align:right;'>Meeting Date: ".getHeaderIndexFormatDate($company_report_details['meeting_date'])."</span>");
    $headerMetType->addText('Meeting Type : '.$company_report_details['meeting_type'], $textOptions3);

    $valuesTable = array(
        array(
            array('value' =>$headerImage, 'vAlign' => 'center'),
            array('value' =>$headerText, 'vAlign' => 'center')
        ),
        array(
            array('value' =>$headerMetType, 'vAlign' => 'center', 'borderTop' => 'single','borderTopWidth'=>13,'borderTopColor' => '000000'),
            array('value' =>$headerDate, 'vAlign' => 'center','borderTop' => 'single', 'borderTopWidth'=>13,'borderTopColor' => '000000')
        ),
    );
    $widthTableCols = array(
        700,
        150000
    );
    $paramsTable = array(
        'border' => 'nil',
        'borderWidth' => 8,
        'borderColor' => 'cccccc',
        'columnWidths' => $widthTableCols,
    );
    $headerTable = new WordFragment($docx, 'defaultHeader');
    $headerTable->addTable($valuesTable, $paramsTable);
    $docx->addHeader(array('default' => $headerTable,'even' => $headerTable));
}
function addFooter($docx) {
    $imageOptions = array(
        'src' => 'footer_logo.png',
        'dpi' => 72,
        'height'=>40,
        'width'=>45
    );
    $footerImage = new WordFragment($docx, 'defaultFooter');
    $footerImage->addImage($imageOptions);
    $pageNumberOptions = array(
        'textAlign' => 'right',
        'fontSize' => 10,
    );
    $textOptions = array(
        'textAlign' => 'left',
        'fontSize' => 10,
    );
    $footerPageNumber = new WordFragment($docx);
    $footerPageNumber->addPageNumber('numerical', $pageNumberOptions);

    $footerText = new WordFragment($docx);
    $footerText->addText('© 2012 | Stakeholders Empowerment Services | All Rights Reserved', $textOptions);


    $valuesTable = array(
        array(
            array('value' =>$footerImage, 'vAlign' => 'center', 'borderTop' => 'single', 'borderTopColor' => '000000'),
            array('value' =>$footerText, 'vAlign' => 'center', 'borderTop' => 'single', 'borderTopColor' => '000000'),
            array('value' =>$footerPageNumber, 'vAlign' => 'center', 'borderTop' => 'single', 'borderTopColor' => '000000'),
            array('value' =>'| PAGE', 'vAlign' => 'center', 'borderTop' => 'single', 'borderTopColor' => '000000', 'cellMargin'=> 0),
        ),
    );
    $widthTableCols = array(
        700,
        11000,
        2500,
        2000,

    );
    $paramsTable = array(
        'borderTop' => 'nil',
        'borderWidth' => 4,
        'borderColor' => 'cccccc',
        'columnWidths' => $widthTableCols,
    );

    $footerTable = new WordFragment($docx, 'defaultfooter');
    $footerTable->addTable($valuesTable, $paramsTable);
    $docx->addFooter(array('default' => $footerTable,'even'=>$footerTable));
}
function resHeading($docx,$text,$level) {
    $docx->addText($text,array('headingLevel'=>$level,'color'=>'000000','borderTop' => 'single','borderTopWidth'=>2,'borderTopColor' => '000000','borderBottom' => 'single','borderBottomWidth'=>2,'borderBottomColor' => '000000','spacingTop'=>3,'spacingBottom'=>3,'borderBottomSpacing'=>3,'borderTopSpacing'=>3,'fontSize'=>10,'bold'=>true));
}
function resBlackStrip($docx,$text) {
//    $docx->addText($text,array('headingLevel'=>2,'backgroundColor'=>'464646','color'=>'FFFFFF','borderBottomSpacing'=>2,'borderTopSpacing'=>2,'fontSize'=>10,'bold'=>true));
    $docx->addText($text,array('headingLevel'=>2,'backgroundColor'=>'464646','color'=>'FFFFFF','borderTop' => 'single','borderTopWidth'=>2,'borderTopColor' => '464646','borderBottom' => 'single','borderBottomWidth'=>2,'borderBottomColor' => '464646','spacingTop'=>3,'spacingBottom'=>3,'borderBottomSpacing'=>3,'borderTopSpacing'=>3,'fontSize'=>10,'bold'=>true));
}
function addOrangeTextBox($docx,$text) {
    $orangebar = new WordFragment($docx);
    $orangebar->embedHtml($text);
    $textBoxOptions = array(
        'align' => 'right',
        'paddingLeft' => 2,
        'paddingTop' => 3,
        'border' => 0,
        'fillColor' => '#EB641B',
        'width' => 260,
        'contentVerticalAlign' => 'center',
        'height'=>40
    );
    $docx->addTextBox($orangebar, $textBoxOptions);
}
function createIndexPage($docx_index,$report_id) {
    $db = new ReportBurning();
    $company_and_meeting_details = $db->getIndexPageInfo($report_id);
    switch($company_and_meeting_details['meeting_type']) {
        case 'AGM':
            $company_and_meeting_details['meeting_type'] = "Annual General Meeting";
            break;
        case 'EGM':
            $company_and_meeting_details['meeting_type'] = "Extraordinary General Meeting";
            break;
        case 'PB':
            $company_and_meeting_details['meeting_type'] = "Postal Ballot";
            break;
        case 'CCM':
            $company_and_meeting_details['meeting_type'] = "Court Convened Meeting";
            break;
    }
    $variables = array(
        'company_name'=>$company_and_meeting_details['name'],
        'bse_code' => $company_and_meeting_details['bse_code'],
        'nse_code' => $company_and_meeting_details['nse_code'],
        'isin'=>$company_and_meeting_details['isin'],
        'sector'=>$company_and_meeting_details['sector'],
        'meeting_type'=>$company_and_meeting_details['meeting_type'],
        'meeting_venue'=>$company_and_meeting_details['meeting_venue'],
        'phone'=>$company_and_meeting_details['contact'],
        'fax'=>$company_and_meeting_details['fax'],
        'company_office'=>$company_and_meeting_details['address'],
        'meeting_time'=>$company_and_meeting_details['meeting_time']
    );
    $options = array('parseLineBreaks' =>true);
    $docx_index->replaceVariableByText($variables, $options);
    $docx_index->replaceVariableByHTML("e_voting_plateform","inline","<a style='font-size: 10;' href='$company_and_meeting_details[e_voting_platform_website]'>$company_and_meeting_details[e_voting_platform]</a>");
    $docx_index->replaceVariableByHTML("notice_link","inline","<a style='font-size: 10;' href='$company_and_meeting_details[notice_link]'>Click here</a>");
    $docx_index->replaceVariableByHTML("annual_report","inline","<a style='font-size: 10;' href='$company_and_meeting_details[annual_report]'>$company_and_meeting_details[annual_report_name]</a>");
    $docx_index->replaceVariableByHTML("company_email","inline","<a style='font-size: 10;' href='mailto:$company_and_meeting_details[email]'>$company_and_meeting_details[email]</a>");
    $date_in_format = getHeaderIndexFormatDate($company_and_meeting_details['e_voting_start_date']);
    $docx_index->replaceVariableByHTML("e_voting_start_date","inline",$date_in_format);
    $date_in_format = getHeaderIndexFormatDate($company_and_meeting_details['e_voting_end_date']);
    $docx_index->replaceVariableByHTML("e_voting_end_date","inline",$date_in_format);
    $date_in_format = getHeaderIndexFormatDate($company_and_meeting_details['meeting_date']);
    $docx_index->replaceVariableByHTML("meeting_date","inline",$date_in_format);
}
function appointmentOfAuditors($docx,$report_id) {

    $db = new ReportBurning();

//    Burning Appointment Of Auditors At Banks

    $generic_array = $db->appointmentOfAuditorsAppointmentOfAuditorsAtBanks($report_id);
    if($generic_array['appointment_auditors_banks_exists']) {
        $docx->addBreak(array('type' => 'page'));
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT OF AUDITORS AT BANKS",1);
        $docx->embedHTML(htmlParser($other_text[0]['text']));
        resHeading($docx,"SES RECOMMENDATION",1);
        $docx->embedHTML(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx,"SES ANALYSIS",1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"COMPANY'S JUSTIFICATION");
        $docx->embedHTML(htmlParser($other_text[1]['text']));
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $analysis_txt = "";
        for($i=0;$i<count($analysis_text);$i++) {
            if($analysis_text[$i]['analysis_text']!="" && $analysis_text[$i]['analysis_text'] != "&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'];
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }

    $generic_array = $db->appointmentOfAuditorsAppointmentOfAuditorsAtPSU($report_id);
    if($generic_array['appointment_auditors_psu_exists']) {
        echo "Coming in this as well";
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT OF AUDITORS AT PSU",1);
        $docx->embedHtml(htmlParser($other_text[0]['text']));
        resHeading($docx,"SES RECOMMENDATION",1);
        $docx->embedHtml(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx,"SES ANALYSIS",1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"COMPANY'S JUSTIFICATION");
        $docx->embedHtml(htmlParser($other_text[1]['text']));
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $analysis_txt = "";
        for($i=0;$i<count($analysis_text);$i++) {
            if($analysis_text[$i]['analysis_text']!="" && $analysis_text[$i]['analysis_text'] != "&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'];
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }

    $generic_array = $db->appointmentOfAuditorsAppointmentOfBranchAuditors($report_id);
    if($generic_array['appointment_branch_auditors_exists']) {
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx, "RESOLUTION []: APPOINTMENT OF BRANCH AUDITORS", 1);
        $docx->embedHtml(htmlParser($other_text[0]['text']));
        resHeading($docx, "SES RECOMMENDATION", 1);
        $docx->embedHtml(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx, "SES ANALYSIS", 1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx, "COMPANY'S JUSTIFICATION");
        $docx->embedHtml(htmlParser($other_text[1]['text']));
        $analysis_txt = "";
        for ($i = 0; $i < count($analysis_text); $i++) {
            if ($analysis_text[$i]['analysis_text'] != "" && $analysis_text[$i]['analysis_text'] != "&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'] ;
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }
// Burning Appointment of Branch Auditors ends

// Burning Appointment of Branch Auditors
    $generic_array = $db->appointmentOfAppointmentPaymentToCostAuditors($report_id);
    if($generic_array['payment_to_cost_auditors_exists']) {
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx, "RESOLUTION []: PAYMENT TO COST AUDITORS", 1);
        $docx->embedHtml(htmlParser($other_text[0]['text']));
        resHeading($docx, "SES RECOMMENDATION", 1);
        $docx->embedHtml(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx, "SES ANALYSIS", 1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx, "COMPANY'S JUSTIFICATION");
        $docx->embedHtml(htmlParser($other_text[1]['text']));
        $analysis_txt = "";
        for ($i = 0; $i < count($analysis_text); $i++) {
            if ($analysis_text[$i]['analysis_text'] != "" && $analysis_text[$i]['analysis_text'] != "&nbsp;") {
                $analysis_txt .=  $analysis_text[$i]['analysis_text'] ;
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }
// Burning Appointment of Branch Auditors ends

    $generic_array = $db->appointmentOfAppointmentRemovalOfAuditors($report_id);
    if($generic_array['removal_of_auditors_exists']) {

        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: REMOVAL OF AUDITORS",1);
        $docx->embedHtml(htmlParser($other_text[0]['text']));
        resHeading($docx,"SES RECOMMENDATION",1);
        $docx->embedHtml(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx,"SES ANALYSIS",1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"COMPANY'S JUSTIFICATION");
        $docx->embedHtml(htmlParser($other_text[1]['text']));
        $analysis_txt = "";
        for($i=0;$i<count($analysis_text);$i++) {
            if($analysis_text[$i]['analysis_text']!="" && $analysis_text[$i]['analysis_text'] != "&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'];
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }

    $generic_array = $db->appointmentOfAppointmentAppointmentOfAuditors($report_id);
    if($generic_array['appointment_of_auditors_exists']) {
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $triggers = $generic_array['triggers'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT OF AUDITORS",1);
        $docx->embedHtml(htmlParser($other_text[0]['text']));
        resHeading($docx,"SES RECOMMENDATION",1);
        $docx->embedHtml(htmlParser($recommendation_text['recommendation_text'],1));
        resHeading($docx,"SES ANALYSIS",1);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"DISCLOSURES");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $no_auditors = $triggers[1]['triggers'];
        $inner="";
        for($i=0;$i<$no_auditors;$i++) {

            $inner .= "<tr>
                        <td style='text-align: left; width:40%; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #d9d9d9;'>Name of the auditor up for appointment</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #d9d9d9;'>".$triggers[$i+2]['triggers']."</td>
                      </tr>";
            $inner .= "<tr>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>Auditors' eligibility for appointment</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".ucwords($triggers[$i*2+5]['triggers'])."</td>
                      </tr>";
            $inner .= "<tr>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #d9d9d9;'>Auditors' independence certificate</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #d9d9d9;'>".ucwords($triggers[$i*2+6]['triggers'])."</td>
                      </tr>";

        }
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px; '>
                    <tbody>$inner</tbody>
                </table>";
        $docx->embedHTML($html);
        $docx->embedHTML("<p style='font-size: 3;'>&nbsp;</p>");
        resBlackStrip($docx,"AUDITORS' INDEPENDENCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $inner = "<tr>
                        <td colspan='2' style='text-align: left; color: #FFFFFF; font-weight: bold; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #808080;'>Auditors</td>
                        <td colspan='2' style='text-align: left; color: #FFFFFF; font-weight: bold; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #808080;'>Audit Partners</td>
                    </tr>";
        for($i=0;$i<$no_auditors;$i++) {
            $inner .= "<tr>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".$other_text[$i+1]['text']."</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".$other_text[$i+7]['text']." years</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".$other_text[$i*2+15]['text']."</td>
                        <td style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".$other_text[$i*2+16]['text']." years</td>
                    </tr>";
        }
        $inner .= "<tr>
                        <td colspan='2' style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>Auditor's Network</td>
                        <td colspan='2' style='text-align: left; color: #000000; border-bottom: 1px solid #FFF;border-right: 1px solid #FFF; font-size: 10; background-color: #f2f2f2;'>".$other_text[$i+4]['text']."</td>
                      </tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px; '>
                        <tbody>$inner</tbody>
                    </table>";
        $docx->embedHTML($html);
        $docx->embedHtml(htmlParser($analysis_text[6]['analysis_text']));
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"AUDITORS' REMUNERATION");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        // Graph Start 
        $dividend_and_earning = new WordFragment($docx,"aslk");
        $dividend_and_earning->addExternalFile(array('src'=>'RemunerationComponents.docx'));
        $dividend_payout_ratio = new WordFragment($docx,"aslk");
        $dividend_payout_ratio->addExternalFile(array('src'=>'AuditorsRemuneration.docx'));
        $valuesTable = array(
            array(
                array('value' =>$dividend_and_earning, 'vAlign' => 'top','textAlign'=>'center'),
                array('value' =>$dividend_payout_ratio, 'vAlign' => 'top','textAlign'=>'center'),
            )
        );
        $widthTableCols = array(5000,9000);
        $paramsTable = array(
            'border' => 'nil',
            'borderWidth' => 8,
            'borderColor' => 'cccccc',
            'columnWidths' => $widthTableCols
        );
        $docx->addTable($valuesTable, $paramsTable);
        // Graph Ends 
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"TERM OF APPOINTMENT");
        $docx->embedHtml(htmlParser($other_text[10]['text']));

        $analysis_txt = "";
        for($i=0;$i<count($analysis_text);$i++) {
            if($analysis_text[$i]['analysis_text']!="" && $analysis_text[$i]['analysis_text']!="&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'];
            }
        }
        $docx->embedHtml(htmlParser($analysis_txt));
    }
}
?>
