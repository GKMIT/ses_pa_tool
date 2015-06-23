function CustomJS() {
    this.analysis_base_id = 235;
}

CustomJS.prototype = {
    initialization: function() {

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
                        console.log(data);
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
                        console.log(data);
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
                        console.log(data);
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


    },

    pageload: function() {
       console.log("hi");
        $(".director-number").change(function() {
            var $director = $(this);
            $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    appointment_directors: true,
                    dir_din_no:$director.val()
                },
                success: function (data) {
                    console.log(data);
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
                    console.log(data);
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
                                console.log(data);
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
                                        else if(text_area.is("input")) {
                                            text_area.val(other_text[i]['text']);
                                        }
                                        else if(text_area.is("select")) {
                                            text_area.val(other_text[i]['text']);
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
                            else if(text_area.is("input")) {
                                text_area.val("");
                            }
                            else if(text_area.is("select")) {
                                text_area.val("Select");
                            }
                            else {
                                text_area.html("");
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