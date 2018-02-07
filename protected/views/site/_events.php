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
    <a href="#" class="list-group-item event" id="<?php echo $event->eventId ?>"><?php echo $event->eventName; ?> (<?php echo $event->eventStartTime; ?>) - <?php echo $status ?></a>
<?php } ?>