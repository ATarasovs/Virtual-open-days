<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Locations list', 'url' => array('/locations/locations/admin')),
            array('name' => 'Location edit <small>(' . $model->locationName . ')</small>'),
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
    'id'=>'edit-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationName',array('id' => 'locationName', 'class'=>'form-control', 'placeholder' => 'Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The location name must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationDepartment', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationDepartment',array('id' => 'locationDepartment', 'class'=>'form-control', 'placeholder' => 'Department', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event department must not be empty (If there is no department, input "-")')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationLatitude', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationLatitude',array('id' => 'locationLatitude', 'class'=>'form-control', 'placeholder' => 'Latitude', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event latitude must not be empty')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationLongitude', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationLongitude',array('id' => 'locationLongitude', 'class'=>'form-control', 'placeholder' => 'Longitude', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event longitude must not be empty')); ?>
    </div>
</div>

<div class="top17"></div>

<div class="row">
    <div class="col-sm-12">
            <span class="left"><?php echo $form->labelEx($model,'locationShortDescription', array('class'=>'form-signin-heading')); ?></span>
            <?php echo $form->textArea($model,'locationShortDescription',array('id' => 'locationShortDescription', 'class'=>'form-control summernote', 'placeholder' => 'Short Description')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <span class="left"><?php echo $form->labelEx($model,'locationDescription', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textArea($model,'locationDescription',array('id' => 'locationDescription', 'class'=>'form-control summernote', 'placeholder' => 'Desctiption')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
       <span class="left"><label class="form-signin-heading">Current image (Ratio 1:1)</label></span>
        <?php if ($model->locationImage != "") { ?>  
            <div class="left"><img class="uploadImg" src="/vod/images/buildings/<?php echo $model->locationImage ?>" alt="" width="200" height="200"></div>
        <?php } else {?>
            <div class="left"><img class="uploadImg" src="/vod/images/no-image.png" alt="" width="200" height="200"></div>
        <?php } ?>
            
        <div class="top15"></div>
        
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <?php if ($model->locationImage == "") { ?>  
                        <span class="image-preview-input-title">Browse</span>
                    <?php } else {?>
                        <span class="image-preview-input-title">Change</span>
                    <?php } ?>
                    <?php echo $form->fileField($model, 'image',array('id' => 'fileImage', 'data-validation' => 'mime', 'data-validation-allowing' => 'jpg, png, gif, jpeg, bmp, tiff', 'data-validation-error-msg' => 'Only files of type jpg, png, gif, jpeg, bmp, tiff are allowed')); ?>
                </div>
            </span>
        </div>
    </div>
</div>

<div class="top15"></div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo CHtml::htmlButton('<i class="ace-icon fa fa-check"></i> Save', array(
                'class' => 'btn btn-success btn-sm operationBtn, submitBtn',
                'encode' => false,
                'type' => 'submit',
                'id' => 'sendBtn')
            );
        ?>

        <a class="btn btn-primary btn-sm backBtn">
            <i class="fa fa-list-alt bigger-125"></i> <?php print Yii::t('common', 'Back to list'); ?>
        </a>
    </div>
</div>

<?php $this->endWidget(); ?>

<script>
    $(document).ready(function() {
        $(".adminLi").addClass("active");
        
        $('.summernote').summernote({
            height: 200,                 
            maxHeight: null,
            minHeight: null
        });

        initButtons();
        imagePreview();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = locationAdminReqUrl;
        });
        
        $( ".submitBtn" ).click(function() {
            $.validate({
                modules : 'file',

                onModulesLoaded : function() {
                }
            });
        });
    }
    
    function imagePreview() {
        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            
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
    
    locationAdminReqUrl = '<?php print Yii::app()->createUrl('locations/locations/admin') ?>';
</script>