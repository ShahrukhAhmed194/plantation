$(document).ready(function() {
    $.ajax({
        url: "tree/total-count",
        type: "GET",
        success: function (result) {
            $("#total_number_of_trees").text(result);
        },
    });

    $.ajax({
        url: "request/total-pending",
        type: "GET",
        success: function (result) {
            $("#total_number_of_pending_requests").text(result);
        },
    });

    $.ajax({
        url: "tree/total-assigned",
        type: "GET",
        success: function (result) {
            $("#total_number_of_assigned_trees").text(result);
        },
    });
});