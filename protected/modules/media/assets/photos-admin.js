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
        var photoId = $(this).parent('a').attr("photo-id");
        console.log(photoId);
//        $('.modal-title').html(title);
        $(".removeBtn").attr("photo-id", photoId);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show:true});
    });
}