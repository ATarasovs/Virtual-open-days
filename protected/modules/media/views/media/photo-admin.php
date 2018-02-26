<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.media.assets').'\photos-admin.js'), CClientScript::POS_HEAD);
?>

<!--*************************************************************-->
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
<div class="row">
    <?php foreach ($photos as $photo) { ?>
        <div class="col-sm-4">
            <span class="left"><img class="img" src="/vod/images/media/photos/<?php echo $photo->locationId ?>/<?php echo $photo->mediaPath ?>" alt=""></span>
        </div>
    <?php } ?>
</div>

<button class="uploadBtn btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Upload</button>

<script>
    var locationId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    uploadPhotoReqUrl = '<?php print Yii::app()->createUrl('media/media/uploadphoto') ?>';
</script>