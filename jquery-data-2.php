<?php
include_once("Classes/databasereport.php");
if(isset($_GET['company_dividend_info'])) {
    $db = new DatabaseReports();
    session_start();
    if(empty($_GET['company_id'])) {
        $company_id= $_SESSION['company_id'];
    }
    else {
        $company_id= $_GET['company_id'];
    }
    $financial_year = $_GET['financial_year'];
    $response = $db->getCompanyDividendData($company_id,$financial_year);
    echo json_encode($response);
}
elseif(isset($_GET['company_dividend_info'])) {
    $db = new DatabaseReports();
    session_start();
    if(empty($_GET['company_id'])) {
        $company_id= $_SESSION['company_id'];
    }
    else {
        $company_id= $_GET['company_id'];
    }
    $financial_year = $_GET['financial_year'];
    $response = $db->getCompanyDividendData($company_id,$financial_year);
    echo json_encode($response);
}
elseif(isset($_GET['dividend_data_5_years'])) {
    $db = new DatabaseReports();
    session_start();
    $company_id = $_SESSION['company_id'];
    $start_year = $_GET['first_year'];
    $response = $db->getLast5YearsDividendData($company_id,$start_year);
    echo json_encode($response);
}
?>