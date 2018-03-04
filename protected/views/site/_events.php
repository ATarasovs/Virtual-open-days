<?php foreach($subscribedEvents as $event) { 
    if ($event->isStarted == "true" && $event->isFinished == "false") {
        $status = "In progress";
    }
    else if ($event->isStarted == "true" && $event->isFinished == "true") {
        $status = "Finished";
    }
    else {
        $status = "Not started";
    }
?>
<a href="<?php print Yii::app()->createUrl('events/events/view'); ?>?id=<?php echo $event->eventId ?>" class="list-group-item event" id="<?php echo $event->eventId ?>"><?php echo $event->eventName; ?> <small>(<?php echo $event->eventStartDate; ?> <?php echo $event->eventStartTime; ?>)</small> - <?php echo $status ?></a>
<?php } ?>