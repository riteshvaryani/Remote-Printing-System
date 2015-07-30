<html>
<head>
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<center><h1>ADD USER</h1></center><br>
<br>
<div id="form1">
<form id="Adduser" name="Adduser" method="post" action="adduser.php">
Enter Name<br>
<input name="username" type="text" class="textfield" id="login" /><br><br>
Enter Password<br>
<input name="pass" type="password" class="textfield" id="password" />
<br><br>
Enter Balance<br>
<input name="bal" type="number" value = "0" id="bal" minlength ="0" />
<br><br>
<input type="submit" name="submit" id="button1" value="submit" onclick = " return validate()">
<script type="text/javascript">
function validate()
		
		{
		
		var name = document.getElementById("login").value;
		var pass = document.getElementById("password").value;
		var bal = document.getElementById("bal").value;
		var a = true;
		if (name.length == 0)
		{
		
		alert("Please, enter your name");
		a = false;
		return false;
		
		}
             if (pass.length == 0)
		{
		
		alert("Please, enter your password");
		a = false;
		return false;
		
		}
             if (pass.length <= 4)
		{
		
		alert("Please enter more than 4 characters for password");
		a = false;
		return false;
		}

alert("Thank you, " + name);
}
</script>
</form>
</div>
</body>
</html>

<?php
$con = mysql_connect("db4free.net:3306","riteshvaryani","chelseafc100");
session_start() ;	
	
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("printinginfo", $con);
if(isset($_POST['submit']) && !empty($_POST['submit']))
{
mysql_query("INSERT INTO userinfo (username, password, balance)
VALUES
('$_POST[username]','$_POST[pass]','$_POST[bal]')");
echo "1 record added";
}
mysql_close($con);
?>
		