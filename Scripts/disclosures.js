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
                                var disclosures = data.disclosures;
                                $(".checkbox").each(function(i,d) {
                                    var $checkboxobj=$(this);
                                    if(disclosures[i]['status']=="yes")
                                    {
                                        $checkboxobj.attr('checked',true);
                                        $checkboxobj.parent().addClass('checked');
                                    }
                                    else {
                                        $checkboxobj.attr('checked',false);
                                        $checkboxobj.parent().removeClass('checked');
                                    }
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