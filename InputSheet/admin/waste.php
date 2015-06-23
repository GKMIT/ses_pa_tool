<?php
include('../../Classes/PHPExcel/IOFactory.php');
$objReader = new PHPExcel_Reader_Excel2007();
$objReader->setReadDataOnly(true);
$sheet_name="Sheet1";
$objReader->setLoadSheetsOnly($sheet_name);
$objPHPExcel = $objReader->load("uploads/DirectorInfo.xlsx");
$directorships_listed = 0;
$directorships_unlisted = 0;

$public_director_ship = array("PLC","GOI","SGC","FLC","ULL","GAP");
$private_director_ship = array("PTC","FTC","ULT","GAT");

$public_directorship = 0;
$private_directorship = 0;
$full_time_designation = 0;

for($i=2;$i<=100;$i++) {
    $cin_no = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();
    $cessation_date = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getValue();
    $llp_status = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getValue();
    $current_designation_status = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getValue();
    if($cin_no!="" && $cessation_date=="-" && (strcasecmp($llp_status,"Active")==0 || strcasecmp($llp_status,"Not Available for eFiling")==0)) {
        if($cin_no[0]=="L") {
            $directorships_listed++;
        }
        elseif($cin_no[0]=="U") {
            $directorships_unlisted++;
        }
        if(in_array(substr($cin_no,12,3),$public_director_ship)) {
            $public_directorship ++;
        }
        if(in_array(substr($cin_no,12,3),$private_director_ship)) {
            $private_directorship ++;
        }
        if(strcasecmp($current_designation_status,"Whole-time director")==0 || strcasecmp($current_designation_status,"Managing director")==0) {
            $full_time_designation++;
        }
    }
    else if($cin_no=="") {
        break;
    }
}
echo json_encode(array('status'=>200,'no_directorship_public'=>$public_directorship));
//echo $directorships_listed."<br/>";
//echo $directorships_unlisted."<br/>";
//echo "Total ".($directorships_listed+$directorships_unlisted)."<br/>";
//echo "Public -  ".($public_directorship)."<br/>";
//echo "Private -  ".($private_directorship)."<br/>";
//echo "Full Time -  ".($full_time_designation)."<br/>";
?>