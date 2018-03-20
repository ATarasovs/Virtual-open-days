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
        <?php echo $form->textField($model,'username',array('id' => 'username', 'class'=>'form-control', 'placeholder' => 'Username', 'data-validation' => 'required', 'data-validation-error-msg' => 'The username must not be empty', 'disabled' => 'disabled')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'firstName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'firstName',array('id' => 'firstName', 'class'=>'form-control', 'placeholder' => 'First Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The first name must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'lastName', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'lastName',array('id' => 'lastName', 'class'=>'form-control', 'placeholder' => 'Last Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The last name must not be empty')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'email', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'email',array('id' => 'email', 'class'=>'form-control', 'placeholder' => 'Email', 'data-validation' => 'email')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'phone', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'phone',array('id' => 'phone', 'class'=>'form-control', 'placeholder' => 'Phone', 'data-validation' => 'number')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'country', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'country',array('id' => 'country', 'class'=>'form-control', 'placeholder' => 'Country', 'data-validation' => 'country', 'data-validation-error-msg' => 'The country is incorrect')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'city', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'city',array('id' => 'city', 'class'=>'form-control', 'placeholder' => 'City', 'data-validation' => 'required', 'data-validation-error-msg' => 'The city must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'position', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'position',array('id' => 'position', 'class'=>'form-control', 'placeholder' => 'Position')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'birthday', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'birthday',array('id' => 'birthday', 'class'=>'form-control', 'placeholder' => 'Birthday', 'data-validation' => 'birthdate', 'data-validation-format' => 'dd/mm/yyyy', 'data-validation-error-msg' => 'The birthday should be in the format "dd/mm/yyyy"')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'password', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->passwordField($model,'password',array('id' => 'password', 'class'=>'form-control', 'placeholder' => 'Password', 'data-validation' => 'length', 'data-validation-length' => '7-20', 'data-validation-error-msg' => 'The password must be  between 7-20 characters')); ?>
    </div>
</div>

<div class="top10"></div>

<div class="row">
    <div class="col-sm-4">
        <span class="left"><label class="form-signin-heading">Current image (Ratio 1:1)</label></span>
        <?php if ($model->userImage != "") { ?>  
            <div class="left"><img class="uploadImg" src="/vod/images/users/<?php echo $model->userImage ?>" alt="" width="200" height="200"></div>
        <?php } else {?>
            <div class="left"><img class="uploadImg" src="/vod/images/no-image.png" alt="" width="200" height="200"></div>
        <?php } ?>
    
        <div class="top15"></div>
        
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <?php if ($model->userImage == "") { ?>  
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
                'class' => 'btn btn-success btn-sm operationBtn submitBtn',
                'encode' => false,
                'type' => 'submit',
                'id' => 'sendBtn')
            );
        ?>

        <a class="btn btn-primary btn-sm backBtn">
            <i class="fa fa-list-alt bigger-125"></i> <?php print Yii::t('common', 'Back to profile'); ?>
        </a>
        
    </div>
</div>

<?php $this->endWidget(); ?>

<script>
    var userId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    $(document).ready(function() {
        $(".adminLi").addClass("active");
        var currentPassword = '<?php print $model->realPassword ?>'
        $("#password").val(currentPassword);
        
        
        initButtons();
        imagePreview();
        
        $(function() {
            $('#birthday').datepicker({dateFormat: 'dd/mm/yy'});
        });  
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = userProfileReqUrl + "?id=" + userId;
        });
        
        $( ".submitBtn" ).click(function() {
            $.validate({
                modules : 'security, date, location, file',

                onModulesLoaded : function() {
                    $('#country').suggestCountry();
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
    
    userProfileReqUrl = '<?php print Yii::app()->createUrl('users/users/view') ?>';
</script>