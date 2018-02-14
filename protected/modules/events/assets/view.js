$(document).ready(function() {
    $(".eventsLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".sendBtn" ).click(function() {
        var message = $("#message").val();
        
        $.ajax({
            method: "POST",
            url: sendMessageReqUrl, // here your URL address
            data: { message: message,
                    eventId: eventId}
          }); 
        $("#message").val("");
        loadMessages();
    });
    
    $( ".startEventBtn" ).click(function() {
        $.ajax({
            method: "POST",
            url: changeStatusEventReqUrl, // here your URL address
            data: {eventId: eventId}
        }); 
        
        $(".startEventBtn").addClass("hide");
        $(".finishEventBtn").removeClass("hide");
        $("#infoMessage").append("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>The event started successfully.</div>");
    });
    
    $( ".finishEventBtn" ).click(function() {
        $.ajax({
            method: "POST",
            url: changeStatusEventReqUrl, // here your URL address
            data: {eventId: eventId}
        }); 
        
        $(".finishEventBtn").addClass("hide");
        $("#infoMessage").append("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>The event finished successfully.</div>");
    });
}

function loadMessages() {
   $(".chat").load(loadMessagesReqUrl + "?id=" + encodeURIComponent(eventId));
}
setInterval(loadMessages, 5000);