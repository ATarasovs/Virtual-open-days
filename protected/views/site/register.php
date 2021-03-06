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

<div class="form-horizontal">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>false
    )); ?>

    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder' => 'Username', 'data-validation' => 'required', 'data-validation-error-msg' => 'The username must not be empty')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-lock" aria-hidden="true">&nbsp;</i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder' => 'Password', 'data-validation' => 'length', 'data-validation-length' => '7-20', 'data-validation-error-msg' => 'The password must be  between 7-20 characters')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-lock" aria-hidden="true">&nbsp;</i></span>
                <?php echo $form->passwordField($model,'realPassword',array('class'=>'form-control', 'placeholder' => 'Confirm password', 'data-validation' => 'confirmation', 'data-validation-confirm' => 'RegisterForm[password]', 'data-validation-error-msg' => 'Passwords must be same')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'firstName',array('class'=>'form-control', 'placeholder' => 'First name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The first name must not be empty')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'lastName',array('class'=>'form-control', 'placeholder' => 'Last name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The last name must not be empty')); ?>
            </div>
        </div>
    </div>
    
<!--    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
                <?php // echo $form->textField($model,'birthday',array('id' => 'datepicker', 'class'=>'form-control', 'placeholder' => 'Birthday', 'data-validation' => 'birthdate', 'data-validation-format' => 'dd/mm/yyyy', 'data-validation-error-msg' => 'The birthday should be in the format "dd/mm/yyyy and date should be before today"')); ?>
            </div>
        </div>
    </div>-->
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'email',array('class'=>'form-control', 'placeholder' => 'Email', 'data-validation' => 'email')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;</span>
                <?php echo $form->textField($model,'phone',array('class'=>'form-control', 'placeholder' => 'Phone number', 'data-validation' => 'number')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-globe" aria-hidden="true"></i>&nbsp;</span>
                <?php echo $form->textField($model,'country',array('id' => 'country', 'class'=>'form-control', 'placeholder' => 'Country', 'data-validation' => 'country', 'data-validation-error-msg' => 'The country is incorrect')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;</span>
                <?php echo $form->textField($model,'city',array('class'=>'form-control', 'placeholder' => 'City', 'data-validation' => 'required', 'data-validation-error-msg' => 'The city must not be empty')); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon">&nbsp;<i class="fa fa-briefcase" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'position',array('class'=>'form-control', 'placeholder' => 'Position')); ?>
            </div>
        </div>
    </div>
    
    <li class="list-group-item">
        I am administrator
        <div class="material-switch pull-right">
            <?php echo $form->checkBox($model,'isAdmin',array('id'=>'admin')); ?>
            <label for="admin" class="label-primary"></label>
        </div>
    </li>
    <small>&nbsp;*Request will be sent to one of current admins for confirmation</small>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary btn-lg btn-block register-button',)); ?>
    </div>
    
    <div class="login-register">
        <?php echo CHtml::link('Login',array('/site/login')); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<script>
    $.validate({
        modules : 'security, date, location',

        onModulesLoaded : function() {
            $('#country').suggestCountry();
        }
    });
    
    $( function() {
        $('#datepicker').datepicker({dateFormat: 'dd/mm/yy'});
    } );
</script>

<script>
    //dictionary
    var deleteText = '<?php print Yii::t('common', 'Delete'); ?>';

    var validationErrorsText = "<?php print Yii::t('common', 'Validation errors'); ?>";
    var shownInRedText = "<?php print Yii::t('common', 'Incorrect fields are shown in red'); ?>";
</script>
