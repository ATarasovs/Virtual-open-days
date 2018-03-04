<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Photo categories', 'url' => array('/media/media/photoscategories')),
            array('name' => 'Photos <small>(' . $location->locationName . ')</small>', 'url' => array('/media/media/photosadmin?id=' . $location->locationId)),
            array('name' => 'Upload photo'),
        ),
    )); 
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

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'upload-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'image', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->fileField($model, 'image'); ?>
    </div>
</div>

<div class="top15"></div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo CHtml::htmlButton('<i class="ace-icon fa fa-upload bigger-125"></i> Upload', array(
                'class' => 'btn btn-success btn-sm operationBtn',
                'encode' => false,
                'type' => 'submit',
                'id' => 'sendBtn')
            );
        ?>

        <a class="btn btn-primary btn-sm backBtn">
            <i class="fa fa-file-image-o bigger-125"></i> <?php print Yii::t('common', 'Back to photos'); ?>
        </a>
    </div>
</div>

<?php $this->endWidget(); ?>


<script>
    var locationId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    $(document).ready(function() {
        initButtons();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = mediaPhotosReqUrl + "?id=" + locationId;
        });
    }
    
    var mediaPhotosReqUrl = '<?php print Yii::app()->createUrl('media/media/photosadmin') ?>';
</script>