<?php 
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\view.js'), CClientScript::POS_HEAD);
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
    <h2><?php echo $model->locationName; ?></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        
                        <li class="active"><a href="#tab1" class="informationTabLi" data-toggle="tab">Information</a></li>
                        <li><a href="#tab2" class="galleryTabLi" data-toggle="tab">Gallery</a></li>
                        <li><a href="#tab3" class="photosTabLi" data-toggle="tab">360 photos</a></li>
                        <li><a href="#tab4" class="videosTabLi" data-toggle="tab">Videos</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <div class="top15"></div>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-3">
                                        <?php if ($model->locationImage != "") { ?>  
                                            <img src="/vod/images/buildings/<?php echo $model->locationImage ?>" alt="" style="width:100%">
                                        <?php } else {?>
                                            <img src="/vod/images/no-image.png" alt="" style="width:100%">
                                    <?php } ?>
                                </div>
                                <div class="col-md-offset-1 col-xs-6">
                                    <?php echo $model->locationShortDescription ?>
                                </div>
                            </div>
                            <div class="top15"></div>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-10">
                                    <h3>Full description</h3>
                                    <?php echo $model->locationDescription ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab2" class="liveTab">
                            <div class="row">
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab3">
                            <div class="row">
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab4">
                            <div class="row">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
