<?php 
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.events.assets').'\view.js'), CClientScript::POS_HEAD);
?>

<?php 
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => 'Home', 'url' => array('/site/home')),
            array('name' => $model->informationTitle),
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
    <h2><?php echo $model->informationTitle; ?></h2>
    <div class="row">
        <div class="col-md-12">
            <?php echo $model->informationDescription; ?>
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
