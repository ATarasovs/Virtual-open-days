$(document).ready(function() {
    initButtons();
});

function initButtons() {
    $( ".list-group" ).click(function() {
    location.href = reloadReq;
});
}
