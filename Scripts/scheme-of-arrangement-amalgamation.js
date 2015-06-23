function CustomJS() {

}

CustomJS.prototype = {
    initialization: function() {
        $("textarea[name='analysis_text[]']").each(function(i,d) {
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

        $("textarea[name='used_in_text[]']").each(function(){
            $(this).addClass('other-text');
        });
        $("textarea[name='analysis_text[]']").each(function(){
            $(this).addClass('analysis-text');
        });
        $("textarea[name='recommendation_text[]']").each(function(){
            $(this).addClass('recommendation-text');
        });

        var context = this;
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
        $("#btn_add_dilution_row").click(function() {
            $cloned_row = $(".dilution-row-desciption .diluton-row").clone();
            $cloned_row.removeClass('diluton-row');
            $cloned_row.find('button').removeClass('disabled');
            $('.dilution-row-desciption').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRow();
            recall();
        });
        function deleteRow(){
            $(".btn-delete-dilution-row").click(function() {
                $(this).closest('.dilution-description-row').remove();
            });
        }
        deleteRow();
        function recall(){
            $(".pre_nos").keyup(function(){
                preSharesTotalQty();
                postSharesTotalQty();
            });
            $(".post_nos").keyup(function(){
                postSharesTotalQty();
                preSharesTotalQty();
            });
        }
        recall();
        preSharesTotalQty();
        function preSharesTotalQty() {
            var grand_total = 0;
            var grand_percent = 0;
            $('.pre_nos').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                    grand_percent +=(grand_total/grand_percent)*100;
                }
                else {
                    $('.total_nos').val(0);
                }
                $('.total_nos').val(grand_total);
                $('.total_percent').val(grand_percent);
                calculatePreSharesPercent(grand_total);
            });
        }
        postSharesTotalQty();
        function postSharesTotalQty() {
            var grand_total = 0;
            var grand_percent = 0;
            $('.post_nos').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                    grand_percent +=(grand_total/grand_percent)*100;
                }
                else {
                    $('.post_total_nos').val(0);
                }
                $('.post_total_nos').val(grand_total);
                $('.post_total_percent').val(grand_percent);
                calculatePostSharesPercent(grand_total);
            });
        }
        function calculatePreSharesPercent(grand_total) {
            $('.pre_nos').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row').find('.pre_percent').val(percent);
                    $('.total_percent').val('100');
                    //calculatePreTotalPercent();
                }
                else {
                    $(this).closest('.dilution-description-row').find('.pre_percent').val(0);
                    //calculatePreTotalPercent();
                }
            });
        }
        function calculatePostSharesPercent(grand_total) {
            $('.post_nos').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row').find('.post_percent').val(percent);
                    $('.post_total_percent').val('100');
                    //calculatePostTotalPercent();
                }
                else {
                    $(this).closest('.dilution-description-row').find('.post_percent').val(0);
                    //calculatePostTotalPercent();
                }
            });
        }
        $("#has_the_company_disclosed_a_certificate").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 100
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_a_certificate_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_a_certificate_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_a_certificate_analysis_text textarea").html("");
                $("#has_the_company_disclosed_a_certificate_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_impact_the_scheme").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 101
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_impact_the_scheme_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_impact_the_scheme_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_impact_the_scheme_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_impact_the_scheme_analysis_text").addClass('hidden');
            }
        });
        $("#is_any_class_of_shareholders_benefitted").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 102
                    },
                    success: function (data) {
                        $("#is_any_class_of_shareholders_benefitted_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_any_class_of_shareholders_benefitted_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_any_class_of_shareholders_benefitted_analysis_text textarea").html("");
                $("#is_any_class_of_shareholders_benefitted_analysis_text").addClass('hidden');
            }
        });
        $("#are_there_any_potential_conflict").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 103
                    },
                    success: function (data) {
                        $("#are_there_any_potential_conflict_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_there_any_potential_conflict_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_there_any_potential_conflict_analysis_text textarea").html("");
                $("#are_there_any_potential_conflict_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_scheme_fair_to_minority_shareholder").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 104
                    },
                    success: function (data) {
                        $("#is_the_scheme_fair_to_minority_shareholder_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_scheme_fair_to_minority_shareholder_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_scheme_fair_to_minority_shareholder_analysis_text textarea").html("");
                $("#is_the_scheme_fair_to_minority_shareholder_analysis_text").addClass('hidden');
            }
        });
        $("#are_there_any_governance_fairness").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 105
                    },
                    success: function (data) {
                        $("#are_there_any_governance_fairness_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_there_any_governance_fairness_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_there_any_governance_fairness_analysis_text textarea").html("");
                $("#are_there_any_governance_fairness_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_key_financial").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 106
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_key_financial_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_key_financial_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_key_financial_analysis_text textarea").html("");
                $("#has_the_company_disclosed_key_financial_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_proposed_demerger_a_measure_aimed_at_risk_isolation").change(function () {
            var self = $(this);
            if(self.val()=='no' ||self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 107
                    },
                    success: function (data) {
                        $("#is_the_proposed_demerger_a_measure_aimed_at_risk_isolation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_proposed_demerger_a_measure_aimed_at_risk_isolation_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_proposed_demerger_a_measure_aimed_at_risk_isolation_analysis_text textarea").html("");
                $("#is_the_proposed_demerger_a_measure_aimed_at_risk_isolation_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_proposed_demerger_a_measure_aimed").change(function () {
            var self = $(this);
            if(self.val()=='no' || self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 108
                    },
                    success: function (data) {
                        $("#is_the_proposed_demerger_a_measure_aimed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_proposed_demerger_a_measure_aimed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_proposed_demerger_a_measure_aimed_analysis_text textarea").html("");
                $("#is_the_proposed_demerger_a_measure_aimed_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_demerger_resulting_in_formation").change(function () {
            var self = $(this);
            if(self.val()=='no' || self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 109
                    },
                    success: function (data) {
                        $("#is_the_demerger_resulting_in_formation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_demerger_resulting_in_formation_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_demerger_resulting_in_formation_analysis_text textarea").html("");
                $("#is_the_demerger_resulting_in_formation_analysis_text").addClass('hidden');
            }
        });
        $("#are_exit_options_given_to_shareholder").change(function () {
            var self = $(this);
            if(self.val()=='no' || self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 110
                    },
                    success: function (data) {
                        $("#are_exit_options_given_to_shareholder_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_exit_options_given_to_shareholder_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_exit_options_given_to_shareholder_analysis_text textarea").html("");
                $("#are_exit_options_given_to_shareholder_analysis_text").addClass('hidden');
            }
        });
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
                    console.log(data);
                    var resolution_name="scheme_of_arrangement";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofSchemeOfArrangement:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                        text_area.parent().find(".cke_textarea_inline").html(other_text[i]['text']);

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

                                    var profiles_of_the_companies = data.profiles_of_the_companies;
                                    if(profiles_of_the_companies.length>1) {
                                        for($i=0;$i<profiles_of_the_companies.length-1;$i++) {
                                            $('#btn_add_dilution_row').trigger('click');
                                        }
                                    }
                                    $(".profile-of-the-company").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(profiles_of_the_companies[i].company_name);
                                        row.find("td").eq(1).find('input').val(profiles_of_the_companies[i].background);
                                        row.find("td").eq(2).find('input').val(profiles_of_the_companies[i].nature_of_bussiness);
                                        row.find("td").eq(3).find('input').val(profiles_of_the_companies[i].aurthorized_capital);
                                        row.find("td").eq(4).find('input').val(profiles_of_the_companies[i].issued_capital);
                                    });
                                    var share_holding = data.share_holding;
                                    $(".shareholding-pattern").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(1).find('input').val(share_holding[i].pre_nos);
                                        row.find("td").eq(2).find('input').val(share_holding[i].pre_percent);
                                        row.find("td").eq(3).find('input').val(share_holding[i].post_nos);
                                        row.find("td").eq(4).find('input').val(share_holding[i].post_percent);
                                    });
                                    var capital_structure=data.capital_structure;
                                    $('.pre_scheme1').val(capital_structure[0].pre_scheme);
                                    $('.pre_scheme2').val(capital_structure[1].pre_scheme);
                                    $('.pre_scheme3').val(capital_structure[2].pre_scheme);
                                    $('.pre_scheme4').val(capital_structure[3].pre_scheme);
                                    $('.post_scheme1').val(capital_structure[0].post_scheme);
                                    $('.post_scheme2').val(capital_structure[1].post_scheme);
                                    $('.post_scheme3').val(capital_structure[2].post_scheme);
                                    $('.post_scheme4').val(capital_structure[3].post_scheme);
                                    $.loader_remove();
                                },3000)

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