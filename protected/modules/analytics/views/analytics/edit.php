<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Charts List', 'url' => array('/analytics/analytics/admin')),
            array('name' => 'Chart edit <small>(' . $model->title . ')</small>'),
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
        <span class="left"><?php echo $form->labelEx($model,'title', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->textField($model,'title',array('id' => 'title', 'class'=>'form-control', 'placeholder' => 'Name', 'data-validation' => 'required', 'data-validation-error-msg' => 'The title must not be empty')); ?>
    </div>
    
    <div class="col-sm-4">
        <span class="left"><?php echo $form->labelEx($model,'type', array('class'=>'form-signin-heading')); ?></span>
        <?php echo $form->dropDownList($model,'type', 
                array(
                    '' => '', 
                    'bar' => 'Bar chart', 
                    'line' => 'Line chart',
                    'pie' => 'Pie chart',
                    'radar' => 'Radar chart',
                    'polarArea' => 'Polar area chart',
                    'doughnut' => 'Doughnut chart',
                    'horizontalBar' => 'Horizontal bar chart'
                ), 
                array('id' => 'type', 'class'=>'form-control', 'data-validation' => 'required', 'data-validation-error-msg' => 'The type must not be empty')); ?>
    </div>
</div>

<div class="top30"></div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h4 class="panel-title">Graph data</h4>
                    </div>
                    <div class="col col-xs-6 text-right">

                    </div>
                </div>
            </div>

            <div class="panel-body">
               <table class="table table-striped table-bordered table-list" id="data">
                   <thead>
                       <td>Label</td>
                       <td>Number</td>
                       <td>Actions</td>
                   </thead>
                   <tbody>
                   </tbody>    
               </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <a class="btn btn-primary btn-sm addDataBtn"><i class="fa fa-plus bigger-125"></i> Add data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top30"></div>

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
            <i class="fa fa-list-alt bigger-125"></i> Back to list
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
            location.href = chartAdminReqUrl;
        });
        
        $( ".submitBtn" ).click(function() {
            $.validate({
                modules : '',

                onModulesLoaded : function() {
                }
            });
        });
        
        $( ".addDataBtn" ).click(function() {
            appendData();
        });
        
        $(document).on("click", ".deleteRowBtn", function(e) {
            $(this).parents("tr:first").remove();
        });
    }
    
    function appendData() {
        $("#data tbody").append(
                '<tr>' +
                    '<td class="col-xs-6">' +
                        '<input type="text" class="form-control">' +
                    '</td>' +
                    '<td class="col-xs-3">' +
                        '<input type="text" class="form-control">' +
                    '</td>' +
                    '<td class="col-xs-3">' +
                        '<a class="btn btn-danger btn-sm deleteRowBtn"><i class="fa fa-times bigger-125"></i> Delete</a>' +
                    '</td>' +
                '</tr>');
    }
    
    chartAdminReqUrl = '<?php print Yii::app()->createUrl('analytics/analytics/admin') ?>';
</script>