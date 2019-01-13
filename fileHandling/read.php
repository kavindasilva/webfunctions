<?php

/**
	This file does file reading, and encoding to JSON
	Sub string
*/

$time=date("Ymd His"); //echo $time;
$time=str_replace(' ', '_', $time); //echo $time; //2019-01-13_14:38:30D

$scanPath="Dir2/"; 
$files=scandir($scanPath);
$files=array_diff($files, array(".", "..") ); // remove '.' , '..' 

/*
	Since this php script is executed outside the "Dir2" file name should be split before checking
*/
foreach($files as $val){
	$val=$scanPath.$val; // since this php script runs form outside the "dir2". To get the file name with path
	if( is_dir($val) ){
		echo "DIR: $val";
	}
	elseif( is_file($val) ){ // verify a file
		$val=explode("/",$val)[1]; //output "dir2","fileName"
	
		if( substr($val,0,4)=="2019" ){
			echo "created in 2019 $val";
		}
		elseif( substr($val,-3)=="txt" ){
			echo ".txt $val";
		}
		else{
			$ext=explode(".",$val); // there may be more than one "." in file name
			$ext=array_reverse($ext)[0]; // last index of the array, by reversinh the array
			echo "just a file: $val --> extension= $ext";
		}
	}
	else{
		echo "Neither Dir nor File: $val";
	}
	echo "<br/>";
}
echo "<hr/>";

/**
	JSON encoding
*/
$newFile="testing.txt";

$jVar=json_encode($files);
echo $jVar;

print_r($files);



?>