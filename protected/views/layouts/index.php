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

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/index.css">
            <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                
                <!--<h1 align="center">Welcome to virtual open days</h1>-->
                <div class="oval"><h1 align="center">Welcome to virtual open days</h1></div>


            </div>
            <div class="top15"></div>
            <div class="row btnGroup">
                <?php if(Yii::app()->user->isGuest){ ?>

                    <div class="col-md-6 col-sm-6 col-xs-12 text-center buttonDiv">
                        <button id="loginBtn" type="button" class="btn btn-primary btn-lg btn-block btn-huge"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 text-center buttonDiv">
                        <button id="registerBtn" type="button" class="btn btn-primary btn-lg btn-block btn-huge"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center buttonDiv">
                        <button id="logoutBtn" type="button" class="btn btn-primary btn-lg btn-block btn-huge"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                    </div>
                <?php } ?>
            </div>
        </div>

            <?php echo $content; ?>

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
