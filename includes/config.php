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

$clearSkillsMoney = 5000000;
$clearSkillTreeMoney = 500000;
$clearInvMoney = 50000;
$clearPKMoney = 50000;

// Module Reset Character
$ModResetConf = array(
#		       |         Classes           	|   Reset Level  |  Max Resets  | Reset Amount | Reset Resource | Reset Location   |    Reset Stats
#------------------------------------------------------------------------------------------------------------------------
#                                                                                      							(Map,x,y)	  (Str,Dex,Vit,Ene,Lead)
    array(array(0,19,1,3,16,16,48,50,64,66)	,       400      ,  	999		, 	5000000    , 	'zen'		,array(0,134,127)),
    array(array(32,33,35)					,       400      ,  	999		, 	5000000    , 	'zen'		,array(3,172,107)),
    array(array(80,81,82)					,       400      ,  	999		, 	5000000    , 	'zen'		,array(51,217,41)),
    array(array(0,1,3)						,       400      ,  	999		, 	5000000    , 	'zen'		,array(0,134,127) , array(18,18,15,30,0)),
    array(array(16,17,19)					,       400      ,  	999		, 	6000000    , 	'zen'		,array(0,134,127) , array(28,20,25,10,0)),
    array(array(48,50)						,       400      ,  	999		, 	7000000    , 	'zen'		,array(0,134,127) , array(26,26,26,26,0)),
    array(array(64,66)						,       400      ,  	999		, 	8000000    , 	'zen'		,array(0,134,127) , array(26,20,20,15,25)),
    array(array(32,33,35)					,       400      ,  	999		, 	9000000    , 	'zen'		,array(3,172,107) , array(22,25,20,15,0)),
    array(array(80,81,82)					,       400      ,  	999		, 	9500000    , 	'zen'		,array(51,217,41) , array(21,21,18,23,0)),
);


// Module Teleport Character
$ModTeleportConf = array(
#		|     City     |   Location     |  Amount          |  Resource  |
#        ---------------------------------------------------------------
    array(	"Lorencia" ,  "0,134,127"	,  "5000000"	   ,  "zen" ),
    array(	"Davias"   ,  "2,206,40"	,  "5000000"	   ,  "zen"	),
    array(	"Noria"    ,  "3,172,107"	,  "5000000"	   ,  "zen"	),
    array(	"Elbeland" ,  "51,217,41"	,  "5000000"	   ,  "zen"	),
);


?>
