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
}

function loadMessages() {
   $(".chat").load(loadMessagesReqUrl + "?id=" + encodeURIComponent(eventId));
}
setInterval(loadMessages, 5000);