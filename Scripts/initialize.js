function CustomJS() {

}

CustomJS.prototype = {

    initialize: function() {
        $("#com_bse_code").keyup(function() {
            if($(this).val()=="") {
                $(".auto-fill").html();
                $(".auto-fill").addClass('hidden');
                return;
            }
            $.ajax({
                url:"../../jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    get_company_list_filtered:true,
                    keywords:$("#com_bse_code").val()
                },
                success: function(data) {
                    $(".auto-fill").html(data.list);
                    if(data.counts!=0) {
                        $(".auto-fill").removeClass('hidden');
                    }
                    else {
                        $(".auto-fill").addClass('hidden');
                    }
                    initializeLiClicks();
                }
            });
        });
        function initializeLiClicks () {
            $(".auto-fill-ul li").click(function() {
                $("#companies_id").val($(this).attr('data-company-id'));
                $("#com_bse_code").val($(this).html());
                $(".auto-fill").html("");
                $(".auto-fill").addClass('hidden');
            });
        }

        $("#btn_remember_selection").click(function() {
            $.ajax({
                url:"../../jquery-data.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    remember_selection: true,
                    company_name: $("#com_bse_code").val(),
                    financial_year: $("#financial_year").val(),
                    company_id : $("#companies_id").val()
                },
                beforeSend : function() {
                    $("#btn_remember_selection").html("<i class='fa fa-file-text'></i>&nbsp;&nbsp;Processing...");
                },
                success: function(data) {
                    if(data.status=200) {
                        $("#btn_remember_selection").html("<i class='fa fa-file-text'></i>&nbsp;&nbsp;Remember Selection");
                        $.gritter.add({
                            title: 'Info',
                            text: 'Default Selection Activated',
                            sticky: false,
                            time: 3000
                        });
                    }
                }
            });
        });
    }

}
var object = new CustomJS();