<div class="form-horizontal">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
    )); ?>

    
    <div class="form-group">
        <label for="name" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'username'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'username',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'password'); ?></label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control',)); ?>
            </div>
        </div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary btn-lg btn-block login-button',)); ?>
    </div>
    
    <div class="login-register">
        <?php echo CHtml::link('Register',array('/site/register')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>

