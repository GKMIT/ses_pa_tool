<?php
$ds  = DIRECTORY_SEPARATOR;
$storeFolder = 'uploads';
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $file_name = "DirectorInfo.$ext";
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
    $file_name = "DirectorInfo.".$ext;
    $targetFile =  $targetPath.$file_name;
    $uploaded = move_uploaded_file($tempFile,$targetFile);
    if($uploaded) {

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
            if($cin_no!="" && strlen($cin_no)==21 && $cessation_date=="-" && (strcasecmp($llp_status,"Active")==0 || strcasecmp($llp_status,"Not Available for eFiling")==0)) {
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

        $message = array(
            'success'=>200,
            'filename' => $file_name,
            'no_directorship_public'=>$public_directorship,
            'no_directorship_private'=>$private_directorship,
            'no_directorship_listed_companies'=>$directorships_listed,
            'no_total_directorship'=>$directorships_listed+$directorships_unlisted,
            'no_full_time_positions'=>$full_time_designation
            );
    }
    else
        $message = array('error'=>400);
    echo json_encode($message);
}
?>