<?php
#Created by: Xolitude/Illiterate - Copyright © Xolitude/Illiterate 2014

$host="null";
$username="null";
$password="null";
$db_name="null";
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>