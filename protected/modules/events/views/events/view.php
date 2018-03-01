<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\view.js'), CClientScript::POS_HEAD);
?>

<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Events list', 'url' => array('/events/events/listallevents')),
            array('name' => 'Event view <small>(' . $model->eventName . ')</small>'),
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


<div class="container"> 
    <h2><?php echo $model->eventName; ?></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        
                        <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>
                        
                        <?php if ($model->isStarted == "true" && $model->isFinished == "false") { ?>
                            <li class="liveLi"><a href="#tab2" class="liveTabLi" data-toggle="tab">Live</a></li>
                        <?php } else {?>
                            <li class="hide liveLi"><a href="#tab2" class="liveTabLi" data-toggle="tab">Live</a></li>
                        <?php } ?>
                            
                        <?php if ($model->isFinished == "true") {  ?>
                            <li class="videoLi"><a href="#tab3" class="videoTabLi" data-toggle="tab">Video</a></li>
                        <?php } else {?>
                            <li class="hide videoLi"><a href="#tab3" class="videoTabLi" data-toggle="tab">Video</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        
                        <div class="tab-pane fade in active" id="tab1">
                            <div class="top15"></div>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-2">
                                    <!--<div class="thumbnail">-->
                                        <?php if ($model->eventImage != "") { ?>  
                                            <img src="/vod/images/events/<?php echo $model->eventImage ?>" alt="" style="width:100%">
                                        <?php } else {?>
                                            <img src="/vod/images/no-image.png" alt="" style="width:100%">
                                    <!--</div>-->
                                    <?php } ?>
                                </div>
                                <div class="col-md-offset-1 col-xs-7">
                                    <?php echo $model->eventShortDescription ?>
                                </div>
                            </div>
                            <div class="top15"></div>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-10">
                                    <h3>Full description</h3>
                                    <?php echo $model->eventDescription ?>
                                </div>
                            </div>
                            <!--<div class="top15"></div>-->
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-10">
                                    <h3>List of participants</h3>
                                    <div class="panel panel-default panel-table">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-list" id="events">
                                                <thead>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Country</th>
                                                    <th>Position</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($participants as $participant) {
                                                        foreach ($allUsers as $user) {
                                                            if ($participant->userId == $user->userId) { ?>
                                                                <tr class="table-info">
                                                                    <td class="col-xs-3"><a href="<?php print Yii::app()->createUrl('users/users/view?id=' . $user->userId); ?>"><?php echo $user->firstName; ?> <?php echo $user->lastName; ?></a></td>
                                                                    <td class="col-xs-3"><?php echo $user->email; ?></td>
                                                                    <td class="col-xs-3"><?php echo $user->country; ?></td>
                                                                    <td class="col-xs-3"><?php echo $user->position; ?></td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                    } ?>
                                                </tbody>    
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="top15"></div>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-10">
                                    <?php 
                                        $datetime = new DateTime($model->eventStartTime);
                                        $year = $datetime->format('Y');
                                        $month = $datetime->format('m');
                                        $monthObj   = DateTime::createFromFormat('!m', $month);
                                        $monthName = $monthObj->format('F');
//                                        $monthNameShort = substr($monthName, 0, 3); // March
                                        $day = $datetime->format('d');
                                        $hour = $datetime->format('H');
                                        $minute = $datetime->format('i');
                                    ?>
                                    <b>The event will be covered by <?php echo $model->eventLead ?> on <?php echo $day . " " . $monthName . " " . $year . " " . $hour . ":" . $minute?></b>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab2" class="liveTab">
                            <div class="row">
                                <div class="col-md-7 leftCol">
                                    <?php if ($model->eventVideo != "") {?>
                                        <div class="youtube">
                                            <iframe src="https://www.youtube.com/embed/<?php echo $model->eventVideo ?>?autoplay=0" class="video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <?php if ($users->isAdmin == "true") {?> 
                                            <div class="top15"></div>
                                            <button type="button" class="btn btn-success btn-block hideVideoBtn">Hide video</button>
                                        <?php } 
                                    } ?>
                                </div>
                                <div class="col-md-5 rightCol">
                                    <div class="top15"></div>
                                    <div class="panel-primary">
                                        <div class="panel-heading">
                                            <span class="glyphicon glyphicon-comment"></span> Chat
                                        </div>
                                        <div class="panel-body">
                                            <ul class="chat chatLive">
                                                <?php $this->renderPartial('_messages', array('messages'=>$messages)); ?>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="input-group">
                                                <input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                                <span class="input-group-btn">
                                                    <button class="sendBtn btn btn-warning btn-sm" id="btn-chat">
                                                        Send</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($users->isAdmin == "true") {?> 
                                        <div class="top15"></div>
                                        <button type="button" class="btn btn-success btn-block showVideoBtn hide">Show video</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-md-7">
                                    <?php if ($model->eventVideo != "") { ?>
                                        <div class="youtube">
                                            <iframe src="https://www.youtube.com/embed/<?php echo $model->eventVideo ?>?autoplay=0" class="video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-5">
                                    <div class="top15"></div>
                                    <div class="panel-primary">
                                        <div class="panel-heading">
                                            <span class="glyphicon glyphicon-comment"></span> Chat
                                        </div>
                                        <div class="panel-body">
                                            <ul class="chat">
                                                <?php $this->renderPartial('_messages', array('messages'=>$messages)); ?>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="input-group">
                                                <input id="message" type="text" class="form-control input-sm disabled" placeholder="Type your message here..." />
                                                <span class="input-group-btn">
                                                    <button class="sendBtn btn btn-warning btn-sm disabled" id="btn-chat">
                                                        Send</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php if($users->isAdmin == "true" && $model->isStarted == "false") { ?>
                <button type="button" class="btn btn-success btn-block startEventBtn">Start event</button>
            <?php } ?>

            <button type="button" class="btn btn-danger btn-block finishEventBtn hide">Finish event</button>

            <?php if($users->isAdmin == "true" && $model->isStarted == "true" && $model->isFinished == "false") { ?>
                <button type="button" class="btn btn-danger btn-block finishEventBtn">Finish event</button>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    var eventId = '<?php print Yii::app()->request->getParam('id') ?>';
    
    var loadMessagesReqUrl = '<?php print Yii::app()->createUrl('messages/messages/loadMessages') ?>';
    var sendMessageReqUrl = '<?php print Yii::app()->createUrl('messages/messages/sendMessage') ?>';
    var changeStatusEventReqUrl = '<?php print Yii::app()->createUrl('events/events/changeStatusEvent') ?>';
</script>
