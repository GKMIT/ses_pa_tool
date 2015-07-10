<?php

require_once('db-config.php');

class DatabaseReports {
    function changePassword($user_name,$curent_password,$new_password) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare("select * from `login` where `user_name`=:user_name and `password`=:password");
        $stmt->bindParam(":user_name",$user_name);
        $stmt->bindParam(":password",$curent_password);
        if($stmt->execute()) {
            if($stmt->rowCount()>0) {
                $stmt = $dbobject->prepare(" update `login` set  `password`=:new_password where `user_name`=:user_name and `password`=:password");
                $stmt->bindParam(":user_name",$user_name);
                $stmt->bindParam(":password",$curent_password);
                $stmt->bindParam(":new_password",$new_password);
                if($stmt->execute()) {
                    $response['status']=200;
                    $response['msg'] = "Password changes successfully";
                }
            }
            else {
                $response['status']=401;
                $response['msg'] = "Username and password does not match";
            }
        }
        else {
            $response['status']=500;
            $response['msg'] = "Internal server error";
        }
        $dbobject=null;
        return $response;
    }
    function reportDetails() {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare(" select * from `pa_reports` INNER JOIN `companies` ON `companies`.`id`=`pa_reports`.`company_id` where `pa_reports`.`status`=:status");
        $status=0;
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $incomplete_reports[] = $row;
        }
        $response['incomplete_reports'] = $incomplete_reports;

        $stmt = $dbobject->prepare(" select * from `pa_reports` INNER JOIN `companies` ON `companies`.`id`=`pa_reports`.`company_id` where `pa_reports`.`status`=:status");
        $status=1;
        $stmt->bindParam(":status",$status);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $completed_reports[] = $row;
        }
        $response['completed_reports'] = $completed_reports;
        $dbobject=null;
        return $response;
    }
    function markCompleted($report_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" update `pa_reports` set `status`=:status  where `report_id`=:report_id");
        $status=1;
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":report_id",$report_id);
        if($stmt->execute()) {
            $dbobject=null;
            return true;
        }
        else {
            $dbobject=null;
            return false;
        }
    }
    function getReportDetails($report_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare(" select * from `pa_reports` where `report_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['report_details'] = $row;
        $dbobject = null;
        return $response;
    }
    function savePage1Details($info) {
        $response = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        if(isset($info['report_data_exists'])) {
            $stmt = $dbobject->prepare("delete from `pa_report_meeting_details` where `pa_reports_id`=:report_id");
            $pa_report_id = $_SESSION['report_id'];
            $stmt->bindParam(":report_id",$pa_report_id);
            if($stmt->execute()) {
                $stmt = $dbobject->prepare("insert into `pa_report_meeting_details` (`pa_reports_id`, `meeting_type`, `meeting_date`,`meeting_time`, `e_voting_platform`, `e_voting_platform_website`, `e_voting_start_date`, `e_voting_end_date`, `notice_link`, `meeting_venue`,`annual_report_name`, `annual_report`, `voting_deadline`) VALUES (:pa_reports_id, :meeting_type, :meeting_date,:meeting_time, :e_voting_platform , :e_voting_platform_website, :e_voting_start_date, :e_voting_end_date, :notice_link, :meeting_venue ,:annual_report_name ,:annual_report ,:voting_deadline)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":meeting_type",$info['meeting_type']);
                $stmt->bindParam(":meeting_date",$info['meeting_date']);
                $stmt->bindParam(":meeting_time",$info['meeting_time']);
                $stmt->bindParam(":e_voting_platform",$info['e_voting_platform']);
                $stmt->bindParam(":e_voting_platform_website",$info['e_voting_platform_website']);
                $stmt->bindParam(":e_voting_start_date",$info['e_voting_start_date']);
                $stmt->bindParam(":e_voting_end_date",$info['e_voting_end_date']);
                $stmt->bindParam(":notice_link",$info['notice_link']);
                $stmt->bindParam(":meeting_venue",$info['meeting_venue']);
                $stmt->bindParam(":annual_report_name",$info['annual_report_name']);
                $stmt->bindParam(":annual_report",$info['annual_report']);
                $stmt->bindParam(":voting_deadline",$info['voting_deadline']);
                if($stmt->execute()) {
                    $response['status'] = 200;
                    $response['msg'] = "Information updated successfully";
                }
                else {
                    $response['status'] = 500;
                    $response['msg'] = "Internal Error Occured";
                }
            }
        }
        else {
            $stmt = $dbobject->prepare("insert into `pa_reports` (`company_id`,`report_year`) values (:company_id,:report_year)");
            $stmt->bindParam(":company_id",$info['company_id']);
            $stmt->bindParam(":report_year",$info['report_year']);
            $report_creation = $stmt->execute();
            if($report_creation) {
                $pa_report_id = $dbobject->lastInsertId();
                $stmt = $dbobject->prepare("insert into `pa_report_meeting_details` (`pa_reports_id`, `meeting_type`, `meeting_date`,`meeting_time`, `e_voting_platform`, `e_voting_platform_website`, `e_voting_start_date`, `e_voting_end_date`, `notice_link`, `meeting_venue`,`annual_report_name`, `annual_report`, `voting_deadline`) VALUES (:pa_reports_id, :meeting_type, :meeting_date,:meeting_time ,:e_voting_platform , :e_voting_platform_website, :e_voting_start_date, :e_voting_end_date, :notice_link, :meeting_venue ,:annual_report_name, :annual_report ,:voting_deadline)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":meeting_type",$info['meeting_type']);
                $stmt->bindParam(":meeting_date",$info['meeting_date']);
                $stmt->bindParam(":meeting_time",$info['meeting_time']);
                $stmt->bindParam(":e_voting_platform",$info['e_voting_platform']);
                $stmt->bindParam(":e_voting_platform_website",$info['e_voting_platform_website']);
                $stmt->bindParam(":e_voting_start_date",$info['e_voting_start_date']);
                $stmt->bindParam(":e_voting_end_date",$info['e_voting_end_date']);
                $stmt->bindParam(":notice_link",$info['notice_link']);
                $stmt->bindParam(":meeting_venue",$info['meeting_venue']);
                $stmt->bindParam(":annual_report_name",$info['annual_report_name']);
                $stmt->bindParam(":annual_report",$info['annual_report']);
                $stmt->bindParam(":voting_deadline",$info['voting_deadline']);
                if($stmt->execute()) {
                    $response['status'] = 200;
                    $response['msg'] = "Information saved successfully";
                    $_SESSION['report_id'] = $pa_report_id;
                    $_SESSION['company_id'] = $info['company_id'];
                    $_SESSION['report_year'] = $info['report_year'];
                }
                else {
                    $response['msg'] = "Internal Error Occured";
                    $response['status'] = 500;
                }
            }
            else {
                $response['msg'] = "Internal Error Occured";
                $response['status'] = 500;
            }
        }
        $dbobject = null;
        return $response;
    }
    function savePage2Details($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $pa_report_id = $_SESSION['report_id'];
        $total_rows = count($info['resolution']);
        if(isset($info['report_data_exists'])) {
            $stmt = $dbobject->prepare("delete from `pa_report_agenda_items` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            if($stmt->execute()) {
                $response['status']=200;
                $response['msg'] = "Data updated successfully";
            }
            else {
                $response['status']=500;
                $response['msg'] = "Internal Error Occured";
            }
        }
        else {
            $response['status']=200;
            $response['msg'] = "Data saved successfully";
        }
        for($i=1;$i<$total_rows;$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_agenda_items` (`pa_reports_id`, `resolution`, `type`, `recommendation`, `focus`) VALUES (:pa_reports_id, :resolution, :type, :recommendation , :focus)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":resolution",$info['resolution'][$i]);
            $stmt->bindParam(":type",$info['type'][$i]);
            $stmt->bindParam(":recommendation",$info['recommendation'][$i]);
            $stmt->bindParam(":focus",$info['focus'][$i]);
            $stmt->execute();
        }
        $dbobject = null;
        return $response;
    }
    function saveCompanyBackgroundDetails($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $pa_report_id = $_SESSION['report_id'];

        if(isset($info['report_data_exists'])) {
            $stmt = $dbobject->prepare("delete from `pa_report_market_data` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_financial_indicators` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_peer_comparision` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_top_public_shareholders` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_major_promoters` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_shareholding_patterns` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
        }

        $stmt = $dbobject->prepare("insert into `pa_report_market_data` (`pa_reports_id`, `price`, `market_capitalization`, `shares`, `pe_ratio`) VALUES (:pa_reports_id, :price, :market_capitalization, :shares , :pe_ratio)");
        $stmt->bindParam(":pa_reports_id",$pa_report_id);
        $stmt->bindParam(":price",$info['price']);
        $stmt->bindParam(":market_capitalization",$info['market_capitalization']);
        $stmt->bindParam(":shares",$info['shares']);
        $stmt->bindParam(":pe_ratio",$info['pe_ratio']);

        if($stmt->execute()) {

            for($i=0;$i<=2;$i++) {
                $stmt = $dbobject->prepare("insert into `pa_report_financial_indicators` (`pa_reports_id`, `financial_year`, `revenue`, `other_income`, `total_income`, `pbdt`, `net_profit`, `eps`, `dividend_per_share`, `dividend_pay_out`, `opm`, `npm`) VALUES (:pa_reports_id, :financial_year, :revenue, :other_income, :total_income, :pbdt, :net_profit, :eps, :dividend_per_share, :dividend_pay_out, :opm, :npm)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":financial_year",$info['financial_indicators_year'][$i]);
                $stmt->bindParam(":revenue",$info['financial_indicators_revenue'][$i]);
                $stmt->bindParam(":other_income",$info['financial_indicators_other_income'][$i]);
                $stmt->bindParam(":total_income",$info['financial_indicators_total_income'][$i]);
                $stmt->bindParam(":pbdt",$info['financial_indicators_pbdt'][$i]);
                $stmt->bindParam(":net_profit",$info['financial_indicators_net_profit'][$i]);
                $stmt->bindParam(":eps",$info['financial_indicators_eps'][$i]);
                $stmt->bindParam(":dividend_per_share",$info['financial_indicators_dividend_per_share'][$i]);
                $stmt->bindParam(":dividend_pay_out",$info['financial_indicators_dividend_pay_out'][$i]);
                $stmt->bindParam(":opm",$info['financial_indicators_opm'][$i]);
                $stmt->bindParam(":npm",$info['financial_indicators_npm'][$i]);
                $stmt->execute();
            }

            for($i=0;$i<=1;$i++) {
                $stmt = $dbobject->prepare("insert into `pa_report_peer_comparision` (`pa_reports_id`,`peer_company_id`, `financial_year`, `revenue`, `other_income`, `total_income`, `pbdt`, `net_profit`, `eps`, `dividend_per_share`, `dividend_pay_out`, `opm`, `npm`) VALUES (:pa_reports_id, :peer_company_id, :financial_year, :revenue, :other_income, :total_income, :pbdt, :net_profit, :eps, :dividend_per_share, :dividend_pay_out, :opm, :npm)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":peer_company_id",$info['peer_comparision_company_id'][$i]);
                $stmt->bindParam(":financial_year",$info['peer_comparision_year'][$i]);
                $stmt->bindParam(":revenue",$info['peer_comparision_revenue'][$i]);
                $stmt->bindParam(":other_income",$info['peer_comparision_other_income'][$i]);
                $stmt->bindParam(":total_income",$info['peer_comparision_total_income'][$i]);
                $stmt->bindParam(":pbdt",$info['peer_comparision_pbdt'][$i]);
                $stmt->bindParam(":net_profit",$info['peer_comparision_net_profit'][$i]);
                $stmt->bindParam(":eps",$info['peer_comparision_eps'][$i]);
                $stmt->bindParam(":dividend_per_share",$info['peer_comparision_dividend_per_share'][$i]);
                $stmt->bindParam(":dividend_pay_out",$info['peer_comparision_dividend_pay_out'][$i]);
                $stmt->bindParam(":opm",$info['peer_comparision_opm'][$i]);
                $stmt->bindParam(":npm",$info['peer_comparision_npm'][$i]);
                $stmt->execute();
            }

            $total_shareholders = count($info['share_holder_name']);

            for ($i=0;$i<$total_shareholders;$i++) {
                $stmt = $dbobject->prepare("insert into `pa_report_top_public_shareholders` (`pa_reports_id`,`holder_month`, `financial_year`, `share_holder_name`, `share_holding`) VALUES (:pa_reports_id,:holder_month, :financial_year, :share_holder_name, :share_holding)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":holder_month",$info['public_shareholder_month']);
                $stmt->bindParam(":financial_year",$info['public_shareholder_year']);
                $stmt->bindParam(":share_holder_name",$info['share_holder_name'][$i]);
                $stmt->bindParam(":share_holding",$info['share_holding'][$i]);
                $stmt->execute();
            }

            $total_promoters = count($info['major_promoter_name']);

            for ($i=0;$i<$total_promoters;$i++) {
                $stmt = $dbobject->prepare("insert into `pa_report_major_promoters` (`pa_reports_id`,`holder_month`, `financial_year`, `major_promoter_name`, `share_holding`) VALUES (:pa_reports_id,:holder_month, :financial_year, :major_promoter_name, :share_holding)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":holder_month",$info['public_shareholder_month']);
                $stmt->bindParam(":financial_year",$info['public_shareholder_year']);
                $stmt->bindParam(":major_promoter_name",$info['major_promoter_name'][$i]);
                $stmt->bindParam(":share_holding",$info['major_promoter_share_holding'][$i]);
                $stmt->execute();
            }

            $public_shareholder_year = intval($info['public_shareholder_year']);

            for ($j=0,$i=$public_shareholder_year;$i>($public_shareholder_year-4);$i--,$j++) {
                $stmt = $dbobject->prepare("insert into `pa_report_shareholding_patterns` (`pa_reports_id`,`holder_month`, `financial_year`, `promoter`, `fii`,`dii`,`others`) VALUES (:pa_reports_id,:holder_month, :financial_year, :promoter, :fii,:dii,:others)");
                $stmt->bindParam(":pa_reports_id",$pa_report_id);
                $stmt->bindParam(":holder_month",$info['public_shareholder_month']);
                $stmt->bindParam(":financial_year",$i);
                $stmt->bindParam(":promoter",$info['promoter'][$j]);
                $stmt->bindParam(":fii",$info['fii'][$j]);
                $stmt->bindParam(":dii",$info['dii'][$j]);
                $stmt->bindParam(":others",$info['others'][$j]);
                $stmt->execute();
            }
            $response['status'] = 200;
        }
        else {
            $response['status'] = 500;
        }
        $dbobject = null;
        return $response;
    }
    function getCurrentReportCompanyDetails($report_id) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare(" select `companies`.`peer1`,`companies`.`peer2`, `companies`.`name`, `companies`.`bse_code` from `companies` INNER JOIN `pa_reports` ON `pa_reports`.`company_id`=`companies`.`id` where `pa_reports`.`report_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['company_bse_code'] = $row['bse_code'];
        $response['company_name'] = $row['name'];
        $response['peer_1_company_id'] = $row['peer1'];
        $response['peer_2_company_id'] = $row['peer2'];

        $stmt = $dbobject->prepare(" select * from `companies` where `id`=:peer_1_company_id");
        $stmt->bindParam(':peer_1_company_id',$response['peer_1_company_id']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['peer_1_bse_code'] = $row['bse_code'];
        $response['peer_1_company_name'] = $row['name'];
        $response['peer_1_company_name'] = $row['name'];

        $stmt = $dbobject->prepare(" select * from `companies` where `id`=:peer_2_company_id");
        $stmt->bindParam(':peer_2_company_id',$response['peer_2_company_id']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['peer_2_bse_code'] = $row['bse_code'];
        $response['peer_2_company_name'] = $row['name'];
        $response['peer_2_company_name'] = $row['name'];

        $dbobject = null;
        return $response;
    }
    function getCompanyDirectors($company_id,$financial_year=0) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $company_directors = array();
        if($financial_year!=0) {
            $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year");
            $stmt->bindParam(":financial_year",$financial_year);
        }
        else {
            $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` where `director_info`.`company_id`=:company_id");
        }
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $company_directors[]=$row;
        }
        $dbobject = null;
        return $company_directors;
    }
    function getStandardAnalysisText($table_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `ses_standard_analysis_text` where `id`=:table_id");
        $stmt->bindParam(":table_id",$table_id);
        $stmt->execute();
        $response = $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbobject = null;
        return $response;
    }
    function getRecommendationAnalysisText($table_ids) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $array_table_ids = json_decode(stripslashes($table_ids),true);
        $total_ids = count($array_table_ids);
        for ($i=0; $i <$total_ids ; $i++) {
            $array_table_id[] = $array_table_ids[$i]['table_id'];
        }
        $ids = implode(",",$array_table_id);
        $stmt = $dbobject->prepare(" select * from `ses_standard_recommendation_text` where `id` IN ($ids)");
        $stmt->execute();
        $string_text = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $string_text.="<p>".$row['recommendation_text']."</p>";
        }
        $dbobject = null;
        return $string_text;
    }
    function setStandardAnalysisText($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" insert into `ses_standard_analysis_text` (`used_in`,`section_name`,`question`,`analysis_text`) values(:used_in,:section_name,:question,:analysis_text)");
        $stmt->bindParam(":used_in",$info['used_in']);
        $stmt->bindParam(":section_name",$info['section_name']);
        $stmt->bindParam(":question",$info['question']);
        $stmt->bindParam(":analysis_text",$info['analysis_text']);
        if($stmt->execute()) {
            return "Success";
        }
        else {
            return "Failed";
        }
        $dbobject = null;
    }
    function getCompanyDividendData($company_id,$financial_year) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare(" select * from `dividend_info`  where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['count']=1;
        }
        else {
            $response['count']=0;
        }
        $dbobject = null;
        return $response;
    }
    function getCompanyDirectorsWithPay($company_id,$financial_year) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $company_directors = array();
        $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and (`director_remuneration`.`rem_year`=:financial_year and `director_remuneration`.`company_id`=:company_id)");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $company_directors[]=$row;
        }
        $dbobject = null;
        return $company_directors;
    }
    function saveBoardOfDirectorsDetails($info) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $pa_report_id = $_SESSION['report_id'];
        if(isset($info['report_data_exists'])) {
            $stmt = $dbobject->prepare("delete from `pa_report_board_profile` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
            $stmt = $dbobject->prepare("delete from `pa_report_board_independence` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id",$pa_report_id);
            $stmt->execute();
        }
        for($i=0;$i<count($info['dir_name']);$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_board_profile` (`pa_reports_id`, `dir_name`, `appointment`,`company_classfification`,`ses_classification`,`expertise`,`tenure`,`directorship`,`comm_membership`,`pay`) VALUES (:pa_reports_id, :dir_name, :appointment,:company_classfification, :ses_classification,:expertise,:tenure,:directorship,:comm_membership,:pay)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":dir_name",$info['dir_name'][$i]);
            $stmt->bindParam(":appointment",$info['appointment'][$i]);
            $stmt->bindParam(":company_classfification",$info['com_classification'][$i]);
            $stmt->bindParam(":ses_classification",$info['ses_classification'][$i]);
            $stmt->bindParam(":expertise",$info['expertise'][$i]);
            $stmt->bindParam(":tenure",$info['tenure'][$i]);
            $stmt->bindParam(":directorship",$info['directorship'][$i]);
            $stmt->bindParam(":comm_membership",$info['comm_membership'][$i]);
            $stmt->bindParam(":pay",$info['pay'][$i]);
            $stmt->execute();
        }
        $stmt = $dbobject->prepare("insert into `pa_report_board_independence` (`pa_reports_id`,`standard_text`, `id_as_per_ses`, `nid_as_per_ses`,`nid_as_per_company`,`id_as_per_company`,`retiring`,`non_retiring`,`not_applicable`,`board_analysis_text`,`liable_analysis_text`) VALUES (:pa_reports_id,:standard_text ,:id_as_per_ses, :nid_as_per_ses,:nid_as_per_company, :id_as_per_company,:retiring,:non_retiring,:not_applicable,:board_analysis_text,:liable_analysis_text)");
        $stmt->bindParam(":pa_reports_id",$pa_report_id);
        $stmt->bindParam(":standard_text",$info['standard_text']);
        $stmt->bindParam(":id_as_per_ses",$info['id_as_per_ses']);
        $stmt->bindParam(":nid_as_per_ses",$info['nid_as_per_ses']);
        $stmt->bindParam(":nid_as_per_company",$info['nid_as_per_company']);
        $stmt->bindParam(":id_as_per_company",$info['id_as_per_company']);
        $stmt->bindParam(":retiring",$info['retiring']);
        $stmt->bindParam(":non_retiring",$info['non_retiring']);
        $stmt->bindParam(":not_applicable",$info['not_applicable']);
        $stmt->bindParam(":board_analysis_text",$info['board_analysis_text']);
        $stmt->bindParam(":liable_analysis_text",$info['liable_analysis_text']);
        $stmt->execute();

        $response['status']=200;
        $dbobject = null;
        return $response;
    }
    function companyBoardOfDirectors($company_id,$financial_year) {
        $generic_details = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);

        // Audit Committee Calculations
        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `audit_committee`='C' ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $committee_chairman_company_class = $row['company_classification'];
        $committee_chairman_ses_class = $row['ses_classification'];
        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`audit_committee`='C' or `audit_committee`='M') ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $total_committee_member = $stmt->rowCount();
        $total_company_id = 0;
        $total_ses_id = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['company_classification']=="ID") {
                $total_company_id++;
            }
            if($row['ses_classification']=="ID") {
                $total_ses_id++;
            }
        }
        $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
        $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
        $stmt = $dbobject->prepare(" select max(held) from `audit_committee_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $committee_meetings_held =$row[0];
        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`audit_committee_attendance`.`dir_din_no` where `audit_committee_attendance`.`company_id`=:company_id and `audit_committee_attendance`.`att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $directors = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $held = $row['held'];
            $attended = $row['attended'];
            if($held!=0) {
                $per = round($attended/$held*100,2);
                if($per<75) {
                    $per = round($per);
                    $directors[]=$row['dir_name']."(".$per."%)";
                }
            }
        }
        if(count($directors)!=0)
            $final_directors = implode(",",$directors);
        else
            $final_directors = 0;

        $generic_details['audit_committee_info'] = array(
            'total_members'=>$total_committee_member,
            "audit_committee_chairman_company_class"=>$committee_chairman_company_class,
            "audit_committee_chairman_ses_class"=>$committee_chairman_ses_class,
            "audit_company_independence"=>$total_company_id_per,
            "audit_ses_independence"=>$total_ses_id_per,
            "audit_committee_meetings_held" => $committee_meetings_held,
            "total_directors"=>$final_directors
        );

        // Investors

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `investor_grievance`='C' ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $committee_chairman_company_class = $row['company_classification'];
        $committee_chairman_ses_class = $row['ses_classification'];
        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`investor_grievance`='C' or `investor_grievance`='M') ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $total_committee_member = $stmt->rowCount();
        $total_company_id = 0;
        $total_ses_id = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['company_classification']=="ID") {
                $total_company_id++;
            }
            if($row['ses_classification']=="ID") {
                $total_ses_id++;
            }
        }
        $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
        $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
        $stmt = $dbobject->prepare(" select max(held) from `investors_grievance_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $committee_meetings_held =$row[0];
        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`investors_grievance_attendance`.`dir_din_no` where `investors_grievance_attendance`.`company_id`=:company_id and `investors_grievance_attendance`.`att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $directors = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $held = $row['held'];
            $attended = $row['attended'];
            if($held!=0) {
                $per = round($attended / $held * 100, 2);
                if ($per < 75) {
                    $directors[] = $row['dir_name'] . "(" . $per . ")";
                }
            }
        }
        if(count($directors)!=0)
            $final_directors = implode(",",$directors);
        else
            $final_directors = 0;
        $generic_details['investor_committee_info'] = array(
            'total_members'=>$total_committee_member,
            "committee_chairman_company_class"=>$committee_chairman_company_class,
            "committee_chairman_ses_class"=>$committee_chairman_ses_class,
            "company_independence"=>$total_company_id_per,
            "ses_independence"=>$total_ses_id_per,
            "committee_meetings_held" => $committee_meetings_held,
            "total_directors"=>$final_directors
        );

        // Remuneration and Nomination Calculation

        $stmt = $dbobject->prepare(" select *  from `nomination_remuneration_committee_info` where `id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $is_rem_nom_same = $row['are_committees_seperate']=='yes' ? 'no' : 'yes';
        if($is_rem_nom_same=='yes') {

            $generic_details['rem_nom_same'] = 'yes';

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `nomination_remuneration`='C' ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $committee_chairman_company_class = $row['company_classification'];
            $committee_chairman_ses_class = $row['ses_classification'];

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination_remuneration`='C' or `nomination_remuneration`='M') ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $total_committee_member = $stmt->rowCount();
            $total_company_id = 0;
            $total_ses_id = 0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if($row['company_classification']=="ID") {
                    $total_company_id++;
                }
                if($row['ses_classification']=="ID") {
                    $total_ses_id++;
                }
            }
            $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
            $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
            $stmt = $dbobject->prepare("select max(held) from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $committee_meetings_held =$row[0];
            $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`nomination_remuneration_committee_attendance`.`dir_din_no` where `nomination_remuneration_committee_attendance`.`company_id`=:company_id and `nomination_remuneration_committee_attendance`.`att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $directors = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $held = $row['held'];
                $attended = $row['attended'];
                if(($held=="ND" || $held=="nd") && ($attended=="ND" || $attended=="nd")) {
                    $per = "ND";
                    $directors[]=$row['dir_name']."(".$per.")";
                }
                else {
                    if($held!=0) {
                        $per = round($attended / $held * 100, 2);
                        if ($per < 75) {
                            $directors[] = $row['dir_name'] . "(" . $per . ")";
                        }
                    }
                }
            }
            if(count($directors)!=0)
                $final_directors = implode(",",$directors);
            else
                $final_directors = 0;
            $generic_details['nomination_remuneration_committee'] = array(
                'total_members'=>$total_committee_member,
                "committee_chairman_company_class"=>$committee_chairman_company_class,
                "committee_chairman_ses_class"=>$committee_chairman_ses_class,
                "company_independence"=>$total_company_id_per,
                "ses_independence"=>$total_ses_id_per,
                "committee_meetings_held" => $committee_meetings_held,
                "total_directors"=>$final_directors
            );
        }
        else {
            $generic_details['rem_nom_same'] = 'no';

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `nomination`='C' ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $committee_chairman_company_class = $row['company_classification'];
            $committee_chairman_ses_class = $row['ses_classification'];

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination`='C' or `nomination`='M') ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $total_committee_member = $stmt->rowCount();
            $total_company_id = 0;
            $total_ses_id = 0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if($row['company_classification']=="ID") {
                    $total_company_id++;
                }
                if($row['ses_classification']=="ID") {
                    $total_ses_id++;
                }
            }
            $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
            $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
            $stmt = $dbobject->prepare(" select max(held) from `nomination_committee_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $committee_meetings_held =$row[0];
            $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`nomination_committee_attendance`.`dir_din_no` where `nomination_committee_attendance`.`company_id`=:company_id and `nomination_committee_attendance`.`att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $directors = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//                $held = $row['held'];
//                $attended = $row['attended'];
//                $per = round($attended/$held*100,2);
//                if($per<75) {
//                    $directors[]=$row['dir_name']."(".$per.")";
//                }

                $held = $row['held'];
                $attended = $row['attended'];
                if(($held=="ND" || $held=="nd") && ($attended=="ND" || $attended=="nd")) {
                    $per = "ND";
                    $directors[]=$row['dir_name']."(".$per.")";
                }
                else {
                    if($held!=0) {
                        $per = round($attended / $held * 100, 2);
                        if ($per < 75) {
                            $directors[] = $row['dir_name'] . "(" . $per . ")";
                        }
                    }
                }
            }
            if(count($directors)!=0)
                $final_directors = implode(",",$directors);
            else
                $final_directors = 0;
            $generic_details['nomination_committee_info'] = array(
                'total_members'=>$total_committee_member,
                "committee_chairman_company_class"=>$committee_chairman_company_class,
                "committee_chairman_ses_class"=>$committee_chairman_ses_class,
                "company_independence"=>$total_company_id_per,
                "ses_independence"=>$total_ses_id_per,
                "committee_meetings_held" => $committee_meetings_held,
                "total_directors"=>$final_directors
            );


            // Remuneration Committee Info

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `remuneration`='C' ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $committee_chairman_company_class = $row['company_classification'];
            $committee_chairman_ses_class = $row['ses_classification'];

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`remuneration`='C' or `remuneration`='M') ");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $total_committee_member = $stmt->rowCount();
            $total_company_id = 0;
            $total_ses_id = 0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if($row['company_classification']=="ID") {
                    $total_company_id++;
                }
                if($row['ses_classification']=="ID") {
                    $total_ses_id++;
                }
            }
            $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
            $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
            $stmt = $dbobject->prepare(" select max(held) from `remuneration_committee_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $committee_meetings_held =$row[0];
            $stmt = $dbobject->prepare(" select * from `remuneration_committee_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`remuneration_committee_attendance`.`dir_din_no` where `remuneration_committee_attendance`.`company_id`=:company_id and `remuneration_committee_attendance`.`att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $directors = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//                $held = $row['held'];
//                $attended = $row['attended'];
//                $per = round($attended/$held*100,2);
//                if($per<75) {
//                    $directors[]=$row['dir_name']."(".$per.")";
//                }

                $held = $row['held'];
                $attended = $row['attended'];
                if(($held=="ND" || $held=="nd") && ($attended=="ND" || $attended=="nd")) {
                    $per = "ND";
                    $directors[]=$row['dir_name']."(".$per.")";
                }
                else {
                    if($held!=0) {
                        $per = round($attended / $held * 100, 2);
                        if ($per < 75) {
                            $directors[] = $row['dir_name'] . "(" . $per . ")";
                        }
                    }
                }
            }
            if(count($directors)!=0)
                $final_directors = implode(",",$directors);
            else
                $final_directors = 0;
            $generic_details['remuneration_committee_info'] = array(
                'total_members'=>$total_committee_member,
                "committee_chairman_company_class"=>$committee_chairman_company_class,
                "committee_chairman_ses_class"=>$committee_chairman_ses_class,
                "company_independence"=>$total_company_id_per,
                "ses_independence"=>$total_ses_id_per,
                "committee_meetings_held" => $committee_meetings_held,
                "total_directors"=>$final_directors
            );
        }


        // CSR

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `csr`='C' ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $committee_chairman_company_class = $row['company_classification'];
        $committee_chairman_ses_class = $row['ses_classification'];
        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`csr`='C' or `csr`='M') ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $total_committee_member = $stmt->rowCount();
        $total_company_id = 0;
        $total_ses_id = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['company_classification']=="ID") {
                $total_company_id++;
            }
            if($row['ses_classification']=="ID") {
                $total_ses_id++;
            }
        }
        $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
        $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
        $stmt = $dbobject->prepare(" select max(held) from `csr_committee_meetings_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $committee_meetings_held =$row[0];
        $stmt = $dbobject->prepare(" select * from `csr_committee_meetings_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`csr_committee_meetings_attendance`.`dir_din_no` where `csr_committee_meetings_attendance`.`company_id`=:company_id and `csr_committee_meetings_attendance`.`att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $directors = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $held = $row['held'];
//            $attended = $row['attended'];
//            $per = round($attended/$held*100,2);
//            if($per<75) {
//                $directors[]=$row['dir_name']."(".$per.")";
//            }

            $held = $row['held'];
            $attended = $row['attended'];
            if(($held=="ND" || $held=="nd") && ($attended=="ND" || $attended=="nd")) {
                $per = "ND";
                $directors[]=$row['dir_name']."(".$per.")";
            }
            else {
                if($held!=0) {
                    $per = round($attended / $held * 100, 2);
                    if ($per < 75) {
                        $directors[] = $row['dir_name'] . "(" . $per . ")";
                    }
                }
            }
        }
        if(count($directors)!=0)
            $final_directors = implode(",",$directors);
        else
            $final_directors = 0;
        $generic_details['csr_committee_info'] = array(
            'total_members'=>$total_committee_member,
            "committee_chairman_company_class"=>$committee_chairman_company_class,
            "committee_chairman_ses_class"=>$committee_chairman_ses_class,
            "company_independence"=>$total_company_id_per,
            "ses_independence"=>$total_ses_id_per,
            "committee_meetings_held" => $committee_meetings_held,
            "total_directors"=>$final_directors
        );

        // Risk Committee

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `risk_management_committee`='C' ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $committee_chairman_company_class = $row['company_classification'];
        $committee_chairman_ses_class = $row['ses_classification'];

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`risk_management_committee`='C' or `risk_management_committee`='M') ");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $total_committee_member = $stmt->rowCount();
        $total_company_id = 0;
        $total_ses_id = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['company_classification']=="ID") {
                $total_company_id++;
            }
            if($row['ses_classification']=="ID") {
                $total_ses_id++;
            }
        }
        $total_company_id_per = round($total_company_id/$total_committee_member*100,2);
        $total_ses_id_per = round($total_ses_id/$total_committee_member*100,2);
        $stmt = $dbobject->prepare(" select max(held) from `risk_management_committee_meetings_attendance` where `company_id`=:company_id and `att_year`=:financial_year LIMIT 1");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $committee_meetings_held =$row[0];
        $stmt = $dbobject->prepare(" select * from `risk_management_committee_meetings_attendance` INNER JOIN `directors` ON `directors`.`din_no`=`risk_management_committee_meetings_attendance`.`dir_din_no` where `risk_management_committee_meetings_attendance`.`company_id`=:company_id and `risk_management_committee_meetings_attendance`.`att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $directors = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $held = $row['held'];
//            $attended = $row['attended'];
//            $per = round($attended/$held*100,2);
//            if($per<75) {
//                $directors[]=$row['dir_name']."(".$per.")";
//            }
            $held = $row['held'];
            $attended = $row['attended'];
            if(($held=="ND" || $held=="nd") && ($attended=="ND" || $attended=="nd")) {
                $per = "ND";
                $directors[]=$row['dir_name']."(".$per.")";
            }
            else {
                if($held!=0) {
                    $per = round($attended / $held * 100, 2);
                    if ($per < 75) {
                        $directors[] = $row['dir_name'] . "(" . $per . ")";
                    }
                }
            }
        }
        if(count($directors)!=0)
            $final_directors = implode(",",$directors);
        else
            $final_directors = 0;
        $generic_details['risk_committee_info'] = array(
            'total_members'=>$total_committee_member,
            "committee_chairman_company_class"=>$committee_chairman_company_class,
            "committee_chairman_ses_class"=>$committee_chairman_ses_class,
            "company_independence"=>$total_company_id_per,
            "ses_independence"=>$total_ses_id_per,
            "committee_meetings_held" => $committee_meetings_held,
            "total_directors"=>$final_directors
        );

        // Board Governance Score

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $ses_id_classification = 0;
        $tenure_greater_10 = 0;
        $fourth_row_response = 'no';
        $fourth_row_score = 0;
        $ninth_row_response = 0;
        $company_id_classification=0;
        $total_board_directors = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['additional_classification']!="C(Resign)" && $row['additional_classification']!="M(Resign)") {
                $total_board_directors++;
            }
            if($row['ses_classification']=="ID" && $row['additional_classification']!="C(Resign)" && $row['additional_classification']!="M(Resign)") {
                $ses_id_classification++;
            }
            if($row['company_classification']=="ID" && $row['additional_classification']!="C(Resign)" && $row['additional_classification']!="M(Resign)") {
                $company_id_classification++;
            }
            if($row['company_classification']=="ID" && $row['additional_classification']!="C(Resign)" && $row['additional_classification']!="M(Resign)" && $row['current_tenure']>10) {
                $tenure_greater_10++;
            }
            if($row['additional_classification']=='C') {
                if($row['ses_classification']=='ID') {
                    $fourth_row_response = 'yes';
                    $fourth_row_score=10;
                }
            }
            if($row['company_classification']=='NEDP' || $row['company_classification']=='EDP') {
                $ninth_row_response++;
            }
        }
        $first_row_response = round($ses_id_classification/$total_board_directors*100,2);
        if($first_row_response<50) {
            $score = 0;
        }
        else {
            $score=10;
        }
        $generic_details['first_row_gov_score'] = array(
            "response"=>$first_row_response,
            "score"=>$score
        );
        $score = (($company_id_classification-$tenure_greater_10)/$company_id_classification)*10;
        $generic_details['second_row_gov_score'] = array(
            "response"=>$tenure_greater_10,
            "score"=>$score
        );
        $generic_details['fourth_row_gov_score'] = array(
            "response"=>$fourth_row_response,
            "score"=>$fourth_row_score
        );
        $ninth_row_score = ($total_board_directors-$ninth_row_response)/$total_board_directors*15;
        $ninth_row_score = round($ninth_row_score,2);
        $generic_details['ninth_row_gov_score'] = array(
            "response"=>$ninth_row_response,
            "score"=>$ninth_row_score
        );
        $generic_details['ses_id_classification'] = $company_id_classification;
        $generic_details['company_id_classification'] = $company_id_classification;
        $dbobject = null;
        return $generic_details;
    }
    function getRemunerationAnalysisDetails($company_id,$financial_year) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $company_directors = array();
        $stmt = $dbobject->prepare(" select `director_info`.`dir_din_no`,`directors`.`dir_name`,`director_info`.`company_classification` from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and `director_remuneration`.`company_id`=:company_id and `director_remuneration`.`rem_year`=:financial_year ORDER BY (`director_remuneration`.`variable_pay`+`director_remuneration`.`fixed_pay`) desc");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['company_classification']=='EDP' || $row['company_classification']=='ED')
                $company_directors[]=$row;
        }
        $dbobject = null;
        return $company_directors;
    }
    function getLast5YearsDividendData($company_id,$start_year,$highest_paid_ed) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $years = range($start_year-4,$start_year);
        $total_dividend = 0;
        $market_price_at_year_start = 1;
        $indexed_tsr = array();
        foreach($years as $year) {

            $stmt=$dbobject->prepare("select * from `dividend_info` where `company_id`=:company_id and `financial_year`=:financial_year");
            $stmt->bindParam(':company_id',$company_id);
            $stmt->bindParam(':financial_year',$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $dividend_temp['market_price_start'] = $row['market_price_start'];
                $dividend_temp['market_price_end'] = $row['market_price_end'];
                $dividend_temp['dividend'] = $row['dividend'];
                $dividend_temp['year'] = $year;
                $total_dividend += floatval($row['dividend']);
                $dividend_temp['total_dividend'] = $total_dividend;
                if($year==$start_year-4) {
                    $market_price_at_year_start = $row['market_price_start'];
                }
                $indexed_tsr[] = ((floatval($row['market_price_end'])+floatval($total_dividend))/$market_price_at_year_start)*100;
            }
            else {
                $dividend_temp['market_price_start'] = "NA";
                $dividend_temp['market_price_end'] = "NA";
                $dividend_temp['dividend'] = "NA";
                $dividend_temp['year'] = $year;
                $dividend_temp['total_dividend'] = 0;
            }
            $dividend_data[] = $dividend_temp;
        }

        // Remuneration Details of Last 5 Years Highest Paid EDP or ED
        $highest_paid_ed_5_years = array();
        $i=0;
        foreach($years as $year) {

            $stmt = $dbobject->prepare(" select * from `director_remuneration` where `company_id`=:company_id and  `dir_din_no`=:din_no and `rem_year`=:financial_year");
            $stmt->bindParam(":company_id", $company_id);
            $stmt->bindParam(":financial_year", $year);
            $stmt->bindParam(":din_no", $highest_paid_ed);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $temp['dir_name'] = $row['dir_name'];
                $temp['year'] = $year;
                $temp['total_pay'] = $row['fixed_pay']+$row['variable_pay'];
                $temp['indexed_tsr'] = $indexed_tsr[$i++];
            }
            else {
                $temp['dir_name'] = "NA";
                $temp['year'] = $year;
                $temp['total_pay'] = 0;
                $temp['indexed_tsr'] = $indexed_tsr[$i++];
            }
            $highest_paid_ed_5_years[] = $temp;
        }

        foreach($years as $year) {
            $stmt = $dbobject->prepare("select * from `company_auditors_info`  where `company_id`=:company_id and `financial_year`=:financial_year ");
            $stmt->bindParam(":company_id", $company_id);
            $stmt->bindParam(":financial_year", $year);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $net_temp['net_profit'] = $row['net_profit'];
                $net_temp['year'] = $year;
            }
            else {
                $net_temp['net_profit'] = 0;
                $net_temp['year'] = $year;
            }
            $net_profits[] = $net_temp;
        }

        $generic_array['dividend_data'] = $dividend_data;
        $generic_array['remuneration_growth'] = $highest_paid_ed_5_years;
        $generic_array['aa'] = $market_price_at_year_start;
        $generic_array['net_profits'] = $net_profits;

        $dbobject = null;
        return $generic_array;
    }
    function getLast6YearsDividendData($company_id,$start_year,$highest_paid_ed) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $years = range($start_year-5,$start_year);
        $total_dividend = 0;
        $market_price_at_year_start = 1;
        $indexed_tsr = array();

        $base_year = $start_year-4;
        $stmt=$dbobject->prepare("select * from `dividend_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(':company_id',$company_id);
        $stmt->bindParam(':financial_year',$base_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $market_price_at_year_start = $row['market_price_start'];
        }

        foreach($years as $year) {

            if($year!=$start_year-5) {
                $stmt=$dbobject->prepare("select * from `dividend_info` where `company_id`=:company_id and `financial_year`=:financial_year");
                $stmt->bindParam(':company_id',$company_id);
                $stmt->bindParam(':financial_year',$year);
                $stmt->execute();
                if($stmt->rowCount()>0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $dividend_temp['market_price_start'] = $row['market_price_start'];
                    $dividend_temp['market_price_end'] = $row['market_price_end'];
                    $dividend_temp['dividend'] = $row['dividend'];
                    $dividend_temp['year'] = $year;
                    $total_dividend += floatval($row['dividend']);
                    $dividend_temp['total_dividend'] = $total_dividend;
                    $indexed_tsr[] = ((floatval($row['market_price_end'])+floatval($total_dividend))/$market_price_at_year_start)*100;
                }
                else {
                    $dividend_temp['market_price_start'] = "NA";
                    $dividend_temp['market_price_end'] = "NA";
                    $dividend_temp['dividend'] = "NA";
                    $dividend_temp['year'] = $year;
                    $dividend_temp['total_dividend'] = 0;
                    $indexed_tsr[] = 0;
                }
                $dividend_data[] = $dividend_temp;
            }
            else {
                $indexed_tsr[] = 0;
            }
        }

        // Remuneration Details of Last 5 Years Highest Paid EDP or ED
        $highest_paid_ed_5_years = array();
        $i=0;
        foreach($years as $year) {

            $stmt = $dbobject->prepare(" select * from `director_remuneration` where `company_id`=:company_id and  `dir_din_no`=:din_no and `rem_year`=:financial_year");
            $stmt->bindParam(":company_id", $company_id);
            $stmt->bindParam(":financial_year", $year);
            $stmt->bindParam(":din_no", $highest_paid_ed);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $temp['dir_name'] = $row['dir_name'];
                $temp['year'] = $year;
                $temp['total_pay'] = $row['fixed_pay']+$row['variable_pay'];
                $temp['indexed_tsr'] = $indexed_tsr[$i++];
            }
            else {
                $temp['dir_name'] = "NA";
                $temp['year'] = $year;
                $temp['total_pay'] = 0;
                $temp['indexed_tsr'] = $indexed_tsr[$i++];
            }
            $highest_paid_ed_5_years[] = $temp;
        }

        foreach($years as $year) {
            $stmt = $dbobject->prepare("select * from `company_auditors_info`  where `company_id`=:company_id and `financial_year`=:financial_year ");
            $stmt->bindParam(":company_id", $company_id);
            $stmt->bindParam(":financial_year", $year);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $net_temp['net_profit'] = $row['net_profit'];
                $net_temp['year'] = $year;
            }
            else {
                $net_temp['net_profit'] = 0;
                $net_temp['year'] = $year;
            }
            $net_profits[] = $net_temp;
        }

        $generic_array['dividend_data'] = $dividend_data;
        $generic_array['remuneration_growth'] = $highest_paid_ed_5_years;
        $generic_array['aa'] = $market_price_at_year_start;
        $generic_array['net_profits'] = $net_profits;

        $dbobject = null;
        return $generic_array;
    }
    function executiveRemnunerationPeerComparisionData($company_id,$financial_year) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $response = array();
        $stmt = $dbobject->prepare(" select `companies`.`peer1`,`companies`.`peer2`, `companies`.`name`, `companies`.`bse_code` from `companies` where `id`=:company_id");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['company_name'] = $row['name'];
        $response['peer_1_company_id'] = $row['peer1'];
        $response['peer_2_company_id'] = $row['peer2'];
        $stmt = $dbobject->prepare(" select * from `companies` where `id`=:peer_1_company_id");
        $stmt->bindParam(':peer_1_company_id',$response['peer_1_company_id']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['peer_1_company_name'] = $row['name'];
        $stmt = $dbobject->prepare(" select * from `companies` where `id`=:peer_2_company_id");
        $stmt->bindParam(':peer_2_company_id',$response['peer_2_company_id']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['peer_2_company_name'] = $row['name'];


        // Company Details

        $stmt = $dbobject->prepare("select `director_info`.`company_classification`,`directors`.`dir_name`,`director_remuneration`.`fixed_pay`,`director_remuneration`.`variable_pay` from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and `director_remuneration`.`rem_year`=:financial_year ORDER BY (`director_remuneration`.`variable_pay`+`director_remuneration`.`fixed_pay`) desc LIMIT 1");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['company_director'] = $row['dir_name'];
            $response['company_director_rem'] = $row['fixed_pay']+$row['variable_pay'];
            if($row['company_classification']=="EDP") {
                $response['company_promoter'] = "yes";
            }
            else {
                $response['company_promoter'] = "no";
            }
        }
        else {
            $response['company_director'] = "NA";
            $response['company_director_rem'] = 0;
            $response['company_promoter'] = "no";
        }
        $stmt = $dbobject->prepare("select `net_profit` from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['company_net_profit'] = $row['net_profit'];
        }
        else {
            $response['company_net_profit'] = 0;
        }

        if($response['company_net_profit'] != 0) {
            $response['company_rem_per'] = ($response['company_director_rem']/$response['company_net_profit']) * 100;
        }

        // Peer1 Details

        $company_id = $response['peer_1_company_id'];

        $stmt = $dbobject->prepare("select `director_info`.`company_classification`,`directors`.`dir_name`,`director_remuneration`.`fixed_pay`,`director_remuneration`.`variable_pay` from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and `director_remuneration`.`rem_year`=:financial_year ORDER BY (`director_remuneration`.`variable_pay`+`director_remuneration`.`fixed_pay`) desc LIMIT 1");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['peer_1_director'] = $row['dir_name'];
            $response['peer_1_director_rem'] = $row['fixed_pay']+$row['variable_pay'];
            if($row['peer_1_classification']=="EDP") {
                $response['peer_1_promoter'] = "yes";
            }
            else {
                $response['peer_1_promoter'] = "no";
            }
        }
        else {
            $response['peer_1_director'] = "NA";
            $response['peer_1_director_rem'] = 0;
            $response['peer_1_promoter'] = "no";
        }
        $stmt = $dbobject->prepare("select `net_profit` from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['peer_1_net_profit'] = $row['net_profit'];
        }
        else {
            $response['peer_1_net_profit'] = 0;
        }

        if($response['peer_1_net_profit'] != 0) {
            $response['peer_1_rem_per'] = ($response['peer_1_director_rem']/$response['peer_1_net_profit']) * 100;
        }


        // Peer 2 Details

        $company_id = $response['peer_2_company_id'];

        $stmt = $dbobject->prepare("select `director_info`.`company_classification`,`directors`.`dir_name`,`director_remuneration`.`fixed_pay`,`director_remuneration`.`variable_pay` from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and `director_remuneration`.`rem_year`=:financial_year ORDER BY (`director_remuneration`.`variable_pay`+`director_remuneration`.`fixed_pay`) desc LIMIT 1");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['peer_2_director'] = $row['dir_name'];
            $response['peer_2_director_rem'] = $row['fixed_pay']+$row['variable_pay'];
            if($row['peer_2_classification']=="EDP") {
                $response['peer_2_promoter'] = "yes";
            }
            else {
                $response['peer_2_promoter'] = "no";
            }
        }
        else {
            $response['peer_2_director'] = "NA";
            $response['peer_2_director_rem'] = 0;
            $response['peer_2_promoter'] = "no";
        }
        $stmt = $dbobject->prepare("select `net_profit` from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id", $company_id);
        $stmt->bindParam(":financial_year", $financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['peer_2_net_profit'] = $row['net_profit'];
        }
        else {
            $response['peer_2_net_profit'] = 0;
        }

        if($response['peer_2_net_profit'] != 0) {
            $response['peer_2_rem_per'] = ($response['peer_2_director_rem']/$response['peer_2_net_profit']) * 100;
        }


        $dbobject = null;
        return $response;
    }
    function saveDisclosuresInfo($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $pa_report_id = $_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_disclosures` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $resolution_name = "Disclosure Required in Director's Report";
            $resolution_section = "Disclosure Required in Director's Report";
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$pa_report_id' and `resolution_name`=:resolution_name and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_name",$resolution_name);
            $stmt->bindParam(":resolution_section",$resolution_section);
            $stmt->execute();
        }

        $total_disclosure=count($info['question']);
        $j=1;

        for($i=0;$i<$total_disclosure;$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_disclosures` (`pa_reports_id`, `question_no`, `status`) VALUES (:pa_reports_id, :question_no, :status)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":question_no",$j);
            $stmt->bindParam(":status",$info['question'][$i]);
            $stmt->execute();
            $j++;
        }
        $this->saveAnalysis($info);
        $dbobject=null;
    }
    function getCompanyEDDirectors($company_id,$financial_year) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $company_ed_directors = array();
        $ed="ED";
        $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` where `director_info`.`company_id`=:company_id AND `director_info`.`financial_year`=:financial_year AND `director_info`.`company_classification`=:ed");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->bindParam(":ed",$ed);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $company_ed_directors[]=$row;
        }
        $dbobject = null;
        return $company_ed_directors;
    }
    function getEDDirectorsInfo($din_no) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `directors` where `din_no`=:din_no");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $Ed_directors_info=$row;
        $dbobject = null;
        return $Ed_directors_info;
    }
    function getDirectorPerformanceInfo($din_no,$company_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        // director_agm_attendance
        $yr=date("Y");
        $agm_att_per = 0;
        $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['attended']=='yes') {
                $agm_att_per=33.33;
            }
        }
        $yr1=$yr-1;
        $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr1);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $director_agm_attendance_last_year_attended=$row['attended'];
            if($row['attended']=='yes') {
                $agm_att_per+=33.33;
            }
        }
        $yr=$yr-2;
        $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $director_agm_attendance_last_year_attended=$row['attended'];
            if($row['attended']=='yes') {
                $agm_att_per+=33.33;
            }
        }

        if($agm_att_per==99.99) {
            $agm_att_per = 100;
        }
        $response['agm_per']=$agm_att_per;

        $yr=date("Y");
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $director_board_attendance_attended=$row['attended'];
            $director_board_attendance_held=$row['held'];
            $director_board_attendance_this_year_avg=($director_board_attendance_attended/$director_board_attendance_held)*100;
        }
        else {
            $director_board_attendance_this_year_avg=0;
        }

        $response['director_board_last_avg'] = $director_board_attendance_this_year_avg;

        $yr=intval(date("Y"))-1;
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $director_board_attendance_attended=$row['attended'];
            $director_board_attendance_held=$row['held'];
            $director_board_attendance_last_year_avg=($director_board_attendance_attended/$director_board_attendance_held)*100;
        }
        else {
            $director_board_attendance_last_year_avg=0;
        }

        $yr=intval(date("Y"))-2;
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $director_board_attendance_attended=$row['attended'];
            $director_board_attendance_held=$row['held'];
            $director_board_attendance_last_last_year_avg=($director_board_attendance_attended/$director_board_attendance_held)*100;
        }
        else {
            $director_board_attendance_last_last_year_avg=0;
        }

        $director_board_attendance_avg = ($director_board_attendance_this_year_avg+$director_board_attendance_last_year_avg+$director_board_attendance_last_last_year_avg)/3;

        $response['director_board_attendance_avg']=$director_board_attendance_avg;


        $yr=date("Y");
        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $audit_committee_attendance_attended=$row['attended'];
            $audit_committee_attendance_held=$row['held'];
            $audit_committee_attendance_this_year_avg=($audit_committee_attendance_attended/$audit_committee_attendance_held)*100;
        }
        else {
            $audit_committee_attendance_this_year_avg=0;
        }

        $response['audit_last_avg'] = $audit_committee_attendance_this_year_avg;


        $yr=intval(date("Y"))-1;
        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $audit_committee_attendance_attended=$row['attended'];
            $audit_committee_attendance_held=$row['held'];
            $audit_committee_attendance_last_year_avg=($audit_committee_attendance_attended/$audit_committee_attendance_held)*100;
        }
        else {
            $audit_committee_attendance_last_year_avg=0;
        }

        $yr=intval(date("Y"))-2;
        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $audit_committee_attendance_attended=$row['attended'];
            $audit_committee_attendance_held=$row['held'];
            $audit_committee_attendance_last_last_year_avg=($audit_committee_attendance_attended/$audit_committee_attendance_held)*100;
        }
        else {
            $audit_committee_attendance_last_last_year_avg=0;
        }

        $audit_committee_attendance_avg = ($audit_committee_attendance_this_year_avg+$audit_committee_attendance_last_year_avg+$audit_committee_attendance_last_last_year_avg)/3;

        $response['audit_committee_attendance_avg']=$audit_committee_attendance_avg;

        $yr=date("Y");
        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $investors_grievance_attendance_attended=$row['attended'];
            $investors_grievance_attendance_held=$row['held'];
            $investors_grievance_attendance_this_year_avg=($investors_grievance_attendance_attended/$investors_grievance_attendance_held)*100;
        }
        else {
            $investors_grievance_attendance_this_year_avg=0;
        }

        $response['investors_grievance_last_avg'] = $investors_grievance_attendance_this_year_avg;


        $yr=intval(date("Y"))-1;
        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $investors_grievance_attendance_attended=$row['attended'];
            $investors_grievance_attendance_held=$row['held'];
            $investors_grievance_attendance_last_year_avg=($investors_grievance_attendance_attended/$investors_grievance_attendance_held)*100;
        }
        else {
            $investors_grievance_attendance_last_year_avg=0;
        }

        $yr=intval(date("Y"))-2;
        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `dir_din_no`=:din_no AND `att_year`=:yr AND `company_id`=:company_id");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();

        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $investors_grievance_attendance_attended=$row['attended'];
            $investors_grievance_attendance_held=$row['held'];
            $investors_grievance_attendance_last__last_year_avg=($investors_grievance_attendance_attended/$investors_grievance_attendance_held)*100;
        }
        else {
            $investors_grievance_attendance_last__last_year_avg=0;
        }

        $investors_grievance_attendance_avg = ($investors_grievance_attendance_this_year_avg+$investors_grievance_attendance_last_year_avg+$investors_grievance_attendance_last__last_year_avg)/3;

        $response['investors_grievance_attendance_avg']=$investors_grievance_attendance_avg;

        return $response;

//

    }
    function getDirectorRemunerationInfo($din_no,$company_id) {
        $yr=date('Y');
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":yr",$yr);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['rem_first']=$row['fixed_pay']+$row['variable_pay'];

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $yr=intval(date("Y"))-1;
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['rem_second']=$row['fixed_pay']+$row['variable_pay'];

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $yr=intval(date("Y"))-2;
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['rem_third']=$row['fixed_pay']+$row['variable_pay'];

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $yr=intval(date("Y"))-3;
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['rem_fourth']=$row['fixed_pay']+$row['variable_pay'];

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $yr=intval(date("Y"))-4;
        $stmt->bindParam(":yr",$yr);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['rem_fifth']=$row['fixed_pay']+$row['variable_pay'];



        // calculating last five year tsr data

        $yr = intval(date("Y"));
        $last_year = $yr-4;
        $commulative_dividend = 0;
        $stock_price_begining_year = 0;
        $tsr = array();
        for($i=$last_year;$i<=$yr;$i++) {
            $stmt = $dbobject->prepare(" select * from `dividend_info` where `company_id`=:company_id AND `financial_year`=:yr");
            $stmt->bindParam(":yr",$i);
            $stmt->bindParam(":company_id",$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                if($i==$last_year) {
                    $stock_price_begining_year = $row['market_price_start'];
                }
                $commulative_dividend+=$row['dividend'];

                $tsr[] = ( $row['market_price_end'] + $commulative_dividend ) / $stock_price_begining_year;
            }
            else {
                $tsr[] = 0;
            }
        }
        $director_remuneration['tsr_info'] = $tsr;
        $yr = intval(date("Y"));
        $base_year = $yr-5;
        $net_profit_base_year = 0;
        $cagr = array();
        for($i=$base_year;$i<=$yr;$i++) {
            $stmt = $dbobject->prepare(" select * from `company_auditors_info` where `company_id`=:company_id AND `financial_year`=:yr");
            $stmt->bindParam(":yr",$i);
            $stmt->bindParam(":company_id",$company_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                if($i==$base_year) {
                    $net_profit_base_year = $row['net_profit'];
                }
                else {
                    $current_year_profit = $row['net_profit'];
                    $val = pow(($current_year_profit/$net_profit_base_year),(1/($i-$base_year)))-1;
                    $cagr[] = round($val*100,2)."%";
                }
            }
            else {
                $cagr[] = 0;
            }
        }
        $director_remuneration['cagr_info'] = $cagr;
        $dbobject=null;
        return $director_remuneration;
    }
    function getRemuniration_Info($din_no,$company_id) {
        $year=date('Y');
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":yr",$year);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['2015']=$row;

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $year1=$year-1;
        $stmt->bindParam(":yr",$year1);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['2014']=$row;

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no AND `company_id`=:company_id AND `rem_year`=:yr");
        $year2=$year-2;
        $stmt->bindParam(":yr",$year2);
        $stmt->bindParam(":din_no",$din_no);
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $director_remuneration['2013']=$row;
        $dbobject=null;
        return $director_remuneration;
    }
    function getExecutiveRemunerationPeerComparisonData($din_no,$company_id) {

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select `name`,`peer1`,`peer2` from `companies` where `id`=:company_id");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $generic['company_name'] = $row['name'];

        $stmt = $dbobject->prepare(" select `company_classification` from `director_info` where `dir_din_no`=:din_no");
        $stmt->bindParam(":din_no",$din_no);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $generic['promoter'] = $row['company_classification']=='EDP' ? 'yes' : 'no';

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `dir_din_no`=:din_no and `rem_year`=:rem_year");
        $stmt->bindParam(":din_no",$din_no);
        $yr = date("Y");
        $stmt->bindParam(":rem_year",$yr);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $generic['remuneration'] = $row['fixed_pay']+$row['variable_pay'];

        $stmt = $dbobject->prepare(" select * from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $yr = date("Y");
        $stmt->bindParam(":financial_year",$yr);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $generic['net_profit'] = $row['net_profit'];

        $generic['rem_by_net_profit'] = round($generic['remuneration']/$generic['net_profit'],2);

        return $generic;
    }
    function getBoardIndependence($company_id,$financial_year) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_info`  where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $company_id_no = 0;
        $company_non_id_no = 0;
        $ses_id_no = 0;
        $ses_non_id_no = 0;
        $retiring = 0;
        $non_retiring = 0;
        $na=0;
        $total_dirs =0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if($row['company_classification']=='ID' && $row['company_classification'] !="M(Resign)" && $row['company_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $company_id_no++;
            }
            if($row['company_classification']!='ID' && $row['company_classification'] !="M(Resign)" && $row['company_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $company_non_id_no++;
            }
            if($row['ses_classification']=='ID' && $row['ses_classification'] !="M(Resign)" && $row['ses_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $ses_id_no++;
            }
            if($row['ses_classification']!='ID' && $row['ses_classification'] !="M(Resign)" && $row['ses_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $ses_non_id_no++;
            }
            if($row['retiring_non_retiring']=='Retiring' && $row['company_classification'] !="M(Resign)" && $row['company_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $retiring++;
            }
            if($row['retiring_non_retiring']=='Non Retiring' && $row['company_classification'] !="M(Resign)" && $row['company_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $non_retiring++;
            }
            if($row['retiring_non_retiring']=='NA' && $row['company_classification'] !="M(Resign)" && $row['company_classification'] !="C(Resign)" && $row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $na++;
            }
            if($row['additional_classification'] !="C(Resign)" && $row['additional_classification'] !="M(Resign)") {
                $total_dirs ++;
            }
        }
        $generic['company_id_no']=round(($company_id_no/$total_dirs)*100);
        $generic['company_non_id_no']=round(($company_non_id_no/$total_dirs)*100);
        $generic['ses_id_no']=round(($ses_id_no/$total_dirs)*100);
        $generic['ses_non_id_no']=round(($ses_non_id_no/$total_dirs)*100);
        $generic['retiring']=$retiring;
        $generic['non_retiring']=$non_retiring;
        $generic['liable_analysis_text']=$row['liable_analysis_text'];
        $generic['board_analysis_text']=$row['board_analysis_text'];
        $generic['na']=$na;
        $dbobject = null;
        return $generic;
    }
    function isReportDataExists($report_id,$table_name) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `$table_name`  where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $dbobject = null;
            return true;
        }
        else {
            $dbobject=null;
            return false;
        }
    }
    function getCompanyAndMeetingDetails($report_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `pa_report_meeting_details` where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $dbobject = null;
        return $row;
    }
    function getAgendaItemsAndRecommendations($report_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $agenda_items = array();
        $stmt = $dbobject->prepare(" select * from `pa_report_agenda_items` where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agenda_items[] = $row;
        }
        $dbobject = null;
        return $agenda_items;
    }
    function getCompanyBackgroundData($report_id) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `pa_report_market_data` where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $generic_details['market_data'] = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $dbobject->prepare(" select * from `pa_report_financial_indicators` where `pa_reports_id`=:report_id order by `financial_year` DESC");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $temp[]=$row;
        }
        $generic_details['financial_indicators']=$temp;

        $stmt = $dbobject->prepare(" select * from `pa_report_peer_comparision` INNER JOIN `companies` ON `pa_report_peer_comparision`.`peer_company_id`=`companies`.`id` where `pa_report_peer_comparision`.`pa_reports_id`=:report_id ");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $peer[]=$row;
        }
        $generic_details['peer_comparision']=$peer;

        $stmt = $dbobject->prepare(" select `share_holder_name`,`share_holding`,`holder_month`,`financial_year` from `pa_report_top_public_shareholders` where `pa_reports_id`=:report_id order by `financial_year` DESC");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['share_holding']=$row['share_holding']."%";
            $public_share_holders[]=$row;
        }
        $generic_details['public_share_holders']=$public_share_holders;

        $stmt = $dbobject->prepare(" select `major_promoter_name`,`share_holding` from `pa_report_major_promoters` where `pa_reports_id`=:report_id order by `financial_year` DESC");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $count_shareholders = $stmt->rowCount();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['share_holding']=$row['share_holding']."%";
            $major_promoters[]=$row;
        }
        for($i=$count_shareholders;$i<=6;$i++) {
            $major_promoters[]=array("major_promoter_name"=>"&nbsp;","share_holding"=>"&nbsp;");
        }
        $generic_details['major_promoters']=$major_promoters;

        $stmt = $dbobject->prepare(" select * from `pa_report_shareholding_patterns` where `pa_reports_id`=:report_id order by `financial_year` DESC");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        $share_holding_pattern = array();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $share_holding_pattern[]=$row;
        }
        $generic_details['share_holding_pattern']=$share_holding_pattern;
        $dbobject = null;
        return $generic_details;
    }
    function getCompanyBoardOfDirectors($report_id) {
        $generic_details = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `pa_report_board_profile` where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $temp[]=$row;
        }
        $generic_details['board_directors'] = $temp;

        $stmt = $dbobject->prepare(" select * from `pa_report_board_independence` where `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$report_id);
        $stmt->execute();
//        echo $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $generic_details['board_independence'] = $row;
        $dbobject = null;
        return $generic_details;
    }
    function getAppointedDirectorInfo($company_id,$financial_year,$dir_din_no) {
        $generic_details = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $director_details = $row;
        $generic_details['functional_area'] = $row['expertise'];
        $generic_details['education'] = $row['education'];
        $generic_details['past_ex'] = $row['past_ex'];
        $cpc = array();
        if($row['audit_committee']=='C' || $row['audit_committee']=='M') {
            $cpc[]="A($row[audit_committee])";
        }
        if($row['investor_grievance']=='C' || $row['investor_grievance']=='M') {
            $cpc[]="SR($row[investor_grievance])";
        }
        if($row['nomination_remuneration']=='C' || $row['nomination_remuneration']=='M') {
            $cpc[]="NR($row[nomination_remuneration])";
        }
        if($row['remuneration']=='C' || $row['remuneration']=='M') {
            $cpc[]="R($row[remuneration])";
        }
        if($row['nomination']=='C' || $row['nomination']=='M') {
            $cpc[]="N($row[nomination])";
        }
        if($row['csr']=='C' || $row['csr']=='M') {
            $cpc[]="CSR($row[csr])";
        }
        $generic_details['committee_positions']=implode(",",$cpc);
        $generic_details['retiring_non_retiring']=$row['retiring_non_retiring'];
        $generic_details['part_promoter_group'] = ($row['company_classification']=="NED") ? 'no' : 'yes' ;
        $generic_details['total_directorship'] = $row['no_total_directorship'];
        $generic_details['committee_memberships'] = $row['committee_memberships'];
        $generic_details['committee_chairmanships'] = $row['committee_chairmanships'];
        $years = range($financial_year-3,$financial_year-1);
        $total_attended = 0;
        $total_agms = 0;
        $agm_years = range($financial_year-3,$financial_year-1);
        foreach($agm_years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['attended']=='yes' || $row['attended']=='no') {
                    $total_agms++;
                    if($row['attended']=='yes') {
                        $total_attended++;
                    }
                }
            }
        }
        $last_3_year_attended_agms = $total_attended;
        $last_3_year_held_agms = $total_agms;
        $generic_details['last_3_agms'] = $total_attended."/".$total_agms;
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['board_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['board_meeting_last_year']="na";
        }
        $years = range($financial_year-2,$financial_year);
        $total_board_meeting_held = 0;
        $total_board_meeting_attended = 0;
        foreach($years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_board_meeting_held += intval($row['held']);
                $total_board_meeting_attended += intval($row['attended']);
            }
        }
        $generic_details['board_meeting_last_years_avg']= ceil(($total_board_meeting_attended/$total_board_meeting_held)*100);

        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['audit_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['audit_meeting_last_year']="na";
        }
        $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['are_committees_seperate'] = $row['are_committees_seperate'];
        }
        else {
            $generic_details['are_committees_seperate']="na";
        }

        if($generic_details['are_committees_seperate']=='yes') {
            $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_meeting_last_year']="na";
            }
            $stmt = $dbobject->prepare(" select * from `remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['remuneration_meeting_last_year']="na";
            }
        }
        else {
            $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_remuneration_meeting_last_year']="na";
            }
        }

        $stmt = $dbobject->prepare(" select * from `csr_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['csr_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['csr_meeting_last_year']="na";
        }

        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['stack_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['stack_meeting_last_year']="na";
        }

        // Analysis Questions values
        $values = array();
        $total_directors = $this->getCompanyDirectorsWithPay($company_id,$financial_year);
        $toal_ned_pay = 0;
        $analysed_director_pay = 0;
        $toal_neds = 0;
        foreach($total_directors as $director) {
            if(($director['company_classification']=='NED' || $director['company_classification']=='NEDP')) {
                if($director['dir_din_no']!=$dir_din_no) {
                    $toal_ned_pay += floatval($director['fixed_pay'])+floatval($director['variable_pay']);
                }
                $toal_neds++;
            }
            if(($director['company_classification']=='NED' || $director['company_classification']=='NEDP') && $director['dir_din_no']==$dir_din_no) {
                $analysed_director_pay = floatval($director['fixed_pay'])+floatval($director['variable_pay']);
            }
        }

        if($toal_neds!=0) {
            $ned_pay_avg = ($toal_ned_pay/$toal_neds) * 3;
        }
        else {
            $ned_pay_avg = 0;
        }
        if($ned_pay_avg>$analysed_director_pay) {
            $values[]= "no";
        }
        else {
            $values[]= "yes";
        }
        $values[]=$director_details['retiring_non_retiring'];
        $values[]=$generic_details['board_meeting_last_year']==100 ? 'yes' : 'no';

        $values[]="";
        if($director_details['no_directorship_public']>10 || $director_details['no_total_directorship']>20) {
            $values[]="yes";
        }
        else {
            $values[]="no";
        }
        $values[] = $director_details['committee_memberships']>10 ? 'yes':'no';
        $values[] = $director_details['committee_chairmanships']>5 ? 'yes':'no';
        $values[]=$generic_details['board_meeting_last_year']==0 ? 'yes' : 'no';
        $values[] = $last_3_year_attended_agms!=$last_3_year_held_agms ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_years_avg']<75 ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_year']>75 ? 'yes' : 'no';

        $generic_details['analysis_values'] = $values;
        $dbobject = null;
        return $generic_details;
    }
    function getAppointedDirectorIDInfo($company_id,$financial_year,$dir_din_no) {
        $generic_details = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $director_details = $row;
        $generic_details['functional_area'] = $row['expertise'];
        $generic_details['education'] = $row['education'];
        $generic_details['past_ex'] = $row['past_ex'];
        $cpc = array();
        if($row['audit_committee']=='C' || $row['audit_committee']=='M') {
            $cpc[]="A($row[audit_committee])";
        }
        if($row['investor_grievance']=='C' || $row['investor_grievance']=='M') {
            $cpc[]="SR($row[investor_grievance])";
        }
        if($row['nomination_remuneration']=='C' || $row['nomination_remuneration']=='M') {
            $cpc[]="NR($row[nomination_remuneration])";
        }
        if($row['remuneration']=='C' || $row['remuneration']=='M') {
            $cpc[]="R($row[remuneration])";
        }
        if($row['nomination']=='C' || $row['nomination']=='M') {
            $cpc[]="N($row[nomination])";
        }
        if($row['csr']=='C' || $row['csr']=='M') {
            $cpc[]="CSR($row[csr])";
        }
        $generic_details['committee_positions']=implode(",",$cpc);
        $generic_details['total_association'] = $row['total_association'];
        $generic_details['shareholding'] = $row['shares_held'];

        $generic_details['total_directorship'] = $row['no_total_directorship'];
        $generic_details['committee_memberships'] = $row['committee_memberships'];
        $generic_details['committee_chairmanships'] = $row['committee_chairmanships'];

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $generic_details['remuneration'] = number_format(($row['variable_pay']+$row['fixed_pay'])*100,2);

        $years = range($financial_year-2,$financial_year);
        $total_attended = 0;
        $total_agms = 0;

        $agm_years = range($financial_year-3,$financial_year-1);

        foreach($agm_years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['attended']=='yes' || $row['attended']=='no') {
                    $total_agms++;
                    if($row['attended']=='yes') {
                        $total_attended++;
                    }
                }
            }
        }
        $last_3_year_attended_agms = $total_attended;
        $last_3_year_held_agms = $total_agms;
        $generic_details['last_3_agms'] = $total_attended."/".$total_agms;
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['board_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['board_meeting_last_year']="na";
        }
        $years = range($financial_year-2,$financial_year);

        $total_board_meeting_held = 0;
        $total_board_meeting_attended = 0;

        foreach($years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_board_meeting_held += intval($row['held']);
                $total_board_meeting_attended += intval($row['attended']);
            }
        }
        $generic_details['board_meeting_last_years_avg']= ceil(($total_board_meeting_attended/$total_board_meeting_held)*100);

        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['audit_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['audit_meeting_last_year']="na";
        }
        $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['are_committees_seperate'] = $row['are_committees_seperate'];
        }
        else {
            $generic_details['are_committees_seperate']="na";
        }

        if($generic_details['are_committees_seperate']=='yes') {
            $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_meeting_last_year']="na";
            }
            $stmt = $dbobject->prepare(" select * from `remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['remuneration_meeting_last_year']="na";
            }
        }
        else {
            $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_remuneration_meeting_last_year']="na";
            }
        }

        $stmt = $dbobject->prepare(" select * from `csr_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['csr_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['csr_meeting_last_year']="na";
        }

        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['stack_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['stack_meeting_last_year']="na";
        }

