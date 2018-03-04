<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Photo Categories', 'url' => array('/media/media/photoscategories')),
            array('name' => 'Photos <small>(' . $location->locationName . ')</small>'),
        ),
    )); 
?>

<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.media.assets').'\photo-admin.js'), CClientScript::POS_HEAD);
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
        <div class="col-lg-3 col-sm-4 col-xs-6"><a data-photo-id="<?php echo $photo->mediaId ?>" data-photo-title="<?php echo $photo->mediaPath ?>" data-photo-folder="<?php echo $photo->locationId ?>" href="javascript:;"><img class="thumbnail img-responsive" src="/vod/images/media/photos/<?php echo $photo->locationId ?>/<?php echo $photo->mediaPath ?>"></a></div>
    <?php } ?>
</div>

<button class="uploadBtn btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Upload</button>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-photo">
        <div class="modal-content">
            <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
                <!--<h3 class="modal-title">Heading</h3>-->
            </div>
            <div class="modal-body">
		
            </div>
            <div class="modal-footer">
                <button class="deleteBtn btn btn-danger">Delete</button>
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var locationId = '<?php print Yii::app()->request->getParam('id') ?>';

    var uploadPhotoReqUrl = '<?php print Yii::app()->createUrl('media/media/uploadphoto') ?>';
    var deletePhotoReqUrl = '<?php print Yii::app()->createUrl('media/media/deletephoto') ?>';
</script>