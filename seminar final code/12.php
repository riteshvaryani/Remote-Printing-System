<html>
<head>
<link rel="stylesheet" type="text/css" href="upload.css" />
</head>
<body>
<form action="index.html">
<img id="lo" src="logo.png"/>
<input type="submit" name="logout" value="Logout" id="btn3"/>
</form>
<br><br><br>


<?php
$con = mysql_connect("db4free.net:3306","riteshvaryani","chelseafc100");
session_start() ;	
	
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("printinginfo", $con);
$var1 = mysql_real_escape_string($_GET['username']);
$result = mysql_query("select userid from userinfo where username = '$var1'");


while($row = mysql_fetch_array($result))
  {
     $userid = $row['userid'];
  }
$result1 = mysql_query("select balance from userinfo where userid = '$userid'");

while($row = mysql_fetch_array($result1))
  {
     $balance = $row['balance'];
  }
$result = mysql_query("SELECT * FROM fileinfo where userid = (select userid from userinfo where username = '$var1') ");
echo "<div id='wel'>Welcome," . $var1 . "</div>";
echo "<div id='bal'>Balance:Rs." . $balance . "</div><br/><br>";




echo "<form action='del.php' method='post'>";
echo "<center><table border='1' cellpadding='3' cellspacing='5'>
<tr id='row1'>
<th>Sr.no</th>
<th>File name</th>
<th>File type</th>
<th>File size(KB)</th>
<th>Uploaded on</th>
<th>Delete</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
$i=$row['id'];
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['filename'] . "</td>";
  echo "<td>" . $row['filetype'] . "</td>";
  echo "<td>" . $row['filesize'] . "</td>";
  echo "<td>" . $row['uploaded_on'] . "</td>";
  echo "<td><a name = a".$row['id'] ." href='del.php?var=$i&amp;var2=$var1'><img src='cross.jpg' width='30' height='30'></a></td>";
  echo "</tr>";
  }
echo "</table></center></form>";
?>
<br><br>
<div id = 'div1'>
<form method='POST' enctype='multipart/form-data' action='upload1.php?var=<?=$userid?>&amp;var2=<?=$var1?>'>
<input type='file' name='file' id='button1'/>
<input type='submit' name='submit' value='Upload Now' id ='button2'/>
</form>
</div>
<center><p><b>NOTE:<br>
*You will be charged 1Re. per page for the printouts.<br>
*If your balance is insufficient please recharge your account from college office.<br>
*You are allowed to upload maximum 10 files at a time.<br>
*The file type must be .doc,.docx,.txt,.jpg,.pdf.No other file type will be accepted.<br>
*The file size should not exceed 1MB.</b></p></center>
</body>
</html>
<?php
// close connection
mysql_close();
?>							