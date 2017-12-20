<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="language" content="en">

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap.min.css">
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery/jquery-3.2.1.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap.min.js"></script>

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fontawesome/css/font-awesome.min.css">

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css">

            <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Company Name</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
                                    <?php echo $content; ?>
				</div>
			</div>
		</div>
                <div class="top30">`</div>
                <div class="top30">`</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>