//         Analysis Questions values
        $values = array();
        if($generic_details['are_committees_seperate']=='yes') {

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination`=:nom_c or `nomination`=:nom_m)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $nom_c = "C";
            $nom_m = "M";
            $stmt->bindParam(":nom_c",$nom_c);
            $stmt->bindParam(":nom_m",$nom_m);
            $stmt->execute();
            if($stmt->rowCount()) {
                $values[]="yes";
            }
            else {
                $values[]="no";
            }

        }
        else {
            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination_remuneration`=:nom_c or `nomination_remuneration`=:nom_m)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $nom_c = "C";
            $nom_m = "M";
            $stmt->bindParam(":nom_c",$nom_c);
            $stmt->bindParam(":nom_m",$nom_m);
            $stmt->execute();
            if($stmt->rowCount()) {
                $values[]="yes";
            }
            else {
                $values[]="no";
            }
        }


        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $values[] = $row['variable_pay']=="N.D." ? 'no' : 'yes';
        }


        $total_directors = $this->getCompanyDirectorsWithPay($company_id,$financial_year);
        $toal_md_pay = 0;
        $analysed_director_pay = 0;
        foreach($total_directors as $director) {
            if(($director['additional_classification']=='CMD' || $director['additional_classification']=='MD')) {
                if($director['dir_din_no']!=$dir_din_no) {
                    $toal_md_pay += floatval($director['fixed_pay'])+floatval($director['variable_pay']);
                }
            }
            if($director['dir_din_no']==$dir_din_no) {
                $analysed_director_pay = floatval($director['fixed_pay'])+floatval($director['variable_pay']);
            }
        }

        if($toal_md_pay==0) {
            $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `directors`.`din_no`=`director_info`.`dir_din_no` INNER JOIN `director_remuneration` ON `director_remuneration`.`dir_din_no`=`directors`.`din_no` where `director_info`.`company_id`=:company_id and `director_info`.`financial_year`=:financial_year and `director_remuneration`.`company_id`=:company_id and `director_remuneration`.`rem_year`=:financial_year and `company_classification`='ED' or `company_classification`='EDP' ORDER BY (`director_remuneration`.`variable_pay`+`director_remuneration`.`fixed_pay`) desc limit 1");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if((($analysed_director_pay/($row['variable_pay']+$row['fixed_pay']))*100)>25) {
                $values[]= "yes";
            }
            else {
                $values[]= "no";
            }
        }
        else {
            if((($analysed_director_pay/$toal_md_pay)*100)>25) {
                $values[]= "yes";
            }
            else {
                $values[]= "no";
            }
        }


        $toal_ned_pay = 0;
        $analysed_director_pay = 0;
        $toal_neds = 0;
        foreach($total_directors as $director) {
            if(($director['company_classification']=='NED' || $director['company_classification']=='NEDP' || $director['company_classification']=='ID') && ($director['additional_classification']!="M(Resign)" && $director['additional_classification']!="C(Resign)")) {
                if($director['dir_din_no']!=$dir_din_no) {
                    $toal_ned_pay += floatval($director['fixed_pay'])+floatval($director['variable_pay']);
                    $toal_neds++;
                }
            }
            if($director['dir_din_no']==$dir_din_no) {
                $analysed_director_pay = floatval($director['fixed_pay'])+floatval($director['variable_pay']);
            }
        }
        if($toal_neds!=0) {
            $ned_pay_avg = ($toal_ned_pay/$toal_neds) * 3;
            if(($analysed_director_pay/$ned_pay_avg)>3) {
                $values[]= "yes";
            }
            else {
                $values[]= "no";
            }
        }
        else {
            $values[]="";
        }


