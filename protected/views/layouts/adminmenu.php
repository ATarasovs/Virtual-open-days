<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="language" content="en">


            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap.min.css">
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery/jquery-3.2.1.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap.min.js"></script>

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fontawesome/css/font-awesome.min.css">

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css">
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css">
            
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/summernote/summernote.css">
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/summernote/summernote.js"></script>
            
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="active">
                <ul class="list-unstyled components">
                    <li class="homeLi">
                        <a href="<?php print Yii::app()->createUrl('site/home'); ?>">
                            <i class="fa fa-home fa-3x"></i>
                            Home
                        </a>
                    </li>
                    <li class="buildingsLi">
                        <a href="<?php print Yii::app()->createUrl('locations/locations/list'); ?>">
                            <i class="fa fa-map-marker"></i>
                            Locations
                        </a>
                    </li>
                    <li class="eventsLi">
                        <a href="#eventsSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            Events
                        </a>
                        <ul class="collapse list-unstyled" id="eventsSubmenu">
                            <li><a href="<?php print Yii::app()->createUrl('events/events/listsubscribedevents'); ?>">My events</a></li>
                            <li><a href="<?php print Yii::app()->createUrl('events/events/listallevents'); ?>">All events</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-comments"></i>
                            Forum
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            Analytics
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Pages
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">About Scotland</a></li>
                            <li><a href="#">About Dundee</a></li>
                            <li><a href="#">About University</a></li>
                            <li><a href="#">How to apply</a></li>
                            <li><a href="#">Costs & Funding</a></li>
                            <li><a href="#">Accommodation</a></li>
                            <li><a href="#">Entertainment</a></li>
                        </ul>
                    </li>
                    <li class="adminLi">
                        <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                            Manage
                        </a>
                        <ul class="collapse list-unstyled" id="adminSubmenu">
                            <li><a href="<?php print Yii::app()->createUrl('users/users/admin'); ?>">Users</a></li>
                            <li><a href="<?php print Yii::app()->createUrl('locations/locations/admin'); ?>">Locations</a></li>
                            <li><a href="<?php print Yii::app()->createUrl('events/events/admin'); ?>">Events</a></li>
                            <li><a href="<?php print Yii::app()->createUrl('media/media/admin'); ?>">Media</a></li>
                            <li><a href="#">About Scotland</a></li>
                            <li><a href="#">About Dundee</a></li>
                            <li><a href="#">About University</a></li>
                            <li><a href="#">How to apply</a></li>
                            <li><a href="#">Costs & Funding</a></li>
                            <li><a href="#">Accommodation</a></li>
                            <li><a href="#">Entertainment</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="container" class="col-xs-12">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <a href="<?php print Yii::app()->createUrl('site/home'); ?>">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Dundee University Virtual Open Days" style="width:247px;height:43px;">
                            </a>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php print Yii::app()->createUrl('site/home'); ?>">Home</a></li>
                                <li><a href="<?php print Yii::app()->createUrl('users/users/view?id=' . Yii::app()->user->getId()); ?>">Profile <small>(<?php echo Yii::app()->user->getName(); ?>)</small></a></li>
                                <li><?php echo CHtml::link('Logout',array('/site/logout')); ?></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Content goes here -->
                <div id="content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </body>
</html>