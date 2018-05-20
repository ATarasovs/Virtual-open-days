<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.information.assets').'\admin.js'), CClientScript::POS_HEAD);
?>

<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Resources'),
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title">List of all resources</h3>
                    </div>
                    <div class="col col-xs-6 text-right">

                    </div>
                </div>
            </div>

            <div class="panel-body">
               <table class="table table-striped table-bordered table-list" id="events">
                   <thead>
                       <th>Title</th>
                       <th>Actions</th>
                   </thead>
                   <tbody>
                       <?php foreach($informations as $information) { ?>
                       <tr class="table-info">
                           <td class="informationTitle col-xs-9"><?php echo $information->informationTitle; ?></td>
                           <td class="col-xs-3">
                                <button class="editBtn btn btn-primary btn-sm" data-information-id="<?php echo $information->informationId; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                                <button class="viewBtn btn btn-primary btn-sm" data-information-id="<?php echo $information->informationId; ?>"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                <button class="removeBtn btn btn-danger btn-sm" data-information-id="<?php echo $information->informationId; ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
                           </td>
                       </tr>
                      <?php } ?>
                   </tbody>    
               </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="createBtn btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create New</button>
                    </div>
                    <div class="col-xs-6 right">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <?php
                                $this->widget('CLinkPager', array('pages' => $pages,
                                    'header' => '',
                                    'nextPageLabel' => '&rsaquo;',
                                    'prevPageLabel' => '&lsaquo;',
                                    'firstPageLabel' => '&laquo;',
                                    'lastPageLabel' => '&raquo;',
                                    'selectedPageCssClass' => 'active',
                                    'hiddenPageCssClass' => 'disabled',
                                    'htmlOptions' => array('class' => 'pagination', 'style' => 'margin: 0')
                                ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete resource</h4>
            </div>
            
            <div class="modal-body">
                <p>Are you sure that you want to delete this resource?</p>
            </div>
        
            <div class="modal-footer">
                <button class="deleteBtn btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
            </div>
        </div> 
    </div>
</div>  

<script>
    var informationViewReqUrl = '<?php print Yii::app()->createUrl('information/information/view') ?>';
    var informationEditReqUrl = '<?php print Yii::app()->createUrl('information/information/edit') ?>';
    var informationDeleteReqUrl = '<?php print Yii::app()->createUrl('information/information/deleterecord') ?>';
</script>
