$(document).ready(function() {
    $(".adminLi").addClass("active");
    
    initButtons();
});

function initButtons() {
    $( ".uploadBtn" ).click(function() {
      location.href = uploadPhotoReqUrl + "?id=" + locationId;
    });
    
    $('.thumbnail').click(function(){
        $('.modal-body').empty();
        
        var photoId = $(this).parent('a').attr("data-photo-id");
        var photoTitle = $(this).parent('a').attr("data-photo-title");
        var photoFolder = $(this).parent('a').attr("data-photo-folder");
        
        $(".deleteBtn").attr("data-photo-id", photoId);
        $(".deleteBtn").attr("data-photo-title", photoTitle);
        $(".deleteBtn").attr("data-photo-folder", photoFolder);
        
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show:true});
    });
    
    $( ".deleteBtn" ).click(function() {
        
        var photoId = $(this).attr("data-photo-id");
        var photoTitle = $(this).attr("data-photo-title");
        var photoFolder = $(this).attr("data-photo-folder");
        
        location.href = deletePhotoReqUrl + "?id=" + photoId + "&title=" + photoTitle + "&folder=" + photoFolder + "&locationid=" + locationId;
        
    });
}