<?php
error_reporting(E_ALL);
include_once("../Classes/database.php");
include_once("../Classes/db-config.php");
ini_set('include_path', ini_get('include_path').';../Classes/');
include '../Classes/PHPExcel.php';
include '../Classes/PHPExcel/Writer/Excel2007.php';
echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getSheetView()->setZoomScale(140);
$styleArray = array(
    'borders' => array(
        'inside'     => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'outline'     => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb' => '000000'
            )
        )
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A1:Z200')->applyFromArray($styleArray);

$array_director_info_column_headings = array("Director \n Information","Director Name","Appointment Date","Resignation Date","Current Tenure","Total Association","Company Classification","SES Classification","Additional Classification","Audit Committee","Stackholders Relationship","Nomination and Remuneration","CSR","Risk Management","Shares Held","ESOPs","Other Pecuniary Relationship","No. of Public Directorship","No. of total Directorship","No. of Directorship in listed companies","Committee Memberships","Committee Chairmanships","Expertise","Education");
$array_director_info_column_size = array(30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,60);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Company Name');
$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Director Information');

$counter=0;
$styleArray = array(
    'font' => array(
        'bold' => true,
        'size'=>10
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
    )
);


$bgColorStyle = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FABF8F')
    ),
    'font' => array(
        'size'=>10
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
    )
);

$styleAlignmentCenter = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'font' => array(
        'size'=>10
    )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:E1')->applyFromArray($bgColorStyle);


for($cell = 'A'; $cell<='X'; $cell++) {
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."2", $array_director_info_column_headings[$counter]);
    $objPHPExcel->getActiveSheet()->getStyle($cell."2")->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getColumnDimension($cell)->setWidth($array_director_info_column_size[$counter++]);
}

$objPHPExcel->getActiveSheet()->getStyle("A2")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));
$objPHPExcel->getActiveSheet()->getStyle("A23")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));
$objPHPExcel->getActiveSheet()->getStyle("A44")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A65")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A86")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A107")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A128")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A179")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));


$objPHPExcel->getActiveSheet()->getStyle("A149")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getStyle("A170")->applyFromArray(array(
    'font' => array(
        'color' => array('rgb' => "538DD5"),
        'bold' => true,
        'size'=>10
    )
));

$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(42);
$db = new Database();

$company_id = $_GET['company_id'];
$financial_year = $_GET['financial_year'];

$company_details=$db->getCompanyDetails($company_id);
$rem_nom_same = $company_details['is_rem_nom_same'];

$directors=$db->getCompanyDirectors($company_id,$financial_year);

$row_counter = 3;
foreach($directors as $director) {
    $objPHPExcel->getActiveSheet()->SetCellValue("A".$row_counter, $director['din_no']);
    $objPHPExcel->getActiveSheet()->SetCellValue("B".$row_counter, $director['dir_name']);
    $objPHPExcel->getActiveSheet()->SetCellValue("C".$row_counter, $director['appointment_date']);
    if($director['resignation_date']=="0000-00-00") {
        $director['resignation_date']="";
    }
    $objPHPExcel->getActiveSheet()->SetCellValue("D".$row_counter, $director['resignation_date']);
    $objPHPExcel->getActiveSheet()->SetCellValue("E".$row_counter, $director['current_tenure']);
    $objPHPExcel->getActiveSheet()->SetCellValue("F".$row_counter, $director['total_association']);
    $objPHPExcel->getActiveSheet()->SetCellValue("G".$row_counter, $director['company_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue("H".$row_counter, $director['ses_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue("I".$row_counter, $director['additional_classification']);
    $objPHPExcel->getActiveSheet()->SetCellValue("J".$row_counter, $director['audit_committee']);
    $objPHPExcel->getActiveSheet()->SetCellValue("K".$row_counter, $director['investor_grievance']);
    $objPHPExcel->getActiveSheet()->SetCellValue("L".$row_counter, $director['remuneration']);
    $objPHPExcel->getActiveSheet()->SetCellValue("M".$row_counter, $director['csr']);
    $objPHPExcel->getActiveSheet()->SetCellValue("N".$row_counter, $director['risk_management_committee']);
    $objPHPExcel->getActiveSheet()->SetCellValue("O".$row_counter, $director['shares_held']);
    $objPHPExcel->getActiveSheet()->SetCellValue("P".$row_counter, $director['esops']);
    $objPHPExcel->getActiveSheet()->SetCellValue("Q".$row_counter, $director['other_pecuniary_relationship']);
    $objPHPExcel->getActiveSheet()->SetCellValue("R".$row_counter, $director['no_directorship_public']);
    $objPHPExcel->getActiveSheet()->SetCellValue("S".$row_counter, $director['no_total_directorship']);
    $objPHPExcel->getActiveSheet()->SetCellValue("T".$row_counter, $director['no_directorship_listed_companies']);
    $objPHPExcel->getActiveSheet()->SetCellValue("U".$row_counter, $director['committee_memberships']);
    $objPHPExcel->getActiveSheet()->SetCellValue("V".$row_counter, $director['committee_chairmanships']);
    $objPHPExcel->getActiveSheet()->SetCellValue("W".$row_counter, $director['expertise']);
    $objPHPExcel->getActiveSheet()->SetCellValue("X".$row_counter, $director['education']);
    $objPHPExcel->getActiveSheet()->getStyle("A".$row_counter.":"."X".$row_counter)->applyFromArray($bgColorStyle);
    $row_counter++;
}

$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year");
$stmt->bindParam(':company_id',$company_id);
$stmt->bindParam(':financial_year',$financial_year);
$stmt->execute();
$company_directors = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $company_directors[]=$row;
}

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
    $objPHPExcel->getActiveSheet()->getStyle($cell."23")->applyFromArray($styleArray);
    $counter++;
}

