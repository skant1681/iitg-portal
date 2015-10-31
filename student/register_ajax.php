<?php
$con=mysql_connect("localhost","root","");
mysql_select_db('placement_portal');

$add=$_REQUEST['x'];
$add = explode(',', $add);
//echo  $add[0];
$sql="SELECT roll_num FROM  stud_basic_info WHERE std_username='$add[1]'";

$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$roll=$row['roll_num'];





 echo $sql="insert into std_applied (roll_num,company_id) values('$roll','$add[0]')  " ;
mysql_query($sql); 

?>