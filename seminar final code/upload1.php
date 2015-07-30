<html>
<script>
function myFunction()
{
alert("record added.");
}
</script>
<body>
<?php
session_start();
 $fileName = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size']/1024;
    $fileType = $_FILES['file']['type'];
	$file_info = pathinfo($_FILES['file']['name']);
	$fileext = $file_info['extension'];
	$fp = fopen($tmpName, 'r');

	$content = fread($fp, filesize($tmpName));
    $content = addslashes($content);

$con = mysql_connect("db4free.net:3306","riteshvaryani","chelseafc100");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("printinginfo", $con);
$safeExtensions = array(
  'html',
  'htm',
  'gif',
  'jpg',
  'jpeg',
  'png',
  'txt',
'docx',
'doc'
);

$id1 = $_GET['var'];
$id = mysql_real_escape_string($id1);
$dee = 0;
$count = 0;
$result = mysql_query("SELECT count(*) AS nooffiles FROM fileinfo WHERE userid = '$id'");
while($row = mysql_fetch_array($result))
  {
    $count = $row['nooffiles'];
 }
 if($count > 9)
    {
       echo "Maximum 10 files can be uploaded.Please delete some files to upload new files.";
       $dee = 1;
    }
$name = mysql_real_escape_string($_GET['var2']);
if ($_FILES["file"]["error"] > 0)
   {
   echo "Apologies, an error has occurred.";
   echo "Error Code: " . $_FILES["fileToUpload"]["error"];
   $dee = 1;
   }
if (!in_array($fileext, $safeExtensions)) 
{
  die("File extension not approved");
  $dee = 1;
}
if($fileSize>1024) {
  die("File size exceeds limit.");
  $dee = 1;
}

if($dee === 0)
{
$sql = "INSERT INTO fileinfo (filename,filetype,filesize,filecontent,fileextension,uploaded_on,userid)
VALUES ('$fileName','$fileType','$fileSize','$content','$fileext',CURDATE(),'$id')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  } 
 header("Location: http://www.riteshvaryani.uphero.com/12.php?username=$name"); 
}
mysql_close($con);


?>
</body>
</html>							