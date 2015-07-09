function CustomJS() {

}

CustomJS.prototype = {
    initialization: function(flag) {
        if(flag) {
            swal({
                    title: "Remuneration info saved successfully"
                },
                function() {
                    window.location = "disclosures.php";
                }
            );
        }
        $(".analysis-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });
        var j=10;
        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });
        $("#remuneration_years").change(function() {
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
                        var total_pay = 0;
                        $("#rem_second_year").val($("#remuneration_years").val()-1);
                        $("#rem_third_year").val($("#remuneration_years").val()-2);
                        var no_directors = data.length;
                        for(var i=0;i<no_directors;i++) {
                            if(data[i].first_year_fixed_pay!="NA") {
                                var val = parseFloat(data[i].first_year_fixed_pay).toFixed(2);
                                $("#remuneration_table_body tr").eq(i).find("td").eq(2).find("input").val(val);
                            }
                            else
                                $("#remuneration_table_body tr").eq(i).find("td").eq(2).find("input").val(data[i].first_year_fixed_pay);
                            if(data[i].first_year_fixed_pay!="NA" && data[i].first_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].first_year_fixed_pay)+parseFloat(data[i].first_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(3).find("input").val(total_pay);

                            if(data[i].second_year_fixed_pay!="NA") {
                                var val = parseFloat(data[i].second_year_fixed_pay).toFixed(2);
                                $("#remuneration_table_body tr").eq(i).find("td").eq(4).find("input").val(val);
                            }
                            else
                                $("#remuneration_table_body tr").eq(i).find("td").eq(4).find("input").val(data[i].second_year_fixed_pay);

                            if(data[i].second_year_fixed_pay!="NA" && data[i].second_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].second_year_fixed_pay)+parseFloat(data[i].second_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(5).find("input").val(total_pay);
                            if(data[i].third_year_fixed_pay!="NA") {
                                var val = parseFloat(data[i].third_year_fixed_pay).toFixed(2);
                                $("#remuneration_table_body tr").eq(i).find("td").eq(6).find("input").val(val);
                            }
                            else
                                $("#remuneration_table_body tr").eq(i).find("td").eq(6).find("input").val(data[i].third_year_fixed_pay);
                            if(data[i].third_year_fixed_pay!="NA" && data[i].third_year_variable_pay!="NA") {
                                total_pay = parseFloat(data[i].third_year_fixed_pay)+parseFloat(data[i].third_year_variable_pay);
                                total_pay = total_pay.toFixed(2);
                            }
                            else {
                                total_pay = "NA";
                            }
                            $("#remuneration_table_body tr").eq(i).find("td").eq(7).find("input").val(total_pay);
                            $("#remuneration_table_body tr").eq(i).find("td").eq(8).find("input").val(data[i].ratio_to_mre);
                        }
                    }
                });
            }
        });
        $("#indexed_tsr_year_start_year").change(function () {
            $.ajax({
                url:"jquery-data-2.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    dividend_data_5_years:true,
                    first_year:$("#indexed_tsr_year_start_year").val(),
                    highest_paid_ed : $(".din_numbers").eq(0).val()
                },
                success: function(data) {
                    var indexed_tsr = 0;
                    for(var i= 4,j=0;i>=0;i--,j++) {
                        if(j!=0) {
                            $("#indexed_tsr_tbody tr").eq(j).find("td").eq(0).find("input").val(data.dividend_data[i].year);
                        }
                        $("#indexed_tsr_tbody tr").eq(j).find("td").eq(1).find("input").val(data.dividend_data[i].market_price_start);
                        $("#indexed_tsr_tbody tr").eq(j).find("td").eq(2).find("input").val(data.dividend_data[i].market_price_end);
                        $("#indexed_tsr_tbody tr").eq(j).find("td").eq(3).find("input").val(data.dividend_data[i].dividend);
                        $("#indexed_tsr_tbody tr").eq(j).find("td").eq(4).find("input").val(data.dividend_data[i].total_dividend);

                        $("#remuneration_growth tr").eq(j).find("td").eq(0).find("input").val(data.remuneration_growth[i].year);
                        $("#remuneration_growth tr").eq(j).find("td").eq(1).find("input").val(data.remuneration_growth[i].total_pay);
                        if(data.remuneration_growth[i].indexed_tsr==null)
                            indexed_tsr = 0;
                        else
                            indexed_tsr = data.remuneration_growth[i].indexed_tsr.toFixed(2);
                        $("#remuneration_growth tr").eq(j).find("td").eq(2).find("input").val(indexed_tsr);
                    }
                }
            });
        });


        function calculatePercentage(data_col_id) {
            var rem_percent = $("#rem_percent_"+data_col_id).val();
            var net_profit = $("#net_profit_"+data_col_id).val();
            if(rem_percent!="" && net_profit!="") {
                $("#percentage_"+data_col_id).val((rem_percent/net_profit*100).toFixed(2));
            }
        }

        $(".rem_percent,.net_profit").keyup(function() {
            calculatePercentage($(this).attr('data-col-id'));
        });
    },
    pageload:function(){
        $(document).ready(function(){
            var main_section=$('#main_section').val();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExistingOfRemunerationAnalysis:1},
                success:function(data){
                    var resolution_name="";
                    if(data) {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofRemunerationAnalysis:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                var analysis_text = data.analysis;
                                setTimeout(function() {
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_textarea_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                },3000);
                                var remuneration_analysis = data.remuneration_analysis;
                                $('#remuneration_years').val(remuneration_analysis[0].rem_first_year);
                                $('#rem_second_year').val(remuneration_analysis[0].rem_second_year);
                                $('#rem_third_year').val(remuneration_analysis[0].rem_third_year);
                                $(".remuneration-analysis").each(function(i,d) {
                                    var row = $(this);
                                    row.find("td").eq(0).find('input').val(remuneration_analysis[i].director_name);
                                    row.find("td").eq(0).find('input.din_numbers').val(remuneration_analysis[i].dir_din_no);
                                    row.find("td").eq(1).find('select').val(remuneration_analysis[i].promoter_non_promoter);
                                    row.find("td").eq(2).find('input').val(remuneration_analysis[i].fixed_pay_first_year);
                                    row.find("td").eq(3).find('input').val(remuneration_analysis[i].total_pay_first_year);
                                    row.find("td").eq(4).find('input').val(remuneration_analysis[i].fixed_pay_second_year);
                                    row.find("td").eq(5).find('input').val(remuneration_analysis[i].total_pay_second_year);
                                    row.find("td").eq(6).find('input').val(remuneration_analysis[i].fixed_pay_third_year);
                                    row.find("td").eq(7).find('input').val(remuneration_analysis[i].total_pay_third_year);
                                    row.find("td").eq(8).find('input').val(remuneration_analysis[i].ratio);
                                });
                                var executive_remuneration_growth = data.executive_remuneration_growth;
                                $(".remuneration_growth").each(function(i,d) {
                                    var row = $(this);
                                    row.find("td").eq(0).find('input').val(executive_remuneration_growth[i].financial_year);
                                    row.find("td").eq(1).find('input').val(executive_remuneration_growth[i].md);
                                    row.find("td").eq(2).find('input').val(executive_remuneration_growth[i].indexed_tsr);
                                });
                                var variation_director_remuneration=data.variation_director_remuneration;
                                $('.ex_promoter').val(variation_director_remuneration[0].ex_promoter);
                                $('.ex_non_promoter').val(variation_director_remuneration[0].ex_non_promoter);
                                $('.non_ex_promoter').val(variation_director_remuneration[0].non_ex_promoter);
                                $('.non_ex_non_promoter').val(variation_director_remuneration[0].non_ex_non_promoter);

                                $('.dividend-in-the-year').addClass("hidden");
                                var executive_remuneration_peer_comparison = data.executive_remuneration_peer_comparison;
                                $('.company1').find("input").val(executive_remuneration_peer_comparison[0].company_name);
                                $('.company2').find("input").val(executive_remuneration_peer_comparison[1].company_name);
                                $('.company3').find("input").val(executive_remuneration_peer_comparison[2].company_name);

                                $('.director1').find("input").val(executive_remuneration_peer_comparison[0].director_name);
                                $('.director2').find("input").val(executive_remuneration_peer_comparison[1].director_name);
                                $('.director3').find("input").val(executive_remuneration_peer_comparison[2].director_name);

                                $('.promoter1').find("input").val(executive_remuneration_peer_comparison[0].promoter_group);
                                $('.promoter2').find("input").val(executive_remuneration_peer_comparison[1].promoter_group);
                                $('.promoter3').find("input").val(executive_remuneration_peer_comparison[2].promoter_group);

                                $('.remuneration1').find("input").val(executive_remuneration_peer_comparison[0].remuneration);
                                $('.remuneration2').find("input").val(executive_remuneration_peer_comparison[1].remuneration);
                                $('.remuneration3').find("input").val(executive_remuneration_peer_comparison[2].remuneration);

                                $('.net-profit1').find("input").val(executive_remuneration_peer_comparison[0].net_profits);
                                $('.net-profit2').find("input").val(executive_remuneration_peer_comparison[1].net_profits);
                                $('.net-profit3').find("input").val(executive_remuneration_peer_comparison[2].net_profits);

                                $('.percentage1').find("input").val(executive_remuneration_peer_comparison[0].rem_percentage);
                                $('.percentage2').find("input").val(executive_remuneration_peer_comparison[1].rem_percentage);
                                $('.percentage3').find("input").val(executive_remuneration_peer_comparison[2].rem_percentage);
                            }
                        });
                    }
                    else {
                        $('#edit_mode').val("");
                    }
                }
            });
        });
    }
}
var object = new CustomJS();