$objPHPExcel->getActiveSheet()->getRowDimension('23')->setRowHeight(50);

$remuneration_details_counter = 24;
$column_counter = 2;
foreach($company_directors as $director) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter,$director['dir_name']);
    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$remuneration_details_counter)->applyFromArray($styleAlignmentCenter);
    foreach($years as $year) {
        $stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:rem_year and `company_id`=:company_id");
        $stmt->bindParam(':dir_din_no',$director['dir_din_no']);
        $stmt->bindParam(':rem_year',$year['rem_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter, $row['variable_pay']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$remuneration_details_counter)->applyFromArray($bgColorStyle);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter, $row['fixed_pay']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$remuneration_details_counter)->applyFromArray($bgColorStyle);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter,"-");
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$remuneration_details_counter)->applyFromArray($bgColorStyle);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$remuneration_details_counter, "-");
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$remuneration_details_counter)->applyFromArray($bgColorStyle);
        }
    }
    $remuneration_details_counter++;
    $column_counter = 2;
}


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
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."44", $array_director_board_attendance[$counter]);
    $objPHPExcel->getActiveSheet()->getStyle($cell."44")->applyFromArray($styleArray);
    $counter++;
}

$objPHPExcel->getActiveSheet()->getRowDimension('44')->setRowHeight(50);

