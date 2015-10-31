<?php
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$UserName=$_POST['txtUser'];
$Password=$_POST['txtPass'];
$UserType=$_POST['cmbUser'];

if($UserType=="Company")
{
$con = mysql_connect("localhost","root");
mysql_select_db("placement_portal", $con);
 $sql = "select * from company_info where company_id='".$UserName."' and c_password='".$Password."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['ID']=$row['company_id'];
$_SESSION['Name']=$row['company_name'];
header("location:company/index.php");
} 
mysql_close($con);
}

else
{
$con = mysql_connect("localhost","root");
mysql_select_db("placement_portal", $con);
$sql = "select * from stud_info where std_username='".$UserName."' and std_password='".$Password."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
$_SESSION['ID']=$row['roll_num'];
$_SESSION['Name']=$row['std_username'];
header("location:student/index.php");
} 
mysql_close($con);
}
ob_flush();
?>

</body>
</html>
