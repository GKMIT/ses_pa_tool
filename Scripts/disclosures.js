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
                beforeSend: function() {
                    $.loader_add();
                },
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
                                console.log(data);
                                setTimeout(function() {
                                    var disclosures = data.disclosures;
                                    $(".triggers").each(function(i,d) {
                                        $(this).val(disclosures[i]['status']);
                                    });
                                    $(".analysis-text").parent().find(".cke_textarea_inline").html(data.analysis[0].analysis_text);
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