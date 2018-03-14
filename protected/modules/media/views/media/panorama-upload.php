<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Categories', 'url' => array('/media/media/panoramacategories')),
            array('name' => '360 degree photos <small>(' . $location->locationName . ')</small>', 'url' => array('/media/media/panoramaadmin?id=' . $location->locationId)),
            array('name' => 'Upload'),
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

<div class="top30"></div>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'uploadform',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'dropzone dz-clickable'
    ),
    'action' => array( '/media/media/uploadpanoramatoserver?id=' . Yii::app()->request->getParam('id') ),
)); ?>

    <div class="dz-message">Drop 360 degree photos here or click to upload.
        <br> <span class="note">(Only these extensions of images are allowed: <b>jpg, jpeg, png, bmp</b>)</span><br/>
        <img src='/vod/images/upload.png' style="max-width:20%">
    </div>

<?php $this->endWidget(); ?>

<div class="top30"></div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary btn-sm backBtn">
            <i class="fa fa-file-image-o bigger-125"></i> <?php print Yii::t('common', 'Back to photos'); ?>
        </a>
    </div>
</div>

<script type="text/javascript">
   Dropzone.options.uploadform = {
        accept: function(file, done) {
            console.log(file);
            if (file.type != "image/jpeg" && file.type != "image/bmp" && file.type != "image/png" && file.type != "image/giff" && file.type != "image/jpg" && file.type != "image/tiff") {
                done('Error! Files of this type are not accepted');
            }
            else { done(); }
        }
    }
</script>

<script>
    var locationId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    $(document).ready(function() {
        initButtons();
        imagePreview();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = mediaPanoramaReqUrl + "?id=" + locationId;
        });
    }
    
    function imagePreview() {
        $(function() {
            // Create the preview image
            $(".image-preview-input input:file").change(function (){   
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-filename").val(file.name); 
                    $('.uploadImg').attr('src', e.target.result);
                }        
                reader.readAsDataURL(file);
            });
        });
    }
    
    var mediaPanoramaReqUrl = '<?php print Yii::app()->createUrl('media/media/panoramaadmin') ?>';
</script>