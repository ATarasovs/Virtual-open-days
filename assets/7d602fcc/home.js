$(document).ready(function() {
    initButtons();
});

function initButtons() {
    $( ".list-group" ).click(function() {
    var selectedLocation = this.id;
    console.log(selectedLocation);
//    location.href = reloadReq;
});
}
