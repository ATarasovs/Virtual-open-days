$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".viewBtn" ).click(function() {
        var chartId = $(this).attr("data-chart-id");
        location.href = chartViewReqUrl + "?id=" + chartId;
    });
    
    $( ".editBtn" ).click(function() {
        var chartId = $(this).attr("data-chart-id");
        location.href = chartEditReqUrl + "?id=" + chartId;
    });
    
    $( ".createBtn" ).click(function() {
        location.href = chartEditReqUrl;
    });
    
    $( ".deleteBtn" ).click(function() {
        var chartId = $(this).attr("data-chart-id");
        location.href = chartDeleteReqUrl + "?id=" + chartId;
    });
    
    $( ".removeBtn" ).click(function() {
        var chartId = $(this).attr("data-chart-id");
        $(".deleteBtn").attr("data-chart-id", chartId);
    });
}