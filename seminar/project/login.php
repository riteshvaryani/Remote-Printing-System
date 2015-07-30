<?php

function checkuser($user,$db_server)
{
	$query="SELECT userid,username from userinfo where username='$user'";
	$result=mysql_query($query,$db_server);
	$row=mysql_fetch_row($result);
	if($row!=0)
		return 0;
	else
		return 1;
}

$db_hostname="localhost";
$db_database="printdoc";
$db_username="root";
$db_password="";

$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if(!$db_server) die ("unable to connect to MySQL : ".mysql_error());

mysql_select_db($db_database) or die("Unable to select database:".mysql_error());


if(($_POST['l_username']))
{
	$username=$_POST['l_username'];
	$pass=$_POST['l_pass'];
	if(!checkuser($username,$db_server) && $username!="" && $pass!="")
	{
	$query="SELECT password FROM userinfo where username='$username'";
	$result = mysql_query($query,$db_server);
	while($row = mysql_fetch_array($result))
   {
    $ans = $row['password'];
   }
 
	if($ans===MD5($pass))
	{
		session_start();
		header("Location: http://localhost/project/1.php");
	}
	else 
	{
		echo "Wrong username or password.";
	}
}
else 
	{
		echo "Wrong username or password.";
	}

	
}	
?>