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
        <div class="col-lg-4">
            <div class="thumbnail" style="height:300px;">
                <a href="<?php print Yii::app()->createUrl('media/media/photosadmin?id=' . $location->locationId); ?>">
                    <?php if ($location->locationImage != "") { ?>  
                        <img src="/vod/images/buildings/<?php echo $location->locationImage ?>" alt="" style="max-height:230px;" >
                    <?php } else {?>
                        <img src="/vod/images/no-image.png" alt="" style="max-height:230px;">
                    <?php } ?>
                    <div class="caption center">
                        <h3><?php echo $location->locationName ?></h3>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<div class="top5"></div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary btn-sm backBtn">
            <i class="fa fa-list-alt bigger-125"></i> <?php print Yii::t('common', 'Back to media'); ?>
        </a>
    </div>
</div>

<script>
    $(document).ready(function() {
        initButtons();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = mediaAdminReqUrl;
        });
    }
    
    mediaAdminReqUrl = '<?php print Yii::app()->createUrl('media/media/admin') ?>';
</script>