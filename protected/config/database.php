<?php

// This is the database connection configuration.
 return array(
 	'connectionString'=>'mysql:host=localhost;dbname=virtual_open_days',//override my_database for you actual db
 //	 uncomment the following lines to use a MySQL database
 	'emulatePrepare' => true,
 	'username' => 'root',
 	'password' => '',
 	'charset' => 'utf8',
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