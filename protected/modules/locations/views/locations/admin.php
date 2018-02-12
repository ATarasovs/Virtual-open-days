<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.locations.assets').'\admin.js'), CClientScript::POS_HEAD);
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
                        <h3 class="panel-title">List of all buildings</h3>
                    </div>
                    <div class="col col-xs-6 text-right">

                    </div>
                </div>
            </div>

            <div class="panel-body">
               <table class="table table-striped table-bordered table-list" id="events">
                   <thead>
                       <th>Name</th>
                       <th>Department</th>
                       <th>Actions</th>
                   </thead>
                   <tbody>
                       <?php foreach($locations as $location) { ?>
                       <tr class="table-info">
                           <td class="locationName col-xs-3"><?php echo $location->locationName; ?></td>
                           <td class="locaitonDepartment col-xs-3"><?php echo $location->locationDepartment; ?></td>
                           <td class="col-xs-3">
                               <button class="editBtn btn btn-primary btn-sm" data-location-id="<?php echo $location->locationId; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                               <button class="viewBtn btn btn-primary btn-sm" data-location-id="<?php echo $location->locationId; ?>"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                               <button class="removeBtn btn btn-danger btn-sm" data-location-id="<?php echo $location->locationId; ?>"><i class="fa fa-times" aria-hidden="true"></i> Remove</button>
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

<script>
    var locaitonViewReqUrl = '<?php print Yii::app()->createUrl('locations/locations/view') ?>';
    var locationEditReqUrl = '<?php print Yii::app()->createUrl('locations/locations/edit') ?>';
</script>