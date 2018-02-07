$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".viewBtn" ).click(function() {
        var eventId = $(this).attr("data-event-id");
        location.href = eventViewReqUrl + "?id=" + eventId;
    });
    
    $( ".editBtn" ).click(function() {
        var eventId = $(this).attr("data-event-id");
        location.href = eventEditReqUrl + "?id=" + eventId;
    });
}