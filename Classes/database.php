<?php
require_once('db-config.php');
class Database {
	private $error_image = "../../assets/img/symbols-critical-icon.png";
	private $success_image = "../../assets/img/info-icon.png";
	function getAllDirectors() {
		$array_directors = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors`");
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$array_directors[]=$row;
		}
		$dbobject = null;
		return $array_directors;
	}
	function getAllCompanies() {
		$array_companies = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `companies`");
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$array_companies[]=$row;
		}
		$dbobject = null;
		return $array_companies;
	}
	function isDirectorExists($din_no) {
		$director_exists = false;
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `id` from `directors` where `din_no`=:din_no");
		$stmt->bindParam(':din_no', $din_no);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$director_exists=true;
		}
		$stmt->execute();
		$dbobject = null;
		return $director_exists;
	}
	function inputSheetDuplicateCheck($company_id,$financial_year) {
		$sheet_exists = false;
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `id` from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id', $company_id);
		$stmt->bindParam(':financial_year', $financial_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$sheet_exists=true;
		}
		$stmt->execute();
		$dbobject = null;
		return $sheet_exists;
	}
	function checkLogin($info,$base_url) {
		$response = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `login` where `user_name`=:user_name and `password`=:password and `user_type`=:user_type");
		$stmt->bindParam(':user_name', $info['user_name']);
		$stmt->bindParam(':password', $info['password']);
		$stmt->bindParam(':user_type', $info['user_type']);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			session_start();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$response['redirect_url']=$base_url.$row['redirect_url'];
			$_SESSION['name']=$row['name'];
			$_SESSION['user_id']=$row['id'];
			$_SESSION['logged_in']=true;
			$_SESSION['user_type']=$info['user_type'];
			$response['status']=200;
		}
		else {
			$response['status']=401;
		}
		$dbobject = null;
		return $response;
	}
	function updateViewSheetValue($info) {
		$response=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare(" update `$info[table_name]` set `$info[column_name]`=:column_value where `id`=:table_row_id");
		$stmt->bindParam(':column_value', $info['column_value']);
		$stmt->bindParam(':table_row_id', $info['table_row_id']);
		if($stmt->execute()) {

			if($info['table_name']=='company_auditors_info') {
				$stmt=$dbobject->prepare("select * from `company_auditors_info` where `id`=:table_row_id");
				$stmt->bindParam(':table_row_id', $info['table_row_id']);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$sum = $row['audit_fee']+$row['audit_related_fee']+$row['non_audit_fee'];
				$stmt=$dbobject->prepare(" update `company_auditors_info` set `total_auditors_fee`=:total_auditors_fee where `id`=:table_row_id");
				$stmt->bindParam(":total_auditors_fee",$sum);
				$stmt->bindParam(':table_row_id', $info['table_row_id']);
				$stmt->execute();
			}

			$response['status']=200;
			$response['title']="Success";
			$response['msg']="Value Updated successfully";
			$response['image']=$this->success_image;
		}
		else {
			$response['status']=500;
			$response['title']="Error";
			$response['msg']="Error in saving Info";
			$response['image']=$this->error_image;
		}
		$dbobject = null;
		return $response;
	}
	function isCompanyExists($cin) {
		$company_exists = false;
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `id` from `companies` where `cin`=:cin");
		$stmt->bindParam(':cin', $cin);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$company_exists=true;
		}
		$stmt->execute();
		$dbobject = null;
		return $company_exists;
	}
	function registerNewDirector($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `id` from `directors` where `din_no`=:din_no");
		$stmt->bindParam(':din_no', $info['din_no']);
		$stmt->execute();
		if(!($stmt->rowCount()>0)) {
			$stmt=$dbobject->prepare(" insert into `directors` (`din_no`,`salutation`,`dir_name`,`gender`,`dob`,`expertise`,`education`,`past_ex`,`committee_memberships`,`committee_chairmanships`,`no_directorship_public`,`no_directorship_private`,`no_directorship_listed_companies`,`no_total_directorship`,`no_full_time_positions`) values(:din_no,:salutation,:dir_name,:gender,:dob,:expertise,:education,:past_ex,:committee_memberships,:committee_chairmanships,:no_directorship_public,:no_directorship_private,:no_directorship_listed_companies,:no_total_directorship,:no_full_time_positions)");
			$stmt->bindParam(':din_no', $info['din_no']);
			$stmt->bindParam(':salutation', $info['salutation']);
			$stmt->bindParam(':dir_name', $info['dir_name']);
			$stmt->bindParam(':gender', $info['gender']);
			$stmt->bindParam(':dob', $info['dob']);
			$stmt->bindParam(':expertise', $info['expertise']);
			$stmt->bindParam(':education', $info['education']);
			$stmt->bindParam(':past_ex', $info['past_ex']);
			$stmt->bindParam(':committee_memberships', $info['committee_memberships']);
			$stmt->bindParam(':committee_chairmanships', $info['committee_chairmanships']);
			$stmt->bindParam(':no_directorship_public', $info['no_directorship_public']);
			$stmt->bindParam(':no_directorship_private', $info['no_directorship_private']);
			$stmt->bindParam(':no_directorship_listed_companies', $info['no_directorship_listed_companies']);
			$stmt->bindParam(':no_total_directorship', $info['no_total_directorship']);
			$stmt->bindParam(':no_full_time_positions', $info['no_full_time_positions']);
			if($stmt->execute()) {
				$status['title']="Success";
				$status['msg']="Director Registered Successfully";
				$status['image']=$this->success_image;
			}
			else {
				$status['title']="Error";
				$status['msg']="Error in Director Registration";
				$status['image']=$this->error_image;
			}
		}
		else {
			$status['title']="Error";
			$status['msg']="Director Exists";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function registerNewDirectorSheet($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `id` from `directors` where `din_no`=:din_no");
		$stmt->bindParam(':din_no', $info['din_no']);
		$stmt->execute();
		if(!($stmt->rowCount()>0)) {
			$stmt=$dbobject->prepare(" insert into `directors` (`din_no`,`dir_name`,`expertise`,`education`) values(:din_no,:dir_name,:expertise,:education)");
			$stmt->bindParam(':din_no', $info['din_no']);
			$stmt->bindParam(':dir_name', $info['dir_name']);
			$stmt->bindParam(':expertise', $info['expertise']);
			$stmt->bindParam(':education', $info['education']);
			if($stmt->execute()) {
				$status['title']="Success";
				$status['msg']="Director Registered Successfully";
				$status['image']=$this->success_image;
			}
			else {
				$status['title']="Error";
				$status['msg']="Error in Director Registration";
				$status['image']=$this->error_image;
			}
		}
		else {
			$status['title']="Error";
			$status['msg']="Director Exists";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function addDividendInfo($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare(" insert into `dividend_info` (`company_id`,`financial_year`,`dividend`,`market_price_start`,`market_price_end`,`eps`) values(:company_id,:financial_year,:dividend,:market_price_start,:market_price_end,:eps)");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':financial_year', $info['financial_year']);
		$stmt->bindParam(':dividend', $info['dividend']);
		$stmt->bindParam(':market_price_start', $info['market_price_start']);
		$stmt->bindParam(':market_price_end', $info['market_price_end']);
		$stmt->bindParam(':eps', $info['eps']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Dividend Info saved successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Error in saving Info";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function updateDividendInfo($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare(" update `dividend_info` set `market_price_start`=:market_price_start, `market_price_end`=:market_price_end, `dividend`=:dividend, `eps`=:eps where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':financial_year', $info['financial_year']);
		$stmt->bindParam(':dividend', $info['dividend']);
		$stmt->bindParam(':market_price_start', $info['market_price_start']);
		$stmt->bindParam(':market_price_end', $info['market_price_end']);
		$stmt->bindParam(':eps', $info['eps']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Dividend Info updated successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Error in saving Info";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function editDirector($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare(" update `directors` set `din_no`=:din_no, `salutation`=:salutation, `dir_name`=:dir_name,`gender`=:gender,`dob`=:dob,`expertise`=:expertise,`education`=:education,`past_ex`=:past_ex,`committee_memberships`=:committee_memberships,`committee_chairmanships`=:committee_chairmanships,`no_directorship_public`=:no_directorship_public,`no_directorship_private`=:no_directorship_private,`no_directorship_listed_companies`=:no_directorship_listed_companies,`no_total_directorship`=:no_total_directorship,`no_full_time_positions`=:no_full_time_positions where `id`=:id");
		$stmt->bindParam(':din_no', $info['din_no']);
		$stmt->bindParam(':salutation', $info['salutation']);
		$stmt->bindParam(':dir_name', $info['dir_name']);
		$stmt->bindParam(':gender', $info['gender']);
		$stmt->bindParam(':dob', $info['dob']);
		$stmt->bindParam(':expertise', $info['expertise']);
		$stmt->bindParam(':education', $info['education']);
		$stmt->bindParam(':past_ex', $info['past_ex']);
		$stmt->bindParam(':committee_memberships', $info['committee_memberships']);
		$stmt->bindParam(':committee_chairmanships', $info['committee_chairmanships']);
		$stmt->bindParam(':no_directorship_public', $info['no_directorship_public']);
		$stmt->bindParam(':no_directorship_private', $info['no_directorship_private']);
		$stmt->bindParam(':no_directorship_listed_companies', $info['no_directorship_listed_companies']);
		$stmt->bindParam(':no_total_directorship', $info['no_total_directorship']);
		$stmt->bindParam(':no_full_time_positions', $info['no_full_time_positions']);
		$stmt->bindParam(':id', $info['director_id']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Director Registered Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Director Exists";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function registerDirectorInfo($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		if($info['is_nom_rem_separate']=='yes') {
			$stmt=$dbobject->prepare("insert into `director_info` (`company_id`, `dir_din_no`, `appointment_date`, `resignation_date`, `current_tenure`, `total_association`, `company_classification`,`ses_classification`, `additional_classification`, `audit_committee`, `investor_grievance` ,`remuneration`, `nomination`,`csr`,`risk_management_committee`, `shares_held`, `esops`, `other_pecuniary_relationship`,`retiring_non_retiring`,`ratio_to_mre`,`financial_year`,`comments`,`last_updated_on`,`updated_by`) VALUES (:company_id, :dir_din_no, :appointment_date, :resignation_date, :current_tenure, :total_association, :company_classification,:ses_classification, :additional_classification, :audit_committee, :investor_grievance, :remuneration, :nomination,:csr,:risk_management_committee, :shares_held, :esops, :other_pecuniary_relationship,:retiring_non_retiring,:ratio_to_mre,:financial_year,:comments,:last_updated_on,:updated_by)");
			$stmt->bindParam(':remuneration',$info['remuneration']);
			$stmt->bindParam(':nomination',$info['nomination']);
		}
		else {
			$stmt=$dbobject->prepare("insert into `director_info` (`company_id`, `dir_din_no`, `appointment_date`, `resignation_date`, `current_tenure`, `total_association`, `company_classification`,`ses_classification`, `additional_classification`, `audit_committee`, `investor_grievance` ,`nomination_remuneration`,`csr`,`risk_management_committee`, `shares_held`, `esops`, `other_pecuniary_relationship`,`retiring_non_retiring`,`ratio_to_mre`,`financial_year`,`comments`,`last_updated_on`,`updated_by`) VALUES (:company_id, :dir_din_no, :appointment_date, :resignation_date, :current_tenure, :total_association, :company_classification,:ses_classification, :additional_classification, :audit_committee, :investor_grievance, :nomination_remuneration,:csr,:risk_management_committee, :shares_held, :esops, :other_pecuniary_relationship,:retiring_non_retiring,:ratio_to_mre,:financial_year,:comments,:last_updated_on,:updated_by)");
			$stmt->bindParam(":nomination_remuneration",$info['nomination_remuneration']);
		}
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':appointment_date',$info['appointment_date']);
		$stmt->bindParam(':resignation_date',$info['resignation_date']);
		$stmt->bindParam(':current_tenure',$info['current_tenure']);
		$stmt->bindParam(':total_association',$info['total_association']);
		$stmt->bindParam(':company_classification',$info['company_classification']);
		$stmt->bindParam(':ses_classification',$info['ses_classification']);
		$stmt->bindParam(':additional_classification',$info['additional_classification']);
		$stmt->bindParam(':audit_committee',$info['audit_committee']);
		$stmt->bindParam(':investor_grievance',$info['investor_grievance']);
		$stmt->bindParam(':csr',$info['csr']);
		$stmt->bindParam(':risk_management_committee',$info['risk_management_committee']);
		$stmt->bindParam(':shares_held',$info['shares_held']);
		$stmt->bindParam(':esops',$info['esops']);
		$stmt->bindParam(':other_pecuniary_relationship',$info['other_pecuniary_relationship']);
		$stmt->bindParam(':retiring_non_retiring',$info['retiring_non_retiring']);
		$stmt->bindParam(':ratio_to_mre',$info['ratio_to_mre']);
		$stmt->bindParam(':financial_year',$info['financial_year']);
		$stmt->bindParam(':comments',$info['comments']);
		date_default_timezone_get("Asia/Kolkata");
		$today = date('Y-m-d');
		$stmt->bindParam(':last_updated_on',$today);
		$stmt->bindParam(':updated_by',$_SESSION['user_id']);
		if($stmt->execute()) {
			if(!isset($info['hidden_nom_rem'])) {
				$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_info` where `financial_year`=:financial_year and `company_id`=:company_id");
				$stmt->bindParam(":financial_year",$info['financial_year']);
				$stmt->bindParam(":company_id",$info['company_id']);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$stmt=$dbobject->prepare("update `nomination_remuneration_committee_info` set `are_committees_seperate`=:are_committees_seperate where `company_id`=:company_id and `financial_year`=:financial_year");
					$stmt->bindParam(':are_committees_seperate',$info['is_nom_rem_separate']);
					$stmt->bindParam(':company_id',$info['company_id']);
					$stmt->bindParam(':financial_year',$info['financial_year']);
					$stmt->execute();
				}
				else {
					$stmt=$dbobject->prepare("insert into `nomination_remuneration_committee_info` (`company_id`,`financial_year`,`are_committees_seperate`) values (:company_id ,:financial_year,:are_committees_seperate)");
					$stmt->bindParam(':are_committees_seperate',$info['is_nom_rem_separate']);
					$stmt->bindParam(':company_id',$info['company_id']);
					$stmt->bindParam(':financial_year',$info['financial_year']);
					$stmt->execute();
				}
			}
			$status['title']="Success";
			$status['msg']="Director Info saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Error Occured";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function deleteAttendance($company_id,$dir_din_no,$att_year,$table_name) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("update `$table_name` set `attended`=:attended, `held`=:held  where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$clear_type=0;
		$stmt->bindParam(':attended',$clear_type);
		$stmt->bindParam(':held',$clear_type);
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		if($stmt->execute()) {
			$dbobject=null;
			return true;
		}
		else {
			$dbobject=null;
			return false;
		}

	}
	function editDirectorInfo($info) {
		$status=array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		if($info['is_nom_rem_separate']=='yes') {
			$stmt=$dbobject->prepare("update `director_info` set `appointment_date`=:appointment_date, `resignation_date`=:resignation_date, `current_tenure`=:current_tenure, `total_association`=:total_association, `company_classification`=:company_classification,`ses_classification`=:ses_classification, `additional_classification`=:additional_classification, `audit_committee`=:audit_committee, `investor_grievance`=:investor_grievance,`remuneration`=:remuneration, `nomination`=:nomination,`csr`=:csr,`risk_management_committee`=:risk_management_committee ,`shares_held`=:shares_held, `esops`=:esops, `other_pecuniary_relationship`=:other_pecuniary_relationship,`retiring_non_retiring`=:retiring_non_retiring,`ratio_to_mre`=:ratio_to_mre,`comments`=:comments,`last_updated_on`=:last_updated_on, `updated_by`=:updated_by where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
			$stmt->bindParam(':remuneration',$info['remuneration']);
			$stmt->bindParam(':nomination',$info['nomination']);
		}
		else {
			$stmt=$dbobject->prepare("update `director_info` set `appointment_date`=:appointment_date, `resignation_date`=:resignation_date, `current_tenure`=:current_tenure, `total_association`=:total_association, `company_classification`=:company_classification,`ses_classification`=:ses_classification, `additional_classification`=:additional_classification, `audit_committee`=:audit_committee, `investor_grievance`=:investor_grievance,`nomination_remuneration`=:nomination_remuneration,`csr`=:csr,`risk_management_committee`=:risk_management_committee ,`shares_held`=:shares_held, `esops`=:esops, `other_pecuniary_relationship`=:other_pecuniary_relationship,`retiring_non_retiring`=:retiring_non_retiring,`ratio_to_mre`=:ratio_to_mre,`comments`=:comments,`last_updated_on`=:last_updated_on, `updated_by`=:updated_by where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
			$stmt->bindParam(":nomination_remuneration",$info['nomination_remuneration']);
		}
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':financial_year',$info['financial_year']);
		$stmt->bindParam(':appointment_date',$info['appointment_date']);
		$stmt->bindParam(':resignation_date',$info['resignation_date']);
		$stmt->bindParam(':current_tenure',$info['current_tenure']);
		$stmt->bindParam(':total_association',$info['total_association']);
		$stmt->bindParam(':company_classification',$info['company_classification']);
		$stmt->bindParam(':ses_classification',$info['ses_classification']);
		$stmt->bindParam(':additional_classification',$info['additional_classification']);
		$stmt->bindParam(':audit_committee',$info['audit_committee']);
		$stmt->bindParam(':investor_grievance',$info['investor_grievance']);
		$stmt->bindParam(':csr',$info['csr']);
		$stmt->bindParam(':risk_management_committee',$info['risk_management_committee']);
		$stmt->bindParam(':shares_held',$info['shares_held']);
		$stmt->bindParam(':esops',$info['esops']);
		$stmt->bindParam(':other_pecuniary_relationship',$info['other_pecuniary_relationship']);
		$stmt->bindParam(':retiring_non_retiring',$info['retiring_non_retiring']);
		$stmt->bindParam(':ratio_to_mre',$info['ratio_to_mre']);
		$stmt->bindParam(':comments',$info['comments']);
		date_default_timezone_get("Asia/Kolkata");
		$today = date('Y-m-d');
		$stmt->bindParam(':last_updated_on',$today);
		$stmt->bindParam(':updated_by',$_SESSION['user_id']);
		if($stmt->execute()) {

			// deleting attendance

			if($info['audit_committee']!="C" && $info['audit_committee']!="M") {
				$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"audit_committee_attendance");
			}
			if($info['investor_grievance']!="C" && $info['investor_grievance']!="M") {
				$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"investors_grievance_attendance");
			}
			if($info['investor_grievance']!="C" && $info['investor_grievance']!="M") {
				$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"investors_grievance_attendance");
			}
			if($info['is_nom_rem_separate']=="yes") {
				if($info['remuneration']!="C" && $info['remuneration']!="M") {
					$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"remuneration_committee_attendance");
				}
				if($info['nomination']!="C" && $info['nomination']!="M") {
					$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"nomination_committee_attendance");
				}
			}
			else {
				if($info['nomination_remuneration']!="C" && $info['nomination_remuneration']!="M") {
					$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"nomination_remuneration_committee_attendance");
				}
			}
			if($info['csr']!="C" && $info['csr']!="M") {
				$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"csr_committee_meetings_attendance");
			}
			if($info['risk_management_committee']!="C" && $info['risk_management_committee']!="M") {
				$this->deleteAttendance($info['company_id'],$info['dir_din_no'],$info['financial_year'],"risk_management_committee_meetings_attendance");
			}

			if(!isset($info['hidden_nom_rem'])) {
				$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_info` where `financial_year`=:financial_year and `company_id`=:company_id");
				$stmt->bindParam(":financial_year",$info['financial_year']);
				$stmt->bindParam(":company_id",$info['company_id']);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$stmt=$dbobject->prepare("update `nomination_remuneration_committee_info` set `are_committees_seperate`=:are_committees_seperate where `company_id`=:company_id and `financial_year`=:financial_year");
					$stmt->bindParam(':are_committees_seperate',$info['is_nom_rem_separate']);
					$stmt->bindParam(':company_id',$info['company_id']);
					$stmt->bindParam(':financial_year',$info['financial_year']);
					$stmt->execute();
				}
				else {
					$stmt=$dbobject->prepare("insert into `nomination_remuneration_committee_info` (`company_id`,`financial_year`,`are_committees_seperate`) values (:company_id ,:financial_year,:are_committees_seperate)");
					$stmt->bindParam(':are_committees_seperate',$info['is_nom_rem_separate']);
					$stmt->bindParam(':company_id',$info['company_id']);
					$stmt->bindParam(':financial_year',$info['financial_year']);
					$stmt->execute();
				}
			}
			$status['title']="Success";
			$status['msg']="Director Info saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Error Occured";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function getDirectorInfo($company_id,$dir_din_no,$financial_year=0) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		if($financial_year==0)
			$stmt=$dbobject->prepare("select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no");
		else {
			$stmt=$dbobject->prepare("select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
			$financial_year = intval($financial_year)-1;
			$stmt->bindParam(":financial_year",$financial_year);
		}
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$director_details = $row = $stmt->fetch(PDO::FETCH_ASSOC);
			$director_details['row_count'] = $stmt->rowCount();
		}
		else {
			$director_details['row_count'] = 0;
		}
		$dbobject = null;
		return $director_details;
	}
	function getDirectorAttendanceDetails($company_id,$dir_din_no,$financial_year=0) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		if($financial_year!=0) {
			$stmt=$dbobject->prepare("select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
			$stmt->bindParam(':company_id',$company_id);
			$stmt->bindParam(':dir_din_no',$dir_din_no);
			$stmt->bindParam(':financial_year',$financial_year);
		}
		else {
			$stmt=$dbobject->prepare("select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no");
			$stmt->bindParam(':company_id',$company_id);
			$stmt->bindParam(':dir_din_no',$dir_din_no);
		}
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$director_details=$row;
		$dbobject = null;
		return $director_details;
	}
	function areNominationRemunerationSame($company_id,$financial_year) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$dbobject=null;
		return $row;
	}
	function getCompanyAuditorsInfo($company_id,$financial_year) {
		$array_generic = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$array_generic['count']=1;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['company_auditors_info_id'] = $id = $row['id'];
			$array_generic['no_of_auditors'] = $row['no_of_auditors'];
			$array_generic['net_profit'] = $row['net_profit'];
			$array_generic['audit_fee'] = $row['audit_fee'];
			$array_generic['audit_related_fee'] = $row['audit_related_fee'];
			$array_generic['non_audit_fee'] = $row['non_audit_fee'];
			$array_generic['total_auditors_fee'] = $row['total_auditors_fee'];
			$array_generic['comments'] = $row['comments'];
			$stmt=$dbobject->prepare("select * from `company_auditors_details` where `company_auditor_info_id`=:company_auditor_info_id");
			$stmt->bindParam(':company_auditor_info_id',$id);
			$stmt->execute();
			$array_auditor_details= array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$array_auditor_details[] = $row;
			}
			$array_generic['auditor_details'] = $array_auditor_details;
		}
		else {
			$array_generic['count']=0;
		}
		$dbobject=null;
		return $array_generic;
	}
	function getDirectorAttendanceValues($company_id,$dir_din_no,$att_year) {
		$array_generic = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);


		$agm_year = intval($att_year-1);
		$stmt=$dbobject->prepare("select * from `director_agm_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$agm_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['agm_attended'] = $row['attended'];
			$array_generic['count']=1;
		}
		else {
			$array_generic['agm_attended'] = array();
			$array_generic['count']=0;
		}
		$stmt=$dbobject->prepare("select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$array_generic['board_meetings_attended'] = $row['attended'];
		$array_generic['board_meetings_held'] = $row['held'];

		$stmt=$dbobject->prepare("select * from `director_remuneration` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:rem_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':rem_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['variable_pay'] = $row['variable_pay'];
			$array_generic['fixed_pay'] = $row['fixed_pay'];
			$array_generic['count']=1;
		}
		else {
			$array_generic['variable_pay'] = 0;
			$array_generic['fixed_pay'] = 0;
			$array_generic['count']=0;
		}
		$stmt=$dbobject->prepare("select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['audit_committee_meetings_attended'] = $row['attended'];
			$array_generic['audit_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['audit_committee_meetings_attended'] = "";
			$array_generic['audit_committee_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `investors_grievance_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['investors_grievance_meetings_attended'] = $row['attended'];
			$array_generic['investors_grievance_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['investors_grievance_meetings_attended'] = "";
			$array_generic['investors_grievance_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `csr_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['csr_committee_meetings_attended'] = $row['attended'];
			$array_generic['csr_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['csr_committee_meetings_attended'] = "";
			$array_generic['csr_committee_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `risk_management_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['risk_management_committee_meetings_attended'] = $row['attended'];
			$array_generic['risk_management_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['risk_management_committee_meetings_attended'] = "";
			$array_generic['risk_management_committee_meetings_held'] = "";
		}


		$stmt=$dbobject->prepare("select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['nomination_committee_meetings_attended'] = $row['attended'];
			$array_generic['nomination_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['nomination_committee_meetings_attended'] = "";
			$array_generic['nomination_committee_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['nomination_remuneration_committee_meetings_attended'] = $row['attended'];
			$array_generic['nomination_remuneration_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['nomination_remuneration_committee_meetings_attended'] = "";
			$array_generic['nomination_remuneration_committee_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$array_generic['remuneration_committee_meetings_attended'] = $row['attended'];
			$array_generic['remuneration_committee_meetings_held'] = $row['held'];
		}
		else {
			$array_generic['remuneration_committee_meetings_attended'] = "";
			$array_generic['remuneration_committee_meetings_held'] = "";
		}

		$stmt=$dbobject->prepare("select * from `input_sheet_comments` where `company_id`=:company_id and `din_no`=:dir_din_no and `financial_year`=:att_year and `used_in`=:used_in");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':dir_din_no',$dir_din_no);
		$stmt->bindParam(':att_year',$att_year);
		$used_in = "Director's Attendance and Remuneration";
		$stmt->bindParam(':used_in',$used_in);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$array_generic['comments'] = $row['comments'];

		$dbobject = null;
		return $array_generic;
	}
	function registerDirectorRemuneration($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `director_remuneration` (`company_id`, `dir_din_no`, `rem_year`, `variable_pay`, `fixed_pay`) VALUES (:company_id,:dir_din_no,:rem_year,:variable_pay,:fixed_pay)");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':rem_year',$info['rem_year']);
		$stmt->bindParam(':variable_pay',$info['variable_pay']);
		$stmt->bindParam(':fixed_pay',$info['fixed_pay']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Remuneration info saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function directorBoardAttendance($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `director_board_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$info['att_year']);
		$stmt->bindParam(':attended',$info['attended']);
		$stmt->bindParam(':held',$info['held']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Board Attendance saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function directorBoardPayAttendance($info) {

		$status = array();
		$dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
		$counter = 0;
		$stmt = $dbobject->prepare("insert into `director_board_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
		$stmt->bindParam(':att_year', $info['att_year']);
		$stmt->bindParam(':attended', $info['board_meetings_attended']);
		$stmt->bindParam(':held', $info['board_meetings_held']);
		if ($stmt->execute()) {
			$counter++;
		}

		$info['financial_year'] = $info['att_year'];

		$agm_att_year = intval($info['financial_year'])-1;

		$stmt = $dbobject->prepare("insert into `director_agm_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`) VALUES (:company_id,:dir_din_no,:att_year,:agm_attended)");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
		$stmt->bindParam(':att_year', $agm_att_year);
		$stmt->bindParam(':agm_attended', $info['agm_attended']);
		if ($stmt->execute()) {
			$counter++;
		}

		$stmt = $dbobject->prepare("insert into `director_remuneration` (`company_id`, `dir_din_no`, `rem_year`, `variable_pay`, `fixed_pay`) VALUES (:company_id,:dir_din_no,:rem_year,:variable_pay,:fixed_pay)");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
		$stmt->bindParam(':rem_year', $info['att_year']);
		$stmt->bindParam(':variable_pay', $info['variable_pay']);
		$stmt->bindParam(':fixed_pay', $info['fixed_pay']);
		if ($stmt->execute()) {
			$counter++;
		}

		if ($info['audit_committee_member'] == 'yes') {
			$stmt = $dbobject->prepare("insert into `audit_committee_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['audit_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['audit_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}

		if ($info['investors_grievance_committee_member'] == 'yes') {
			$stmt = $dbobject->prepare("insert into `investors_grievance_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['investors_grievance_meetings_attended']);
			$stmt->bindParam(':held', $info['investors_grievance_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}

		if ($info['csr_committee_member'] == 'yes') {
			$stmt = $dbobject->prepare("insert into `csr_committee_meetings_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['csr_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['csr_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}

		if ($info['risk_management_committee_member'] == 'yes') {
			$stmt = $dbobject->prepare("insert into `risk_management_committee_meetings_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['risk_management_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['risk_management_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}

		if (isset($info['rem_nom_same_committee']) && $info['rem_nom_same_committee'] == 'yes') {

			$stmt = $dbobject->prepare("insert into `nomination_remuneration_committee_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['remeneration_nomination_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['remeneration_nomination_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}
		elseif(isset($info['rem_nom_same_committee']) && $info['rem_nom_same_committee'] == 'no') {

			$stmt = $dbobject->prepare("insert into `nomination_committee_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['nomination_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['nomination_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}

			$stmt = $dbobject->prepare("insert into `remuneration_committee_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id', $info['company_id']);
			$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
			$stmt->bindParam(':att_year', $info['att_year']);
			$stmt->bindParam(':attended', $info['remeneration_committee_meetings_attended']);
			$stmt->bindParam(':held', $info['remeneration_committee_meetings_held']);
			if ($stmt->execute()) {
				$counter++;
			}
		}

		$stmt = $dbobject->prepare("insert into `input_sheet_comments` (`company_id`, `financial_year`,`din_no`,`used_in`,`comments`) VALUES (:company_id, :financial_year,:din_no,:used_in,:comments)");
		$stmt->bindParam(':company_id', $info['company_id']);
		$stmt->bindParam(':financial_year', $info['financial_year']);
		$stmt->bindParam(':din_no', $info['dir_din_no']);
		$used_in = "Director's Attendance and Remuneration";
		$stmt->bindParam(':used_in',$used_in);
		$stmt->bindParam(':comments', $info['comments']);
		$stmt->execute();

		$status['title'] = "Success";
		$status['msg'] = "Multiple data saved Successfully";
		$status['image'] = $this->success_image;
		$dbobject = null;
		return $status;
	}
	function directorBoardPayAttendanceEdit($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$counter = true;

		$stmt=$dbobject->prepare("select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$info['att_year']);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$stmt=$dbobject->prepare("update `director_board_attendance` set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->bindParam(':attended',$info['board_meetings_attended']);
			$stmt->bindParam(':held',$info['board_meetings_held']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}
		else {
			$stmt=$dbobject->prepare("insert into `director_board_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values ( :company_id,:dir_din_no,:att_year,:attended,:held)");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->bindParam(':attended',$info['board_meetings_attended']);
			$stmt->bindParam(':held',$info['board_meetings_held']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}

		$agm_year = intval($info['att_year'])-1;
		$stmt=$dbobject->prepare("select * from `director_agm_attendance`  where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$agm_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$stmt=$dbobject->prepare("update `director_agm_attendance` set `attended`=:attended where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$agm_year);
			$stmt->bindParam(':attended',$info['agm_attended']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}
		else {
			$stmt=$dbobject->prepare("insert into `director_agm_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`) values (:company_id,:dir_din_no,:att_year,:attended)");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$agm_year);
			$stmt->bindParam(':attended',$info['agm_attended']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}

		$stmt=$dbobject->prepare("select * from  `director_remuneration` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:rem_year");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':rem_year',$info['att_year']);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$stmt=$dbobject->prepare("update `director_remuneration` set `variable_pay`=:variable_pay, `fixed_pay`=:fixed_pay where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:rem_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':rem_year',$info['att_year']);
			$stmt->bindParam(':variable_pay',$info['variable_pay']);
			$stmt->bindParam(':fixed_pay',$info['fixed_pay']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}
		else {
			$stmt=$dbobject->prepare("insert into `director_remuneration` (`company_id`,`dir_din_no`,`rem_year`,`variable_pay`,`fixed_pay`) values (:company_id,:dir_din_no,:rem_year,:variable_pay,:fixed_pay)");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':rem_year',$info['att_year']);
			$stmt->bindParam(':variable_pay',$info['variable_pay']);
			$stmt->bindParam(':fixed_pay',$info['fixed_pay']);
			if(!$stmt->execute()) {
				$counter= false;
			}
		}
		if($info['audit_committee_member']=='yes') {

			$stmt=$dbobject->prepare("select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt=$dbobject->prepare("update `audit_committee_attendance`  set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['audit_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['audit_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `audit_committee_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['audit_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['audit_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
		}

		if($info['investors_grievance_committee_member']=='yes') {
			$stmt=$dbobject->prepare("select * from `investors_grievance_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt=$dbobject->prepare("update `investors_grievance_attendance`  set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['investors_grievance_meetings_attended']);
				$stmt->bindParam(':held',$info['investors_grievance_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `investors_grievance_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['investors_grievance_meetings_attended']);
				$stmt->bindParam(':held',$info['investors_grievance_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
		}

		if($info['csr_committee_member']=='yes') {
			$stmt=$dbobject->prepare("select * from `csr_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt = $dbobject->prepare("update `csr_committee_meetings_attendance`  set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id', $info['company_id']);
				$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
				$stmt->bindParam(':att_year', $info['att_year']);
				$stmt->bindParam(':attended', $info['csr_committee_meetings_attended']);
				$stmt->bindParam(':held', $info['csr_committee_meetings_held']);
				if (!$stmt->execute()) {
					$counter = false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `csr_committee_meetings_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['csr_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['csr_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
		}

		if($info['risk_management_committee_member']=='yes') {
			$stmt=$dbobject->prepare("select * from `risk_management_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt = $dbobject->prepare("update `risk_management_committee_meetings_attendance`  set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id', $info['company_id']);
				$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
				$stmt->bindParam(':att_year', $info['att_year']);
				$stmt->bindParam(':attended', $info['risk_management_committee_meetings_attended']);
				$stmt->bindParam(':held', $info['risk_management_committee_meetings_held']);
				if (!$stmt->execute()) {
					$counter = false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `risk_management_committee_meetings_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['risk_management_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['risk_management_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
		}

		if(isset($info['rem_nom_same_committee']) && $info['rem_nom_same_committee']=='yes') {

			$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt = $dbobject->prepare("update `nomination_remuneration_committee_attendance` set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id', $info['company_id']);
				$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
				$stmt->bindParam(':att_year', $info['att_year']);
				$stmt->bindParam(':attended', $info['remeneration_nomination_committee_meetings_attended']);
				$stmt->bindParam(':held', $info['remeneration_nomination_committee_meetings_held']);
				if (!$stmt->execute()) {
					$counter = false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `nomination_remuneration_committee_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['remeneration_nomination_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['remeneration_nomination_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}

		}
		elseif(isset($info['rem_nom_same_committee']) && $info['rem_nom_same_committee']=='no') {
			$stmt=$dbobject->prepare("select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt = $dbobject->prepare("update `nomination_committee_attendance` set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id', $info['company_id']);
				$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
				$stmt->bindParam(':att_year', $info['att_year']);
				$stmt->bindParam(':attended', $info['nomination_committee_meetings_attended']);
				$stmt->bindParam(':held', $info['nomination_committee_meetings_held']);
				if (!$stmt->execute()) {
					$counter = false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `nomination_committee_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['nomination_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['nomination_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
			$stmt=$dbobject->prepare("select * from `remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
			$stmt->bindParam(':company_id',$info['company_id']);
			$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
			$stmt->bindParam(':att_year',$info['att_year']);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$stmt = $dbobject->prepare("update `remuneration_committee_attendance` set `attended`=:attended, `held`=:held where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:att_year");
				$stmt->bindParam(':company_id', $info['company_id']);
				$stmt->bindParam(':dir_din_no', $info['dir_din_no']);
				$stmt->bindParam(':att_year', $info['att_year']);
				$stmt->bindParam(':attended', $info['remeneration_committee_meetings_attended']);
				$stmt->bindParam(':held', $info['remeneration_committee_meetings_held']);
				if (!$stmt->execute()) {
					$counter = false;
				}
			}
			else {
				$stmt=$dbobject->prepare("insert into `remuneration_committee_attendance` (`company_id`,`dir_din_no`,`att_year`,`attended`,`held`) values(:company_id,:dir_din_no,:att_year,:attended,:held)");
				$stmt->bindParam(':company_id',$info['company_id']);
				$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
				$stmt->bindParam(':att_year',$info['att_year']);
				$stmt->bindParam(':attended',$info['remeneration_committee_meetings_attended']);
				$stmt->bindParam(':held',$info['remeneration_committee_meetings_held']);
				if(!$stmt->execute()) {
					$counter= false;
				}
			}
		}
		$stmt=$dbobject->prepare("update `input_sheet_comments` set `comments`=:comments where `company_id`=:company_id and `financial_year`=:financial_year and `din_no`=:din_no and `used_in`=:used_in");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':din_no',$info['dir_din_no']);
		$stmt->bindParam(':financial_year',$info['att_year']);
		$used_in = "Director's Attendance and Remuneration";
		$stmt->bindParam(':comments',$info['comments']);
		$stmt->bindParam(':used_in',$used_in);
		$stmt->execute();

		if($counter) {
			$status['title']="Success";
			$status['msg']="Multiple data saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function auditCommitteeAttendance($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `audit_committee_attendance` (`company_id`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:company_id,:dir_din_no,:att_year,:attended,:held)");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$info['att_year']);
		$stmt->bindParam(':attended',$info['attended']);
		$stmt->bindParam(':held',$info['held']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Audit Committee Attendance saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function registerAuditFeeInfoFromSheet ($info) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `company_auditors_info` (`company_id`, `no_of_auditors`, `financial_year`, `net_profit`, `audit_fee`,`audit_related_fee`,`non_audit_fee`,`total_auditors_fee`) VALUES (:company_id,:no_of_auditors,:financial_year,:net_profit,:audit_fee,:audit_related_fee,:non_audit_fee,:total_auditors_fee)");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':no_of_auditors',$info['no_of_auditors']);
		$stmt->bindParam(':financial_year',$info['financial_year']);
		$stmt->bindParam(':net_profit',$info['net_profit']);
		$stmt->bindParam(':audit_fee',$info['audit_fee']);
		$stmt->bindParam(':audit_related_fee',$info['audit_related_fee']);
		$stmt->bindParam(':non_audit_fee',$info['non_audit_fee']);
		$stmt->bindParam(':total_auditors_fee',$info['total_auditors_fee']);
		$stmt->execute();
	}
	function registerAuditorInfo($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `company_auditors_info` (`company_id`, `no_of_auditors`, `financial_year`, `net_profit`, `audit_fee`,`audit_related_fee`,`non_audit_fee`,`total_auditors_fee`,`comments`) VALUES (:company_id,:no_of_auditors,:financial_year,:net_profit,:audit_fee,:audit_related_fee,:non_audit_fee,:total_auditors_fee,:comments)");
		$stmt->bindParam(':company_id',$info['company_id']);
		$stmt->bindParam(':no_of_auditors',$info['no_of_auditors']);
		$stmt->bindParam(':financial_year',$info['financial_year']);
		$stmt->bindParam(':net_profit',$info['net_profit']);
		$stmt->bindParam(':audit_fee',$info['audit_fee']);
		$stmt->bindParam(':audit_related_fee',$info['audit_related_fee']);
		$stmt->bindParam(':non_audit_fee',$info['non_audit_fee']);
		$stmt->bindParam(':total_auditors_fee',$info['total_auditors_fee']);
		$stmt->bindParam(':comments',$info['comments']);
		if($stmt->execute()) {
			$company_auditors_info_id = $dbobject->lastInsertId();
			for($i=0;$i<$info['no_of_auditors'];$i++) {
				$stmt=$dbobject->prepare("insert into `company_auditors_details` (`company_auditor_info_id`, `auditor_name`,`auditor_reg_no`, `parent_company`, `auditor_tenure`, `partner_name`,`partner_membership_no`,`partner_tenure`) VALUES (:company_auditor_info_id,:auditor_name,:auditor_reg_no,:parent_company,:auditor_tenure,:partner_name,:partner_membership_no,:partner_tenure)");
				$stmt->bindParam(':company_auditor_info_id',$company_auditors_info_id);
				$stmt->bindParam(':auditor_name',$info['auditor_name'][$i]);
				$stmt->bindParam(':auditor_reg_no',$info['auditor_reg_no'][$i]);
				$stmt->bindParam(':parent_company',$info['auditor_parent_company'][$i]);
				$stmt->bindParam(':auditor_tenure',$info['auditor_tenure'][$i]);
				$stmt->bindParam(':partner_name',$info['auditor_partner_name'][$i]);
				$stmt->bindParam(':partner_membership_no',$info['partner_membership_no'][$i]);
				$stmt->bindParam(':partner_tenure',$info['auditor_partner_tenure'][$i]);
				$stmt->execute();
			}

			$status['title']="Success";
			$status['msg']="Auditors Info saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function editAuditorInfo($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("update `company_auditors_info` set  `no_of_auditors`=:no_of_auditors, `financial_year`=:financial_year, `net_profit`=:net_profit, `audit_fee`=:audit_fee,`audit_related_fee`=:audit_related_fee,`non_audit_fee`=:non_audit_fee,`total_auditors_fee`=:total_auditors_fee , `comments`=:comments  where `id`=:company_auditors_info_id");
		$stmt->bindParam(':company_auditors_info_id',$info['company_auditors_info_id']);
		$stmt->bindParam(':no_of_auditors',$info['no_of_auditors']);
		$stmt->bindParam(':financial_year',$info['financial_year']);
		$stmt->bindParam(':net_profit',$info['net_profit']);
		$stmt->bindParam(':audit_fee',$info['audit_fee']);
		$stmt->bindParam(':audit_related_fee',$info['audit_related_fee']);
		$stmt->bindParam(':non_audit_fee',$info['non_audit_fee']);
		$stmt->bindParam(':total_auditors_fee',$info['total_auditors_fee']);
		$stmt->bindParam(':comments',$info['comments']);
		if($stmt->execute()) {
			$company_auditors_info_id = $info['company_auditors_info_id'];
			$stmt=$dbobject->prepare("delete from `company_auditors_details` where `company_auditor_info_id`=:company_auditors_info_id");
			$stmt->bindParam(':company_auditors_info_id',$company_auditors_info_id);
			if($stmt->execute()) {
				for($i=0;$i<$info['no_of_auditors'];$i++) {
					$stmt=$dbobject->prepare("insert into `company_auditors_details` (`company_auditor_info_id`, `auditor_name`, `parent_company`, `auditor_tenure`, `partner_name`,`partner_tenure`) VALUES (:company_auditor_info_id,:auditor_name,:parent_company,:auditor_tenure,:partner_name,:partner_tenure)");
					$stmt->bindParam(':company_auditor_info_id',$company_auditors_info_id);
					$stmt->bindParam(':auditor_name',$info['auditor_name'][$i]);
					$stmt->bindParam(':parent_company',$info['auditor_parent_company'][$i]);
					$stmt->bindParam(':auditor_tenure',$info['auditor_tenure'][$i]);
					$stmt->bindParam(':partner_name',$info['auditor_partner_name'][$i]);
					$stmt->bindParam(':partner_tenure',$info['auditor_partner_tenure'][$i]);
					$stmt->execute();
				}
			}
			$status['title']="Success";
			$status['msg']="Auditors Info saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function remunerationCommitteeAttendance($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `remuneration_committee_attendance` (`com_bse_code`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:com_bse_code,:dir_din_no,:att_year,:attended,:held)");
		$stmt->bindParam(':com_bse_code',$info['com_bse_code']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$info['att_year']);
		$stmt->bindParam(':attended',$info['attended']);
		$stmt->bindParam(':held',$info['held']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Remuneration Committee Attendance saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function nominationCommitteeAttendance($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `nomination_committee_attendance` (`com_bse_code`, `dir_din_no`, `att_year`, `attended`, `held`) VALUES (:com_bse_code,:dir_din_no,:att_year,:attended,:held)");
		$stmt->bindParam(':com_bse_code',$info['com_bse_code']);
		$stmt->bindParam(':dir_din_no',$info['dir_din_no']);
		$stmt->bindParam(':att_year',$info['att_year']);
		$stmt->bindParam(':attended',$info['attended']);
		$stmt->bindParam(':held',$info['held']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Nomination Committee Attendance saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function addNewCompany($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("insert into `companies` (`name`,`cin` ,`bse_code`, `nse_code`, `isin`,`face_value`, `sector`,`email`,`website`,`fax`,`contact`,`address`,`fiscal_year_end`,`peer1`,`peer2`) VALUES (:name,:cin,:bse_code,:nse_code,:isin,:face_value,:sector,:email,:website,:fax,:contact,:address,:fiscal_year_end,:peer1,:peer2)");
		$stmt->bindParam(':name',$info['name']);
		$stmt->bindParam(':cin',$info['cin']);
		$stmt->bindParam(':bse_code',$info['bse_code']);
		$stmt->bindParam(':nse_code',$info['nse_code']);
		$stmt->bindParam(':isin',$info['isin']);
		$stmt->bindParam(':face_value',$info['face_value']);
		$stmt->bindParam(':sector',$info['sector']);
		$stmt->bindParam(':email',$info['email']);
		$stmt->bindParam(':website',$info['website']);
		$stmt->bindParam(':fax',$info['fax']);
		$stmt->bindParam(':contact',$info['contact']);
		$stmt->bindParam(':address',$info['address']);
		$stmt->bindParam(':fiscal_year_end',$info['fiscal_year_end']);
		$stmt->bindParam(':peer1',$info['peer1']);
		$stmt->bindParam(':peer2',$info['peer2']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Comapny Details saved Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function editCompany($info) {
		$status = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("update `companies` set `name`=:name,`cin`=:cin ,`bse_code`=:bse_code, `nse_code`=:nse_code, `isin`=:isin,`face_value`=:face_value, `sector`=:sector,`email`=:email,`website`=:website,`fax`=:fax,`contact`=:contact,`address`=:address , `fiscal_year_end`=:fiscal_year_end, `peer1`=:peer1, `peer2`=:peer2 where `id`=:company_id");
		$stmt->bindParam(':name',$info['name']);
		$stmt->bindParam(':cin',$info['cin']);
		$stmt->bindParam(':bse_code',$info['bse_code']);
		$stmt->bindParam(':nse_code',$info['nse_code']);
		$stmt->bindParam(':isin',$info['isin']);
		$stmt->bindParam(':face_value',$info['face_value']);
		$stmt->bindParam(':sector',$info['sector']);
		$stmt->bindParam(':email',$info['email']);
		$stmt->bindParam(':website',$info['website']);
		$stmt->bindParam(':fax',$info['fax']);
		$stmt->bindParam(':contact',$info['contact']);
		$stmt->bindParam(':address',$info['address']);
		$stmt->bindParam(':fiscal_year_end',$info['fiscal_year_end']);
		$stmt->bindParam(':peer1',$info['peer1']);
		$stmt->bindParam(':peer2',$info['peer2']);
		$stmt->bindParam(':company_id',$info['company_id']);
		if($stmt->execute()) {
			$status['title']="Success";
			$status['msg']="Comapny Details changed Successfully";
			$status['image']=$this->success_image;
		}
		else {
			$status['title']="Error";
			$status['msg']="Internal Server Error";
			$status['image']=$this->error_image;
		}
		$dbobject = null;
		return $status;
	}
	function getCompanyDetailsFiltered($keywords) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `companies` where `bse_code` LIKE :bse_code or `name` LIKE :company_name or `cin` LIKE :cin LIMIT 200");
		$keywords = "$keywords%";
		$stmt->bindParam(':bse_code',$keywords);
		$stmt->bindParam(':company_name',$keywords);
		$stmt->bindParam(':cin',$keywords);
		$stmt->execute();
		$company_details = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$company_details[]=$row;
		}
		$dbobject = null;
		return $company_details;
	}
	function getDirectorDetailsFiltered($keywords) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` where `din_no` LIKE :din_no or `dir_name` LIKE :dir_name");
		$keywords = "$keywords%";
		$stmt->bindParam(':din_no',$keywords);
		$stmt->bindParam(':dir_name',$keywords);
		$stmt->execute();
		$director_details = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$director_details[]=$row;
		}
		$dbobject = null;
		return $director_details;
	}
	function getDirectorDetails($director_id) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` where `id`=:director_id");
		$stmt->bindParam(':director_id',$director_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$director_details = $row;
		$dbobject = null;
		return $director_details;
	}
	function getCompanyDetails2($bse_code) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `companies` where `bse_code`=:bse_code");
		$stmt->bindParam(':bse_code',$bse_code);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$company_details = $stmt->fetch(PDO::FETCH_ASSOC);
			$company_details['exists']=true;
		}
		else {
			$company_details['exists']=false;
		}
		$dbobject = null;
		return $company_details;
	}
	function getCompanyDetails($company_id) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `companies` where `id`=:company_id");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$company_details=$row;
		$dbobject = null;
		return $company_details;
	}
	function getCompanyPeerDetails($company_id) {
		$response = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select `peer1`,`peer2` from `companies` where `id`=:company_id");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$peer1_company_id= $row['peer1'];
		$peer2_company_id= $row['peer2'];

		$stmt=$dbobject->prepare("select * from `companies` where `id`=:peer_id");
		$stmt->bindParam(':peer_id',$peer1_company_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$response['peer1_company_details']= $row;

		$stmt=$dbobject->prepare("select * from `companies` where `id`=:peer_id");
		$stmt->bindParam(':peer_id',$peer2_company_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$response['peer2_company_details']= $row;


		$dbobject = null;
		return $response;
	}
	function getCompanyDirectors($company_id,$financial_year="") {
		$generic_array = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		if($financial_year!="") {
			$stmt=$dbobject->prepare("select `directors`.`id` as `director_table_id`,`director_info`.`id` as `director_info_table_id`,`director_info`.`nomination_remuneration`,`director_info`.`ratio_to_mre` ,`director_info`.`retiring_non_retiring`,`directors`.`din_no`, `directors`.`dir_name`,`directors`.`no_directorship_public`,`directors`.`no_total_directorship`,`directors`.`no_directorship_listed_companies`,`directors`.`committee_chairmanships`,`directors`.`committee_memberships`,`directors`.`expertise`,`directors`.`education`,`director_info`.`appointment_date`,`director_info`.`resignation_date`,`director_info`.`current_tenure`,`director_info`.`total_association`,`director_info`.`company_classification`,`director_info`.`ses_classification`,`director_info`.`additional_classification`,`director_info`.`audit_committee`,`director_info`.`investor_grievance`,`director_info`.`nomination`,`director_info`.`remuneration`,`director_info`.`csr`,`director_info`.`risk_management_committee`,`director_info`.`shares_held`,`director_info`.`esops`,`director_info`.`other_pecuniary_relationship`,`director_info`.`last_updated_on`,`director_info`.`updated_by` from `directors` INNER JOIN `director_info` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `financial_year`=:financial_year");
			$stmt->bindParam(':financial_year',$financial_year);
		}
		else {
			$stmt=$dbobject->prepare("select `directors`.`id` as `director_table_id`,`director_info`.`id` as `director_info_table_id`,`director_info`.`ratio_to_mre` , `directors`.`din_no`,`director_info`.`nomination_remuneration`,`director_info`.`retiring_non_retiring`,`directors`.`dir_name`,`directors`.`no_directorship_public`,`directors`.`no_total_directorship`,`directors`.`no_directorship_listed_companies`,`directors`.`committee_chairmanships`,`directors`.`committee_memberships`,`directors`.`expertise`,`directors`.`education`,`director_info`.`appointment_date`,`director_info`.`resignation_date`,`director_info`.`current_tenure`,`director_info`.`total_association`,`director_info`.`company_classification`,`director_info`.`ses_classification`,`director_info`.`additional_classification`,`director_info`.`audit_committee`,`director_info`.`investor_grievance`,`director_info`.`nomination`,`director_info`.`remuneration`,`director_info`.`csr`,`director_info`.`risk_management_committee`,`director_info`.`shares_held`,`director_info`.`esops`,`director_info`.`other_pecuniary_relationship`,`director_info`.`last_updated_on`,`director_info`.`updated_by` from `directors` INNER JOIN `director_info` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id");
		}
		$stmt->bindParam(':company_id',$company_id);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$directors[]=$row;
			}
			$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_info` where `company_id`=:company_id and `financial_year`=:financial_year");
			$stmt->bindParam(":company_id",$company_id);
			$stmt->bindParam(":financial_year",$financial_year);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($row['are_committees_seperate']=='yes' || $row['are_committees_seperate']=='no') {
				$generic_array['rem_nom_assigned']=true;
				$generic_array['are_committees_seperate'] = $row['are_committees_seperate'];
			}
			else {
				$generic_array['rem_nom_assigned']=false;
			}
		}
		else {
			$directors = array();
		}
		$generic_array['directors']=$directors;
		$dbobject = null;
		return $generic_array;
	}
	function getAuditCommitteeDirectors($bse_code) {
		$directors = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` INNER JOIN `director_info` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`com_bse_code`=:bse_code and ( `director_info`.`audit_committee`=:c or `director_info`.`audit_committee`=:d)");
		$stmt->bindParam(':bse_code',$bse_code);
		$c_val = "C";
		$d_val = "D";
		$stmt->bindParam(':c',$c_val);
		$stmt->bindParam(':d',$d_val);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}
		$dbobject = null;
		return $directors;
	}
	function getNominationCommitteeDirectors($bse_code) {
		$directors = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` INNER JOIN `director_info` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`com_bse_code`=:bse_code and ( `director_info`.`nomination`=:c or `director_info`.`nomination`=:d)");
		$stmt->bindParam(':bse_code',$bse_code);
		$c_val = "C";
		$d_val = "D";
		$stmt->bindParam(':c',$c_val);
		$stmt->bindParam(':d',$d_val);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}
		$dbobject = null;
		return $directors;
	}
	function getRemunerationCommitteeDirectors($bse_code) {
		$directors = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` INNER JOIN `director_info` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`com_bse_code`=:bse_code and ( `director_info`.`remuneration`=:c or `director_info`.`remuneration`=:d)");
		$stmt->bindParam(':bse_code',$bse_code);
		$c_val = "C";
		$d_val = "D";
		$stmt->bindParam(':c',$c_val);
		$stmt->bindParam(':d',$d_val);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}
		$dbobject = null;
		return $directors;
	}
	function getCompanyDirectorsRemunerationDetails($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

//			 Getting Director List
		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		// Getting total distinct years
		$stmt=$dbobject->prepare("select DISTINCT `rem_year` from `director_remuneration` where `rem_year`<=:financial_year ORDER BY `rem_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th>Variable Pay ($row[rem_year])</th>";
			$string_headers.="<th>Fixed Pay ($row[rem_year])</th>";
		}
		$string_headers.="</tr></thead>";

		// Calculating row for a director

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:rem_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':rem_year',$year['rem_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='director_remuneration' data-table-row-id='$row[id]' data-table-col-name='variable_pay'>$row[variable_pay]</td><td class='editable' data-table-name='director_remuneration' data-table-row-id='$row[id]' data-table-col-name='fixed_pay'>$row[fixed_pay]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyDirectorsAGMDetails($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

//			 Getting Director List
		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		// Getting total distinct years
		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `director_agm_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th>Attended ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		// Calculating row for a director

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `director_agm_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='director_agm_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td>";
				}
				else {
					$string_rows.="<td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyDirectorsBoardAttendance($company_id,$financial_year) {

		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

//			 Getting Director List
		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		// Getting total distinct years
		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `director_board_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th> Attended ($row[att_year])</th>";
			$string_headers.="<th>Held ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		// Calculating row for a director

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `director_board_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='director_board_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='director_board_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyAuditCommitteeAttendance($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`audit_committee`='C' or `director_info`.`audit_committee`='M')");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);

		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `audit_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th> Attended ($row[att_year])</th>";
			$string_headers.="<th>Held ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `audit_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='audit_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='audit_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyStackholdersCosmmitteeAttendance($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`investor_grievance`='C' or `director_info`.`investor_grievance`='M')");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `investors_grievance_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th> Attended ($row[att_year])</th>";
			$string_headers.="<th>Held ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `investors_grievance_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='investors_grievance_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='investors_grievance_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyCSRCosmmitteeAttendance($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`csr`='C' or `director_info`.`csr`='M')");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `csr_committee_meetings_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th> Attended ($row[att_year])</th>";
			$string_headers.="<th>Held ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `csr_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='csr_committee_meetings_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='csr_committee_meetings_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getCompanyRiskManagementCosmmitteeAttendance($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`risk_management_committee`='C' or `director_info`.`risk_management_committee`='M')");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$directors[]=$row;
		}

		$stmt=$dbobject->prepare("select DISTINCT `att_year` from `risk_management_committee_meetings_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th> Attended ($row[att_year])</th>";
			$string_headers.="<th>Held ($row[att_year])</th>";
		}
		$string_headers.="</tr></thead>";

		$string_rows = "<tbody>";
		foreach($directors as $director) {
			$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select * from `risk_management_committee_meetings_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
				$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
				$stmt->bindParam(':att_year',$year['att_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='risk_management_committee_meetings_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='risk_management_committee_meetings_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
				}
				else {
					$string_rows.="<td>-</td><td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getAuditFeeInfo($company_id,$financial_year) {
		$string_headers = "<thead></thead><tr><th>&nbsp;</th>";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		// Getting total distinct years
		$stmt=$dbobject->prepare("select DISTINCT `financial_year` from `company_auditors_info` where `financial_year`<=:financial_year ORDER BY `financial_year` DESC");
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$years[]=$row;
			$string_headers.="<th>$row[financial_year]</th>";
		}
		$string_headers.="</tr></thead>";
		// Calculating row for a director

		$string_rows = "<tbody>";
		$array_cols = array(
			"Net Profit (In <i class='fa fa-rupee'></i> Crore)",
			"Audit Fee (In <i class='fa fa-rupee'></i> Crore)",
			"Audit Related Fee (In <i class='fa fa-rupee'></i> Crore)",
			"Non-Audit Fee (In <i class='fa fa-rupee'></i> Crore)",
			"Total Auditors Fee (In <i class='fa fa-rupee'></i> Crore)"
		);
		$array_column_names = array('net_profit','audit_fee','audit_related_fee','non_audit_fee','total_auditors_fee');
		for($counter=0;$counter<=4;$counter++) {
			$string_rows.="<tr><th>$array_cols[$counter]</th>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select `id`,`$array_column_names[$counter]` from `company_auditors_info` where `financial_year`=:financial_year and `company_id`=:company_id");
				$stmt->bindParam(':financial_year',$year['financial_year']);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$cl_name = $array_column_names[$counter];
					$string_rows.="<td class='editable' data-table-name='company_auditors_info' data-table-row-id='$row[id]' data-table-col-name='$array_column_names[$counter]'>$row[$cl_name]</td>";
				}
				else {
					$string_rows.="<td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getAuditorDetails($company_id,$financial_year) {
		$string_headers = "";
		$directors = array();
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		// Getting total distinct years
		$stmt=$dbobject->prepare("select `id`,`no_of_auditors` from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$company_auditors_info_id = $row['id'];
		$no_of_auditors = $row['no_of_auditors'];

		$string_headers.="<thead><tr><th>&nbsp;</th><th colspan='".($no_of_auditors)."'>$financial_year</th></tr></thead>";
		$string_rows = "<tbody><tr><th>No. of Auditors</th><td colspan='".($no_of_auditors)."'>$no_of_auditors</td></tr>";

		$col_titles = array("Auditor's Name","Auditor's Reg. No","Auditor's Parent Company","Auditor's Tenure","Audit Partner Name","Audit Partner Membership No.","Audit Partner Tenure");
		$column_names = array('auditor_name','auditor_reg_no','parent_company','auditor_tenure','partner_name','partner_membership_no','partner_tenure');


		$stmt=$dbobject->prepare("select `id` from `company_auditors_details` where `company_auditor_info_id`=:company_auditors_info_id");
		$stmt->bindParam(':company_auditors_info_id',$company_auditors_info_id);
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$details_id[] = $row['id'];
		}

		foreach($column_names as $key=>$col_na) {
			$string_rows.="<tr><th>$col_titles[$key]</th>";
			for($counter = 0 ; $counter<count($details_id); $counter++) {
				$stmt=$dbobject->prepare("select `id`,`$col_na` from `company_auditors_details` where `id`=:id");
				$stmt->bindParam(':id',$details_id[$counter]);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$string_rows.="<td class='editable' data-table-name='company_auditors_details' data-table-row-id='$row[id]' data-table-col-name='$col_na'>$row[$col_na]</td>";
				}
				else {
					$string_rows.="<td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getDividendInfoViewSheet($company_id,$financial_year) {
		$string_headers = "<thead><tr><th>&nbsp;</th>";
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$years = range($financial_year,$financial_year-5);
		foreach($years as $year) {
			$string_headers.="<th>$year</th>";
		}
		$string_headers.="</tr></thead>";
		$string_rows = "<tbody>";
		$array_cols = array(
			"Market Price at year start (In <i class='fa fa-rupee'></i> Crore)",
			"Market Price at year end (In <i class='fa fa-rupee'></i> Crore)",
			"Dividend (In <i class='fa fa-rupee'></i> Crore)",
			"EPS (In <i class='fa fa-rupee'></i> Crore)"
		);
		$array_column_names = array('dividend','market_price_start','market_price_end','eps');
		for($counter=0;$counter<4;$counter++) {
			$string_rows.="<tr><th>$array_cols[$counter]</th>";
			foreach($years as $year) {
				$stmt=$dbobject->prepare("select `id`,`$array_column_names[$counter]` from `dividend_info` where `financial_year`=:financial_year and `company_id`=:company_id");
				$stmt->bindParam(':financial_year',$year);
				$stmt->bindParam(':company_id',$company_id);
				$stmt->execute();
				if($stmt->rowCount()>0) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$cl_name = $array_column_names[$counter];
					$string_rows.="<td class='editable' data-table-name='dividend_info' data-table-row-id='$row[id]' data-table-col-name='$array_column_names[$counter]'>$row[$cl_name]</td>";
				}
				else {
					$string_rows.="<td>-</td>";
				}
			}
			$string_rows.="</tr>";
		}
		$string_rows.="</tbody>";
		$dbobject = null;
		return $string_headers.$string_rows;
	}
	function getInputSheetComments($company_id,$financial_year) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$comments = "<ul>";
		$stmt=$dbobject->prepare("select *  from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($row['comments']!="")
				$comments.="<li>$row[comments]</li>";
		}
		$stmt=$dbobject->prepare("select *  from `input_sheet_comments` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($row['comments']!="")
				$comments.="<li>$row[comments]</li>";
		}
		$stmt=$dbobject->prepare("select *  from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($row['comments']!="")
				$comments.="<li>$row[comments]</li>";
		}
		$comments.="</ul>";
		return $comments;
	}
	function getRemunerationNominationCommitteeAttendance($company_id,$financial_year,$is_rem_nom_same) {
		$years = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		if($is_rem_nom_same=='yes') {

			$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`nomination_remuneration`='C' or `director_info`.`nomination_remuneration`='M')");
			$stmt->bindParam(':company_id',$company_id);
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			$directors=array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$directors[]=$row;
			}

			$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
			$stmt=$dbobject->prepare("select DISTINCT `att_year` from `nomination_remuneration_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$years[]=$row;
				$string_headers.="<th> Attended ($row[att_year]) </th>";
				$string_headers.="<th>Held ($row[att_year])</th>";
			}
			$string_headers.="</tr></thead>";
			$string_rows = "<tbody>";
			foreach($directors as $director) {
				$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
				foreach($years as $year) {
					$stmt=$dbobject->prepare("select * from `nomination_remuneration_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
					$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
					$stmt->bindParam(':att_year',$year['att_year']);
					$stmt->bindParam(':company_id',$company_id);
					$stmt->execute();
					if($stmt->rowCount()>0) {
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$string_rows.="<td class='editable' data-table-name='nomination_remuneration_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='nomination_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
					}
					else {
						$string_rows.="<td>-</td><td>-</td>";
					}
				}
				$string_rows.="</tr>";
			}
			$string_rows.="</tbody>";
			$nomination_remuneration_details = $string_headers.$string_rows;
			$generic_array['nomination_remuneration_details'] = $nomination_remuneration_details;
		}
		else {

			$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`nomination`='C' or `director_info`.`nomination`='M')");
			$stmt->bindParam(':company_id',$company_id);
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			$directors=array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$directors[]=$row;
			}

			$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
			$stmt=$dbobject->prepare("select DISTINCT `att_year` from `nomination_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$years[]=$row;
				$string_headers.="<th> Attended ($row[att_year])</th>";
				$string_headers.="<th>Held ($row[att_year])</th>";
			}
			$string_headers.="</tr></thead>";
			$string_rows = "<tbody>";
			foreach($directors as $director) {
				$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
				foreach($years as $year) {
					$stmt=$dbobject->prepare("select * from `nomination_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
					$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
					$stmt->bindParam(':att_year',$year['att_year']);
					$stmt->bindParam(':company_id',$company_id);
					$stmt->execute();
					if($stmt->rowCount()>0) {
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$string_rows.="<td class='editable' data-table-name='nomination_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='nomination_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
					}
					else {
						$string_rows.="<td>-</td><td>-</td>";
					}
				}
				$string_rows.="</tr>";
			}
			$string_rows.="</tbody>";
			$nomination_details = $string_headers.$string_rows;
			$generic_array['nomination_details'] = $nomination_details;


			$stmt=$dbobject->prepare("select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_info`.`remuneration`='C' or `director_info`.`remuneration`='M')");
			$stmt->bindParam(':company_id',$company_id);
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			$directors=array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$directors[]=$row;
			}

			$string_headers = "<thead><tr><th>DIN</th><th>Director Name</th>";
			$stmt=$dbobject->prepare("select DISTINCT `att_year` from `remuneration_committee_attendance` where `att_year`<=:financial_year ORDER BY `att_year` DESC");
			$stmt->bindParam(':financial_year',$financial_year);
			$stmt->execute();
			$years_rem = array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$years_rem[]=$row;
				$string_headers.="<th> Attended ($row[att_year])</th>";
				$string_headers.="<th>Held ($row[att_year])</th>";
			}
			$string_headers.="</tr></thead>";
			$string_rows = "<tbody>";
			foreach($directors as $director) {
				$string_rows.="<tr><td>$director[dir_din_no]</td><td>$director[dir_name]</td>";
				foreach($years_rem as $year) {
					$stmt=$dbobject->prepare("select * from `remuneration_committee_attendance` where `dir_din_no`=:dir_din_no and `att_year`=:att_year and `company_id`=:company_id");
					$stmt->bindParam(':dir_din_no',$director['dir_din_no']);
					$stmt->bindParam(':att_year',$year['att_year']);
					$stmt->bindParam(':company_id',$company_id);
					$stmt->execute();
					if($stmt->rowCount()>0) {
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$string_rows.="<td class='editable' data-table-name='remuneration_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='attended'>$row[attended]</td><td class='editable' data-table-name='remuneration_committee_attendance' data-table-row-id='$row[id]' data-table-col-name='held'>$row[held]</td>";
					}
					else {
						$string_rows.="<td>-</td><td>-</td>";
					}
				}
				$string_rows.="</tr>";
			}
			$string_rows.="</tbody>";
			$remuneration_details = $string_headers.$string_rows;
			$generic_array['remuneration_details'] = $remuneration_details;
		}

		$dbobject = null;
		return $generic_array;
	}
	function getNominationCommitteeAttendance($bse_code) {
		$nomination_committee_attendance = array();
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `directors` INNER JOIN `nomination_committee_attendance` ON `nomination_committee_attendance`.`dir_din_no`=`directors`.`din_no` where `nomination_committee_attendance`.`com_bse_code`=:bse_code");
		$stmt->bindParam(':bse_code',$bse_code);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$nomination_committee_attendance[]=$row;
		}
		$dbobject = null;
		return $nomination_committee_attendance;
	}
	function getDividendInfo($company_id,$financial_year) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `dividend_info` where `company_id`=:company_id and `financial_year`=:financial_year");
		$stmt->bindParam(':company_id',$company_id);
		$stmt->bindParam(':financial_year',$financial_year);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$dividend_info = $row = $stmt->fetch(PDO::FETCH_ASSOC);
			$dividend_info['count'] = 1;
		}
		else {
			$dividend_info['count'] = 0;
		}
		$dbobject = null;
		return $dividend_info;
	}
	function getUserInfo($user_id) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$stmt=$dbobject->prepare("select * from `login` where `id`=:user_id");
		$stmt->bindParam(':user_id',$user_id);
		$stmt->execute();
		if($stmt->rowCount()>0) {
			$user_info = $row = $stmt->fetch(PDO::FETCH_ASSOC);
			$user_info['count'] = 1;
		}
		else {
			$user_info['count'] = 0;
		}
		$dbobject = null;
		return $user_info;
	}
	function remunerationLast3Years($start_year,$din_nos) {
		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);

		$array_din_nos = json_decode(stripslashes($din_nos),true);
		$total_ids = count($array_din_nos);
		for ($i=0; $i <$total_ids ; $i++) {
			$array_dins[] = $array_din_nos[$i]['din_no'];
		}

		// Din calculated
		$single_director = array();

		foreach($array_dins as $din) {
			$single_director['din']=$din;
			$first_year = $start_year;
			$stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
			$stmt->bindParam(':dir_din_no',$din);
			$stmt->bindParam(':financial_year',$first_year);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$single_director['first_year_fixed_pay']=$row['fixed_pay'];
				$single_director['first_year_variable_pay']=$row['variable_pay'];
			}
			else {
				$single_director['first_year_fixed_pay']="NA";
				$single_director['first_year_variable_pay']="NA";
			}

			$second_year = $start_year-1;
			$stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
			$stmt->bindParam(':dir_din_no',$din);
			$stmt->bindParam(':financial_year',$second_year);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$single_director['second_year_fixed_pay']=$row['fixed_pay'];
				$single_director['second_year_variable_pay']=$row['variable_pay'];
			}
			else {
				$single_director['second_year_fixed_pay']="NA";
				$single_director['second_year_variable_pay']="NA";
			}

			$third_year = $start_year-2;
			$stmt=$dbobject->prepare("select * from `director_remuneration` where `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
			$stmt->bindParam(':dir_din_no',$din);
			$stmt->bindParam(':financial_year',$third_year);
			$stmt->execute();
			if($stmt->rowCount()>0) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$single_director['third_year_fixed_pay']=$row['fixed_pay'];
				$single_director['third_year_variable_pay']=$row['variable_pay'];
			}
			else {
				$single_director['third_year_fixed_pay']="NA";
				$single_director['third_year_variable_pay']="NA";
			}

			$directors_rem_details[] = $single_director;
		}


		$dbobject = null;
		return $directors_rem_details;
	}
	function getCompanyProfit5Years($financial_year_start,$company_id) {

		$dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		$years = range($financial_year_start,$financial_year_start-4);
		$response = array();
		for($i=0;$i<count($years);$i++) {
			$stmt=$dbobject->prepare("select * from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
			$stmt->bindParam(":company_id",$company_id);
			$stmt->bindParam(":financial_year",$years[$i]);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$response[] = $row;
		}
		$dbobject = null;
		return $response;
	}
}
?>