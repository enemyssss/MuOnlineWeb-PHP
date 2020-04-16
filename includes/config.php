<?php
// MSSQL Connection
$serverName = "enemY"; //serverName\instanceName
$connectionInfo = array("Database"=>"MuOnline", "UID"=>"sa", "PWD"=>"123456");

//Server Info

$server="Mu Online Server Name"; // Name of your server
$serverVer="99b"; // Server Version
$serverExpDrop="500x/60%"; // Server Exp
$serverIp="127.0.0.1"; // Server Ip Adress
$serverPort="44405"; // Server Port



//Download Client Info
$clientName = "Test"; // Insert client Name
$clientSize = "500mb"; // Insert client Size
$clientFrom = "Mega.nz"; // Insert download page name
$clientLink = "http://test.com/"; // Insert link

//Character Info
$resetLevel = 400;
$resetMoney = 5000000;
$clearStats = 1; // 0 - OFF / 1 - ON
$levelUpPoints = 0; // Set LevelUpPoints when $clearStats = 1
$maxResets = 999;
$teleportMoney = 5000000;
$clearSkillsMoney = 5000000;
$clearSkillTreeMoney = 500000;
$clearInvMoney = 50000;
$clearPKMoney = 50000;


// Module Location
$location = array(
#		|     City     |   Location     |  Amount          |  Resource  |
#        ---------------------------------------------------------------
    array(	"Lorencia" ,  "0,134,127"	,  "5000000"	   ,  "zen" ),
    array(	"Davias"   ,  "2,206,40"	,  "5000000"	   ,  "zen"	),
    array(	"Noria"    ,  "3,172,107"	,  "5000000"	   ,  "zen"	),
    array(	"Elbeland" ,  "51,217,41"	,  "5000000"	   ,  "zen"	),
);


?>
