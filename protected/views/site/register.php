<div class="form-horizontal">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>false,
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
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'username',array('name' => 'username', 'class'=>'form-control', 'placeholder' => 'Login', 'autofocus' => 'autofocus', 'data-validation' => 'length alphanumeric', 'data-validation-length' => '3-12', 'data-validation-error-msg' => 'The username must be an alphanumeric value (3-12 chars)')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <?php echo $form->passwordField($model,'password',array('name' => 'pass_confirmation', 'class'=>'form-control', 'placeholder' => 'Password', 'data-validation' => 'length', 'data-validation-length' => '7-20', 'data-validation-error-msg' => 'The password must be  between 7-20 characters')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <input class="form-control" placeholder="Confirm password" type="password" name="pass" data-validation="confirmation" data-validation-error-msg = "Your password and password confiramtion must be same">
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'firstName',array('class'=>'form-control', 'placeholder' => 'First name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The first name must not be empty')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'lastName',array('class'=>'form-control', 'placeholder' => 'Last name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The last name must not be empty')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'email',array('class'=>'form-control', 'placeholder' => 'Email', 'data-validation' => 'email')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'phone',array('class'=>'form-control', 'placeholder' => 'Phone number', 'data-validation' => 'number')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'country',array('id' => 'country', 'class'=>'form-control', 'placeholder' => 'Country', 'data-validation' => 'country', 'data-validation-error-msg' => 'The country is incorrect')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'position',array('class'=>'form-control', 'placeholder' => 'Position')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'birthday',array('class'=>'form-control', 'placeholder' => 'Birthday', 'data-validation' => 'date', 'data-validation-format' => 'dd/mm/yyyy', 'data-validation-error-msg' => 'The date must be in the format  - dd/mm/yyyy')); ?>
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
    $( ".register-button" ).click(function() {
        $.validate({
            modules : 'security, date, location',

            onModulesLoaded : function() {
                $('#country').suggestCountry();
            }
        });
    });
</script>

<script>
    //dictionary
    var deleteText = '<?php print Yii::t('common', 'Delete'); ?>';

    var validationErrorsText = "<?php print Yii::t('common', 'Validation errors'); ?>";
    var shownInRedText = "<?php print Yii::t('common', 'Incorrect fields are shown in red'); ?>";
</script>
