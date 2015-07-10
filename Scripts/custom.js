function CustomJS() {

}

CustomJS.prototype = {
    initializePage4: function() {
        this.page4InitializeCalls();
        this.page4Actions();
        $("#no_of_resolutions").change(function() {
            var total = $("#no_of_resolutions").val();
            $(".text-of-resolutions .deletable").remove();
            $(".name-of-directors .deletable").remove();
            $(".attendance-record .deletable").remove();

            for(var i=1;i<total;i++) {

                var $clone=$(".text-of-resolutions .template").clone();
                $clone.removeClass('template');
                $clone.addClass('deletable');
                $(".text-of-resolutions").append($clone);

                $clone_directors=$(".name-of-directors .template").clone();
                $clone_directors.removeClass('template');
                $clone_directors.addClass('deletable');
                $(".name-of-directors").append($clone_directors);

                $clone_director_attendance=$(".attendance-record .template").clone();
                $clone_director_attendance.removeClass('template');
                $clone_director_attendance.addClass('deletable');
                $(".attendance-record").append($clone_director_attendance);
            }

        });
        $("#full_time_position_in_material_entity").change(function() {
            if($(this).val()=='yes') {
                $("#full_time_position_in_material_entity_dependent").removeClass('hidden');
            }
            else {
                $("#full_time_position_in_material_entity_dependent").addClass('hidden');
            }
        });
        $("#director_an_ed_at_listed_company").change(function() {
            if($(this).val()=='yes') {
                $("#director_an_ed_at_listed_company_dependent_block_1").removeClass('hidden');
                $("#director_an_ed_at_listed_company_dependent_block_2").addClass('hidden');
            }
            else {
                $("#director_an_ed_at_listed_company_dependent_block_1").addClass('hidden');
                $("#director_an_ed_at_listed_company_dependent_block_2").removeClass('hidden');
            }
        });
        $("#company_have_nomination_remuneration_committee").change(function() {
            if($(this).val()=='no') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:1
                    },
                    success: function(data) {
                        $("#company_have_nomination_remuneration_committee_analysis_text textarea").text(data.analysis_text);
                        $("#company_have_nomination_remuneration_committee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_have_nomination_remuneration_committee_analysis_text textarea").text("");
                $("#company_have_nomination_remuneration_committee_analysis_text").addClass('hidden');
            }
        });
        $("#nomination_remuneration_committee_compliant_with_the_companies_act").change(function() {
            if($(this).val()=='no') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:2
                    },
                    success: function(data) {
                        $("#nomination_remuneration_committee_compliant_with_the_companies_act_analysis_text textarea").text(data.analysis_text);
                        $("#nomination_remuneration_committee_compliant_with_the_companies_act_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#nomination_remuneration_committee_compliant_with_the_companies_act_analysis_text textarea").text("");
                $("#nomination_remuneration_committee_compliant_with_the_companies_act_analysis_text").addClass('hidden');
            }
        });
        $("#remuneration_paid_to_the_director_disclosed").change(function() {
            if($(this).val()=='no') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:3
                    },
                    success: function(data) {
                        $("#remuneration_paid_to_the_director_disclosed_analysis_text textarea").text(data.analysis_text);
                        $("#remuneration_paid_to_the_director_disclosed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#remuneration_paid_to_the_director_disclosed_analysis_text textarea").text("");
                $("#remuneration_paid_to_the_director_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#directors_remuneration_exceeds_25_of_the_remuneration_paid").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:4
                    },
                    success: function(data) {
                        $("#directors_remuneration_exceeds_25_of_the_remuneration_paid_analysis_text textarea").text(data.analysis_text);
                        $("#directors_remuneration_exceeds_25_of_the_remuneration_paid_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#directors_remuneration_exceeds_25_of_the_remuneration_paid_analysis_text textarea").text("");
                $("#directors_remuneration_exceeds_25_of_the_remuneration_paid_analysis_text").addClass('hidden');
            }
        });
        $("#remuneration_paid_to_director_more_than_3_times").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:5
                    },
                    success: function(data) {
                        $("#remuneration_paid_to_director_more_than_3_times_analysis_text textarea").text(data.analysis_text);
                        $("#remuneration_paid_to_director_more_than_3_times_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#remuneration_paid_to_director_more_than_3_times_analysis_text textarea").text("");
                $("#remuneration_paid_to_director_more_than_3_times_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_director_director_at_competitor_company").change(function() {
            if($(this).val()=='yes') {
                $("#is_the_director_director_at_competitor_company_dependent_block_1").removeClass('hidden');
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:6
                    },
                    success: function(data) {
                        $("#is_the_director_director_at_competitor_company_analysis_text textarea").text(data.analysis_text);
                        $("#is_the_director_director_at_competitor_company_analysis_text #standard_text_hidden").val(data.analysis_text);
                        $("#is_the_director_director_at_competitor_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_director_director_at_competitor_company_dependent_block_1").addClass('hidden');
                $("#is_the_director_director_at_competitor_company_analysis_text textarea").text("");
                $("#is_the_director_director_at_competitor_company_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_director_director_at_competitor_company_dependent_block_1 .competitor_company_name").keyup(function() {
            var str = $("#is_the_director_director_at_competitor_company_analysis_text #standard_text_hidden").val();
            if($(this).val()!="") {
                var res = str.replace("[competitor]", $(this).val());
                $("#is_the_director_director_at_competitor_company_analysis_text textarea").text(res);
            }
            else {
                $("#is_the_director_director_at_competitor_company_analysis_text textarea").text(str);
            }
        });
        $("#tenure_of_the_director_more_than_10_years").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:7
                    },
                    success: function(data) {
                        $("#tenure_of_the_director_more_than_10_years_analysis_text textarea").text(data.analysis_text);
                        $("#tenure_of_the_director_more_than_10_years_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#tenure_of_the_director_more_than_10_years_analysis_text textarea").text("");
                $("#tenure_of_the_director_more_than_10_years_analysis_text").addClass('hidden');
            }
        });
        $("#board_composition_non_compliant_more_than_90_days").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:8
                    },
                    success: function(data) {
                        $("#board_composition_non_compliant_more_than_90_days_analysis_text textarea").text(data.analysis_text);
                        $("#board_composition_non_compliant_more_than_90_days_analysis_text").removeClass('hidden');
                        $("#board_composition_non_compliant_more_than_90_days_dependent_block_1").removeClass('hidden');
                    }
                });
            }
            else {
                $("#board_composition_non_compliant_more_than_90_days_analysis_text textarea").text("");
                $("#board_composition_non_compliant_more_than_90_days_analysis_text").addClass('hidden');
                $("#board_composition_non_compliant_more_than_90_days_dependent_block_1").addClass('hidden');
            }
        });
        $("#are_the_accounts_qualified").change(function() {
            var val=$("#are_the_accounts_qualified").find('option:selected').val();
            if(val=="no" || val=="") {
                $("#are_the_accounts_qualified_dependent_block_1").addClass('hidden');
            }
            else {
                $("#are_the_accounts_qualified_dependent_block_1").removeClass('hidden');
            }
        });
        $("#have_the_qualifications_been_discussed").change(function(){
            var quali = $("#have_the_qualifications_been_discussed").find('option:selected').val();
            if(quali=="no") {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:9
                    },
                    success: function(data) {
                        $("#have_the_qualifications_been_discussed_analysis_text textarea").text(data.analysis_text);
                        $("#have_the_qualifications_been_discussed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_the_qualifications_been_discussed_analysis_text textarea").text();
                $("#have_the_qualifications_been_discussed_analysis_text").addClass('hidden');
            }
        });
        $("#non_audit_fee_auditors_been_consistently_more_than_50_for_last_3_years").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:10
                    },
                    success: function(data) {
                        $("#non_audit_fee_auditors_been_consistently_more_than_50_for_last_3_years_analysis_text textarea").text(data.analysis_text);
                        $("#non_audit_fee_auditors_been_consistently_more_than_50_for_last_3_years_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#board_composition_non_compliant_more_than_90_days_analysis_text textarea").text("");
                $("#non_audit_fee_auditors_been_consistently_more_than_50_for_last_3_years_analysis_text").addClass('hidden');
            }
        });
        $("#tenure_of_auditors_of_the_company_exceeded_10_years").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:11
                    },
                    success: function(data) {
                        $("#tenure_of_auditors_of_the_company_exceeded_10_years_analysis_text textarea").text(data.analysis_text);
                        $("#tenure_of_auditors_of_the_company_exceeded_10_years_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#board_composition_non_compliant_more_than_90_days_analysis_text textarea").text("");
                $("#tenure_of_auditors_of_the_company_exceeded_10_years_analysis_text").addClass('hidden');
            }
        });
        $("#material_weakness_in_internal_controls_of_the_company_observed").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:12
                    },
                    success: function(data) {
                        $("#material_weakness_in_internal_controls_of_the_company_observed_analysis_text textarea").text(data.analysis_text);
                        $("#material_weakness_in_internal_controls_of_the_company_observed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#material_weakness_in_internal_controls_of_the_company_observed_analysis_text textarea").text("");
                $("#material_weakness_in_internal_controls_of_the_company_observed_analysis_text").addClass('hidden');
            }
        });
        $("#material_restatement_of_financial_statements_due_to_material_irregularities").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:13
                    },
                    success: function(data) {
                        $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text textarea").text(data.analysis_text);
                        $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text .standard_text_hidden").val(data.analysis_text);
                        $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text").removeClass('hidden');
                        $("#material_restatement_of_financial_statements_due_to_material_irregularities_dependent_block_1").removeClass('hidden');
                    }
                });
            }
            else {
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text textarea").text("");
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text .standard_text_hidden").val("");
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text").addClass('hidden');
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_dependent_block_1").addClass('hidden');
            }
        });
        $("#material_restatement_of_financial_statements_due_to_material_irregularities_dependent_block_1 .financial_period_for_restated_period").keyup(function() {
            var str = $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text .standard_text_hidden").val();
            if($(this).val()!="") {
                var res = str.replace("[date]", $(this).val());
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text textarea").text(res);
            }
            else {
                $("#material_restatement_of_financial_statements_due_to_material_irregularities_analysis_text textarea").text(str);
            }
        });
        $("#late_filling_of_financial_statements").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:14
                    },
                    success: function(data) {
                        $("#late_filling_of_financial_statements_analysis_text textarea").text(data.analysis_text);
                        $("#late_filling_of_financial_statements_analysis_text .standard_text_hidden").val(data.analysis_text);
                        $("#late_filling_of_financial_statements_analysis_text").removeClass('hidden');
                        $("#late_filling_of_financial_statements_dependent_block_1").removeClass('hidden');
                    }
                });
            }
            else {
                $("#late_filling_of_financial_statements_analysis_text textarea").text("");
                $("#late_filling_of_financial_statements_analysis_text .standard_text_hidden").val("");
                $("#late_filling_of_financial_statements_analysis_text").addClass('hidden');
                $("#late_filling_of_financial_statements_dependent_block_1").addClass('hidden');
            }
        });
        $("#late_filling_of_financial_statements_dependent_block_1 .quarter , #late_filling_of_financial_statements_dependent_block_1 .filling_date").keyup(function() {
            var str = $("#late_filling_of_financial_statements_analysis_text .standard_text_hidden").val();
            if($("#late_filling_of_financial_statements_dependent_block_1 .quarter").val()!="" && $("#late_filling_of_financial_statements_dependent_block_1 .filling_date").val()!="") {
                var res = str.replace("[quarter]/[year]", $("#late_filling_of_financial_statements_dependent_block_1 .quarter").val());
                res = res.replace("[date]", $("#late_filling_of_financial_statements_dependent_block_1 .filling_date").val());
                $("#late_filling_of_financial_statements_analysis_text textarea").text(res);
            }
            else if($("#late_filling_of_financial_statements_dependent_block_1 .quarter").val()!="") {
                var res = str.replace("[quarter]/[year]", $("#late_filling_of_financial_statements_dependent_block_1 .quarter").val());
                $("#late_filling_of_financial_statements_analysis_text textarea").text(res);
            }
            else if($("#late_filling_of_financial_statements_dependent_block_1 .filling_date").val()!="") {
                var res = str.replace("[date]", $("#late_filling_of_financial_statements_dependent_block_1 .filling_date").val());
                $("#late_filling_of_financial_statements_analysis_text textarea").text(res);
            }
            else {
                $("#late_filling_of_financial_statements_analysis_text textarea").text(str);
            }
        });
        $("#material_accounting_fraud_occur_at_the_company").change(function() {
            if($(this).val()=='yes') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:15
                    },
                    success: function(data) {
                        $("#material_accounting_fraud_occur_at_the_company_analysis_text textarea").text(data.analysis_text);
                        $("#material_accounting_fraud_occur_at_the_company_analysis_text .standard_text_hidden").val(data.analysis_text);
                        $("#material_accounting_fraud_occur_at_the_company_analysis_text").removeClass('hidden');
                        $("#material_accounting_fraud_occur_at_the_company_dependent_block_1").removeClass('hidden');
                    }
                });
            }
            else {
                $("#material_accounting_fraud_occur_at_the_company_analysis_text textarea").text("");
                $("#material_accounting_fraud_occur_at_the_company_analysis_text .standard_text_hidden").val("");
                $("#material_accounting_fraud_occur_at_the_company_analysis_text").addClass('hidden');
                $("#material_accounting_fraud_occur_at_the_company_dependent_block_1").addClass('hidden');
            }
        });
        $("#material_accounting_fraud_occur_at_the_company_dependent_block_1 .details").keyup(function() {
            var str = $("#material_accounting_fraud_occur_at_the_company_analysis_text .standard_text_hidden").val();
            if($(this).val()!="") {
                var res = str.replace("[accounting fraud]", $(this).val());
                $("#material_accounting_fraud_occur_at_the_company_analysis_text textarea").text(res);
            }
            else {
                $("#material_accounting_fraud_occur_at_the_company_analysis_text textarea").text(str);
            }
        });
        $("#did_nomination_remuneration_committee_meet_last_year").change(function() {
            if ($(this).val() == 'no') {
                $("#did_nomination_remuneration_committee_meet_last_year_dependent_block_1").removeClass('hidden');
            }
            else {
                $("#did_nomination_remuneration_committee_meet_last_year_dependent_block_1").addClass('hidden');
            }
        });
        $("#did_nomination_remuneration_committee_meet_last_year_dependent_block_1 .issue").change(function() {
            if($(this).val()=='nomination') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:16
                    },
                    success: function(data) {
                        $("#did_nomination_remuneration_committee_meet_last_year_analysis_text textarea").text(data.analysis_text);
                        $("#did_nomination_remuneration_committee_meet_last_year_analysis_text").removeClass('hidden');
                    }
                });
            }
            else if($(this).val()=='remuneration') {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:17
                    },
                    success: function(data) {
                        $("#did_nomination_remuneration_committee_meet_last_year_analysis_text textarea").text(data.analysis_text);
                        $("#did_nomination_remuneration_committee_meet_last_year_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#did_nomination_remuneration_committee_meet_last_year_analysis_text textarea").text("");
                $("#did_nomination_remuneration_committee_meet_last_year_analysis_text").addClass('hidden');
            }
        });
    },
    initializePage9: function() {
        $("#page_9_que_1").change(function() {
            if($(this).val()=='Yes') {
                $("#page_9_ques_1_hidden").removeClass('hidden');
            }
            else {
                $("#page_9_ques_1_hidden").addClass('hidden');
            }
        });
        $("#page_9_que_2").change(function() {
            if($(this).val()=='Yes') {
                $("#page_9_ques_2_hidden").removeClass('hidden');
            }
            else {
                $("#page_9_ques_2_hidden").addClass('hidden');
            }
        });
        $("#page_9_que_3").change(function() {
            if($(this).val()=='Yes') {
                $("#page_9_ques_3_hidden").removeClass('hidden');
            }
            else {
                $("#page_9_ques_3_hidden").addClass('hidden');
            }
        });
    },
    initializePage1: function(flag,info) {
        if(flag) {
            swal({
                title: info[1]
            },
                function() {
                    window.location = "ses-recommendations.php";
                }
            );
        }
        $('.timepicker-no-seconds').timepicker({
            autoclose: true,
            minuteStep: 5
        });

        $("#page_1_meeting_type").change(function() {
            if($(this).val()=='PB') {
                $("#meeting_date").addClass('hidden');
                $("#meeting_venue").addClass('hidden');
                $("#voting_deadline").removeClass('hidden');
            }
            else {
                $("#meeting_date").removeClass('hidden');
                $("#meeting_venue").removeClass('hidden');
                $("#voting_deadline").addClass('hidden');
            }
        });
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-M-yyyy'
        });
        $("#e_voting_platform").change(function () {
            var e_voting_platform = $(this).val();
            if(e_voting_platform=="NSDL") {
                $("#e_voting_platform_website_link").val("https://www.evoting.nsdl.com/");
            }
            else if(e_voting_platform=="CDSL") {
                $("#e_voting_platform_website_link").val("https://www.evotingindia.com/");
            }
            else if(e_voting_platform=="Karvy") {
                $("#e_voting_platform_website_link").val("https://evoting.karvy.com/");
            }
            else {
                $("#e_voting_platform_website_link").val("");
            }

        });
        $("#company_name_keywords").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#company_name_keywords").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#company_name_keywords").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        get_all_company_details:true,
                        company_id:$("#companies_id").val()
                    },
                    success: function(data) {
                        $("#nse_code").val(data.nse_code);
                        $("#company_bse_code").val(data.bse_code);
                        $("#nse_code").val(data.nse_code);
                        $("#isin").val(data.isin);
                        $("#sector").val(data.sector);
                        $("#email").val(data.email);
                        $("#website").val(data.website);
                        $("#fax").val(data.fax);
                        $("#contact").val(data.contact);
                        $("#address").val(data.address);
                        $("#report_year").focus();
                    }
                });
            });
        }

        var company_id=$('#report_data_exists').val();
        if(company_id !=""){
            $('#companies_id').val(company_id);
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_all_company_details:true,
                    company_id:$("#companies_id").val()
                },
                success: function(data) {
                    console.log(data);
                    $("#company_name_keywords").val(data.name);
                    $("#nse_code").val(data.nse_code);
                    $("#company_bse_code").val(data.bse_code);
                    $("#nse_code").val(data.nse_code);
                    $("#isin").val(data.isin);
                    $("#sector").val(data.sector);
                    $("#email").val(data.email);
                    $("#website").val(data.website);
                    $("#fax").val(data.fax);
                    $("#contact").val(data.contact);
                    $("#address").val(data.address);
                    $("#report_year").focus();
                }
            });
        }

    },
    initializePage2: function(flag,info) {
        if(flag) {
            swal({
                    title: info[0]
                },
                function() {
                    window.location = "company-background.php";
                }
            );
        }
        $("#btn_add_recommendations").click(function() {
            var $template = $(".recommendations-template").clone();
            $template.removeClass('recommendations-template').removeClass('hidden');
            $template.find('button').removeClass('hidden');
            $("#recommendations-template-container").append($template);
            $( "#recommendations-template-container tr" ).each(function( index ) {
                if(index!=0) {
                    $( this ).find('td').eq(0).html(index);
                }
            });
            initializeRecommendationsRow();
        });

        function initializeRecommendationsRow() {
            $(".btn-remove-recommendations").click(function() {
                $(this).parent().parent().remove();
                $( "#recommendations-template-container tr" ).each(function( index ) {
                    if(index!=0) {
                        $( this ).find('td').eq(0).html(index);
                    }
                });
            });
        }
    },
    initializePage3: function(flag) {
        if(flag) {
            swal({
                    title: "Company background data has been saved successfully"
                },
                function () {
                    window.location = "board-of-directors.php";
                }
            );
        }

        function calShareholdingPatters (data_col_id) {
            var promoter = $("#promoter_"+data_col_id);
            var fii = $("#fii_"+data_col_id);
            var dii = $("#dii_"+data_col_id);
            if(promoter.val()!="" && fii.val()!="" && dii.val()!="") {
                $("#others_"+data_col_id).val((100 - (parseFloat(promoter.val())+parseFloat(fii.val())+parseFloat(dii.val()))).toFixed(2));
            }
        }

        function initializeKeyUp() {
            $(".promoter,.fii,.dii").keyup(function() {
                calShareholdingPatters($(this).attr('data-col-id'));
            });
        }


        $("#market_data_price").keyup( function () {
            var price = $(this).val();
            var eps = $("#market_data_eps").val();
            if(price!="" && eps!="") {
                $("#market_data_pe_ratio").val((parseFloat(price)/eps).toFixed(2));
            }
        }) ;

        $("#btn_populate_share_holders").click(function() {
            var button = $(this);
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    page3bsedata:true,
                    company_bse_code:$("#company_bse_code").val(),
                    month:$("#month_bse_fething").val(),
                    year:$("#year_bse_fething").val()
                },
                beforeSend: function() {
                    button.html("Processing...");
                },
                success: function(data) {
                    button.html("Get Data");
                    $("#top_public_shareholders").html(data.top_public_shareholders);
                    $("#major_promoters").html(data.major_promoters);
                    $("#share_holding_patters").html(data.share_holding_patters);
                    initializeKeyUp();
                },
                error: function (data) {
                    button.html("Get Data");
                }
            });
        });

        var financial_years = [];
        $(".financial_years").each(function(i,data){
            var self = $(this);
            if($(this).val()!="") {
                financial_years.push({"year":self.val()});
            }
        });
        if(financial_years.length>0) {
            var final_years = JSON.stringify(financial_years);
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType:"JSON",
                data:{
                    marketDataEPSAndDividend:1,
                    financial_years : final_years
                },
                success:function(data) {
                    console.log(data);
                    var dividend=data.dividend;
                    $('#market_data_eps').val(data.eps);
                    $(".dividend-per-share").each(function(i,d) {
                        $(this).val(dividend[i]);
                        $(this).trigger('keyup');
                    });
                },
                error: function(data) {

                }
            });

        }

        $(".dividend-per-share").keyup(function() {
            var no = $(this).attr('data-dividend-no');
            if($(".eps-"+no).val() !="" && $(this).val() !="") {
                var value = ($(this).val()/$(".eps-"+no).val())*1.1623;
                value = parseFloat(value)*100;
                value = value.toFixed(2);
                $(".dividend-pay-"+no).val(value);
            }
            if($(this).val() =="") {
                $(".dividend-pay-"+no).val("");
            }
        });
    },
    initializePage11: function() {
        $("#page_11_ques_1").change(function() {
            if($(this).val()=='Yes') {
                $("#page_11_ques_1_hidden").removeClass('hidden');
            }
            else {
                $("#page_11_ques_1_hidden").addClass('hidden');
            }
        });
        $("#page_11_ques_5").change(function() {
            if($(this).val()=='Yes') {
                $("#page_11_ques_5_hidden").removeClass('hidden');
            }
            else {
                $("#page_11_ques_5_hidden").addClass('hidden');
            }
        });
    },
    initializePage12: function() {
        $("#page_12_ques_3").change(function() {
            if($(this).val()=='Yes') {
                $("#page_12_ques_3_hidden").removeClass('hidden');
            }
            else {
                $("#page_12_ques_3_hidden").addClass('hidden');
            }
        });

        $(".check-trigger").change(function() {
            var $block = $("#"+$(this).attr('id')+"_hidden");
            if($(this).is(':checked')) {
                $block.removeClass('hidden');
            }
            else {
                $block.addClass('hidden');
            }
        });
    },
    initializePage10: function() {
        $("#page_10_ques_4").change(function() {
            if($(this).val()=='Yes') {
                $("#page_10_ques_4_hidden").removeClass('hidden');
            }
            else {
                $("#page_10_ques_4_hidden").addClass('hidden');
            }
        });
        $("#page_10_ques_9").change(function() {
            if($(this).val()=='Yes') {
                $("#page_10_ques_9_hidden").removeClass('hidden');
            }
            else {
                $("#page_10_ques_9_hidden").addClass('hidden');
            }
        });
        $("#page_10_ques_14").change(function() {
            if($(this).val()=='Yes') {
                $("#page_10_ques_14_hidden").removeClass('hidden');
            }
            else {
                $("#page_10_ques_14_hidden").addClass('hidden');
            }
        });
    },
    page4InitializeCalls: function() {
        var count_addbtn=1;
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-M-yyyy'
        }).on('changeDate', function(ev){
            $.get('jquery-data.php',{get_late_fillings:1,f_d:$("#filling_date").val(),quat:$("#quater").val()},function(data,status){
                $("#late_fillings").html(data);
                adding_recommendation();
            });
            $.get('jquery-data.php',{get_repriced:1, price_date:$("#repricing_date").val()},function(data,status){
                $("#repriced_block").html(data);
                adding_recommendation();
            });
        });
        $('#name_of_director').change(function(){
            var dname=$("#name_of_director").find('option:selected').val();
            var tval=$("#name_of_director").find('option:selected').attr('tenuure_value');
            $("#tenure_time").val(tval);
            if(tval > 10) {
                tenure_extended();
                adding_recommendation();
            }
            else {
                $("#tenure_analysis").addClass('hidden');
                adding_recommendation();
            }
        });

        var count_btn_id=1;
        $("#addbtn").click(function() {
            $('#fulltimediv').append("<div class='form-group'  ><label class='col-md-2 control-label'>Enter Designation</label><div class='col-md-3'><input type='text' value='' class='form-control' placeholder='Enter text'></div><label class='col-md-2 control-label'>Enter name of the Company</label><div class='col-md-3'><input type='text' value='' class='form-control' placeholder='Enter text'></div><button type='button' class='btn remove' id='delete-"+count_btn_id+"' >Delete</button></div>");
            count_addbtn++;
            count_btn_id++;
            if(count_addbtn > 1)
            {
                $.get("jquery-data.php",{get_fulltime_textarea:1,total_position:count_addbtn,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").find('option:selected').val(),des:$("#desg").val(),comp:$("#noc").val()},function(data,status){
                    $("#analysis_fulltime").html(data);
                });
            }
            adding_recommendation();
        });

        $("#fulltimediv").on("click",".remove", function(e){
            e.preventDefault(); $(this).parent('div').remove();
            count_addbtn--;
            if(count_addbtn > 1) {
                $.get("jquery-data.php",{get_fulltime_textarea:1,total_position:count_addbtn,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val(),des:$("#desg").val(),comp:$("#noc").val()},function(data,status){
                    $("#analysis_fulltime").html(data);
                });
            }
            else {
                $("#analysis_fulltime").empty();
            }
            adding_recommendation();
        });

        function adding_recommendation() {
            $.get("jquery-data.php",{get_fulltime_recommendation:1,total_position:count_addbtn,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val(),des:$("#desg").val(),comp:$("#noc").val(),compe:$("#cc").val(),compe_val:$("#competitor").find('option:selected').val(),s_val:$("#stock").find('option:selected').val(),ncs:$("#non_compliant_since").val(),donc:$("#details_of_ques1").val(),a_val:$("#audit").find('option:selected').val(),e_val:$("#employee").find('option:selected').val(),e_comp:$("#emp_company").val(),e_desc:$("#emp_desc").val(),pr_val:$("#promoter").find('option:selected').val(),no_val:$("#nominee").find('option:selected').val(),no_comp:$("#nom_company").val(),pe_val:$("#pecuniary").find('option:selected').val(),ex_val:$("#executive").find('option:selected').val(),mat_val:$("#material").find('option:selected').val(),mat_de:$("#mat_desc").val(),ten_t:$("#tenure_time").val(),ten_app:$("#term_of_app").val(),mon:$("#how_many").val(),were_val:$("#were").find('option:selected').val(),acc_quali:$("#auditcomittee").find('option:selected').val(),quali:$("#qualification").find('option:selected').val(),m_weak:$("#materialweakness").find('option:selected').val(),restate:$("#restatement").find('option:selected').val(),f_p:$("#financial_period").val(),f_d:$("#filling_date").val(),quat:$("#quater").val(),late:$("#latefilling").find('option:selected').val(),fraud:$("#detail_fraud").val(),acc_fraud:$("#accounting").find('option:selected').val(),reapp:$("#reappointed").find('option:selected').val(),poor_attend:$("#poorattend").find('option:selected').val(),director:$("#director_attend").find('option:selected').val(),skew_val:$("#skewed").find('option:selected').val(),sk_f:$("#skewed_favour").find('option:selected').val(),sk_c:$("#skewed_comparsion").find('option:selected').val(),reprice:$("#repriced").find('option:selected').val(),price_date:$("#repricing_date").val()},function(data,status){
                $("#add_recommendation").html(data);
            });
        }
        $("#adddirectorship").click(function() {
            $('#directorship').append("<div class='form-group' ><label class='col-md-3 control-label'>Enter name of company</label><div class='col-md-3'><input type='text' value='' class='form-control' placeholder='Enter text'></div><label class='col-md-3 control-label'>Association with company</label><div class='col-md-3'><input type='text' value='' class='form-control' placeholder=''></div></div >");
        });
        $("#employee").change(function() {
            var val=$("#employee").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc1").removeClass('hidden');
                adding_recommendation();
            }
            else
            {
                $("#desc1").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#emp_company").keyup(function(){
            adding_recommendation();
        });
        $("#promoter").change(function() {
            var val=$("#promoter").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc2").removeClass('hidden');
                adding_recommendation();
            }
            else
            {
                $("#desc2").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#solicitor").change(function() {
            var val=$("#solicitor").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc3").removeClass('hidden');
            }
            else
            {
                $("#desc3").addClass('hidden');
            }
        });
        $("#nominee").change(function() {
            var val=$("#nominee").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc4").removeClass('hidden');
                adding_recommendation();
            }
            else
            {
                $("#desc4").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#nom_company").keyup(function(){
            adding_recommendation();
        });
        $("#pecuniary").change(function() {
            var val=$("#pecuniary").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc5").removeClass('hidden');
                adding_recommendation();
            }
            else
            {
                $("#desc5").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#executive").change(function() {
            var val=$("#executive").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc6").removeClass('hidden');
                adding_recommendation();
            }
            else
            {
                $("#desc6").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#competitor").change(function() {
            var val=$("#competitor").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc7").removeClass('hidden');
                $("#director_competitor").removeClass('hidden');
                $.get("jquery-data.php",{get_competitor:1,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val(),compe:"[Enter Company]"},function(data,status){
                    $("#director_competitor").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#desc7").addClass('hidden');
                $("#director_competitor").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#cc").keyup(function(){
            $.get("jquery-data.php",{get_competitor:1,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val(),compe:$("#cc").val()},function(data,status){
                $("#director_competitor").html(data);
            });
            adding_recommendation();
        });
        $("#material").change(function() {
            var val=$("#material").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc8").removeClass('hidden');
                $("#material_failure").removeClass('hidden');
                $.get("jquery-data.php",{get_material_failure:1,mb:$("#mat_brief").val(),md:$("#mat_desc").val()},function(data,status){
                    $("#material_failure").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#desc8").addClass('hidden');
                $("#material_failure").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#mat_brief").keyup(function(){
            $.get("jquery-data.php",{get_material_failure:1,mb:$("#mat_brief").val(),md:$("#mat_desc").val()},function(data,status){
                $("#material_failure").html(data);
            });
        });
        $("#mat_desc").keyup(function(){
            $.get("jquery-data.php",{get_material_failure:1,mb:$("#mat_brief").val(),md:$("#mat_desc").val()},function(data,status){
                $("#material_failure").html(data);
                adding_recommendation();
            });
        });
        $("#stock").change(function() {
            var val=$("#stock").find('option:selected').val();
            if(val=="No")
            {
                $("#desc9").removeClass('hidden');
                $("#stock_options").addClass('hidden');
                adding_recommendation();
            }
            else if(val=="Yes")
            {
                $("#desc9").addClass('hidden');
                $("#stock_options").removeClass('hidden');
                $.get("jquery-data.php",{get_stock:1,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val()},function(data,status){
                    $("#stock_options").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#desc9").addClass('hidden');
                $("#stock_options").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#no_of_directorship").keyup(function(){
            var ed_val=$("#ed_listed").find('option:selected').val();
            var no_of_dir=$("#no_of_directorship").val();
            if((ed_val=="Yes" && no_of_dir > 3) || (ed_val=="No" && no_of_dir > 7))
            {
                $("#time_commitment").removeClass('hidden');
                $.get("jquery-data.php",{get_time_commit:1,sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val(),nofd:$("#no_of_directorship").val()},function(data,status){
                    $("#time_commitment").html(data);
                });
            }
            else
                $("#time_commitment").addClass('hidden');
        });
        $("#term_of_app").keyup(function(){
            var t_time=parseInt($("#tenure_time").val());
            var term_time=parseInt($("#term_of_app").val());
            var total = t_time + term_time;
            alert(total);
            if(total > 10 || t_time > 10)
            {
                $("#tenure_analysis").removeClass('hidden');
                tenure_extended();
                adding_recommendation();
            }
            else
            {
                $("#tenure_analysis").addClass('hidden');
                adding_recommendation();
            }
        });
        function tenure_extended() {
            $.get("jquery-data.php",{get_tenure:1,tt:$("#tenure_time").val(),sal:$("#salutation").find('option:selected').val(),nod:$("#name_of_director").val()},function(data,status){
                $("#tenure_analysis").html(data);
            });
        }
        $("#audit").change(function() {
            var val=$("#audit").find('option:selected').val();
            if(val=="No")
            {
                $("#desc10").removeClass('hidden');
                $("#question1_board").removeClass('hidden');
                $.get("jquery-data.php",{get_question_one:1,ncs:"[Enter Date]",donc:"[Enter Details]"},function(data,status){
                    //alert("heelo");
                    $("#question1_board").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#desc10").addClass('hidden');
                $("#question1_board").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#non_compliant_since").keyup(function(){
            $.get("jquery-data.php",{get_question_one:1,ncs:$("#non_compliant_since").val(),donc:$("#details_of_ques1").val()},function(data,status){
                $("#question1_board").html(data);
            });
            adding_recommendation();
        });
        $("#details_of_ques1").keyup(function(){
            $.get("jquery-data.php",{get_question_one:1,ncs:$("#non_compliant_since").val(),donc:$("#details_of_ques1").val()},function(data,status){
                $("#question1_board").html(data);
            });
            adding_recommendation();
        });
        $("#how_many").keyup(function(){
            var month = $("#how_many").val();
            if(month > 6)
            {
                $("#question2_board").removeClass('hidden');
                $.get("jquery-data.php",{get_question_two:1,mon:$("#how_many").val()},function(data,status){
                    $("#question2_board").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#question2_board").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#were").change(function() {
            var val=$("#were").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc12").removeClass('hidden');
                $("#question3_board").removeClass('hidden');
                $.get("jquery-data.php",{get_question_three:1,detail:$("#details").val()},function(data,status){
                    $("#question3_board").html(data);
                });
                adding_recommendation();
            }
            else
            {
                $("#desc12").addClass('hidden');
                $("#question3_board").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#details").keyup(function(){
            $.get("jquery-data.php",{get_question_three:1,detail:$("#details").val()},function(data,status){
                $("#question3_board").html(data);
            });
        });
        $("#material_detail").keyup(function(){
            $.get('jquery-data.php',{get_material_weakness:1,mdetail:$("#material_detail").val()},function(data,status){
                $("#material_weakness_block").html(data);
            });
        });
        $("#reappointed").change(function(){
            var val=$("#reappointed").find('option:selected').val();
            if(val=="Yes")
            {
                $("#director_reappointed").removeClass('hidden');
                $.get('jquery-data.php',{get_reappointment:1},function(data,status){
                    $("#director_reappointed").html(data);
                    adding_recommendation();
                });
            }
            else
            {
                $("#director_reappointed").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#poorattend").change(function() {
            var val=$("#poorattend").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc18").removeClass('hidden');
                $.get('jquery-data.php',{get_attendence:1, director:$("#director_attend").find('option:selected').val()},function(data,status){
                    $("#poor_attendence").html(data);
                    adding_recommendation();
                });
            }
            else
            {
                $("#desc18").addClass('hidden');
            }
        });
        $("#director_attend").change(function(){
            $.get('jquery-data.php',{get_attendence:1, director:$("#director_attend").find('option:selected').val()},function(data,status){
                $("#poor_attendence").html(data);
                adding_recommendation();
            });
        });
        $("#skewed").change(function() {
            var val=$("#skewed").find('option:selected').val();
            if(val=="Yes")
            {
                $("#desc19").removeClass('hidden');
                $("#poor_attendence").removeClass('hidden');
                $.get('jquery-data.php',{get_skewed:1, sk_f:$("#skewed_favour").find('option:selected').val(),sk_c:$("#skewed_comparsion").find('option:selected').val()},function(data,status){
                    $("#skewed_block").html(data);
                    adding_recommendation();
                });
            }
            else
            {
                $("#desc19").addClass('hidden');
                $("#poor_attendence").addClass('hidden');
            }
        });
        $("#skewed_favour").change(function(){
            $.get('jquery-data.php',{get_skewed:1, sk_f:$("#skewed_favour").find('option:selected').val(),sk_c:$("#skewed_comparsion").find('option:selected').val()},function(data,status){
                $("#skewed_block").html(data);
                adding_recommendation();
            });
        });
        $("#skewed_comparsion").change(function(){
            $.get('jquery-data.php',{get_skewed:1, sk_f:$("#skewed_favour").find('option:selected').val(),sk_c:$("#skewed_comparsion").find('option:selected').val()},function(data,status){
                $("#skewed_block").html(data);
                adding_recommendation();
            });
        });
        $("#repriced").change(function(){
            var val=$("#repriced").find('option:selected').val();
            if(val=="Yes")
            {
                $("#repriced_block").removeClass('hidden');
                $.get('jquery-data.php',{get_repriced:1, price_date:$("#repricing_date").val()},function(data,status){
                    $("#repriced_block").html(data);
                    adding_recommendation();
                });
            }
            else
            {
                $("#repriced_block").addClass('hidden');
                adding_recommendation();
            }
        });
        $("#board_chairman").change(function() {
            var val=$("#board_chairman").find('option:selected').val();
            if(val=="Yes")
            {
                $("#board_block").removeClass('hidden');
            }
            else
            {
                $("#board_block").addClass('hidden');
            }
        });
        $("#audit_chairman").change(function() {
            var val=$("#audit_chairman").find('option:selected').val();
            if(val=="Yes")
            {
                $("#audit_block").removeClass('hidden');
            }
            else
            {
                $("#audit_block").addClass('hidden');
            }
        });
        $("#nomination_chairman").change(function() {
            var val=$("#nomination_chairman").find('option:selected').val();
            if(val=="Yes")
            {
                $("#nomination_block").removeClass('hidden');
            }
            else
            {
                $("#nomination_block").addClass('hidden');
            }
        });
        $("#form_question_prompts").validate({
            rules: {
                non_compliant_since:{
                    number:true
                },
                outstanding_stock:{
                    number: true
                },
                number: {

                    number: true
                },
                total_association : {
                    number : true
                },
                no_of_directorship: {
                    number : true
                },
                term_of_app:{
                    number: true
                },
                how_many:{
                    number:true
                }
            },
            messages: {
                number: "Enter numeric value ",
                total_association : "Enter Numbers Only",
                no_of_directorship: "Enter Numbers Only",
                term_of_app: "Enter Numbers Only",
                how_many: "Enter Numbers Only",
                outstanding_stock: "Enter Numbers Only",
                non_compliant_since: "Enter Numbers Only",
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
    },
    page4Actions: function() {
        $("#time_commitments").on('change',function() {
            if($("#time_commitments").val()=='No') {
                $("#time_commitments_hidden").removeClass('hidden');
            }
            else {
                $("#time_commitments_hidden").addClass('hidden');
            }
        });
    },
    initializeAddCompanyJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#cin").blur(function(){
            if($("#cin").val()=="")
                return;
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_details:true,
                    cin:$("#cin").val()
                },
                success: function(data) {
                    console.log(data);
                    if(data.exists) {
                        $.gritter.add({
                            title: "Error",
                            text: "Company Exists",
                            image: "../../assets/img/symbols-critical-icon.png",
                            sticky: false,
                            time: 4000
                        });
                        $("#form_add_company input").val("");
                        $("#cin").focus();
                    }
                }
            });
        });
        $("#peer_1_company_keywords").keyup(function() {
            var $autofill_div = $(this).closest('.auto-fill-container').find('.auto-fill');
            if($(this).val()=="") {
                $autofill_div.html();
                $autofill_div.addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#peer_1_company_keywords").val()
                },
                success: function(data) {
                    $autofill_div.html(data.list);
                    initializePeer1LiClicks();
                    if(data.counts!=0) {
                        $autofill_div.removeClass('hidden');
                    }
                    else {
                        $autofill_div.addClass('hidden');
                    }
                }
            });
        });
        function initializePeer1LiClicks() {
            $(".auto-fill-ul li").click(function() {
                $("#peer_1_company_id").val($(this).attr('data-company-id'));
                var $autofill_div = $("#peer_1_company_keywords").closest('.auto-fill-container').find('.auto-fill');
                $("#peer_1_company_keywords").val($(this).html());
                $autofill_div.html("");
                $autofill_div.addClass('hidden');
            });
        }

        $("#peer_2_company_keywords").keyup(function() {
            var $autofill_div = $(this).closest('.auto-fill-container').find('.auto-fill');
            if($(this).val()=="") {
                $autofill_div.html();
                $autofill_div.addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#peer_2_company_keywords").val()
                },
                success: function(data) {
                    $autofill_div.html(data.list);
                    initializePeer2LiClicks();
                    if(data.counts!=0) {
                        $autofill_div.removeClass('hidden');
                    }
                    else {
                        $autofill_div.addClass('hidden');
                    }
                }
            });
        });

        function initializePeer2LiClicks() {
            $(".auto-fill-ul li").click(function() {
                $("#peer_2_company_id").val($(this).attr('data-company-id'));
                var $autofill_div = $("#peer_2_company_keywords").closest('.auto-fill-container').find('.auto-fill');
                $("#peer_2_company_keywords").val($(this).html());
                $autofill_div.html("");
                $autofill_div.addClass('hidden');
            });
        }
    },
    initializeEditCompany: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                $(".company-details-essentials").addClass('hidden');
                $("#company_details").html("");
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
                $.ajax({
                    url:"../../jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        get_company_details_editable:true,
                        company_id:$("#companies_id").val()
                    },
                    beforeSend: function() {
                        $(".ajax-waiting").removeClass('hidden');
                    },
                    success: function(data) {
                        $(".company-details-essentials").removeClass('hidden');
                        $(".ajax-waiting").addClass('hidden');
                        $("#company_details").html(data.details);
                        initializePeer1KeyupEvent();
                        initializePeer2KeyupEvent();
                    }
                });
            });
        }
        function initializePeer1KeyupEvent() {
            $("#peer_1_company_keywords").keyup(function() {
                var $autofill_div = $(this).closest('.auto-fill-container').find('.auto-fill');
                if($(this).val()=="") {
                    $autofill_div.html();
                    $autofill_div.addClass('hidden');
                    return;
                }
                $.ajax({
                    url:"../../jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        get_company_list_filtered:true,
                        keywords:$("#peer_1_company_keywords").val()
                    },
                    success: function(data) {
                        $autofill_div.html(data.list);
                        initializePeer1LiClicks();
                        if(data.counts!=0) {
                            $autofill_div.removeClass('hidden');
                        }
                        else {
                            $autofill_div.addClass('hidden');
                        }
                    }
                });
            });
        }
        function initializePeer1LiClicks() {
            $(".auto-fill-ul li").click(function() {
                $("#peer_1_company_id").val($(this).attr('data-company-id'));
                var $autofill_div = $("#peer_1_company_keywords").closest('.auto-fill-container').find('.auto-fill');
                $("#peer_1_company_keywords").val($(this).html());
                $autofill_div.html("");
                $autofill_div.addClass('hidden');
            });
        }
        function initializePeer2KeyupEvent() {
            $("#peer_2_company_keywords").keyup(function() {
                var $autofill_div = $(this).closest('.auto-fill-container').find('.auto-fill');
                if($(this).val()=="") {
                    $autofill_div.html();
                    $autofill_div.addClass('hidden');
                    return;
                }
                $.ajax({
                    url:"../../jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        get_company_list_filtered:true,
                        keywords:$("#peer_2_company_keywords").val()
                    },
                    success: function(data) {
                        $autofill_div.html(data.list);
                        initializePeer2LiClicks();
                        if(data.counts!=0) {
                            $autofill_div.removeClass('hidden');
                        }
                        else {
                            $autofill_div.addClass('hidden');
                        }
                    }
                });
            });
        }
        function initializePeer2LiClicks() {
            $(".auto-fill-ul li").click(function() {
                $("#peer_2_company_id").val($(this).attr('data-company-id'));
                var $autofill_div = $("#peer_2_company_keywords").closest('.auto-fill-container').find('.auto-fill');
                $("#peer_2_company_keywords").val($(this).html());
                $autofill_div.html("");
                $autofill_div.addClass('hidden');
            });
        }
    },
    initializeEditDirector: function(messages,flag) {

        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#keywords").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                $(".director-details-essentials").addClass('hidden');
                $("#director_details").html("");
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_director_list_filtered:true,
                    keywords:$("#keywords").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#data_director_id").val($(this).attr('data-director_id'));
                $("#keywords").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
                $.ajax({
                    url:"../../jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        get_director_details:true,
                        director_id:$("#data_director_id").val()
                    },
                    beforeSend: function() {
                        $(".ajax-waiting").removeClass('hidden');
                    },
                    success: function(data) {
                        $(".ajax-waiting").addClass('hidden');
                        $("#salutation").val(data.salutation);
                        $("#din_number").val(data.din_no);
                        $("#dir_name").val(data.dir_name);
                        $("#gender").val(data.gender);
                        $("#dob").val(data.dob);
                        $('.date-picker').datepicker({
                            rtl: App.isRTL(),
                            autoclose: true,
                            format:'dd-mm-yyyy'
                        });
                        $("#expertise").val(data.expertise);
                        $("#education").val(data.education);
                        $("#past_ex").val(data.past_ex);
                        $("#committee_memberships").val(data.committee_memberships);
                        $("#committee_chairmanships").val(data.committee_chairmanships);
                        $("#no_directorship_public").val(data.no_directorship_public);
                        $("#no_directorship_private").val(data.no_directorship_private);
                        $("#no_directorship_listed_companies").val(data.no_directorship_listed_companies);
                        $("#no_total_directorship").val(data.no_total_directorship);
                        $("#no_full_time_positions").val(data.no_full_time_positions);
                    }
                });
            });
        }

        var form1 = $('#edit_director');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                din_number: {
                    required: true,
                    number:true,
                    minlength:8,
                    maxlength:8
                },
                dir_name: {
                    required: true
                }
            },
            messages: {
                din_number: {
                    required: "Please enter DIN",
                    number:"Please enter digits",
                    minlength:"Please enter at least 8 digits",
                    maxlength:"Please enter at max 8 digits"
                },
                dir_name: {
                    required: "Please enter name"
                }
            },
            invalidHandler: function (event, validator) {
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });

    },
    initializeAuditCommitteeAttendanceJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").change(function(){
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_audit_committee_directors:true,
                    bse_code:$("#com_bse_code").val()
                },
                success: function(data) {
                    $("#dir_din_no").html(data.directors);
                }
            });
        });
    },
    initializeNominationCommitteeAttendanceJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").change(function(){
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_nomination_committee_directors:true,
                    bse_code:$("#com_bse_code").val()
                },
                success: function(data) {
                    $("#dir_din_no").html(data.directors);
                }
            });
        });
    },
    initializeRemunerationCommitteeAttendanceJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").change(function(){
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_remuneration_committee_directors:true,
                    bse_code:$("#com_bse_code").val()
                },
                success: function(data) {
                    $("#dir_din_no").html(data.directors);
                }
            });
        });
    },
    initializeDirectorBoardAttendanceJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }

        if($("#att_year").val()!="") {
            fillDirectorList();
        }

        $("#att_year").change(function() {
            fillDirectorList();
        });

        function fillDirectorList () {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_directors:true,
                    financial_year:$("#current_year").val(),
                    company_id:$("#companies_id").val()
                },
                success: function(data) {
                    $("#dir_din_no").html(data.directors);
                }
            });
        }

        $("#dir_din_no").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_director_attendance_values:true,
                    company_id:$("#companies_id").val(),
                    dir_din_no:$("#dir_din_no").val(),
                    att_year:$("#att_year").val()
                },
                success: function(data) {
                    $("#director_attendance_block").html(data.blocks);
                    if(data.attendance_values.count==1) {
                        swal({
                                title:"Current year data exists!",
                                text: "Please go to edit page for making changes."
                            },
                            function(){
                                window.location = document.URL;
                            });
                    }
                }
            });
        });
    },
    initializeEditDirectorAttendanceRemuneration: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#dir_din_no").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_director_attendance_values:true,
                    company_id:$("#companies_id").val(),
                    dir_din_no:$("#dir_din_no").val(),
                    att_year:$("#att_year").val()
                },
                success: function(data) {
                    console.log(data);
                    $("#director_attendance_block").html(data.blocks);
                    $("#agm_attended").val(data.attendance_values.agm_attended);
                    $("#board_meetings_attended").val(data.attendance_values.board_meetings_attended);
                    $("#board_meetings_held").val(data.attendance_values.board_meetings_held);
                    $("#variable_pay").val(data.attendance_values.variable_pay);
                    $("#fixed_pay").val(data.attendance_values.fixed_pay);
                    $("#audit_committee_meetings_attended").val(data.attendance_values.audit_committee_meetings_attended);
                    $("#audit_committee_meetings_held").val(data.attendance_values.audit_committee_meetings_held);
                    $("#comments").val(data.attendance_values.comments);
                    if($("#nom_and_rem_committee_meetings_attended").length) {
                        $("#nom_and_rem_committee_meetings_attended").val(data.attendance_values.nomination_remuneration_committee_meetings_attended);
                        $("#nom_and_rem_committee_meetings_held").val(data.attendance_values.nomination_remuneration_committee_meetings_held);
                    }
                    else {
                        $("#nomination_committee_meetings_attended").val(data.attendance_values.nomination_committee_meetings_attended);
                        $("#nomination_committee_meetings_held").val(data.attendance_values.nomination_committee_meetings_held);
                        $("#remuneration_committee_meetings_attended").val(data.attendance_values.remuneration_committee_meetings_attended);
                        $("#remuneration_committee_meetings_held").val(data.attendance_values.remuneration_committee_meetings_held);
                    }
                    if($("#investors_grievance_meetings_attended").length) {
                        $("#investors_grievance_meetings_attended").val(data.attendance_values.investors_grievance_meetings_attended);
                        $("#investors_grievance_meetings_held").val(data.attendance_values.investors_grievance_meetings_held);
                    }
                    if($("#csr_committee_meetings_attended").length) {
                        $("#csr_committee_meetings_attended").val(data.attendance_values.csr_committee_meetings_attended);
                        $("#csr_committee_meetings_held").val(data.attendance_values.csr_committee_meetings_held);
                    }
                    if($("#risk_management_committee_meetings_attended").length) {
                        $("#risk_management_committee_meetings_attended").val(data.attendance_values.risk_management_committee_meetings_attended);
                        $("#risk_management_committee_meetings_held").val(data.attendance_values.risk_management_committee_meetings_held);
                    }
                }
            });
        });
        $("#att_year").change(function() {
            fillDirectorList();
        });

        if($("#att_year").val()!="") {
            fillDirectorList();
        }

        function fillDirectorList () {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_directors:true,
                    company_id:$("#companies_id").val(),
                    financial_year:$("#current_year").val()
                },
                success: function(data) {
                    if(data.directors=="<option>Select Director</option>") {
                        $("#dir_din_no").html("");
                        $(".select2-chosen").html("Search by Name or DIN");
                        $("#director_attendance_block").html("");
                        $(".flushable").val("");
                    }
                    else {
                        $(".select2-chosen").html("Search by Name or DIN");
                        $("#dir_din_no").html(data.directors);
                        $(".flushable").val("");
                        $("#director_attendance_block").html("");
                    }
                }
            });
        }
    },
    initializeDirectorRemunerationJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#com_bse_code").change(function(){
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_directors:true,
                    bse_code:$("#com_bse_code").val()
                },
                success: function(data) {
                    $("#dir_din_no").html(data.directors);
                }
            });
        });
    },
    initializeDirectorInfoJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-mm-yyyy'
        }).on('changeDate', function(e){
            if($(this).attr('id')=="appointment_date") {
                var year = parseInt($(this).val().substring(6,10));
                var d = new Date();
                var n = parseInt(d.getFullYear());
                $("#current_tenure").val(n-year);
            }
        });
        $("#is_nom_rem_separate").change(function() {
            if($(this).val()=='yes') {
                $(".nom_rem_same").addClass('hidden');
                $(".nom_rem_not_same").removeClass('hidden');
            }
            else {
                $(".nom_rem_same").removeClass('hidden');
                $(".nom_rem_not_same").addClass('hidden');
            }
        });
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
                fillDirectors();
            });
        }

        if($("#companies_id").val()!="") {
            fillDirectors();
        }

        function fillDirectors() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_directors_in_year:true,
                    financial_year:$("#financial_year").val(),
                    company_id:$("#companies_id").val()
                },
                beforeSend: function() {
                    $(".ajax-waiting").removeClass('hidden');
                },
                success: function(data) {
                    console.log(data);
                    $(".ajax-waiting").addClass('hidden');
                    $("#allocated_director_list").html("");
                    for(var i=0;i<data.directors.length;i++) {
                        $("#allocated_director_list").append("<li>"+data.directors[i].dir_name+" ( "+data.directors[i].din_no+" )</li>");
                    }
                    if(data.rem_nom_assigned) {
                        $("#is_nom_rem_separate").attr('disabled','disabled');
                        $("#is_nom_rem_separate_hidden").val(data.are_committees_seperate);
                        $("#is_nom_rem_separate").val(data.are_committees_seperate);
                        $("#is_nom_rem_separate").change();
                        $.gritter.add({
                            title: "Info",
                            text: "Nomination and Remuneration Committee same info is already assigned plz don't modify that",
                            sticky: false,
                            time: 4000
                        });
                    }
                }
            });
        }

        $("#dir_din_no").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_director_info_json:true,
                    financial_year:$("#financial_year").val(),
                    company_id:$("#companies_id").val(),
                    dir_din_no:$("#dir_din_no").val()
                },
                beforeSend: function() {
                    $(".ajax-waiting").removeClass('hidden');
                },
                success: function(data) {
                    $(".ajax-waiting").addClass('hidden');
                    if(data.count>0) {
                        swal({
                            title: "Last year data exists !",
                            text: "Do you want to auto fill that data?",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, fill it!",
                            closeOnConfirm: false
                        }, function() {
                            $("#appointment_date").addClass('auto-fill-highlight').val(data.director_info.appointment_date);
                            $("#resignation_date").addClass('auto-fill-highlight').val(data.director_info.resignation_date);
                            $("#current_tenure").addClass('auto-fill-highlight').val(data.director_info.current_tenure);
                            $("#total_association").addClass('auto-fill-highlight').val(data.director_info.total_association);
                            $("#company_classification").addClass('auto-fill-highlight').val(data.director_info.company_classification);
                            $("#ses_classification").addClass('auto-fill-highlight').val(data.director_info.ses_classification);
                            $("#additional_classification").addClass('auto-fill-highlight').val(data.director_info.additional_classification);
                            $("#audit_committee").addClass('auto-fill-highlight').val(data.director_info.audit_committee);
                            $("#investor_grievance").addClass('auto-fill-highlight').val(data.director_info.investor_grievance);
                            $("#csr").addClass('auto-fill-highlight').val(data.director_info.csr);
                            $("#risk_management_committee").addClass('auto-fill-highlight').val(data.director_info.risk_management_committee);
                            $("#shares_held").addClass('auto-fill-highlight').val(data.director_info.shares_held);
                            $("#esops").addClass('auto-fill-highlight').val(data.director_info.esops);
                            $("#other_pecuniary_relationship").addClass('auto-fill-highlight').val(data.director_info.other_pecuniary_relationship);
                            $("#retiring_non_retiring").addClass('auto-fill-highlight').val(data.director_info.retiring_non_retiring);
                            $('.date-picker').datepicker({
                                rtl: App.isRTL(),
                                autoclose: true,
                                format:'dd-mm-yyyy'
                            });
                            swal.close();
                            autoFillHighlight();
                            $("#btn_director_info").attr('disabled','disabled');
                        });
                    }
                    else {
                        $(".flushable").val("");
                    }
                }
            });
        });
        function autoFillHighlight () {
            $(".auto-fill-highlight").keyup(function(e) {
                if(e.which==8) {
                    $(this).removeClass("auto-fill-highlight");
                }
                var flag = true;
                $.each($(".form-control"),function() {
                    var control = $(this);
                    if(control.hasClass("auto-fill-highlight")) {
                        flag = false;
                    }
                });
                if(flag) {
                    $("#btn_director_info").removeAttr('disabled');
                }
            });
            $(".auto-fill-highlight").change(function() {
                $(this).removeClass("auto-fill-highlight");
                var flag = true;
                $.each($(".form-control"),function() {
                    var control = $(this);
                    if(control.hasClass("auto-fill-highlight")) {
                        flag = false;
                    }
                });
                if(flag) {
                    $("#btn_director_info").removeAttr('disabled');
                }
            });
        }
    },
    initializeDivindendInfoJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#company_keywords").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#company_keywords").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#company_id").val($(this).attr('data-company-id'));
                $("#company_keywords").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#financial_year").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_dividend_info_last_year:true,
                    company_id:$("#company_id").val(),
                    financial_year:$("#financial_year").val()
                },
                success: function(data) {
                    console.log(data);
                    if(data.this_year_count==1) {
                        swal({
                                title:"Current year data exists!",
                                text: "Please go to edit page for making changes."
                            },
                            function(){
                                window.location = document.URL;
                            });
                    }
                    if(data.count==1) {
                        $("#market_price_start").val(data.market_price_end);
                        $("#market_price_end").focus();
                    }
                    else {
                        $("#market_price_start").focus();
                    }

                    if(data.dividend_info_next_year.count==1) {
                        $("#market_price_end").val(data.dividend_info_next_year.market_price_start);
                    }
                    else {
                        $("#market_price_end").val("");
                    }
                }
            });
        });
    },
    initializeEditDivindendInfoJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#company_keywords").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#company_keywords").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#company_id").val($(this).attr('data-company-id'));
                $("#company_keywords").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#financial_year").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_dividend_info:true,
                    company_id:$("#company_id").val(),
                    financial_year:$("#financial_year").val()
                },
                success: function(data) {
                    if(data.count==1) {
                        $("#market_price_start").val(data.market_price_start);
                        $("#market_price_end").val(data.market_price_end);
                        $("#dividend").val(data.dividend);
                        $("#eps").val(data.eps);
                    }
                    else {
                        $(".flushable").val("");
                    }
                }
            });
        });
    },
    initializeDirectorInfoEdit: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#is_nom_rem_separate").change(function(){
            if($(this).val()=='yes') {
                $(".nom_rem_same").addClass('hidden');
                $(".nom_rem_not_same").removeClass('hidden');
            }
            else {
                $(".nom_rem_same").removeClass('hidden');
                $(".nom_rem_not_same").addClass('hidden');
            }
        });
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $("#auto-fill-companies").html();
                $("#auto-fill-companies").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $("#auto-fill-companies").html(data.list);
                    if(data.counts!=0) {
                        $("#auto-fill-companies").removeClass('hidden');
                    }
                    else {
                        $("#auto-fill-companies").addClass('hidden');
                    }
                    initializeCompanyLiClicks();
                }
            });
        });
        function initializeCompanyLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $("#auto-fill-companies").html("");
                $("#auto-fill-companies").addClass('hidden');
            });
        }
        $("#dir_din_no").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_director_info_json:true,
                    edit:true,
                    company_id:$("#companies_id").val(),
                    dir_din_no:$("#dir_din_no").val(),
                    financial_year:$("#financial_year").val()
                },
                beforeSend: function() {
                    $(".ajax-waiting").removeClass('hidden');
                },
                success: function(data) {
                    console.log(data);
                    if($("#dir_din_no").prop('selectedIndex')==1) {
                        $("#is_nom_rem_separate").removeAttr('disabled');
                        $("#remuneration").css('background-color',"#F00");
                        $("#nomination").css('background-color',"#F00");
                        $("#nom_rem_committee").css('background-color',"#F00");
                    }
                    else {
                        $("#is_nom_rem_separate").attr('disabled','disabled');
                        $("#remuneration").css('background-color',"transparent");
                        $("#nomination").css('background-color',"transparent");
                        $("#nom_rem_committee").css('background-color',"transparent");
                    }
                    $(".ajax-waiting").addClass('hidden');
                    $("#appointment_date").val(data.director_info.appointment_date);
                    $("#resignation_date").val(data.director_info.resignation_date);
                    $("#current_tenure").val(data.director_info.current_tenure);
                    $("#total_association").val(data.director_info.total_association);
                    $("#company_classification").val(data.director_info.company_classification);
                    $("#ses_classification").val(data.director_info.ses_classification);
                    $("#additional_classification").val(data.director_info.additional_classification);
                    $("#audit_committee").val(data.director_info.audit_committee);
                    $("#investor_grievance").val(data.director_info.investor_grievance);
                    if($("#is_nom_rem_separate").val()=='yes') {
                        $("#remuneration").val(data.director_info.remuneration);
                        $("#nomination").val(data.director_info.nomination);
                    }
                    else {
                        $("#nom_rem_committee").val(data.director_info.nomination_remuneration);
                    }
                    $("#csr").val(data.director_info.csr);
                    $("#risk_management_committee").val(data.director_info.risk_management_committee);
                    $("#shares_held").val(data.director_info.shares_held);
                    $("#esops").val(data.director_info.esops);
                    $("#other_pecuniary_relationship").val(data.director_info.other_pecuniary_relationship);
                    $("#retiring_non_retiring").val(data.director_info.retiring_non_retiring);
                    $("#ratio_to_mre").val(data.director_info.ratio_to_mre);
                    $("#comments").val(data.director_info.comments);
                    $("#no_directorship").val(data.director_info.no_directorship);
                    $("#committee_memberships").val(data.director_info.committee_memberships);
                    $("#committee_chairmanships").val(data.director_info.committee_chairmanships);
                    $('.date-picker').datepicker({
                        rtl: App.isRTL(),
                        autoclose: true,
                        format:'dd-mm-yyyy'
                    });
                }
            });
        });

        if($("#financial_year").val()!="") {
            fillDirectorList();
        }

        $("#financial_year").change(function() {
            fillDirectorList();
        });

        function fillDirectorList () {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_directors_in_year:true,
                    financial_year:$("#financial_year").val(),
                    company_id:$("#companies_id").val()
                },
                beforeSend: function() {
                    $(".ajax-waiting").removeClass('hidden');
                },
                success: function(data) {
                    if(data.directors.length==0) {
                        $("#dir_din_no").html("");
                        $(".select2-chosen").html("Search By Name or DIN");
                        $(".flushable").val("");
                    }
                    else {
                        $(".ajax-waiting").addClass('hidden');
                        $("#allocated_director_list").html("");
                        $("#dir_din_no").html("");
                        $("#dir_din_no").append("<option>Search By Name or DIN</option>");
                        for(var i=0;i<data.directors.length;i++) {
                            $("#dir_din_no").append("<option value='"+data.directors[i].din_no+"'>"+data.directors[i].dir_name+" ("+data.directors[i].din_no+")</option>");
                        }
                        $(".select2-chosen").html("Search By Name or DIN");
                        $(".flushable").val("");
                        if(data.rem_nom_assigned) {
                            $("#is_nom_rem_separate_hidden").val(data.are_committees_seperate);
                            $("#is_nom_rem_separate").attr('disabled','disabled');
                            $("#is_nom_rem_separate").val(data.are_committees_seperate);
                            $("#is_nom_rem_separate").change();
                            $.gritter.add({
                                title: "Info",
                                text: "Nomination and Remuneration Committee same info is already assigned plz don't modify that",
                                sticky: false,
                                time: 4000
                            });
                        }
                    }
                }
            });
        }
    },
    initializeAuditorsInfoJs: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#no_of_auditors").change(function () {
            var no = parseInt($(this).val());
            for(var i=1;i<=no;i++) {
                $(".auditor_name_"+i).removeClass('hidden');
                $(".auditor_reg_no_"+i).removeClass('hidden');
                $(".auditor_parent_company_"+i).removeClass('hidden');
                $(".auditor_tenure_"+i).removeClass('hidden');
                $(".auditor_partner_name_"+i).removeClass('hidden');
                $(".auditor_partner_membership_no_"+i).removeClass('hidden');
                $(".auditor_partner_tenure_"+i).removeClass('hidden');
            }
            for(var j=no+1;j<=3;j++) {
                $(".auditor_name_"+j).addClass('hidden');
                $(".auditor_reg_no_"+i).addClass('hidden');
                $(".auditor_parent_company_"+j).addClass('hidden');
                $(".auditor_tenure_"+j).addClass('hidden');
                $(".auditor_partner_name_"+j).addClass('hidden');
                $(".auditor_partner_membership_no_"+i).addClass('hidden');
                $(".auditor_partner_tenure_"+j).addClass('hidden');
            }
        });
        $("#audit_fee,#audit_related_fee,#non_audit_fee").keyup(function() {
            var audit_fee = 0, audit_related_fee = 0, non_audit_fee=0;
            if($("#audit_fee").val()!="" && !isNaN($("#audit_fee").val())) {
                audit_fee = parseFloat($("#audit_fee").val());
            }
            if($("#audit_related_fee").val()!="" && !isNaN($("#audit_related_fee").val())) {
                audit_related_fee = parseFloat($("#audit_related_fee").val());
            }
            if($("#non_audit_fee").val()!="" && !isNaN($("#non_audit_fee").val())) {
                non_audit_fee = parseFloat($("#non_audit_fee").val());
            }
            $("#total_auditors_fee").val(audit_fee+audit_related_fee+non_audit_fee);
        });
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#financial_year").change(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_auditor_info:true,
                    company_id:$("#companies_id").val(),
                    financial_year:$("#financial_year").val()
                },
                success: function(data) {
                    if(data.count==1) {
                        swal({
                                title:"Current year data exists!",
                                text: "Please go to edit page for making changes."
                            },
                            function(){
                                window.location = document.URL;
                            });
                    }
                }
            });
        });
    },
    initializeEditAuditorsInfo: function(messages,flag) {
        if(flag) {
            $.gritter.add({
                title: messages[0],
                text: messages[1],
                image: messages[2],
                sticky: false,
                time: 4000
            });
        }
        $("#no_of_auditors").change(function () {
            var no = parseInt($(this).val());
            for(var i=1;i<=no;i++) {
                $(".auditor_name_"+i).removeClass('hidden');
                $(".auditor_reg_no_"+i).removeClass('hidden');
                $(".auditor_parent_company_"+i).removeClass('hidden');
                $(".auditor_tenure_"+i).removeClass('hidden');
                $(".auditor_partner_name_"+i).removeClass('hidden');
                $(".auditor_partner_membership_no_"+i).removeClass('hidden');
                $(".auditor_partner_tenure_"+i).removeClass('hidden');
            }
            for(var j=no+1;j<=3;j++) {
                $(".auditor_name_"+j).addClass('hidden');
                $(".auditor_reg_no_"+i).addClass('hidden');
                $(".auditor_parent_company_"+j).addClass('hidden');
                $(".auditor_tenure_"+j).addClass('hidden');
                $(".auditor_partner_name_"+j).addClass('hidden');
                $(".auditor_partner_membership_no_"+i).addClass('hidden');
                $(".auditor_partner_tenure_"+j).addClass('hidden');
            }
        });
        $("#audit_fee,#audit_related_fee,#non_audit_fee").keyup(function() {
            var audit_fee = 0, audit_related_fee = 0, non_audit_fee=0;
            if($("#audit_fee").val()!="" && !isNaN($("#audit_fee").val())) {
                audit_fee = parseFloat($("#audit_fee").val());
            }
            if($("#audit_related_fee").val()!="" && !isNaN($("#audit_related_fee").val())) {
                audit_related_fee = parseFloat($("#audit_related_fee").val());
            }
            if($("#non_audit_fee").val()!="" && !isNaN($("#non_audit_fee").val())) {
                non_audit_fee = parseFloat($("#non_audit_fee").val());
            }
            $("#total_auditors_fee").val(audit_fee+audit_related_fee+non_audit_fee);
        });
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }
        $("#financial_year").change(function() {
            fillList();
        });

        if($("#financial_year").val()!="") {
            fillList();
        }
        function fillList () {
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_auditor_info:true,
                    company_id:$("#companies_id").val(),
                    financial_year:$("#financial_year").val()
                },
                success: function(data) {
                    console.log(data);
                    if(data.count!=0) {
                        $("#company_auditors_info_id").val(data.company_auditors_info_id);
                        $("#no_of_auditors").val(data.no_of_auditors);
                        $("#net_profit").val(data.net_profit);
                        $("#audit_fee").val(data.audit_fee);
                        $("#audit_related_fee").val(data.audit_related_fee);
                        $("#audit_related_fee").val(data.audit_related_fee);
                        $("#non_audit_fee").val(data.non_audit_fee);
                        $("#total_auditors_fee").val(data.total_auditors_fee);
                        $("#comments").val(data.comments);
                        var $auditor_details = data.auditor_details;
                        $("#no_of_auditors").change();
                        for(var i=0;i<$auditor_details.length;i++) {
                            $(".auditor_name_"+(i+1)).val($auditor_details[i].auditor_name);
                            $(".auditor_reg_no_"+(i+1)).val($auditor_details[i].auditor_name);
                            $(".auditor_parent_company_"+(i+1)).val($auditor_details[i].parent_company);
                            $(".auditor_tenure_"+(i+1)).val($auditor_details[i].auditor_tenure);
                            $(".auditor_partner_name_"+(i+1)).val($auditor_details[i].partner_name);
                            $(".auditor_partner_membership_no_"+(i+1)).val($auditor_details[i].partner_name);
                            $(".auditor_partner_tenure_"+(i+1)).val($auditor_details[i].partner_tenure);
                        }
                    }
                    else {
                        $(".flushable").val("");
                    }
                }
            });
        }
    }
}
var object = new CustomJS();