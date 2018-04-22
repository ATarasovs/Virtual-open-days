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

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $model->firstName; ?> <?php echo $model->lastName; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 " align="center"> 
                            <?php if ($model->userImage != "") { ?>  
                                <div class="left"><img class="locationListImage" src="<?php echo Yii::app()->request->baseUrl; ?>/images/users/<?php echo $model->userImage ?>" alt=""></div>
                            <?php } else {?>
                                <div class="left"><img class="locationListImage" src="<?php echo Yii::app()->request->baseUrl; ?>/images/no-image.png" alt=""></div>
                            <?php } ?>
                        </div>
                        <div class=" col-md-8 col-lg-8 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>First name</td>
                                        <td><?php echo $model->firstName ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last name</td>
                                        <td><?php echo $model->lastName ?></td>
                                    </tr>
                                    <tr>
                                        <td>Login</td>
                                        <td><?php echo $model->username ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth</td>
                                        <td><?php echo $model->birthday ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:<?php echo $model->email ?>"><?php echo $model->email ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Phone number</td>
                                        <td><?php echo $model->phone ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $model->country ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $model->city ?></td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td><?php echo $model->position ?></td>
                                    </tr>
                                    <tr>
                                        <td>Join date</td>
                                        <td><?php echo $model->joinDate ?></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
                <?php 
                    $currentUserId = Yii::app()->user->getId(); 
                    $userId = Yii::app()->request->getParam('id');
                ?>
                
                <?php if ($users->isAdmin == "true" ) { ?>
                        <div class="panel-footer">
                            <button class="viewBtn btn btn-primary btn-block" data-user-id="<?php echo $model->userId; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                        </div>
                <?php } 
                    else if ($currentUserId == $userId ) { ?>
                        <div class="panel-footer">
                            <button class="viewBtn btn btn-primary btn-block" data-user-id="<?php echo $model->userId; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

	$(".profileLi").addClass("active");
        initButtons();
    });
    
    function initButtons() {
        $( ".viewBtn" ).click(function() {
            location.href = userEditReqUrl + "?id=" + userId;
        });
    }

    var userId = '<?php print Yii::app()->user->getId() ?>'; 
    var userEditReqUrl = '<?php print Yii::app()->createUrl('users/users/edit') ?>';
</script>