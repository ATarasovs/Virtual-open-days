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
        <?php echo $form->textField($model,'locationName',array('id' => 'locationName', 'class'=>'form-control', 'placeholder' => 'Name')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationDepartment', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationDepartment',array('id' => 'locationDepartment', 'class'=>'form-control', 'placeholder' => 'Department')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationLatitude', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationLatitude',array('id' => 'locationLatitude', 'class'=>'form-control', 'placeholder' => 'Latitude')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationLongitude', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'locationLongitude',array('id' => 'locationLongitude', 'class'=>'form-control', 'placeholder' => 'Longitude')); ?>
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
        <span class="left"><label class="form-signin-heading">Current image</label></span>
        <?php if ($model->locationImage != "") { ?>  
            <span class="left"><img class="uploadImg" src="/vod/images/buildings/<?php echo $model->locationImage ?>" alt=""></span>
        <?php } else {?>
            <span class="left"><img class="uploadImg" src="/vod/images/no-image.png" alt=""></span>
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
            echo CHtml::htmlButton('<i class="ace-icon fa fa-check"></i> Save', array(
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
    
    locationAdminReqUrl = '<?php print Yii::app()->createUrl('locations/locations/admin') ?>';
</script>