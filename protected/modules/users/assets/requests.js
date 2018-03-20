$(document).ready(function() {
    $(".requestsLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".acceptBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        $(".acceptRequestBtn").attr("data-user-id", userId);
    });
    
    $( ".acceptRequestBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        location.href = changeStatusReqUrl + "?id=" + userId + "&status=accept";
    });
    
    $( ".declineBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        $(".declineRequestBtn").attr("data-user-id", userId);
    });
    
    $( ".declineRequestBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        location.href = changeStatusReqUrl + "?id=" + userId + "&status=decline";
    });
}