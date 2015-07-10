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
        $(".recommendation-text").each(function(i,d){
            $(this).addClass('inline-editor');
        });
        var j=10;
        $(".inline-editor").each(function(i,d) {
            $(this).attr("id","inline_editor_"+j);
            CKEDITOR.inline( $(this).attr('id') );
            j++;
        });
        var context = this;
        $("#has_the_remuneration_payable_been_disclosed").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 59
                    },
                    success: function (data) {
                        $("#has_the_remuneration_payable_been_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#has_the_remuneration_payable_been_disclosed_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_remuneration_payable_been_disclosed_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#has_the_remuneration_payable_been_disclosed_analysis_text").addClass('hidden');
            }
        });
        $("#interested_director_part_of_the_selection_process").change(function () {
            var self = $(this);
            if(self.val()=='yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 60
                    },
                    success: function (data) {
                        $("#interested_director_part_of_the_selection_process_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#interested_director_part_of_the_selection_process_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#interested_director_part_of_the_selection_process_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#interested_director_part_of_the_selection_process_analysis_text").addClass('hidden');
            }
        });
        $("#company_have_an_independent_selection_committee").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 61
                    },
                    success: function (data) {
                        $("#company_have_an_independent_selection_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#company_have_an_independent_selection_committee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#company_have_an_independent_selection_committee_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#company_have_an_independent_selection_committee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_remuneration_payable_to_the_person").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 62
                    },
                    success: function (data) {
                        $("#is_the_remuneration_payable_to_the_person_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_remuneration_payable_to_the_person_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_remuneration_payable_to_the_person_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_remuneration_payable_to_the_person_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_process_followed_by_the_company").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 63
                    },
                    success: function (data) {
                        $("#is_the_process_followed_by_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html(data.analysis_text);
                        $("#is_the_process_followed_by_the_company_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_process_followed_by_the_company_analysis_text textarea").parent().find(".cke_textarea_inline").html("");
                $("#is_the_process_followed_by_the_company_analysis_text").addClass('hidden');
            }
        });

        $("#btn_recommendation_text").click(function(){
            // alert("hello");
            var array_recommendations_fire = [];
            var table_id=0;
            $(".recommendations-fire").each(function(i,data){
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
                        // alert("hello");
                        $(".recommendation-text").parent().find(".cke_editable_inline").html(data.recommendation_text);
                    }
                });
            }
        });
    },
    pageload: function() {
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
                    console.log(data);
                    var resolution_name="office_of_profit";
                    if(data.status=="Existing") {
                        console.log("Helloo");
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofOfficeOfProfit:1,ResolutionName:resolution_name,MainSection:main_section},
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
                                            text_area.parent().find(".cke_textarea_inline").html(other_text[i]['text']);
                                    
                                    });
                                    
                                    var analysis_text = data.analysis;
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_editable_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                    var recommendation_text = data.recommendation;
                                    $("textarea[name='recommendation_text[]']").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_editable_inline").html(recommendation_text[i]['recommendation_text']);
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