<?php
include_once("../../Classes/database.php");
$db = new Database();
$company_details = $db->getCompanyDetails($_GET['company_id']);
$months = array('3'=>'March','6'=>'June','9'=>'September','12'=>'December');
$fiscal_year = $months[$company_details['fiscal_year_end']];
$generic_array = $db->getCompanyDirectors($_GET['company_id'],$_GET['financial_year']);
$directors = $generic_array['directors'];
$directors = $db->filteredDirectorsForSheet($directors);
$director_details = "";
$are_committees_seperate = $generic_array['are_committees_seperate'];
if($generic_array['are_committees_seperate']=='yes') {
    $director_details.="<thead>
                        <tr><th>DIN</th><th>Name</th><th>Appointment Date</th><th>Resignation Date</th><th>Current Tenure</th><th>Total Association</th><th>Company Classification</th><th>SES Classification</th><th>Additional Classification</th><th>Audit Committee</th><th>Stackholders Relationship</th><th>Remuneration</th><th>Nomination</th><th>CSR</th><th>Risk Management</th><th>Shares Held</th><th>ESOPs</th><th>Other Pecuniary Relationship</th><th>No. of Public Directorship</th><th>No. of total Directorship</th><th>No. of Directorship in listed companies</th><th>Committee Memberships</th><th>Committee Chairmanships</th><th>Expertise</th><th>Education</th><th>Ratio to MRE</th><th>Retiring/Non Retiring</th><th>Last Updated</th></tr>
                    </thead>
                    <tbody>";
    foreach($directors as $director) {
        $user_info= $db->getUserInfo($director['updated_by']);
        if($user_info['count']==0) {
            $last_updated = "By Unknown User on ".date_format(date_create_from_format('Y-m-d', $director['last_updated_on']), 'd-m-Y');
        }
        else {
            $last_updated = "By $user_info[name] on ".date_format(date_create_from_format('Y-m-d', $director['last_updated_on']), 'd-m-Y');
        }
        $director['appointment_date'] = date_format(date_create_from_format('Y-m-d', $director['appointment_date']), 'd-m-Y');
        if($director['resignation_date']='0000-00-00') {
            $director['resignation_date'] = "";
        }
        else {
            $director['resignation_date'] = date_format(date_create_from_format('Y-m-d', $director['resignation_date']), 'd-m-Y');
        }
        $director_details.="<tr><td>$director[din_no]</td><td>$director[dir_name]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='appointment_date'>$director[appointment_date]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='resignation_date'>$director[resignation_date]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='current_tenure'>$director[current_tenure]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='total_association'>$director[total_association]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='company_classification'>$director[company_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='ses_classification'>$director[ses_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='additional_classification'>$director[additional_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='audit_committee'>$director[audit_committee]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='investor_grievance'>$director[investor_grievance]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='remuneration'>$director[remuneration]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='nomination'>$director[nomination]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='csr'>$director[csr]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='risk_management_committee'>$director[risk_management_committee]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='shares_held'>$director[shares_held]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='esops'>$director[esops]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='other_pecuniary_relationship'>$director[other_pecuniary_relationship]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_directorship_public'>$director[no_directorship_public]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_total_directorship'>$director[no_total_directorship]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_directorship_listed_companies'>$director[no_directorship_listed_companies]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='committee_memberships'>$director[committee_memberships]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='committee_chairmanships'>$director[committee_chairmanships]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='expertise'>$director[expertise]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='education'>$director[education]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='ratio_to_mre'>$director[ratio_to_mre]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='retiring_non_retiring'>$director[retiring_non_retiring]</td><td>$last_updated</td></tr>";
    }
    $director_details.="</tbody>";
}
else {
    $director_details.="<thead>
                        <tr><th>DIN</th><th>Name</th><th>Appointment Date</th><th>Resignation Date</th><th>Current Tenure</th><th>Total Association</th><th>Company Classification</th><th>SES Classification</th><th>Additional Classification</th><th>Audit Committee</th><th>Stackholders Relationship</th><th>Nomination and Remuneration</th><th>CSR</th><th>Risk Management</th><th>Shares Held</th><th>ESOPs</th><th>Other Pecuniary Relationship</th><th>No. of Public Directorship</th><th>No. of total Directorship</th><th>No. of Directorship in listed companies</th><th>Committee Memberships</th><th>Committee Chairmanships</th><th>Expertise</th><th>Education</th><th>Ratio to MRE</th><th>Retiring/Non Retiring</th><th>Last Updated</th></tr>
                    </thead>
                    <tbody>";
    foreach($directors as $director) {
        $user_info= $db->getUserInfo($director['updated_by']);
        if($user_info['count']==0) {
            $last_updated = "By Unknown User on ".date_format(date_create_from_format('Y-m-d', $director['last_updated_on']), 'd-m-Y');
        }
        else {
            $last_updated = "By $user_info[name] on ".date_format(date_create_from_format('Y-m-d', $director['last_updated_on']), 'd-m-Y');
        }
        $director['appointment_date'] = date_format(date_create_from_format('Y-m-d', $director['appointment_date']), 'd-m-Y');
        if($director['resignation_date']='0000-00-00') {
            $director['resignation_date'] = "";
        }
        else {
            $director['resignation_date'] = date_format(date_create_from_format('Y-m-d', $director['resignation_date']), 'd-m-Y');
        }
        $director_details.="<tr><td>$director[din_no]</td><td>$director[dir_name]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='appointment_date'>$director[appointment_date]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='resignation_date'>$director[resignation_date]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='current_tenure'>$director[current_tenure]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='total_association'>$director[total_association]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='company_classification'>$director[company_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='ses_classification'>$director[ses_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='additional_classification'>$director[additional_classification]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='audit_committee'>$director[audit_committee]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='investor_grievance'>$director[investor_grievance]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='nomination_remuneration'>$director[nomination_remuneration]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='csr'>$director[csr]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='risk_management_committee'>$director[risk_management_committee]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='shares_held'>$director[shares_held]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='esops'>$director[esops]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='other_pecuniary_relationship'>$director[other_pecuniary_relationship]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_directorship_public'>$director[no_directorship_public]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_total_directorship'>$director[no_total_directorship]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='no_directorship_listed_companies'>$director[no_directorship_listed_companies]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='committee_memberships'>$director[committee_memberships]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='committee_chairmanships'>$director[committee_chairmanships]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='expertise'>$director[expertise]</td><td class='editable' data-table-name='directors' data-table-row-id='$director[director_table_id]' data-table-col-name='education'>$director[education]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='ratio_to_mre'>$director[ratio_to_mre]</td><td class='editable' data-table-name='director_info' data-table-row-id='$director[director_info_table_id]' data-table-col-name='retiring_non_retiring'>$director[retiring_non_retiring]</td><td>$last_updated</td></tr>";
    }
    $director_details.="</tbody>";
}
$director_remuneration_info = $db->getCompanyDirectorsRemunerationDetails($_GET['company_id'],$_GET['financial_year']);
$director_agm_info = $db->getCompanyDirectorsAGMDetails($_GET['company_id'],$_GET['financial_year']);
$director_board_attendance_info = $db->getCompanyDirectorsBoardAttendance($_GET['company_id'],$_GET['financial_year']);

