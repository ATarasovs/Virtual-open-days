$(document).ready(function() {
    alert("works");
    initButtons();
});

function initButtons() {
    $( ".list-group" ).click(function() {
    alert( "Handler for .click() called." );
});
}
