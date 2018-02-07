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

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'edit-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false
)); ?>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventName',array('id' => 'eventName', 'class'=>'form-control', 'placeholder' => 'Name')); ?>
    </div>

    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventDescription', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventDescription',array('id' => 'eventDescription', 'class'=>'form-control', 'placeholder' => 'Description')); ?>
    </div>

    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'eventStartTime', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'eventStartTime',array('id' => 'eventStartTime', 'class'=>'form-control', 'placeholder' => 'Date & Time')); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'locationId', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->dropDownList($model, 'locationId', $locations, array('class' => 'form-control chosen-select locationId', 'prompt' => '')); ?>
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

        <a class="btn btn-sm" id="backBtn">
            <i class="fa fa-list-alt bigger-125"></i> <?php print Yii::t('common', 'Back to list'); ?>
        </a>
    </div>
</div>

<?php $this->endWidget(); ?>