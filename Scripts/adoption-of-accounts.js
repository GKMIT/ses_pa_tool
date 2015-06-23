function CustomJS() {

}
CustomJS.prototype = {
    initialization: function() {
        var context = this;

        $('#has_the_company_defaulted_in_payment').change(function(){
            var self=$(this);
            if(self.val()=="yes") {
                $('#has_the_company_defaulted_in_payment_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_defaulted_in_payment_sub_part').addClass('hidden');
                $('#are_the_dues_greater_than_20_of_net_worth').val("");
            }
        });
        $('#does_the_company_has_an_audit_committee').change(function(){
            var self=$(this);
            if(self.val()=="yes") {
                $('#does_the_company_has_an_audit_committee_sub_part').removeClass('hidden');
            }
            else {
                $('#does_the_company_has_an_audit_committee_sub_part').addClass('hidden');
                $('#are_the_accounts_duly_approved_by_the_compliant').val("");
            }
        });
        $('#have_the_auditors_raised_qualifications_over_the_company_accounts').change(function(){
            var self=$(this);
            if(self.val()=="yes") {
                $('#have_the_auditors_raised_qualifications_over_the_company_accounts_sub_part').removeClass('hidden');
            }
            else {
                $('#have_the_auditors_raised_qualifications_over_the_company_accounts_sub_part').addClass('hidden');
                $('#are_the_qualifications_raised_by_the_auditors_have_a_material').val("");
            }
        });
        $('#has_the_company_undergone_a_debt').change(function(){
            var self=$(this);
            if(self.val()=="yes") {
                $('#has_the_company_undergone_a_debt_sub_part').removeClass('hidden');
            }
            else {
                $('#has_the_company_undergone_a_debt_sub_part').addClass('hidden');
                $('#is_the_loan_being_made_to_a_material_operating_analysis_text').addClass('hidden');
            }
        });

        $("#have_the_auditors_continuously_raised_concerns").change(function () {
            var self = $(this);
            if(self.val()=="yes") {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:161
                    },
                    success: function (data) {
                        $("#have_the_auditors_continuously_raised_concerns_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_the_auditors_continuously_raised_concerns_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_the_auditors_continuously_raised_concerns_analysis_text textarea").html("");
                $("#have_the_auditors_continuously_raised_concerns_analysis_text").addClass('hidden');
            }
        });
        $("#are_material_unaudited_statements").change(function () {
            var self = $(this);
            if(self.val()=="yes") {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:162
                    },
                    success: function (data) {
                        $("#are_material_unaudited_statements_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#are_material_unaudited_statements_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#are_material_unaudited_statements_analysis_text textarea").html("");
                $("#are_material_unaudited_statements_analysis_text").addClass('hidden');
            }
        });
        $("#have_principal_auditors_audited_less_than_50").change(function () {
            var self = $(this);
            if(self.val()=="yes") {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:163
                    },
                    success: function (data) {
                        $("#have_principal_auditors_audited_less_than_50_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_principal_auditors_audited_less_than_50_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_principal_auditors_audited_less_than_50_analysis_text textarea").html("");
                $("#have_principal_auditors_audited_less_than_50_analysis_text").addClass('hidden');
            }
        });
        $("#have_short_term_funds_used_for_long_term_investment").change(function () {
            var self = $(this);
            if(self.val()=="yes") {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:164
                    },
                    success: function (data) {
                        $("#have_short_term_funds_used_for_long_term_investment_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#have_short_term_funds_used_for_long_term_investment_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#have_short_term_funds_used_for_long_term_investment_analysis_text textarea").html("");
                $("#have_short_term_funds_used_for_long_term_investment_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_related_party_transactions").change(function () {
            var self = $(this);
            if(self.val()=="yes") {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id:165
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_related_party_transactions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_related_party_transactions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_related_party_transactions_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_related_party_transactions_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text_adoption_of_accounts").click(function(){
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire-adoption-of-accounts").each(function(i,data){
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
                        $("#recommendation_text_adoption_of_accounts").parent().find(".cke_textarea_inline").html(data.recommendation_text);
                    }
                });
            }
            else {
                $("#recommendation_text_adoption_of_accounts").parent().find(".cke_textarea_inline").html("");
            }
        });

        //preet

        $("#audit_qualification").change(function(){
            var val=$("#audit_qualification").find('option:selected').val();
            if(val=="yes")
            {
                $("#audit_show").removeClass('hidden');
                $("#audit_no").addClass('hidden');
            }
            else if(val=="no")
            {
                $("#audit_show").addClass('hidden');
                $("#audit_no").removeClass('hidden');
            }
            else
            {
                $("#audit_show").addClass('hidden');
                $("#audit_no").addClass('hidden');
            }
        });
        $("#standalone_accounts").change(function(){
            var val=$("#standalone_accounts").find('option:selected').val();
            if(val=="yes")
            {
                $("#standalone_show").removeClass('hidden');
                $("#standalone_no").addClass('hidden');
            }
            else if(val=="no")
            {
                $("#standalone_show").addClass('hidden');
                $("#standalone_no").removeClass('hidden');
            }
            else
            {
                $("#standalone_show").addClass('hidden');
                $("#standalone_no").addClass('hidden');
            }
        });
        $("#consolidated_accounts").change(function(){
            var val=$("#consolidated_accounts").find('option:selected').val();
            if(val=="yes")
                $("#Consolidated").removeClass('hidden');
            else{
                $("#Consolidated").addClass('hidden');
                $("#consolidated_area").addClass('hidden');
            }
        });
        $('#have_the_auditors_made_any_comments').change(function(){
            var self=$(this);
            if(self.val()=="yes")
                $("#consolidated_area").removeClass('hidden');
            else
                $("#consolidated_area").addClass('hidden');
        });

        delete_row_consolidated();
        function delete_row_consolidated() {
            $(".consolidated_button").click(function() {
                var value1= $(this).parent().parent().find(".label_consolidated").text();
                var id=$(this).parent().parent().attr('id');
                var newOption = "<option value="+id+">"+ value1+"</option>";
                $("#label_select_consolidated").append(newOption);
                var par = $(this).parent().parent();
                par.addClass('hidden');
                par.find("input[name='total_assets[]']").val("");
                par.find("input[name='total_revenue[]']").val("");
                par.find("input[name='net_profit[]']").val("");
                par.find("input[name='net_cash_flow[]']").val("");
                $("#show_consolidated").removeClass('hidden');
            });

        }
        $("#recover_row_consolidated").click(function(){
            var add_row = $("#label_select_consolidated").find('option:selected').text();
            var add_row_value = $("#label_select_consolidated").find('option:selected').val();
            $("#"+add_row_value +"").removeClass('hidden');
            $("#label_select_consolidated").find('option:selected').remove();
        });
        $("#unaudited_statements").change(function(){
            var val=$("#unaudited_statements").find('option:selected').val();
            if(val=="yes")
                $("#unaudited").removeClass('hidden');
            else
                $("#unaudited").addClass('hidden');
        });
        function fy14(){
            $(".fy14").keyup(function(){
                shift();
            });
        }
        fy14();
        function fy15(){
            $(".fy15").keyup(function(){
                shift();

            });
        }
        fy15();
        delete_row();
        function delete_row() {
            $(".financial_button").click(function(){
                var value1= $(this).parent().parent().find(".add_label").text();
                var id=$(this).parent().parent().attr('id');
                var newOption = "<option value="+id+">"+ value1+"</option>";
                $("#label_select").append(newOption);
                var par = $(this).closest('.financial-indicator');
                par.find(".fy15").val("");
                par.find(".fy14").val("");
                par.find(".shift").val("");
                par.find("textarea").val("");
                par.addClass('hidden');
                $("#show").removeClass('hidden');
            });

        }
        $("#recover_row").click(function(){
            var add_row = $("#label_select").find('option:selected').text();
            var add_row_value = $("#label_select").find('option:selected').val();

            //alert(add_row_value);
            $("#"+add_row_value +"").removeClass('hidden');
            //$("#financial_indicators tr").eq(add_row_value-1).after("<tr><th><label class='add_label'>"+ add_row+"</label></th><th><input class='form-control fy15' /></th><th><input class='form-control fy14' /></th><th><input class='form-control shift' /></th><th><input class='form-control' /></th><th><button no='2' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button></th></tr>");
            $("#label_select").find('option:selected').remove();
        });
        var i=8;
        $("#addbtn").click(function()
        {
            $('#financial_indicators').append("<tr class='table-description' id='tr"+i+"'><th><input class='add_label form-control' name='label_name[]' /></th><th><input class='form-control fy15' name='fi_current[]' /></th><th><input class='form-control fy14' name='fi_previous[]'  /></th><th><input class='form-control shift' name='shift[]'/></th><th><textarea class='form-control' name='company_discussion[]' ></textarea></th><th><button type='button' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button></th></tr>");
            delete_row();
            fy14();
            fy15();
            shift();
            i++;
        });

        $("#related_party").change(function(){
            var val=$("#related_party").find('option:selected').val();
            if(val=="yes")
                $("#related").removeClass('hidden');
            else
                $("#related").addClass('hidden');
        });
        delete_row_related();
        function delete_row_related() {
            $(".related_button").click(function() {
                var value1= $(this).parent().parent().find(".add_label_related").text();
                var id=$(this).parent().parent().attr('id');
                var newOption = "<option value="+id+">"+ value1+"</option>";
                $("#label_select_related").append(newOption);
                var par = $(this).closest('.rpt');
                par.find(".rpt-current-year").val("");
                par.find(".rpt-previous-year").val("");
                par.find(".rpt-comments").val("");
                par.addClass('hidden');
                $("#show_related").removeClass('hidden');
            });
        }
        $("#recover_row_related").click(function(){
            var add_row = $("#label_select_related").find('option:selected').text();
            var add_row_value = $("#label_select_related").find('option:selected').val();

            //alert(add_row_value);
            $("#"+add_row_value +"").removeClass('hidden');
            //$("#financial_indicators tr").eq(add_row_value-1).after("<tr><th><label class='add_label'>"+ add_row+"</label></th><th><input class='form-control fy15' /></th><th><input class='form-control fy14' /></th><th><input class='form-control shift' /></th><th><input class='form-control' /></th><th><button no='2' class='btn btn-danger financial_button'><i class='fa fa-times'></i></button></th></tr>");
            $("#label_select_related").find('option:selected').remove();
        });
        $("#inlineCheckbox1").change(function(){
            if($(this).prop('checked')){
                // $(this).siblings("input[type=checkbox]").prop('checked', false);
                $("#comparsion").removeClass('hidden');
            }
            else
                $("#comparsion").addClass('hidden');
        });
        $("#inlineCheckbox2").change(function(){
            if($(this).prop('checked')){
                // $(this).siblings("input[type=checkbox]").prop('checked', false);
                $("#contingent").removeClass('hidden');
            }
            else
                $("#contingent").addClass('hidden');
        });
        $('#current_year').change(function(){
            $year=$('#current_year').val();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{Financial_indicator:1,Year:$year},
                success:function(data){
                    $('#current_opm').val(data.opm);
                    $('#current_npm').val(data.npm);

                }
            });
            $year=$year-1;
            $('#previous_year').val($year);
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{Financial_indicator:1,Year:$year},
                success:function(data){
                    $('#previous_opm').val(data.opm);
                    $('#previous_npm').val(data.npm);

                }
            });
            shift();
        });
        $('#previous_year').change(function(){
            $year=$('#previous_year').val();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{Financial_indicator:1,Year:$year},
                success:function(data){
                    $('#previous_opm').val(data.opm);
                    $('#previous_npm').val(data.npm);

                }
            });
            shift();
        });
        $('#contingent_current_year').change(function(){
            $year=$('#contingent_current_year').val();
            $year=$year-1;
            $('#contingent_previous_year').val($year);
        });
        $('#outstanding_current_year').change(function(){
            $year=$('#outstanding_current_year').val();
            $year=$year-1;
            $('#outstanding_previous_year').val($year);
        });
        $('#standalone_current_year').change(function(){
            $year=$('#standalone_current_year').val();
            $('#standalone_previous_year1').val($year-1);
            $('#standalone_previous_year2').val($year-2);
            consolidatedChangeYear();
        });
        function consolidatedChangeYear() {
            $year=$('#standalone_current_year').val();
            $('#consolidated_current_year').val($year);
            $('#consolidated_previous_year1').val($year-1)
            $('#consolidated_previous_year2').val($year-2)
        }
        function shift() {
            $('.shift').each(function(){
                var fy15=$(this).closest('.table-description').find('.fy15').val();
                var fy14=$(this).closest('.table-description').find('.fy14').val();
                var shift=(((fy15-fy14)/fy14)*100).toFixed(2);
                if(shift>0)
                    $(this).closest('.table-description').find('.shift').val(shift);
                else if(shift<0)
                    $(this).closest('.table-description').find('.shift').val(shift);
                else
                    $(this).closest('.table-description').find('.shift').val(0);
            });
        }
        //shift();

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
                    var resolution_name="adoption_of_accounts";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofAdoption:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data) {
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
                                        else if(text_area.i) {
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
                                    var financial_indicators = data.financial_indicators;
                                    $('#current_year').val(financial_indicators[0].year1);
                                    $('#previous_year').val(financial_indicators[0].year2);
                                    $(".financial-indicator").each(function(i,d) {
                                        var row = $(this);
                                        if(financial_indicators[i]['fi_current']!="") {
                                            row.find("th").eq(0).find('input').val(financial_indicators[i].field_name);
                                            row.find("th").eq(1).find('input').val(financial_indicators[i].fi_current);
                                            row.find("th").eq(2).find('input').val(financial_indicators[i].fi_previous);
                                            row.find("th").eq(3).find('input').val(financial_indicators[i].shift);
                                            row.find("th").eq(4).find('textarea').val(financial_indicators[i].company_discussion);
                                        }
                                        else {
                                            row.find("th").eq(5).find('button').click();
                                        }
                                    });
                                    var checkbox = data.checkbox;
                                    if(checkbox!=null) {
                                        var j=0;
                                        $(".checkbox").each(function(i,d) {
                                            var $checkboxobj = $(this);
                                            var checked=$(this).val();
                                            if(j!=checkbox.length) {
                                                var saveCheck=checkbox[j]['checkbox'];
                                                if(checked==saveCheck) {
                                                    $checkboxobj.attr('checked',true);
                                                    $checkboxobj.parent().addClass('checked');
                                                    $checkboxobj.trigger('change');
                                                    j++;
                                                }
                                            }
                                        });
                                    }
                                    var unaudited_statements = data.unaudited_statements;
                                    $(".unaudited-statements").each(function(i,d) {
                                        var row = $(this);
                                        if(unaudited_statements[i]['total_assets']!="") {
                                            row.find("th").eq(1).find('input').val(unaudited_statements[i]['total_assets']);
                                            row.find("th").eq(2).find('input').val(unaudited_statements[i]['total_revenue']);
                                            row.find("th").eq(3).find('input').val(unaudited_statements[i]['net_profit']);
                                            row.find("th").eq(4).find('input').val(unaudited_statements[i]['net_cash_flow']);
                                        }
                                        else {
                                            row.find("th").eq(5).find('button').click();
                                        }
                                    });
                                    var rpt = data.rpt;
                                    $('#outstanding_current_year').val(rpt[0].rpt_year1);
                                    $('#outstanding_previous_year').val(rpt[0].rpt_year2);
                                    $(".rpt").each(function(i,d) {
                                        var row = $(this);
                                        if(rpt[i]['rpt_current_year']!="") {
                                            row.find("th").eq(1).find('input').val(rpt[i]['rpt_current_year']);
                                            row.find("th").eq(2).find('input').val(rpt[i]['rpt_previous_year']);
                                            row.find("th").eq(3).find('textarea').val(rpt[i]['rpt_comments']);
                                        }
                                        else {
                                            row.find("th").eq(4).find('button').click();
                                        }
                                    });
                                    var contingent_liabilities = data.contingent_liabilities;
                                    $('#contingent_current_year').val(contingent_liabilities[0].year1);
                                    $('#contingent_previous_year').val(contingent_liabilities[0].year2);
                                    $(".contingent_liabilities").each(function(i,d) {
                                        var row = $(this);
                                        row.find("th").eq(1).find('input').val(contingent_liabilities[i]['cl_current_year']);
                                        row.find("th").eq(2).find('input').val(contingent_liabilities[i]['cl_previous_year']);

                                    });
                                    var standalone_consolidated = data.standalone_consolidated;
                                    $('#standalone_current_year').val(standalone_consolidated[0].sa_year1);
                                    $('#standalone_previous_year1').val(standalone_consolidated[0].sa_year2);
                                    $('#standalone_previous_year2').val(standalone_consolidated[0].sa_year3);
                                    $('#consolidated_current_year').val(standalone_consolidated[0].ca_year1);
                                    $('#consolidated_previous_year1').val(standalone_consolidated[0].ca_year2);
                                    $('#consolidated_previous_year2').val(standalone_consolidated[0].ca_year3);
                                    $(".standalone_consolidated").each(function(i,d) {
                                        var row = $(this);
                                        row.find("th").eq(1).find('input').val(standalone_consolidated[i]['standalone_value1']);
                                        row.find("th").eq(2).find('input').val(standalone_consolidated[i]['standalone_value2']);
                                        row.find("th").eq(3).find('input').val(standalone_consolidated[i]['standalone_value3']);
                                        row.find("th").eq(4).find('input').val(standalone_consolidated[i]['consolidated_value1']);
                                        row.find("th").eq(5).find('input').val(standalone_consolidated[i]['consolidated_value2']);
                                        row.find("th").eq(6).find('input').val(standalone_consolidated[i]['consolidated_value3']);
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