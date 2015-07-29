<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include_once("../Classes/database.php");
include_once("../Classes/db-config.php");
require_once '../phpdocx/excellib/Classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("Input Sheet-PA tool.xlsx");

$db = new Database();

$company_id = $_GET['company_id'];
$financial_year = $_GET['financial_year'];

$generic=$db->getCompanyDirectors($company_id,$financial_year,"View Sheet");
$directors= $generic['directors'];
$directors = $db->filteredDirectorsForSheet($directors);
$rem_nom_same = $generic['rem_nom_assigned'];
$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
$stmt=$dbobject->prepare("select * from `companies` where `id`=:company_id");
$stmt->bindParam(':company_id',$company_id);
$stmt->execute();
$bse_code = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $bse_code[]=$row;
}
$company_name=$bse_code[0]['name'];
$fi_month = "";
switch ($bse_code[0]['fiscal_year_end']) {
    case 3:
        $fi_month = "MAR";
        break;
    case 6:
        $fi_month = "JUN";
        break;
    case 9:
        $fi_month = "SEP";
        break;
    case 12:
        $fi_month = "DEC";
        break;
}
$objPHPExcel->getActiveSheet()->SetCellValue('A1',$bse_code[0]['bse_code']);
$objPHPExcel->getActiveSheet()->SetCellValue('D1',$fi_month);
$objPHPExcel->getActiveSheet()->SetCellValue('A2', "DIN");
$objPHPExcel->getActiveSheet()->SetCellValue('B2', "Name");
$objPHPExcel->getActiveSheet()->SetCellValue('G2', "Company Classification");
$objPHPExcel->getActiveSheet()->SetCellValue('H2', "SES Classification");
$objPHPExcel->getActiveSheet()->SetCellValue('I2', "Additional Classification");
$objPHPExcel->getActiveSheet()->SetCellValue('J2', "Audit Committee");
$objPHPExcel->getActiveSheet()->SetCellValue('K2', "Stakeholders Relationship");
$objPHPExcel->getActiveSheet()->SetCellValue('L2', "Nomination and Remuneration");
$objPHPExcel->getActiveSheet()->SetCellValue('M2', "CSR");
$objPHPExcel->getActiveSheet()->SetCellValue('N2', "Risk Management");
$objPHPExcel->getActiveSheet()->SetCellValue('O2', "Shares Held");
$objPHPExcel->getActiveSheet()->SetCellValue('P2', "ESOPs");
$objPHPExcel->getActiveSheet()->SetCellValue('Q2', "Other Pecuniary Relationship");
$objPHPExcel->getActiveSheet()->SetCellValue('R2', "No. of Public Directorship");
$objPHPExcel->getActiveSheet()->SetCellValue('S2', "No. of Total Directorship");
$objPHPExcel->getActiveSheet()->SetCellValue('T2', "No. of Directorship in listed Companies");
$objPHPExcel->getActiveSheet()->SetCellValue('U2', "Committee Memberships");
$objPHPExcel->getActiveSheet()->SetCellValue('V2', "Committee Chairmanships");
$objPHPExcel->getActiveSheet()->SetCellValue('W2', "Expertise");
$objPHPExcel->getActiveSheet()->SetCellValue('X2', "Education");
$objPHPExcel->getActiveSheet()->SetCellValue('Y2', "Ratio to MRE");
$objPHPExcel->getActiveSheet()->SetCellValue('Z2', "Retiring/Non Retiring");
$objPHPExcel->getActiveSheet()->SetCellValue('AA2',"Last Updated");

