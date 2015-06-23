function CustomJS() {

}
CustomJS.prototype = {
    pageload:function(){
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
                    var resolution_name="delisting_of_shares";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofDelistingOfShares:1,ResolutionName:resolution_name,MainSection:main_section},
                            beforeSend: function() {
                            },
                            success:function(data){
                                console.log(data);
                                setTimeout(function(){
                                var other_text = data.other_text;
                                    $(".other-text").each(function(i,d) {
                                        var text_area = $(this);
                                        if(text_area.hasClass('other-text')) {
                                            text_area.parent().find(".cke_editable_inline").html(other_text[i]['text']);
                                        }
                                        else if(text_area.i) {
                                            text_area.html(other_text[i]['text']);
                                        }
                                    });
                                    var analysis_text = data.analysis;
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_editable_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                    var recommendation_text = data.recommendation;
                                    $(".recommendation-text").each(function(i,d) {
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
