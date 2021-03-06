$(document).ready(function() {
    $(".eventsLi").addClass("active");
    
    initButtons();
    initKeyPress();
});

function initButtons() {
    $( ".sendBtn" ).click(function() {
        sendMessage();
    });
    
    $( ".hideVideoBtn" ).click(function() {
        $(".leftCol").addClass("hide");
        $(".hideVideoBtn").addClass("hide");
        $(".showVideoBtn").removeClass("hide");
        $(".rightCol").removeClass("col-md-5");
        $(".rightCol").addClass("col-md-offset-3 col-md-6"); 
        $('iframe').attr('src', $('iframe').attr('src'));
    });
    
    $( ".showVideoBtn" ).click(function() {
        $(".leftCol").removeClass("hide");
        $(".hideVideoBtn").removeClass("hide");
        $(".showVideoBtn").addClass("hide");
        $(".rightCol").addClass("col-md-5");
        $(".rightCol").removeClass("col-md-offset-3 col-md-6");  
    });
    
    $( ".startEventBtn" ).click(function() {
        $.ajax({
            method: "POST",
            url: changeStatusEventReqUrl, // here your URL address
            data: {eventId: eventId}
        }); 
        
        $(".startEventBtn").addClass("hide");
        $(".finishEventBtn").removeClass("hide");
        $(".liveLi").removeClass("hide");
        $("#infoMessage").empty();
        $("#infoMessage").append("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>The event started successfully.</div>");
    });
    
    $( ".finishEventBtn" ).click(function() {
        $.ajax({
            method: "POST",
            url: changeStatusEventReqUrl, // here your URL address
            data: {eventId: eventId}
        }); 
        
        $(".finishEventBtn").addClass("hide");
        $(".liveLi").addClass("hide");
        $(".videoLi").removeClass("hide");
        $("#infoMessage").empty();
        $("#infoMessage").append("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>The event finished successfully.</div>");
    });
}

function initKeyPress() {
    $("#message").keypress(function(e) {
        if(e.which == 13) {
            sendMessage();
        }
    });
}

function loadMessages() {
    
//    var scroll = $(".chat").scrollTop();
//    console.log(scroll);
//    $('.panel-body').scrollTop($('.chat')[0].scrollHeight);
    $(".chatLive").load(loadMessagesReqUrl + "?id=" + encodeURIComponent(eventId));
}
setInterval(loadMessages, 5000);

function sendMessage() {
    var message = $("#message").val();
        
    if ($.trim(message).length > 0) {
        $.ajax({
            method: "POST",
            url: sendMessageReqUrl, // here your URL address
            data: { message: message,
                    eventId: eventId}
          }); 
        $("#message").val("");
        loadMessages();
    }
}