$row_counter = 3;
for ($i=0; $i < count($directors) ; $i++) { 
    $user_info= $db->getUserInfo($directors[$i]['updated_by']);
    if($user_info['count']==0) {
        $last_updated = "By Unknown User on ".date_format(date_create_from_format('Y-m-d', $directors[$i]['last_updated_on']), 'd-m-Y');
    }
    else {
        $last_updated = "By $user_info[name] on ".date_format(date_create_from_format('Y-m-d', $directors[$i]['last_updated_on']), 'd-m-Y');
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row_counter, $directors[$i]['din_no']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row_counter, $directors[$i]['dir_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row_counter, date_format(date_create_from_format('Y-m-d', $directors[$i]['appointment_date']), 'd-m-Y'));
    if($directors[$i]['resignation_date']=='0000-00-00') {
        $directors[$i]['resignation_date']='';
    }
    echo $directors[$i]['resignation_date'];
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row_counter, $directors[$i]['resignation_date']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row_counter, $directors[$i]['current_tenure']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row_counter, $directors[$i]['total_association']);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row_counter, $directors[$i]['company_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row_counter, $directors[$i]['ses_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row_counter, $directors[$i]['additional_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$row_counter, $directors[$i]['audit_committee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$row_counter, $directors[$i]['investor_grievance']);
    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$row_counter, $directors[$i]['nomination_remuneration']);
    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$row_counter, $directors[$i]['csr']);
    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$row_counter, $directors[$i]['risk_management_committee']);
    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$row_counter, $directors[$i]['shares_held']);
    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$row_counter, $directors[$i]['esops']);
    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$row_counter, $directors[$i]['other_pecuniary_relationship']);
    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$row_counter, $directors[$i]['no_directorship_public']);
    $objPHPExcel->getActiveSheet()->SetCellValue('S'.$row_counter, $directors[$i]['no_total_directorship']);
    $objPHPExcel->getActiveSheet()->SetCellValue('T'.$row_counter, $directors[$i]['no_directorship_listed_companies']);
    $objPHPExcel->getActiveSheet()->SetCellValue('U'.$row_counter, $directors[$i]['committee_memberships']);
    $objPHPExcel->getActiveSheet()->SetCellValue('V'.$row_counter, $directors[$i]['committee_chairmanships']);
    $objPHPExcel->getActiveSheet()->SetCellValue('W'.$row_counter, $directors[$i]['expertise']);
    $objPHPExcel->getActiveSheet()->SetCellValue('X'.$row_counter, $directors[$i]['education']);
    $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$row_counter, $directors[$i]['ratio_to_mre']);
    $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$row_counter, $directors[$i]['retiring_non_retiring']);
    $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$row_counter,$last_updated);
    $row_counter++;   
}

//Second Table Remuneration Details
$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);


// $stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year order by `director_info`.`total_association` DESC");
// $stmt->bindParam(':company_id',$company_id);
// $stmt->bindParam(':financial_year',$financial_year);
// $stmt->execute();
// $company_directors = array();
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     $company_directors[]=$row;
// }
// $company_directors = $db->filteredDirectorsForSheet($company_directors);

$company_directors = $directors;

$array_director_remuneration = array('Director Remuneration','Director Name');

$stmt=$dbobject->prepare("select DISTINCT `rem_year` from `director_remuneration` where `rem_year`<=:financial_year ORDER BY `rem_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years[]=$row;
    $array_director_remuneration[]="Variable Pay $row[rem_year]";
    $array_director_remuneration[]="Fixed Pay $row[rem_year]";
}
$array_col_names = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I',10=>'J',11=>'K',12=>'L',13=>'M',14=>'N',15=>'O',16=>'P',17=>'Q',18=>'R',19=>'S',20=>'T',21=>'U',22=>'V',23=>'W',24=>'X',25=>'Y',26=>'Z');

$counter = 0;

for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_director_remuneration)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."23", $array_director_remuneration[$counter]);
    $counter++;
}

$remuneration_details_counter = 24;
$column_counter = 2;
$i= 0;
foreach($company_directors as $director) {
    //echo $director['dir_name'];
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter,$director['dir_name']);
    foreach($years as $year) {
        $column_counter += 1;
        $stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:rem_year and `company_id`=:company_id");
        $stmt->bindParam(':dir_din_no',$director['din_no']);
        $stmt->bindParam(':rem_year',$year['rem_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo $row['variable_pay'];
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter, $row['variable_pay']);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$remuneration_details_counter, $row['fixed_pay']);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter,"-");
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$remuneration_details_counter, "-");
        }
    }
    $remuneration_details_counter++;
    $column_counter = 2;
    $i++;
}

