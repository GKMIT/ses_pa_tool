<?php
session_start();
include_once("../Classes/database.php");
$file_name = $_FILES['input_sheet']['name'];
if(move_uploaded_file($_FILES['input_sheet']['tmp_name'],$file_name)) {
    echo "Sheet Uploaded<br/>";
}
include('../Classes/PHPExcel/IOFactory.php');
$sheet_name="Input";
$objReader = new PHPExcel_Reader_Excel2007();
$objReader->setReadDataOnly(true);
$objReader->setLoadSheetsOnly($sheet_name);
$objPHPExcel = $objReader->load($file_name);
echo "Company BSE: ". $bse_code = $objPHPExcel->getActiveSheet()->getCell('A1')->getValue();
echo "Financial Year: ". $financial_year = $objPHPExcel->getActiveSheet()->getCell('B1')->getValue();
echo "<br/>";
echo "<br/>";
$db = new Database();
$company_details = $db->getCompanyDetails2(intval($bse_code));
if($company_details['exists']) {
    echo "Company Id - " . $company_id = $company_details['id']."<br/>";
    if(!$db->inputSheetDuplicateCheck($company_id,$financial_year)) {
        for($i=3;$i<=22;$i++) {
            $din_no = trim($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue());
            $dir_name = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
            $expertise = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getValue();
            $education = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getValue();
            if($din_no!="") {
                $info['din_no'] = $din_no;
                $info['dir_name'] = $dir_name;
                $info['expertise'] = $expertise;
                $info['education'] = $education;
                $db->registerNewDirectorSheet($info);
                echo $din_no."<br/>";
            }
            else
                echo "Blanks<br/>";
        }
        echo "Director Info <br/>";
        ?>
        <table width="100%" border="1">
            <tr>
                <th>Appointment Date</th>
                <th>Resignation Date</th>
                <th>Current Tenure</th>
                <th>Total Association</th>
                <th>Classification</th>
                <th>Additional Classification</th>
                <th>Audit Committee</th>
                <th>Investor Grievance</th>
                <th>Remuneration</th>
                <th>Nomination</th>
                <th>Shares Held</th>
                <th>ESOPs</th>
                <th>Other Pecuniary Relationship</th>
                <th>Last 3 AGM Attendance</th>
                <th>No. of Directorship</th>
                <th>Committee Memberships</th>
                <th>Committee Chairmanships</th>
                <th>Expertise</th>
                <th>Education</th>
            </tr>
            <?php
            for($i=3;$i<=22;$i++) {
                $din_no = trim($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue());
                echo "<tr>";
                if($din_no!="") {
                    for($k=C;$k<=U;$k++) {
                        if($k==C) {
                            $appointment_date = $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                            $appointment_date = PHPExcel_Style_NumberFormat::toFormattedString($appointment_date, "YYYY-mm-dd");
                            echo "<td>$appointment_date</td>";
                        }
                        else if($k==D) {
                            $resignation_date = $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                            $resignation_date = PHPExcel_Style_NumberFormat::toFormattedString($resignation_date, "YYYY-mm-dd");
                            echo "<td>$resignation_date</td>";
                        }
                        else if($k==E) {
                            $current_tenure = round($objPHPExcel->getActiveSheet()->getCell($k.$i)->getCalculatedValue());
                            echo "<td>$current_tenure</td>";
                        }
                        else
                            echo "<td>".$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue()."</td>";
                    }
                    $info['company_id'] =$company_id;
                    $info['dir_din_no'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
                    $info['appointment_date'] = $appointment_date;
                    if($resignation_date=='') {
                        $info['resignation_date'] = '0000-00-00';
                    }
                    else {
                        $info['resignation_date'] = $resignation_date;
                    }
                    $info['current_tenure'] = $current_tenure;
                    $info['total_association']=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getFormattedValue()=="" ? '' : $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getFormattedValue();
                    $info['company_classification'] = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getValue();
                    $info['ses_classification'] = "";
                    $info['additional_classification'] = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getValue();
                    $info['audit_committee'] = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getValue();
                    $info['investor_grievance'] = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getValue();
                    $info['is_nom_rem_separate'] = 'no';
                    $info['nomination_remuneration'] = "";
                    $info['csr'] = '';
                    $info['risk_management_committee'] = '';
                    $info['shares_held'] = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getFormattedValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getFormattedValue();
                    $info['shares_held'] = str_replace(',','',$info['shares_held']);
                    $info['esops'] = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getValue();
                    $info['other_pecuniary_relationship'] = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getValue()=="" ? "" : $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getValue();
                    $info['retiring_non_retiring'] = "Non Retiring";
                    $info['ratio_to_mre'] = "";
                    $info['financial_year'] = intval($financial_year);
                    $info['comments'] = "";
                    $db->registerDirectorInfo($info);
                }
                echo "</tr>";
            }
            ?>
        </table>

        <?php
        echo "Director Renumeration <br/>";
        ?>
        <table width="100%" border="1">
            <tr>
                <th>2014 Variable Pay</th>
                <th>2014 Fixed Pay</th>
                <th>2013 Variable Pay</th>
                <th>2013 Fixed Pay</th>
                <th>2012 Variable Pay</th>
                <th>2012 Fixed Pay</th>
                <th>2011 Variable Pay</th>
                <th>2011 Fixed Pay</th>
                <th>2010 Variable Pay</th>
                <th>2010 Fixed Pay</th>
            </tr>
            <?php
            $ren_years = range($financial_year,2009);
            for($i=24;$i<=43;$i++) {
                $dir_cell = intval($i)-21;
                $dir_din_no = trim($objPHPExcel->getActiveSheet()->getCell('A'.$dir_cell)->getValue());
                $info = array();
                if($dir_din_no!="") {
                    echo "<tr>";
                    $year_counter = 0;
                    for($k=C;$k<=M;$k++) {
                        echo "<td>".round($objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue(),5)."</td>";
                        $info['company_id'] = $company_id;
                        $info['dir_din_no'] =$dir_din_no;
                        $info['rem_year']=$ren_years[$year_counter++];
                        $info['variable_pay']=round($objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue(),4);
                        $k++;
                        $info['fixed_pay']=round($objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue(),4);
                        $db->registerDirectorRemuneration($info);
                    }
                    echo "</tr>";
                }
                else
                    break;
            }
            ?>
        </table>
        <?php
        echo "<br/>";
        echo "Director Board Attendance <br/>";
        ?>
        <table width="100%" border="1">
            <tr>
                <th>2014 Attended</th>
                <th>2014 Held</th>
                <th>2013 Attended</th>
                <th>2013 Held</th>
                <th>2012 Attended</th>
                <th>2012 Held</th>
            </tr>
            <?php
            $ren_years = range($financial_year,2011);
            for($i=45;$i<=64;$i++) {
                $dir_cell = intval($i)-42;
                $dir_din_no = trim($objPHPExcel->getActiveSheet()->getCell('A'.$dir_cell)->getValue());
                $info = array();
                if($dir_din_no!="") {
                    echo "<tr>";
                    $year_counter = 0;
                    for($k=C;$k<=M;$k++) {
                        echo "<td>".$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue()."</td>";
                        $info['company_id'] = $company_id;
                        $dir_cell = intval($i)-42;
                        $info['dir_din_no'] = $dir_din_no;
                        $info['att_year']=$ren_years[$year_counter++];
                        $info['attended']=$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue() == "" ? 0 : $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                        $k++;
                        $info['held']=$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue() == "" ? 0 : $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                        $response = $db->directorBoardAttendance($info);
                        echo $response['title'];
                    }
                    echo "</tr>";
                }
                else
                    break;
            }
            ?>
        </table>

        Audit Committee Attendance

        <table width="100%" border="1">
            <tr>
                <th>2014 Attended</th>
                <th>2014 Held</th>
                <th>2013 Attended</th>
                <th>2013 Held</th>
                <th>2012 Attended</th>
                <th>2012 Held</th>
            </tr>
            <?php
            $ren_years = range($financial_year,2011);
            for($i=66;$i<=85;$i++) {
                $d_name = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
                $info = array();
                if($d_name!="" && !strpos($d_name,"*")) {
                    echo "<tr>";
                    $year_counter = 0;
                    for($k=C;$k<=M;$k++) {
                        echo "<td>".$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue()."</td>";
                        $info['company_id'] = $company_id;
                        $dir_cell = intval($i)-63;
                        $info['dir_din_no'] = trim($objPHPExcel->getActiveSheet()->getCell('A'.$dir_cell)->getValue());
                        $info['att_year']=$ren_years[$year_counter++];
                        $info['attended']=$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue() == "" ? 0 : $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                        $k++;
                        $info['held']=$objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue() == "" ? 0 : $objPHPExcel->getActiveSheet()->getCell($k.$i)->getValue();
                        $db->auditCommitteeAttendance($info);
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>

        Audit Fee

        <table width="100%" border="1">
            <tr>
                <th>2014 Attended</th>
                <th>2014 Held</th>
                <th>2013 Attended</th>
                <th>2013 Held</th>
                <th>2012 Attended</th>
                <th>2012 Held</th>
            </tr>
            <?php
            $ren_years = range($financial_year,2009);
            $string_match = $objPHPExcel->getActiveSheet()->getCell('C130')->getValue();
            if($string_match=='FY 13/14') {
                $info = array();
                $year_counter = 0;
                for ($k = C; $k <= H; $k++) {
                    $info['company_id'] = $company_id;
                    $info['no_of_auditors'] = 0;
                    $info['financial_year'] = $ren_years[$year_counter++];
                    $info['net_profit'] = round($objPHPExcel->getActiveSheet()->getCell($k."131")->getValue(),4);
                    $info['audit_fee'] = round($objPHPExcel->getActiveSheet()->getCell($k . "132")->getValue(),4);
                    $info['audit_related_fee'] = round($objPHPExcel->getActiveSheet()->getCell($k . "133")->getValue(),4);
                    $info['non_audit_fee'] = round($objPHPExcel->getActiveSheet()->getCell($k . "134")->getValue(),4);
                    $info['total_auditors_fee'] = round($objPHPExcel->getActiveSheet()->getCell($k . "135")->getOldCalculatedValue(),4);
                    $db->registerAuditFeeInfoFromSheet($info);
                }
            }
            ?>
        </table>
    <?php
    }
    else {
        echo "Sheet Exists";
    }
}
else {
    echo "Company with this BSE Code is not exists in database";
}
?>
<a href="index.php">Go Back</a>
