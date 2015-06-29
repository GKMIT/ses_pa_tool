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
function appointmentOfDirectors($docx,$report_id) {
    $db = new ReportBurning();
    $generic_array = $db->appointmentOfDirectorsED($report_id);
    if($generic_array['appointment_of_executive_directors_exists']) {
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $no_of_executive = $generic_array['no_of_executive'];
        $past_remuneration = $generic_array['past_remuneration'];
        $peer_comparison = $generic_array['peer_comparison'];
        $rem_package = $generic_array['rem_package'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT/REAPPOINTMENT OF EXECUTIVE DIRECTORS",1);
        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[27*$i]['text']!="" && $other_text[27*$i]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));
        resHeading($docx,"SES RECOMMENDATION",2);
        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($recommendation_text[$i]['recommendation_text']!="" && $recommendation_text[$i]['recommendation_text']!="&nbsp;")
                $resolution_text .= $recommendation_text[$i]['recommendation_text'];
        }
        $docx->embedHTML(htmlParser($resolution_text,1));
        resHeading($docx,"SES ANALYSIS",2);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"DIRECTOR'S PROFILE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_profile = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>&nbsp;</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $director_name = $db->getDirectorName($other_text[29*$i+1]['text']);
            $directors_profile.="<td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; text-align: center; '>".$director_name."</td>";
        }
        $directors_profile.= "</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Current full time position</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+2]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Functional Area</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+3]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Education</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+4]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Part of promoter group?</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".ucfirst($other_text[29*$i+5]['text'])."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Past Experience</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+6]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Committee positions in the Company</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+7]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Retirement by rotation</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+8]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-weight: bold; font-size: 10; background-color: #FE642E; color: #FFFFFF; text-align: left; '>SES Recommendation</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; color: #FFFFFF; font-size: 10; background-color: #FE642E; font-weight: bold; text-align: center;'>".strtoupper($other_text[29*$i+9]['text'])."</td>";
        }
        $directors_profile.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left:8px;'>
                <tbody>
                    $directors_profile
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; font-style: italic; line-height:135%; padding-left: 0px;  text-align: justify; '>A - Audit Committee, SR - Stakeholders' Relationship Committee, NR - Nomination & Remuneration Committee, CSR - Corporate Social Responsibility Committee, M - Member, C - Chairman</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+10]['text']!="" && $other_text[29*$i+10]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+10]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"PAST REMUNERATION OF THE DIRECTOR");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $year_1 = intval(substr($past_remuneration[0]['year1'],2,2));
        $year_1 = "FY ".($year_1-1)."/".$year_1;
        $year_2 = intval(substr($past_remuneration[0]['year2'],2,2));
        $year_2 = "FY ".($year_2-1)."/".$year_2;
        $year_3 = intval(substr($past_remuneration[0]['year3'],2,2));
        $year_3 = "FY ".($year_3-1)."/".$year_3;
        $past_remuneration_table= "<tr>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; border-bottom: 1px solid #FFF;'>In <span style='font-family: Rupee Foradian;'>`</span>Crore</td>
                                    <td colspan='2' style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; border-bottom: 1px solid #FFF;'>".$year_1."</td>
                                    <td colspan='2' style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; border-bottom: 1px solid #FFF;'>".$year_2."</td>
                                    <td colspan='2' style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; border-bottom: 1px solid #FFF;'>".$year_3."</td>
                                </tr>";
        $past_remuneration_table.= "<tr>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Executive Director</td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Fixed Pay </td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Total Pay</td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Fixed Pay</td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Total Pay</td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Fixed Pay</td>
                                    <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Total Pay</td>
                                </tr>";
        for($i=0;$i<count($past_remuneration);$i++) {
            if($i%2==0) {
                $past_remuneration_table.="<tr>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right;'>".$past_remuneration[$i]['dir_name']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year1']."</td>
                                             <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['total_pay_year1']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year2']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['total_pay_year2']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year3']."</td>
                                             <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: right; '>".$past_remuneration[$i]['total_pay_year3']."</td>
                                           </tr>";
            }
            else {
                $past_remuneration_table.="<tr>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['dir_name']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year1']."</td>
                                             <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['total_pay_year1']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year2']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['total_pay_year2']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['fixed_pay_year3']."</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: right; '>".$past_remuneration[$i]['total_pay_year3']."</td>
                                           </tr>";
            }
        }
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $past_remuneration_table
                </tbody>
              </table>";
        $docx->embedHtml($html);

        $peer_comparison_table= "<tr><td colspan='3' style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Executive Remuneration - Peer Comparison</td></tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>Director</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[0]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[0]['col_2']."</td>

                                   </tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>Company</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[1]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[1]['col_2']."</td>

                                   </tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>Promoter</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[2]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[2]['col_2']."</td>

                                   </tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>Remuneration (<span style='font-family: Rupee Foradian;'>`</span> Cr) (A)</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[3]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[3]['col_2']."</td>

                                   </tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>Net Profits (<span style='font-family: Rupee Foradian;'>`</span> Cr) (B)</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[4]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$peer_comparison[4]['col_2']."</td>

                                   </tr>";
        $peer_comparison_table.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>Ratio (A/B)</td>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[5]['col_1']."</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$peer_comparison[5]['col_2']."</td>

                                   </tr>";
        $html = "<table style='border-collapse: collapse; width:100%;'>
                <tbody>
                    $peer_comparison_table
                </tbody>
              </table>";

        // Graph Start 
        $dividend_and_earning = new WordFragment($docx,"aslk");
        $dividend_and_earning->embedHTML($html);
        $dividend_payout_ratio = new WordFragment($docx,"aslk");
        $dividend_payout_ratio->addExternalFile(array('src'=>'ExecutiveRemuneration.docx'));
        $valuesTable = array(
            array(
                array('value' =>$dividend_and_earning, 'vAlign' => 'top','textAlign'=>'center'),
                array('value' =>$dividend_payout_ratio, 'vAlign' => 'top','textAlign'=>'center'),
            )
        );
        $widthTableCols = array(6000,5000);
        $paramsTable = array(
            'border' => 'nil',
            'borderWidth' => 8,
            'borderColor' => 'cccccc',
            'columnWidths' => $widthTableCols
        );
        $docx->addTable($valuesTable, $paramsTable);
        // Graph Ends 

        $p_text = "<p style='font-size: 1;'><br/></p>";
        $docx->embedHTML($p_text);
        resBlackStrip($docx,"DIRECTORS' TIME COMMITMENTS");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $time_commitment_table = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Criteria</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $director_name=$db->getDirectorName($other_text[29*$i+1]['text']);
            $time_commitment_table.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $time_commitment_table.= "</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Directorships </td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+11]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Total Committee memberships</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+12]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Committee Chairmanship </td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+13]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Full time role/ executive position</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+14]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $time_commitment_table
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; line-height:135%; padding-left: 0px;  text-align: justify; '>Note: Committee memberships include Committee chairmanships, Total Directorships include Directorships in Public as well Private Companies</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+15]['text']!="" && $other_text[29*$i+15]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+15]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"DIRECTORS’ PERFORMANCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_performance = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Attendance record</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $director_name = $db->getDirectorName($other_text[29*$i+1]['text']);
            $directors_performance.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $directors_performance.= "</tr>";
        $directors_performance.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Last 3 AGMs </td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+16]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Board meetings held last year</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+17]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Board meetings in last 3 years (avg.) </td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+18]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Audit Committee meetings</td>";
        for($i=0;$i<$no_of_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+19]['text']."</td>";
        }
        $directors_performance.="</tr>";
        if($generic_array['are_committees_seperate']=='yes') {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+21]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+22]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>CSR Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+23]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Stakeholders' Relationship Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+24]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }
        else {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination &amp; Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+20]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>CSR Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[29*$i+23]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Stakeholders' Relationship Committee meetings</td>";
            for($i=0;$i<$no_of_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[29*$i+24]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }

        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_performance
                </tbody>
              </table>";
        $docx->embedHtml($html);

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+25]['text']!="" && $other_text[29*$i+25]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+25]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));


        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        for($i=0;$i<$no_of_executive;$i++) {

            $remuneration_package= "<tr>
                                    <td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;'>Component</td>
                                    <td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;'>Proposed Remuneration</td>
                                    <td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;'>Comments</td>
                                </tr>";
            $remuneration_package.="<tr>
                                    <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Basic Pay</td>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Proposed Salary: <span style='font-family: Rupee Foradian;'>`</span>".$rem_package[$i*15]['field_value']."</td>
                                    <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Increase in remuneration: ".$rem_package[$i*15+1]['field_value']."</td>
                                   </tr>";
            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Annual increment: ".$rem_package[$i*15+2]['field_value']."</td>
                                </tr>";

            $remuneration_package.="<tr>
                                        <td rowspan='2' style='font-size: 10; background-color: #D9D9D9; text-align: left; '>Perquisites/ Allowances</td>
                                        <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>All perquisites clearly defined: ".$rem_package[$i*15+3]['field_value']."</td>
                                        <td rowspan='2' style='font-size: 10; background-color: #D9D9D9; text-align: left; '>Cap placed on perquisites: ".$rem_package[$i*15+4]['field_value']."</td>
                                   </tr>";
            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>Total allowances: <span style='font-family: Rupee Foradian;'>`</span>".$rem_package[$i*15+5]['field_value']."</td>
                                   </tr>";

            $remuneration_package.="<tr>
                                    <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Variable Pay</td>
                                    <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>".$rem_package[$i*15+6]['field_value']."</td>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Performance criteria disclosed: ".$rem_package[$i*15+7]['field_value']."</td>
                                   </tr>";
            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Cap placed on variable pay: ".$rem_package[$i*15+8]['field_value']."</td>
                                </tr>";

            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>Notice Period</td>
                                    <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>".$rem_package[$i*15+9]['field_value']." months</td>
                                    <td rowspan='2' style='font-size: 10; background-color: #D9D9D9; text-align: left; '>".$rem_package[$i*15+10]['field_value']."</td>
                                   </tr>";
            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>Severance Pay</td>
                                    <td style='font-size: 10; background-color: #D9D9D9; text-align: left; '>".$rem_package[$i*15+11]['field_value']." months</td>
                                   </tr>";
            $remuneration_package.="<tr>
                                    <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Minimum Remuneration</td>
                                   <td rowspan='2' style='font-size: 10; background-color: #F2F2F2; text-align: left; '>".$rem_package[$i*15+12]['field_value']."</td>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Within limits prescribed: ".$rem_package[$i*15+13]['field_value']."</td>

                                   </tr>";
            $remuneration_package.="<tr>
                                    <td style='font-size: 10; background-color: #F2F2F2; text-align: left; '>Includes variable pay: ".$rem_package[$i*15+14]['field_value']."</td>
                                </tr>";
            resBlackStrip($docx,"REMUNERATION PACKAGE OF ".strtoupper($db->getDirectorName($other_text[29*$i+1]['text'])));
            $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
            $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $remuneration_package
                </tbody>
              </table>";
            $docx->embedHtml($html."<p style='font-size: 4;'>&nbsp;</p>");
        }

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+26]['text']!="" && $other_text[29*$i+26]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+26]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+27]['text']!="" && $other_text[29*$i+27]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+27]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        $resolution_text = "";
        for($i=0;$i<$no_of_executive;$i++) {
            if($other_text[29*$i+28]['text']!="" && $other_text[29*$i+28]['text']!="&nbsp;")
                $resolution_text .= $other_text[29*$i+28]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));


        $analysis_txt = "";
        for($i=0;$i<count($analysis_text)-1;$i++) {
            if($analysis_text[$i]['analysis_text']!="" && $analysis_text[$i]['analysis_text']!="&nbsp;") {
                $analysis_txt .= $analysis_text[$i]['analysis_text'];
            }
        }
        if($analysis_txt=="") {
            $analysis_txt = $analysis_text[count($analysis_text)-1]['analysis_text'];
        }
        $docx->embedHTML(htmlParser($analysis_txt));
    }
    $generic_array = $db->appointmentOfDirectorsNED($report_id);
    if($generic_array['appointment_of_non_executive_directors_exists']) {
        $other_text = $generic_array['other_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $analysis_text = $generic_array['analysis_text'];
        $no_of_non_executive = $generic_array['no_of_non_executive'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT/REAPPOINTMENT OF NON-EXECUTIVE DIRECTORS",1);
        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($other_text[28*$i]['text']!="" && $other_text[28*$i]['text']!="&nbsp;")
                $resolution_text .= $other_text[28*$i]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));
        resHeading($docx,"SES RECOMMENDATION",2);
        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($recommendation_text[$i]['recommendation_text']!="" && $recommendation_text[$i]['recommendation_text']!="&nbsp;")
                $resolution_text .= $recommendation_text[$i]['recommendation_text'];
        }
        $docx->embedHTML(htmlParser($resolution_text,1));
        resHeading($docx,"SES ANALYSIS",2);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"DIRECTOR'S PROFILE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_profile = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>&nbsp;</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $director_name = $db->getDirectorName($other_text[28*$i+1]['text']);
            $directors_profile.="<td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; text-align: center; '>".$director_name."</td>";
        }
        $directors_profile.= "</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Current full time position</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+2]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Functional Area</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+3]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Education</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+4]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Impact on diversity</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+5]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Past Experience</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+6]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Committee positions in the Company</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+7]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Retirement by rotation</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+8]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Part of promoter group?</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".ucfirst($other_text[28*$i+9]['text'])."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-weight: bold; font-size: 10; background-color: #FE642E; color: #FFFFFF; text-align: left; '>SES Recommendation</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; color: #FFFFFF; font-size: 10; background-color: #FE642E; text-align: center;'>".$other_text[28*$i+10]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left:8px;'>
                <tbody>
                    $directors_profile
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; font-style: italic; line-height:135%; padding-left: 0px;  text-align: justify; '>A - Audit Committee, SR - Stakeholders' Relationship Committee, NR - Nomination & Remuneration Committee, CSR - Corporate Social Responsibility Committee, M - Member, C - Chairman</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($other_text[28*$i+11]['text']!="" && $other_text[28*$i+11]['text']!="&nbsp;")
                $resolution_text .= $other_text[28*$i+11]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"DIRECTORS' TIME COMMITMENTS");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $time_commitment_table = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Criteria</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $director_name = $db->getDirectorName($other_text[28*$i+1]['text']);
            $time_commitment_table.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $time_commitment_table.= "</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Directorships </td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+12]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Total Committee memberships</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+13]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Committee Chairmanship </td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+14]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Full time role/ executive position</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+15]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left:8px;'>
                <tbody>
                    $time_commitment_table
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; line-height:135%; padding-left: 0px;  text-align: justify; '>Note: committee memberships include committee chairmanships</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($other_text[28*$i+16]['text']!="" && $other_text[28*$i+16]['text']!="&nbsp;")
                $resolution_text .= $other_text[28*$i+16]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"DIRECTORS’ PERFORMANCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_performance = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Attendance record</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $director_name = $db->getDirectorName($other_text[28*$i+1]['text']);
            $directors_performance.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $directors_performance.= "</tr>";
        $directors_performance.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Last 3 AGMs </td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+17]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Board meetings held last year</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+18]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Board meetings in last 3 years (avg.) </td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+19]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Audit Committee meetings</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+20]['text']."</td>";
        }
        $directors_performance.="</tr>";
        if($generic_array['are_committees_seperate']=='yes') {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination Committee meetings</td>";
            for($i=0;$i<$no_of_non_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+22]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_non_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+23]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }
        else {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination &amp; Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_non_executive;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+21]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>CSR Committee meetings</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[28*$i+24]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Stakeholders' Relationship Committee meetings</td>";
        for($i=0;$i<$no_of_non_executive;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[28*$i+25]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_performance
                </tbody>
              </table>";
        $docx->embedHtml($html);

        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($other_text[28*$i+26]['text']!="" && $other_text[28*$i+26]['text']!="&nbsp;")
                $resolution_text .= $other_text[28*$i+26]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));
        resBlackStrip($docx,"DIRECTOR'S REMUNERATION");
        $resolution_text = "";
        for($i=0;$i<$no_of_non_executive;$i++) {
            if($other_text[28*$i+27]['text']!="" && $other_text[28*$i+27]['text']!="&nbsp;")
                $resolution_text .= $other_text[28*$i+27]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        $total_analysis_rows = count($analysis_text);
        for($i=0;$i<$no_of_non_executive;$i++) {
            $resolution_text = "";
            for($j=0;$j<$total_analysis_rows-1;$j++) {
                if($analysis_text[51*$i+$j]['analysis_text']!="" && $analysis_text[51*$i+$j]['analysis_text']!="&nbsp;")
                    $resolution_text .= $analysis_text[51*$i+$j]['analysis_text'];
            }
            if($resolution_text=="") {
                $resolution_text .= $analysis_text[51*$i+$total_analysis_rows-1]['analysis_text'];
            }
            $docx->embedHTML(htmlParser($resolution_text));
        }
    }
    $generic_array = $db->appointmentOfDirectorsID($report_id);
    if($generic_array['appointment_of_independent_directors_exists']) {

        $other_text = $generic_array['other_text'];
        $analysis_text = $generic_array['analysis_text'];
        $recommendation_text = $generic_array['recommendation_text'];
        $no_of_independent = $generic_array['no_of_independent'];
        $docx->addBreak(array('type' => 'page'));
        $p_text = "<p style='font-size: 1;'>&nbsp;</p>";
        $docx->embedHTML($p_text);
        resHeading($docx,"RESOLUTION []: APPOINTMENT/REAPPOINTMENT OF INDEPENDENT DIRECTORS",1);
        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($other_text[65*$i]['text']!="" && $other_text[65*$i]['text']!="&nbsp;")
                $resolution_text .= $other_text[65*$i]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));
        resHeading($docx,"SES RECOMMENDATION",1);
        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($recommendation_text[$i]['recommendation_text']!="" && $recommendation_text[$i]['recommendation_text']!="&nbsp;")
                $resolution_text .= $recommendation_text[$i]['recommendation_text'];
        }
        $docx->embedHTML(htmlParser($resolution_text,1));
        resHeading($docx,"SES ANALYSIS",2);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        resBlackStrip($docx,"COMPLIANCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $Compliance_table = "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>Is Company complying with the retirement policy?</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".ucfirst($other_text[2]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".$other_text[3]['text']."</td>
                            </tr>";
        $Compliance_table .= "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>Has the Company disclosed the Independence Certificate provided by the Independent Directors</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".ucfirst($other_text[4]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".$other_text[5]['text']."</td>
                            </tr>";
        $Compliance_table .= "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>Has the Company disclosed the terms of appointment of Independent Directors</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".ucfirst($other_text[6]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".$other_text[7]['text']."</td>
                            </tr>";
        $Compliance_table .= "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>Has the Company disclosed Board evaluation and Directors' Evaluation Policy</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".ucfirst($other_text[8]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".$other_text[9]['text']."</td>
                            </tr>";
        $Compliance_table .= "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>Did Independent Directors meet atleast once without the Management</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".ucfirst($other_text[10]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #F2F2F2;'>".$other_text[11]['text']."</td>
                            </tr>";
        $Compliance_table .= "<tr>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>Does the Company has a Lead independent Director?</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".ucfirst($other_text[12]['text'])."</td>
                                <td style='text-align: left; font-size: 10; background-color: #D9D9D9;'>".$other_text[13]['text']."</td>
                            </tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $Compliance_table
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $docx->embedHTML("<p style='font-size: 1;padding-top:8px'>&nbsp;</p>");

        resBlackStrip($docx,"DIRECTOR'S PROFILE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_profile = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>&nbsp;</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $director_name = $db->getDirectorName($other_text[65*$i+1]['text']);
            $directors_profile.="<td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF; text-align: center; '>".$director_name."</td>";
        }
        $directors_profile.= "</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Current full time position</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+14]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Functional Area</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+15]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Education</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+16]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Impact on diversity</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+17]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Past Experience</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+18]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Committee positions in the Company</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+19]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $directors_profile.="<tr><td style='border-right: 1px solid #FFFFFF; font-weight: bold; font-size: 10; background-color: #FE642E; color: #FFFFFF; text-align: left; '>SES Recommendation</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_profile.="<td style='border-right: 1px solid #FFFFFF; color: #FFFFFF; font-size: 10; background-color: #FE642E; text-align: center;'>".$other_text[65*$i+20]['text']."</td>";
        }
        $directors_profile.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_profile
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; font-style: italic; line-height:135%; padding-left: 0px;  text-align: justify; '>A - Audit Committee, SR - Stakeholders' Relationship Committee, NR - Nomination & Remuneration Committee, CSR - Corporate Social Responsibility Committee, M - Member, C - Chairman</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($other_text[65*$i+21]['text']!="" && $other_text[65*$i+21]['text']!="&nbsp;")
                $resolution_text .= $other_text[65*$i+21]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));
        $docx->embedHTML("<p style='font-size: 1;padding-top:8px'>&nbsp;</p>");
        resBlackStrip($docx,"DIRECTORS' INDEPENDENCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_independence = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Criteria</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $director_name = $db->getDirectorName($other_text[65*$i+1]['text']);
            $directors_independence.="<td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $directors_independence.= "</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Current tenure/association</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>".$other_text[65*$i+22]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Directorships at group companies</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>".$other_text[65*$i+23]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Relationships with the Company</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>".$other_text[65*$i+24]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Nominee director</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>".$other_text[65*$i+25]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Shareholding / ESOPs</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>".$other_text[65*$i+26]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Remuneration ( <span style='font-family: Rupee Foradian;'>`</span> Lakhs)</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>".$other_text[65*$i+27]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $directors_independence.="<tr><td style='border-right: 1px solid #FFFFFF; font-weight: bold; color: #FFFFFF; font-size: 10; background-color: #FE642E; text-align: left; '>SES Classification</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_independence.="<td style='border-right: 1px solid #FFFFFF; color: #FFFFFF; font-size: 10; background-color: #FE642E; text-align: left; '>".$other_text[65*$i+28]['text']."</td>";
        }
        $directors_independence.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_independence
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($other_text[65*$i+29]['text']!="" && $other_text[65*$i+29]['text']!="&nbsp;")
                $resolution_text .= $other_text[65*$i+29]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"DIRECTORS' TIME COMMITMENTS");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $time_commitment_table = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Criteria</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $director_name = $db->getDirectorName($other_text[65*$i+1]['text']);
            $time_commitment_table.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $time_commitment_table.= "</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Directorships </td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+30]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Total Committee memberships</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+31]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Committee Chairmanship </td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+32]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $time_commitment_table.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Full time role/ executive position</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $time_commitment_table.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+33]['text']."</td>";
        }
        $time_commitment_table.="</tr>";
        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $time_commitment_table
                </tbody>
              </table>";
        $docx->embedHtml($html);
        $resolution_text = "<p style='margin:0; padding-top: 5px; padding-bottom: 8px; font-size: 9; line-height:135%; padding-left: 0px;  text-align: justify; '>Note: committee memberships include committee chairmanships</p>";
        $docx->embedHTML($resolution_text);

        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($other_text[65*$i+34]['text']!="" && $other_text[65*$i+34]['text']!="&nbsp;")
                $resolution_text .= $other_text[65*$i+34]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resBlackStrip($docx,"DIRECTORS’ PERFORMANCE");
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        $directors_performance = "<tr><td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Attendance record</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $director_name = $db->getDirectorName($other_text[65*$i+1]['text']);
            $directors_performance.="<td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>".$director_name."</td>";
        }
        $directors_performance.= "</tr>";
        $directors_performance.="<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Last 3 AGMs </td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+35]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Board meetings held last year</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+36]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Board meetings in last 3 years (avg.) </td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+37]['text']."</td>";
        }
        $directors_performance.="</tr>";
        $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Audit Committee meetings</td>";
        for($i=0;$i<$no_of_independent;$i++) {
            $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+38]['text']."</td>";
        }
        $directors_performance.="</tr>";
        if($generic_array['are_committees_seperate']=='yes') {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+40]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+41]['text']."</td>";
            }
            $directors_performance.="</tr>";

            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>CSR Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+42]['text']."</td>";
            }
            $directors_performance.="</tr>";

            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Stakeholders' Relationship Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+43]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }
        else {
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Nomination &amp; Remuneration Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+39]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>CSR Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>".$other_text[65*$i+42]['text']."</td>";
            }
            $directors_performance.="</tr>";
            $directors_performance.="<tr><td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Stakeholders' Relationship Committee meetings</td>";
            for($i=0;$i<$no_of_independent;$i++) {
                $directors_performance.="<td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>".$other_text[65*$i+43]['text']."</td>";
            }
            $directors_performance.="</tr>";
        }

        $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_performance
                </tbody>
              </table>";
        $docx->embedHtml($html);

        $resolution_text = "";
        for($i=0;$i<$no_of_independent;$i++) {
            if($other_text[65*$i+44]['text']!="" && $other_text[65*$i+44]['text']!="&nbsp;")
                $resolution_text .= $other_text[65*$i+44]['text'];
        }
        $docx->embedHTML(htmlParser($resolution_text));

        resHeading($docx,"DIRECTOR PERFORMANCE INDEX ADD DRAWS SKEWED REMUNERATION DISCUSS",2);
        $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        for($i=0;$i<$no_of_independent;$i++) {
            $total_score = 0;
            $directors_performance_index = "<tr>
                                            <td style='text-align: left; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Criteria</td>
                                            <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Response</td>
                                            <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Score</td>
                                            <td style='text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10; background-color: #808080;border-right: 1px solid #FFF;'>Maximum</td>
                                        </tr>";
            $directors_performance_index .= "<tr>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Board Meetings Attendance held in the last year</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 45]['text'] . "</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 46]['text'] . "</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>5</td>
                                        </tr>";
            $total_score+=$other_text[65 * $i + 46]['text'];
            $directors_performance_index .= "<tr>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Board Meetings Attendance held in the last 3 years</td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 47]['text'] . " </td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 48]['text'] . " </td>
                                            <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>15</td>
                                        </tr>";
            $total_score+=$other_text[65 * $i + 48]['text'];
            $directors_performance_index .= "<tr>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Audit Committee Meetings Attendance</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 49]['text'] . " </td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 50]['text'] . "</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>10 </td>
                                            </tr>";
            $total_score+=$other_text[65 * $i + 50]['text'];
            $directors_performance_index .= "<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Nomination & Remuneration Committee Meetings Attendance</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 51]['text'] . " </td>
                                      <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 52]['text'] . " </td>
                                       <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>10</td>
                                    </tr>";
            $total_score+=$other_text[65 * $i + 52]['text'];
            $directors_performance_index .= "<tr>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Directorships</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 57]['text'] . " </td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 58]['text'] . "</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>15 </td>
                                            </tr>";
            $total_score+=$other_text[65 * $i + 58]['text'];
            $directors_performance_index .= "<tr>
                                    <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Total Committee memberships</td>
                                     <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 59]['text'] . " </td>
                                      <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 60]['text'] . " </td>
                                       <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>15</td>
                                    </tr>";
            $total_score+=$other_text[65 * $i + 60]['text'];
            $directors_performance_index .= "<tr>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: left; '>Total Committee Chairmanships</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 61]['text'] . " </td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>" . $other_text[65 * $i + 62]['text'] . "</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #F2F2F2; text-align: center; '>15 </td>
                                             </tr>";
            $total_score+=$other_text[65 * $i + 62]['text'];
            $directors_performance_index .= "<tr>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: left; '>Full Time Role/Executive Position</td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 63]['text'] . " </td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>" . $other_text[65 * $i + 64]['text'] . " </td>
                                                <td style='border-right: 1px solid #FFFFFF; font-size: 10; background-color: #D9D9D9; text-align: center; '>15</td>
                                            </tr>";
            $total_score+=$other_text[65 * $i + 64]['text'];
            $directors_performance_index .= "<tr>
                                                <td colspan='2' style='padding-top: 2px; padding-bottom: 2px; border-right: 1px solid #FFFFFF; border-top: 2px solid #000000; font-size: 10; background-color: #FFFFFF; text-align: left; border-bottom: 2px solid #000000;'>Total</td>
                                                <td style='padding-top: 2px; padding-bottom: 2px; border-right: 1px solid #FFFFFF; border-top: 2px solid #000000; font-size: 10; background-color: #FFFFFF; text-align: center;border-bottom: 2px solid #000000; '>$total_score</td>
                                                <td style='padding-top: 2px; padding-bottom: 2px; border-right: 1px solid #FFFFFF; border-top: 2px solid #000000; font-size: 10; background-color: #FFFFFF; text-align: center;border-bottom: 2px solid #000000; '>100</td>
                                            </tr>";

            $html = "<table style='border-collapse: collapse; width:98%; margin-left: 8px;'>
                <tbody>
                    $directors_performance_index
                </tbody>
              </table>";
            $docx->embedHtml($html);
            $docx->embedHTML("<p style='font-size: 1;'>&nbsp;</p>");
        }

        $total_analysis_rows = count($analysis_text);
        for($i=0;$i<$no_of_non_executive;$i++) {
            $resolution_text = "";
            for($j=0;$j<$total_analysis_rows-1;$j++) {
                if($analysis_text[51*$i+$j]['analysis_text']!="" && $analysis_text[51*$i+$j]['analysis_text']!="&nbsp;")
                    $resolution_text .= $analysis_text[51*$i+$j]['analysis_text'];
            }
            if($resolution_text=="") {
                $resolution_text .= $analysis_text[51*$i+$total_analysis_rows-1]['analysis_text'];
            }
            $docx->embedHTML(htmlParser($resolution_text));
        }
    }
}
?>
