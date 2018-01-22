<div class="row">
    <div class="col-xs-12">
        <div id="infoMessage">
            <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $message . "</div>\n";
                }
            ?>
        </div>
    </div>
</div>


<div class="form-horizontal">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
    )); ?>

    
    <div class="form-group">
        <!--<label for="name" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'username'); ?></label>-->
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder' => 'Login', 'required' => 'required', 'autofocus' => 'autofocus')); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <!--<label for="name" class="cols-sm-10 control-label"><?php echo $form->labelEx($model,'password'); ?></label>-->
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder' => 'Password', 'required' => 'required')); ?>
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