$director_board_attendance_counter = 45;
$column_counter = 2;
foreach($company_directors as $director) {
    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter,$director['dir_name']);
    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$director_board_attendance_counter)->applyFromArray($styleAlignmentCenter);
    foreach($years_director_board_attendance as $year_director_board_attendance) {
        $stmt=$dbobject->prepare("select * from `director_board_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
        $stmt->bindParam(':dir_din_no',$director['dir_din_no']);
        $stmt->bindParam(':att_year',$year_director_board_attendance['att_year']);
        $stmt->bindParam(':company_id',$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter, $row['attended']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$director_board_attendance_counter)->applyFromArray($bgColorStyle);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter, $row['held']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$director_board_attendance_counter)->applyFromArray($bgColorStyle);
        }
        else {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter,"-");
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$director_board_attendance_counter)->applyFromArray($bgColorStyle);
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$director_board_attendance_counter, "-");
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$director_board_attendance_counter)->applyFromArray($bgColorStyle);
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
    $objPHPExcel->getActiveSheet()->SetCellValue($cell."65", $array_audit_committee_attendance[$counter]);
    $objPHPExcel->getActiveSheet()->getStyle($cell."65")->applyFromArray($styleArray);
    $counter++;
}
$objPHPExcel->getActiveSheet()->getRowDimension('65')->setRowHeight(50);
$audit_committee_attendance_counter = 66;
$column_counter = 2;
foreach($company_directors as $director) {
    if($director['audit_committee']=='C' or $director['audit_committee']=='M') {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter,$director['dir_name']);
        $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$audit_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
        foreach($years_audit_committee_attendance as $year_audit_committee_attendance) {
            $stmt=$dbobject->prepare("select * from `audit_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
            $stmt->bindParam(':dir_din_no',$director['dir_din_no']);
            $stmt->bindParam(':att_year',$year_audit_committee_attendance['att_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter, $row['attended']);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$audit_committee_attendance_counter)->applyFromArray($bgColorStyle);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter, $row['held']);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$audit_committee_attendance_counter)->applyFromArray($bgColorStyle);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter,"-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$audit_committee_attendance_counter)->applyFromArray($bgColorStyle);
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$audit_committee_attendance_counter, "-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$audit_committee_attendance_counter)->applyFromArray($bgColorStyle);
            }
        }
        $audit_committee_attendance_counter++;
        $column_counter = 2;
    }
}

// nomination and remuneration attendance if same

if($rem_nom_same=='yes') {

    $array_nomination_remuneration_committee_attendance = array('Nomination and Remuneration Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A86')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."86", $array_nomination_remuneration_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."86")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('86')->setRowHeight(50);

    $remuneration_nomination_committee_attendance_counter = 87;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['nomination']=='C' or $director['nomination']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `nomination_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }


//  CSR committee attendance

    $array_csr_committee_attendance = array('CSR Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A107')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."107", $array_csr_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."107")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('107')->setRowHeight(50);

    $csr_committee_attendance_counter = 108;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['csr']=='C' or $director['csr']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_csr_committee_attendance as $year_csr_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `csr_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_csr_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $csr_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

//  Stackholders Relationship committee attendance

    $array_investors_grievance_committee_attendance = array('Stackholders Relationship Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A128')->getAlignment()->setWrapText(true);

    $stmt=$dbobject->prepare("select DISTINCT `att_year` from `investors_grievance_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $years_investors_grievance_committee_attendance=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $years_investors_grievance_committee_attendance[]=$row;
        $array_investors_grievance_committee_attendance[]="$row[att_year] Attended";
        $array_investors_grievance_committee_attendance[]="$row[att_year] Held";
    }

    $counter = 0;

    for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_investors_grievance_committee_attendance)]; $cell++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."128", $array_investors_grievance_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."128")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('128')->setRowHeight(50);

    $investors_grievance_committee_attendance_counter = 129;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['investor_grievance']=='C' or $director['investor_grievance']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_investors_grievance_committee_attendance as $year_investors_grievance_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_investors_grievance_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $investors_grievance_committee_attendance_counter++;
            $column_counter = 2;
        }
    }


//  Risk Management Committee Attendance

    $array_risk_management_committee_attendance = array("Risk Management Committee\nAttendance",'Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A149')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->getStyle($cell."149")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('149')->setRowHeight(50);

    $risk_management_committee_attendance_counter = 150;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['risk_management_committee']=='C' or $director['risk_management_committee']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_risk_management_committee_attendance as $year_risk_management_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_risk_management_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $risk_management_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

