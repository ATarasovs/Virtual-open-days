$(document).ready(function() {
    initButtons();
    var selectedLocationFromParam = getParameterByName('selectedlocation');
    $( ".location" ).each(function() {
        if (this.id == selectedLocationFromParam) {
            console.log(selectedLocationFromParam);
            $(this).addClass("active");
        }
    });
    console.log(selectedLocationFromParam);
    
});

function initButtons() {
    $( ".location" ).click(function() {
        var selectedLocation = this.id;
        console.log(selectedLocation);
        location.href = homeReqUrl + "?selectedlocation=" + selectedLocation;
    });
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
