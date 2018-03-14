<?php 
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\view.js'), CClientScript::POS_HEAD);
?>

<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Locations list', 'url' => array('/locations/locations/list')),
            array('name' => 'Location view <small>(' . $model->locationName . ')</small>'),
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


<div class="container-fluid">    
    <h2><?php echo $model->locationName; ?></h2>
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        
                        <li class="active"><a href="#tab1" class="informationTabLi" data-toggle="tab">Information</a></li>
                        <li><a href="#tab2" class="photosTabLi" data-toggle="tab">Photos</a></li>
                        <li><a href="#tab3" class="panoramasTabLi" data-toggle="tab">360 photos</a></li>
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
                        
                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                <?php 
                                    $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $model->locationName);
                                    foreach ($photos as $photo) { ?>
                                        <div class="col-lg-4 col-sm-6 col-xs-12" style="height:250px;"><a data-photo-id="<?php echo $photo->mediaId ?>" data-photo-title="<?php echo $photo->mediaPath ?>" data-photo-folder="<?php echo $locationName ?>" href="javascript:;"><img class="thumbnail img-responsive galleryphoto" src="/vod/images/media/photos/<?php echo $locationName ?>/<?php echo $photo->mediaPath ?>"></a></div>
                                <?php } ?>
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

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-photo">
        <div class="modal-content">
            <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
		
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".buildingsLi").addClass("active");

        initButtons();
    });
    
    function initButtons() {
        $('.thumbnail').click(function(){
            $('.modal-body').empty();

            var photoId = $(this).parent('a').attr("data-photo-id");
            var photoTitle = $(this).parent('a').attr("data-photo-title");
            var photoFolder = $(this).parent('a').attr("data-photo-folder");

            $(".deleteBtn").attr("data-photo-id", photoId);
            $(".deleteBtn").attr("data-photo-title", photoTitle);
            $(".deleteBtn").attr("data-photo-folder", photoFolder);

            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show:true});
        });
    }
</script>
