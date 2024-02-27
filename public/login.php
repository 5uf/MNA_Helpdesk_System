<?php
include "dbconn.php";  // Using database connection file here
date_default_timezone_set("Asia/Kuala_Lumpur");
$sql="SELECT * FROM staff";
$result = mysql_query($dbconn,$sql);

if(isset($_POST['submit'])){
       
   
      header('location: /menu');

   } 
else {
      header('location: /fail');
   }
?>