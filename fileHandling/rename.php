<?php

/**
	This file does file reading, and rename, and move files
	String replacing
*/

$time=date("Ymd His"); //echo $time;
$time=str_replace(' ', '_', $time); //echo $time; //2019-01-13_14:38:30D

$scanPath="."; // current directory
$files=scandir($scanPath);
$files=array_diff($files, array(".", "..") ); // remove '.' , '..' 

foreach($files as $val){
	if( is_dir($val) ){
		echo "DIR: $val";
	}
	elseif( is_file($val) ){
		echo "File: $val";
	}
	else{
		echo "Neither Dir nor File: $val";
	}
	echo "<br/>";
}
echo "<hr/>";

/**
	Move files
*/
$newFile="testing.txt";
if( !file_exists($newFile) ){
	echo $newFile." not exists";
	$fileObj=fopen($newFile,"w"); // create file
}
else{
	$fileObj=fopen($newFile,"w"); // open existing file
}
fwrite($fileObj, "Hi now time is ".$time);
fclose($fileObj);

//$time="adc";
//rename($newFile, "Dir2/x.txt"); //move // working
$newFileName="Dir2/".$time.".txt"; echo $newFileName;
rename($newFile, $newFileName); //move

$files=array_diff($files, array(".", "..") );
print_r($files);



?>