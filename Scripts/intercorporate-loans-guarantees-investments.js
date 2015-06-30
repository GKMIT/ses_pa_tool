function CustomJS() {
}
CustomJS.prototype = {
    initialization: function() {
        $(".analysis-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });

        $("textarea[name='recommendation_text[]']").each(function() {
            CKEDITOR.inline( $(this).attr('id') );
        });
        $("Div").find("textarea[name='used_in_text[]']").each(function(i,d){
            $(this).addClass('inline-editor');
        });

        var j=10;

        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });

        var context = this;
        $(".checkbox").click(function(){
            var self=$(this);
            if(self.is(':checked')) {
                $('#existing_transaction_with_the_recipient').removeClass("hidden");
            }
            else {
                $('#existing_transaction_with_the_recipient').addClass("hidden");
            }
        });
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-M-yyyy'
        });

        $('#has_the_company_defaulted_on_any').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                console.log("entering");
                $('#has_the_company_defaulted_on_any_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_defaulted_on_any_sub_part').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material_analysis_text').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material').val("");

            }
        });
        $('#has_the_company_undergone_a_debt').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#has_the_company_undergone_a_debt_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_undergone_a_debt_sub_part').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material_operating_analysis_text').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material_operating').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material_operating').val("");
            }
        });
        $('#is_the_company_a_sick_company').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#is_the_company_a_sick_company_sub_part').removeClass('hidden');
            }
            else {
                $('#is_the_company_a_sick_company_sub_part').addClass('hidden');
                $('#is_the_loan_being_made_analysis_text').addClass('hidden');
                $('#is_the_loan_being_made').addClass('hidden');
                $('#is_the_loan_being_made').val("");
            }
        });
        $('#has_the_company_disclosed_whether').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#has_the_company_disclosed_whether_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_disclosed_whether_sub_part').addClass('hidden');
                $('#are_the_other_shareholders_of_the_recipients_analysis_text').addClass('hidden');
                $('#are_the_other_shareholders_of_the_recipients').addClass('hidden');
                $('#are_the_other_shareholders_of_the_recipients').val(" ");
            }
        });
        $('#has_the_company_disclosed_the_rate').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#has_the_company_disclosed_the_rate_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_disclosed_the_rate_sub_part').addClass('hidden');
                $('#is_the_rate_of_interest_charged_less_than_analysis_text').addClass('hidden');
                $('#is_the_rate_of_interest_charged_less_than').addClass('hidden');
                $('#is_the_rate_of_interest_charged_less_than').val("");
            }
        });
        $('#has_the_company_made_disclosures_required').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#has_the_company_made_disclosures_required_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_made_disclosures_required_sub_part').addClass('hidden');
                $('#is_the_information_related_to_particulars_of_loans').addClass('hidden');
                $('#is_the_information_related_to_particulars_of_loans').val('');
                $('#is_the_information_related_to_particulars_of_loans_analysis_text').addClass('hidden');
            }
        });
        $('#has_the_company_made_intercorporate').change(function(){
            var self=$(this);
            if(self.val()=='yes') {
                $('#has_the_company_made_intercorporate_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_made_intercorporate_sub_part').addClass('hidden');
                $('#is_the_information_related_to_particulars_of_loans_analysis_text').addClass('hidden');
                $('#is_the_information_related_to_particulars_of_loans').addClass('hidden');
                $('#is_the_information_related_to_particulars_of_loans').val('');
            }
        });

        $("#is_the_loan_being_made_to_a_material").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 137
                    },
                    success: function (data) {
                        $("#is_the_loan_being_made_to_a_material_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_loan_being_made_to_a_material_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_loan_being_made_to_a_material_analysis_text textarea").html("");
                $("#is_the_loan_being_made_to_a_material_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_loan_being_made_to_a_material_operating").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 138
                    },
                    success: function (data) {
                        $("#is_the_loan_being_made_to_a_material_operating_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_loan_being_made_to_a_material_operating_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_loan_being_made_to_a_material_operating_analysis_text textarea").html("");
                $("#is_the_loan_being_made_to_a_material_operating_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_loan_being_made").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 139
                    },
                    success: function (data) {
                        $("#is_the_loan_being_made_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_loan_being_made_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_loan_being_made_analysis_text textarea").html("");
                $("#is_the_loan_being_made_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_identified_recipients").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 140
                    },
                    success: function (data) {
                        $("#has_the_company_identified_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_identified_recipients_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_identified_recipients_analysis_text textarea").html("");
                $("#has_the_company_identified_recipients_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_specific").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 141
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_specific_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_specific_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_specific_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_specific_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_whether").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 142
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_whether_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_whether_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_whether_analysis_text textarea").html("");
                $("#has_the_company_disclosed_whether_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_other_shareholders_of_the_recipients").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 143
                    },
                    success: function (data) {
                        $("#are_the_other_shareholders_of_the_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_other_shareholders_of_the_recipients_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_other_shareholders_of_the_recipients_analysis_text textarea").html("");
                $("#are_the_other_shareholders_of_the_recipients_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_audit_committee_recommended").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 144
                    },
                    success: function (data) {
                        $("#has_the_audit_committee_recommended_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_audit_committee_recommended_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_audit_committee_recommended_analysis_text textarea").html("");
                $("#has_the_audit_committee_recommended_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_entity_to_which_the_company_intends").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 145
                    },
                    success: function (data) {
                        $("#does_the_entity_to_which_the_company_intends_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_entity_to_which_the_company_intends_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_entity_to_which_the_company_intends_analysis_text textarea").html("");
                $("#does_the_entity_to_which_the_company_intends_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_rate").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 146
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_rate_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_rate_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_rate_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_rate_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_rate_of_interest_charged_less_than").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 147
                    },
                    success: function (data) {
                        $("#is_the_rate_of_interest_charged_less_than_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_rate_of_interest_charged_less_than_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_rate_of_interest_charged_less_than_analysis_text textarea").html("");
                $("#is_the_rate_of_interest_charged_less_than_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_seeks_approval").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 148
                    },
                    success: function (data) {
                        $("#does_the_company_seeks_approval_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_seeks_approval_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_seeks_approval_analysis_text textarea").html("");
                $("#does_the_company_seeks_approval_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_made_disclosures_required").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 149
                    },
                    success: function (data) {
                        $("#has_the_company_made_disclosures_required_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_made_disclosures_required_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_made_disclosures_required_analysis_text textarea").html("");
                $("#has_the_company_made_disclosures_required_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_information_related_to_particulars_of_loans").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 150
                    },
                    success: function (data) {
                        $("#is_the_information_related_to_particulars_of_loans_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_information_related_to_particulars_of_loans_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_information_related_to_particulars_of_loans_analysis_text textarea").html("");
                $("#is_the_information_related_to_particulars_of_loans_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_intercorporate_loans").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-intercorporate-loans").each(function(i,data){
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
                        $("#recommendation_text_intercorporate_loans").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_intercorporate_loans").parent().find(".cke_textarea_inline").html("");
            }
        });


    },
    pageload:function(){
        $(document).ready(function(){
            var main_section=$('#main_section').val();
            console.log(main_section);
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExisting:1,MainSection:main_section},
                beforeSend: function() {
                    $.loader_add();
                },
                success:function(data){
                    var resolution_name="intercorparate";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataOfIntercorporateLoan:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                console.log(data);
                                var triggers = data.triggers;
                                $(".triggers").each(function(i,d) {
                                    var select = $(this);
                                    select.val(triggers[i]['triggers']);
                                    select.trigger('change');
                                });
                                setTimeout(function(){
                                    var other_text = data.other_text;
                                    $(".other-text").each(function(i,d) {
                                        var text_area = $(this);
                                        if(text_area.hasClass('inline-editor')) {
                                            text_area.parent().find(".cke_textarea_inline").html(other_text[i]['text']);
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
                                    if(checkbox!=null) {
                                        var j=0;
                                        $(".checkbox").each(function(i,d) {
                                            if(j!=checkbox.length) {
                                                var $checkboxobj = $(this);
                                                var checked=$(this).val();
                                                var saveCheck = checkbox[j]['checkbox'];
                                                if(checked==saveCheck) {
                                                    $checkboxobj.attr('checked',true);
                                                    $checkboxobj.parent().addClass('checked');
                                                    $("#existing_transaction_with_the_recipient").removeClass('hidden');
                                                    j++;
                                                }
                                            }
                                        });

                                    }

                                    var the_recipient=data.the_recipient;
                                    $('.date1').val(the_recipient[0].s_date);
                                    $('.date2').val(the_recipient[1].s_date);
                                    $('.date3').val(the_recipient[2].s_date);
                                    $('.date4').val(the_recipient[3].s_date);

                                    $('.share1').val(the_recipient[0].share);
                                    $('.share2').val(the_recipient[1].share);
                                    $('.share3').val(the_recipient[2].share);
                                    $('.share4').val(the_recipient[3].share);

                                    $('.reserves_and_surplus1').val(the_recipient[0].reserves_and_surplus);
                                    $('.reserves_and_surplus2').val(the_recipient[1].reserves_and_surplus);
                                    $('.reserves_and_surplus3').val(the_recipient[2].reserves_and_surplus);
                                    $('.reserves_and_surplus4').val(the_recipient[3].reserves_and_surplus);

                                    $('.assets1').val(the_recipient[0].assets);
                                    $('.assets2').val(the_recipient[1].assets);
                                    $('.assets3').val(the_recipient[2].assets);
                                    $('.assets4').val(the_recipient[3].assets);

                                    $('.liabilities1').val(the_recipient[0].liabilities);
                                    $('.liabilities2').val(the_recipient[1].liabilities);
                                    $('.liabilities3').val(the_recipient[2].liabilities);
                                    $('.liabilities4').val(the_recipient[3].liabilities);

                                    $('.revenues1').val(the_recipient[0].revenues);
                                    $('.revenues2').val(the_recipient[1].revenues);
                                    $('.revenues3').val(the_recipient[2].revenues);
                                    $('.revenues4').val(the_recipient[3].revenues);

                                    $('.profit_after_tex1').val(the_recipient[0].profit_after_tax);
                                    $('.profit_after_tex2').val(the_recipient[1].profit_after_tax);
                                    $('.profit_after_tex3').val(the_recipient[2].profit_after_tax);
                                    $('.profit_after_tex4').val(the_recipient[3].profit_after_tax);

                                    var existing_transactions=data.existing_transactions;
                                    $('.selected_date1').val(existing_transactions[0].first_date);
                                    $('.selected_date2').val(existing_transactions[0].second_date);
                                    $(".existing_transaction").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(existing_transactions[i].type);
                                        row.find("td").eq(1).find('input').val(existing_transactions[i].transaction_details);
                                        row.find("td").eq(2).find('input').val(existing_transactions[i].details_values1);
                                        row.find("td").eq(3).find('input').val(existing_transactions[i].details_values2);
                                    });
                                    $.loader_remove();
                                },3000);
                            }
                        });
                    }
                    else {
                        $('#edit_mode').val("");
                        $.loader_remove();
                    }
                }
            });
        });
    }
}
var object = new CustomJS();