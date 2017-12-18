<?php

    $p = new CHtmlPurifier();
    $p->options = array('URI.AllowedSchemes'=>array(
        'http' => true,
        'https' => true,
    ));

    $this->pageTitle=Yii::app()->name . ' - Register';
    $this->breadcrumbs=array(
            'Register',
    );
?>

<h1>Register</h1>

<div id="infoMessage">
    <?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-' . $p->purify($key) . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            ' . $p->purify($message) . "</div>\n";
        }
    ?>
</div>

<div class="form">
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

    <div class="row">
        <div class="col-md-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?php print Yii::t('products', 'Register'); ?></h4>
                    <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'username'); ?>
                                    <?php echo $form->textField($model,'username'); ?>
                                    <?php echo $form->error($model,'username'); ?>
                                </div>
                            </div>
                            <!--<div class="col-xs-3">-->
                                <!--<div class="form-group">-->
                                    <?php // echo $form->labelEx($model,'username'); ?>
                                    <?php // echo $form->textField($model,'username'); ?>
                                    <div style="display: none">
                                        <?php echo $form->error($model, 'username'); ?>
                                    </div>
                                <!--</div>-->
                            <!--</div>-->

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'password'); ?>
                                    <?php echo $form->passwordField($model,'password'); ?>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'firstName'); ?>
                                    <?php echo $form->textField($model,'firstName'); ?>
                                    <?php echo $form->error($model,'firstName'); ?>
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'lastName'); ?>
                                    <?php echo $form->textField($model,'lastName'); ?>
                                    <?php echo $form->error($model,'lastName'); ?>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'email'); ?>
                                    <?php echo $form->textField($model,'email'); ?>
                                    <?php echo $form->error($model,'email'); ?>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'phone'); ?>
                                    <?php echo $form->textField($model,'phone'); ?>
                                    <?php echo $form->error($model,'phone'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'country'); ?>
                                    <?php echo $form->textField($model,'country'); ?>
                                    <?php echo $form->error($model,'country'); ?>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'city'); ?>
                                    <?php echo $form->textField($model,'city'); ?>
                                    <?php echo $form->error($model,'city'); ?>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'position'); ?>
                                    <?php echo $form->textField($model,'position'); ?>
                                    <?php echo $form->error($model,'position'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model,'birthday'); ?>
                                    <?php echo $form->textField($model,'birthday'); ?>
                                    <?php echo $form->error($model,'birthday'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Register'); ?>
                        </div>
                    </div>  
                </div>  
            </div>
        </div>
    </div>
    
    <div class="space-6"></div>

    <div class="row">
        <div class="col-md-12">
            <?php
                echo CHtml::htmlButton('<i class="ace-icon fa fa-check"></i> ' . Yii::t('common', 'Register'), array(
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
