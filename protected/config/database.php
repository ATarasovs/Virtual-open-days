<?php

// This is the database connection configuration.
 return array(
 	'connectionString'=>'mysql:host=localhost;dbname=virtual_open_days',//override my_database for you actual db
 	'emulatePrepare' => true,
 	'username' => 'root',
 	'password' => '',
 	'charset' => 'utf8',
 
//	'connectionString'=>'mysql:host=silva.computing.dundee.ac.uk;dbname=vodaydb',//override my_database for you actual db
//	'emulatePrepare' => true,
// 	'username' => 'voday',
// 	'password' => '8473.vod.3748',
// 	'charset' => 'utf8',
 );
// 
// return array(
//
//'components'=>array(
//
//  'db'=>array(
//        'connectionString'=>'mysql:host=localhost;dbname=my_database',//override my_database for you actual db
//        'username'=>'root',
//        'password'=>''
//  ),
//
//),
//
//);