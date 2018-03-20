<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Virtual Open Days',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.users.models.*',
                'application.modules.users.components.*',
                'application.modules.locations.models.*',
                'application.modules.locations.components.*',
                'application.modules.events.models.*',
                'application.modules.events.components.*',
                'application.modules.participants.models.*',
                'application.modules.participants.components.*',
                'application.modules.messages.models.*',
                'application.modules.messages.components.*',
                'application.modules.media.models.*',
                'application.modules.media.components.*',
                'application.modules.information.models.*',
                'application.modules.information.components.*',
                'application.modules.analytics.models.*',
                'application.modules.analytics.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'users',
                'locations',
                'events',
                'participants',
                'messages',
                'media',
                'information',
                'analytics',
	),

	// application components
	'components'=>array(
            
//                'fixture'=>array(
//                    'class'=>'system.test.CDbFixtureManager',
//                ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

            // uncomment the following to enable URLs in path-format

            'urlManager'=>array(
                    'urlFormat'=>'path',
                    'rules'=>array(
                            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                            '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    ),
            ),


            // database settings are configured in database.php
            'db'=>require(dirname(__FILE__).'/database.php'),

            'errorHandler'=>array(
                    // use 'site/error' action to display errors
                    'errorAction'=>YII_DEBUG ? null : 'site/error',
            ),

            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning, trace',
                    ),
                    array(
                        'class' => 'CWebLogRoute', 'enabled' => YII_DEBUG,
                        'levels' => 'error, warning, trace',
                        'categories' => 'http.*',
                        'showInFireBug' => true,
                    ),
                    array(
                        'class' => 'CFileLogRoute', 'enabled' => YII_DEBUG,
                        'logFile' => 'http.log',
                        'levels' => 'error, warning, trace',
                        'categories' => 'http.*',
                    ),
                    array(
                        'class' => 'CFileLogRoute', 'enabled' => YII_DEBUG,
                        'logFile' => 'http.cookies.log',
                        'categories' => 'http.cookies',
                    ),
                ),
            ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
