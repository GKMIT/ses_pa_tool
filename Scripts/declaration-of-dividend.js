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

        var context  = this;
        $('#divident_info_year_1').change(function() {
            var year=parseInt($(this).val());
            var $self = $(this);
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    company_dividend_info:true,
                    financial_year:year
                },
                success: function(data) {
                    if(data.count==1) {
                        $self.closest(".company-dividend-info").find(".dividend").val(data.dividend);
                        $self.closest(".company-dividend-info").find(".eps").val(data.eps);
                        var payout = ((data.dividend*1.1623)/data.eps);
                        $self.closest(".company-dividend-info").find(".payout").val(payout.toFixed(2));
                    }
                    else {
                        $(".company-dividend-info input").val("");
                    }
                }
            });
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    company_dividend_info:true,
                    financial_year:year-1
                },
                success: function(data) {
                    if(data.count==1) {
                        $(".company-dividend-info-2").find(".year").val(year-1);
                        $(".company-dividend-info-2").find(".dividend").val(data.dividend);
                        $(".company-dividend-info-2").find(".eps").val(data.eps);
                        var payout = ((data.dividend*1.1623)/data.eps);
                        $(".company-dividend-info-2").find(".payout").val(payout.toFixed(2));
                    }
                    else {
                        $(".company-dividend-info-2 input").val("");
                    }
                }
            });
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    company_dividend_info:true,
                    financial_year:year-2
                },
                success: function(data) {
                    if(data.count==1) {
                        $(".company-dividend-info-3").find(".year").val(year-2);
                        $(".company-dividend-info-3").find(".dividend").val(data.dividend);
                        $(".company-dividend-info-3").find(".eps").val(data.eps);
                        var payout = ((data.dividend*1.1623)/data.eps);
                        $(".company-dividend-info-3").find(".payout").val(payout.toFixed(2));
                    }
                    else {
                        $(".company-dividend-info-3 input").val("");
                    }
                }
            });
        });
        $('#divident_info_year_1').trigger('change');
        $(".dividend-years").change(function() {
            var year=parseInt($(this).val());
            var $self = $(this);
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    company_dividend_info:true,
                    company_id:$self.attr('data-company-id'),
                    financial_year:year
                },
                success: function(data) {
                    if(data.count==1) {
                        $self.closest(".company-dividend-row").find(".dividend").val(data.dividend);
                        $self.closest(".company-dividend-row").find(".eps").val(data.eps);
                        var payout = ((data.dividend*1.1623)/data.eps);
                        $self.closest(".company-dividend-row").find(".payout").val(payout.toFixed(2));
                    }
                    else {
                        $self.closest(".company-dividend-row input").val("");
                    }
                }
            });
        });
        $(".question-block .quest").change(function() {
            var trigger_value = $(this).attr("data-trigger-value");
            var question_block = $(this).closest(".question-block");
            if(trigger_value==$(this).val()) {
                question_block.find(".quest_hidden_block").removeClass('hidden');
            }
            else {
                question_block.find(".quest_hidden_block").addClass('hidden');
                question_block.find(".quest_analysis_text").addClass('hidden');
                question_block.find(".quest_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $(".question-block .quest_analysis_fire").change(function() {
            var table_id = $(this).find('option:selected').attr('data-table-id');
            var question_block = $(this).closest(".question-block");
            if($(this).val()=='yes' && table_id!="") {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        question_block.find(".quest_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
                question_block.find(".quest_analysis_text").removeClass('hidden');
            }
            else if($(this).val()=='no' && table_id!="") {
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        question_block.find(".quest_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
                question_block.find(".quest_analysis_text").removeClass('hidden');
            }
            else {
                question_block.find(".quest_analysis_text").addClass('hidden');
                question_block.find(".quest_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_have_stated_dividend_pay_out_policy").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $("#company_have_stated_dividend_pay_out_policy_hidden_a").removeClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_c").addClass('hidden');
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_d").addClass('hidden');
                $("#has_the_Company_explained_the_deviation_analysis_text").addClass('hidden');
            }
            else if(self.val()=='no') {
                $("#company_have_stated_dividend_pay_out_policy_hidden_a").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_c").removeClass('hidden');
                $("#dividend_paid_consistent_stated_policy_analysis_text").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_b").addClass('hidden');
                $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');
            }
            else{
                $("#company_have_stated_dividend_pay_out_policy_hidden_a").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_c").addClass('hidden');
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_b").addClass('hidden');
                $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_d").addClass('hidden');
                $("#has_the_Company_explained_the_deviation_analysis_text").addClass('hidden');
                $("#dividend_paid_consistent_stated_policy_analysis_text").addClass('hidden');
            }
        });
        $("#dividend_paid_consistent_stated_policy").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 28;

                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#dividend_paid_consistent_stated_policy_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#dividend_paid_consistent_stated_policy_analysis_text").removeClass('hidden');
                        $("#company_have_stated_dividend_pay_out_policy_hidden_b").addClass('hidden');
                        $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');

                    }
                });
            }
            else {
                $("#company_have_stated_dividend_pay_out_policy_hidden_b").removeClass('hidden');
                $("#dividend_paid_consistent_stated_policy_analysis_text textarea").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");
                $("#dividend_paid_consistent_stated_policy_analysis_text").addClass('hidden');
            }
        });
        $("#dividend_pay_out_been_consistent_last_3_years").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 50;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#dividend_pay_out_been_consistent_last_3_years_analysis_text").removeClass('hidden');
                        $("#dividend_pay_out_been_consistent_last_3_years_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');
                    }
                });
            }
            else {
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text").addClass('hidden');
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text textarea").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");
                $("#company_have_stated_dividend_pay_out_policy_hidden_d").removeClass('hidden');
            }
        });
        $("#company_explained_deviation_to_shareholders").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 29;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_explained_deviation_to_shareholders_analysis_text").removeClass('hidden');
                        $("#company_explained_deviation_to_shareholders_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else if(self.val()=='no') {
                var table_id = 30;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_explained_deviation_to_shareholders_analysis_text").removeClass('hidden');
                        $("#company_explained_deviation_to_shareholders_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else {
                $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');
                $("#company_explained_deviation_to_shareholders_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_making_losses_but_paying_increasing_dividend").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 31;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_making_losses_but_paying_increasing_dividend_analysis_text").removeClass('hidden');
                        $("#company_making_losses_but_paying_increasing_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_making_losses_but_paying_increasing_dividend_analysis_text").addClass('hidden');
                $("#company_making_losses_but_paying_increasing_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_have_high_debt_equity_debt_coverage_ratio").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 32;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text").removeClass('hidden');
                        $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text").addClass('hidden');
                $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_have_sufficient_cash_flow_from_operations").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                var table_id = 33;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_have_sufficient_cash_flow_from_operations_analysis_text").removeClass('hidden');
                        $("#company_have_sufficient_cash_flow_from_operations_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_have_sufficient_cash_flow_from_operations_analysis_text").addClass('hidden');
                $("#company_have_sufficient_cash_flow_from_operations_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_defaulted_on_any_of_its_debt_obligations").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 34;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text").removeClass('hidden');
                        $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text").addClass('hidden');
                $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_required_to_conserve_resources_to_fund").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 35;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_required_to_conserve_resources_to_fund_analysis_text").removeClass('hidden');
                        $("#company_required_to_conserve_resources_to_fund_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_required_to_conserve_resources_to_fund_analysis_text").addClass('hidden');
                $("#company_required_to_conserve_resources_to_fund_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_consistently_making_large_profits").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 36;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_consistently_making_large_profits_analysis_text").removeClass('hidden');
                        $("#company_consistently_making_large_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_consistently_making_large_profits_analysis_text").addClass('hidden');
                $("#company_consistently_making_large_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_decreased_the_dividend_pay_out").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 37;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_decreased_the_dividend_pay_out_analysis_text").removeClass('hidden');
                        $("#company_decreased_the_dividend_pay_out_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_decreased_the_dividend_pay_out_analysis_text").addClass('hidden');
                $("#company_decreased_the_dividend_pay_out_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#has_the_growth_in_dividend_been_consistent").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 38;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#has_the_growth_in_dividend_been_consistent_analysis_text").removeClass('hidden');
                        $("#has_the_growth_in_dividend_been_consistent_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#has_the_growth_in_dividend_been_consistent_analysis_text").addClass('hidden');
                $("#has_the_growth_in_dividend_been_consistent_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#dividend_payout_ratio_consistently_lower").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 39;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#dividend_payout_ratio_consistently_lower_analysis_text").removeClass('hidden');
                        $("#dividend_payout_ratio_consistently_lower_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#dividend_payout_ratio_consistently_lower_analysis_text").addClass('hidden');
                $("#dividend_payout_ratio_consistently_lower_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#dividend_pay_outs_consistently_high_relative_to_peers").change(function () {
            var self = $(this);
            if(self.val()=='yes')
                $(".dividend_pay_outs_consistently_high_relative_to_peers_hidden_block").removeClass('hidden');
            else
                $(".dividend_pay_outs_consistently_high_relative_to_peers_hidden_block").addClass('hidden');
        });
        $("#is_the_promoter_shareholding_in_the_company_higher").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 40;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text").removeClass('hidden');
                        $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text").addClass('hidden');
                $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#promoters_pledged_any_of_their_shareholdings").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 41;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#promoters_pledged_any_of_their_shareholdings_analysis_text").removeClass('hidden');
                        $("#promoters_pledged_any_of_their_shareholdings_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#promoters_pledged_any_of_their_shareholdings_analysis_text").addClass('hidden');
                $("#promoters_pledged_any_of_their_shareholdings_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_consistently_paying_dividend_out").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 42;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_consistently_paying_dividend_out_analysis_text").removeClass('hidden');
                        $("#company_consistently_paying_dividend_out_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_consistently_paying_dividend_out_analysis_text").addClass('hidden');
                $("#company_consistently_paying_dividend_out_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#is_the_Company_making_losses").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 43;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#is_the_Company_making_losses_analysis_text").removeClass('hidden');
                        $("#is_the_Company_making_losses_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_Company_making_losses_analysis_text").addClass('hidden');
                $("#is_the_Company_making_losses_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_disclosed_the_reason_for_paying_excess_dividend").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 44;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text").removeClass('hidden');
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else if(self.val()=='no')  {
                var table_id = 45;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text").removeClass('hidden');
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else {
                $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text").addClass('hidden');
                $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#company_proposed_to_pay_dividend_on_preference_shares").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 46;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text").removeClass('hidden');
                        $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text").addClass('hidden');
                $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#is_the_increase_in_dividend").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 47;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#is_the_increase_in_dividend_analysis_text").removeClass('hidden');
                        $("#is_the_increase_in_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_increase_in_dividend_analysis_text").addClass('hidden');
                $("#is_the_increase_in_dividend_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
            }
        });
        $("#has_the_Company_explained_the_deviation").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 48;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#has_the_Company_explained_the_deviation_analysis_text").removeClass('hidden');
                        $("#has_the_Company_explained_the_deviation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else if(self.val()=='no') {
                var table_id = 49;
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#has_the_Company_explained_the_deviation_analysis_text").removeClass('hidden');
                        $("#has_the_Company_explained_the_deviation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#has_the_Company_explained_the_deviation_analysis_text").addClass('hidden');
                $("#has_the_Company_explained_the_deviation_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
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
                $("#recommendation_text").parent().find(".cke_textarea_inline").parent().find(".cke_textarea_inline").html("");
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
                    var resolution_name="declaration_of_dividend";
                    console.log(data);
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataOfDeclaration:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                    var table2 = data.table2;
                                    $(".table2").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(0).find('input').val(table2[i].company_name);
                                        row.find("td").eq(1).find('select').val(table2[i].financial_year);
                                        row.find("td").eq(2).find('input').val(table2[i].dividend);
                                        row.find("td").eq(3).find('input').val(table2[i].eps);
                                        row.find("td").eq(4).find('input').val(table2[i].dividend_payout);

                                    });
                                    var table1 = data.table1;
                                    $(".table1").each(function(i,d) {
                                        var row = $(this);
                                        row.find("th").eq(0).find('select').val(table1[i].financial_year);
                                        row.find("th").eq(1).find('input').val(table1[i].dividend);
                                        row.find("th").eq(2).find('input').val(table1[i].eps);
                                        row.find("th").eq(3).find('input').val(table1[i].dividend_payout);
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