$(document).ready(function() {
    initButtons();
    var selectedLocationFromParam = getParameterByName('selectedlocation');
    console.log(selectedLocationFromParam);
});

function initButtons() {
    $( ".location" ).click(function() {
        var selectedLocation = this.id;
        console.log(selectedLocation);
        location.href = homeReqUrl + "?selectedlocation=" + selectedLocation;
    });
}
