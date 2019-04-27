<?php
$db="testAndroid";

$user=$_POST["username"];
$pass=$_POST["password"];
//$authenticae=$_POST[];
$host="localhost";
//$conn=mysqli_connect($host,$user,$pass,$db);
$conn=mysqli_connect("localhost","root","",$db);
if($conn)
{
	$query="select * from user where username like '$user' and 
	password like '$pass'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		echo "login successfully...!";
	}
	else{
		echo "login failed!";
	}
	
	
}
else
{
	echo"Not Connected...!";
}

?>