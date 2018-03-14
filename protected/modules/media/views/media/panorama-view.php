<?php 
    $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $location->locationName);
    foreach ($photos as $photo) {
?>      
    <img src="/vod/images/media/panorama/<?php echo $locationName ?>/<?php echo $photo->mediaPath ?>">
<?php } ?>