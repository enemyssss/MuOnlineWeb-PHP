<?php
// MSSQL Connection
$serverName = "enemY"; //serverName\instanceName
$connectionInfo = array("Database"=>"MuOnline", "UID"=>"sa", "PWD"=>"123456");

//Server Info

$server="Test"; // Name of your server
$serverVer="99b"; // Server Version
$serverExpDrop="500x/60%"; // Server Exp
$serverIp="127.0.0.1"; // Server Ip Adress
$serverPort="44405"; // Server Port

//Basic information
	if ($fp=@fsockopen($serverIp,$serverPort,$ERROR_NO,$ERROR_STR,(float)0.5))
	{
	fclose($fp);
	$serstats= "ON";
	}
else
	{
	$serstats= "OFF";
	}

//Download Client Info
$clientName = "Test"; // Insert client Name
$clientSize = "500mb"; // Insert client Size
$clientFrom = "Mega.nz"; // Insert download page name
$clientLink = "http://test.com/"; // Insert link

//Character Info
$resetLevel = 400;
$resetMoney = 5000000;
$clearPoints = 0; // 0 - OFF / 1 - ON
$maxResets = 999;
$teleportMoney = 5000000;

?>
