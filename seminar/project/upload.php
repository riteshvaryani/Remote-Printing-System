<html>
<?php
#$ti= ($_FILES['myfile']['name']);
#$title = $ti;
 $fileName = $_FILES['fileToUpload']['name'];
    $tmpName  = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileType = $_FILES['fileToUpload']['type'];
	$file_info = pathinfo($_FILES['fileToUpload']['name']);
	$fileext = $file_info['extension'];
	$fp = fopen($tmpName, 'r');

	$content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
	#$content=dechex ($content );
	#echo $content;
	#echo $content;
	#echo $content;
	#$content = $curr_file['File_Content'];
	$abc="aaa";
	#echo "aaaaa";
#echo $title;
$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

/*if (mysql_query("CREATE DATABASE student",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
  */
mysql_select_db("studentdb", $con);

$sql = "INSERT INTO fileinfo (title,filename,filetype,filesize,filecontent,fileextension)
VALUES ('$abc','$fileName','$fileType','$fileSize','$content','$fileext')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
#echo ($_FILES['myfile']['tmp_name']);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "C:/xampp/apache/files/" . $_FILES["fileToUpload"]["name"]);
 
 mysql_close($con);
 ?>
</html>