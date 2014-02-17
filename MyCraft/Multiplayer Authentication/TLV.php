<?php
require_once './mysql.php';
#Created by: Xolitude/Illiterate - Copyright © Xolitude/Illiterate 2014
#Started: 1/17/14(January 17, 2014)

$playerName = strip_tags(addslashes($_GET['user']));
$mpServerId = strip_tags(addslashes($_GET['serverId']));

$sql = mysql_query("SELECT * FROM mycraft_users WHERE username='$playerName' AND serverId='$mpServerId'");

// Multiplayer ThreadLoginVerifier
while ($row = mysql_fetch_assoc($sql)) 
{
	echo "YES";
}
?>