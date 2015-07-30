<?php
$con = mysql_connect("db4free.net:3306","riteshvaryani","chelseafc100");		
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$i=$_GET["var"];
echo $i;
$username=$_GET["var2"];
mysql_select_db("printinginfo", $con);
$var1 = mysql_real_escape_string($_GET['username']);
$result = mysql_query("delete from fileinfo where id = '$i'");

// close connection
mysql_close();
header("Location: http://www.riteshvaryani.uphero.com/12.php?username=$username");
/*$deepika = array($_POST['']);
if(empty($plz)) 
  {
    echo("You didn't select any file.");
  } 
  else
  {
    $N = count($plz);
    for($i=0; $i < $N; $i++)
    {
      echo($plz[$i] . " ");
    }
  }
*/
?>
																									