$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".uploadBtn" ).click(function() {
      location.href = uploadPhotoReqUrl + "?id=" + locationId;
    });
}