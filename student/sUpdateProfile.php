<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training & Placement Cell - IIT Guwahati</title>
</head>

<body>
<?php
$ID=$_SESSION['ID'];
$txtPhone = $_POST['txtPhone'];
$txtEmail=$_POST['txtEmail'];
$txtCPI = $_POST['txtCPI'];
$txtResume1=$_POST['txtFile'];
$txtResume2=$_POST['txtFile2'];
$txtPassword=$_POST['txtPassword'];
// Establish Connection with MYSQL
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("placement_portal", $con);
// Specify the query to Update Record


$path1 = $_FILES["txtFile"]["name"];
	
move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../upload/"  .$_FILES["txtFile"]["name"]);
$path2 = $_FILES["txtFile2"]["name"];
move_uploaded_file($_FILES["txtFile2"]["tmp_name"],"../upload/"  .$_FILES["txtFile2"]["name"]);

if($path1==NULL && $path2==NULL){
$sql = "Update std_registered  set CPI='".$txtCPI."' where roll_num='".$ID."'";
}
elseif($path2==NULL){
$sql = "Update std_registered  set CPI='".$txtCPI."',resume_1='".$path1."' where roll_num='".$ID."'";
}
elseif($path1==NULL){
$sql = "Update std_registered  set CPI='".$txtCPI."',resume_2='".$path2."' where roll_num='".$ID."'";
}

else{
$sql = "Update std_registered  set CPI='".$txtCPI."',resume_1='".$path1."',resume_2='".$path2."' where roll_num='".$ID."'";
}
//$sql = "Update std_registered  set CPI='".$txtCPI."',resume_1='".$path1."',resume_2='".$path2."' where roll_num='".$ID."'";
// Execute query
mysql_query($sql,$con);



$sql = "Update students_phone  set std_phone='".$txtPhone."'where roll_num='".$ID."'";
// Execute query
mysql_query($sql,$con);



$sql = "Update student_emails  set std_email='".$txtEmail."'where roll_num='".$ID."'";
// Execute query
mysql_query($sql,$con);



$sql = "Update student_login  set std_password='".$txtPassword."'where roll_num='".$ID."'";
// Execute query
mysql_query($sql,$con);
// Close The Connection
mysql_close($con);



echo '<script type="text/javascript">alert("Profile Updated Succesfully");window.location=\'Profile.php\';</script>';
?>
</body>
</html>
