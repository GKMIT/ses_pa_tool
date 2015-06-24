function CustomJS() {

}

CustomJS.prototype = {
    pageload:function(){
        $(document).ready(function(){
            $(".analysis-text").each(function(i,d) {
                $(this).addClass('inline-editor');
            });
            var j=10;
            $(".inline-editor").each(function(i,d) {
                $(this).attr("id","inline_editor_"+j);
                CKEDITOR.inline( $(this).attr('id') );
                j++;
            });
            var main_section=$('#main_section').val();
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExistingDisclosure:1},
                success:function(data){
                    var resolution_name="";
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofDisclosures:1,ResolutionName:resolution_name,MainSection:main_section},
                            success:function(data){
                                var disclosures = data.disclosures;
                                $(".triggers").each(function(i,d) {
                                    var select = $(this);
                                    select.val(disclosures[i]['status']);
                                });
                                setTimeout(function(){
                                    var analysis_text = data.analysis;
                                    $(".analysis-text").each(function(i,d) {
                                        var text_area = $(this);
                                        text_area.parent().find(".cke_textarea_inline").html(analysis_text[i]['analysis_text']);
                                    });
                                },3000);
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