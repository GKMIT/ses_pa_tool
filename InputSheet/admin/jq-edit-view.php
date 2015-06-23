<?php
include_once("../../Classes/database.php");
$db=new Database();
$response = $db->updateViewSheetValue($_POST);
echo json_encode($response);
?>