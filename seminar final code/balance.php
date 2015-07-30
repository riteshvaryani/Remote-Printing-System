<html>
<head>
<link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
<center><h1>UPDATE BALANCE</h1></center><br><br>
<div id="form1">
<form action = "balance.php" method = "post">
Enter UserID</br>
<input name="userid" type="number" class="textfield" id="userid" /></br></br>
Enter New Balance</br>
<input name="bal" type="number" value = "0" id="bal" minlength ="0" /></br></br>
<input type="submit" name="submit" id="button1" value="submit" onclick = " return validate()">
<script type="text/javascript">
function validate()
		
		{
		
		var id = document.getElementById("userid").value;
                var bal = document.getElementById("bal").value;
		var a = true;
                 
             if (id.length == 0)
		{
		
		alert("Please, enter your id");
		a = false;
		return false;
		
		}

if (bal.length == 0)
		{
		
		alert("Please, enter your balance");
		a = false;
		return false;
		
		}           

alert("Thank you, ");
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
$bal = $_POST['bal'];
$userid = $_POST['userid'];
mysql_query("UPDATE userinfo ".
       "SET balance = $bal ".
       "WHERE userid = $userid");
echo "balance updated";
}
mysql_close($con);
?>
	