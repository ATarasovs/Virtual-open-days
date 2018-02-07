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
    <div class="top30">
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
                    <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                    <div class="info">
                        <h2 class="title"><?php echo $event->eventName ?></h2>
                        <p class="desc"><?php echo $event->eventShortDescription ?><br><small><strong>Event starts:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $day ?>&nbsp;<?php echo $monthName ?>&nbsp;&nbsp;<?php echo $hour ?>:<?php echo $minute ?></strong></small> </p>
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
                        <p class="desc"><?php echo $event->eventDescription ?></p>    
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
    
<script>
    var userId = '<?php print Yii::app()->user->getId(); ?>';
    var subscribeReqUrl = '<?php print Yii::app()->createUrl('events/events/subscribe') ?>';    
</script>