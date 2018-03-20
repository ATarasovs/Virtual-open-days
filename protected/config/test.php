<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'connectionString'=>'mysql:host=localhost;dbname=virtual_open_days',//override my_database for you actual db
                        'emulatePrepare' => true,
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8',
		),
	)
);
