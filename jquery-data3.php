<?php
require_once('config.php');
include_once("Classes/databasereport3.php");
include_once("assets/database/Connect.php");
include_once("assets/config/config.php");
include_once("assets/functions.php");

if(isset($_GET['ED_Info'])) {
    $db = new DatabaseReports();
    $din_no=$_GET['Din_no'];
    $response = $db->getEDDirectorsInfo($din_no);
    echo json_encode($response);
}
elseif(isset($_GET['DirectorRemunerationInfo'])) {
    $db= new DatabaseReports();
    $din_no=$_GET['Din_no'];
    $company_id=1;
    $response= $db->getRemuniration_Info($din_no,$company_id);
    echo json_encode($response);
}
elseif(isset($_GET['Directors_performance'])) {
    $db= new DatabaseReports();
    $din_no=$_GET['Din_no'];
    $company_id=1;
    $response= $db->getDirectorPerformanceInfo($din_no,$company_id);
    echo json_encode($response);
}
elseif(isset($_GET['Remuniration_Info'])) {
    $db= new DatabaseReports();
    $din_no=$_GET['Din_no'];
    session_start();
    $company_id=$_SESSION['company_id'];
    $response= $db->getDirectorRemunerationInfo($din_no,$company_id);
    echo json_encode($response);
}
elseif(isset($_GET['executive_remuneration_peer_comparision'])) {
    $db= new DatabaseReports();
    $din_no=$_GET['din_no'];
    session_start();
    $company_id=$_SESSION['company_id'];
    $response= $db->getExecutiveRemunerationPeerComparisonData($din_no,$company_id);
    echo json_encode($response);
}
?>