// other information

    $string_headers = "<thead></thead><tr><th>&nbsp;</th>";
    $years_auditor_fee_details = array();

    $array_auditor_fee_details = array("Audit Fee Details","");
    $objPHPExcel->getActiveSheet()->getStyle('A170')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."170", $array_auditor_fee_details[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."170")->applyFromArray($styleArray);
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

    $auditor_fee_details_counter = 171;
    $column_counter = 2;

    $array_column_names = array('net_profit','audit_fee','audit_related_fee','non_audit_fee','total_auditors_fee');
    for($counter=0;$counter<=4;$counter++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,$array_cols[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($styleAlignmentCenter);
        foreach($years_auditor_fee_details as $year_auditor_fee_details) {
            $stmt=$dbobject->prepare("select `$array_column_names[$counter]` from `company_auditors_info` where `financial_year`=:financial_year and `company_id`=:company_id");
            $stmt->bindParam(':financial_year',$year_auditor_fee_details['financial_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $cl_name = $array_column_names[$counter];
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter, $row[$cl_name]);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($bgColorStyle);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,"-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($bgColorStyle);
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

    $objPHPExcel->getActiveSheet()->SetCellValue("A179","Auditor's Info");
    $objPHPExcel->getActiveSheet()->getStyle("A179")->applyFromArray($styleAlignmentCenter);
    $objPHPExcel->getActiveSheet()->SetCellValue("C179",$financial_year);
    $objPHPExcel->getActiveSheet()->getStyle("C179")->applyFromArray($styleAlignmentCenter);

    $col_titles = array("Auditor's Name","Auditor's Reg. No","Auditor's Parent Company","Auditor's Tenure","Audit Partner Name","Audit Partner Membership No.","Audit Partner Tenure");
    $column_names = array('auditor_name','auditor_reg_no','parent_company','auditor_tenure','partner_name','partner_membership_no','partner_tenure');


    $stmt=$dbobject->prepare("select `id` from `company_auditors_details` where `company_auditor_info_id`=:company_auditors_info_id");
    $stmt->bindParam(':company_auditors_info_id',$company_auditors_info_id);
    $stmt->execute();

    $details_id = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $details_id[] = $row['id'];
    }

    $auditor_info_counter = 180;
    $column_counter = 2;

    foreach($column_names as $key=>$col_na) {
        $string_rows.="<tr><th>$col_titles[$key]</th>";
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,$col_titles[$key]);
        $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($styleAlignmentCenter);
        for($counter = 0 ; $counter<count($details_id); $counter++) {
            $stmt=$dbobject->prepare("select `$col_na` from `company_auditors_details` where `id`=:id");
            $stmt->bindParam(':id',$details_id[$counter]);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $string_rows.="<td>$row[$col_na]</td>";
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter, $row[$col_na]);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($bgColorStyle);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,"-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($bgColorStyle);
            }
        }
        $auditor_info_counter++;
        $column_counter = 2;
    }
}
else {
    // Nomination Attendance
    $array_nomination_remuneration_committee_attendance = array('Nomination Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A86')->getAlignment()->setWrapText(true);
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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."86", $array_nomination_remuneration_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."86")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('86')->setRowHeight(50);

    $remuneration_nomination_committee_attendance_counter = 87;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['nomination']=='C' or $director['nomination']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `nomination_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

    // Remuneration Attendance

    $array_nomination_remuneration_committee_attendance = array('Remuneration Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A107')->getAlignment()->setWrapText(true);
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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."107", $array_nomination_remuneration_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."107")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('107')->setRowHeight(50);

    $remuneration_nomination_committee_attendance_counter = 108;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['nomination']=='C' or $director['nomination']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_nomination_remuneration_committee_attendance as $year_nomination_remuneration_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `nomination_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_nomination_remuneration_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $remuneration_nomination_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $remuneration_nomination_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $remuneration_nomination_committee_attendance_counter++;
            $column_counter = 2;
        }
    }


//  CSR committee attendance

    $array_csr_committee_attendance = array('CSR Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A128')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->getStyle($cell."128")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('128')->setRowHeight(50);

    $csr_committee_attendance_counter = 129;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['csr']=='C' or $director['csr']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_csr_committee_attendance as $year_csr_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `csr_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_csr_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $csr_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $csr_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $csr_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

//  Stackholders Relationship committee attendance

    $array_investors_grievance_committee_attendance = array('Stackholders Relationship Committee Attendance','Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A149')->getAlignment()->setWrapText(true);

    $stmt=$dbobject->prepare("select DISTINCT `att_year` from `investors_grievance_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
    $stmt->bindParam(':financial_year',$financial_year);
    $stmt->execute();
    $years_investors_grievance_committee_attendance=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $years_investors_grievance_committee_attendance[]=$row;
        $array_investors_grievance_committee_attendance[]="$row[att_year] Attended";
        $array_investors_grievance_committee_attendance[]="$row[att_year] Held";
    }

    $counter = 0;

    for($cell = $array_col_names[1]; $cell<=$array_col_names[count($array_investors_grievance_committee_attendance)]; $cell++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."149", $array_investors_grievance_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."149")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('149')->setRowHeight(50);

    $investors_grievance_committee_attendance_counter = 150;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['investor_grievance']=='C' or $director['investor_grievance']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_investors_grievance_committee_attendance as $year_investors_grievance_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_investors_grievance_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $investors_grievance_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $investors_grievance_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $investors_grievance_committee_attendance_counter++;
            $column_counter = 2;
        }
    }


