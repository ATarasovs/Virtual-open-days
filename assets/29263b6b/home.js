$(document).ready(function() {
    initButtons();
});

function initButtons() {
    $( ".list-group-item" ).click(function() {
    var selectedLocation = this.id;
    console.log(selectedLocation);
//    location.href = reloadReq;
});
}
