<?php
$con=mysql_connect("localhost","root","");
mysql_select_db('placement_portal');

$add=$_REQUEST['x'];
$add = explode(',', $add);
//echo  $add[0];
echo $add[0];
echo $add[1];


echo $sql="update  std_applied set placed='1' WHERE roll_num='$add[0]' and company_id='$add[1]'";

mysql_query($sql); 

?>