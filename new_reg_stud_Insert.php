<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$UserName=$_POST['txtUserName'];
	$con = mysql_connect ("localhost","root");
	mysql_select_db("placement_portal", $con);
	$sql = "SELECT * from  student_login where std_username='$UserName'";
	$result = mysql_query($sql,$con);
	if (!$result) { 
		die(' User Name Not Found' . mysql_error());
	}
	if($row = mysql_fetch_array($result)){
		$RollNum=$row['roll_num'];
		$PassCheck=$row['std_password'];
	}
	else{
	echo '<script type="text/javascript">alert("User Name Not Found")';
	}
	mysql_close ($con);


	$Password=$_POST['txtPassword'];
	if($Password!=$PassCheck){
			die('user authentication failure' . mysql_error());
	}
	
	$Cpi=$_POST['intcpi'];
	
	$path1 = $_FILES["txtFile"]["name"];
	
	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"upload/"  .$_FILES["txtFile"]["name"]);
	$path2 = $_FILES["txtFile2"]["name"];
	move_uploaded_file($_FILES["txtFile2"]["tmp_name"],"upload/"  .$_FILES["txtFile2"]["name"]);
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("placement_portal", $con);
	// Specify the query to Insert Record
	$sql = "insert into  std_registered(roll_num,resume_1,resume_2,CPI) values('".$RollNum."','".$path1."','".$path2."','".$Cpi."')";
	// execute query
	mysql_query ($sql,$con);
	
	// Close The Connection
	mysql_close ($con);
	
	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';

?>
</body>
</html>
