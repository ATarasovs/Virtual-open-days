<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.users.assets').'\requests.js'), CClientScript::POS_HEAD);
?>

<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Requests'),
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
                        <h3 class="panel-title">List of all requests</h3>
                    </div>
                    <div class="col col-xs-6 text-right">

                    </div>
                </div>
            </div>

            <div class="panel-body">
               <table class="table table-striped table-bordered table-list" id="events">
                   <thead>
                       <th>Name</th>
                       <th>Login</th>
                       <th>Email</th>
                       <th>Position</th>
                       <th>Actions</th>
                   </thead>
                   <tbody>
                       <?php foreach($users as $user) { ?>
                       <tr class="table-info">
                           <td class="userName col-xs-3"><a href="<?php print Yii::app()->createUrl('users/users/view?id=' . $user->userId); ?>"><?php echo $user->firstName; ?> <?php echo $user->lastName; ?></a></td>
                           <td class="userLogin col-xs-2"><?php echo $user->username; ?></td>
                           <td class="userEmail col-xs-2"><?php echo $user->email; ?></td>
                           <td class="userPosition col-xs-2"><?php echo $user->position; ?></td>
                           <td class="col-xs-3">
                               <button class="acceptBtn btn btn-success btn-sm" data-user-id="<?php echo $user->userId; ?>" data-toggle="modal" data-target="#acceptModal"><i class="fa fa-check" aria-hidden="true"></i> Accept</button>
                               <button class="declineBtn btn btn-danger btn-sm" data-user-id="<?php echo $user->userId; ?>" data-toggle="modal" data-target="#declineModal"><i class="fa fa-times" aria-hidden="true"></i> Decline</button>
                           </td>
                       </tr>
                      <?php } ?>
                   </tbody> 
               </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-12 right">
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

<div class="modal fade" id="acceptModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Accept request</h4>
            </div>
            
            <div class="modal-body">
                <p>Are you sure you want to accept this request?</p>
            </div>
        
            <div class="modal-footer">
                <button class="acceptRequestBtn btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Accept</button>
            </div>
        </div> 
    </div>
</div>  

<div class="modal fade" id="declineModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Decline request</h4>
            </div>
            
            <div class="modal-body">
                <p>Are you sure you want to decline this request?</p>
            </div>
        
            <div class="modal-footer">
                <button class="declineRequestBtn btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> Decline</button>
            </div>
        </div> 
    </div>
</div>  

<script>
    var changeStatusReqUrl = '<?php print Yii::app()->createUrl('users/users/requestChangeStatus') ?>';
</script>
