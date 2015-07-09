function CustomJS() {
    this.analysis_base_id = 235;
}

CustomJS.prototype = {
    initialization: function() {

        context = self;
        $("textarea[name='used_in_text[]']").each(function(){
            $(this).addClass('other-text');
        });

        $("select[name='used_in_text[]']").each(function(){
            $(this).addClass('other-text');
        });

        $("input[name='used_in_text[]']").each(function(){
            $(this).addClass('other-text');
        });

        $("textarea[name='analysis_text[]']").each(function(){
            $(this).addClass('analysis-text');
        });

        $("textarea[name='recommendation_text[]']").each(function(){
            $(this).addClass('recommendation-text');
        });

        $("div").find("other-text").each(function(i,d) {
            $(this).addClass('inline-editor');
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
        var j=10;

        $(".inline-editor").each(function(i,d) {
            if(!$(this).is("input")) {
                $(this).attr("id","inline_editor_"+j);
                CKEDITOR.inline( $(this).attr('id') );
                j++;
            }
        });
        $(".check-trigger").click(function () {
            $(".check-trigger").each(function (index, check) {
                var self = $(this);
                if (self.is(':checked')) {
                    var id_hidden_block = self.attr("hidden-id");
                    $("#" + id_hidden_block).removeClass('hidden');
                }
                else {
                    var id_hidden_block = self.attr("hidden-id");
                    $("#" + id_hidden_block).addClass('hidden');
                }
            });
        });
        $("#does_the_company_have_a_nomination_and_remuneration_committee").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $("#does_the_company_have_a_nomination_and_remuneration_committee_block_1").addClass('hidden');
                $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text").addClass('hidden');
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: context.analysis_base_id
                    },
                    success: function (data) {
                        //$("#does_the_company_have_a_nomination_and_remuneration_committee_analysis_text textarea").html(data.analysis_text);
                        $("#does_the_company_have_a_nomination_and_remuneration_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_company_have_a_nomination_and_remuneration_committee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_company_have_a_nomination_and_remuneration_committee_block_1").removeClass('hidden');
                $("#does_the_company_have_a_nomination_and_remuneration_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#does_the_company_have_a_nomination_and_remuneration_committee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_nomination_and_remuneration_committee_compliant").change(function () {
            var self = $(this);
            if (self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: context.analysis_base_id + 1
                    },
                    success: function (data) {
                        $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_nomination_and_remuneration_committee_compliant_analysis_text").addClass('hidden');
            }
        });
        // common analysis triggers
        $(".analysis_trigger").change(function () {
            var self = $(this);
            var trigger_value = self.attr("data-trigger-value");
            var trigger_no = parseInt(self.attr("data-trigger-no"));
            var id = self.attr('id');
            if (self.val() == trigger_value) {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: trigger_no
                    },
                    success: function (data) {
                        $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#" + id + "_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#" + id + "_analysis_text").addClass('hidden');
            }
        });
        $("#ared_34").change(function () {
            var self = $(this);
            var id = self.attr('id');
            if (self.val() == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: parseInt(self.attr("data-trigger-no-yes"))
                    },
                    success: function (data) {
                        $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#" + id + "_analysis_text").removeClass('hidden');
                    }
                });
            }
            else if(self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: parseInt(self.attr("data-trigger-no-no"))
                    },
                    success: function (data) {
                        $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#" + id + "_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#" + id + "_analysis_text").addClass('hidden');
            }
        });
        $(".analysis-trigger-yes-no").change(function () {
            var self = $(this);
            var id = self.attr('id');
            if (self.val() == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: parseInt(self.attr("data-trigger-no-yes"))
                    },
                    success: function (data) {
                        $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#" + id + "_analysis_text").removeClass('hidden');
                    }
                });
            }
            else if(self.val() == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: parseInt(self.attr("data-trigger-no-no"))
                    },
                    success: function (data) {
                        $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#" + id + "_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#" + id + "_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#" + id + "_analysis_text").addClass('hidden');
            }
        });
        $("#arned_19").change(function () {
            var self = $(this);
            if (self.val() == "yes") {
                $(".board-chairman-questions").removeClass('hidden');
            }
            else {
                $(".board-chairman-questions").addClass('hidden');
            }
        });
        $("#arned_21").change(function () {
            var self = $(this);
            if (self.val() == "yes") {
                $("#arned_21_block_1").removeClass('hidden');
            }
            else {
                $("#arned_21_block_1").addClass('hidden');
            }
        });
        $("#arned_28").change(function () {
            var self = $(this);
            if (self.val() == "yes") {
                $(".audit-committee-questions-arned").removeClass('hidden');
            }
            else {
                $(".audit-committee-questions-arned").addClass('hidden');
            }
        });
        $("#arned_30").change(function () {
            var self = $(this);
            if (self.val() == "yes") {
                $("#arned_30_block_1").removeClass('hidden');
            }
            else {
                $("#arned_30_block_1").addClass('hidden');
            }
        });
        $("#arned_43").change(function () {
            var self = $(this);
            if (self.val() == "yes") {
                $(".nom_rem_committee_questions_arned").removeClass('hidden');
            }
            else {
                $(".nom_rem_committee_questions_arned").addClass('hidden');
            }
        });
        $("#arid_1").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#arid_1_block_1").removeClass('hidden');
            }
            else {
                $("#arid_1_block_1").addClass('hidden');
            }
        });
        $("#arid_26_a").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $(".board-chairman-arid-questions").removeClass('hidden');
            }
            else {
                $(".board-chairman-arid-questions").addClass('hidden');
            }
        });
        $("#arid_27").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#arid_27_block_1").removeClass('hidden');
            }
            else {
                $("#arid_27_block_1").addClass('hidden');
            }
        });
        $("#arid_33").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $(".audit-committee-questions-arid").removeClass('hidden');
            }
            else {
                $(".audit-committee-questions-arid").addClass('hidden');
            }
        });
        $("#arid_48").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $(".nom-rem-questions-arid").removeClass('hidden');
            }
            else {
                $(".nom-rem-questions-arid").addClass('hidden');
            }
        });
        $("#ared_17").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $(".is-director-chairman-questions").removeClass('hidden');
            }
            else {
                $(".is-director-chairman-questions").addClass('hidden');
            }
        });
        $("#ared_25").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $(".is-director-ceo-cfo-questions-ared").removeClass('hidden');
            }
            else {
                $(".is-director-ceo-cfo-questions-ared").addClass('hidden');
            }
        });
        $("#ared_33").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#ared_33_block_1").removeClass('hidden');
            }
            else {
                $("#ared_33_block_1").addClass('hidden');
            }
        });
        $("#cod_1").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#cod_1_block_1").removeClass('hidden');
            }
            else {
                $("#cod_1_block_1").addClass('hidden');
            }
        });
        $("#cod_3").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#cod_3_block_1").removeClass('hidden');
            }
            else {
                $("#cod_3_block_1").addClass('hidden');
            }
        });
        $("#cod_5").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#cod_5_block_1").removeClass('hidden');
            }
            else {
                $("#cod_5_block_1").addClass('hidden');
            }
        });
        $("#cod_7").change(function() {
            var self = $(this);
            if (self.val() == "yes") {
                $("#cod_7_block_1").removeClass('hidden');
            }
            else {
                $("#cod_7_block_1").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_arned").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-arned").each(function(i,data){
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
                        $("#recommendation_text_arned").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
        });
        $("#btn_recommendation_text_arid").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-arid").each(function(i,data){
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
                        $("#recommendation_text_arid").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
        });
        $("#btn_recommendation_text_ared").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-ared").each(function(i,data){
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
                        $("#recommendation_text_ared").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
        });
        $("#btn_recommendation_text_cessation_of_directorship").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-cessation-of-directorship").each(function(i,data){
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
                        $("#recommendation_text_cod").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
        });
        $(".score").keyup(function () {
            var total = 0;
            $('.score').each(function(i,d) {
                var score_val = $(this).val();
                if(score_val!="") {
                    total+=parseFloat(score_val);
                }
            });
            $(".total_score").html(total);
        });

        $("#remuneration_years").change(function() {

            var array_din_numbers = [];
            array_din_numbers.push({"din_no":$(".ed-ids").val()});
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
        });

        $("#indexed_tsr_year_start_year").change(function () {
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    dividend_data_6_years:true,
                    first_year:$("#indexed_tsr_year_start_year").val(),
                    highest_paid_ed : $(".ed-ids").val()
                },
                success: function(data) {
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

    pageload: function() {

        $(".ned-ids").change(function() {
            var $director = $(this);
            $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    appointment_directors: true,
                    dir_din_no:$director.val()
                },
                error: function (data) {
                },
                success: function (data) {
                    $(".ned-functional-area").html(data.functional_area);
                    $(".ned-education").html(data.education);
                    $(".ned-past-ex").html(data.past_ex);
                    $(".ned-committee-positions").html(data.committee_positions);
                    $(".ned-retiring-non-retiring").html(data.retiring_non_retiring);
                    $(".ned-part-promoter-group").html(data.part_promoter_group);
                    $(".ned-total-directorship").html(data.total_directorship);
                    $(".ned-committee-memberships").html(data.committee_memberships);
                    $(".ned-committee-chairmanship").html(data.committee_chairmanships);
                    $(".ned-last-3-agms").html(data.last_3_agms);
                    $(".ned-board-meeting-last-year").html(data.board_meeting_last_year+"%");
                    $(".ned-board-meeting-last-years-avg").html(data.board_meeting_last_years_avg+"%");
                    $(".ned-audit-meeting-last-year").html(data.audit_meeting_last_year+"%");
                    if(data.are_committees_seperate=='yes') {
                        $(".ned-nomination-row").removeClass('hidden');
                        $(".ned-remuneration-row").removeClass('hidden');
                        $(".ned-nomination-remuneration-row").addClass('hidden');
                        $(".ned-nomination-meeting-last-year").html(data.nomination_meeting_last_year+"%");
                        $(".ned-remuneration-meeting-last-year").html(data.remuneration_meeting_last_year+"%");
                    }
                    else {
                        $(".ned-nomination-row").addClass('hidden');
                        $(".ned-remuneration-row").addClass('hidden');
                        $(".ned-nomination-remuneration-row").removeClass('hidden');
                        $(".ned-nomination-remuneration-meeting-last-year").html(data.nomination_remuneration_meeting_last_year+"%");
                    }
                    $(".ned-csr-meeting-last-year").html(data.csr_meeting_last_year+"%");
                    $(".ned-stack-meeting-last-year").html(data.stack_meeting_last_year+"%");
                    var analysis_values = data.analysis_values;
                    $(".ned-analysis-values").each(function(i,d) {
                        $(this).html("["+analysis_values[i]+"]");
                    });
                }
            });
        });

        $(".id-ids").change(function() {
            var $director = $(this);
            $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    appointment_directors_id: true,
                    dir_din_no:$director.val()
                },
                error: function (data) {
                    console.log(data);
                },
                success: function (data) {

                    $(".id-functional-area").val(data.functional_area);
                    $(".id-education").val(data.education);
                    $(".id-past-ex").val(data.past_ex);
                    $(".id-committee-positions").val(data.committee_positions);
                    $(".id-total-association").val(data.total_association);
                    $(".id-shareholding").val(data.shareholding);
                    $(".id-remuneration").val(data.remuneration);
                    $(".id-total-directorship").val(data.total_directorship);
                    $(".id-committee-memberships").val(data.committee_memberships);
                    $(".id-committee-chairmanship").val(data.committee_chairmanships);
                    $(".id-last-3-agms").val(data.last_3_agms);
                    $(".id-board-meeting-last-year").val(data.board_meeting_last_year+"%");
                    $(".id-board-meeting-last-years-avg").val(data.board_meeting_last_years_avg+"%");
                    $(".id-audit-meeting-last-year").val(data.audit_meeting_last_year+"%");
                    if(data.are_committees_seperate=='yes') {
                        $(".id-nomination-row").removeClass('hidden');
                        $(".id-remuneration-row").removeClass('hidden');
                        $(".id-nomination-remuneration-row").addClass('hidden');
                        $(".id-nomination-meeting-last-year").val(data.nomination_meeting_last_year+"%");
                        $(".id-remuneration-meeting-last-year").val(data.remuneration_meeting_last_year+"%");
                    }
                    else {
                        $(".id-nomination-row").addClass('hidden');
                        $(".id-remuneration-row").addClass('hidden');
                        $(".id-nomination-remuneration-row").removeClass('hidden');
                        $(".id-nomination-remuneration-meeting-last-year").val(data.nomination_remuneration_meeting_last_year+"%");
                    }
                    $(".id-csr-meeting-last-year").val(data.csr_meeting_last_year+"%");
                    $(".id-stack-meeting-last-year").val(data.stack_meeting_last_year+"%");

                    var analysis_values = data.analysis_values;
                    $(".id-analysis-values").each(function(i,d) {
                        $(this).html("["+analysis_values[i]+"]");
                    });
                }
            });
        });

        $(".ed-ids").change(function() {
            var $director = $(this);

            if($("#remuneration_years").val()!="")
                $("#remuneration_years").trigger('change');

            if($("#indexed_tsr_year_start_year").val()!="")
                $("#indexed_tsr_year_start_year").trigger('change');


            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    executive_remuneration: true,
                    dir_din_no : $director.val()
                },
                success: function(data) {
                    $(".director1").val($director.find('option:selected').text());
                    $(".promotor1").val(data.company_promoter);
                    $(".remuneration1").val(data.remuneration);
                    $(".netprofit1").val(data.company_net_profit);
                    $(".ratio1").val(data.company_rem_per.toFixed(2));
                }
            });

            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{DirectorsPeerInfo:1},
                success:function(data) {
                    $(".company2").append("<option value=''>Select Peer</option>");
                    $(".company2").append("<option value='"+data.peer_1_company_name+"'>"+data.peer_1_company_name+"</option>");
                    $(".company2").append("<option value='"+data.peer_2_company_name+"'>"+data.peer_2_company_name+"</option>");
                    $('.company1').val(data.company_name);
                }
            });

            $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    appointment_directors_ed: true,
                    dir_din_no:$director.val()
                },
                error: function (data) {
                },
                success: function (data) {

                    $("#past_rem_dir_name").val($director.find('option:selected').text());
                    $(".ed-functional-area").val(data.functional_area);
                    $(".ed-education").val(data.education);
                    $(".ed-past-ex").val(data.past_ex);
                    $(".ed-committee-positions").val(data.committee_positions);
                    $(".ed-retiring-non-retiring").val(data.retiring_non_retiring);
                    $(".ed-part-promoter-group").val(data.part_promoter_group);
                    $(".ed-total-directorship").val(data.total_directorship);
                    $(".ed-committee-memberships").val(data.committee_memberships);
                    $(".ed-committee-chairmanship").val(data.committee_chairmanships);
                    $(".ed-last-3-agms").val(data.last_3_agms);
                    $(".ed-board-meeting-last-year").val(data.board_meeting_last_year+"%");
                    $(".ed-board-meeting-last-years-avg").val(data.board_meeting_last_years_avg+"%");
                    $(".ed-audit-meeting-last-year").val(data.audit_meeting_last_year+"%");
                    if(data.are_committees_seperate=='yes') {
                        $(".ed-nomination-row").removeClass('hidden');
                        $(".ed-remuneration-row").removeClass('hidden');
                        $(".ed-nomination-remuneration-row").addClass('hidden');
                        $(".ed-nomination-meeting-last-year").val(data.nomination_meeting_last_year+"%");
                        $(".ed-remuneration-meeting-last-year").val(data.remuneration_meeting_last_year+"%");
                    }
                    else {
                        $(".ed-nomination-row").addClass('hidden');
                        $(".ed-remuneration-row").addClass('hidden');
                        $(".ed-nomination-remuneration-row").removeClass('hidden');
                        $(".ed-nomination-remuneration-meeting-last-year").val(data.nomination_remuneration_meeting_last_year+"%");
                    }
                    $(".ed-csr-meeting-last-year").val(data.csr_meeting_last_year+"%");
                    $(".ed-stack-meeting-last-year").val(data.stack_meeting_last_year+"%");
                    var analysis_values = data.analysis_values;
                    console.log(analysis_values);
                    $(".ed-analysis-values").each(function(i,d) {
                        $(this).html("["+analysis_values[i]+"]");
                    });
                }
            });
        });

        $("#slot_no").change(function(){
            var main_section=$('#main_section').val();
            var slot_no = $('#slot_no').find('option:selected').text();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExistingAD:1,MainSection:main_section,Slot_no:slot_no},
                beforeSend: function() {
                    $.loader_add();
                },
                success:function(data) {
                    var resolution_name="appointment_directors";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $("#edit_button_enable").removeClass('hidden');
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofAppointmentOfDirectors:1,ResolutionName:resolution_name,MainSection:main_section,Slot_no:slot_no},
                            success:function(data){
                                var triggers = data.triggers;
                                $("select[name='triggers[]']").each(function(i,d) {
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
                                            text_area.val(other_text[i]['text']);
                                        }
                                    });
                                    var analysis_text = data.analysis;
                                    $("textarea[name='analysis_text[]']").each(function(i,d) {
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
                                    // console.log(past_remuneration[0].year1);
                                    $('#remuneration_years').val(past_remuneration[0].year1);
                                    $('#rem_second_year').val(past_remuneration[0].year2);
                                    $('#rem_third_year').val(past_remuneration[0].year3);
                                    $("#past_rem_dir_name").val(past_remuneration[0].dir_name);
                                    $("#fixed_pay_year1").val(past_remuneration[0].fixed_pay_year1);
                                    $("#total_pay_year1").val(past_remuneration[0].total_pay_year1);
                                    $("#fixed_pay_year2").val(past_remuneration[0].fixed_pay_year2);
                                    $("#total_pay_year2").val(past_remuneration[0].total_pay_year2);
                                    $("#fixed_pay_year3").val(past_remuneration[0].fixed_pay_year3);
                                    $("#total_pay_year3").val(past_remuneration[0].total_pay_year3);

                                    var peer_comparsion = data.peer_comparsion;
                                    $('.director1').val(peer_comparsion[0].col_1);
                                    $('.director2').val(peer_comparsion[0].col_2);
                                    $('.company1').val(peer_comparsion[1].col_1);
                                    $('.company2').val(peer_comparsion[1].col_2);
                                    $('.promotor1').val(peer_comparsion[2].col_1);
                                    $('.promotor2').val(peer_comparsion[2].col_2);
                                    $('.remuneration1').val(peer_comparsion[3].col_1);
                                    $('.remuneration2').val(peer_comparsion[3].col_2);
                                    $('.netprofit1').val(peer_comparsion[4].col_1);
                                    $('.netprofit2').val(peer_comparsion[4].col_2);
                                    $('.ratio1').val(peer_comparsion[5].col_1);
                                    $('.ratio2').val(peer_comparsion[5].col_2);

                                    var table_2 = data.table_2;
                                    $(".find_tr").each(function(i,d) {
                                        var row = $(this);
                                        row.find('td').eq(0).find('.year_table2').val(table_2[i].financial_year);
                                        row.find('td').eq(1).find('.edr').val(table_2[i].ed_remuneration);
                                        row.find('td').eq(2).find('.index').val(table_2[i].indexed_tsr);
                                        row.find('td').eq(3).find('.np').val(table_2[i].net_profit);
                                    });
                                    var remuneration_package=data.remuneration_package;
                                    $('.proposed_salary').val(remuneration_package[0].field_value);
                                    $('.basic_pay_comment').val(remuneration_package[1].field_value);
                                    $('.annual_increment').val(remuneration_package[2].field_value);
                                    $('.all_perquisites').val(remuneration_package[3].field_value);
                                    $('.can_placed_perquisites').val(remuneration_package[4].field_value);
                                    $('.total_allowance').val(remuneration_package[5].field_value);
                                    $('.variable_pay').val(remuneration_package[6].field_value);
                                    $('.performance_criteria').val(remuneration_package[7].field_value);
                                    $('.can_placed_on_variable').val(remuneration_package[8].field_value);
                                    $('.notice_period').val(remuneration_package[9].field_value);
                                    $('.notice_severance_pay_comments').val(remuneration_package[10].field_value);
                                    $('.severance_pay').val(remuneration_package[11].field_value);
                                    $('.minimum_remuneration').val(remuneration_package[12].field_value);
                                    $('.within_limits').val(remuneration_package[13].field_value);
                                    $('.includes_variable').val(remuneration_package[14].field_value);
                                    $.loader_remove();
                                },3000);
                            }
                        });
                    }
                    else {
                        $('#edit_mode').val("");
                        $("#edit_button_enable").addClass('hidden');
                        $(".other-text").each(function(i,d) {
                            var text_area = $(this);
                            if(text_area.hasClass('inline-editor')) {
                                text_area.parent().find(".cke_textarea_inline").html("");
                            }
                            else {
                                text_area.val("");
                            }
                        });
                        $("textarea[name='analysis_text[]']").each(function(i,d) {
                            var text_area = $(this);
                            text_area.parent().find(".analysis-text").html("");
                        });
                        $(".recommendation-text").each(function(i,d) {
                            var text_area = $(this);
                            text_area.parent().find(".cke_textarea_inline").html("");
                        });
                        $("select[name='triggers[]']").each(function(i,d) {
                            var select = $(this);
                            // select.val(triggers[i]['triggers']);
                            select.val("");
                            select.trigger('change');
                        });
                        $('#remuneration_years').val("");
                        $('#rem_second_year').val("");
                        $('#rem_third_year').val("");
                        $("#past_rem_dir_name").val("");
                        $("#fixed_pay_year1").val("");
                        $("#total_pay_year1").val("");
                        $("#fixed_pay_year2").val("");
                        $("#total_pay_year2").val("");
                        $("#fixed_pay_year3").val("");
                        $("#total_pay_year3").val("");
                        $('.director1').val("");
                        $('.director2').val("");
                        $('.company1').val("");
                        $('.company2').val("");
                        $('.promotor1').val("");
                        $('.promotor2').val("");
                        $('.remuneration1').val("");
                        $('.remuneration2').val("");
                        $('.netprofit1').val("");
                        $('.netprofit2').val("");
                        $('.ratio1').val("");
                        $('.ratio2').val("");

                        $(".find_tr").each(function(i,d) {
                            var row = $(this);
                            row.find('td').eq(0).find('.year_table2').val("");
                            row.find('td').eq(1).find('.edr').val("");
                            row.find('td').eq(2).find('.index').val("");
                            row.find('td').eq(3).find('.np').val("");
                        });

                        $('.proposed_salary').val("");
                        $('.basic_pay_comment').val("");
                        $('.annual_increment').val("");
                        $('.all_perquisites').val("");
                        $('.can_placed_perquisites').val("");
                        $('.total_allowance').val("");
                        $('.variable_pay').val("");
                        $('.performance_criteria').val("");
                        $('.can_placed_on_variable').val("");
                        $('.notice_period').val("");
                        $('.notice_severance_pay_comments').val("");
                        $('.severance_pay').val("");
                        $('.minimum_remuneration').val("");
                        $('.within_limits').val("");
                        $('.includes_variable').val("");

                        $(".checkbox").each(function(i,d) {
                            $checkboxobj = $(this);
                            $(this).removeAttr('checked',true);
                            $(this).parent().removeClass('checked');
                            $("#"+$checkboxobj.attr("hidden-id")).addClass('hidden');
                        });
                        $.loader_remove();
                    }
                }
            });
        });
    }
}
var object = new CustomJS();