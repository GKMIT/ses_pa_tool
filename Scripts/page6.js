function CustomJS() {

}

CustomJS.prototype = {
    page6Actions: function() {

        var context  = this;
        $("#divident_info_year_1").change(function() {
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
                    console.log(data);
                    if(data.count==1) {
                        $self.closest(".company-dividend-info").find(".dividend").val(data.dividend);
                        $self.closest(".company-dividend-info").find(".eps").val(data.eps);
                        var payout = (data.dividend*1.1623)/data.eps;
                        $self.closest(".company-dividend-info").find(".payout").val(payout);
                    }
                    else {
                        $(".company-dividend-info input").val("");
                    }
                },
                error:function(data) {
                    console.log(data);
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
                        var payout = (data.dividend*1.1623)/data.eps;
                        $(".company-dividend-info-2").find(".payout").val(payout);
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
                        var payout = (data.dividend*1.1623)/data.eps;
                        $(".company-dividend-info-3").find(".payout").val(payout);
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
                        var payout = (data.dividend*1.1623)/data.eps;
                        $self.closest(".company-dividend-row").find(".payout").val(payout);
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
                question_block.find(".quest_analysis_text textarea").html("");
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
                        question_block.find(".quest_analysis_text textarea").html(data.analysis_text);
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
                        question_block.find(".quest_analysis_text textarea").html(data.analysis_text);
                    }
                });
                question_block.find(".quest_analysis_text").removeClass('hidden');
            }
            else {
                question_block.find(".quest_analysis_text").addClass('hidden');
                question_block.find(".quest_analysis_text textarea").html("");
            }
        });
        $("#company_have_stated_dividend_pay_out_policy").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $("#company_have_stated_dividend_pay_out_policy_hidden_a").removeClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_c").addClass('hidden');
            }
            else {
                $("#company_have_stated_dividend_pay_out_policy_hidden_a").addClass('hidden');
                $("#company_have_stated_dividend_pay_out_policy_hidden_c").removeClass('hidden');
            }
        });
        $("#dividend_paid_consistent_stated_policy").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                var table_id = 28;
                $("#company_have_stated_dividend_pay_out_policy_hidden_b").addClass('hidden');
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        standard_analysis_text:true,
                        table_id:table_id
                    },
                    success: function(data) {
                        $("#dividend_paid_consistent_stated_policy_analysis_text textarea").html(data.analysis_text);
                        $("#dividend_paid_consistent_stated_policy_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_have_stated_dividend_pay_out_policy_hidden_b").removeClass('hidden');
                $("#dividend_paid_consistent_stated_policy_analysis_text textarea").html("");
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
                        $("#dividend_pay_out_been_consistent_last_3_years_analysis_text textarea").html(data.analysis_text);
                    }
                });
                $("#company_have_stated_dividend_pay_out_policy_hidden_d").addClass('hidden');
            }
            else {
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text").addClass('hidden');
                $("#dividend_pay_out_been_consistent_last_3_years_analysis_text textarea").html("");
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
                        $("#company_explained_deviation_to_shareholders_analysis_text textarea").html(data.analysis_text);
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
                        $("#company_explained_deviation_to_shareholders_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else {
                $("#company_explained_deviation_to_shareholders_analysis_text").addClass('hidden');
                $("#company_explained_deviation_to_shareholders_analysis_text textarea").html("");
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
                        $("#company_making_losses_but_paying_increasing_dividend_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_making_losses_but_paying_increasing_dividend_analysis_text").addClass('hidden');
                $("#company_making_losses_but_paying_increasing_dividend_analysis_text textarea").html("");
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
                        $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text").addClass('hidden');
                $("#company_have_high_debt_equity_debt_coverage_ratio_analysis_text textarea").html("");
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
                        $("#company_have_sufficient_cash_flow_from_operations_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_have_sufficient_cash_flow_from_operations_analysis_text").addClass('hidden');
                $("#company_have_sufficient_cash_flow_from_operations_analysis_text textarea").html("");
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
                        $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text").addClass('hidden');
                $("#company_defaulted_on_any_of_its_debt_obligations_analysis_text textarea").html("");
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
                        $("#company_required_to_conserve_resources_to_fund_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_required_to_conserve_resources_to_fund_analysis_text").addClass('hidden');
                $("#company_required_to_conserve_resources_to_fund_analysis_text textarea").html("");
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
                        $("#company_consistently_making_large_profits_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_consistently_making_large_profits_analysis_text").addClass('hidden');
                $("#company_consistently_making_large_profits_analysis_text textarea").html("");
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
                        $("#company_decreased_the_dividend_pay_out_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_decreased_the_dividend_pay_out_analysis_text").addClass('hidden');
                $("#company_decreased_the_dividend_pay_out_analysis_text textarea").html("");
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
                        $("#has_the_growth_in_dividend_been_consistent_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#has_the_growth_in_dividend_been_consistent_analysis_text").addClass('hidden');
                $("#has_the_growth_in_dividend_been_consistent_analysis_text textarea").html("");
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
                        $("#dividend_payout_ratio_consistently_lower_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#dividend_payout_ratio_consistently_lower_analysis_text").addClass('hidden');
                $("#dividend_payout_ratio_consistently_lower_analysis_text textarea").html("");
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
                        $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text").addClass('hidden');
                $("#is_the_promoter_shareholding_in_the_company_higher_analysis_text textarea").html("");
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
                        $("#promoters_pledged_any_of_their_shareholdings_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#promoters_pledged_any_of_their_shareholdings_analysis_text").addClass('hidden');
                $("#promoters_pledged_any_of_their_shareholdings_analysis_text textarea").html("");
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
                        $("#company_consistently_paying_dividend_out_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_consistently_paying_dividend_out_analysis_text").addClass('hidden');
                $("#company_consistently_paying_dividend_out_analysis_text textarea").html("");
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
                        $("#is_the_Company_making_losses_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_Company_making_losses_analysis_text").addClass('hidden');
                $("#is_the_Company_making_losses_analysis_text textarea").html("");
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
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").html(data.analysis_text);
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
                        $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else {
                $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text").addClass('hidden');
                $("#company_disclosed_the_reason_for_paying_excess_dividend_analysis_text textarea").html("");
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
                        $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text").addClass('hidden');
                $("#company_proposed_to_pay_dividend_on_preference_shares_analysis_text textarea").html("");
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
                        $("#is_the_increase_in_dividend_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#is_the_increase_in_dividend_analysis_text").addClass('hidden');
                $("#is_the_increase_in_dividend_analysis_text textarea").html("");
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
                        $("#has_the_Company_explained_the_deviation_analysis_text textarea").html(data.analysis_text);
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
                        $("#has_the_Company_explained_the_deviation_analysis_text textarea").html(data.analysis_text);
                    }
                });
            }
            else  {
                $("#has_the_Company_explained_the_deviation_analysis_text").addClass('hidden');
                $("#has_the_Company_explained_the_deviation_analysis_text textarea").html("");
            }
        });
        $("#btn_recommendation_text").click(function(){

            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire").each(function(i,data){
                var self = $(this);
                if($(this).val()!="") {
                    table_id = $(this).find('option:selected').attr('data-recommendation-table-id');
                    array_recommendations_fire.push({"table_id":table_id});
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
                        $("#recommendation_text").html(data.recommendation_text);
                    }
                });
            }
        });
    },
    recommendationCalculations: function() {

    }
}
var object = new CustomJS();