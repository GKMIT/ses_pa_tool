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
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
            format:'dd-M-yyyy'
        });
        $('#add_new_row').click(function(){
            $clone_row=$('.table-row-copy').clone();
            $clone_row.removeClass('table-row-copy');
            $clone_row.find('button').removeClass('disabled');
            $clone_row.find('input').val("");
            $('.template-description').append($clone_row);
            deleteRow();
        });
        function deleteRow() {
            $('.delete-row').click(function(){
                $(this).closest('.template').remove();
            });
        }
        $("#is_the_percentage_of_free_float").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 86
                    },
                    success: function (data) {
                        $("#is_the_percentage_of_free_float_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_percentage_of_free_float_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_percentage_of_free_float_analysis_text textarea").html("");
                $("#is_the_percentage_of_free_float_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_issued_any_securitie").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 85
                    },
                    success: function (data) {
                        $("#has_the_company_issued_any_securitie_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_issued_any_securitie_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_issued_any_securitie_analysis_text textarea").html("");
                $("#has_the_company_issued_any_securitie_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_made_another_buy_back").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 84
                    },
                    success: function (data) {
                        $("#has_the_company_made_another_buy_back_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_made_another_buy_back_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_made_another_buy_back_analysis_text textarea").html("");
                $("#has_the_company_made_another_buy_back_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_ratio_of_the_aggregate_of_secured").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 83
                    },
                    success: function (data) {
                        $("#is_the_ratio_of_the_aggregate_of_secured_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_ratio_of_the_aggregate_of_secured_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_ratio_of_the_aggregate_of_secured_analysis_text textarea").html("");
                $("#is_the_ratio_of_the_aggregate_of_secured_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_size_of_the_buy_back_15").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 82
                    },
                    success: function (data) {
                        $("#is_the_size_of_the_buy_back_15_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_size_of_the_buy_back_15_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_size_of_the_buy_back_15_analysis_text textarea").html("");
                $("#is_the_size_of_the_buy_back_15_analysis_text").addClass('hidden');
            }
        });
        $("#is_this_resolution_an_enabling_resolution").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 87
                    },
                    success: function (data) {
                        $("#is_this_resolution_an_enabling_resolution_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_this_resolution_an_enabling_resolution_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_this_resolution_an_enabling_resolution_analysis_text textarea").html("");
                $("#is_this_resolution_an_enabling_resolution_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_detail").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 88
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_detail_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_detail_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_detail_analysis_text textarea").html("");
                $("#has_the_company_disclosed_detail_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_detail_of_borrowing").change(function () {

            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 89
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_detail_of_borrowing_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_detail_of_borrowing_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_detail_of_borrowing_analysis_text textarea").html("");
                $("#has_the_company_disclosed_detail_of_borrowing_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_assets_being_used_to_secure").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 90
                    },
                    success: function (data) {
                        $("#are_the_assets_being_used_to_secure_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_assets_being_used_to_secure_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_assets_being_used_to_secure_analysis_text textarea").html("");
                $("#are_the_assets_being_used_to_secure_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_assets_being_used_to_secure_borrowings").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 91
                    },
                    success: function (data) {
                        $("#are_the_assets_being_used_to_secure_borrowings_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_assets_being_used_to_secure_borrowings_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_assets_being_used_to_secure_borrowings_analysis_text textarea").html("");
                $("#are_the_assets_being_used_to_secure_borrowings_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_creation_of_charge").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 92
                    },
                    success: function (data) {
                        $("#is_the_creation_of_charge_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_creation_of_charge_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_creation_of_charge_analysis_text textarea").html("");
                $("#is_the_creation_of_charge_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_independent_fairness").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 93
                    },
                    success: function (data) {
                        $("#is_the_independent_fairness_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_independent_fairness_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_independent_fairness_analysis_text textarea").html("");
                $("#is_the_independent_fairness_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_a_rationale").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 94
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_a_rationale_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_a_rationale_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_a_rationale_analysis_text textarea").html("");
                $("#has_the_company_disclosed_a_rationale_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_fully_disclosed_the_assets").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 95
                    },
                    success: function (data) {
                        $("#has_the_company_fully_disclosed_the_assets_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_fully_disclosed_the_assets_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_fully_disclosed_the_assets_analysis_text textarea").html("");
                $("#has_the_company_fully_disclosed_the_assets_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_price").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 95
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_price_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_price_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_price_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_price_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_details_of_the_buyer").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 96
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_details_of_the_buyer_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_details_of_the_buyer_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_details_of_the_buyer_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_details_of_the_buyer_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_impact_of_sale").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 97
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_impact_of_sale_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_impact_of_sale_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_impact_of_sale_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_impact_of_sale_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_assets_undertaking").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 98
                    },
                    success: function (data) {
                        $("#are_the_assets_undertaking_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_assets_undertaking_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_assets_undertaking_analysis_text textarea").html("");
                $("#are_the_assets_undertaking_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 99
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_analysis_text textarea").html("");
                $("#has_the_company_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_has_high_cash_balance").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 73
                    },
                    success: function (data) {
                        $("#does_the_company_has_high_cash_balance_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_has_high_cash_balance_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_has_high_cash_balance_analysis_text textarea").html("");
                $("#does_the_company_has_high_cash_balance_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_amount_of_borrowing_not_consistent").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 74
                    },
                    success: function (data) {
                        $("#is_the_amount_of_borrowing_not_consistent_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_amount_of_borrowing_not_consistent_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_amount_of_borrowing_not_consistent_analysis_text textarea").html("");
                $("#is_the_amount_of_borrowing_not_consistent_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_defaulted_on_any_of_its_existing_debt_obligation").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 75
                    },
                    success: function (data) {
                        $("#has_the_company_defaulted_on_any_of_its_existing_debt_obligation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_defaulted_on_any_of_its_existing_debt_obligation_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_defaulted_on_any_of_its_existing_debt_obligation_analysis_text textarea").html("");
                $("#has_the_company_defaulted_on_any_of_its_existing_debt_obligation_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_undergone_a_debt_restructuring").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 76
                    },
                    success: function (data) {
                        $("#has_the_company_undergone_a_debt_restructuring_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_undergone_a_debt_restructuring_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_undergone_a_debt_restructuring_analysis_text textarea").html("");
                $("#has_the_company_undergone_a_debt_restructuring_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_a_sick_company").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 77
                    },
                    success: function (data) {
                        $("#is_the_company_a_sick_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_a_sick_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_a_sick_company_analysis_text textarea").html("");
                $("#is_the_company_a_sick_company_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_has_a_negative_net_worth").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 78
                    },
                    success: function (data) {
                        $("#does_the_company_has_a_negative_net_worth_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_has_a_negative_net_worth_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_undergone_a_debt_restructuring_analysis_text textarea").html("");
                $("#has_the_company_undergone_a_debt_restructuring_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_more_than_50").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 79
                    },
                    success: function (data) {
                        $("#is_the_company_more_than_50_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_more_than_50_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_more_than_50_analysis_text textarea").html("");
                $("#is_the_company_more_than_50_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_loans_given_to_related_parties").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 80
                    },
                    success: function (data) {
                        $("#are_the_loans_given_to_related_parties_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_loans_given_to_related_parties_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_loans_given_to_related_parties_analysis_text textarea").html("");
                $("#are_the_loans_given_to_related_parties_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_borrowing_limit_proposed").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 81
                    },
                    success: function (data) {
                        $("#is_the_borrowing_limit_proposed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_borrowing_limit_proposed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_borrowing_limit_proposed_analysis_text textarea").html("");
                $("#is_the_borrowing_limit_proposed_analysis_text").addClass('hidden');
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
                        $("#recommendation_text").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text").parent().find(".cke_textarea_inline").html("");
            }
        });
        $('#btn_recommendation_text_sale_of_assets').click(function(){
           var array_recommendations_fire = [];
           var table_id=0;
           $(".recommendations-fire-sales").each(function(i,data){
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
                       $("#recommendation_text_sale_of_assets").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                   }
               });
           }
            else {
               $("#recommendation_text_sale_of_assets").parent().find(".cke_textarea_inline").html("");
           }
       });
        $("#btn_recommendation_text_increase_in_borrowing_limits").click(function(){

            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-increase-in-borrowing-limits").each(function(i,data){
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
                        $("#recommendation_text_increase_in_borrowing_limits").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_increase_in_borrowing_limits").parent().find(".cke_textarea_inline").html("");
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
                    var resolution_name="corporate_action";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofCorporateAction:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                    var shareholding_pattern = data.shareholding_pattern;
                                    $(".shareholding-pattern").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(1).find('input').val(shareholding_pattern[i].qty);
                                        row.find("td").eq(2).find('input').val(shareholding_pattern[i].percent);
                                        row.find("td").eq(3).find('input').val(shareholding_pattern[i].qty);
                                        row.find("td").eq(4).find('input').val(shareholding_pattern[i].percent);
                                        row.find("td").eq(5).find('input').val(shareholding_pattern[i].qty);
                                        row.find("td").eq(6).find('input').val(shareholding_pattern[i].percent);
                                    });
                                    var borrowing_limits = data.borrowing_limits;
                                    if(borrowing_limits.length>1) {
                                        for($i=0;$i<borrowing_limits.length-1;$i++) {
                                            $('#add_new_row').trigger('click');
                                        }

                                    }
                                    $(".borrowing-limits").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('select').val(borrowing_limits[i].quater);
                                        row.find("td").eq(1).find('select').val(borrowing_limits[i].year);
                                        row.find("td").eq(2).find('input').val(borrowing_limits[i].existing);
                                        row.find("td").eq(3).find('input').val(borrowing_limits[i].unavailed);
                                        row.find("td").eq(4).find('input').val(borrowing_limits[i].proposed);
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