//
        $values[]=$director_details['retiring_non_retiring'];
        $values[]=$generic_details['board_meeting_last_year']==100 ? 'yes' : 'no';
        $values[]=$director_details['total_association']>10 ? 'yes' : 'no';
        $values[]=$director_details['other_pecuniary_relationship']=="N" ? "no" : "yes";
//
//        $values[]="";
        if($director_details['no_directorship_public']>10 || $director_details['no_total_directorship']>20) {
            $values[]="yes";
        }
        else {
            $values[]="no";
        }
        $values[] = $director_details['committee_memberships']>10 ? 'yes':'no';
        $values[] = $director_details['committee_chairmanships']>5 ? 'yes':'no';
        $values[]=$generic_details['board_meeting_last_year']==0 ? 'yes' : 'no';
        $values[]=$director_details['no_directorship_listed_companies']>7 ? 'yes' : 'no';
        $values[] = $last_3_year_attended_agms!=$last_3_year_held_agms ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_years_avg']<75 ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_year']>75 ? 'yes' : 'no';
        $values[] = $last_3_year_attended_agms!=$last_3_year_held_agms ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_years_avg']<75 ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_year']>75 ? 'yes' : 'no';

        $total_audit_meeting_held = 0;
        $total_audit_meeting_attended = 0;

        foreach($years as $year) {
            $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_audit_meeting_held += intval($row['held']);
                $total_audit_meeting_attended += intval($row['attended']);
            }
        }
        $generic_details['audit_committee_last_years_avg']= ceil(($total_audit_meeting_attended/$total_audit_meeting_held)*100);
        $values[] = $generic_details['audit_committee_last_years_avg'];

        $flag =false;
        foreach($years as $year) {

            $stmt = $dbobject->prepare(" select * from `company_auditors_info` where `company_id`=:company_id and `financial_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if((($row['non_audit_fee']/$row['total_auditors_fee'])*100)>50) {
                    $flag = true;
                }
            }
        }

        if($flag) {
            $values[]='yes';
        }
        else {
            $values[] = 'no';
        }

        $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `audit_committee`=:audit");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$year);
        $audit = "C";
        $stmt->bindParam(":audit",$audit);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year and `attended`=:att");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $year = $financial_year-1;
            $stmt->bindParam(":financial_year",$year);
            $att = 'yes';
            $stmt->bindParam(":att",$att);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $values[]='yes';
            }
            else {
                $values[]='no';
            }
        }
        else {
            $values[]='no';
        }

        $values[] = $generic_details['board_meeting_last_year']<50 ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_years_avg']<75 ? 'yes' : 'no';

        if($generic_details['are_committees_seperate']=='yes') {
            $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $values[] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $values[] = "na";
            }
            $total_nomination_meeting_held = 0;
            $total_nomination_meeting_attended=0;
            foreach($years as $year) {
                $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
                $stmt->bindParam(":company_id",$company_id);
                $stmt->bindParam(":dir_din_no",$dir_din_no);
                $stmt->bindParam(":financial_year",$year);
                $stmt->execute();
                if($stmt->rowCount()>0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $total_nomination_meeting_held += intval($row['held']);
                    $total_nomination_meeting_attended += intval($row['attended']);
                }
            }
            $generic_details['nomination_meeting_last_years_avg']= ceil(($total_nomination_meeting_attended/$total_nomination_meeting_held)*100);
            $values[]= $generic_details['nomination_meeting_last_years_avg'] ;

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year and (`nomination`=:chairman or `nomination`=:member)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $chairman = "C";
            $member = "M";
            $stmt->bindParam(":chairman",$chairman);
            $stmt->bindParam(":member",$member);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $values[] = "yes";
            }
            else {
                $values[] = "na";
            }

        }
        else {
            $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
                $values[] = $generic_details['nomination_remuneration_meeting_last_year']."%";
            }
            else {
                $generic_details['nomination_remuneration_meeting_last_year']="na";
                $values[] = "";
            }

            $total_nomination_remuneration_meeting_held = 0;
            $total_nomination_remuneration_meeting_attended=0;
            foreach($years as $year) {
                $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
                $stmt->bindParam(":company_id",$company_id);
                $stmt->bindParam(":dir_din_no",$dir_din_no);
                $stmt->bindParam(":financial_year",$year);
                $stmt->execute();
                if($stmt->rowCount()>0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $total_nomination_remuneration_meeting_held += intval($row['held']);
                    $total_nomination_remuneration_meeting_attended += intval($row['attended']);
                }
            }
            $generic_details['nomination_remuneration_meeting_last_years_avg']= ceil(($total_nomination_remuneration_meeting_attended/$total_nomination_remuneration_meeting_held)*100);
            $values[]= $generic_details['nomination_remuneration_meeting_last_years_avg']."%" ;

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year and (`nomination_remuneration`=:chairman or `nomination_remuneration`=:member)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $chairman = "C";
            $member = "M";
            $stmt->bindParam(":chairman",$chairman);
            $stmt->bindParam(":member",$member);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $values[] = "yes";
            }
            else {
                $values[] = "na";
            }

        }

        $values[] = $generic_details['board_meeting_last_year']."%";
        $values[] = $generic_details['audit_meeting_last_year']."%";
        $values[] = $generic_details['board_meeting_last_years_avg']."%";
        $values[] = $generic_details['audit_committee_last_years_avg']."%";
        if($generic_details['are_committees_seperate']=='yes') {
            $values [] =$generic_details['nomination_meeting_last_years_avg'];
        }
        else {
            $values[] = $generic_details['nomination_remuneration_meeting_last_years_avg']."%";
        }
        $values[]=$director_details['retiring_non_retiring'];

        $generic_details['analysis_values'] = $values;

        $dbobject = null;
        return $generic_details;
    }
    function getAppointedDirectorEDInfo($company_id,$financial_year,$dir_din_no) {
        $generic_details = array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $stmt = $dbobject->prepare(" select * from `director_info` INNER JOIN `directors` ON `director_info`.`dir_din_no`=`directors`.`din_no` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $director_details = $row;
        $generic_details['functional_area'] = $row['expertise'];
        $generic_details['education'] = $row['education'];
        $generic_details['past_ex'] = $row['past_ex'];
        $cpc = array();
        if($row['audit_committee']=='C' || $row['audit_committee']=='M') {
            $cpc[]="A($row[audit_committee])";
        }
        if($row['investor_grievance']=='C' || $row['investor_grievance']=='M') {
            $cpc[]="SR($row[investor_grievance])";
        }
        if($row['nomination_remuneration']=='C' || $row['nomination_remuneration']=='M') {
            $cpc[]="NR($row[nomination_remuneration])";
        }
        if($row['remuneration']=='C' || $row['remuneration']=='M') {
            $cpc[]="R($row[remuneration])";
        }
        if($row['nomination']=='C' || $row['nomination']=='M') {
            $cpc[]="N($row[nomination])";
        }
        if($row['csr']=='C' || $row['csr']=='M') {
            $cpc[]="CSR($row[csr])";
        }
        $generic_details['committee_positions']=implode(",",$cpc);
        $generic_details['retiring_non_retiring']=$row['retiring_non_retiring'];
        $generic_details['part_promoter_group'] = ($row['company_classification']=="EDP") ? 'no' : 'yes' ;
        $generic_details['total_directorship'] = $row['no_total_directorship'];
        $generic_details['committee_memberships'] = $row['committee_memberships'];
        $generic_details['committee_chairmanships'] = $row['committee_chairmanships'];
        $years = range($financial_year-2,$financial_year);
        $total_attended = 0;
        $total_agms = 0;

        $agm_years = range($financial_year-3,$financial_year-1);

        foreach($agm_years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_agm_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['attended']=='yes' || $row['attended']=='no') {
                    $total_agms++;
                    if($row['attended']=='yes') {
                        $total_attended++;
                    }
                }
            }
        }
        $last_3_year_attended_agms = $total_attended;
        $last_3_year_held_agms = $total_agms;
        $generic_details['last_3_agms'] = $total_attended."/".$total_agms;
        $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['board_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['board_meeting_last_year']="na";
        }
        $years = range($financial_year-2,$financial_year);
        $total_board_meeting_held = 0;
        $total_board_meeting_attended = 0;
        foreach($years as $year) {
            $stmt = $dbobject->prepare(" select * from `director_board_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_board_meeting_held += intval($row['held']);
                $total_board_meeting_attended += intval($row['attended']);
            }
        }
        $generic_details['board_meeting_last_years_avg']= ceil(($total_board_meeting_attended/$total_board_meeting_held)*100);

        $stmt = $dbobject->prepare(" select * from `audit_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['audit_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['audit_meeting_last_year']="na";
        }
        $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_info` where `company_id`=:company_id and `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['are_committees_seperate'] = $row['are_committees_seperate'];
        }
        else {
            $generic_details['are_committees_seperate']="na";
        }

        if($generic_details['are_committees_seperate']=='yes') {
            $stmt = $dbobject->prepare(" select * from `nomination_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_meeting_last_year']="na";
            }
            $stmt = $dbobject->prepare(" select * from `remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['remuneration_meeting_last_year']="na";
            }
        }
        else {
            $stmt = $dbobject->prepare(" select * from `nomination_remuneration_committee_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":dir_din_no",$dir_din_no);
            $stmt->bindParam(":financial_year",$financial_year);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $generic_details['nomination_remuneration_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
            }
            else {
                $generic_details['nomination_remuneration_meeting_last_year']="na";
            }
        }

        $stmt = $dbobject->prepare(" select * from `csr_committee_meetings_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['csr_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['csr_meeting_last_year']="na";
        }

        $stmt = $dbobject->prepare(" select * from `investors_grievance_attendance` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `att_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $generic_details['stack_meeting_last_year'] = ceil(($row['attended']/$row['held'])*100);
        }
        else {
            $generic_details['stack_meeting_last_year']="na";
        }

        // Analysis Questions values
        $values = array();
        if($generic_details['are_committees_seperate']=='yes') {

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination`=:nom_c or `nomination`=:nom_m)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $nom_c = "C";
            $nom_m = "M";
            $stmt->bindParam(":nom_c",$nom_c);
            $stmt->bindParam(":nom_m",$nom_m);
            $stmt->execute();
            if($stmt->rowCount()) {
                $values[]="yes";
            }
            else {
                $values[]="no";
            }

            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`remuneration`=:nom_c or `remuneration`=:nom_m)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $nom_c = "C";
            $nom_m = "M";
            $stmt->bindParam(":nom_c",$nom_c);
            $stmt->bindParam(":nom_m",$nom_m);
            $stmt->execute();
            if($stmt->rowCount()) {
                $values[]="yes";
            }
            else {
                $values[]="no";
            }

        }
        else {
            $stmt = $dbobject->prepare(" select * from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and (`nomination_remuneration`=:nom_c or `nomination_remuneration`=:nom_m)");
            $stmt->bindParam(":company_id",$company_id);
            $stmt->bindParam(":financial_year",$financial_year);
            $nom_c = "C";
            $nom_m = "M";
            $stmt->bindParam(":nom_c",$nom_c);
            $stmt->bindParam(":nom_m",$nom_m);
            $stmt->execute();
            if($stmt->rowCount()) {
                $values[]="yes";
                $values[]="yes";
            }
            else {
                $values[]="no";
                $values[]="no";
            }
        }

        $stmt = $dbobject->prepare(" select * from `director_remuneration` where `company_id`=:company_id and `dir_din_no`=:dir_din_no and `rem_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":dir_din_no",$dir_din_no);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //  Has the remuneration paid to the director disclosed?
            $values[] = $row['variable_pay']=="N.D." ? 'no' : 'yes';
        }
        if($generic_details['are_committees_seperate']=='yes') {
            if($director_details['nomination']=='C' || $director_details['nomination']=='M') {
                $values[] = 'yes';
            }
            else {
                $values[] = 'no';
            }
        }
        else {
            if($director_details['nomination_remuneration']=='C' || $director_details['nomination_remuneration']=='M') {
                $values[] = 'yes';
            }
            else {
                $values[] = 'no';
            }
        }
        $values[] = $generic_details['board_meeting_last_years_avg']<75 ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_year']==100 ? 'no' : 'yes';
        $values[] = $director_details['no_directorship_public']>10 ? "yes" : "no";
        $values[] = $director_details['no_total_directorship']>20 ? "yes" : "no";
        $values[] = $director_details['no_directorship_listed_companies']>3 ? "yes" : "no";
        $values[] = $director_details['committee_memberships']>10 ? 'yes':'no';
        $values[] = $director_details['committee_chairmanships']>5 ? 'yes':'no';
        $values[] = $last_3_year_attended_agms!=$last_3_year_held_agms ? 'yes' : 'no';
        $values[] = $generic_details['board_meeting_last_years_avg'];
        $values[] = $generic_details['board_meeting_last_years_avg'];
        $values[] = $values[0];
        $values[] = $last_3_year_attended_agms!=$last_3_year_held_agms ? 'yes' : 'no';
        $values[]=$generic_details['board_meeting_last_years_avg'];
        $values[]=$generic_details['board_meeting_last_years_avg'];

        $generic_details['analysis_values'] = $values;
        $dbobject = null;
        return $generic_details;
    }

    // pradeep functions
    function checkExistingOfData($main_section) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$_SESSION[report_id]' and `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $response['status']="Existing";
        }
        else {
            $response['status']="Not Existing";
        }
        $dbobject=null;
        return $response;
    }
    function getCheckbox($resolution_section,$main_section) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_checkbox` WHERE `pa_reports_id`=:report_id AND `main_section`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":report_id", $_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $checkbox[]=$row;
        }
        $dbobject=null;
        return $checkbox;
    }
    function getAnalysisData($resolution_section,$main_section) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['analysis_text']=="&nbsp;") {
                $row['analysis_text']="";
            }
            $analysis[]=$row;
        }
        $dbobject=null;
        return $analysis;
    }
    function getRecommendationData($resolution_section,$main_section) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['recommendation_text']=="&nbsp;") {
                $row['recommendation_text']="";
            }
            $recommendation[]=$row;
        }
        $dbobject=null;
        return $recommendation;
    }
    function getOtherTextData($resolution_section,$main_section) {
        $table_name="`pa_report_".$resolution_section."_other_text`";
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM $table_name WHERE `pa_reports_id`='$_SESSION[report_id]' AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['text']=="&nbsp;") {
                $row['text']="";
            }
            $other_text[]=$row;
        }
        $dbobject=null;
        return $other_text;
    }
    function getTriggers($resolution_section,$main_section) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_triggers` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `resolution_section`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $triggers[]=$row;
        }
        $dbobject=null;
        return $triggers;
    }
    function saveAnalysis($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $total_analysis_text = count($info['analysis_section']);
        for ($i = 0; $i < $total_analysis_text; $i++) {
            if($info['analysis_text'][$i]=="") {
                $info['analysis_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_analysis_text`(`pa_reports_id`,`resolution_name`,`resolution_section`,`analysis_text`) VALUES (:report_id,:main_section,:resolution_section,:analysis_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['analysis_section'][$i]);
            $stmt->bindParam(":analysis_text", $info['analysis_text'][$i]);
            $stmt->execute();
        }
    }
    function saveRecommendation($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $total_recommendation = count($info['recommendation_section']);
        for ($i = 0; $i < $total_recommendation; $i++) {
            if($info['recommendation_text'][$i]=="") {
                $info['recommendation_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_recommendations_text`(`pa_reports_id`,`resolution_name`,`resolution_section`,`recommendation_text`) VALUES (:report_id,:main_section,:resolution_section,:recommendation_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['recommendation_section'][$i]);
            $stmt->bindParam(":recommendation_text", $info['recommendation_text'][$i]);
            $stmt->execute();
        }
    }
    function saveCheckbox($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $total_checkbox = count($info['checkbox']);
        for ($i = 0; $i < $total_checkbox; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_checkbox`(`pa_reports_id`,`main_section`,`checkbox`) VALUES (:report_id,:main_section,:checkbox)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":checkbox", $info['checkbox'][$i]);
            $stmt->execute();
        }
    }
    function saveTriggers($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $total_triggers = count($info['triggers']);
        for ($i = 0; $i < $total_triggers; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_triggers` (`pa_reports_id`,`resolution_section`,`triggers`) VALUES (:report_id,:main_section,:triggers)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":triggers", $info['triggers'][$i]);
            $stmt->execute();
        }
    }
    function financial_indicator($year) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        session_start();
        $stmt = $dbobject->prepare("Select * from `pa_report_financial_indicators` where `pa_reports_id`='$_SESSION[report_id]' and `financial_year`='$year'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['opm'] = $row['opm'];
        $response['npm'] = $row['npm'];
        $dbobject = null;
        return $response;
    }
    // Adoption of account
    function addAdoptionOfAccounts($info) {
        $status = array();
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_financial_indicators` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_contingent_liabilities` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_unaudited_statements` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_rpt` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_adoption_of_accounts_standalone_consolidated_Acc` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_fi_current = count($info['fi_current']);
        for ($i = 0; $i < $total_fi_current; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_financial_indicators`(`pa_reports_id`,`field_name`,`fi_current`,`fi_previous`,`year1`,`year2`,`shift`,`company_discussion`) VALUES(:report_id,:label_name,:fi_current,:fi_previous,:year1,:year2,:shift,:company_discussion)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":label_name",$info['label_name'][$i]);
            $stmt->bindParam(":fi_current", $info['fi_current'][$i]);
            $stmt->bindParam(":fi_previous", $info['fi_previous'][$i]);
            $stmt->bindParam(":year1", $info['financial_indicators_current_year']);
            $stmt->bindParam(":year2", $info['financial_indicators_previous_year']);
            $stmt->bindParam(":shift", $info['shift'][$i]);
            $stmt->bindParam(":company_discussion", $info['company_discussion'][$i]);
            $stmt->execute();
        }
        $total_assets = count($info['total_assets']);
        for ($i = 0; $i < $total_assets; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_unaudited_statements`(`pa_reports_id`,`field_name`,`total_assets`,`total_revenue`,`net_profit`,`net_cash_flow`) VALUES(:report_id,:field_name,:total_assets,:total_revenue,:net_profit,:net_cash_flow)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":field_name", $info['field_name'][$i]);
            $stmt->bindParam(":total_assets", $info['total_assets'][$i]);
            $stmt->bindParam(":total_revenue", $info['total_revenue'][$i]);
            $stmt->bindParam(":net_profit", $info['net_profit'][$i]);
            $stmt->bindParam(":net_cash_flow", $info['net_cash_flow'][$i]);
            $stmt->execute();
        }
        $total_cl_current_year = count($info['cl_current_year']);
        for ($i = 0; $i < $total_cl_current_year; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_contingent_liabilities`(`pa_reports_id`,`cl_current_year`,`cl_previous_year`,`year1`,`year2`) VALUES(:report_id,:cl_current_year,:cl_previous_year,:contingent_current_year,:contingent_previous_year)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":cl_current_year", $info['cl_current_year'][$i]);
            $stmt->bindParam(":cl_previous_year", $info['cl_previous_year'][$i]);
            $stmt->bindParam(":contingent_current_year", $info['contingent_current_year']);
            $stmt->bindParam(":contingent_previous_year", $info['contingent_previous_year']);
            $stmt->execute();
        }
        $total_rpt_current_year=count($info['rpt_current_year']);
        for($i=0;$i<$total_rpt_current_year;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_rpt` (`pa_reports_id`,`field_name`,`rpt_current_year`,`rpt_previous_year`,`rpt_comments`,`rpt_year1`,`rpt_year2`,`shift`) VALUES (:report_id,:label_related,:rpt_current_year,:rpt_previous_year,:rpt_comments,:rpt_year1,:rpt_year2,:shift)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":label_related", $info['label_related'][$i]);
            $stmt->bindParam(":rpt_current_year", $info['rpt_current_year'][$i]);
            $stmt->bindParam(":rpt_previous_year", $info['rpt_previous_year'][$i]);
            $stmt->bindParam(":rpt_comments", $info['rpt_comments'][$i]);
            $stmt->bindParam(":rpt_year1", $info['rpt_year1']);
            $stmt->bindParam(":rpt_year2", $info['rpt_year2']);
            $stmt->bindParam(":shift", $info['shift_rpt'][$i]);
            $stmt->execute();
        }
        $total_standalone_value1=count($info['standalone_value1']);
        for($i=0;$i<$total_standalone_value1;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_standalone_consolidated_Acc`(`pa_reports_id`, `standalone_value1`, `standalone_value2`, `standalone_value3`, `sa_year1`, `sa_year2`, `sa_year3`, `consolidated_value1`, `consolidated_value2`, `consolidated_value3`, `ca_year1`, `ca_year2`, `ca_year3`) VALUES (:report_id,:standalone_value1,:standalone_value2,:standalone_value3,:sa_year1,:sa_year2,:sa_year3,:consolidated_value1,:consolidated_value2,:consolidated_value3,:ca_year1,:ca_year2,:ca_year3)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":standalone_value1",$info['standalone_value1'][$i]);
            $stmt->bindParam(":standalone_value2",$info['standalone_value2'][$i]);
            $stmt->bindParam(":standalone_value3",$info['standalone_value3'][$i]);
            $stmt->bindParam(":sa_year1",$info['standalone_current_year']);
            $stmt->bindParam(":sa_year2",$info['standalone_previous_year1']);
            $stmt->bindParam(":sa_year3",$info['standalone_previous_year2']);
            $stmt->bindParam(":consolidated_value1",$info['consolidated_value1'][$i]);
            $stmt->bindParam(":consolidated_value2",$info['consolidated_value2'][$i]);
            $stmt->bindParam(":consolidated_value3",$info['consolidated_value3'][$i]);
            $stmt->bindParam(":ca_year1",$info['consolidated_current_year']);
            $stmt->bindParam(":ca_year2",$info['consolidated_previous_year1']);
            $stmt->bindParam(":ca_year3",$info['consolidated_previous_year2']);
            if ($stmt->execute()) {
                $status['title'] = "Success";
                $status['msg'] = "Info saved successfully";
                $status['image'] = $this->success_image;
            }
            else {
                $status['title'] = "Error";
                $status['msg'] = "Error in saving Info";
                $status['image'] = $this->error_image;
                //echo "Error";
            }
        }
        $total_used_in = count($info['used_in_text']);
        for ($i = 0; $i < $total_used_in; $i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_adoption_of_accounts_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $this->saveCheckbox($info);
        return $status;
    }
    function getAdoptionOfAccountsFinancialIndicators() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_adoption_of_accounts_financial_indicators` WHERE `pa_reports_id`='$report_id'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $financial_indicators[]=$row;
        }
        $dbobject=null;
        return $financial_indicators;
    }
    function getAdoptionOfAccountsUnauditedStatements() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_adoption_of_accounts_unaudited_statements` WHERE `pa_reports_id`='$report_id'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $unaudited_statements[]=$row;
        }
        $dbobject=null;
        return $unaudited_statements;
    }
    function getAdoptionOfAccountsContingentLiabilities() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_adoption_of_accounts_contingent_liabilities` WHERE `pa_reports_id`='$report_id'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $contingent_liabilities[]=$row;
        }
        $dbobject=null;
        return $contingent_liabilities;
    }
    function getAdoptionOfAccountsRpt() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_adoption_of_accounts_rpt` WHERE `pa_reports_id`='$report_id'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $rpt[]=$row;
        }
        $dbobject=null;
        return $rpt;
    }
    function getAdoptionOfAccountsStandaloneConsolidatedAcc() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_adoption_of_accounts_standalone_consolidated_Acc` WHERE `pa_reports_id`='$report_id'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $standalone_consolidated[]=$row;
        }
        $dbobject=null;
        return $standalone_consolidated;
    }
    // Declaration of dividend
    function saveDeclarationOfDividentInfo($info) {
        $report_id=$_SESSION['report_id'];
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_declaration_of_dividend_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_declaration_dividend_table1` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_declaration_dividend_table2` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();

        }
        $total_financial_year=count($info['financial_year']);
        for($i=0;$i<$total_financial_year;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_declaration_dividend_table1` (`pa_reports_id`, `financial_year`, `dividend`, `eps`, `dividend_payout`) VALUES (:report_id,:financial_year,:dividend,:eps,:dividend_payout)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":financial_year",$info['financial_year'][$i]);
            $stmt->bindParam(":dividend",$info['dividend'][$i]);
            $stmt->bindParam(":eps",$info['eps'][$i]);
            $stmt->bindParam(":dividend_payout",$info['dividend_payout'][$i]);
            $stmt->execute();
        }
        $total_company_id=count($info['peer_company_name_table2']);
        for($i=0;$i<$total_company_id;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_declaration_dividend_table2` (`pa_reports_id`,`company_name`, `financial_year`, `dividend`, `eps`, `dividend_payout`) VALUES (:report_id,:company_name,:financial_year,:dividend,:eps,:dividend_payout)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":company_name",$info['peer_company_name_table2'][$i]);
            $stmt->bindParam(":financial_year",$info['financial_year_table2'][$i]);
            $stmt->bindParam(":dividend",$info['dividend_table2'][$i]);
            $stmt->bindParam(":eps",$info['eps_table2'][$i]);
            $stmt->bindParam(":dividend_payout",$info['dividend_payout_table2'][$i]);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in']);
        for($i=0;$i<$total_used_in;$i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_declaration_of_dividend_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
    }
    function getDeclarationOfDividentTable1() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_declaration_dividend_table1` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table1[]=$row;
        }
        $dbobject=null;
        return $table1;
    }
    function getDeclarationOfDividentTable2() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_declaration_dividend_table2` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table2[]=$row;
        }
        $dbobject=null;
        return $table2;
    }
    // Appointment of Directors
    function saveAppointmentOfDirectors($info) {

        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id = $_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_analysis_text` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_checkbox` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_executive_remuneration_p_c` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `a_report_appointment_directors_executive_remuneration_table_2` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_other_text` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_past_remuneration` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_recommendations_text` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_rem_package` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_triggers` WHERE `pa_reports_id`='$report_id' AND `director_no`=:director_no");
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->execute();
        }
        else {
            $arned = 0;
            $arid = 0;
            $ared = 0;
            if(in_array("Appointment/Reappointment of Non-Executive Directors",$info['checkbox'])) {
                $arned=1;
            }
            if(in_array("Appointment/Reappointment of Independent Directors",$info['checkbox'])) {
                $arid=1;
            }
            if(in_array("Appointment/Reappointment of Executive Directors",$info['checkbox'])) {
                $ared=1;
            }
            $report_id = $_SESSION['report_id'];
            $stmt = $dbobject->prepare("select * from `pa_report_appointed_directors` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $stmt = $dbobject->prepare("update `pa_report_appointed_directors` set `no_of_ned`=`no_of_ned`+:arned , `no_of_id`=`no_of_id`+:arid, `no_of_ed`=`no_of_ed`+:ared where `pa_reports_id`=:report_id");
                $stmt->bindParam(":report_id", $report_id);
                $stmt->bindParam(":arned", $arned);
                $stmt->bindParam(":arid", $arid);
                $stmt->bindParam(":ared", $ared);
                $stmt->execute();
            }
            else {
                $stmt = $dbobject->prepare("insert into `pa_report_appointed_directors` (`pa_reports_id`,`no_of_ned`,`no_of_id`,`no_of_ed`) values (:report_id,:arned,:arid,:ared)");
                $stmt->bindParam(":report_id", $report_id);
                $stmt->bindParam(":arned", $arned);
                $stmt->bindParam(":arid", $arid);
                $stmt->bindParam(":ared", $ared);
                $stmt->execute();
            }
        }

        $total_used_in = count($info['used_in_text']);
        for ($i = 0; $i < $total_used_in; $i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i]="&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_other_text` (`pa_reports_id`,`director_no`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:director_no,:resolution_name,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_name", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }

        $rem_package = count($info['rem_package']);

        for ($i = 0; $i < $rem_package; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_rem_package` (`pa_reports_id`,`director_no`,`field_value`) VALUES(:report_id,:director_no,:field_value)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":field_value", $info['rem_package'][$i]);
            $stmt->execute();
        }

        $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_past_remuneration` (`pa_reports_id`,`director_no`,`dir_name`,`year1`,`fixed_pay_year1`,`total_pay_year1`,`year2`,`fixed_pay_year2`,`total_pay_year2`,`year3`,`fixed_pay_year3`,`total_pay_year3`) VALUES(:report_id,:director_no,:dir_name,:year1,:fixed_pay_year1,:total_pay_year1,:year2,:fixed_pay_year2,:total_pay_year2,:year3,:fixed_pay_year3,:total_pay_year3)");
        $stmt->bindParam(":report_id", $_SESSION['report_id']);
        $stmt->bindParam(":director_no", $info['slot_no']);
        $stmt->bindParam(":dir_name", $info['past_rem_dir_name']);
        $stmt->bindParam(":year1", $info['past_rem_year1']);
        $stmt->bindParam(":fixed_pay_year1", $info['fixed_pay_year1']);
        $stmt->bindParam(":total_pay_year1", $info['total_pay_year1']);
        $stmt->bindParam(":year2", $info['past_rem_year2']);
        $stmt->bindParam(":fixed_pay_year2", $info['fixed_pay_year2']);
        $stmt->bindParam(":total_pay_year2", $info['total_pay_year2']);
        $stmt->bindParam(":year3", $info['past_rem_year3']);
        $stmt->bindParam(":fixed_pay_year3", $info['fixed_pay_year3']);
        $stmt->bindParam(":total_pay_year3", $info['total_pay_year3']);
        $stmt->execute();

        $fields = array(
            "Director",
            "Company",
            "Promoter",
            "Remuneration (Rs Cr) (A)",
            "Net Profits(Rs Cr) (B)",
            "Ratio (A/B)"
        );
        for ($i = 0; $i < 6; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_executive_remuneration_p_c` (`pa_reports_id`,`director_no`,`field_name`,`col_1`,`col_2`) VALUES(:report_id,:director_no,:field_name,:col_1,:col_2)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":field_name", $fields[$i]);
            $stmt->bindParam(":col_1", $info['ex_rem_col_1'][$i]);
            $stmt->bindParam(":col_2", $info['ex_rem_col_2'][$i]);
            $stmt->execute();
        }

        for ($i = 0; $i < count($info['ex_rem_years']); $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_executive_remuneration_table_2` (`pa_reports_id`,`director_no`,`financial_year`,`ed_remuneration`,`indexed_tsr`,`net_profit`) VALUES(:report_id,:director_no,:financial_year,:ed_remuneration,:indexed_tsr,:net_profit)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":financial_year", $info['ex_rem_years'][$i]);
            $stmt->bindParam(":ed_remuneration", $info['ed_remuneration'][$i]);
            $stmt->bindParam(":indexed_tsr", $info['indexed_tsr'][$i]);
            $stmt->bindParam(":net_profit", $info['net_profit'][$i]);
            $stmt->execute();
        }

        $total_analysis_text = count($info['analysis_section']);
        for ($i = 0; $i < $total_analysis_text; $i++) {
            if($info['analysis_text'][$i]=="") {
                $info['analysis_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_analysis_text` (`pa_reports_id`,`director_no`,`resolution_name`,`resolution_section`,`analysis_text`) VALUES (:report_id,:director_no,:main_section,:resolution_section,:analysis_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['analysis_section'][$i]);
            $stmt->bindParam(":analysis_text", $info['analysis_text'][$i]);
            $stmt->execute();
        }
        $total_recommendation = count($info['recommendation_section']);
        for ($i = 0; $i < $total_recommendation; $i++) {
            if($info['recommendation_text'][$i]=="") {
                $info['recommendation_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_recommendations_text`(`pa_reports_id`,`director_no`,`resolution_name`,`resolution_section`,`recommendation_text`) VALUES (:report_id,:director_no,:main_section,:resolution_section,:recommendation_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['recommendation_section'][$i]);
            $stmt->bindParam(":recommendation_text", $info['recommendation_text'][$i]);
            $stmt->execute();
        }

        $total_triggers = count($info['triggers']);
        for ($i = 0; $i < $total_triggers; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_triggers` (`pa_reports_id`,`director_no`,`resolution_section`,`triggers`) VALUES (:report_id,:director_no,:main_section,:triggers)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":triggers", $info['triggers'][$i]);
            $stmt->execute();
        }

        $total_checkbox = count($info['checkbox']);
        for ($i = 0; $i < $total_checkbox; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_checkbox` (`pa_reports_id`,`director_no`,`main_section`,`checkbox`) VALUES (:report_id,:director_no,:main_section,:checkbox)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":checkbox", $info['checkbox'][$i]);
            $stmt->execute();
        }
    }

    function saveAppointmentOfDirectorsNED($info) {

        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id = $_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {

            $resolution_name = "Appointment of Directors";
            $resolution_section = "Appointment/Reappointment of Non-Executive Directors";

            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_analysis_text` WHERE `pa_reports_id`=:report_id AND `director_no`=:director_no and `resolution_name`=:resolution_name and `resolution_section`=:resolution_section");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_name", $resolution_name);
            $stmt->bindParam(":resolution_section", $resolution_section);
            $stmt->execute();

            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_other_text` where `pa_reports_id`=:report_id and `director_no`=:director_no and `resolution_name`=:resolution_name and `resolution_section`=:resolution_section");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_name", $resolution_name);
            $stmt->bindParam(":resolution_section", $resolution_section);
            $stmt->execute();

            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_recommendations_text` WHERE `pa_reports_id`=:report_id AND `director_no`=:director_no and `resolution_name`=:resolution_name and `resolution_section`=:resolution_section");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_name", $resolution_name);
            $stmt->bindParam(":resolution_section", $resolution_section);
            $stmt->execute();

            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_directors_triggers` WHERE `pa_reports_id`=:report_id AND `director_no`=:director_no and `resolution_section`=:resolution_section");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_section", $resolution_section);
            $stmt->execute();
        }
        else {

            $report_id = $_SESSION['report_id'];
            $stmt = $dbobject->prepare("select * from `pa_report_appointed_directors` where `pa_reports_id`=:report_id");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $stmt = $dbobject->prepare("update `pa_report_appointed_directors` set `no_of_ned`=`no_of_ned`+:arned  where `pa_reports_id`=:report_id");
                $stmt->bindParam(":report_id", $report_id);
                $stmt->bindParam(":arned", $arned);
                $stmt->execute();
            }
            else {
                $arned=1;
                $stmt = $dbobject->prepare("insert into `pa_report_appointed_directors` (`pa_reports_id`,`no_of_ned`) values (:report_id,:arned)");
                $stmt->bindParam(":report_id", $report_id);
                $stmt->bindParam(":arned", $arned);
                $stmt->execute();
            }
        }

        $resolution_section = "Appointment/Reappointment of Non-Executive Directors";

        $total_used_in = count($info['used_in_text']);
        for ($i = 0; $i < $total_used_in; $i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i]="&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_other_text` (`pa_reports_id`,`director_no`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:director_no,:resolution_name,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_name", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }

        $total_analysis_text = count($info['analysis_section']);
        for ($i = 0; $i < $total_analysis_text; $i++) {
            if($info['analysis_text'][$i]=="") {
                $info['analysis_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_analysis_text` (`pa_reports_id`,`director_no`,`resolution_name`,`resolution_section`,`analysis_text`) VALUES (:report_id,:director_no,:main_section,:resolution_section,:analysis_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['analysis_section'][$i]);
            $stmt->bindParam(":analysis_text", $info['analysis_text'][$i]);
            $stmt->execute();
        }

        $total_recommendation = count($info['recommendation_section']);
        for ($i = 0; $i < $total_recommendation; $i++) {
            if($info['recommendation_text'][$i]=="") {
                $info['recommendation_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_recommendations_text`(`pa_reports_id`,`director_no`,`resolution_name`,`resolution_section`,`recommendation_text`) VALUES (:report_id,:director_no,:main_section,:resolution_section,:recommendation_text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":resolution_section", $info['recommendation_section'][$i]);
            $stmt->bindParam(":recommendation_text", $info['recommendation_text'][$i]);
            $stmt->execute();
        }

        $total_triggers = count($info['triggers']);
        for ($i = 0; $i < $total_triggers; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_directors_triggers` (`pa_reports_id`,`director_no`,`resolution_section`,`triggers`) VALUES (:report_id,:director_no,:resolution_section,:triggers)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":director_no", $info['slot_no']);
            $stmt->bindParam(":resolution_section", $resolution_section);
            $stmt->bindParam(":triggers", $info['triggers'][$i]);
            $stmt->execute();
        }

    }
    // Appointment of auditors
    function getAppointmentOfAuditorsTable1() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_of_auditors_table1` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table1[]=$row;
        }
        $dbobject= null;
        return $table1;
    }
    function getTable1Data() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `company_auditors_info` WHERE `company_id`=:company_id");
        $stmt->bindParam(":company_id",$_SESSION['company_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table_info[]=$row;
        }
        $dbobject= null;
        return $table_info;

    }
    function saveAppointmentOfAuditors($info){
        $report_id=$_SESSION['report_id'];
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_of_auditors_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_appointment_of_auditors_table1` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in']);
        for($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_appointment_of_auditors_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $total_financial_year=count($info['financial_year']);
        for($i=0;$i<$total_financial_year;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_appointment_of_auditors_table1`(`pa_reports_id`,`audit_fee`,`audit_related_fee`,`non_audit_fee`,`total_auditors_remuneration`,`percentage_non_audit_fee`,`financial_year`) VALUES(:report_id,:audit_fee,:audit_related_fee,:non_audit_fee,:total_auditors_remuneration,:percentage_non_audit_fee,:financial_year)");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":audit_fee", $info['audit_fee'][$i]);
            $stmt->bindParam(":audit_related_fee", $info['audit_related_fee'][$i]);
            $stmt->bindParam(":non_audit_fee", $info['non_audit_fee'][$i]);
            $stmt->bindParam(":total_auditors_remuneration", $info['total_auditors_remuneration'][$i]);
            $stmt->bindParam(":percentage_non_audit_fee", $info['percentage_non_audit_fee'][$i]);
            $stmt->bindParam(":financial_year", $info['financial_year'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $this->saveCheckbox($info);
        $dbobject=null;
    }
    // Director Remuneration
    function addDirectorsRemuneration($info) {
        $report_id=$_SESSION['report_id'];
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_director_remuneration_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_non_executive_director_total_commission` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_revision_in_executive_past_remuneration` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_revision_in_executive_peer_comparsion` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_revision_in_executive_remuneration_package` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_director_remuneration_ed_remuneration` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();

            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_director_remuneration_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        $total_years=count($info['year']);
        for($i=0;$i<$total_years;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_non_executive_director_total_commission`( `pa_reports_id`, `year`, `value`) VALUES(:report_id,:year,:total_comm)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":year",$info['year'][$i]);
            $stmt->bindParam(":total_comm",$info['total_comm'][$i]);
            $stmt->execute();
        }
        $total_executive=count($info['executive']);
        for($i=0;$i<$total_executive;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_revision_in_executive_past_remuneration`( `pa_reports_id`, `executive_director`, `current_year`, `prev_year1`, `prev_year2`, `year1_fixed`, `year1_total`, `year2_fixed`, `year2_total`, `year3_fixed`, `year3_total`) VALUES(:report_id,:executive,:current_year,:prev_year1,:prev_year2,:fixed_pay_first_year,:total_pay_first_year,:fixed_pay_second_year,:total_pay_second_year,:fixed_pay_third_year,:total_pay_third_year)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":executive",$info['executive'][$i]);
            $stmt->bindParam(":current_year",$info['remuneration_year_1']);
            $stmt->bindParam(":prev_year1",$info['remuneration_year_2']);
            $stmt->bindParam(":prev_year2",$info['remuneration_year_3']);
            $stmt->bindParam(":fixed_pay_first_year",$info['fixed_pay_first_year'][$i]);
            $stmt->bindParam(":total_pay_first_year",$info['total_pay_first_year'][$i]);
            $stmt->bindParam(":fixed_pay_second_year",$info['fixed_pay_second_year'][$i]);
            $stmt->bindParam(":total_pay_second_year",$info['total_pay_second_year'][$i]);
            $stmt->bindParam(":fixed_pay_third_year",$info['fixed_pay_third_year'][$i]);
            $stmt->bindParam(":total_pay_third_year",$info['total_pay_third_year'][$i]);
            $stmt->execute();
        }
        $total_peers=count($info['peer1']);
        for($i=0;$i<$total_peers;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_revision_in_executive_peer_comparsion`(`pa_reports_id`, `peer1`, `peer2`) VALUES(:report_id,:peer1,:peer2 )");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":peer1",$info['peer1'][$i]);
            $stmt->bindParam(":peer2",$info['peer2'][$i]);
            $stmt->execute();
        }
        $total_ex_rem_years=count($info['ex_rem_years']);
        for($i=0;$i<$total_ex_rem_years;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_director_remuneration_ed_remuneration`(`pa_reports_id`, `ex_rem_years`, `ed_remuneration`, `indexed_tsr`, `net_profit`) VALUES(:report_id,:ex_rem_years,:ed_remuneration,:indexed_tsr,:net_profit)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":ex_rem_years",$info['ex_rem_years'][$i]);
            $stmt->bindParam(":ed_remuneration",$info['ed_remuneration'][$i]);
            $stmt->bindParam(":indexed_tsr",$info['indexed_tsr'][$i]);
            $stmt->bindParam(":net_profit",$info['net_profit'][$i]);
            $stmt->execute();
        }
        $stmt=$dbobject->prepare("INSERT INTO `pa_report_revision_in_executive_remuneration_package`(`pa_reports_id`, `proposed_salary`, `annual_increment`, `increase_in_remuneration`, `all_perquisites`, `total_allowances`, `can_placed_perquisites`, `variable_pay`, `performance_criteria`, `can_placed_on_variable`, `notice_period_month`, `notice_period_comment`, `severance_pay_months`, `severance_pay_comment`, `minimum_remuneration`, `within_limits`, `includes_variable`) VALUES(:report_id,:proposed_salary,:annual_increment,:increase_in_remuneration,:all_perquisites,:total_allowance,:can_placed_perquisites,:variable_pay,:performance_criteria,:can_placed_on_variable,:notice_period_month,:notice_period_comments,:severance_pay_months,:severance_pay_comments,:minimum_remuneration,:within_limits,:includes_variable)");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->bindParam(":proposed_salary",$info['proposed_salary']);
        $stmt->bindParam(":annual_increment",$info['annual_increment']);
        $stmt->bindParam(":increase_in_remuneration",$info['increase_in_remuneration']);
        $stmt->bindParam(":all_perquisites",$info['all_perquisites']);
        $stmt->bindParam(":total_allowance",$info['total_allowance']);
        $stmt->bindParam(":can_placed_perquisites",$info['can_placed_perquisites']);
        $stmt->bindParam(":variable_pay",$info['variable_pay']);
        $stmt->bindParam(":performance_criteria",$info['performance_criteria']);
        $stmt->bindParam(":can_placed_on_variable",$info['can_placed_on_variable']);
        $stmt->bindParam(":notice_period_month",$info['notice_period_month']);
        $stmt->bindParam(":notice_period_comments",$info['notice_period_comments']);
        $stmt->bindParam(":severance_pay_months",$info['severance_pay_months']);
        $stmt->bindParam(":severance_pay_comments",$info['severance_pay_comments']);
        $stmt->bindParam(":minimum_remuneration",$info['minimum_remuneration']);
        $stmt->bindParam(":within_limits",$info['within_limits']);
        $stmt->bindParam(":includes_variable",$info['includes_variable']);
        $stmt->execute();
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveCheckbox($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getDirectorRemunerationTotalCommission() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_non_executive_director_total_commission` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $total_commission[]=$row;
        }
        $dbobject= null;
        return $total_commission;
    }
    function getDirectorRemunerationPastRemuneration() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_revision_in_executive_past_remuneration` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $past_remuneration[]=$row;
        }
        $dbobject= null;
        return $past_remuneration;
    }
    function getDirectorRemunerationEDRemuneration() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_director_remuneration_ed_remuneration` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $ed_remuneration[]=$row;
        }
        $dbobject= null;
        return $ed_remuneration;
    }
    function getDirectorRemunerationPackage() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_revision_in_executive_remuneration_package` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $remuneration_package[]=$row;
        }
        $dbobject= null;
        return $remuneration_package;
    }
    function getDirectorRemunerationPeerComparsion() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_revision_in_executive_peer_comparsion` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $peer_comparsion[]=$row;
        }
        $dbobject= null;
        return $peer_comparsion;
    }
    function getDirectorRemunerationCalculateTotalCommission() {

        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $nedp="NEDP";
        $c_resign="C(Resign)";
        $m_resign="M(Resign)";
        $stmt=$dbobject->prepare("select `dir_din_no` from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `company_classification`=:company_classification and `additional_classification`<>:c_resign and `additional_classification`<>:m_resign");
        $stmt->bindParam(":company_id",$_SESSION['company_id']);
        $stmt->bindParam(":financial_year",$_SESSION['report_year']);
        $stmt->bindParam(":company_classification",$nedp);
        $stmt->bindParam(":c_resign",$c_resign);
        $stmt->bindParam(":m_resign",$m_resign);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $din_no[]=$row;
        }
        $total_nedp=count($din_no);
        $total_variable=0;
        $count=0;
        for($i=0;$i<$total_nedp;$i++) {

            $stmt=$dbobject->prepare("SELECT `variable_pay` FROM `director_remuneration` where `dir_din_no`=:dir_din_no AND `company_id`=:company_id and `rem_year`=:financial_year");
            $stmt->bindParam(":dir_din_no",$din_no[$i]['dir_din_no']);
            $stmt->bindParam(":company_id",$_SESSION['company_id']);
            $stmt->bindParam(":financial_year",$_SESSION['report_year']);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $total_variable +=$row['variable_pay'];
                $count++;
            }
        }
        if($total_nedp!=0) {
            $avg['avg_nedp']=($total_variable/$total_nedp)*100;
        }
        else {
            $avg['avg_nedp']=0;
        }

        $id="ID";
        $c_resign="C(Resign)";
        $m_resign="M(Resign)";
        $stmt=$dbobject->prepare("select `dir_din_no` from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `company_classification`=:company_classification and `additional_classification`<>:c_resign and `additional_classification`<>:m_resign");
        $stmt->bindParam(":company_id",$_SESSION['company_id']);
        $stmt->bindParam(":financial_year",$_SESSION['report_year']);
        $stmt->bindParam(":company_classification",$id);
        $stmt->bindParam(":c_resign",$c_resign);
        $stmt->bindParam(":m_resign",$m_resign);
        $stmt->execute();
        $din_no = array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $din_no[]=$row;
        }
        $total_id=count($din_no);
        $total_variable=0;
        $count=0;
        for($i=0;$i<$total_id;$i++) {

            $stmt=$dbobject->prepare("SELECT `variable_pay` FROM `director_remuneration` where `dir_din_no`=:dir_din_no AND `company_id`=:company_id and `rem_year`=:financial_year");
            $stmt->bindParam(":dir_din_no",$din_no[$i]['dir_din_no']);
            $stmt->bindParam(":company_id",$_SESSION['company_id']);
            $stmt->bindParam(":financial_year",$_SESSION['report_year']);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $total_variable +=$row['variable_pay'];
                $count++;
            }
        }
        if($total_id!=0) {
            $avg['avg_id']=($total_variable/$total_id)*100;
        }
        else {
            $avg['avg_id']=0;
        }

        $ned="NED";
        $c_resign="C(Resign)";
        $m_resign="M(Resign)";
        $stmt=$dbobject->prepare("select `dir_din_no` from `director_info` where `company_id`=:company_id and `financial_year`=:financial_year and `company_classification`=:company_classification and `additional_classification`<>:c_resign and `additional_classification`<>:m_resign");
        $stmt->bindParam(":company_id",$_SESSION['company_id']);
        $stmt->bindParam(":financial_year",$_SESSION['report_year']);
        $stmt->bindParam(":company_classification",$ned);
        $stmt->bindParam(":c_resign",$c_resign);
        $stmt->bindParam(":m_resign",$m_resign);
        $stmt->execute();
        $din_no = array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $din_no[]=$row;
        }
        $total_ned=count($din_no);
        $total_variable=0;
        $count=0;
        for($i=0;$i<$total_ned;$i++) {

            $stmt=$dbobject->prepare("SELECT `variable_pay` FROM `director_remuneration` where `dir_din_no`=:dir_din_no AND `company_id`=:company_id and `rem_year`=:financial_year");
            $stmt->bindParam(":dir_din_no",$din_no[$i]['dir_din_no']);
            $stmt->bindParam(":company_id",$_SESSION['company_id']);
            $stmt->bindParam(":financial_year",$_SESSION['report_year']);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $total_variable +=$row['variable_pay'];
                $count++;
            }
        }
        if($total_ned!=0) {
            $avg['avg_ned']=($total_variable/$total_ned)*100;
        }
        else {
            $avg['avg_ned']=0;
        }

        $dbobject= null;
        return $avg;
    }
    function getDirectorRemunerationTotalCommissionOfYear($years) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        $ned="NED";
        $nedp="NEDP";
        $id="ID";
        $m_resign = "M(Resign)";
        $c_resign = "C(Resign)";


        $array_years = json_decode(stripslashes($years),true);
        $total_years = count($array_years);
        for ($i=0; $i <$total_years ; $i++) {
            $financial_years[] = $array_years[$i]['year'];
        }

        foreach($financial_years as $year) {

            $stmt=$dbobject->prepare("SELECT `dir_din_no` FROM `director_info` where `company_id`=:company_id and `company_classification` IN (:ned,:id,:nedp) and `financial_year`=:financial_year and `additional_classification`<>:c_resign and  `additional_classification`<>:m_resign");
            $stmt->bindParam(":company_id",$_SESSION['company_id']);
            $stmt->bindParam(":financial_year",$year);
            $stmt->bindParam(":ned",$ned);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":nedp",$nedp);
            $stmt->bindParam(":m_resign",$m_resign);
            $stmt->bindParam(":c_resign",$c_resign);
            $stmt->execute();
            $din_no = array();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $din_no[]=$row;
            }
            $total_dirs=count($din_no);

            $total_ned_variable = 0;
            for($i=0;$i<$total_dirs;$i++) {
                $stmt=$dbobject->prepare("SELECT `variable_pay` FROM `director_remuneration` where `dir_din_no`=:dir_din_no AND `company_id`=:company_id AND `rem_year`=:year");
                $stmt->bindParam(":dir_din_no",$din_no[$i]['dir_din_no']);
                $stmt->bindParam(":company_id",$_SESSION['company_id']);
                $stmt->bindParam(":year",$year);
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $total_ned_variable +=$row['variable_pay'];
                }
            }
            if($total_dirs==0) {
                $commission[] = array('year'=>$year,'total'=>0);
            }
            else {
                $commission[] = array('year'=>$year,'total'=>$total_ned_variable/$total_dirs*100);
            }
        }
        $dbobject= null;
        return $commission;
    }
    // ESOPS
    function getEsopRepricingOptiosBeingRepriced() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_esop_repricing_optios_being_repriced` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $esop_repricing[]=$row;
        }
        $dbobject= null;
        return $esop_repricing;
    }
    function getEsopRepricingStockPerformance() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_esop_repricing_stock_performance` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $esop_stock[]=$row;
        }
        $dbobject= null;
        return $esop_stock;
    }
    function addEmployeeStockOptionScheme($info) {
        $status=array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_employee_stock_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_esop_repricing_optios_being_repriced` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_esop_repricing_stock_performance` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_employee_stock_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();

        }
        for($i=0;$i<3;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_esop_repricing_optios_being_repriced`(`pa_reports_id`, `esop_scheme`, `options_outstanding`, `current_option_price`, `current_market_price`, `proposed_option_price`) VALUES(:report_id,:esop_scheme,:options_outstanding,:current_option,:current_market,:proposed_option)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":esop_scheme",$info['esop_scheme'][$i]);
            $stmt->bindParam(":options_outstanding",$info['options_outstanding'][$i]);
            $stmt->bindParam(":current_option",$info['current_option'][$i]);
            $stmt->bindParam(":current_market",$info['current_market'][$i]);
            $stmt->bindParam(":proposed_option",$info['proposed_option'][$i]);
            $stmt->execute();
        }
        for($i=0;$i<5;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_esop_repricing_stock_performance`(`pa_reports_id`, `company`, `sp_cnx_nifty`, `cnx_finance`) VALUES(:report_id,:company,:sp_cnx,:cnx)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":company",$info['company'][$i]);
            $stmt->bindParam(":sp_cnx",$info['sp_cnx'][$i]);
            $stmt->bindParam(":cnx",$info['cnx'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveCheckbox($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    // RPT
    function saveRelatedPartyTransaction($info) {
        $report_id=$_SESSION['report_id'];
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_related_part_transaction_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_related_party_transaction_table1` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_related_party_transaction_table2` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_label=count($info['label_name']);
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        for($i=0;$i<$total_label;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_related_party_transaction_table1`(`pa_reports_id`, `disclosures`, `details_of_disclosure`)  VALUES (:report_id,:label_name,:rpt_value1)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":label_name",$info['label_name'][$i]);
            $stmt->bindParam(":rpt_value1",$info['rpt_value1'][$i]);
            $stmt->execute();
        }
        $total_value=count($info['value1']);
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        for($i=0;$i< $total_value; $i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_related_party_transaction_table2`(`pa_reports_id`, `label_name`, `value1`, `value2`, `value3`, `value4`, `value5`)  VALUES (:report_id,:label_name,:value1,:value2,:value3,:value4,:value5)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":label_name",$info['label_name'][$i+7]);
            $stmt->bindParam(":value1",$info['value1'][$i]);
            $stmt->bindParam(":value2",$info['value2'][$i]);
            $stmt->bindParam(":value3",$info['value3'][$i]);
            $stmt->bindParam(":value4",$info['value4'][$i]);
            $stmt->bindParam(":value5",$info['value5'][$i]);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in']);
        for($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_related_part_transaction_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getRPTTable1() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_related_party_transaction_table1` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table1[]=$row;
        }
        $dbobject= null;
        return $table1;
    }
    function getRPTTable2() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_related_party_transaction_table2` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table2[]=$row;
        }
        $dbobject= null;
        return $table2;

    }

    // corporate actions
    function saveCorporateAction($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_corporate_action_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_corporate_action_utilisation_of_borrowing_limits` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_corporate_action_change_in_shareholding_pattern` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_used_in = count($info['used_in_text']);
        for ($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_corporate_action_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $total_existing=count($info['existing']);
        for($i=0;$i<$total_existing;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_corporate_action_utilisation_of_borrowing_limits`(`pa_reports_id`,`quater`,`year`,`existing`,`unavailed`,`proposed`) VALUES (:report_id,:quater,:year,:existing,:unavailed,:proposed)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam("quater",$info['quater'][$i]);
            $stmt->bindParam("year",$info['year'][$i]);
            $stmt->bindParam("existing",$info['existing'][$i]);
            $stmt->bindParam("unavailed",$info['unavailed'][$i]);
            $stmt->bindParam("proposed",$info['proposed'][$i]);
            $stmt->execute();
        }
        $total_qty=count($info['qty']);
        for($i=0;$i<$total_qty;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_corporate_action_change_in_shareholding_pattern`(`pa_reports_id`,`qty`,`percent`) VALUES(:report_id,:qty,:percent)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":qty",$info['qty'][$i]);
            $stmt->bindParam(":percent",$info['percent'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveCheckbox($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getCorporateActionShareholdingPattern() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_corporate_action_change_in_shareholding_pattern` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $shareholding_pattern[]=$row;
        }
        $dbobject= null;
        return $shareholding_pattern;
    }
    function getCorporateActionBorrowingLimits() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_corporate_action_utilisation_of_borrowing_limits` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $borrowing_limits[]=$row;
        }
        $dbobject= null;
        return $borrowing_limits;
    }
    // Alteration in MOA/AOA
    function addAlterationMoaAoa($info) {

        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_alteration_moa_aoa_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in = count($info['used_in_text']);
        for ($i = 0; $i < $total_used_in; $i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_alteration_moa_aoa_other_text` (`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id", $_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name", $info['resolution_section'][$i]);
            $stmt->bindParam(":used_in", $info['used_in'][$i]);
            $stmt->bindParam(":text", $info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveCheckbox($info);
        $this->saveTriggers($info);
        $dbobject=null;
        // return $status;
    }
    //issues of shares
    function addIssuesOfShares($info) {
        $status=array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_issues_of_shares_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_preferential_issue_past_equity_issue` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_preferential_issue_dilution_to_shareholding` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_issue_of_securities_dilution_to_shareholding` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for ($i = 0; $i < $total_used_in; $i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_issues_of_shares_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section", $info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        for ($i = 0; $i < count($info['year']) ; $i++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_preferential_issue_past_equity_issue`(`pa_reports_id`,`year`,`capital_raised`,`subscriber`,`no_of_shares`,`issues_price`) VALUES(:report_id, :year,:capital_raised,:subscriber,:no_of_share,:issue_price)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":year",$info['year'][$i]);
            $stmt->bindParam(":capital_raised",$info['capital_raised'][$i]);
            $stmt->bindParam(":subscriber",$info['subscriber'][$i]);
            $stmt->bindParam(":no_of_share",$info['no_of_share'][$i]);
            $stmt->bindParam(":issue_price",$info['issue_price'][$i]);
            $stmt->execute();
        }
        $total_dilutions=count($info['dilution_sno']);
        for($i=0;$i<$total_dilutions;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_preferential_issue_dilution_to_shareholding`(`pa_reports_id`,`sno`,`class_of_shareholder`,`pre_allotment_no_of_shares`,`pre_allotment_paid_up_capital`,`post_allotment_no_of_shares`,`post_allotment_paid_up_capital`) VALUES(:report_id,:dilution_sno,:dilution_class,:dilution_pre_nos,:dilution_pre_paid_up,:dilution_post_nos,:dilution_post_paid_up)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":dilution_sno",$info['dilution_sno'][$i]);
            $stmt->bindParam(":dilution_class",$info['dilution_class'][$i]);
            $stmt->bindParam(":dilution_pre_nos",$info['dilution_pre_nos'][$i]);
            $stmt->bindParam(":dilution_pre_paid_up",$info['dilution_pre_paid_up'][$i]);
            $stmt->bindParam(":dilution_post_nos",$info['dilution_post_nos'][$i]);
            $stmt->bindParam(":dilution_post_paid_up",$info['dilution_post_paid_up'][$i]);
            $stmt->execute();
        }
        $total_securities=count($info['securities_sno']);
        for($i=0;$i<$total_securities;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_issue_of_securities_dilution_to_shareholding`(`pa_reports_id`,`sno`,`class_of_shareholder`,`pre_nos`,`pre_paid_up`,`post_nos`,`post_paid_up`) VALUES(:report_id,:securities_sno,:securities_class,:securities_pre_nos,:securities_pre_paid,:securities_post_nos,:securities_post_paid)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":securities_sno",$info['securities_sno'][$i]);
            $stmt->bindParam(":securities_class",$info['securities_class'][$i]);
            $stmt->bindParam(":securities_pre_nos",$info['securities_pre_nos'][$i]);
            $stmt->bindParam(":securities_pre_paid",$info['securities_pre_paid'][$i]);
            $stmt->bindParam(":securities_post_nos",$info['securities_post_nos'][$i]);
            $stmt->bindParam(":securities_post_paid",$info['securities_post_paid'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveCheckbox($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getIssuesOfSharesPastEquity() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_preferential_issue_past_equity_issue` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $past_equity[]=$row;
        }
        $dbobject= null;
        return $past_equity;
    }
    function getIssuesOfSharesDilutionToShareholding() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_preferential_issue_dilution_to_shareholding` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $dilution_to_shareholding[]=$row;
        }
        $dbobject= null;
        return $dilution_to_shareholding;
    }
    function getIssuesOfSharesDilutionToShareholdingSecurities() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_issue_of_securities_dilution_to_shareholding` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $dilution_to_shareholding_securities[]=$row;
        }
        $dbobject= null;
        return $dilution_to_shareholding_securities;
    }

    // Fill investment
    function addFillInvestment($info){
        // session_start();
        $status=array();
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        // print_r($info);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        echo $edit_mode;
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_fill_investment_limits_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_fill_investment_limits_fii` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_fill_investment_limits_promoter` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_fill_investment_limits_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        $total_used_in=count($info['quarter_fii']);
        //echo $total_used_in;
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_fill_investment_limits_fii`(`pa_reports_id`, `quarter`, `year`, `fii_shareholding`) VALUES(:report_id,:quarter_fii,:year_fii,:fii)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":quarter_fii",$info['quarter_fii'][$i]);
            $stmt->bindParam(":year_fii",$info['year_fii'][$i]);
            $stmt->bindParam(":fii",$info['fii'][$i]);
            $stmt->execute();
        }
        $total_used_in=count($info['quarter_promoter']);
        //echo $total_used_in;
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_fill_investment_limits_promoter`(`pa_reports_id`, `quarter`, `year`, `promoter_shareholding`)VALUES(:report_id,:quarter_promoter,:year_promoter,:promoter)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":quarter_promoter",$info['quarter_promoter'][$i]);
            $stmt->bindParam(":year_promoter",$info['year_promoter'][$i]);
            $stmt->bindParam(":promoter",$info['promoter'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $dbobject=null;
    }
    function getOtherResolutionFillInvestment() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_fill_investment_limits_fii` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $fii[]=$row;
        }
        $dbobject= null;
        return $fii;
    }
    function getOtherResolutionPromoterShareholding() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_fill_investment_limits_promoter` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $promoter[]=$row;
        }
        $dbobject= null;
        return $promoter;
    }

    // Delisting of shares
    function addDelistingOfShares($info){
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        echo $edit_mode;
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_delisting_of_shares_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_delisting_of_shares_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $dbobject=null;
    }

    // Donation to charitable trust
    function addDonationToCharitableTrust($info){

        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        echo $edit_mode;
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_donations_to_charitable_trust_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_donations_to_charitable_trust_csr_contributors` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        //echo $total_used_in;
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_donations_to_charitable_trust_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();

        }
        $total_used_in=count($info['csr']);
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_donations_to_charitable_trust_csr_contributors`(`pa_reports_id`, `year`, `csr`, `csr_np`) VALUES(:report_id,:year,:csr,:csr_np)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":year",$info['year'][$i]);
            $stmt->bindParam(":csr",$info['csr'][$i]);
            $stmt->bindParam(":csr_np",$info['csr_np'][$i]);
            $stmt->execute();

        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getDonationsOfCharitableCSR() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_donations_to_charitable_trust_csr_contributors` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $csr_contributors[]=$row;
        }
        $dbobject= null;
        return $csr_contributors;
    }

    // Office of profit
    function addOfficeOfProfit($info){
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_office_of_profit_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        //echo $total_used_in;
        for($i=0;$i<$total_used_in;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_office_of_profit_other_text`(`pa_reports_id`,`resolution_name`, `section_name`, `used_in`, `text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }


    // Committee Performance
    function getCommitteePerformanceDetails() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_board_committee_performance` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $commitee_performance[]=$row;
        }
        $dbobject= null;
        return $commitee_performance;
    }
    function getBoardGovernanceScore() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_board_governance_score` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $board_governance_score[]=$row;
        }
        $dbobject= null;
        return $board_governance_score;
    }
    function saveCommitteePerformanceDetails($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $pa_report_id = $_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_board_committee_performance` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_board_governance_score` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$pa_report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        for($i=0;$i<count($info['total']);$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_board_committee_performance` (`pa_reports_id`, `total`, `chairman_com_classification`,`chairman_ses_classification`,`overall_com_independence`,`overall_ses_independence`,`no_meetings`,`attendance_less_75`) VALUES (:pa_reports_id, :total, :chairman_com_classification,:chairman_ses_classification, :overall_com_independence,:overall_ses_independence,:no_meetings,:attendance_less_75)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":total",$info['total'][$i]);
            $stmt->bindParam(":chairman_com_classification",$info['chairman_com_classification'][$i]);
            $stmt->bindParam(":chairman_ses_classification",$info['chairman_ses_classification'][$i]);
            $stmt->bindParam(":overall_com_independence",$info['overall_com_independence'][$i]);
            $stmt->bindParam(":overall_ses_independence",$info['overall_ses_independence'][$i]);
            $stmt->bindParam(":no_meetings",$info['no_meetings'][$i]);
            $stmt->bindParam(":attendance_less_75",$info['attendance_less_75'][$i]);
            $stmt->execute();
        }
        for($i=0;$i<count($info['response']);$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_board_governance_score` (`pa_reports_id`, `response`, `score`) VALUES (:pa_reports_id,:response,:score)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":response",$info['response'][$i]);
            $stmt->bindParam(":score",$info['score'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $response['status']=200;
        $dbobject = null;
        return $response;
    }

    // Remuneration analysis
    function saveRemunerationAnalysisDetails($info) {
        $dbobject = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        $pa_report_id = $_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_remuneration_analysis` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_executive_remuneration_growth` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_executive_remuneration_peer_comparison` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_variation_director_remuneration` WHERE `pa_reports_id`='$pa_report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$pa_report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
        }
        for($i=0;$i<count($info['director_name']);$i++) {

            $stmt = $dbobject->prepare("insert into `pa_report_remuneration_analysis` (`pa_reports_id`, `director_name`,`dir_din_no`, `promoter_non_promoter`,`rem_first_year`,`fixed_pay_first_year`,`total_pay_first_year`,`rem_second_year`,`fixed_pay_second_year`,`total_pay_second_year`,`rem_third_year`,`fixed_pay_third_year`,`total_pay_third_year`,`ratio`) VALUES (:pa_reports_id, :director_name,:dir_din_no,:promoter_non_promoter,:rem_first_year, :fixed_pay_first_year,:total_pay_first_year,:rem_second_year,:fixed_pay_second_year,:total_pay_second_year,:rem_third_year, :fixed_pay_third_year,:total_pay_third_year,:ratio)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":director_name",$info['director_name'][$i]);
            $stmt->bindParam(":dir_din_no",$info['dir_din_no'][$i]);
            $stmt->bindParam(":promoter_non_promoter",$info['promoter_non_promoter'][$i]);
            $stmt->bindParam(":rem_first_year",$info['remuneration_year_1']);
            $stmt->bindParam(":fixed_pay_first_year",$info['fixed_pay_first_year'][$i]);
            $stmt->bindParam(":total_pay_first_year",$info['total_pay_first_year'][$i]);
            $stmt->bindParam(":rem_second_year",$info['remuneration_year_2']);
            $stmt->bindParam(":fixed_pay_second_year",$info['fixed_pay_second_year'][$i]);
            $stmt->bindParam(":total_pay_second_year",$info['total_pay_second_year'][$i]);
            $stmt->bindParam(":rem_third_year",$info['remuneration_year_3']);
            $stmt->bindParam(":fixed_pay_third_year",$info['fixed_pay_third_year'][$i]);
            $stmt->bindParam(":total_pay_third_year",$info['total_pay_third_year'][$i]);
            $stmt->bindParam(":ratio",$info['ratio_to_mre'][$i]);
            $stmt->execute();
        }


        for($i=0;$i<5;$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_executive_remuneration_growth` (`pa_reports_id`, `financial_year`, `md`,`indexed_tsr`) VALUES (:pa_reports_id, :financial_year, :md,:indexed_tsr)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":financial_year",$info['executive_growth_year'][$i]);
            $stmt->bindParam(":md",$info['md'][$i]);
            $stmt->bindParam(":indexed_tsr",$info['indexed_tsr'][$i]);
            $stmt->execute();
        }

        for($i=0;$i<=2;$i++) {
            $stmt = $dbobject->prepare("insert into `pa_report_executive_remuneration_peer_comparison` (`pa_reports_id`, `company_name`, `director_name`,`promoter_group`,`remuneration`,`net_profits`,`rem_percentage`) VALUES (:pa_reports_id, :company_name, :director_name,:promoter_group, :remuneration,:net_profits,:rem_percentage)");
            $stmt->bindParam(":pa_reports_id",$pa_report_id);
            $stmt->bindParam(":company_name",$info['company_name_peer_comparison'][$i]);
            $stmt->bindParam(":director_name",$info['director_name_peer_comparison'][$i]);
            $stmt->bindParam(":promoter_group",$info['promoter_peer_comparison'][$i]);
            $stmt->bindParam(":remuneration",$info['remuneration_peer_comparison'][$i]);
            $stmt->bindParam(":net_profits",$info['net_profit_peer_comparison'][$i]);
            $stmt->bindParam(":rem_percentage",$info['rem_per_peer_comparison'][$i]);
            $stmt->execute();
        }

        $stmt = $dbobject->prepare("insert into `pa_report_variation_director_remuneration` (`pa_reports_id`, `ex_promoter`, `ex_non_promoter`,`non_ex_promoter`,`non_ex_non_promoter`) VALUES (:pa_reports_id, :ex_promoter, :ex_non_promoter,:non_ex_promoter, :non_ex_non_promoter)");
        $stmt->bindParam(":pa_reports_id",$pa_report_id);
        $stmt->bindParam(":ex_promoter",$info['ex_promoter']);
        $stmt->bindParam(":ex_non_promoter",$info['ex_non_promoter']);
        $stmt->bindParam(":non_ex_promoter",$info['non_ex_promoter']);
        $stmt->bindParam(":non_ex_non_promoter",$info['non_ex_non_promoter']);
        $stmt->execute();
        $this->saveAnalysis($info);
        $response['status']=200;
        $dbobject = null;
        return $response;
    }
    function getRemunerationAnalysis() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_remuneration_analysis` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $remuneration_analysis[]=$row;
        }
        $dbobject= null;
        return $remuneration_analysis;
    }
    function getExecutiveRemunerationGrowth() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_executive_remuneration_growth` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $executive_remuneration_growth[]=$row;
        }
        $dbobject= null;
        return $executive_remuneration_growth;
    }
    function getExecutiveRemunerationPeerComparison() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_executive_remuneration_peer_comparison` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $executive_remuneration_peer_comparison[]=$row;
        }
        $dbobject= null;
        return $executive_remuneration_peer_comparison;
    }
    function getVariationDirectorRemuneration() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_variation_director_remuneration` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $variation_director_remuneration[]=$row;
        }
        $dbobject= null;
        return $variation_director_remuneration;
    }

// intercorporate loans
    function addIntercorporateLoansGuaranteesInvestments($info) {
        $status = array();
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        print_r($info['checkbox']);
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_intercorparate_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_intercorporate_loans_existing_transactions` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_intercorporate_loans_the_recipient` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $count=count($info['share']);
        for($i=0;$i<$count;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_intercorporate_loans_the_recipient` (`pa_reports_id`,`s_date`,`share`,`reserves_and_surplus`,`assets`,`liabilities`,`revenues`,`profit_after_tax`) VALUES (:report_id,:selected_date,:share,:reserves_and_surplus,:assets,:liabilities,:revenues,:profit_after_tax)");
            $date = date_format(date_create_from_format('d-M-Y', $info['date'][$i]), 'Y-m-d');
            $stmt->bindParam(':report_id',$report_id);
            $stmt->bindParam(':selected_date',$date);
            $stmt->bindParam(':share',$info['share'][$i]);
            $stmt->bindParam(':reserves_and_surplus',$info['reserves_and_surplus'][$i]);
            $stmt->bindParam(':assets',$info['assets'][$i]);
            $stmt->bindParam(':liabilities',$info['liabilities'][$i]);
            $stmt->bindParam(':revenues',$info['revenues'][$i]);
            $stmt->bindParam(':profit_after_tax',$info['profit_after_tex'][$i]);
            $stmt->execute();
        }
        $total_used_in=count($info['used_in_text']);
        for($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_intercorparate_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$report_id);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();

        }

        $date1 = $info['selected_date'][0]=='' || $info['selected_date'][0]=='0000-00-00'  ? '0000-00-00' :  date_format(date_create_from_format('d-M-Y', $info['selected_date'][0]), 'Y-m-d');
        $date2 = $info['selected_date'][1]=='' || $info['selected_date'][1]=='0000-00-00' ? '0000-00-00' :  date_format(date_create_from_format('d-M-Y', $info['selected_date'][1]), 'Y-m-d');

        $total_transaction = count($info['transaction_details']);
        for ($j = 0,$counter=0; $j < $total_transaction; $j++) {
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_intercorporate_loans_existing_transactions`(`pa_reports_id`,`type`,`transaction_details`,`first_date`,`details_values1`,`second_date`,`details_values2`) VALUES(:report_id,:type,:transaction_details,:first_date,:details_values1,:second_date,:details_values2)");
            $stmt->bindParam(":report_id", $report_id);
            $stmt->bindParam(":type", $info['type'][$counter]);
            $stmt->bindParam(":transaction_details", $info['transaction_details'][$j]);
            $stmt->bindParam(":first_date", $date1);
            $stmt->bindParam(":details_values1", $info['details_values1'][$j]);
            $stmt->bindParam(":second_date", $date2);
            $stmt->bindParam(":details_values2", $info['details_values2'][$j]);
            $stmt->execute();
            if($j==1) {
                $counter++;
            }
        }
        $this->saveAnalysis($info);
        $this->saveTriggers($info);
        $this->saveCheckbox($info);
        $this->saveRecommendation($info);
        $dbobject = null;
        return $status;
    }
    function getIntercorporateLoanExistingTransactions() {

        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_intercorporate_loans_existing_transactions` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['first_date'] = date_format(date_create_from_format('Y-m-d', $row['first_date']), 'd-M-Y');
            $row['second_date'] = date_format(date_create_from_format('Y-m-d', $row['second_date']), 'd-M-Y');
            $existing_transactions[]=$row;
        }
        $dbobject= null;
        return $existing_transactions;
    }
    function getIntercorporateLoanTheRecipient() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_intercorporate_loans_the_recipient` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['s_date'] = date_format(date_create_from_format('Y-m-d', $row['s_date']), 'd-M-Y');
            $the_recipient[]=$row;
        }
        $dbobject= null;
        return $the_recipient;
    }

    // SCHEME OF ARRANGEMENT/AMALGAMATION
    function saveSchemeOfArrangement($info) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $report_id=$_SESSION['report_id'];
        $edit_mode=$info['edit_mode'];
        if($edit_mode=="Edit Mode") {
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_scheme_of_arrangement_other_text` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_triggers` WHERE `pa_reports_id`='$report_id' and `resolution_section`=:resolution_section");
            $stmt->bindParam(":resolution_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_checkbox` WHERE `pa_reports_id`='$report_id' and `main_section`=:main_section");
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_analysis_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_recommendations_text` WHERE `pa_reports_id`='$report_id' and `resolution_name`=:resolution_name");
            $stmt->bindParam(":resolution_name",$info['main_section']);
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_scheme_of_arrangement_profiles_of_the_companies` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_scheme_of_arrangement_share_holding` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
            $stmt=$dbobject->prepare("DELETE FROM `pa_report_scheme_of_arrangement_capital_structure` WHERE `pa_reports_id`='$report_id'");
            $stmt->execute();
        }
        $total_used_in = count($info['used_in_text']);
        for ($i=0;$i<$total_used_in;$i++) {
            if($info['used_in_text'][$i]=="") {
                $info['used_in_text'][$i] = "&nbsp;";
            }
            $stmt = $dbobject->prepare("INSERT INTO `pa_report_scheme_of_arrangement_other_text`(`pa_reports_id`,`resolution_name`,`section_name`,`used_in`,`text`) VALUES(:report_id,:main_section,:section_name,:used_in,:text)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":main_section",$info['main_section']);
            $stmt->bindParam(":section_name",$info['resolution_section'][$i]);
            $stmt->bindParam(":used_in",$info['used_in'][$i]);
            $stmt->bindParam(":text",$info['used_in_text'][$i]);
            $stmt->execute();
        }
        $total_company_name=count($info['company_name']);
        for($i=0;$i<$total_company_name;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_scheme_of_arrangement_profiles_of_the_companies`( `pa_reports_id`, `company_name`, `background`, `nature_of_bussiness`, `aurthorized_capital`, `issued_capital`) VALUES(:report_id,:company_name,:background,:nature_of_bussiness,:aurthorized_capital,:issued_capital)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":company_name",$info['company_name'][$i]);
            $stmt->bindParam(":background",$info['background'][$i]);
            $stmt->bindParam(":nature_of_bussiness",$info['nature_of_bussiness'][$i]);
            $stmt->bindParam(":aurthorized_capital",$info['aurthorized_capital'][$i]);
            $stmt->bindParam(":issued_capital",$info['issued_capital'][$i]);
            $stmt->execute();
        }
        $total_pre_nos=count($info['pre_nos']);
        for($i=0;$i<$total_pre_nos;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_scheme_of_arrangement_share_holding`(`pa_reports_id`, `pre_nos`, `pre_percent`, `post_nos`, `post_percent`) VALUES(:report_id,:pre_nos,:pre_percent,:post_nos,:post_percent)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":pre_nos",$info['pre_nos'][$i]);
            $stmt->bindParam(":pre_percent",$info['pre_percent'][$i]);
            $stmt->bindParam(":post_nos",$info['post_nos'][$i]);
            $stmt->bindParam(":post_percent",$info['post_percent'][$i]);
            $stmt->execute();
        }
        $total_pre_scheme=count($info['pre_scheme']);
        for($i=0;$i<$total_pre_scheme;$i++) {
            $stmt=$dbobject->prepare("INSERT INTO `pa_report_scheme_of_arrangement_capital_structure`(`pa_reports_id`, `pre_scheme`, `post_scheme`) VALUES(:report_id,:pre_nos,:post_scheme)");
            $stmt->bindParam(":report_id",$_SESSION['report_id']);
            $stmt->bindParam(":pre_nos",$info['pre_scheme'][$i]);
            $stmt->bindParam(":post_scheme",$info['post_scheme'][$i]);
            $stmt->execute();
        }
        $this->saveAnalysis($info);
        $this->saveRecommendation($info);
        $this->saveTriggers($info);
        $dbobject=null;
    }
    function getProfilesOfTheCompanies() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_scheme_of_arrangement_profiles_of_the_companies` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $profiles_of_the_companies[]=$row;
        }
        $dbobject= null;
        return $profiles_of_the_companies;
    }
    function getShareHolding() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_scheme_of_arrangement_share_holding` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $share_holding[]=$row;
        }
        $dbobject= null;
        return $share_holding;
    }
    function getCapitalStructure() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_scheme_of_arrangement_capital_structure` WHERE `pa_reports_id`=:report_id");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $capital_structure[]=$row;
        }
        $dbobject= null;
        return $capital_structure;
    }

