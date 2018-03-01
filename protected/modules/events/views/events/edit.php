<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Events list', 'url' => array('/events/events/admin')),
            array('name' => 'Event edit <small>(' . $model->eventName . ')</small>'),
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
        <span class="left"><?php echo $form->labelEx($model,'eventName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventName',array('id' => 'eventName', 'class'=>'form-control', 'placeholder' => 'Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event name must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationId', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->dropDownList($model, 'locationId', $locations, array('class' => 'form-control chosen-select locationId', 'prompt' => '', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event location must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventVideo', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventVideo',array('id' => 'eventVideo', 'class'=>'form-control', 'placeholder' => 'Event video ID')); ?>
    </div>
</div>

<div class="top17"></div>

<div class="row">
    <div class="col-sm-12">
        <span class="left"><?php echo $form->labelEx($model,'eventShortDescription', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textArea($model,'eventShortDescription',array('id' => 'eventShortDescription', 'class'=>'form-control summernote', 'placeholder' => 'Short Description')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <span class="left"><?php echo $form->labelEx($model,'eventDescription', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textArea($model,'eventDescription',array('id' => 'eventDescription', 'class'=>'form-control summernote', 'placeholder' => 'Description')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventStartDate', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventStartDate',array('id' => 'datepicker', 'class'=>'form-control', 'placeholder' => 'Start date', 'data-validation' => 'date', 'data-validation-format' => 'dd/mm/yyyy', 'data-validation-error-msg' => 'The event start date must be in the format "dd/mm/yyyy"')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventStartTime', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventStartTime',array('id' => 'eventStartTime', 'class'=>'form-control timepicker', 'placeholder' => 'Start time', 'data-validation' => 'time', 'data-validation-error-msg' => 'The event start time must be in the format "HH:mm"')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventLead', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventLead',array('id' => 'eventLead', 'class'=>'form-control', 'placeholder' => 'Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The event lead must not be empty')); ?>
    </div>
</div>

<div class="top30"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><label class="form-signin-heading">Current image (Ratio 1:1)</label></span>
        <?php if ($model->eventImage != "") { ?>  
            <div class="left"><img class="uploadImg" src="/vod/images/events/<?php echo $model->eventImage ?>" alt="120" width="200" height="200"></div>
        <?php } else {?>
            <div class="left"><img class="uploadImg" src="/vod/images/no-image.png" alt="" height="200" width="200"></div>
        <?php } ?>

    

        <div class="top15"></div>
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <?php if ($model->eventImage == "") { ?>  
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
            echo CHtml::htmlButton('<i class="ace-icon fa fa-check bigger-125"></i> Save', array(
                'class' => 'btn btn-success btn-sm operationBtn submitBtn',
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

        $(function() {
            $('#datepicker').datepicker({dateFormat: 'dd/mm/yy'});
        });    
        
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 15,
            minTime: '8',
            maxTime: '20:00',
            startTime: '08:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
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
                modules : 'date, file',

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
    
    locationAdminReqUrl = '<?php print Yii::app()->createUrl('events/events/admin') ?>';
</script>