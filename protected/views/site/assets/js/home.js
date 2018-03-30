$(document).ready(function() {
    $(".homeLi").addClass("active");
    
    initButtons();
    
    var selectedLocationFromParam = getParameterByName('selectedlocation');
    $( ".location" ).each(function() {
        if (this.id == selectedLocationFromParam) {
            $(this).addClass("active");
        }
    });
});

function initButtons() {
    $( ".location" ).click(function() {
        var selectedLocation = this.id;
        $(".events").load(loadEventsReqUrl + "?id=" + encodeURIComponent(selectedLocation));

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
