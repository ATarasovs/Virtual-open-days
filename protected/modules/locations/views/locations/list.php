<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.locations.assets').'\list.js'), CClientScript::POS_HEAD);
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
    <div class="item-listing small-padding-bg">
        <div class="container">
            <?php foreach ($locations as $location) { ?>
                <div class="top30"></div>
                <div class="row">
                    <?php if ($location->locationImage != "") { ?>  
                        <div class="col-md-3"> <img class="uploadImg" src="/vod/images/buildings/<?php echo $location->locationImage ?>" alt=""></div>
                    <?php } else {?>
                        <div class="col-md-3"> <img class="uploadImg" src="/vod/images/no-image.png" alt=""></div>
                    <?php } ?>
                    <div class="col-md-9 home-list-pop-desc inn-list-pop-desc"><h3><?php echo $location->locationName ?></h3>
                        <h4>Department: <?php echo $location->locationDepartment ?></h4>
                        <p><?php echo $location->locationShortDescription ?></p>
                        <p class="right"><a class="readmore" href="<?php print Yii::app()->createUrl('locations/locations/view?id=' . $location->locationId); ?>">Read more</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="top15"></div>
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
