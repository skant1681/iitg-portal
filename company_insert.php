
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$CompanyID=$_POST['txtName'];
	$CompanyName=$_POST['txtPerson'];
	$JobProfile=$_POST['txtPerson'];
	$Password=$_POST['txtPassword'];
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("placement_portal", $con);
	// Specify the query to Insert Record
	$sql = "insert into companies(company_id,company_name,job_profile,c_password,c_email) values('".$CompanyID."','".$CompanyName."','".$JobProfile."','".$Password."','".$Email."')";
	$sql2 = "insert into c_phone(company_id,phone) values('".$CompanyID."','".$Mobile."')";
	// execute query
	mysql_query ($sql,$con);
	mysql_query ($sql2,$con);
	// Close The Connection
	mysql_close ($con);
	
	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';

?>
</body>
</html>
