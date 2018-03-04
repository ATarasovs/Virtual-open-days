$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".viewBtn" ).click(function() {
        var informationId = $(this).attr("data-information-id");
        location.href = informationViewReqUrl + "?id=" + informationId;
    });
    
    $( ".editBtn" ).click(function() {
        var informationId = $(this).attr("data-information-id");
        location.href = informationEditReqUrl + "?id=" + informationId;
    });
    
    $( ".createBtn" ).click(function() {
        location.href = informationEditReqUrl;
    });
    
    $( ".deleteBtn" ).click(function() {
        var informationId = $(this).attr("data-information-id");
        location.href = informationDeleteReqUrl + "?id=" + informationId;
    });
    
    $( ".removeBtn" ).click(function() {
        var informationId = $(this).attr("data-information-id");
        $(".deleteBtn").attr("data-information-id", informationId);
        
    });
}