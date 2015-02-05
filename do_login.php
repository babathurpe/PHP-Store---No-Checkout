<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("phillipsstore");
$sql = mysql_query("select * from admin where username='$_POST[username]' and password='$_POST[password]' ");
$numrow = mysql_num_rows($sql);

if($numrow > 0)
{
	while($row = mysql_fetch_assoc($sql))
	{
	setcookie("auth","yes",time() + 3600);
	setcookie("id",$row['id']);
	setcookie("username",$row['username']);
	
	//go to adminhome page if username and password is correct
	header("Location: adminhome.php");
	}
}
else
{
	header("Location: admin.php");
	
}
?>
</body>
</html>