//  Risk Management Committee Attendance

    $array_risk_management_committee_attendance = array("Risk Management Committee\nAttendance",'Director Name');
    $objPHPExcel->getActiveSheet()->getStyle('A170')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."170", $array_risk_management_committee_attendance[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."170")->applyFromArray($styleArray);
        $counter++;
    }

    $objPHPExcel->getActiveSheet()->getRowDimension('170')->setRowHeight(50);

    $risk_management_committee_attendance_counter = 171;
    $column_counter = 2;
    foreach($company_directors as $director) {
        if($director['risk_management_committee']=='C' or $director['risk_management_committee']=='M') {
            $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $director['dir_name']);
            $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($styleAlignmentCenter);
            foreach ($years_risk_management_committee_attendance as $year_risk_management_committee_attendance) {
                $stmt = $dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
                $stmt->bindParam(':dir_din_no', $director['dir_din_no']);
                $stmt->bindParam(':att_year', $year_risk_management_committee_attendance['att_year']);
                $stmt->bindParam(':company_id', $company_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $row['attended']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, $row['held']);
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                    $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter] . $risk_management_committee_attendance_counter, "-");
                    $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++] . $risk_management_committee_attendance_counter)->applyFromArray($bgColorStyle);
                }
            }
            $risk_management_committee_attendance_counter++;
            $column_counter = 2;
        }
    }

// other information

    $string_headers = "<thead></thead><tr><th>&nbsp;</th>";
    $years_auditor_fee_details = array();

    $array_auditor_fee_details = array("Audit Fee Details","");
    $objPHPExcel->getActiveSheet()->getStyle('A191')->getAlignment()->setWrapText(true);

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
        $objPHPExcel->getActiveSheet()->SetCellValue($cell."191", $array_auditor_fee_details[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($cell."191")->applyFromArray($styleArray);
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

    $auditor_fee_details_counter = 192;
    $column_counter = 2;

    $array_column_names = array('net_profit','audit_fee','audit_related_fee','non_audit_fee','total_auditors_fee');
    for($counter=0;$counter<=4;$counter++) {
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,$array_cols[$counter]);
        $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($styleAlignmentCenter);
        foreach($years_auditor_fee_details as $year_auditor_fee_details) {
            $stmt=$dbobject->prepare("select `$array_column_names[$counter]` from `company_auditors_info` where `financial_year`=:financial_year and `company_id`=:company_id");
            $stmt->bindParam(':financial_year',$year_auditor_fee_details['financial_year']);
            $stmt->bindParam(':company_id',$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $cl_name = $array_column_names[$counter];
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter, $row[$cl_name]);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($bgColorStyle);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_fee_details_counter,"-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_fee_details_counter)->applyFromArray($bgColorStyle);
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

    $objPHPExcel->getActiveSheet()->SetCellValue("A200","Auditor's Info");
    $objPHPExcel->getActiveSheet()->getStyle("A200")->applyFromArray($styleAlignmentCenter);
    $objPHPExcel->getActiveSheet()->SetCellValue("C200",$financial_year);
    $objPHPExcel->getActiveSheet()->getStyle("C200")->applyFromArray($styleAlignmentCenter);

    $col_titles = array("Auditor's Name","Auditor's Reg. No","Auditor's Parent Company","Auditor's Tenure","Audit Partner Name","Audit Partner Membership No.","Audit Partner Tenure");
    $column_names = array('auditor_name','auditor_reg_no','parent_company','auditor_tenure','partner_name','partner_membership_no','partner_tenure');


    $stmt=$dbobject->prepare("select `id` from `company_auditors_details` where `company_auditor_info_id`=:company_auditors_info_id");
    $stmt->bindParam(':company_auditors_info_id',$company_auditors_info_id);
    $stmt->execute();

    $details_id = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $details_id[] = $row['id'];
    }

    $auditor_info_counter = 201;
    $column_counter = 2;

    foreach($column_names as $key=>$col_na) {
        $string_rows.="<tr><th>$col_titles[$key]</th>";
        $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,$col_titles[$key]);
        $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($styleAlignmentCenter);
        for($counter = 0 ; $counter<count($details_id); $counter++) {
            $stmt=$dbobject->prepare("select `$col_na` from `company_auditors_details` where `id`=:id");
            $stmt->bindParam(':id',$details_id[$counter]);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $string_rows.="<td>$row[$col_na]</td>";
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter, $row[$col_na]);
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($bgColorStyle);
            }
            else {
                $objPHPExcel->getActiveSheet()->SetCellValue($array_col_names[$column_counter].$auditor_info_counter,"-");
                $objPHPExcel->getActiveSheet()->getStyle($array_col_names[$column_counter++].$auditor_info_counter)->applyFromArray($bgColorStyle);
            }
        }
        $auditor_info_counter++;
        $column_counter = 2;
    }
}

echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Simple');
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
echo date('H:i:s') . " Done writing file.\r\n";

echo "<br/><a href='sheet-writer.xlsx'>Download File</a>";
?>