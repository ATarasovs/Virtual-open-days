$(document).ready(function() {
    $(".adminLi").addClass("active");
    
//    resizePhotos();
    initButtons();
});

function initButtons() {
    $( ".backBtn" ).click(function() {
            location.href = mediaPhotoCategoriesReqUrl;
        });
    
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

//function resizePhotos() {
//    var divWidth = $('.photodiv').width();
//    console.log(divWidth);
//    $('.photo').each(function() {
//        var maxWidth = divWidth; // Max width for the image
//        var maxHeight = 200;    // Max height for the image
//        var ratio = 0;  // Used for aspect ratio
//        var width = $(this).width();    // Current image width
//        var height = $(this).height();  // Current image height
//
//        // Check if the current width is larger than the max
//        if(width > maxWidth){
//            ratio = maxWidth / width;   // get ratio for scaling image
//            $(this).css("width", maxWidth); // Set new width
//            $(this).css("height", height * ratio);  // Scale height based on ratio
//            height = height * ratio;    // Reset height to match scaled image
//        }
//
//        var width = $(this).width();    // Current image width
//        var height = $(this).height();  // Current image height
//
//        // Check if current height is larger than max
//        if(height > maxHeight){
//            ratio = maxHeight / height; // get ratio for scaling image
//            $(this).css("height", maxHeight);   // Set new height
//            $(this).css("width", width * ratio);    // Scale width based on ratio
//            width = width * ratio;    // Reset width to match scaled image
//        }
//    });
//}