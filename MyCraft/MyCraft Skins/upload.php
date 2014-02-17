<?php 
#Created by: Xolitude/Illiterate - Copyright © Xolitude/Illiterate 2014
#Started: 1/17/14(January 17, 2014)

 $target = "MCSkin/"; 
 $target = $target . $_FILES['uploaded']['name'] ; 
 $ok=1; 
 if (file_exists($target))
 {
 unlink("MCSkin/" . $_FILES['uploaded']['name']);
 }
 
if (!($_FILES['uploaded']['type'] == "image/png"))
{
	die("Sorry, something went wrong during your upload.<br>".
	"Please try again!");
}
else
{
if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{
	echo 'Your skin has been uploaded!<br> Please give it 10-30 seconds to update!';
} 
 else 
{
	echo "Sorry, there was a problem uploading your file.<br>";
	echo "Please try again.";
}
}
 ?> 