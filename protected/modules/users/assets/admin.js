$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".viewBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        location.href = userViewReqUrl + "?id=" + userId;
    });
    
    $( ".editBtn" ).click(function() {
        var userId = $(this).attr("data-user-id");
        location.href = userEditReqUrl + "?id=" + userId;
    });
    
    $( ".createBtn" ).click(function() {
        location.href = userEditReqUrl;
    });
}