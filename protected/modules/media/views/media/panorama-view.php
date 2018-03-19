<?php 
    $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $location->locationName);
    foreach ($photos as $photo) {
?>      
    <div id="panorama"></div>
    <!--<img src="/vod/images/media/panorama/<?php // echo $locationName ?>/<?php // echo $photo->mediaPath ?>">-->
<?php } ?>

<script>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "/vod/images/media/panorama/<?php echo $locationName ?>/<?php echo $photo->mediaPath ?>",
        "autoLoad": true
    });
</script>