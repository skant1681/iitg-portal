<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training & Placement Cell - IIT Guwahati</title>
</head>

<body>
<?php
$txtId = $_POST['txtId'];
$txtEmail=$_POST['txtEmail'];
$txtMobile = $_POST['txtMobile'];
$txtArea=$_POST['txtArea'];
$txtPassword=$_POST['txtPassword'];
// Establish Connection with MYSQL
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("placement_portal", $con);
// Specify the query to Update Record
$sql = "Update companies  set c_email='".$txtEmail."',job_profile='".$txtArea."',c_password='".$txtPassword."' where company_id='".$txtId."'";
// Execute query
mysql_query($sql,$con);
// Close The Connection
mysql_close($con);
echo '<script type="text/javascript">alert("Profile Updated Succesfully");window.location=\'Profile.php\';</script>';
?>
</body>
</html>
