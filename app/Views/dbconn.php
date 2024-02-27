<?php
/* php & mysql db connection file */
$user = "root"; //mysql username
$pass = ""; //mysql password
$host = "localhost"; //server name or ip address
$db = "helpdesk"; //your db name
//$dbconn = mysql_connect($host, $user, $pass);
$dbconn = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
/*else
	echo 'ok';*/
setlocale(LC_TIME,'ms_MY');
?>