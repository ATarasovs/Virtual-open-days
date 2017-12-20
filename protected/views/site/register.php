<div class="form-horizontal">
    <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'register-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'beforeValidate'=>'js:function(){

            }',
            'afterValidate'=>'js:function(form, data, hasError){
                if ($.isEmptyObject(data)) {
                        return true;
                }
                else {
                    showValidationErrors(data);
                    return false;
                }
            }'
        ),
    )); ?>

    
    <div class="form-group">
        <label for="username" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'username'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'username',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="password" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'password'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="firstName" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'firstName'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'firstName',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="lastName" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'lastName'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'lastName',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="email" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'email'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'email',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="phone" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'phone'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'phone',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="country" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'country'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'country',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="city" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'city'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'city',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="position" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'position'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'position',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="birthday" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'birthday'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'birthday',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>
    

    <div class="row buttons">
        <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary btn-lg btn-block register-button',)); ?>
    </div>
    
    <div class="login-register">
        <?php echo CHtml::link('Login',array('/site/login')); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<script>
    function showValidationErrors(errorsObject){
        // has-error
        showErrorNotification(validationErrorsText, shownInRedText);

        for(var name in errorsObject) {
            if (errorsObject.hasOwnProperty(name)) {
                $('#' + name).closest('.form-group').addClass('has-error');
                $('#' + name).addClass('has-error-flag');

                $('#' + name).tooltip('enable');
                $('#' + name).attr('data-original-title', errorsObject[name]).tooltip('fixTitle');

                $('label[for="' + name + '"]').tooltip('enable');
                $('label[for="' + name + '"]').attr('data-original-title', errorsObject[name]).tooltip('fixTitle');
            }
        }
    }

    function removeValidationErrors(){
        $('.has-error-flag').each(function(){
            $(this).closest('.form-group').removeClass('has-error');
            $(this).removeClass('has-error-flag');
            $(this).tooltip('disable');
            $('label[for="' + $(this).attr('id') + '"]').tooltip('disable');
        });
    }

    function addValidationPopover(elementSelector, content){
        $(elementSelector).popover({
            trigger: 'hover',
            html: true,
            placement: 'right',
            content: content
        });
    }

    function showErrorNotification(title, text){
        $.gritter.add({
            title: title,
            text: text,
            class_name: 'gritter-error gritter-light gritter-center'
        });
    }

    //dictionary
    var deleteText = '<?php print Yii::t('common', 'Delete'); ?>';

    var validationErrorsText = "<?php print Yii::t('common', 'Validation errors'); ?>";
    var shownInRedText = "<?php print Yii::t('common', 'Incorrect fields are shown in red'); ?>";
</script>