$audit_committee_attendance_info = $db->getCompanyAuditCommitteeAttendance($_GET['company_id'],$_GET['financial_year'],$directors);
$stackholders_committee_attendance_info = $db->getCompanyStackholdersCosmmitteeAttendance($_GET['company_id'],$_GET['financial_year'],$directors);
$csr_committee_attendance_info = $db->getCompanyCSRCosmmitteeAttendance($_GET['company_id'],$_GET['financial_year'],$directors);
$risk_management_committee_attendance_info = $db->getCompanyRiskManagementCosmmitteeAttendance($_GET['company_id'],$_GET['financial_year'],$directors);
$is_rem_nom_same = $generic_array['are_committees_seperate']=='yes' ? 'no' : 'yes';
$generic_array = $db->getRemunerationNominationCommitteeAttendance($_GET['company_id'],$_GET['financial_year'],$is_rem_nom_same,$directors);

$audit_fee_details = $db->getAuditFeeInfo($_GET['company_id'],$_GET['financial_year']);
$auditors_detail = $db->getAuditorDetails($_GET['company_id'],$_GET['financial_year']);
$dividend_info = $db->getDividendInfoViewSheet($_GET['company_id'],$_GET['financial_year']);
$comments = $db->getInputSheetComments($_GET['company_id'],$_GET['financial_year']);

if($are_committees_seperate=='no') {
    echo json_encode(array(
        'director_details'=>$director_details,
        'director_remuneration_info'=>$director_remuneration_info,
        'director_agm_info'=>$director_agm_info,
        'director_board_attendance_info'=>$director_board_attendance_info,
        'audit_committee_attendance_info'=>$audit_committee_attendance_info,
        'stackholders_committee_attendance_info'=>$stackholders_committee_attendance_info,
        'csr_committee_attendance_info'=>$csr_committee_attendance_info,
        'risk_management_committee_attendance_info'=>$risk_management_committee_attendance_info,
        'nomination_remuneration_committee_attendance_info'=>$generic_array['nomination_remuneration_details'],
        'is_rem_nom_same'=>true,
        'audit_fee_details'=>$audit_fee_details,
        'auditors_detail'=>$auditors_detail,
        'dividend_info'=>$dividend_info,
        'fiscal_year'=>$fiscal_year,
        'comments'=>$comments,
    ));
}
else {
    echo json_encode(array(
        'director_details'=>$director_details,
        'director_remuneration_info'=>$director_remuneration_info,
        'director_agm_info'=>$director_agm_info,
        'director_board_attendance_info'=>$director_board_attendance_info,
        'audit_committee_attendance_info'=>$audit_committee_attendance_info,
        'stackholders_committee_attendance_info'=>$stackholders_committee_attendance_info,
        'csr_committee_attendance_info'=>$csr_committee_attendance_info,
        'risk_management_committee_attendance_info'=>$risk_management_committee_attendance_info,
        'nomination_committee_attendance_info'=>$generic_array['nomination_details'],
        'remuneration_committee_attendance_info'=>$generic_array['remuneration_details'],
        'is_rem_nom_same'=>false,
        'audit_fee_details'=>$audit_fee_details,
        'auditors_detail'=>$auditors_detail,
        'dividend_info'=>$dividend_info,
        'fiscal_year'=>$fiscal_year,
        'comments'=>$comments
    ));
}
?>