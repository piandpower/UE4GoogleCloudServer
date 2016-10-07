<?php


//Define our Apps root path (should work on any php server!)

define("APPPATH", __DIR__ ."/../"));
require APPPATH.'classes/Config.php';
require APPPATH.'classes/Database.php';

//load our Config - you have to change stuff here!
Config::LoadFile("config/config.php");
$db = new Database();
$db->Connect();

