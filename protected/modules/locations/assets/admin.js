$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".viewBtn" ).click(function() {
        var locationId = $(this).attr("data-location-id");
        location.href = locationViewReqUrl + "?id=" + locationId;
    });
    
    $( ".editBtn" ).click(function() {
        var locationId = $(this).attr("data-location-id");
        location.href = locationEditReqUrl + "?id=" + locationId;
    });
    
    $( ".createBtn" ).click(function() {
        location.href = locationEditReqUrl;
    });
    
    $( ".deleteBtn" ).click(function() {
        var locationId = $(this).attr("data-location-id");
        location.href = locationDeleteReqUrl + "?id=" + locationId;
    });
    
    $( ".removeBtn" ).click(function() {
        var locationId = $(this).attr("data-location-id");
        $(".deleteBtn").attr("data-location-id", locationId);
    });
}