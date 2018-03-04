<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Pages', 'url' => array('/information/information/admin')),
            array('name' => 'Page edit <small>(' . $model->informationTitle . ')</small>'),
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
        <span class="left"><?php echo $form->labelEx($model,'informationTitle', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'informationTitle',array('id' => 'informationTitle', 'class'=>'form-control', 'placeholder' => 'Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The title name must not be empty')); ?>
    </div>
</div>

<div class="top17"></div>

<div class="row">
    <div class="col-sm-12">
        <span class="left"><?php echo $form->labelEx($model,'informationDescription', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textArea($model,'informationDescription',array('id' => 'informationDescription', 'class'=>'form-control summernote', 'placeholder' => 'Page content')); ?>
    </div>
</div>

<div class="top15"></div>

<div class="row">
    <div class="col-md-12">
        <?php
            echo CHtml::htmlButton('<i class="ace-icon fa fa-check"></i> Save', array(
                'class' => 'btn btn-success btn-sm operationBtn, submitBtn',
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
            location.href = informationAdminReqUrl;
        });
        
        $( ".submitBtn" ).click(function() {
            $.validate({
                modules : '',

                onModulesLoaded : function() {
                }
            });
        });
    }
    
    informationAdminReqUrl = '<?php print Yii::app()->createUrl('information/information/admin') ?>';
</script>