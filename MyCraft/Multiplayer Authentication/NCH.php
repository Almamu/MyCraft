<?php
require_once './mysql.php';
#Created by: Xolitude/Illiterate - Copyright © Xolitude/Illiterate 2014
#Started: 1/17/14(January 17, 2014)

$playerName = strip_tags(addslashes($_GET['user']));
$playerSessionId = strip_tags(addslashes($_GET['sessionId']));
$mpServerId = strip_tags(addslashes($_GET['serverId']));

$sql = mysql_query("SELECT * FROM mycraft_users WHERE username='$playerName'");

// Multiplayer NetClientHandler
while ($row = mysql_fetch_assoc($sql)) 
{
	$accessToken = mysql_fetch_assoc(mysql_query("SELECT accessToken FROM mycraft_users WHERE username='$playerName'"));
	$UUID = mysql_fetch_assoc(mysql_query("SELECT user_id FROM mycraft_users WHERE username='$playerName'"));
	
	$myToke = $accessToken['accessToken'];
	$myID = $UUID['user_id'];
	$FullToken = 'token:'.$myToke.':'.$myID;
	
	if ($FullToken == $playerSessionId)
	{
		$insertToken = "UPDATE mycraft_users SET serverId='$mpServerId' WHERE username='$playerName'";
		$res = mysql_query($insertToken);
		echo "ok";
	}
	else
	{
		echo "Unable to verify your session, modified sessionID?";
	}
}
?>