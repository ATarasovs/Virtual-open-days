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
                    'pie' => 'Pie chart',
                    'doughnut' => 'Doughnut chart'
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
                       <?php foreach ($datas as $data) { ?>
                            <tr>
                                <td class="col-xs-6">
                                    <input type="text" class="form-control" value="<?php echo $data->title; ?>" data-validation="required" data-validation-error-msg="The label must not be empty">
                                </td>
                                <td class="col-xs-3">
                                    <input type="text" class="form-control" value="<?php echo $data->number; ?>" data-validation="required" data-validation-error-msg="The number must not be empty">
                                </td>
                                <td class="col-xs-3">
                                    <a class="btn btn-danger btn-sm deleteRowBtn"><i class="fa fa-times bigger-125"></i> Delete</a>
                                </td>
                            </tr>
                       <?php } ?>
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
    var chartId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    $(document).ready(function() {
        $(".adminLi").addClass("active");
        
        if(chartId == "") {
            $(".addDataBtn").addClass("disabled");
            $('.addDataBtn').attr('title', 'Data can be only added after the chart is created.');
            $('.addDataBtn').attr('data-toggle', 'tooltip');
            $('[data-toggle="tooltip"]').tooltip(); 
        }
        
        initButtons();
    });
    
    function initButtons() {
        $( ".backBtn" ).click(function() {
            location.href = chartAdminReqUrl;
        });
        
        $( ".submitBtn" ).click(function() {
            saveData();
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
    
    function saveData() {
        var data = {};
        var key = "";
        var value = "";
        
        $('#data tbody tr').each(function(){
            var count = 0;
            $(this).find('td').each(function(){
                if (count == 0) {
                    key = $(this).find('input').val();
                }
                if (count == 1) {
                    value = $(this).find('input').val();
                }
                if (count == 2) {
                    data[key] = value;
                    return false;
                }
                
//                console.log("hello world");
                count++;
            })
        })
        
        data = JSON.stringify(data);
//        numbrs = JSON.stringify(numbers);
        console.log(data);
//        console.log(numbers);

        $.ajax({
            method: "POST",
            url: saveDataReqUrl, // here your URL address
            data: { id: chartId,
                    data: data}
          }); 
        }
    
    chartAdminReqUrl = '<?php print Yii::app()->createUrl('analytics/analytics/admin') ?>';
    saveDataReqUrl = '<?php print Yii::app()->createUrl('analytics/analytics/saveData') ?>';
</script>