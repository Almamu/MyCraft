<?php
require_once './mysql.php';
#Created by: Xolitude/Illiterate - Copyright © Xolitude/Illiterate 2014
#Started: 1/17/14(January 17, 2014)

$aRequest = json_decode(file_get_contents('php://input'), true);
$playerCliToken = $aRequest['clientToken'];
$accessToken = $aRequest['accessToken'];

$playerName = mysql_fetch_assoc(mysql_query("SELECT username FROM mycraft_users WHERE accessToken='$accessToken'"));
$playerName = $playerName['username'];

$sql = mysql_query("SELECT * FROM mycraft_users WHERE username='$playerName'");

// Refresh authentication
while ($row = mysql_fetch_assoc($sql)) 
{
	$UUID = mysql_fetch_assoc(mysql_query("SELECT user_id FROM mycraft_users WHERE username='$playerName'"));
	$accessToken = mysql_fetch_assoc(mysql_query("SELECT accessToken FROM mycraft_users WHERE username='$playerName'"));
	
	$myToke = $accessToken['accessToken'];
	
	$CliResp = "{\"accessToken\":\"" . $myToke . "\"," .
		"\"clientToken\":\"" . $playerCliToken . "\"," .
		"\"selectedProfile\":{\"id\":\"" . $UUID['user_id'] . "\"," .
		"\"name\":\"" . $playerName . "\"}," .
		"\"user\":{\"id\":\"" . $UUID['user_id'] . "\"}}";
	$insertToken = "UPDATE mycraft_users SET accessToken='$myToke' WHERE username='$playerName'";
	$res = mysql_query($insertToken);
	echo $CliResp;
}

if($aRequest == null) {
echo "server returned null.";
}
?>