function CustomJS() {

}
CustomJS.prototype = {
    initializePage: function() {

        function loadTables () {
            $.ajax({
                url:"jquery-data.php",
                type:"GET",
                dataType: "JSON",
                data:{
                    load_dashboard:true
                },
                success: function(data) {
                    $("#incomplete_reports_table").html(data.incomplete_reports);
                    $("#complete_reports_table").html(data.complete_reports);
                    $(".number-completed-reports").html(data.complete_count);
                    $(".number-incomplete-reports").html(data.incomplete_count);
                    intializeButtonTriggers();
                }
            });
        }

        loadTables();
        intializeButtonTriggers();

        function intializeButtonTriggers() {

            $(".continue-with-report").click(function() {
                var self= $(this);
                self.html("Processing....");
                $.ajax({
                    url:"jquery-data.php",
                    type:"POST",
                    dataType: "JSON",
                    data:{
                        set_start_report:true,
                        report_id:self.attr('data-report-id')
                    },
                    success: function(data) {
                        loadTables();
                    }
                });
            });

            $(".mark-completed").click(function() {
                var self= $(this);
                self.html("Processing....");
                $.ajax({
                    url:"jquery-data.php",
                    type:"GET",
                    dataType: "JSON",
                    data:{
                        mark_completed:true,
                        report_id:self.attr('data-report-id')
                    },
                    success: function(data) {
                        loadTables();
                    }
                });
            });

        }

    }
}
var object = new CustomJS();