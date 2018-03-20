<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media'),
        ),
    ));
?>

<div class="row">
    <div class="col-md-4">
        <div class="thumbnail" style="height:300px;">
            <a href="<?php print Yii::app()->createUrl('media/media/photoscategories'); ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo.jpg" alt="Lights" style="max-height:230px;">
                <div class="caption center">
                    <h3>Gallery</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="thumbnail" style="height:300px;">
            <a href="<?php print Yii::app()->createUrl('media/media/panoramacategories'); ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/360_photo.jpg" alt="Lights" style="max-height:230px;">
                <div class="caption center">
                    <h3>360 photos</h3>
                </div>
            </a>
        </div>
    </div>
<!--    <div class="col-md-4">
        <div class="thumbnail" style="height:300px;">
            <a href="<?php // print Yii::app()->createUrl('media/media/videos'); ?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/video.jpg" alt="Lights" style="max-height:230px;">
                <div class="caption center">
                   <h3>Videos</h3>
                </div>
            </a>
        </div>
    </div>-->
</div>