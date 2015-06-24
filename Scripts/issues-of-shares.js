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

        function calculatePreSharesPrecent(grand_total) {
            $('.qty1').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row').find('.qty1-percent').val(percent);
                }
                else {
                    $(this).closest('.dilution-description-row').find('.qty1-percent').val(0);
                }
            });
        }
        function calculatePostSharesPrecent(grand_total) {
            $('.qty2').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row').find('.qty2-percent').val(percent);
                }
                else {
                    $(this).closest('.dilution-description-row').find('.qty2-percent').val(0);
                }
            });
        }
        function postSharesTotalQty() {
            var grand_total = 0;
            $('.qty2').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                }
                else {
                    $('.total-qty2').val(0);
                }
                $('.total-qty2').val(grand_total);
                calculatePostSharesPrecent(grand_total);
            });
        }
        postSharesTotalQty();
        function preSharesTotalQty() {
            var grand_total = 0;
            $('.qty1').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                }
                else {
                    $('.total-qty1').val(0);
                }
                $('.total-qty1').val(grand_total);
                calculatePreSharesPrecent(grand_total);
            });
        }
        function recall() {
            $('.qty1').keyup(function(){
                preSharesTotalQty();
                postSharesTotalQty();
            });
            $('.qty2').keyup(function(){
                preSharesTotalQty();
                postSharesTotalQty();
            });
        }
        recall();
        preSharesTotalQty();
        $("#btn_add_more_row").click(function() {
            $cloned_row = $(".template .row-copy").clone();
            $cloned_row.removeClass('row-copy');
            $cloned_row.find('button').removeClass('disabled');
            $('.template').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRow();
        });
        function deleteRow(){
            $(".btn-delete-row").click(function() {
                $(this).closest('.description-row').remove();

            });
        }

        function calculatePreSharesPrecentSecurities(grand_total) {
            $('.qty1-securities').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row-securities').find('.qty1-percent-securities').val(percent);
                }
                else {
                    $(this).closest('.dilution-description-row-securities').find('.qty1-percent-securities').val(0);
                }
            });
        }
        function calculatePostSharesPrecentSecurities(grand_total) {
            $('.qty2-securities').each(function(i,data) {
                if($(this).val() !='') {
                    var qty=$(this).val()||0;
                    var percent=(parseFloat(qty/grand_total)*100).toFixed(2);
                    $(this).closest('.dilution-description-row-securities').find('.qty2-percent-securities').val(percent);
                }
                else {
                    $(this).closest('.dilution-description-row-securities').find('.qty2-percent-securities').val(0);
                }
            });
        }
        function postSharesTotalQtySecurities() {
            var grand_total = 0;
            $('.qty2-securities').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                }
                else {
                    $('.total-qty2-securities').val(0);
                }
                $('.total-qty2-securities').val(grand_total);
                calculatePostSharesPrecentSecurities(grand_total);
            });
        }
        postSharesTotalQtySecurities();
        function preSharesTotalQtySecurities() {
            var grand_total = 0;
            $('.qty1-securities').each(function (i, data) {
                if ($(this).val() != '') {
                    grand_total += parseFloat($(this).val()||0);
                }
                else {
                    $('.total-qty1-securities').val(0);
                }
                $('.total-qty1-securities').val(grand_total);
                calculatePreSharesPrecentSecurities(grand_total);
            });
        }
        function recallSecurities() {
            $('.qty1-securities').keyup(function(){
                preSharesTotalQtySecurities();
                postSharesTotalQtySecurities();
            });
            $('.qty2-securities').keyup(function(){
                preSharesTotalQtySecurities();
                postSharesTotalQtySecurities();
            });
        }
        recallSecurities();
        preSharesTotalQtySecurities();
        $("#btn_add_dilution_row1_securities").click(function() {
            $cloned_row = $(".dilution-row-desciption-securities .diluton-row-securities").clone();
            $cloned_row.removeClass('diluton-row-securities');
            $cloned_row.find('button').removeClass('disabled');
            $('.dilution-row-desciption-securities').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRowSecurities();
            recallSecurities();
        });
        function deleteRowSecurities(){
            $(".btn-delete-dilution-row-securities").click(function() {
                $(this).closest('.dilution-description-row-securities').remove();
                preSharesTotalQtySecurities();
                postSharesTotalQtySecurities();
            });
        }

        deleteRowSecurities();

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
                preSharesTotalQty();
                postSharesTotalQty();
            });
        }
        deleteRow();
        $("#is_the_dilution_to_public_shareholders_exceed").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 111
                    },
                    success: function (data) {
                        $("#is_the_dilution_to_public_shareholders_exceed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_dilution_to_public_shareholders_exceed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_dilution_to_public_shareholders_exceed_analysis_text textarea").html("");
                $("#is_the_dilution_to_public_shareholders_exceed_analysis_text").addClass('hidden');
            }
        });
        $("#are_warrants_issued_on_preferential_basis").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 112
                    },
                    success: function (data) {
                        $("#are_warrants_issued_on_preferential_basis_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_warrants_issued_on_preferential_basis_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_warrants_issued_on_preferential_basis_analysis_text textarea").html("");
                $("#are_warrants_issued_on_preferential_basis_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_securities_being_issued_to_a_strategic_investor").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 113
                    },
                    success: function (data) {
                        $("#are_the_securities_being_issued_to_a_strategic_investor_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_securities_being_issued_to_a_strategic_investor_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_securities_being_issued_to_a_strategic_investor_analysis_text textarea").html("");
                $("#are_the_securities_being_issued_to_a_strategic_investor_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_securities_being_issued_to_a_strategic").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 114
                    },
                    success: function (data) {
                        $("#are_the_securities_being_issued_to_a_strategic_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_securities_being_issued_to_a_strategic_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_securities_being_issued_to_a_strategic_analysis_text textarea").html("");
                $("#are_the_securities_being_issued_to_a_strategic_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_an_urgent").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 115
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_an_urgent_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_an_urgent_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_an_urgent_analysis_text textarea").html("");
                $("#has_the_company_disclosed_an_urgent_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_preferential_issue_of_equity_share").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 116
                    },
                    success: function (data) {
                        $("#is_the_preferential_issue_of_equity_share_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_preferential_issue_of_equity_share_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_preferential_issue_of_equity_share_analysis_text textarea").html("");
                $("#is_the_preferential_issue_of_equity_share_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_preferential_issue_of_equity").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 117
                    },
                    success: function (data) {
                        $("#is_the_preferential_issue_of_equity_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_preferential_issue_of_equity_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_preferential_issue_of_equity_analysis_text textarea").html("");
                $("#is_the_preferential_issue_of_equity_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_dilution_to_public_shareholder").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 118
                    },
                    success: function (data) {
                        $("#is_the_dilution_to_public_shareholder_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_dilution_to_public_shareholder_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_dilution_to_public_shareholder_analysis_text textarea").html("");
                $("#is_the_dilution_to_public_shareholder_analysis_text").addClass('hidden');
            }
        });
        $("#is_preferential_issue_made").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 119
                    },
                    success: function (data) {
                        $("#is_preferential_issue_made_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_preferential_issue_made_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_preferential_issue_made_analysis_text textarea").html("");
                $("#is_preferential_issue_made_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_preferential_issue").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-preferential-issue").each(function(i,data){
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
                        $("#recommendation_text_preferential_issue").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_preferential_issue").parent().find(".cke_textarea_inline").html("");
            }

        });
        $("#does_the_company_has_sufficient_free_reserves").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 120
                    },
                    success: function (data) {
                        $("#does_the_company_has_sufficient_free_reserves_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_has_sufficient_free_reserves_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_has_sufficient_free_reserves_analysis_text textarea").html("");
                $("#does_the_company_has_sufficient_free_reserves_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_issuing_shares_by_capitalizing").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 121
                    },
                    success: function (data) {
                        $("#is_the_company_issuing_shares_by_capitalizing_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_issuing_shares_by_capitalizing_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_issuing_shares_by_capitalizing_analysis_text textarea").html("");
                $("#is_the_company_issuing_shares_by_capitalizing_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_defaulted_in_payment_of_interest").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 122
                    },
                    success: function (data) {
                        $("#has_the_company_defaulted_in_payment_of_interest_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_defaulted_in_payment_of_interest_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_defaulted_in_payment_of_interest_analysis_text textarea").html("");
                $("#has_the_company_defaulted_in_payment_of_interest_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_undergone_debt_restructuring").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 123
                    },
                    success: function (data) {
                        $("#has_the_company_undergone_debt_restructuring_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_undergone_debt_restructuring_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_undergone_debt_restructuring_analysis_text textarea").html("");
                $("#has_the_company_undergone_debt_restructuring_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_defaulted_in_respect").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 124
                    },
                    success: function (data) {
                        $("#has_the_company_defaulted_in_respect_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_defaulted_in_respect_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_defaulted_in_respect_analysis_text textarea").html("");
                $("#has_the_company_defaulted_in_respect_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_not_paid_dividend").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 125
                    },
                    success: function (data) {
                        $("#has_the_company_not_paid_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_not_paid_dividend_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_not_paid_dividend_analysis_text textarea").html("");
                $("#has_the_company_not_paid_dividend_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_bonus_issue").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-bonus-issues").each(function(i,data){
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
                        $("#recommendation_text_bonus_issue").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_bonus_issue").parent().find(".cke_textarea_inline").html(data.recommendation_text);
            }
        });
        $("#is_the_size_of_the_issue_disclosed").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 126
                    },
                    success: function (data) {
                        $("#is_the_size_of_the_issue_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_size_of_the_issue_disclosed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_size_of_the_issue_disclosed_analysis_text textarea").html("");
                $("#is_the_size_of_the_issue_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#is_dilution_to_public_shareholders_exceeds").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 127
                    },
                    success: function (data) {
                        $("#is_dilution_to_public_shareholders_exceeds_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_dilution_to_public_shareholders_exceeds_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_dilution_to_public_shareholders_exceeds_analysis_text textarea").html("");
                $("#is_dilution_to_public_shareholders_exceeds_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_seeking_blanket_approval_for_issuance").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 128
                    },
                    success: function (data) {
                        $("#is_the_company_seeking_blanket_approval_for_issuance_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_seeking_blanket_approval_for_issuance_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_seeking_blanket_approval_for_issuance_analysis_text textarea").html("");
                $("#is_the_company_seeking_blanket_approval_for_issuance_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_proposing_to_issue_shares_though").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 129
                    },
                    success: function (data) {
                        $("#is_the_company_proposing_to_issue_shares_though_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_proposing_to_issue_shares_though_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_proposing_to_issue_shares_though_analysis_text textarea").html("");
                $("#is_the_company_proposing_to_issue_shares_though_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_company_has_provided_an_inadequate").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 130
                    },
                    success: function (data) {
                        $("#does_the_company_has_provided_an_inadequate_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_has_provided_an_inadequate_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_has_provided_an_inadequate_analysis_text textarea").html("");
                $("#does_the_company_has_provided_an_inadequate_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_seeking_blanket_approval_for_issuance_of_shares").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 165
                    },
                    success: function (data) {
                        $("#is_the_company_seeking_blanket_approval_for_issuance_of_shares_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_company_seeking_blanket_approval_for_issuance_of_shares_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_seeking_blanket_approval_for_issuance_of_shares_analysis_text textarea").html("");
                $("#is_the_company_seeking_blanket_approval_for_issuance_of_shares_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_issues_of_security").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-issues-of-security").each(function(i,data){
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
                        $("#recommendation_text_issues_of_security").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_issues_of_security").parent().find(".cke_textarea_inline").html(data.recommendation_text);
            }
        });
        $("#are_preference_shares_redeemable").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 131
                    },
                    success: function (data) {
                        $("#are_preference_shares_redeemable_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_preference_shares_redeemable_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_preference_shares_redeemable_analysis_text textarea").html("");
                $("#are_preference_shares_redeemable_analysis_text").addClass('hidden');
            }
        });
        $("#is_redemption_period_exceeds").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 132
                    },
                    success: function (data) {
                        $("#is_redemption_period_exceeds_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_redemption_period_exceeds_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_redemption_period_exceeds_analysis_text textarea").html("");
                $("#is_redemption_period_exceeds_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_defaulted").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 133
                    },
                    success: function (data) {
                        $("#has_the_company_defaulted_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_defaulted_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_defaulted_analysis_text textarea").html("");
                $("#has_the_company_defaulted_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_undergone").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 134
                    },
                    success: function (data) {
                        $("#has_the_company_undergone_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_undergone_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_undergone_analysis_text textarea").html("");
                $("#has_the_company_undergone_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_made_losses").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 135
                    },
                    success: function (data) {
                        $("#has_the_company_made_losses_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_made_losses_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_made_losses_analysis_text textarea").html("");
                $("#has_the_company_made_losses_analysis_text").addClass('hidden');
            }
        });
        $("#is_there_an_option_to_convert_preferential").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 136
                    },
                    success: function (data) {
                        $("#is_there_an_option_to_convert_preferential_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_there_an_option_to_convert_preferential_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_there_an_option_to_convert_preferential_analysis_text textarea").html("");
                $("#is_there_an_option_to_convert_preferential_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_issue_of_preference_shares").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-issue-of-preference-shares").each(function(i,data){
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
                        $("#recommendation_text_issue_of_preference_shares").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_issue_of_preference_shares").parent().find(".cke_textarea_inline").html(data.recommendation_text);
            }
        });
        $('#hide_row').click(function(){
            $('#row_text').toggle();
            if($(this).text()=="Hide") {
                $(this).text("Show");
            }
            else {
                $(this).text("Hide");
            }
        });

        $("#btn_add_past_equity_row").click(function() {
            $cloned_row = $(".past-equity-issues .past-equity-issues-row").clone();
            $cloned_row.removeClass('past-equity-issues-row');
            $cloned_row.find('button').removeClass('disabled');
            $('.past-equity-issues').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRowPastEquity();
        });
        function deleteRowPastEquity(){
            $(".btn-delete-past-equity-row").click(function() {
                $(this).closest('.past-eq-row').remove();
            });
        }
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
                success:function(data) {
                    var resolution_name="issues_of_shares";
                    if(data.status=="Existing") {
                        console.log(data);
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofIssuesOfShares:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                console.log(data);
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
                                    var past_equity = data.past_equity;
                                    if(past_equity.length>1) {
                                        for($i=0;$i<past_equity.length-1;$i++) {
                                            $('#btn_add_past_equity_row').trigger('click');
                                        }
                                    }

                                    $(".past-eq-row").each(function(i,d) {
                                        var self = $(this);
                                        self.find('.year').val(past_equity[i].year);
                                        self.find('.capital_raised').val(past_equity[i].capital_raised);
                                        self.find('.subscriber').val(past_equity[i].subscriber);
                                        self.find('.no_of_share').val(past_equity[i].no_of_shares);
                                        self.find('.issue_price').val(past_equity[i].issues_price);
                                    });

                                    var dilution_to_shareholding = data.dilution_to_shareholding;
                                    if(dilution_to_shareholding.length>1) {
                                        for($i=0;$i<dilution_to_shareholding.length-1;$i++) {
                                            $('#btn_add_dilution_row').trigger('click');
                                        }
                                    }
                                    $(".dilution-description-row").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(dilution_to_shareholding[i].sno);
                                        row.find("td").eq(1).find('input').val(dilution_to_shareholding[i].class_of_shareholder);
                                        row.find("td").eq(2).find('input').val(dilution_to_shareholding[i].pre_allotment_no_of_shares);
                                        row.find("td").eq(3).find('input').val(dilution_to_shareholding[i].pre_allotment_paid_up_capital);
                                        row.find("td").eq(4).find('input').val(dilution_to_shareholding[i].post_allotment_no_of_shares);
                                        row.find("td").eq(5).find('input').val(dilution_to_shareholding[i].post_allotment_paid_up_capital);
                                    });
                                    for($i=0;$i<dilution_to_shareholding.length;$i++) {
                                        $('.qty1').trigger('keyup');
                                        $('.qty2').trigger('keyup');
                                    }
                                    var dilution_to_shareholding_securities = data.dilution_to_shareholding_securities;
                                    if(dilution_to_shareholding_securities.length>1) {
                                        for($i=0;$i<dilution_to_shareholding_securities.length-1;$i++) {
                                            $('#btn_add_dilution_row1_securities').trigger('click');
                                        }
                                    }
                                    $(".dilution-description-row-securities").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(dilution_to_shareholding_securities[i].sno);
                                        row.find("td").eq(1).find('input').val(dilution_to_shareholding_securities[i].class_of_shareholder);
                                        row.find("td").eq(2).find('input').val(dilution_to_shareholding_securities[i].pre_nos);
                                        row.find("td").eq(3).find('input').val(dilution_to_shareholding_securities[i].pre_paid_up);
                                        row.find("td").eq(4).find('input').val(dilution_to_shareholding_securities[i].post_nos);
                                        row.find("td").eq(5).find('input').val(dilution_to_shareholding_securities[i].post_paid_up);
                                    });
                                    for($i=0;$i<dilution_to_shareholding_securities.length;$i++) {
                                        $('.qty1-securities').trigger('keyup');
                                        $('.qty2-securities').trigger('keyup');
                                    }
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