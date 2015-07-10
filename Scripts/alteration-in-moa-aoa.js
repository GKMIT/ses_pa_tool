function CustomJS() {

}

CustomJS.prototype = {
    initialization: function() {
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
        $("Div").find("textarea[name='used_in_text[]']").each(function(i,d){
            $(this).addClass('inline-editor');
        });
        var j=10;
        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });

        $("#is_the_proposed_name_consistent_with_the_company").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 64
                    },
                    success: function (data) {
                        $("#is_the_proposed_name_consistent_with_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_proposed_name_consistent_with_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_proposed_name_consistent_with_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_proposed_name_consistent_with_the_company_analysis_text").addClass('hidden');
            }
        });
        $("#company_making_CSR_contributions_despite_decline").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 52
                    },
                    success: function (data) {
                        $("#company_making_CSR_contributions_despite_decline_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_making_CSR_contributions_despite_decline_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_making_CSR_contributions_despite_decline_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_making_CSR_contributions_despite_decline_analysis_text").addClass('hidden');
            }
        });
        $("#company_spent_more_than_2_the_average_net_profits").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 53
                    },
                    success: function (data) {
                        $("#company_spent_more_than_2_the_average_net_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_spent_more_than_2_the_average_net_profits_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_spent_more_than_2_the_average_net_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_spent_more_than_2_the_average_net_profits_analysis_text").addClass('hidden');
            }
        });
        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 54
                    },
                    success: function (data) {
                        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text").addClass('hidden');
            }
        });
        $("#company_disclosed_the_exact_amount_of_contributions").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 55
                    },
                    success: function (data) {
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 56
                    },
                    success: function (data) {
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").addClass('hidden');
            }
        });
        $("#is_any_director_KMP_interested_in_the_recipients").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 57
                    },
                    success: function (data) {
                        $("#is_any_director_KMP_interested_in_the_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_any_director_KMP_interested_in_the_recipients_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_any_director_KMP_interested_in_the_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_any_director_KMP_interested_in_the_recipients_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_recipient_entity_part_of_the_promoter").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 58
                    },
                    success: function (data) {
                        $("#is_the_recipient_entity_part_of_the_promoter_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_recipient_entity_part_of_the_promoter_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_recipient_entity_part_of_the_promoter_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_recipient_entity_part_of_the_promoter_analysis_text").addClass('hidden');
            }
        });
        $("#would_the_change_in_name_result_in_loss").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 65
                    },
                    success: function (data) {
                        $("#would_the_change_in_name_result_in_loss_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#would_the_change_in_name_result_in_loss_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#would_the_change_in_name_result_in_loss_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#would_the_change_in_name_result_in_loss_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_names_sounding_similar_to_other_successful_companie").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 66
                    },
                    success: function (data) {
                        $("#does_the_names_sounding_similar_to_other_successful_companie_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_names_sounding_similar_to_other_successful_companie_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_names_sounding_similar_to_other_successful_companie_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_names_sounding_similar_to_other_successful_companie_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_name_aligned_with_the_objects_of_the_company").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 67
                    },
                    success: function (data) {
                        $("#is_the_name_aligned_with_the_objects_of_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_name_aligned_with_the_objects_of_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_names_sounding_similar_to_other_successful_companie_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_name_aligned_with_the_objects_of_the_company_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_taken_a_certification_from_the_registrar_of_companie").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 68
                    },
                    success: function (data) {
                        $("#has_the_company_taken_a_certification_from_the_registrar_of_companie_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_taken_a_certification_from_the_registrar_of_companie_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_taken_a_certification_from_the_registrar_of_companie_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_taken_a_certification_from_the_registrar_of_companie_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_changed_its_name_in_last_one_year").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 69
                    },
                    success: function (data) {
                        $("#has_the_company_changed_its_name_in_last_one_year_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_changed_its_name_in_last_one_year_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_changed_its_name_in_last_one_year_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_changed_its_name_in_last_one_year_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 70
                    },
                    success: function (data) {
                        $("#is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_suggested_name_in_compliance_with_SEBI_guidelines_on_the_same_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_specific_objective").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 71
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_specific_objective_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_specific_objective_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_specific_objective_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_disclosed_the_specific_objective_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_utilized_the_existing_authorized_capital").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 72
                    },
                    success: function (data) {
                        $("#has_the_company_utilized_the_existing_authorized_capital_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_utilized_the_existing_authorized_capital_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_utilized_the_existing_authorized_capital_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_utilized_the_existing_authorized_capital_analysis_text").addClass('hidden');
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
                    var resolution_name="alteration_moa_aoa";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofAlterationInMOA:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                        if(j!=checkbox.length) {
                                            var $checkboxobj = $(this);
                                            var checked=$(this).val();
                                            var saveCheck = checkbox[j]['checkbox'];
                                            if(checked==saveCheck) {
                                                $checkboxobj.attr('checked',true);
                                                $checkboxobj.parent().addClass('checked');
                                                $("#"+$checkboxobj.attr("hidden-id")).removeClass('hidden');
                                                j++;
                                            }
                                        }
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