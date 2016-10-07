<?php

//Initialize the System, connect to the database!
require_once("Config/init.php");


//This is important!
function ValidJSON($str) {
   json_decode($str);
   return json_last_error() == JSON_ERROR_NONE;
}
echo "Hello!";
//Get the Servers Post Request!
$ServerPost = file_get_contents("php://input");

//If our Post is Valid, get the code behind it!
if (strlen($ServerPost) > 0 && ValidJSON($ServerPost))
  $DecodedPost = json_decode($ServerPost);




/*
 * Please do not operate outside this if statement!
 * Only deprecated servers or unauthorized people access it!
 */
if(isset($DecodedPost["SecureCode"]))
{
	if($DecodedPost["SecureCode"] == Config::Get("server.code"))
	{
		if(isset($DecodedPost["Port"]))
		{
			//Get Your new VMs IP Adress
			$ServerIP = $_SERVER["REMOTE_ADDR"];
			$Port = $DecodedPost["Port"];
			$State = $DecodedPost["State"];
			
			if($State == "Started")
				$db->Insert(array("IP" => $ServerIP.":".$Port, "State" => $State );
				$db->Execute("Servers");
			
			if($State == "InGame")
				$db->Where("IP", $ServerIP.":".$Port, "=");
				$db->Update(array("State" => $State));
				$db->Execute("Servers");
			
			if($State == "Shutdown")
				$db->Where("IP", $ServerIP.":".$Port, "=");	
				$db->Delete();
				$db->Execute("Servers");
		}
	}
}
?>