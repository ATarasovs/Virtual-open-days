<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Categories', 'url' => array('/media/media/panoramacategories')),
            array('name' => '360 degree photos <small>(' . $location->locationName . ')</small>', 'url' => array('/media/media/panoramaadmin?id=' . $location->locationId)),
            array('name' => 'View'),
        ),
    )); 
?>

<div class="row">
    <div class="col-xs-12">
        <div id="infoMessage">
            <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    if ($key == 'notice') {
                        $key = 'warning';
                    }
                    echo '<div class="alert alert-' . $key . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $message . "</div>\n";
                }
            ?>
        </div>
    </div>
</div>
<!--*************************************************************-->

<div class="top30"></div>

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