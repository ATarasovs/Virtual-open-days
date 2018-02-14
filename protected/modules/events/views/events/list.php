<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\list.js'), CClientScript::POS_HEAD);
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
    <div class="top30"></div>
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <ul class="event-list">
            
            <?php foreach ($events as $event) { 
                $datetime = new DateTime($event->eventStartTime);
                $year = $datetime->format('Y');
                $month = $datetime->format('m');
                $monthObj   = DateTime::createFromFormat('!m', $month);
                $monthName = $monthObj->format('F');
                $monthNameShort = substr($monthName, 0, 3); // March
                $day = $datetime->format('d');
                $hour = $datetime->format('H');
                $minute = $datetime->format('i');
                
                ?>
                <li>
                    <time datetime="2016-02-14">
                        <span class="day"><?php echo $day ?></span>
                        <span class="month"><?php echo $monthNameShort ?></span>
                        <span class="year"><?php echo $year ?></span>
                        <span class="time"><?php echo $hour ?>:<?php echo $minute ?></span>
                    </time>
                    <?php if ($event->eventImage != "") { ?>  
                        <img src="/vod/images/events/<?php echo $event->eventImage ?>" alt="">
                    <?php } else {?>
                        <img src="/vod/images/no-image.png" alt="">
                    <?php } ?>
                    <div class="info information">
                        <h2 class="title"><?php echo $event->eventName ?></h2>
                        <?php foreach ($locations as $location) {
                            if ($location->locationId == $event->locationId) {
                                $locationName = $location->locationName;
                            }
                        } ?>
                        <div class="top10"></div><p class="desc"><small><strong>Location:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $locationName ?><br>Event starts:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $day ?>&nbsp;<?php echo $monthName ?>&nbsp;&nbsp;<?php echo $hour ?>:<?php echo $minute ?></strong><br>Click on the event to read more</small></p>
                    </div>

                    <div class="social">    
                        <div class="material-switch pull-right">
                            <?php 
                                $count = 0;
                                $userId = Yii::app()->user->getId(); 
                                foreach ($participants as $participant) { 
                                    if($participant->eventId == $event->eventId && $participant->userId == $userId) {?>
                                        Signup<input class="switchSubscribe" id="<?php echo $event->eventId ?>" name="someSwitchOption001" type="checkbox" checked/>
                                    <?php 
                                        $count++;
                                    }
                                }
                                if ($count == 0) { ?>
                                    Signup<input class="switchSubscribe" id="<?php echo $event->eventId ?>" name="someSwitchOption001" type="checkbox" />
                                <?php } ?>
                            <label for="<?php echo $event->eventId ?>" class="label-success"></label>
                        </div>
                    </div>
                </li>
                <li class="event-details">
                    <div class="info" style="height:auto">
                        <div class="col-xs-12">
                            <p class="desc"><?php echo $event->eventShortDescription ?></p> 
                            <button class="viewBtn btn btn-link btn-default pull-right" data-event-id="<?php echo $event->eventId; ?>">Open event</button>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
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
    
<script>
    var userId = '<?php print Yii::app()->user->getId(); ?>';
    var subscribeReqUrl = '<?php print Yii::app()->createUrl('events/events/subscribe') ?>'; 
    var eventViewReqUrl = '<?php print Yii::app()->createUrl('events/events/view') ?>';
</script>