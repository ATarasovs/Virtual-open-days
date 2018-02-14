$(document).ready(function() {
    $(".eventsLi").addClass("active");
    
    initButtons();
    initSwitch();
    
     $('.event-details').css('display','none');
    $('.event-details').css('height','auto');
    $('.event-details').css('margin-top','-17px');
    $('.event-details > .info').css('height','auto');
    $('.disabled').prev().css('cursor','default');

});

function initButtons() {
    
    $( ".viewBtn" ).click(function() {
        var eventId = $(this).attr("data-event-id");
        location.href = eventViewReqUrl + "?id=" + eventId;
    });
    
    $('.event-list > li > time').click(function() {
        if (!$(this).parent().nextAll('.event-details').first().hasClass('disabled')) {
            $(this).parent().nextAll('.event-details').first().height('auto');
            $(this).parent().nextAll('.event-details').first().nextAll('.info').first().height('auto');
            $(this).parent().nextAll('.event-details').first().slideToggle();
        }
    });
    $('.event-list > li > img').click(function() {
        if (!$(this).parent().nextAll('.event-details').first().hasClass('disabled')) {
            $(this).parent().nextAll('.event-details').first().height('auto');
            $(this).parent().nextAll('.event-details').first().nextAll('.info').first().height('auto');
            $(this).parent().nextAll('.event-details').first().slideToggle();
        }
    });
    $('.event-list > li > .information').click(function() {
        if (!$(this).parent().nextAll('.event-details').first().hasClass('disabled')) {
            $(this).parent().nextAll('.event-details').first().height('auto');
            $(this).parent().nextAll('.event-details').first().nextAll('.info').first().height('auto');
            $(this).parent().nextAll('.event-details').first().slideToggle();
        }
    });
}

function initSwitch() {

    
    $( ".switchSubscribe" ).click(function() {
        var eventId = $(this).attr("id");
        
        var status = $(this).prop( "checked" ).toString();
        
        $.ajax({
            method: "POST",
            url: subscribeReqUrl, // here your URL address
            data: { eventId: eventId,
                    status: status}
          }); 
        console.log(status);
    });
}