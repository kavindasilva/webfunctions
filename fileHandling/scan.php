<?php

/**
	This file does directory reading and identifying files, type, and Creating new directory if not exists
*/

$scanPath="."; // current directory
$files=scandir($scanPath);
$files=array_diff($files, array(".", "..") );

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
	Creates a new Directory If not exists
*/
$newDir="Dir2";
if( !file_exists($newDir) ){
	echo $newDir." not exists";
	mkdir($newDir);
}

$files=array_diff($files, array(".", "..") );
print_r($files);



?>