<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Users list', 'url' => array('/users/users/admin')),
            array('name' => 'User edit <small>(' . $model->username . ')</small>'),
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
        <span class="left"><?php echo $form->labelEx($model,'username', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'username',array('id' => 'username', 'class'=>'form-control', 'placeholder' => 'Username')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'firstName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'firstName',array('id' => 'firstName', 'class'=>'form-control', 'placeholder' => 'First Name')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'lastName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'lastName',array('id' => 'lastName', 'class'=>'form-control', 'placeholder' => 'Last Name')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'email', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'email',array('id' => 'email', 'class'=>'form-control', 'placeholder' => 'Email')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'phone', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'phone',array('id' => 'phone', 'class'=>'form-control', 'placeholder' => 'Phone')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'country', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'country',array('id' => 'country', 'class'=>'form-control', 'placeholder' => 'Country')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'city', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'city',array('id' => 'city', 'class'=>'form-control', 'placeholder' => 'City')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'position', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'position',array('id' => 'position', 'class'=>'form-control', 'placeholder' => 'Position')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'birthday', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'birthday',array('id' => 'birthday', 'class'=>'form-control', 'placeholder' => 'Birthday')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><label class="form-signin-heading">Current image</label></span>
        <?php if ($model->userImage != "") { ?>  
            <div class="left"><img class="uploadImg" src="/vod/images/users/<?php echo $model->userImage ?>" alt=""></div>
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
        
        initButtons();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = userAdminReqUrl;
        });
    }
    
    userAdminReqUrl = '<?php print Yii::app()->createUrl('users/users/admin') ?>';
</script>