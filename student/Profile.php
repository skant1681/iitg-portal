<?php
  session_start();
  if(!isset($_SESSION['ID']) ) {
		header("location: ../index.php");
		exit();
}

?>
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
<!--
.style1 {
	color: #000066;
	font-weight: bold;
}
-->
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
                <h2><span><a href="#">Welcome <?php echo $_SESSION['Name'];?></a></span></h2>
               
<?php
$ID=$_SESSION['ID'];
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("placement_portal", $con);
// Specify the query to execute
$sql = "select * from stud_info where roll_num='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$row = mysql_fetch_array($result)
?>
                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo $row['first_name'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Roll Number:</strong></td>
                    <td><?php echo $row['roll_num'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Course:</strong></td>
                    <td><?php echo $row['std_course'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Branch:</strong></td>
                    <td><?php echo $row['std_branch'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Year:</strong></td>
                    <td><?php echo $row['std_year'];?></td>
                  </tr>
                  <tr>
				  
				  
				  
<?php
 $sql = "select * from students_phone where roll_num ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 

?>

<?php //$phone=$row['phone'];?>

                  <tr>
                    <td><strong>Phone:</strong></td>
                    <td>
					<?php
					while($row = mysql_fetch_array($result))
					{	
						echo"<p>";
						$phone=$row['std_phone'];
						echo $phone;
						echo "</p>";
					}
					?>
					</td>
                  </tr>
				  
				  
<?php
 $sql = "select * from student_emails where roll_num ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 

?>

<?php //$phone=$row['phone'];?>

                  <tr>
                    <td><strong>Email:</strong></td>
                    <td>
					<?php
					while($row = mysql_fetch_array($result))
					{	
						echo"<p>";
						$email=$row['std_email'];
						echo $email;
						echo "</p>";
					}
					?>
					</td>
                  </tr>
				  
				  
<?php $sql = "select * from stud_info where roll_num='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$row = mysql_fetch_array($result) ?>
				  
                    <td><strong>User Name:</strong></td>
                    <td><?php echo $row['std_username'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Resume 1:</strong></td>
                    <td><a href="../upload/<?php echo $row['resume_1'];?>" target="_blank"><strong>View</strong></a> &nbsp;&nbsp;<?php echo $row['resume_1'];?></td> 
					
                  </tr>
				   <tr>
                    <td><strong>Resume 2:</strong></td>
                    <td><a href="../upload/<?php echo $row['resume_2'];?>" target="_blank"><strong>View</strong></a>&nbsp;&nbsp;<?php echo $row['resume_2'];?></td> 
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				   <tr>
                    <td>&nbsp;</td>
                    <td><a href="sEditProfile.php">Edit Profile</a></td>
                  </tr>
                </table>
              <p>&nbsp;</p>

                <p class="btn-more box noprint">&nbsp;</p>
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
