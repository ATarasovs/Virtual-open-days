$(document).ready(function() {
    initButtons();
});

function initButtons() {
    $( ".location" ).click(function() {
        var selectedLocation = this.id;
        console.log(selectedLocation);
        location.href = homeReqUrl + "?selectedlocation=" + selectedLocation;
    });
}
