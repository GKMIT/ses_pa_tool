function CustomJS() {

}

CustomJS.prototype = {
    initialization: function(){


        $(".analysis-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });

        var recomm_counter = 400;
        $("textarea[name='recommendation_text[]']").each(function() {
            var attr = $(this).attr('id');
            if(typeof attr !== typeof undefined && attr !== false) {

            }
            else {
                $(this).attr("id","inline_editor_"+recomm_counter);
            }
            CKEDITOR.inline( $(this).attr('id') );
            recomm_counter++;
        });

        $("div").find("textarea[name='used_in_text[]']").each(function(i,d){
            $(this).addClass('inline-editor');
        });

        var j=10;

        $(".inline-editor").each(function(i,d) {
            if(!$(this).is("input")) {
                $(this).attr("id","inline_editor_"+j);
                CKEDITOR.inline( $(this).attr('id') );
                j++;
            }
        });

        $(".check-trigger").click(function() {
            $(".check-trigger").each(function(index,check) {
                var self =$(this);
                if(self.is(':checked')) {
                    var id_hidden_block = self.attr("hidden-id");
                    $("#"+id_hidden_block).removeClass('hidden');
                }
                else {
                    var id_hidden_block = self.attr("hidden-id");
                    $("#"+id_hidden_block).addClass('hidden');
                }
            });
        });
        $("#disclosed_in_notice_and_annual_report").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 219
                    },
                    success: function (data) {
                        $("#disclosed_in_notice_and_annual_report_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#disclosed_in_notice_and_annual_report_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#disclosed_in_notice_and_annual_report_analysis_text textarea").html("");
                $("#disclosed_in_notice_and_annual_report_analysis_text").addClass('hidden');
            }
        });
        $("#disclosed_in_notice_and_annual_report1").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 219
                    },
                    success: function (data) {
                        $("#disclosed_in_notice_and_annual_report_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#disclosed_in_notice_and_annual_report_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#disclosed_in_notice_and_annual_report_analysis_text textarea").html("");
                $("#disclosed_in_notice_and_annual_report_analysis_text").addClass('hidden');
            }
        });
        $("#disclosed_in_notice_and_annual_report2").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 219
                    },
                    success: function (data) {
                        $("#disclosed_in_notice_and_annual_report_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#disclosed_in_notice_and_annual_report_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#disclosed_in_notice_and_annual_report_analysis_text textarea").html("");
                $("#disclosed_in_notice_and_annual_report_analysis_text").addClass('hidden');
            }
        });
        $("#auditors_eligibility_for_appointment1").change(function () {

            var self = $(this);
            if(self.val()=='not disclosed') {
                $("#auditors_eligibility_for_appointment_analysis_text1 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text1").removeClass('hidden');

            }
            else {
                $("#auditors_eligibility_for_appointment_analysis_text1 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text1").addClass('hidden');
            }
        });
        $("#auditors_eligibility_for_appointment2").change(function () {
            var self = $(this);
            if(self.val()=='not disclosed') {
                $("#auditors_eligibility_for_appointment_analysis_text2 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text2").removeClass('hidden');

            }
            else {
                $("#auditors_eligibility_for_appointment_analysis_text2 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text2").addClass('hidden');
            }
        });
        $("#auditors_eligibility_for_appointment3").change(function () {
            var self = $(this);
            if(self.val()=='not disclosed') {
                $("#auditors_eligibility_for_appointment_analysis_text3 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text3").removeClass('hidden');

            }
            else {
                $("#auditors_eligibility_for_appointment_analysis_text3 textarea").html("");
                $("#auditors_eligibility_for_appointment_analysis_text3").addClass('hidden');
            }
        });
        $("#auditors_independence_certificate1").change(function () {
            var self = $(this);
            if(self.val()=='not disclosed') {

                $("#auditors_independence_certificate_analysis_text1 textarea").html("");
                $("#auditors_independence_certificate_analysis_text1").removeClass('hidden');

            }
            else {
                $("#auditors_independence_certificate_analysis_text1 textarea").html("");
                $("#auditors_independence_certificate_analysis_text1").addClass('hidden');
            }
        });
        $("#auditors_independence_certificate2").change(function () {
            var self = $(this);
            if(self.val()=='not disclosed') {

                $("#auditors_independence_certificate_analysis_text2 textarea").html("");
                $("#auditors_independence_certificate_analysis_text2").removeClass('hidden');

            }
            else {
                $("#auditors_independence_certificate_analysis_text2 textarea").html("");
                $("#auditors_independence_certificate_analysis_text2").addClass('hidden');
            }
        });
        $("#auditors_independence_certificate3").change(function () {
            var self = $(this);
            if(self.val()=='not disclosed') {

                $("#auditors_independence_certificate_analysis_text3 textarea").html("");
                $("#auditors_independence_certificate_analysis_text3").removeClass('hidden');

            }
            else {
                $("#auditors_independence_certificate_analysis_text3 textarea").html("");
                $("#auditors_independence_certificate_analysis_text3").addClass('hidden');
            }
        });

        $("#btn_recommendation_text_appointment_of_branch_auditors").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;

            $(".recommendations-fire-appointment-of-branch-auditors").each(function(i,data){
                var self = $(this);
                if($(this).val()!="") {
                    var attr = $(this).find('option:selected').attr('data-recommendation-table-id');
                    if(typeof attr !== typeof undefined && attr !== false) {
                        table_id = $(this).find('option:selected').attr('data-recommendation-table-id');
                        array_recommendations_fire.push({"table_id":table_id});
                    }
                }
            });
            if(array_recommendations_fire.length>0) {
                var final_ids = JSON.stringify(array_recommendations_fire);
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_recommendation_text:true,
                        table_id:final_ids
                    },
                    success: function(data) {
                        $("#recommendation_text_appointment_of_branch_auditors").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_appointment_of_branch_auditors").parent().find(".cke_textarea_inline").html("");
            }
        });
        //appointment of auditors
        function calculate_tanure() {
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    standard_analysis_text:true,
                    table_id:220
                },
                success: function(data) {
                    setTimeout(function(){
                        var tanure_value1=parseInt($('#tanure_value1').val());
                        var tanure_value2=parseInt($('#tanure_value2').val());
                        var tanure_value3=parseInt($('#tanure_value3').val());
                        if((tanure_value1||tanure_value2||tanure_value3)>10) {
                            $("#calculate_tenure_analysis_text").removeClass('hidden');
                            $("#calculate_tenure_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        }
                        else {
                            $("#calculate_tenure_analysis_text textarea").html("");
                            $("#calculate_tenure_analysis_text").addClass('hidden');
                        }
                    },2000);
                }
            });
        }
        $('.tanure_value').keyup(function(){
            calculate_tanure();
            calculate_tanure_and_audit_partner();
        });
        calculate_tanure();
        function calculate_tanure_audit_partner() {
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    standard_analysis_text:true,
                    table_id:221
                },
                success: function(data) {
                    setTimeout(function(){
                        var audit_partner_value1=parseInt($('#audit_partner_value1').val());
                        var audit_partner_value2=parseInt($('#audit_partner_value2').val());
                        var audit_partner_value3=parseInt($('#audit_partner_value3').val());
                        if(((audit_partner_value1||audit_partner_value2||audit_partner_value3))>3) {
                            $(".calculate_tenure_audit_partner_value_analysis_text").removeClass('hidden');
                            $(".calculate_tenure_audit_partner_value_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        }
                        else {
                            $(".calculate_tenure_audit_partner_value_analysis_text").addClass('hidden');
                            $(".calculate_tenure_audit_partner_value_analysis_text textarea").html("");
                        }
                    },2000);

                }
            });
        }
        $(".tenure_audit_partner_value").keyup(function(){
            calculate_tanure_audit_partner();
            calculate_tanure_and_audit_partner();
        });
        $(".term-value").keyup(function(){
            calculate_tanure_audit_partner();
            calculate_tanure_and_audit_partner();
        });
        calculate_tanure_audit_partner();
        calculate_tanure_and_audit_partner();
        function calculate_tanure_and_audit_partner(){
            if(($('#tanure_value1').val()!="")){
                var tanure_value1=parseInt($('#tanure_value1').val());
            }
            else {
                tanure_value1=0;
            }
            if(($('#tanure_value2').val()!="")){
                var tanure_value2=parseInt($('#tanure_value2').val());
            }
            else {
                tanure_value2=0;
            }
            if(($('#tanure_value3').val()!="")){
                var tanure_value3=parseInt($('#tanure_value3').val());
            }
            else {
                tanure_value3=0;
            }
            if(($('#audit_partner_value1').val()!="")){
                var audit_partner_value1=parseInt($('#audit_partner_value1').val());
            }
            else {
                audit_partner_value1=0;
            }
            if(($('#audit_partner_value2').val()!="")){
                var audit_partner_value2=parseInt($('#audit_partner_value2').val());
            }
            else {
                audit_partner_value2=0;
            }
            if(($('#audit_partner_value3').val()!="")){
                var audit_partner_value3=parseInt($('#audit_partner_value3').val());
            }
            else {
                audit_partner_value3=0;
            }
            if(($('#term_of_appoint1').val()!="")){
                var term_of_appoint1=parseInt($('#term_of_appoint1').val());
            }
            else {
                term_of_appoint1=0;
            }
            if(($('#term_of_appoint2').val()!="")){
                var term_of_appoint2=parseInt($('#term_of_appoint2').val());
            }
            else {
                term_of_appoint2=0;
            }
            if(($('#term_of_appoint3').val()!="")){
                var term_of_appoint3=parseInt($('#term_of_appoint3').val());
            }
            else {
                term_of_appoint3=0;
            }
            var total_tanure=parseInt(tanure_value1+tanure_value2+tanure_value3);
            var total_audit=parseInt(audit_partner_value1+audit_partner_value2+audit_partner_value3);
            if(((tanure_value1||tanure_value2||tanure_value3)>=10) && ((term_of_appoint1||term_of_appoint2||term_of_appoint3)==3)) {

                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:222
                    },
                    success: function (data) {
                        setTimeout(function(){
                            $('.calculate_tenure_and_term_value_analysis_text').removeClass('hidden');
                            $('.calculate_tenure_and_term_value_value').parent().find(".cke_textarea_inline").html(data.analysis_text);

                        },2000);
                    }
                });
            }
            else if(((tanure_value1||tanure_value2||tanure_value3)<5) && ((tanure_value1||tanure_value2||tanure_value3)>0) &&  ((term_of_appoint1||term_of_appoint2||term_of_appoint3)<5) &&  ((term_of_appoint1||term_of_appoint2||term_of_appoint3)>0)) {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:223
                    },
                    success: function (data) {
                        setTimeout(function(){

                            $('.calculate_tenure_and_term_value_analysis_text').removeClass('hidden');
                            $('.calculate_tenure_and_term_value_value').parent().find(".cke_textarea_inline").html(data.analysis_text);
                        },2000);
                    }
                });
            }
            else if((((tanure_value1||tanure_value2||tanure_value3)>5)||((tanure_value1||tanure_value2||tanure_value3)<10)) && ((term_of_appoint1||term_of_appoint2||term_of_appoint3)>10)) {

                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:224
                    },
                    success: function (data) {
                        setTimeout(function(){

                            $('.calculate_tenure_and_term_value_analysis_text').removeClass('hidden');
                            $('.calculate_tenure_and_term_value_value').parent().find(".cke_textarea_inline").html(data.analysis_text);
                        },2000);
                    }
                });
            }
            else {
                $('.calculate_tenure_and_term_value_value').parent().find(".cke_textarea_inline").html("");
                $('.calculate_tenure_and_term_value_analysis_text').addClass('hidden');
            }
        }

        $("#auditors_same_firm_option_new").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $("#previous_auditors_details_container1").removeClass('hidden');
                $("#auditors_same_firm_tenure1").removeClass('hidden');

            }
            else {
                $("#previous_auditors_details_container1").addClass('hidden');
                $("#auditors_same_firm_tenure1").addClass('hidden');
            }
        });

        $("#are_the_auditors_appointed_for_requisite_number_of_years").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 225
                    },
                    success: function (data) {
                        $("#are_the_auditors_appointed_for_requisite_number_of_years_analysis_text").removeClass('hidden');
                        $("#are_the_auditors_appointed_for_requisite_number_of_years_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);

                    }
                });
            }
            else {
                $("#are_the_auditors_appointed_for_requisite_number_of_years_analysis_text").addClass('hidden');
                $("#are_the_auditors_appointed_for_requisite_number_of_years_analysis_text textarea").html("");

            }
        });
        $("#financial_interests_in_or_association_with_the_company").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 226
                    },
                    success: function (data) {
                        $("#financial_interests_in_or_association_with_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#financial_interests_in_or_association_with_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#financial_interests_in_or_association_with_the_company_analysis_text textarea").html("");
                $("#financial_interests_in_or_association_with_the_company_analysis_text").addClass('hidden');
            }
        });
        $("#business_relationship_with_the_company").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 227
                    },
                    success: function (data) {
                        $("#business_relationship_with_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#business_relationship_with_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#business_relationship_with_the_company_analysis_text textarea").html("");
                $("#business_relationship_with_the_company_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_restated_material_financial").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 228
                    },
                    success: function (data) {
                        $("#has_the_company_restated_material_financial_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_restated_material_financial_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_restated_material_financial_analysis_text textarea").html("");
                $("#has_the_company_restated_material_financial_analysis_text").addClass('hidden');
            }
        });
        $("#have_material_unaudited_financial").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 229
                    },
                    success: function (data) {
                        $("#have_material_unaudited_financial_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_material_unaudited_financial_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_material_unaudited_financial_analysis_text textarea").html("");
                $("#have_material_unaudited_financial_analysis_text").addClass('hidden');
            }
        });
        $("#were_the_auditors").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 230
                    },
                    success: function (data) {
                        $("#were_the_auditors_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#were_the_auditors_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#were_the_auditors_analysis_text textarea").html("");
                $("#were_the_auditors_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_audit_committee_compliant").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 231
                    },
                    success: function (data) {
                        $("#is_the_audit_committee_compliant_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_audit_committee_compliant_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_audit_committee_compliant_analysis_text textarea").html("");
                $("#is_the_audit_committee_compliant_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_made_adequate").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 232
                    },
                    success: function (data) {
                        $("#has_the_company_made_adequate_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_made_adequate_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_made_adequate_analysis_text textarea").html("");
                $("#has_the_company_made_adequate_analysis_text").addClass('hidden');
            }
        });
        $("#was_non_audit_fee").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 233
                    },
                    success: function (data) {
                        $("#was_non_audit_fee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#was_non_audit_fee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#was_non_audit_fee_analysis_text textarea").html("");
                $("#was_non_audit_fee_analysis_text").addClass('hidden');
            }
        });
        $("#was_non_audit_fee_50").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 234
                    },
                    success: function (data) {
                        $("#was_non_audit_fee_50_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#was_non_audit_fee_50_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#was_non_audit_fee_50_analysis_text textarea").html("");
                $("#was_non_audit_fee_50_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_appointment_of_auditors").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            var tanure_value1=$('#tanure_value1').val();
            var tanure_value2=$('#tanure_value2').val();
            var tanure_value3=$('#tanure_value3').val();
            var audit_partner_value1=$('#audit_partner_value1').val();
            var audit_partner_value2=$('#audit_partner_value2').val();
            var audit_partner_value3=$('#audit_partner_value3').val();
            var total_tanure=tanure_value1+tanure_value2+tanure_value3;
            var total_tanure=audit_partner_value1+audit_partner_value2+audit_partner_value3;
            if(((tanure_value1||tanure_value2||tanure_value3)>=10) && ((audit_partner_value1||audit_partner_value2||audit_partner_value3)==3)) {
                array_recommendations_fire.push({"table_id":176});
            }
            if((total_tanure<5) && ((audit_partner_value1||audit_partner_value2||audit_partner_value3)<5)) {
                array_recommendations_fire.push({"table_id":177});
            }
            if((((tanure_value1||tanure_value2||tanure_value3)>5)||((tanure_value1||tanure_value2||tanure_value3)<10)) && ((audit_partner_value1||audit_partner_value2||audit_partner_value3)>10)){
                array_recommendations_fire.push({"table_id":178});
            }
            if((tanure_value1||tanure_value2||tanure_value3)>10) {
                array_recommendations_fire.push({"table_id":179});
            }
            if((tanure_value1||tanure_value2||tanure_value3)>10) {
                array_recommendations_fire.push({"table_id":180});
            }
            $(".recommendations-fire-appointment-of-auditors").each(function(i,data){
                var self = $(this);
                if($(this).val()!="") {
                    var attr = $(this).find('option:selected').attr('data-recommendation-table-id');
                    if(typeof attr !== typeof undefined && attr !== false) {
                        table_id = $(this).find('option:selected').attr('data-recommendation-table-id');
                        array_recommendations_fire.push({"table_id":table_id});
                    }
                }
            });
            if(array_recommendations_fire.length>0) {
                var final_ids = JSON.stringify(array_recommendations_fire);
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_recommendation_text:true,
                        table_id:final_ids
                    },
                    success: function(data) {
                        $("#recommendation_text_appointment_of_auditors").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_appointment_of_auditors").parent().find(".cke_textarea_inline").html("");
            }
        });

        function calculatePercentageNonAuditFee(data_col_id) {
            var non_audit_fee = $("#non_audit_fee_year_"+data_col_id).val();
            var total_auditors_rem = $("#total_auditor_rem_year_"+data_col_id).val();
            var $percentage_non_audit = $("#percentage_non_audit_fee_year_"+data_col_id);
            if(non_audit_fee!="" &&  non_audit_fee!="0" &&  total_auditors_rem!="" && total_auditors_rem!="0") {
                var percentage = (non_audit_fee/total_auditors_rem * 100).toFixed();
                $percentage_non_audit.val(percentage);
            }
            else {
                $percentage_non_audit.val(0);
            }
        }

        function auditors_eligibility() {
            var no_of_auditors=$('#no_of_auditors').val();
            if(no_of_auditors==2) {
                $('#auditors_eligibility_info2').removeClass('hidden');
            }
            else if(no_of_auditors==3){
                $('#auditors_eligibility_info3').removeClass('hidden');
                $('#auditors_eligibility_info2').removeClass('hidden');
            }
            else {
                $('#auditors_eligibility_info2').addClass('hidden');
                $('#auditors_eligibility_info3').addClass('hidden');
            }
        }
        auditors_eligibility();
        $('#no_of_auditors').change(function(){
            auditors_eligibility();
        });
        $(".non_audit_fee,.total_auditors_remuneration").keyup(function() {
            calculatePercentageNonAuditFee($(this).attr('data-col-id'));
        });
        calculatePercentageNonAuditFee(1);
        calculatePercentageNonAuditFee(2);
        calculatePercentageNonAuditFee(3);
        calculatePercentageNonAuditFee(4);
        calculatePercentageNonAuditFee(5);
    },
    pageload:function(){
        $(document).ready(function(){
            var main_section=$('#main_section').val();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExisting:1,MainSection:main_section},
                beforeSend: function() {
                    $.loader_add();
                },
                success:function(data){
                    var resolution_name="appointment_of_auditors";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofAppointmentOfAuditors:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                var triggers = data.triggers;
                                $(".triggers").each(function(i,d) {
                                    var select = $(this);
                                    select.val(triggers[i]['triggers']);
                                    select.trigger('change');
                                });
                                setTimeout(function() {
                                    var other_text = data.other_text;
                                    $(".other-text").each(function(i,d) {
                                        var text_area = $(this);
                                        if(text_area.hasClass('inline-editor')) {
                                            text_area.parent().find(".cke_textarea_inline").html(other_text[i]['text']);
                                        }
                                        else if(text_area.is("input")) {
                                            text_area.val(other_text[i]['text']);
                                            text_area.trigger("keyup");
                                        }
                                        else {
                                            text_area.html(other_text[i]['text']);
                                        }
                                    });
                                    var analysis_text = data.analysis;
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_textarea_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                    var recommendation_text = data.recommendation;
                                    $(".recommendation-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_textarea_inline").html(recommendation_text[i]['recommendation_text']);
                                    });

                                    var checkbox = data.checkbox;
                                    var j=0;
                                    $(".checkbox").each(function(i,d) {
                                        var $checkboxobj = $(this);
                                        var checked=$(this).val();
                                        if(j!=checkbox.length) {
                                            var saveCheck=checkbox[j]['checkbox'];
                                            if(checked==saveCheck) {
                                                $checkboxobj.attr('checked',true);
                                                $checkboxobj.parent().addClass('checked');
                                                $("#"+$checkboxobj.attr("hidden-id")).removeClass('hidden');
                                                j++;
                                            }
                                        }
                                    });
                                    var table1 = data.table1;
                                    $(".table1").each(function(i,d) {
                                        var row = $(this);
                                        if(table1[i]['financial_year']!="") {
                                            row.find("td").eq(0).find('input').val(table1[i].financial_year);
                                            row.find("td").eq(1).find('input').val(table1[i].audit_fee);
                                            row.find("td").eq(2).find('input').val(table1[i].audit_related_fee);
                                            row.find("td").eq(3).find('input').val(table1[i].non_audit_fee);
                                            row.find("td").eq(4).find('input').val(table1[i].total_auditors_remuneration);
                                            row.find("td").eq(5).find('input').val(table1[i].percentage_non_audit_fee);
                                        }
                                    });
                                    $.loader_remove();
                                },3000);
                            }
                        });
                    }
                    else {
                        $('#edit_mode').val("");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{auditor_info:1},
                            success:function(data){
                                $('#no_of_auditors').val(data.no_of_auditors);
                                $('#no_of_auditors').change();
                                for(var i=0;i<data.no_of_auditors;i++) {
                                    $(".auditor-name").eq(i).val(data.auditor_details[i]['auditor_name']);
                                    $(".tanure_value").eq(i).val(data.auditor_details[i]['auditor_tenure']);
                                    $(".audit-partner-name").eq(i).val(data.auditor_details[i]['partner_name']);
                                    $(".tenure_audit_partner_value").eq(i).val(data.auditor_details[i]['partner_tenure']);
                                }
                                $(".tanure_value").trigger("keyup");
                                $.loader_remove();
                            }
                        });
                    }
                }
            });
        });
    }
}
var object = new CustomJS();