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
            
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="active">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="<?php print Yii::app()->createUrl('site/home'); ?>">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-calendar"></i>
                            Events
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="<?php print Yii::app()->createUrl('events/events/listsubscribedevents'); ?>">My events</a></li>
                            <li><a href="<?php print Yii::app()->createUrl('events/events/listallevents'); ?>">All events</a></li>
                        </ul>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Pages
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-link"></i>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                            Contact
                        </a>
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
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Profile</a></li>
                                <li><?php echo CHtml::link('Logout',array('/site/logout')); ?></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Content goes here -->
                <div id="content" class="col-xs-12">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </body>
</html>