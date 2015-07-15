function CustomJS() {
}
CustomJS.prototype = {
    initialization: function(flag) {
        if(flag) {
            swal({
                    title: "Committee Performance saved successfully"
                },
                function() {
                    window.location = "remuneration-analysis.php";
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
        $("#leader_independent_director").change(function () {
            var drop_down = $(this);
            var select_option_score_value = drop_down.find("option:selected").attr('data-score');
            $("#leader_independent_director_score").val(select_option_score_value);
        });
        $("#did_independent_directors_meet").change(function () {
            var drop_down = $(this);
            var select_option_score_value = drop_down.find("option:selected").attr('data-score');
            $("#did_independent_directors_meet_score").val(select_option_score_value);
        });
        $("#any_directors_on_the_board_related").change(function () {
            var drop_down = $(this);
            var select_option_score_value = drop_down.find("option:selected").attr('data-score');
            $("#any_directors_on_the_board_related_score").val(select_option_score_value);
        });
        $("#directors_been_elected_by_the_company").change(function () {
            var drop_down = $(this);
            var select_option_score_value = drop_down.find("option:selected").attr('data-score');
            $("#directors_been_elected_by_the_company_score").val(select_option_score_value);
        });
        $("#independent_directors_ex").keyup(function() {
            if($(this).val()!="") {
                var total_ids = $("#ses_id_classification").val();
                var response = $(this).val();
                var score = ((total_ids-response)/total_ids)*10;
                score = Math.round(score);
                $("#independent_directors_ex_score").val(score);
            }
            else {
                $("#independent_directors_ex_score").val("");
            }
        });
        $("#independent_directors_have_shareholdings_response").keyup(function() {
            if($(this).val()!="") {
                var total_company_ids = $("#company_id_classification").val();
                var response = $(this).val();
                var score = ((total_company_ids-response)/total_company_ids)*5;
                score = Math.round(score);
                $("#independent_directors_have_shareholdings_score").val(score);
            }
            else {
                $("#independent_directors_have_shareholdings_score").val("");
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
                data:{CheckDataExistingOfCommiteePerformance:1},
                success:function(data) {
                    var resolution_name="";
                    if(data) {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofCommitteePerformance:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                var analysis_text = data.analysis;

                                setTimeout(function() {
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_textarea_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                },3000);

                                var commitee_performance = data.commitee_performance;
                                console.log(commitee_performance);
                                $(".commitee-performance").each(function(i,d) {
                                    var row = $(this);
                                    //var overall_com_independence=Math.(commitee_performance[i].overall_com_independence);
                                    //var overall_ses_independence=Math.(commitee_performance[i].overall_ses_independence);
                                    row.find("td").eq(1).find('input').val(commitee_performance[i].total);
                                    row.find("td").eq(2).find('input').val(commitee_performance[i].chairman_com_classification);
                                    row.find("td").eq(3).find('input').val(commitee_performance[i].chairman_ses_classification);
                                    row.find("td").eq(4).find('input').val(commitee_performance[i].overall_com_independence);
                                    row.find("td").eq(5).find('input').val(commitee_performance[i].overall_ses_independence);
                                    row.find("td").eq(6).find('input').val(commitee_performance[i].no_meetings);
                                    row.find("td").eq(7).find('input').val(commitee_performance[i].attendance_less_75);
                                });
                                var board_governance_score = data.board_governance_score;
                                $(".board-governance-score").each(function(i,d) {
                                    var row = $(this);
                                    if(row.find("td").eq(1).find('input').length>0) {
                                        row.find("td").eq(1).find('input').val(board_governance_score[i].response);
                                    }
                                    else {
                                        row.find("td").eq(1).find('select').val(board_governance_score[i].response);
                                        row.find("td").eq(1).find('select').trigger('change');
                                    }
                                    row.find("td").eq(2).find('input').val(board_governance_score[i].score);
                                });
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