//Third Table AGM Attendance
$array_agm_attendance = array('AGM Attendance','Director Name');

$stmt=$dbobject->prepare("select DISTINCT `att_year` from `director_agm_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_agm_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_agm_attendance[]=$row;
    $array_agm_attendance[]="$row[att_year] Attended";
    }

$counter = 0;
$objPHPExcel->getActiveSheet()->SetCellValue("A44", "AGM Attendance");
for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_agm_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."44", $array_agm_attendance[$counter]);
    $counter++;
}

$agm_attendance_counter = 45;
$column_counter = 2;
foreach($company_directors as $director) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$agm_attendance_counter,$director['dir_name']);
    foreach($years_agm_attendance as $year_agm_attendance) {
        $column_counter++;
        $stmt=$dbobject->prepare("select * from `director_agm_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
        $stmt->bindParam(':dir_din_no',$director['din_no']);
        $stmt->bindParam(':att_year',$year_agm_attendance['att_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$agm_attendance_counter, $row['attended']);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$agm_attendance_counter,"-");
        }
    }
    $agm_attendance_counter++;
    $column_counter = 2;
}


//Forth table Director Board Attendance
$array_director_board_attendance = array('Director Board Attendance','Director Name');

$stmt=$dbobject->prepare("select DISTINCT `att_year` from `director_board_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_director_board_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_director_board_attendance[]=$row;
    $array_director_board_attendance[]="$row[att_year] Attended";
    $array_director_board_attendance[]="$row[att_year] Held";
}

$counter = 0;

for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_director_board_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."65", $array_director_board_attendance[$counter]);
    $counter++;
}

$director_board_attendance_counter = 66;
$column_counter = 2;
foreach($company_directors as $director) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter,$director['dir_name']);
    foreach($years_director_board_attendance as $year_director_board_attendance) {
        $column_counter++;
        $stmt=$dbobject->prepare("select * from `director_board_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
        $stmt->bindParam(':dir_din_no',$director['din_no']);
        $stmt->bindParam(':att_year',$year_director_board_attendance['att_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter, $row['attended']);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$director_board_attendance_counter, $row['held']);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter,"-");
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$director_board_attendance_counter, "-");
        }
    }
    $director_board_attendance_counter++;
    $column_counter = 2;
}

// audit committee attendance

$array_audit_committee_attendance = array('Audit Committee Attendance','Director Name');
$stmt=$dbobject->prepare("select DISTINCT `att_year` from `audit_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_audit_committee_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_audit_committee_attendance[]=$row;
    $array_audit_committee_attendance[]="$row[att_year] Attended";
    $array_audit_committee_attendance[]="$row[att_year] Held";
}
$counter = 0;
for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_audit_committee_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."86", $array_audit_committee_attendance[$counter]);
    $counter++;
}
$audit_committee_attendance_counter = 87;
$column_counter = 2;
foreach($company_directors as $director) {
    if($director['audit_committee']=='C' or $director['audit_committee']=='M') {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter,$director['dir_name']);
        foreach($years_audit_committee_attendance as $year_audit_committee_attendance) {
            $column_counter++;
            $stmt=$dbobject->prepare("select * from `audit_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
            $stmt->bindParam(':dir_din_no',$director['din_no']);
            $stmt->bindParam(':att_year',$year_audit_committee_attendance['att_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter, $row['attended']);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$audit_committee_attendance_counter, $row['held']);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter,"-");
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$audit_committee_attendance_counter, "-");
            }
        }
        $audit_committee_attendance_counter++;
        $column_counter = 2;
    }
}

// Stakeholders Relationship Committee Attendance

