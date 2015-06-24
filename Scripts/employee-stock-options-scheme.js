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
        $("#has_the_board_given_absolute_discretion").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 151
                    },
                    success: function (data) {
                        $("#has_the_board_given_absolute_discretion_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_board_given_absolute_discretion_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_board_given_absolute_discretion_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_board_given_absolute_discretion_analysis_text").addClass('hidden');
            }
        });
        $("#do_the_cumulative_number_of_shares").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 152
                    },
                    success: function (data) {

                        $("#do_the_cumulative_number_of_shares_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#do_the_cumulative_number_of_shares_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#do_the_cumulative_number_of_shares_analysis_text textarea").html("");
                $("#do_the_cumulative_number_of_shares_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_scheme_has_provisions_to_provide").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 153
                    },
                    success: function (data) {
                        $("#does_the_scheme_has_provisions_to_provide_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_scheme_has_provisions_to_provide_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_scheme_has_provisions_to_provide_analysis_text textarea").html("");
                $("#does_the_scheme_has_provisions_to_provide_analysis_text").addClass('hidden');
            }
        });
        $("#are_the_disclosures_made_by_the_company").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 154
                    },
                    success: function (data) {
                        $("#are_the_disclosures_made_by_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_the_disclosures_made_by_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_the_disclosures_made_by_the_company_analysis_text textarea").html("");
                $("#are_the_disclosures_made_by_the_company_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_composition_of_the_compensation").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 155
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_composition_of_the_compensation_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_composition_of_the_compensation_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_composition_of_the_compensation_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_composition_of_the_compensation_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_nomination_remuneration").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 156
                    },
                    success: function (data) {
                        $("#is_the_nomination_remuneration_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_nomination_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_nomination_remuneration_analysis_text textarea").html("");
                $("#is_the_nomination_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_scheme_explicitly_restrict").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 157
                    },
                    success: function (data) {
                        $("#does_the_scheme_explicitly_restrict_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_scheme_explicitly_restrict_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_scheme_explicitly_restrict_analysis_text textarea").html("");
                $("#does_the_scheme_explicitly_restrict_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_granted_option_under").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 158
                    },
                    success: function (data) {
                        $("#has_the_company_granted_option_under_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_granted_option_under_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_granted_option_under_analysis_text textarea").html("");
                $("#has_the_company_granted_option_under_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_scheme_provides_the_option").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 159
                    },
                    success: function (data) {
                        $("#does_the_scheme_provides_the_option_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#does_the_scheme_provides_the_option_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_scheme_provides_the_option_analysis_text textarea").html("");
                $("#does_the_scheme_provides_the_option_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_exercise_price_been_disclosed").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 160
                    },
                    success: function (data) {
                        $("#has_the_exercise_price_been_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_exercise_price_been_disclosed_analysis_text").removeClass('hidden');

                    }
                });
            }
            else {
                $("#has_the_exercise_price_been_disclosed_analysis_text textarea").html("");
                $("#has_the_exercise_price_been_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_approval_of_esop_scheme").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-approval-of-esop-scheme").each(function(i,data){
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
                        $("#recommendation_text_approval_of_esop_scheme").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_approval_of_esop_scheme").parent().find(".cke_textarea_inline").html("");
            }
        });
        $(function(){
            $("select").change(function(){
                var $trigger = $(this).find("option:selected").hasClass("trigger");
                if ( $trigger ) {
                    $(".analysis-not-even-a-single-case").addClass('hidden');
                } else {
                    $(".analysis-not-even-a-single-case").removeClass('hidden');
                }
            });
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
                    var resolution_name="employee_stock";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofEsop:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                    var esop_repricing = data.esop_repricing;
                                    $(".esop-stock").each(function(i,d) {
                                        var row = $(this);
                                        //if(esop_repricing[i]['esop_scheme']!="") {
                                        row.find("td").eq(0).find('input').val(esop_repricing[i].esop_scheme);
                                        row.find("td").eq(1).find('input').val(esop_repricing[i].options_outstanding);
                                        row.find("td").eq(2).find('input').val(esop_repricing[i].current_option_price);
                                        row.find("td").eq(3).find('input').val(esop_repricing[i].current_market_price);
                                        row.find("td").eq(4).find('input').val(esop_repricing[i].proposed_option_price);
                                        //}
                                    });
                                    var esop_stock = data.esop_stock;
                                    $(".stock-performance").each(function(i,d) {
                                        var row = $(this);
                                        row.find("td").eq(1).find('input').val(esop_stock[i].company);
                                        row.find("td").eq(2).find('input').val(esop_stock[i].sp_cnx_nifty);
                                        row.find("td").eq(3).find('input').val(esop_stock[i].cnx_finance);
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