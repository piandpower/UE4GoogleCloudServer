<?php

return array(


	//database connect credentials
	'db' => array(
		'socket' => ':/cloudsql/strategy-game-144620:europe-west1:serverdatabase', //Gather this from connecting from App Engine!!
		'username' => 'root', //Database username
		'password' => 'ABC123' //Database users Password - Please be not ABC123!
		),
	
	
	'server' => array(
		'code' => 'EnterYourSecureCodeHere' //Please change this every revision you create a dedicated server build!
	));
	
	