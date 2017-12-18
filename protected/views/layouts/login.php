<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fontawesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    
    <div class="container">
        <div class="row">
            <h1 align="center">Welcome to virtual open days</h1>
<!--            <h1 style="position: absolute; top: 8px; left: 16px;">Welcome to virtual open days</h1>-->
        </div>
        
        <div class="row">
            <div class="col-xs-4 text-center">
                <button id="homeBtn" type="button" class="btn btn-success"><i class="fa fa-home" aria-hidden="true"></i> Go to the start page</button>
            </div>
            <?php if(Yii::app()->user->isGuest){ ?>
                <div class="col-xs-4 text-center">
                    <button id="loginBtn" type="button" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                </div>
                <div class="col-xs-4 text-center">
                    <button id="registerBtn" type="button" class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
                </div>
            <?php } else { ?>
                <div class="col-xs-4 text-center">
                    <button id="logoutBtn" type="button" class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container top30">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" alt="New york" style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container" id="page">

        <?php echo $content; ?>

    </div><!-- page -->
    <script>
        var homeReqUrl = '<?php print Yii::app()->createUrl('/site/index') ?>';
        var loginReqUrl = '<?php print Yii::app()->createUrl('/site/login') ?>';
        var registerReqUrl = '<?php print Yii::app()->createUrl('/site/register') ?>';
        var logoutReqUrl = '<?php print Yii::app()->createUrl('/site/logout') ?>';
        
        $(document).ready(function() {
            initButtons();
            
            function initButtons() {
                $( "#homeBtn" ).click(function() {
                    location.href = homeReqUrl;
                });
                
                $( "#loginBtn" ).click(function() {
                    location.href = loginReqUrl;
                });
                
                $( "#registerBtn" ).click(function() {
                    location.href = registerReqUrl;
                });
                
                $( "#logoutBtn" ).click(function() {
                    location.href = logoutReqUrl;
                });
            }
        });
    </script>
</body>
</html>
