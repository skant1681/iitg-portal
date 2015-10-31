<?php
$con=mysql_connect("localhost","root","");
mysql_select_db('placement_portal');

$add=$_REQUEST['x'];
$add = explode(',', $add);
$sql="SELECT roll_num FROM  stud_basic_info WHERE std_username='$add[1]'";

$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$roll=$row['roll_num'];


	$sql="SELECT company_id FROM std_applied WHERE roll_num=$roll and company_id='$add[0]'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	//return $row;

$All = 0;
for($i=0;$row[$i];$i++){
	$All = $All.",".$row[$i];
} 
print_r($All);

//echo 'hii';
?>