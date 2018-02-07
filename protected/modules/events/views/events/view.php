<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\view.js'), CClientScript::POS_HEAD);
?>

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


<div class="container">
    <div class="row">
<!--        <div class="col-md-7">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/_IPXiNIXuFI" class="video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>-->
        <div class="col-md-5">
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
                        <input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="sendBtn btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loadMessagesReqUrl = '<?php print Yii::app()->createUrl('messages/messages/loadMessages') ?>';
    var sendMessageReqUrl = '<?php print Yii::app()->createUrl('messages/messages/sendMessage') ?>';
    var eventId = '<?php print Yii::app()->request->getParam('id') ?>';
</script>
