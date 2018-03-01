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
    
    $( ".createBtn" ).click(function() {
        location.href = eventEditReqUrl;
    });
    
    $( ".deleteBtn" ).click(function() {
        var eventId = $(this).attr("data-event-id");
        location.href = eventDeleteReqUrl + "?id=" + eventId;
    });
    
    $( ".removeBtn" ).click(function() {
        var eventId = $(this).attr("data-event-id");
        $(".deleteBtn").attr("data-event-id", eventId);
    });
}