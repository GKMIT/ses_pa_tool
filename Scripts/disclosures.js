function CustomJS() {

}

CustomJS.prototype = {
    pageload:function(){
        $(document).ready(function(){
            $.ajax({
                url:'jquery-data.php',
                type:'GET',
                dataType:'JSON',
                data:{CheckDataExistingDisclosure:1},
                success:function(data){
                    if(data.status=="Existing") {
                        $('#edit_mode').val("Edit Mode");
                        $.ajax({
                            url:'jquery-data.php',
                            type:'GET',
                            dataType:'JSON',
                            data:{GetExistingDataofDisclosures:1},
                            success:function(data){
                                console.log(data);
                                var disclosures = data.disclosures;
                                $(".trigger").each(function(i,d) {
                                    $(this).val(disclosures[i]['status']);
                                });
                                $(".analysis-text").val(data.analysis[0].analysis_text);
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