//    appointnment of directors

    function getCheckboxAD($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_checkbox` WHERE `pa_reports_id`=:report_id AND `director_no`=:slot_no AND `main_section`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":report_id", $_SESSION['report_id']);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $checkbox[]=$row;
        }
        $dbobject=null;
        return $checkbox;
    }
    function checkExistingOfDataAD($main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_analysis_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `resolution_name`=:main_section AND `director_no`=:slot_no");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        if($stmt->rowCount()>0) {
            $response['status']="Existing";
        }
        else {
            $response['status']="Not Existing";
        }
        $dbobject=null;
        return $response;
    }
    function getAnalysisDataAD($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_analysis_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['analysis_text']=="&nbsp;") {
                $row['analysis_text']="";
            }
            $analysis[]=$row;
        }
        $dbobject=null;
        return $analysis;
    }
    function getRecommendationDataAD($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_recommendations_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['recommendation_text']=="&nbsp;") {
                $row['recommendation_text']="";
            }
            $recommendation[]=$row;
        }
        $dbobject=null;
        return $recommendation;
    }
    function getOtherTextDataAD($resolution_section,$main_section,$slot_no) {
        // $table_name="`pa_report_".$resolution_section."_other_text`";
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_other_text` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no AND `resolution_name`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['text']=="&nbsp;") {
                $row['text']="";
            }
            $other_text[]=$row;
        }
        $dbobject=null;
        return $other_text;
    }
    function getTriggersAD($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_triggers` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no AND `resolution_section`=:main_section");
        $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $triggers[]=$row;
        }
        $dbobject=null;
        return $triggers;
    }
    function getAppointmentOfDirectorPastRemuneration($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_past_remuneration` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no");
        // $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $past_remuneration[]=$row;
        }
        $dbobject=null;
        return $past_remuneration;
    }
    function getAppointmentOfDirectorPeerComparsion($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_executive_remuneration_p_c` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no");
        // $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $peer_comparision[]=$row;
        }
        $dbobject=null;
        return $peer_comparision;
    }
    function getAppointmentOfDirectorTable2($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_executive_remuneration_table_2` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no");
        // $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $table_2[]=$row;
        }
        $dbobject=null;
        return $table_2;
    }
    function getAppointmentOfDirectorRemunerationPackage($resolution_section,$main_section,$slot_no) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_appointment_directors_rem_package` WHERE `pa_reports_id`='$_SESSION[report_id]' AND `director_no`=:slot_no");
        // $stmt->bindParam(":main_section",$main_section);
        $stmt->bindParam(":slot_no",$slot_no);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $remuneration_package[]=$row;
        }
        $dbobject=null;
        return $remuneration_package;
    }

    // disclousres
    function checkExistingOfDataDisclosures() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_disclosures` WHERE `pa_reports_id`='$_SESSION[report_id]'");

        $stmt->execute();
        if($stmt->rowCount()>0) {
            $response['status']="Existing";
        }
        else {
            $response['status']="Not Existing";
        }
        $dbobject=null;
        return $response;
    }
    function getDisclosures() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_disclosures` WHERE `pa_reports_id`='$_SESSION[report_id]'");

        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $disclosures[]=$row;
        }
        $dbobject=null;
        return $disclosures;
    }
    function getDisclousuresAnalysisText() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_analysis_text` WHERE `pa_reports_id`=:report_id and `resolution_name`=:resolution_name and `resolution_section`=:resolution_section");
        $stmt->bindParam(":report_id",$_SESSION['report_id']);
        $resolution_name = "Disclosure Required in Director's Report";
        $resolution_section = "Disclosure Required in Director's Report";
        $stmt->bindParam(":resolution_name",$resolution_name);
        $stmt->bindParam(":resolution_section",$resolution_section);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['analysis_text']=="&nbsp;") {
                $row['analysis_text']="";
            }
            $analysis[]=$row;
        }
        $dbobject=null;
        return $analysis;
    }
    //new changes
    function getTotalPayFromRemuneration() {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt=$dbobject->prepare("SELECT * FROM `pa_report_remuneration_analysis` WHERE `pa_reports_id`='$_SESSION[report_id]'");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $past_value[]=$row;
        }
        $dbobject=null;
        return $past_value;
    }
    function getMarketDataEpsAndDividend($financial_years) {
        $dbobject = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $company_id=$_SESSION['company_id'];
        $financial_year=$_SESSION['report_year'];
        $stmt=$dbobject->prepare("SELECT * FROM `dividend_info` WHERE `company_id`=:company_id AND `financial_year`=:financial_year");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->bindParam(":financial_year",$financial_year);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $response['eps']=$row['eps'];

        $array_financial_years = json_decode(stripslashes($financial_years),true);
        $total_ids = count($array_financial_years);
        for ($i=0; $i <$total_ids ; $i++) {
            $array_years[] = $array_financial_years[$i]['year'];
        }

        $stmt = $dbobject->prepare(" select `companies`.`peer1`,`companies`.`peer2` from `companies` where `id`=:company_id");
        $stmt->bindParam(":company_id",$company_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $company_ids = array($company_id,$company_id,$company_id,$row['peer1'],$row['peer2']);

        for($i=0;$i<5;$i++) {
            $stmt=$dbobject->prepare("SELECT * FROM `dividend_info` WHERE `company_id`=:company_id AND `financial_year`=:financial_year");
            $stmt->bindParam(":company_id",$company_ids[$i]);
            $stmt->bindParam(":financial_year",$array_years[$i]);
            $stmt->execute();
            if($stmt->rowCount()>0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $dividend[]= $row['dividend'];
            }
            else {
                $dividend[]= 0;
            }
        }
        $response['dividend'] = $dividend;
        $dbobject=null;
        return $response;
    }
    function filteredDirectorsForSheet($directors) {

        $is_chairman_id = false;
        $is_chairman_ed = false;
        $is_chairman_edp = false;
        $is_chairman_nedp = false;
        $is_chairman_ned = false;

        foreach ($directors as $director) {
            if($director['company_classification']=='ID' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                $is_chairman_id = true;
            }
            if($director['company_classification']=='ED' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                $is_chairman_ed = true;
            }
            if($director['company_classification']=='EDP' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                $is_chairman_edp = true;
            }
            if($director['company_classification']=='NEDP' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                $is_chairman_nedp = true;
            }
            if($director['company_classification']=='NED' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                $is_chairman_ned = true;
            }
        }
        if($is_chairman_id) {

            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && ($director['additional_classification']!='CMD' && $director['additional_classification']!='C' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
        }

        if($is_chairman_ed) {

            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && ($director['additional_classification']!='CMD' && $director['additional_classification']!='C' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
        }

        if($is_chairman_edp) {

            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && ($director['additional_classification']!='CMD' && $director['additional_classification']!='C' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
        }

        if($is_chairman_nedp) {

            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && ($director['additional_classification']!='CMD' && $director['additional_classification']!='C' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
        }

        if($is_chairman_ned) {

            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && ($director['additional_classification']=='CMD' || $director['additional_classification']=='C')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NED' && ($director['additional_classification']!='CMD' && $director['additional_classification']!='C' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)')) {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='NEDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ID' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='EDP' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
            foreach ($directors as $director) {
                if($director['company_classification']=='ED' && $director['additional_classification']!='C(Resign)' && $director['additional_classification']!='M(Resign)') {
                    $filtered_directors[]=$director;
                }
            }
        }
        return $filtered_directors;
    }
}
?>