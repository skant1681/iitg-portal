<?php
$con=mysql_connect("localhost","root","");
mysql_select_db('placement_portal');

$add=$_REQUEST['x'];
$add = explode(',', $add);


	

	echo $sql="SELECT roll_num FROM std_applied WHERE roll_num='$add[0]' and company_id='$add[1]' and placed='1'";
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