$array_investors_grievance_attendance = array('Stakeholders Relationship Committee Attendance','Director Name');
$stmt=$dbobject->prepare("select DISTINCT `att_year` from `investors_grievance_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_investors_grievance_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_investors_grievance_attendance[]=$row;
    $array_investors_grievance_attendance[]="$row[att_year] Attended";
    $array_investors_grievance_attendance[]="$row[att_year] Held";
}
$counter = 0;
for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_investors_grievance_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."107", $array_investors_grievance_attendance[$counter]);
    $counter++;
}
$investors_grievance_attendance_counter = 108;
$column_counter = 2;
foreach($company_directors as $director) {
    if($director['investor_grievance']=='C' or $director['investor_grievance']=='M') {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$investors_grievance_attendance_counter,$director['dir_name']);
        foreach($years_investors_grievance_attendance as $year_investors_grievance_attendance) {
            $column_counter++;
            $stmt=$dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
            $stmt->bindParam(':dir_din_no',$director['din_no']);
            $stmt->bindParam(':att_year',$year_investors_grievance_attendance['att_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$investors_grievance_attendance_counter, $row['attended']);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$investors_grievance_attendance_counter, $row['held']);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$investors_grievance_attendance_counter,"-");
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$investors_grievance_attendance_counter, "-");
            }
        }
        $investors_grievance_attendance_counter++;
        $column_counter = 2;
    }    
}

// CSR Committee Attendance

$array_csr_committee_attendance = array('CSR Committee Attendance','Director Name');
$stmt=$dbobject->prepare("select DISTINCT `att_year` from `csr_committee_meetings_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_csr_committee_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_csr_committee_attendance[]=$row;
    $array_csr_committee_attendance[]="$row[att_year] Attended";
    $array_csr_committee_attendance[]="$row[att_year] Held";
}
$counter = 0;
for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_csr_committee_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."128", $array_csr_committee_attendance[$counter]);
    $counter++;
}
$csr_committee_attendance_counter = 129;
$column_counter = 2;
foreach($company_directors as $director) {
    if($director['csr']=='C' or $director['csr']=='M') {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$csr_committee_attendance_counter,$director['dir_name']);
        foreach($years_csr_committee_attendance as $year_csr_committee_attendance) {
            $column_counter++;
            $stmt=$dbobject->prepare("select * from `csr_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
            $stmt->bindParam(':dir_din_no',$director['din_no']);
            $stmt->bindParam(':att_year',$year_csr_committee_attendance['att_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$csr_committee_attendance_counter, $row['attended']);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$csr_committee_attendance_counter, $row['held']);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$csr_committee_attendance_counter,"-");
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$csr_committee_attendance_counter, "-");
            }
        }
        $csr_committee_attendance_counter++;
        $column_counter = 2;
    }    
}

// Risk Management Committee Attendance

$array_risk_management_committee_attendance = array('Risk Management Committee Attendance','Director Name');
$stmt=$dbobject->prepare("select DISTINCT `att_year` from `risk_management_committee_meetings_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$years_risk_management_committee_attendance=array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_risk_management_committee_attendance[]=$row;
    $array_risk_management_committee_attendance[]="$row[att_year] Attended";
    $array_risk_management_committee_attendance[]="$row[att_year] Held";
}
$counter = 0;
for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_risk_management_committee_attendance)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."149", $array_risk_management_committee_attendance[$counter]);
    $counter++;
}
$risk_management_committee_attendance_counter = 150;
$column_counter = 2;
foreach($company_directors as $director) {
    if($director['risk_management_committee']=='C' or $director['risk_management_committee']=='M') {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$risk_management_committee_attendance_counter,$director['dir_name']);
        foreach($years_risk_management_committee_attendance as $year_risk_management_committee_attendance) {
            $column_counter++;
            $stmt=$dbobject->prepare("select * from `risk_management_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
            $stmt->bindParam(':dir_din_no',$director['din_no']);
            $stmt->bindParam(':att_year',$year_risk_management_committee_attendance['att_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$risk_management_committee_attendance_counter, $row['attended']);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$risk_management_committee_attendance_counter, $row['held']);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$risk_management_committee_attendance_counter,"-");
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter].$risk_management_committee_attendance_counter, "-");
            }
        }
        $risk_management_committee_attendance_counter++;
        $column_counter = 2;
    }    
}

// nomination and remuneration attendance if same

