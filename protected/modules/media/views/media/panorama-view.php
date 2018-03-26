<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => 'Media', 'url' => array('/media/media/admin')),
            array('name' => 'Categories', 'url' => array('/media/media/panoramacategories')),
            array('name' => '360 degree photos <small>(' . $location->locationName . ')</small>', 'url' => array('/media/media/panoramaadmin?id=' . $location->locationId)),
            array('name' => 'View'),
        ),
    )); 
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
<!--*************************************************************-->

<div class="top30"></div>

<?php 
    $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $location->locationName);
    foreach ($photos as $photo) {
?>      
    <div id="panorama"></div>
    
    <div class="top10"></div>   

        <div class="row">
            <div class="col-md-12">
                <button class="deleteBtn btn btn-sm btn-danger" data-photo-id="<?php echo $photo->mediaId ?>" data-photo-title="<?php echo $photo->mediaPath ?>" data-photo-folder="<?php echo $locationName ?>">Delete</button>
                <a class="btn btn-primary btn-sm backBtn">
                    <i class="fa fa-file-image-o bigger-125"></i> Back to photos
                </a>
            </div>
        </div>
<?php } ?>

<script>
    var locationId = '<?php print Yii::app()->request->getParam('location') ?>';
    
    var deletePhotoReqUrl = '<?php print Yii::app()->createUrl('media/media/deletepanorama') ?>';
    var mediaPhotoCategoriesReqUrl = '<?php print Yii::app()->createUrl('media/media/panoramaadmin') ?>';
    
    $(document).ready(function() {
        $(".adminLi").addClass("active");
        
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": "<?php echo Yii::app()->request->baseUrl; ?>/images/media/panorama/<?php echo $locationName ?>/<?php echo $photo->mediaPath ?>",
            "autoLoad": true
        });
    
        initButtons();
    });
    
    function initButtons() {
        $( ".deleteBtn" ).click(function() { 
            var photoId = $(this).attr("data-photo-id");
            var photoTitle = $(this).attr("data-photo-title");
            var photoFolder = $(this).attr("data-photo-folder");
            
            location.href = deletePhotoReqUrl + "?id=" + photoId + "&title=" + photoTitle + "&folder=" + photoFolder + "&locationid=" + locationId;
        });
        
        $( ".backBtn" ).click(function() {
        location.href = mediaPhotoCategoriesReqUrl + "?id=" + locationId;
    });
    }
</script>