function CustomJS() {

}
CustomJS.prototype={
    initialization:function() {
        var context=this;
        $('#btn_add_row').click(function(){
            $cloned_row=$('.template .row-copy').clone();
            $cloned_row.removeClass('row-copy');
            $cloned_row.find('button').removeClass('disabled');
            $('.template').append($cloned_row);
            $cloned_row.find('input').val("");
            deleteRow();
        });
        function deleteRow() {
            $('.btn-delete-row').click(function(){
                $(this).closest('.description-row').remove();
            });
        }
        $("#has_the_company_placed_an_absolute_cap_on_commission").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 166
                    },
                    success: function (data) {
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text textarea").html("");
                $("#has_the_company_placed_an_absolute_cap_on_commission_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_disclosed_the_objective_remuneration").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 167
                    },
                    success: function (data) {
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#has_the_company_disclosed_the_objective_remuneration_analysis_text textarea").html("");
                $("#has_the_company_disclosed_the_objective_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#does_the_commission_plus_sitting_fee").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 168
                    },
                    success: function (data) {
                        $("#does_the_commission_plus_sitting_fee_analysis_text textarea").html(data.analysis_text);
                        $("#does_the_commission_plus_sitting_fee_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#does_the_commission_plus_sitting_fee_analysis_text textarea").html("");
                $("#does_the_commission_plus_sitting_fee_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_in_excess").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 169
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_in_excess_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_commission_paid_in_excess_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_in_excess_analysis_text textarea").html("");
                $("#is_the_commission_paid_in_excess_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_to_individual_directors").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 170
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_to_individual_directors_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_commission_paid_to_individual_directors_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_to_individual_directors_analysis_text textarea").html("");
                $("#is_the_commission_paid_to_individual_directors_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_commission_paid_to_select_directors").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 171
                    },
                    success: function (data) {
                        $("#is_the_commission_paid_to_select_directors_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_commission_paid_to_select_directors_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_commission_paid_to_select_directors_analysis_text textarea").html("");
                $("#is_the_commission_paid_to_select_directors_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_nomination_and_remuneration").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 172
                    },
                    success: function (data) {
                        $("#is_the_nomination_and_remuneration_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_nomination_and_remuneration_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_nomination_and_remuneration_analysis_text textarea").html("");
                $("#is_the_nomination_and_remuneration_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_distribution_of_commission").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 173
                    },
                    success: function (data) {
                        $("#is_the_distribution_of_commission_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_distribution_of_commission_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_distribution_of_commission_analysis_text textarea").html("");
                $("#is_the_distribution_of_commission_analysis_text").addClass('hidden');
            }
        });
        $("#is_the_company_seeking_shareholders").change(function () {
            var self = $(this);
            if(self.val()=='no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 174
                    },
                    success: function (data) {
                        $("#is_the_company_seeking_shareholders_analysis_text textarea").html(data.analysis_text);
                        $("#is_the_company_seeking_shareholders_analysis_text").removeClass('hidden');
                    }
                });
            }
            else {
                $("#is_the_company_seeking_shareholders_analysis_text textarea").html("");
                $("#is_the_company_seeking_shareholders_analysis_text").addClass('hidden');
            }
        });
        $("#has_the_company_paid_disproportionate_commission").change(function () {
            var self = $(this);
            var one_qus = $('#has_the_company_placed_an_absolute_cap_on_commission').val();
            var second_qus = $('#has_the_company_disclosed_the_objective_remuneration').val();
            if (self.val() == 'no' && one_qus == 'yes' && second_qus == 'yes') {
                $.ajax({
                url: "jquery-data.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    standard_analysis_text: true,
                    table_id: 175
                },
                success: function (data) {
                    $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html(data.analysis_text);
                    $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                    $('#table_id').attr("data-recommendation-table-id","118");
                 }
                });
            }
            else if (self.val() == 'no' && one_qus == 'no' && second_qus == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 176
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","119");
                    }
                });
            }
            else if (self.val() == 'no' && one_qus == 'no' && second_qus == 'yes') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 177
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","120");
                    }
                });
            }
            else if (self.val() == 'no' && one_qus == 'yes' && second_qus == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 178
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","121");
                    }
                });
            }
            else if (self.val() == 'yes' && one_qus == 'no' && second_qus == 'no') {
                $.ajax({
                    url: "jquery-data.php",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        standard_analysis_text: true,
                        table_id: 179
                    },
                    success: function (data) {
                        $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html(data.analysis_text);
                        $("#has_the_company_paid_disproportionate_commission_analysis_text").removeClass('hidden');
                        $('#table_id').attr("data-recommendation-table-id","122");
                    }
                });
            }
            else {
                $("#has_the_company_paid_disproportionate_commission_analysis_text textarea").html("");
                $("#has_the_company_paid_disproportionate_commission_analysis_text").addClass('hidden');
            }
        });
        $("#btn_recommendation_text").click(function(){
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
                        $("#recommendation_text").html(data.recommendation_text);
                    }
                });
            }
        });
    }
}
var object = new CustomJS();