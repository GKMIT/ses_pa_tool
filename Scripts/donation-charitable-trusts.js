function CustomJS() {

}

CustomJS.prototype = {
    initialization: function() {
        $("textarea[name='used_in_text[]']").each(function(){
            $(this).addClass('other-text');
        });
        $("textarea[name='analysis_text[]']").each(function(){
            $(this).addClass('analysis-text');
        });
        $("textarea[name='recommendation_text[]']").each(function(){
            $(this).addClass('recommendation-text');
        });
        $(".other-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });
        $(".analysis-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });
        $(".recommendation-text").each(function(i,d) {
            $(this).addClass('inline-editor');
        });

        var j=10;

        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });

        var context = this;
        $("#company_making_CSR_contributions_despite").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 51
                    },
                    success: function (data) {
                        $("#company_making_CSR_contributions_despite_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_making_CSR_contributions_despite_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_making_CSR_contributions_despite_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_making_CSR_contributions_despite_analysis_text").addClass('hidden');
            }
        });
        $("#company_making_CSR_contributions_despite_decline").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 52
                    },
                    success: function (data) {
                        $("#company_making_CSR_contributions_despite_decline_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_making_CSR_contributions_despite_decline_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_making_CSR_contributions_despite_decline_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_making_CSR_contributions_despite_decline_analysis_text").addClass('hidden');
            }
        });
        $("#company_spent_more_than_2_the_average_net_profits").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 53
                    },
                    success: function (data) {
                        $("#company_spent_more_than_2_the_average_net_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_spent_more_than_2_the_average_net_profits_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_spent_more_than_2_the_average_net_profits_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_spent_more_than_2_the_average_net_profits_analysis_text").addClass('hidden');
            }
        });
        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 54
                    },
                    success: function (data) {
                        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_spent_more_than_2_of_the_average_net_profits_on_CSR_but_not_paid_analysis_text").addClass('hidden');
            }
        });
        $("#company_disclosed_the_exact_amount_of_contributions").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 55
                    },
                    success: function (data) {
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 56
                    },
                    success: function (data) {
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_disclosed_the_exact_amount_of_contributions_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_disclosed_the_exact_amount_of_contributions_analysis_text").addClass('hidden');
            }
        });
        $("#is_any_director_KMP_interested_in_the_recipients").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 57
                    },
                    success: function (data) {
                        $("#is_any_director_KMP_interested_in_the_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_any_director_KMP_interested_in_the_recipients_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_any_director_KMP_interested_in_the_recipients_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_any_director_KMP_interested_in_the_recipients_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_recipient_entity_part_of_the_promoter").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 58
                    },
                    success: function (data) {
                        $("#is_the_recipient_entity_part_of_the_promoter_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_recipient_entity_part_of_the_promoter_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_recipient_entity_part_of_the_promoter_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_recipient_entity_part_of_the_promoter_analysis_text").addClass('hidden');
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
                    console.log("entered");
                    var resolution_name="donations_to_charitable_trust";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        // console.log("hello");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofDonationsToCharitableTrust:1,ResolutionName:resolution_name,MainSection:main_section},
                            beforeSend: function() {
                            },
                            success:function(data){
                                console.log(data);
                                var triggers = data.triggers;
                                $("select[name='triggers[]']").each(function(i,d) {
                                    var select = $(this);
                                    select.val(triggers[i]['triggers']);
                                    select.trigger('change');
                                });
                                setTimeout(function(){
                                    var other_text = data.other_text;
                                    $(".other-text").each(function(i,d) {
                                        var text_area = $(this);
                                        if(text_area.hasClass('other-text')) {
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
                                    var csr_contributors = data.csr_contributors;
                                    $(".find_tr").each(function(i,d) {
                                        var row = $(this);
                                        row.find('td').eq(0).find('.csr-contributions-year').val(csr_contributors[i].year);
                                        row.find('td').eq(1).find('.csr').val(csr_contributors[i].csr);
                                        row.find('td').eq(2).find('.csr_np').val(csr_contributors[i].csr_np);
                                    });
                                    $.loader_remove();
                                },3000)
                            }
                        });
                    }
                    else {
                        $.loader_remove();
                        $('#edit_mode').val("");
                    }
                }
            });
        });
    }
}
var object = new CustomJS();