if($rem_nom_same=='yes') {
    $array_nomination_remuneration_committee_attendance = array('Nomination and Remuneration Committee Attendance','Director Name');
    
    $stmt=$dbobject->prepare("select DISTINCT `att_year` from `nomination_remuneration_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $years_nomination_remuneration_committee_attendance=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $years_nomination_remuneration_committee_attendance[]=$row;
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Attended";
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Held";
    }
    $counter = 0;

    for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_nomination_remuneration_committee_attendance)]; $cell++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."170", $array_nomination_remuneration_committee_attendance[$counter]);
        $counter++;
    }

    $remuneration_nomination_committee_attendance_counter = 171;
    $column_counter = 2;
    foreach($company_directors as $director) {
        // echo $director['dir_name'];
        if($director['nomination_remuneration']=='C' or $director['nomination_remuneration']=='M') {
            
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $column_counter++;
                $stmt = $dbobject->prepare("select * from `nomination_remuneration_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }
} 
else {
    // Nomination Attendance
    $array_nomination_remuneration_committee_attendance = array('Nomination Committee Attendance','Director Name');
    $stmt=$dbobject->prepare("select DISTINCT `att_year` from `nomination_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $years_nomination_remuneration_committee_attendance=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $years_nomination_remuneration_committee_attendance[]=$row;
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Attended";
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Held";
    }
    $counter = 0;
    for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_nomination_remuneration_committee_attendance)]; $cell++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."170", $array_nomination_remuneration_committee_attendance[$counter]);
        $counter++;
    }

    $remuneration_nomination_committee_attendance_counter = 171;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['nomination']=='C' or $director['nomination']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $column_counter++;
                $stmt = $dbobject->prepare("select * from `nomination_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[++$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

    // Remuneration Attendance

    $array_nomination_remuneration_committee_attendance = array('Remuneration Committee Attendance','Director Name');
    $stmt=$dbobject->prepare("select DISTINCT `att_year` from `remuneration_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $years_nomination_remuneration_committee_attendance=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $years_nomination_remuneration_committee_attendance[]=$row;
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Attended";
        $array_nomination_remuneration_committee_attendance[]="$row[att_year] Held";
    }
    $counter = 0;
    for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_nomination_remuneration_committee_attendance)]; $cell++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."191", $array_nomination_remuneration_committee_attendance[$counter]);
        $counter++;
    }

    $remuneration_nomination_committee_attendance_counter = 192;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['remuneration']=='C' or $director['remuneration']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $column_counter++;
                $stmt = $dbobject->prepare("select * from `remuneration_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }
}   


// other information

$string_headers = "<thead></thead><tr><th>&nbsp;</th>";
$years_auditor_fee_details = array();

$array_auditor_fee_details = array("Audit Fee Details","");
   
// Getting total distinct years
$stmt=$dbobject->prepare("select DISTINCT `financial_year` from `company_auditors_info` where `financial_year`<=:financial_year ORDER BY `financial_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_auditor_fee_details[]=$row;
    $array_auditor_fee_details[]="$row[financial_year]";
}

$counter = 0;

for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_auditor_fee_details)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."214", $array_auditor_fee_details[$counter]);
    $counter++;
}

$string_rows = "<tbody>";
$array_cols = array(
    "Net Profit (In Rs. Crore)",
    "Audit Fee (In Rs. Crore)",
    "Audit Related Fee (In Rs. Crore)",
    "Non-Audit Fee (In Rs. Crore)",
    "Total Auditors Fee (In Rs. Crore)"
);

$auditor_fee_details_counter = 215;
$column_counter = 2;

$array_column_names = array('net_profit','audit_fee','audit_related_fee','non_audit_fee','total_auditors_fee');
for($counter=0;$counter<=4;$counter++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,$array_cols[$counter]);
    foreach($years_auditor_fee_details as $year_auditor_fee_details) {
        $column_counter++;
        $stmt=$dbobject->prepare("select `$array_column_names[$counter]` from `company_auditors_info` where `financial_year`=:financial_year and `company_id`=:company_id");
        $stmt->bindParam(':financial_year',$year_auditor_fee_details['financial_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cl_name = $array_column_names[$counter];
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter, $row[$cl_name]);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,"-");
        }
    }
    $auditor_fee_details_counter++;
    $column_counter = 2;
}

