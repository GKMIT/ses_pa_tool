function CustomJS() {
}
CustomJS.prototype = {
    page15Actions: function() {
        $('#directors_name').change(function(){
            var $din_no=$('#directors_name').val();
            $.ajax({
                url:'jquery-data3.php',
                type:'GET',
                dataType:'JSON',
                data:{ED_Info:1,Din_no:$din_no},
                success:function(data) {
                    $('#current_full_time_position').val(data.no_full_time_positions);
                    $('#education').val(data.education);
                    $('#past_experience').val(data.past_ex);
                    $('#total_directorships').val(data.no_total_directorship);
                    $('#total_committee_membership').val(data.committee_chairmanships);
                    $('#total_committee_chairmanship').val(data.committee_memberships);
                    $('#full_time_role').val(data.no_full_time_positions);
                }
            }),
            $.ajax({
                url:'jquery-data3.php',
                type:'GET',
                dataType:'JSON',
                data:{DirectorRemunerationInfo:1,Din_no:$din_no},
                success:function(data) {
                    if(data['2015']!=0) {
                        $('#past_remuneration_of_the_director').removeClass('hidden');
                        $('.past-remuneration-of-the-director1 td').eq(0).html(data['2015'].rem_year);
                        $('.past-remuneration-of-the-director1 td').eq(1).html(data['2015'].fixed_pay);
                        $fixed_pay=data['2015'].fixed_pay;
                        $variable_pay=data['2015'].variable_pay;
                        $total_pay=parseFloat($fixed_pay)+parseFloat($variable_pay);
                        $('.past-remuneration-of-the-director1 td').eq(2).html($total_pay);
                    }
                    else {
                        $('.past-remuneration-of-the-director1 td').eq(0).html(0);
                        $('.past-remuneration-of-the-director1 td').eq(1).html(0);
                        $('.past-remuneration-of-the-director1 td').eq(2).html(0);
                    }
                    if(data['2014'] !=0) {
                        $('.past-remuneration-of-the-director2 td').eq(0).html(data['2014'].rem_year);
                        $('.past-remuneration-of-the-director2 td').eq(1).html(data['2014'].fixed_pay);
                        $fixed_pay=data['2014'].fixed_pay;
                        $variable_pay=data['2014'].variable_pay;
                        $total_pay=parseFloat($fixed_pay)+parseFloat($variable_pay);
                        $('.past-remuneration-of-the-director2 td').eq(2).html($total_pay);
                    }
                    else {
                        $('.past-remuneration-of-the-director2 td').eq(0).html(0);
                        $('.past-remuneration-of-the-director2 td').eq(1).html(0);
                        $('.past-remuneration-of-the-director2 td').eq(2).html(0);
                    }
                    if(data['2013'] !=0) {
                        $('.past-remuneration-of-the-director3 td').eq(0).html(data['2013'].rem_year);
                        $('.past-remuneration-of-the-director3 td').eq(1).html(data['2013'].fixed_pay);
                        $fixed_pay=data['2013'].fixed_pay;
                        $variable_pay=data['2013'].variable_pay;
                        $total_pay=parseFloat($fixed_pay)+parseFloat($variable_pay);
                        $('.past-remuneration-of-the-director3 td').eq(2).html($total_pay);
                    }
                    else {
                        $('.past-remuneration-of-the-director3 td').eq(0).html(0);
                        $('.past-remuneration-of-the-director3 td').eq(1).html(0);
                        $('.past-remuneration-of-the-director3 td').eq(2).html(0);
                    }
                    }
            });
            $.ajax({
                url:'jquery-data3.php',
                type:'GET',
                dataType:'JSON',
                data:{Directors_performance:1,Din_no:$din_no},
                success:function(data) {
                    $('#last_3_agms').val(data.agm_per);
                    $('#board_meetings_held_last_year').val(data.director_board_last_avg);
                    $('#board_meetings_in_last_3_years').val(data.director_board_attendance_avg);
                    $('#audit_commitee_meetings_held_last_year').val(data.audit_last_avg);
                    $('#audit_commitee_meetings_in_last_3_year').val(data.audit_committee_attendance_avg);
                    $('#ig_committee_meetings_held_last_year').val(data.investors_grievance_last_avg);
                    $('#ig_committee_meetings_in_last_3_year').val(data.investors_grievance_attendance_avg);
                }
            });
            $.ajax({
                url:'jquery-data3.php',
                type:'GET',
                dataType:'JSON',
                data:{Remuniration_Info:1,Din_no:$din_no},
                success:function(data) {
                    $(".remuneration-of-the-director1").find("td").eq(1).html(data.rem_first);
                    $(".remuneration-of-the-director2").find("td").eq(1).html(data.rem_second);
                    $(".remuneration-of-the-director3").find("td").eq(1).html(data.rem_third);
                    $(".remuneration-of-the-director4").find("td").eq(1).html(data.rem_fourth);
                    $(".remuneration-of-the-director5").find("td").eq(1).html(data.rem_fifth);

                    var tsr_info = data.tsr_info;

                    $(".remuneration-of-the-director1").find("td").eq(2).html(tsr_info[4]);
                    $(".remuneration-of-the-director2").find("td").eq(2).html(tsr_info[3]);
                    $(".remuneration-of-the-director3").find("td").eq(2).html(tsr_info[2]);
                    $(".remuneration-of-the-director4").find("td").eq(2).html(tsr_info[1]);
                    $(".remuneration-of-the-director5").find("td").eq(2).html(tsr_info[0]);

                    var cagr_info = data.cagr_info;

                    $(".remuneration-of-the-director1").find("td").eq(3).html(cagr_info[4]);
                    $(".remuneration-of-the-director2").find("td").eq(3).html(cagr_info[3]);
                    $(".remuneration-of-the-director3").find("td").eq(3).html(cagr_info[2]);
                    $(".remuneration-of-the-director4").find("td").eq(3).html(cagr_info[1]);
                    $(".remuneration-of-the-director5").find("td").eq(3).html(cagr_info[0]);

                }
            });
            $.ajax({
                url:'jquery-data3.php',
                type:'GET',
                dataType:'JSON',
                data:{
                    executive_remuneration_peer_comparision:1,
                    din_no:$din_no
                },
                success:function(data) {
                    console.log(data);
                    $(".executive-remuneration-peer-comparision-row-1 td").eq(0).html($('#directors_name').find('option:selected').text());
                    $(".executive-remuneration-peer-comparision-row-2 td").eq(0).html(data.company_name);
                    $(".executive-remuneration-peer-comparision-row-3 td").eq(0).html(data.promoter);
                    $(".executive-remuneration-peer-comparision-row-4 td").eq(0).html(data.remuneration);
                    $(".executive-remuneration-peer-comparision-row-5 td").eq(0).html(data.net_profit);
                    $(".executive-remuneration-peer-comparision-row-6 td").eq(0).html(data.rem_by_net_profit);
                }
            });
        });
    }
}
var object = new CustomJS();
