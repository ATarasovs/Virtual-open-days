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

<h2>Event</h2>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'edit-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventName',array('id' => 'eventName', 'class'=>'form-control', 'placeholder' => 'Name')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventStartTime', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventStartTime',array('id' => 'eventStartTime', 'class'=>'form-control', 'placeholder' => 'Date & Time')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationId', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->dropDownList($model, 'locationId', $locations, array('class' => 'form-control chosen-select locationId', 'prompt' => '')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventVideo', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventVideo',array('id' => 'eventVideo', 'class'=>'form-control', 'placeholder' => 'Name')); ?>
    </div>
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventLead', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventLead',array('id' => 'eventLead', 'class'=>'form-control', 'placeholder' => 'Name')); ?>
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
        <span class="left"><label class="form-signin-heading">Current image</label></span>
        <?php if ($model->eventImage != "") { ?>  
            <div class="left"><img class="uploadImg" src="/vod/images/events/<?php echo $model->eventImage ?>" alt=""></div>
        <?php } else {?>
            <div class="left"><img class="uploadImg" src="/vod/images/no-image.png" alt=""></div>
        <?php } ?>
    </div>
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'image', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->fileField($model, 'image'); ?>
    </div>
</div>

<div class="top15"></div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo CHtml::htmlButton('<i class="ace-icon fa fa-check bigger-125"></i> Save', array(
                'class' => 'btn btn-success btn-sm operationBtn',
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
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = locationAdminReqUrl;
        });
    }
    
    locationAdminReqUrl = '<?php print Yii::app()->createUrl('events/events/admin') ?>';
</script>