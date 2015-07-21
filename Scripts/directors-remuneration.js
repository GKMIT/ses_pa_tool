function CustomJS() {

}

CustomJS.prototype = {
    initialization: function() {

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
        $("#btn_add_dilution_row_past").click(function() {
            $cloned_row = $(".dilution-row-desciption_past .diluton-row").clone();
            $cloned_row.removeClass('diluton-row');
            $cloned_row.find('button').removeClass('disabled');
            $('.dilution-row-desciption_past').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRow();
            director_info();
            selectYear();
            //recall();
        });
        function deleteRow(){
            $(".btn-delete-dilution-row").click(function() {
                $(this).closest('.dilution-description-row').remove();
            });
        }
        deleteRow();
        $("#is_the_increase_in_renumeration").change(function(){
            var self = $(this);
            if(self.val()=="yes")
                $("#question1_part_a").removeClass('hidden');
            else
            {
                $("#question1_part_a").addClass('hidden');
                $("#has_the_company_provided_adequate_justification_analysis_text").addClass('hidden');
                $("#has_the_company_provided_adequate_justification").val("");
                $("#question1_part_b").addClass('hidden');
                $("#is_the_directors_excessive_compared_analysis_text").addClass('hidden');
                $("#is_the_directors_excessive_compared").val("");
            }
        });
        $("#has_the_company_provided_adequate_justification").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 180
                    },
                    success: function (data) {
                        $("#has_the_company_provided_adequate_justification_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_provided_adequate_justification_analysis_text").removeClass('hidden');
                        $("#question1_part_b").addClass('hidden');
                        $("#is_the_directors_excessive_compared_analysis_text").addClass('hidden');
                        $("#is_the_directors_excessive_compared").val("");
                    }
                });
            }
            if(self.val()=='no')
            {
                $("#question1_part_b").removeClass('hidden');
                $("#has_the_company_provided_adequate_justification_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_provided_adequate_justification_analysis_text").addClass('hidden');
                $("#is_the_directors_excessive_compared").val("");

            }
            else {
                $("#has_the_company_provided_adequate_justification_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_provided_adequate_justification_analysis_text").addClass('hidden');
                $("#question1_part_b").addClass('hidden');
                $("#is_the_directors_excessive_compared").val("");
                $("#is_the_directors_excessive_compared_analysis_text").addClass('hidden');
                $("#is_the_directors_excessive_compared").val("");
            }
        });
        $("#is_the_directors_excessive_compared").change(function(){
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 181
                    },
                    success: function (data) {
                        $("#is_the_directors_excessive_compared_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_directors_excessive_compared_analysis_text").removeClass('hidden');
                    }
                });
            }
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 182
                    },
                    success: function (data) {
                        $("#is_the_directors_excessive_compared_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_directors_excessive_compared_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_directors_excessive_compared_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_directors_excessive_compared_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_increase_in_renumeration_more_than_50").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 183
                    },
                    success: function (data) {
                        $("#is_the_increase_in_renumeration_more_than_50_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_increase_in_renumeration_more_than_50_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_increase_in_renumeration_more_than_50_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_increase_in_renumeration_more_than_50_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_renumeration_paid_to_the_executive").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 184
                    },
                    success: function (data) {
                        $("#is_the_renumeration_paid_to_the_executive_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_renumeration_paid_to_the_executive_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_renumeration_paid_to_the_executive_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_renumeration_paid_to_the_executive_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_have_a_nomination").change(function(){
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 185
                    },
                    success: function (data) {
                        $("#does_the_company_have_a_nomination_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_have_a_nomination_analysis_text").removeClass('hidden');
                        $("#question4_part_a").addClass('hidden');
                        $("#is_the_nomination_and_remuneration_committee_analysis_text").addClass('hidden');
                        $("#is_the_nomination_and_remuneration_committee").val("");
                    }
                });
            }
            if(self.val()=="yes"){
                $("#question4_part_a").removeClass('hidden');
                $("#does_the_company_have_a_nomination_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_company_have_a_nomination_analysis_text").addClass('hidden');
            }
            else {
                $("#does_the_company_have_a_nomination_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_company_have_a_nomination_analysis_text").addClass('hidden');
                $("#question4_part_a").addClass('hidden');
                $("#is_the_nomination_and_remuneration_committee_analysis_text").addClass('hidden');
                $("#is_the_nomination_and_remuneration_committee").val("");
            }
        });
        $("#is_the_nomination_and_remuneration_committee").change(function(){
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 186
                    },
                    success: function (data) {
                        $("#is_the_nomination_and_remuneration_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_nomination_and_remuneration_committee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_nomination_and_remuneration_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_nomination_and_remuneration_committee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_concerned_executive_director_a_member").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 187
                    },
                    success: function (data) {
                        $("#is_the_concerned_executive_director_a_member_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_concerned_executive_director_a_member_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_concerned_executive_director_a_member_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_concerned_executive_director_a_member_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_resolution_grants_the_board_discretion").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 188
                    },
                    success: function (data) {
                        $("#is_the_resolution_grants_the_board_discretion_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_resolution_grants_the_board_discretion_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_resolution_grants_the_board_discretion_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_resolution_grants_the_board_discretion_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_remuneration_package_have_any_performance").change(function(){
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 189
                    },
                    success: function (data) {
                        $("#does_the_remuneration_package_have_any_performance_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_remuneration_package_have_any_performance_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_remuneration_package_have_any_performance_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_remuneration_package_have_any_performance_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_average_attendance_of_director_at_board").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 190
                    },
                    success: function (data) {
                        $("#is_the_average_attendance_of_director_at_board_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_average_attendance_of_director_at_board_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_average_attendance_of_director_at_board_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_average_attendance_of_director_at_board_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_remuneration_components_payable").change(function(){
            var self = $(this);
            if(self.val() == "no")
            {
                $("#question9_part_a").removeClass('hidden');

            }
            else{
                $("#question9_part_a").addClass('hidden');
                $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text").addClass('hidden');
                $("#is_there_an_overall_cap_on_the_remuneration_package").val("");
            }
        });
        $("#is_there_an_overall_cap_on_the_remuneration_package").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 191
                    },
                    success: function (data) {
                        $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text").removeClass('hidden');
                    }
                });
            }
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 192
                    },
                    success: function (data) {
                        $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_there_an_overall_cap_on_the_remuneration_package_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_remuneration_components_payable_to_the_director_disclosed").change(function(){
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 193
                    },
                    success: function (data) {
                        $("#are_the_remuneration_components_payable_to_the_director_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_remuneration_components_payable_to_the_director_disclosed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_remuneration_components_payable_to_the_director_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#are_the_remuneration_components_payable_to_the_director_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_made_incremental_losses").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 194
                    },
                    success: function (data) {
                        $("#does_the_company_made_incremental_losses_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_made_incremental_losses_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_made_incremental_losses_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_company_made_incremental_losses_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_defaulted_on_any_of_its_debt").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 195
                    },
                    success: function (data) {
                        $("#has_the_company_defaulted_on_any_of_its_debt_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_defaulted_on_any_of_its_debt_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_defaulted_on_any_of_its_debt_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_defaulted_on_any_of_its_debt_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_minimum_remuneration_payable_includes_variable_pay").change(function(){
            var self = $(this);
            if(self.val() == 'yes'){
                $("#question13_part_a").removeClass('hidden');
            }
            else{
                $("#question13_part_a").addClass('hidden');
                $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text").addClass('hidden');
                $("#has_the_company_disclosed_whether_the_minimum_remuneration").val("");
            }
        });
        $("#has_the_company_disclosed_whether_the_minimum_remuneration").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 196
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 197
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_disclosed_whether_the_minimum_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#will_the_director_receive_guaranteed_bonus").change(function(){
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 198
                    },
                    success: function (data) {
                        $("#will_the_director_receive_guaranteed_bonus_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#will_the_director_receive_guaranteed_bonus_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#will_the_director_receive_guaranteed_bonus_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#will_the_director_receive_guaranteed_bonus_analysis_text").addClass('hidden');
            }
        });
        $("#total_commission_0").change(function(){
            var first_year = parseInt($(this).val());
            $(".total_commission").each(function(index) {
                $(this).val(first_year);
                first_year--;
            });
        });
        $("#btn_recommendation_text_revision_in_executive").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-revision-in-executive").each(function(i,data){
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
                        console.log(data);
                        $("#recommendation_text_revision_in_executive").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_revision_in_executive").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");;
            }
        });
        $('#btn_add_row').click(function(){
            $cloned_row=$('.description-row.template').clone();
            $cloned_row.removeClass('template');
            $cloned_row.find('button').removeClass('disabled');
            $cloned_row.removeClass('hidden');
            $('.add_row_template').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRow1();
            totalCommisionTrigger();
        });
        function deleteRow1() {
            $('.btn-delete-row').click(function(){
                $(this).closest('.description-row').remove();
            });
        }
        $("#has_the_company_disclosed_the_objective_remuneration").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 167
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_placed_an_absolute_cap_on_commission").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 166
                    },
                    success: function (data) {
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_commission_plus_sitting_fee").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 168
                    },
                    success: function (data) {
                        $("#does_the_commission_plus_sitting_fee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_commission_plus_sitting_fee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_commission_plus_sitting_fee_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_commission_plus_sitting_fee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_in_excess").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 169
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_in_excess_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_commission_paid_in_excess_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_in_excess_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_commission_paid_in_excess_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_to_individual_directors").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 170
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_to_individual_directors_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_commission_paid_to_individual_directors_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_to_individual_directors_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_commission_paid_to_individual_directors_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_to_select_directors").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 171
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_to_select_directors_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_commission_paid_to_select_directors_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_to_select_directors_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_commission_paid_to_select_directors_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_nomination_and_remuneration").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 172
                    },
                    success: function (data) {
                        $("#is_the_nomination_and_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_nomination_and_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_nomination_and_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_nomination_and_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_distribution_of_commission").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 173
                    },
                    success: function (data) {
                        $("#is_the_distribution_of_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_distribution_of_commission_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_distribution_of_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_distribution_of_commission_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_seeking_shareholders").change(function () {
            var self = $(this);

            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 174
                    },
                    success: function (data) {
                        $("#is_the_company_seeking_shareholders_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_seeking_shareholders_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_seeking_shareholders_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_company_seeking_shareholders_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_paid_disproportionate_commission").change(function () {
            var self = $(this);
            var one_qus = $('#has_the_company_placed_an_absolute_cap_on_commission').val();
            var second_qus = $('#has_the_company_disclosed_the_objective_remuneration').val();
            if (self.val() == 'no' && one_qus == 'yes' && second_qus == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 175
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","118");

                    }
                });
            }
            else if (self.val() == 'no' && one_qus == 'no' && second_qus == 'no') {

                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 176
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","119");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").addClass('hidden');
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").addClass('hidden');
                        $("#has_the_company_placed_an_absolute_cap_on_commission").find("option").eq(2).removeAttr("data-recommendation-table-id");
                        $("#has_the_company_disclosed_the_objective_remuneration").find("option").eq(2).removeAttr("data-recommendation-table-id");
                    }
                });
            }
            else if (self.val() == 'no' && one_qus == 'no' && second_qus == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 177
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","120");
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").addClass('hidden');
                        $("#has_the_company_placed_an_absolute_cap_on_commission").find("option").eq(2).removeAttr("data-recommendation-table-id");
                    }
                });
            }
            else if (self.val() == 'no' && one_qus == 'yes' && second_qus == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 178
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","121");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").addClass('hidden');
                        $("#has_the_company_disclosed_the_objective_remuneration").find("option").eq(2).removeAttr("data-recommendation-table-id");
                        //$("#has_the_company_disclosed_the_objective_remuneration_analysis_text").find("option").eq(1).removeAttr("data-recommendation-table-id");
                    }
                });
            }
            else if (self.val() == 'yes' && one_qus == 'no' && second_qus == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 179
                    },
                    success: function (data) {
                        console.log(data);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id_yes').attr("data-recommendation-table-id","122");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").addClass('hidden');
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").addClass('hidden');
                        $("#has_the_company_placed_an_absolute_cap_on_commission").find("option").eq(2).removeAttr("data-recommendation-table-id");
                        $("#has_the_company_disclosed_the_objective_remuneration").find("option").eq(2).removeAttr("data-recommendation-table-id");
                    }
                });
            }
            else {
                $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_company_paid_disproportionate_commission_analysis_text").addClass('hidden');

            }
        });
        $("#btn_recommendation_text").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire").each(function(i,data){
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
                        console.log(data);
                        $("#recommendation_text").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");
            }
        });

        function calculateCommission() {
            var array_total_commission = [];
            $(".total_commission").each(function(i,data){
                var commission = $(this);
                if(commission.val()!="") {
                    array_total_commission.push({"year":commission.val()});
                }
            });
            if(array_total_commission.length>0) {
                var final_commission = JSON.stringify(array_total_commission);
                console.log(final_commission);
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{TotalCommission:1,Year:final_commission},
                    error: function(data) {
                        console.log(data);
                    },
                    success:function(data) {
                        console.log(data);
                        $(".description-row .total_commission_value").each(function(i,d) {
                            $(this).val(data[i].total);
                        });
                    }
                });
            }
        }
        totalCommisionTrigger();
        function totalCommisionTrigger () {
            $('.total_commission').change(function(){
                calculateCommission();
            });
        }
        calculateCommission();

        function selectYear(){
            $("#remuneration_years,.din_numbers").change(function(){
                director_info();
            });
        }
        selectYear();
        director_info();
        function director_info() {
            var array_din_numbers = [];
            $(".din_numbers").each(function(i,data){
                var din_no = $(this);
                if(din_no.val()!="") {
                    array_din_numbers.push({"din_no":din_no.val()});
                }
            });
            if(array_din_numbers.length>0) {
                var final_dins = JSON.stringify(array_din_numbers);
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        remuneration_analysis_3_years:true,
                        first_year:$("#remuneration_years").val(),
                        din_nos:final_dins
                    },
                    success: function(data) {
                        console.log(data);
                        var total_pay = 0;
                        $("#rem_second_year").val($("#remuneration_years").val()-1);
                        $("#rem_third_year").val($("#remuneration_years").val()-2);
                        var no_directors = data.length;
                        for(var i=0;i<no_directors;i++) {
                            $("#remuneration_table_body tr").eq(i).find("td").eq(1).find("input").val(data[i].first_year_fixed_pay);
                            if(data[i].first_year_fixed_pay!="NA" && data[i].first_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].first_year_fixed_pay)+parseFloat(data[i].first_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(2).find("input").val(total_pay);
                            $("#remuneration_table_body tr").eq(i).find("td").eq(3).find("input").val(data[i].second_year_fixed_pay);
                            if(data[i].second_year_fixed_pay!="NA" && data[i].second_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].second_year_fixed_pay)+parseFloat(data[i].second_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(4).find("input").val(total_pay);
                            $("#remuneration_table_body tr").eq(i).find("td").eq(5).find("input").val(data[i].third_year_fixed_pay);
                            if(data[i].third_year_fixed_pay!="NA" && data[i].third_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].third_year_fixed_pay)+parseFloat(data[i].third_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(6).find("input").val(total_pay);
                        }
                    }
                });
            }
        }
        function calculateRatio() {
            var remuneration1=$('.remuneration1').val();
            var remuneration2=$('.remuneration2').val();
            var netprofit1=$('.netprofit1').val();
            var netprofit2=$('.netprofit2').val();
             var ratio1=0;
             var ratio2=0;
            if(netprofit1==0) {
                ratio1="-";
            }
            else {
                ratio1=parseFloat(remuneration1/netprofit1).toFixed(2);
            }


            if(ratio1>0) {
                $('.ratio1').val(ratio1);
            }
            else if(ratio1<0) {
                $('.ratio1').val('-');
            }
            else {
                $('.ratio1').val(0);
            }

            if(netprofit2==0) {
                ratio2="-";
            }
            else {
                var ratio2=parseFloat(remuneration2/netprofit2).toFixed(2);
            }

            if(ratio2>0) {
                $('.ratio2').val(ratio2);
            }
            else if(ratio2<0) {
                $('.ratio2').val('-');
            }
            else {
                $('.ratio2').val(0);
            }
        }
        calculateRatio();
        callingRatio();
        function callingRatio(){
            $('.remuneration1,.remuneration2,.netprofit1,.netprofit2').keyup(function(){
                calculateRatio();
            });
        }
        $.ajax({
            url:'jquery-data.php',
            type:'GET',
            dataType:'JSON',
            data:{DirectorsInfo:1},
            success:function(data){
                var total_director=data.length;
                $('.director1').append("<option value=''>Select Director</option>");
                for(var i=0;i<total_director;i++) {
                    $('.din_numbers').append("<option value='"+data[i].dir_din_no+"'>"+data[i].dir_name+"</option>");
                    $('.director1').append("<option value='"+data[i].dir_din_no+"'>"+data[i].dir_name+"</option>");
                }
            }
        });
        $.ajax({
            url:'jquery-data.php',
            type:'GET',
            dataType:'JSON',
            data:{DirectorsPeerInfo:1},
            success:function(data){
                $(".company2").append("<option value=''>Select Peer</option>");
                $(".company2").append("<option value='"+data.peer_1_company_name+"'>"+data.peer_1_company_name+"</option>");
                $(".company2").append("<option value='"+data.peer_2_company_name+"'>"+data.peer_2_company_name+"</option>");
                $('.company1').val(data.company_name);
            }
        });

        $.ajax({
            url:'jquery-data.php',
            type:'GET',
            dataType:'JSON',
            data:{DirectorsCommission:1},
            beforeSend: function() {
                console.log("ass");
            },
            error: function(data) {
                console.log(data);
            },
            success:function(data){
                $('.nedp-avg').val(parseFloat(data.avg_nedp).toFixed(2));
                $('.ID-avg').val(parseFloat(data.avg_id).toFixed(2));
                $('.NED-avg').val(parseFloat(data.avg_ned).toFixed(2));
            }
        });

        $("#indexed_tsr_year_start_year").change(function () {
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    dividend_data_6_years:true,
                    first_year:$("#indexed_tsr_year_start_year").val(),
                    highest_paid_ed : $(".din_numbers").find("option").eq(1).val()
                },
                success: function(data) {
                    console.log(data);
                    var indexed_tsr = 0;
                    for(var i= 5,j=0;i>=0;i--,j++) {

                        $("#remuneration_growth tr").eq(j).find("td").eq(0).find("input").val(data.remuneration_growth[i].year);
                        $("#remuneration_growth tr").eq(j).find("td").eq(1).find("input").val(data.remuneration_growth[i].total_pay);
                        if(data.remuneration_growth[i].indexed_tsr==null)
                            indexed_tsr = 0;
                        else
                            indexed_tsr = data.remuneration_growth[i].indexed_tsr;
                        $("#remuneration_growth tr").eq(j).find("td").eq(2).find("input").val(indexed_tsr.toFixed(2));
                        $("#remuneration_growth tr").eq(j).find("td").eq(3).find("input").val(data.net_profits[i].net_profit);
                    }
                }
            });
        });

        $(".director1").change(function() {
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                beforeSend: function() {

                },
                data:{
                    executive_remuneration: true,
                    dir_din_no : $(".director1").val()
                },
                success: function(data) {
                    $(".promotor1").val(data.company_promoter);
                    $(".remuneration1").val(data.remuneration);
                    $(".netprofit1").val(data.company_net_profit);
                    $(".ratio1").val(parseFloat(data.company_rem_per).toFixed(2));
                }
            });
        });

        $(".company2").change(function() {
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                beforeSend: function() {
                },
                data:{
                    peer_executive_remuneration: true,
                    company_name : $(".company2").val()
                },
                success: function(data) {
                    $(".director2").val(data.director_name);
                    $(".promotor2").val(data.promoter_group);
                    $(".remuneration2").val(data.remuneration);
                    $(".netprofit2").val(data.net_profits);
                    $(".ratio2").val(parseFloat(data.rem_percentage).toFixed(2));
                }
            });
        });

    },
    pageload:function(){
        $(document).ready(function() {
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
                    var resolution_name="director_remuneration";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofDirectorsRemuneration:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                    var past_remuneration = data.past_remuneration;
                                    $('#remuneration_years').val(past_remuneration[0].current_year);
                                    $('#rem_second_year').val(past_remuneration[0].prev_year1);
                                    $('#rem_third_year').val(past_remuneration[0].prev_year2);
                                    if(past_remuneration.length>1) {
                                        for($i=0;$i<past_remuneration.length-1;$i++) {
                                            $('#btn_add_dilution_row_past').trigger('click');
                                        }
                                    }
                                    $(".dilution-description-row").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('select').val(past_remuneration[i].executive_director);
                                        row.find("td").eq(1).find('input').val(past_remuneration[i].year1_fixed);
                                        row.find("td").eq(2).find('input').val(past_remuneration[i].year1_total);
                                        row.find("td").eq(3).find('input').val(past_remuneration[i].year2_fixed);
                                        row.find("td").eq(4).find('input').val(past_remuneration[i].year2_total);
                                        row.find("td").eq(5).find('input').val(past_remuneration[i].year3_fixed);
                                        row.find("td").eq(6).find('input').val(past_remuneration[i].year3_total);
                                    });
                                    var peer_comparsion = data.peer_comparsion;
                                    $('.director1').val(peer_comparsion[0].peer1);
                                    $('.director2').val(peer_comparsion[0].peer2);
                                    $('.company1').val(peer_comparsion[1].peer1);
                                    $('.company2').val(peer_comparsion[1].peer2);
                                    $('.promotor1').val(peer_comparsion[2].peer1);
                                    $('.promotor1').val(peer_comparsion[2].peer2);
                                    $('.remuneration1').val(peer_comparsion[3].peer1);
                                    $('.remuneration2').val(peer_comparsion[3].peer2);
                                    $('.netprofit1').val(peer_comparsion[4].peer1);
                                    $('.netprofit2').val(peer_comparsion[4].peer2);

                                    var remuneration_package=data.remuneration_package;
                                    $('.proposed_salary').val(remuneration_package[0].proposed_salary);
                                    $('.increase_in_remuneration').val(remuneration_package[0].increase_in_remuneration);
                                    $('.annual_increment').val(remuneration_package[0].annual_increment);
                                    $('.all_perquisites').val(remuneration_package[0].all_perquisites);
                                    $('.can_placed_perquisites').val(remuneration_package[0].can_placed_perquisites);
                                    $('.total_allowance').val(remuneration_package[0].total_allowances);
                                    $('.variable_pay').val(remuneration_package[0].variable_pay);
                                    $('.performance_criteria').val(remuneration_package[0].performance_criteria);
                                    $('.can_placed_on_variable').val(remuneration_package[0].can_placed_on_variable);
                                    $('.notice_period_month').val(remuneration_package[0].notice_period_month);
                                    $('.notice_period_comments').val(remuneration_package[0].notice_period_comment);
                                    $('.severance_pay_months').val(remuneration_package[0].severance_pay_months);
                                    $('.severance_pay_comments').val(remuneration_package[0].severance_pay_comment);
                                    $('.minimum_remuneration').val(remuneration_package[0].minimum_remuneration);
                                    $('.within_limits').val(remuneration_package[0].within_limits);
                                    $('.includes_variable').val(remuneration_package[0].includes_variable);
                                    var ed_remuneration=data.ed_remuneration;
                                    $('.ed_remuneration').each(function(i,d){
                                        var row=$(this);
                                        row.find('.ex_rem_years').val(ed_remuneration[i].ex_rem_years);
                                        row.find("td").eq(1).find("input").val(ed_remuneration[i].ed_remuneration);
                                        row.find("td").eq(2).find("input").val(ed_remuneration[i].indexed_tsr);
                                        row.find("td").eq(3).find("input").val(ed_remuneration[i].net_profit);
                                    });
                                    var totalcommission=data.totalcommission;
                                    $('.total_commission').each(function(i,d){
                                        var commision_year=$(this);
                                        commision_year.val(totalcommission[i].year);
                                        commision_year.closest('.description-row').find('.total_commission_value').val(totalcommission[i].value);
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