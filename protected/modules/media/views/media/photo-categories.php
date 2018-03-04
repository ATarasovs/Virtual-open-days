<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Photo categories'),
        ),
    )); 
?>

<div class="row">
    <?php
        foreach ($locations as $location) {
    ?>
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="<?php print Yii::app()->createUrl('media/media/photosadmin?id=' . $location->locationId); ?>">
                    <?php if ($location->locationImage != "") { ?>  
                        <img src="/vod/images/buildings/<?php echo $location->locationImage ?>" alt="" style="width:100%;">
                    <?php } else {?>
                        <img src="/vod/images/no-image.png" alt="" style="width:100%;">
                    <?php } ?>
                    <div class="caption center">
                        <h3><?php echo $location->locationName ?></h3>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>