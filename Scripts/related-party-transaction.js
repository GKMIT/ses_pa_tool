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
        $("#year1").change(function () {
            var self = $(this);
            $("#year2").val(self.val() - 1);
            $("#year3").val(self.val() - 2);
            $("#year4").val(self.val() - 3);
            $("#year5").val(self.val() - 4);
        });
        $('#does_the_company_have_an_audit_committee').change(function () {
            var self = $(this);
            if (self.val() == 'yes') {
                $('#does_the_company_have_an_audit_committee_sub_part').removeClass('hidden');
            }
            else {
                $('#does_the_company_have_an_audit_committee_sub_part').addClass('hidden');
                $('#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text').addClass('hidden');
                $('#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text textarea').html(" ");
                $('#is_the_audit_committee_compliant_as_per_all_relevant_provisions').val("");
            }
        });
        $('#are_the_audited_financial_statement').change(function () {
            var self = $(this);
            if (self.val() == 'yes') {
                $('#are_the_audited_financial_statement_sub_part').removeClass('hidden');
            }
            else {
                $('#are_the_audited_financial_statement_sub_part').addClass('hidden');
                $('#have_the_auditors_of_the_entity_raised_analysis_text').addClass('hidden');
                $('#have_the_auditors_of_the_entity_raised_analysis_text textarea').html(" ");
                $('#have_the_auditors_of_the_entity_raised').val("");
            }
        });
        $('#is_the_net_worth_of_the_related_party_less').change(function () {
            var self = $(this);
            if (self.val() == 'yes') {
                $('#is_the_net_worth_of_the_related_party_less_sub_part').removeClass('hidden');
            }
            else {
                $('#is_the_net_worth_of_the_related_party_less_sub_part').addClass('hidden');
                $('#is_the_consideration_received_given_upfront_or_not_analysis_text').addClass('hidden');
                $('#is_the_consideration_received_given_upfront_or_not_analysis_text textarea').html(" ");
                $('#is_the_consideration_received_given_upfront_or_not').val("");
            }
        });
        $("#does_the_company_have_an_audit_committee").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 209
                    },
                    success: function (data) {
                        $("#does_the_company_have_an_audit_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_have_an_audit_committee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_have_an_audit_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_company_have_an_audit_committee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_audit_committee_compliant_as_per_all_relevant_provisions").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 210
                    },
                    success: function (data) {
                        $("#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_audit_committee_compliant_as_per_all_relevant_provisions_analysis_text").addClass('hidden');
            }
        });
        $("#have_the_auditors_made_adverse_comments").change(function () {
            var self = $(this);
            if (self.val() == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 211
                    },
                    success: function (data) {
                        $("#have_the_auditors_made_adverse_comments_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_the_auditors_made_adverse_comments_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_the_auditors_made_adverse_comments_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#have_the_auditors_made_adverse_comments_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_provided_a_reference_of_the_said_rpt").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 212
                    },
                    success: function (data) {
                        $("#has_the_company_provided_a_reference_of_the_said_rpt_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_provided_a_reference_of_the_said_rpt_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_provided_a_reference_of_the_said_rpt_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_provided_a_reference_of_the_said_rpt_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_audited_financial_statement").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 213
                    },
                    success: function (data) {
                        $("#are_the_audited_financial_statement_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_audited_financial_statement_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_audited_financial_statement_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#are_the_audited_financial_statement_analysis_text").addClass('hidden');
            }
        });
        $("#have_the_auditors_of_the_entity_raised").change(function () {
            var self = $(this);
            if (self.val() == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 214
                    },
                    success: function (data) {
                        $("#have_the_auditors_of_the_entity_raised_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_the_auditors_of_the_entity_raised_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_the_auditors_of_the_entity_raised_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#have_the_auditors_of_the_entity_raised_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_seeking_related_party").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 215
                    },
                    success: function (data) {
                        $("#is_the_company_seeking_related_party_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_seeking_related_party_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_seeking_related_party_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_company_seeking_related_party_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_made_all_the_disclosures").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 216
                    },
                    success: function (data) {
                        $("#has_the_company_made_all_the_disclosures_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_made_all_the_disclosures_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_made_all_the_disclosures_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_made_all_the_disclosures_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_consideration_received_given_upfront_or_not").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 217
                    },
                    success: function (data) {
                        $("#is_the_consideration_received_given_upfront_or_not_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_consideration_received_given_upfront_or_not_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_consideration_received_given_upfront_or_not_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_consideration_received_given_upfront_or_not_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_valuation_report").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 218
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_valuation_report_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_valuation_report_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_valuation_report_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_disclosed_the_valuation_report_analysis_text").addClass('hidden');
            }
        });
        $('#btn_recommendation_text_rpt').click(function () {
            var array_recommendations_fire = [];
            var table_id = 0;
            $(".recommendations-fire-rpt").each(function (i, data) {
                var self = $(this);
                if ($(this).val() != "") {
                    var attr = $(this).find('option:selected').attr('data-recommendation-table-id');
                    if (typeof attr !== typeof undefined && attr !== false) {
                        table_id = $(this).find('option:selected').attr('data-recommendation-table-id');
                        array_recommendations_fire.push({"table_id": table_id});
                    }
                }
            });
            if (array_recommendations_fire.length > 0) {
                var final_ids = JSON.stringify(array_recommendations_fire);
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_recommendation_text: true,
                        table_id: final_ids
                    },
                    success: function (data) {
                        $("#recommendation_text_rpt").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_rpt").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");
            }
        });

        function calculateTotalRPTValue(data_col_id) {
            var value_1 = $("#n_t_1_" + data_col_id).val();
            var value_2 = $("#n_t_2_" + data_col_id).val();
            var $total_rpt_value = $("#total_rpt_value_year_" + data_col_id);
            if (value_1 != "" && value_2 != "") {
                var total = parseFloat(value_1) + parseFloat(value_2);
                $total_rpt_value.val(total);
            }
            else {
                $total_rpt_value.val(0);
            }
        }

        $(".n_t_1,.n_t_2").keyup(function () {
            calculateTotalRPTValue($(this).attr('data-col-id'));
        });

        function calculateRPTPerTurnover(data_col_id) {
            var value_1 = $("#total_rpt_value_year_" + data_col_id).val();
            var value_2 = $("#turnover_company_" + data_col_id).val();
            var $rpt_per_turnover = $("#rpt_per_turnover_" + data_col_id);
            if (value_1 != "" && value_2 != "") {
                var total = ((parseFloat(value_1) / parseFloat(value_2)) * 100).toFixed(2);
                $rpt_per_turnover.val(total);
            }
            else {
                $rpt_per_turnover.val(0);
            }

            var net_profit = $("#net_profit_" + data_col_id).val();
            var $net_profit_per = $("#net_profit_per_" + data_col_id);
            if (value_2 != "" && net_profit != "") {
                var total = ((parseFloat(net_profit) / parseFloat(value_2)) * 100).toFixed(2);
                $net_profit_per.val(total);
            }
            else {
                $net_profit_per.val(0);
            }
        }

        $(".turnover_company").keyup(function () {
            calculateRPTPerTurnover($(this).attr('data-col-id'));
        });

        $(".year").change(function () {
            var $self = $(this);
            $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    company_profit_5_years: true,
                    financial_year_start: $self.val()
                },
                success: function (data) {
                    $(".net_profit").each(function(i,d) {
                        $(this).val(data[i].net_profit);
                    });
                }
            });
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
                    var resolution_name="related_part_transaction";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataOfRPT:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                    var triggers = data.triggers;
                                    $(".triggers").each(function(i,d) {
                                        var select = $(this);
                                        select.val(triggers[i]['triggers']);
                                        select.trigger('change');
                                    });
                                    var table1 = data.table1;
                                    $('.party_transaction').each(function(i,d){
                                        var row=$(this);
                                        row.find("td").eq(1).find("input").val(table1[i].details_of_disclosure);
                                    });
                                    var table2=data.table2;
                                    $('#year1').val(table2[0].value1);
                                    $('#year2').val(table2[0].value2);
                                    $('#year3').val(table2[0].value3);
                                    $('#year4').val(table2[0].value4);
                                    $('#year5').val(table2[0].value5);
                                    $(".table2").each(function(i,d) {
                                        i++;
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(table2[i].label_name);
                                        row.find("td").eq(1).find('input').val(table2[i].value1);
                                        row.find("td").eq(2).find('input').val(table2[i].value2);
                                        row.find("td").eq(3).find('input').val(table2[i].value3);
                                        row.find("td").eq(4).find('input').val(table2[i].value4);
                                        row.find("td").eq(5).find('input').val(table2[i].value5);
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