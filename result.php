<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    <meta name="author" content="All: ... [Nazev webu - www.url.cz]; e-mail: info@url.cz" />
    <meta name="copyright" content="Design/Code: Vit Dlouhy [Nuvio - www.nuvio.cz]; e-mail: vit.dlouhy@nuvio.cz" />
    
    <title>Training & Placement Cell - IIT Guwahati</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    
    <link rel="index" href="./" title="Home" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css" />
    <link rel="stylesheet" media="aural" type="text/css" href="./css/aural.css" />
    <style type="text/css">

    </style>
</head>

<body id="www-url-cz">
<!-- Main -->
<div id="main" class="box">
<?php 
include "Header.php"
?>
<?php 
include "menu.php"
?>   
<!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

        <div id="strip" class="box noprint">

            <!-- RSS feeds -->
            <hr class="noscreen" />

            <!-- Breadcrumbs -->
            <p id="breadcrumbs">&nbsp;</p>
          <hr class="noscreen" />
            
        </div> <!-- /strip -->

        <!-- Content -->
        <div id="content">

           
            <!-- /article -->

            <hr class="noscreen" />

           
            <!-- /article -->

            <hr class="noscreen" />
            
            <!-- Article -->
           
            <!-- /article -->

            <hr class="noscreen" />

            <!-- Article -->
            <div class="article">
                <h2><span><a href="#">List Of Companies</a></span></h2>
               

                <p>
                
              <table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
<tr>
<th  height="20" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Roll Number</strong></div></th>
<th  bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Student Name</strong></div></th>
<th  bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Company Name</strong></div></th>
<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Job Profile</strong></div></th>
<!--<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Email</strong></div></th> -->
</tr>
<?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("placement_portal", $con);
// Specify the query to execute
$sql = "select std_applied.roll_num, std_applied.company_id, std_applied.placed, companies.company_name,companies.job_profile, students.first_name, students.last_name from std_applied inner join  students on std_applied.roll_num=students.roll_num inner join companies on std_applied.company_id=companies.company_id where std_applied.placed=1;";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$rollnum=$row['roll_num'];
$Student_Name1=$row['first_name'];
$Student_Name2=$row['last_name'];
$company=$row['company_name'];
$profile=$row['job_profile'];


?>
<tr>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $rollnum;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Student_Name1."&nbsp;".$Student_Name2;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $company;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $profile;?></strong></div></td>

</tr>
<?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>

<?php
// Close the connection
mysql_close($con);
?>
</table>
  </td>
  </tr>
</table>

          </div> <!-- /article -->

            <hr class="noscreen" />
            
        </div> <!-- /content -->

<?php
include "right.php"
?>

    </div> <!-- /page-in -->
    </div> <!-- /page -->

 
<?php
include "footer.php"
?>
</div> <!-- /main -->

</body>
</html>
