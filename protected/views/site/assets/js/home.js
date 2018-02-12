$(document).ready(function() {
    $(".homeLi").addClass("active");
    
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
        $(".events").load(loadEventsReqUrl + "?id=" + encodeURIComponent(selectedLocation));

    });
    $( ".event" ).click(function() {
        var eventId = this.id;
        location.href = eventViewReqUrl + "?id=" + eventId;
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