// auditors info

    $stmt=$dbobject->prepare("select `id`,`no_of_auditors` from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
    $stmt->bindParam(':company_id',$company_id);
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $company_auditors_info_id = $row['id'];
    $no_of_auditors = $row['no_of_auditors'];



    $string_headers.="<thead><tr><th>&nbsp;</th><th colspan='".($no_of_auditors)."'>$financial_year</th></tr></thead>";
    $string_rows = "<tbody><tr><th>No. of Auditors</th><td colspan='".($no_of_auditors)."'>$no_of_auditors</td></tr>";

    $objPHPExcel->getActiveSheet()->SetCellValue("A222","Auditor's Info");
    $objPHPExcel->getActiveSheet()->SetCellValue("C222",$financial_year);
    
    $col_titles = array("Auditor's Name","Auditor's Reg. No","Auditor's Parent Company","Auditor's Tenure","Audit Partner Name","Audit Partner Membership No.","Audit Partner Tenure");
    $column_names = array('auditor_name','auditor_reg_no','parent_company','auditor_tenure','partner_name','partner_membership_no','partner_tenure');


    $stmt=$dbobject->prepare("select `id` from `company_auditors_details` where `company_auditor_info_id`=:company_auditors_info_id");
    $stmt->bindParam(':company_auditors_info_id',$company_auditors_info_id);
    $stmt->execute();

    $details_id = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $details_id[] = $row['id'];
    }

    $auditor_info_counter = 223;
    $column_counter = 2;

    foreach($column_names as $key=>$col_na) {
        $string_rows.="<tr><th>$col_titles[$key]</th>";
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,$col_titles[$key]);
        for($counter = 0 ; $counter<count($details_id); $counter++) {
            $column_counter++;
            $stmt=$dbobject->prepare("select `$col_na` from `company_auditors_details` where `id`=:id");
            $stmt->bindParam(':id',$details_id[$counter]);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $string_rows.="<td>$row[$col_na]</td>";
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter, $row[$col_na]);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,"-");
            }
        }
        $auditor_info_counter++;
        $column_counter = 2;
    }

    // Dividend Info

$string_headers = "<thead></thead><tr><th>&nbsp;</th>";
$years_dividend_info = array();

$array_dividend_info = array("Dividend Info","");
   
// Getting total distinct years
$stmt=$dbobject->prepare("select DISTINCT `financial_year` from `dividend_info` where `financial_year`<=:financial_year ORDER BY `financial_year` DESC");
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $years_dividend_info[]=$row;
    $array_dividend_info[]="$row[financial_year]";
}

$counter = 0;

for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_dividend_info)]; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."232", $array_dividend_info[$counter]);
    $counter++;
}

$string_rows = "<tbody>";
$array_cols = array(
    "Dividend",
    "Market Price at year start",
    "Market Price at year end",
    "EPS"
);

$dividend_info_counter = 233;
$column_counter = 2;

$array_column_names = array('dividend','market_price_start','market_price_end','eps');
for($counter=0;$counter<=4;$counter++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$dividend_info_counter,$array_cols[$counter]);
    foreach($years_dividend_info as $year_dividend_info) {
        $column_counter++;
        $stmt=$dbobject->prepare("select `$array_column_names[$counter]` from `dividend_info` where `financial_year`=:financial_year and `company_id`=:company_id");
        $stmt->bindParam(':financial_year',$year_dividend_info['financial_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cl_name = $array_column_names[$counter];
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$dividend_info_counter, $row[$cl_name]);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$dividend_info_counter,"");
        }
    }
    $dividend_info_counter++;
    $column_counter = 2;
}
$year=$_GET['financial_year'];
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($company_name."_".$year.".xlsx");
$link=$company_name."_".$year.".xlsx";
echo "<br/><a href='$link'>Download File</a>";
?>