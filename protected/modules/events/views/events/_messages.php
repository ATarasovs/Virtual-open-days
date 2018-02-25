<?php foreach($messages as $message) {
    $datetime = new DateTime($message->time);
    $timeSent = $datetime->format('d.m.Y H:i:s');

    if ($message->login == Yii::app()->user->getName()) { ?>
        <li class="message right clearfix" id="myMessage">
            <span class="chat-img pull-right">
                <img src="http://placehold.it/50/55C1E7/fff&text=A" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
                <div class="header">
                    <small class="pull-left text-muted">
                        <span class="glyphicon glyphicon-time"></span><?php echo $timeSent; ?>
                    </small>
                    <strong class="pull-right primary-font"><?php echo $message->author; ?></strong> <br/>
                </div>
                <p class="message">
                    <?php echo $message->message; ?>
                </p>
            </div>
        </li>
    <?php } 
    else { ?>
        <li class="message left clearfix">
            <span class="chat-img pull-left">
                <img src="http://placehold.it/50/55C1E7/fff&text=A" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font"><?php echo $message->author; ?></strong> 
                    <small class="pull-right text-muted">
                        <span class="glyphicon glyphicon-time"></span><?php echo $timeSent ?>
                    </small>
                </div>
                <p>
                    <?php echo $message->message; ?>
                </p>
            </div>
        </li>
    <?php 
    }
} ?>