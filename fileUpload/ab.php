
<?php

require_once "dbcon.php";

$subject=$_POST['sub'];
$fullName=$_POST['jname'];
$eMail=$_POST['jemail'];
$mobile=$_POST['jtel'];

$msg=$_POST['jmsg'];

$sql="insert into cv values(null, '$subject','$fullName','$eMail','$mobile','$msg');";
$res=mysqli_query($conn,$sql);
if(!$res){
	echo mysqli_error($conn);
}

$uid=0;
$sql="select max(id) as mui from cv;";
$res=mysqli_query($conn,$sql);
if(!$res){
	echo mysqli_error($conn);
}
else{
	//methana result eke rows gana !+ 1da balala error ekak denna
	$rr=mysqli_fetch_array($res);
	$uid=$rr['mui'];
}

$NEWname="abc3";

	if(isset($_FILES['upload'])){
		$filename=$_FILES["upload"]['name'];
		$tempname=$_FILES['upload']['tmp_name'];
		
		$temp = explode(".", $_FILES["upload"]["name"]); //get file extension 
//$NEWname = round(microtime(true)) . '.' . end($temp);
$NEWname = $uid . '.' . end($temp);  // rename new file name with the original extension
  
  
		//if(move_uploaded_file($tempname,"Notes/".$filename)){
		if(move_uploaded_file($tempname,"cvs/".$NEWname)){
			echo "<center>";
			echo "The file ".  basename( $_FILES['upload']['name']). " has been uploaded";
		
			echo "<a href='../../index.php'><br><input type='button' value='GO TO HOME'></a>";
			echo "</center>";
		}else{
			echo "There was an error uploading the file, please try again!";
		}
		//header('Location: index.php?filename='.$filename );
		echo "<script>alert('KK');</script>";
		exit();  
	}


?>


