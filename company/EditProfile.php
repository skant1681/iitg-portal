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
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
$sql = "select * from company_info where company_id ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$row = mysql_fetch_array($result)
?>
<form method="post" action="UpdateProfile.php">
                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                  
                                 <tr>
                    <td><strong>Company ID:</strong></td>
                    <td><span id="sprytextfield1">
                      <label>
                      <input name="txtId" type="text" id="txtId" value="<?php echo $row['company_id'];?>" />
                      </label>
                  </tr>
                    <td><strong>Email:</strong></td>
                    <td><span id="sprytextfield5">
                      <label>
                      <input name="txtEmail" type="text" id="txtEmail" value="<?php echo $row['c_email'];?>" />
                      </label>
                  </tr>
                  <tr>
				  
	
	<?php
 $sql = "select * from c_phone where company_id ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 

?>

                  <tr>
                    <td><strong>Phone:</strong></td>
					<td>
					<?php
					
					while($row = mysql_fetch_array($result))
					{?>	

                    
                     
                      <input name="txtMobile" type="text" id="txtMobile" value="<?php echo $row['phone'];?>" />
                   
                  
					<?php
					}
					?>
					</td>

                  </tr>
	
	
<?php $sql = "select * from company_info where company_id ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$row = mysql_fetch_array($result)
?>

                  <tr>
                    <td><strong>Profile:</strong></td>
                    <td><span id="sprytextfield7">
                      <label>
                      <input name="txtArea" type="text" id="txtArea" value="<?php echo $row['job_profile'];?>" />
                      </label>
                  </tr>
                 
                    <td><strong>Password:</strong></td>
                    <td><span id="sprytextfield9">
                      <label>
                      <input name="txtPassword" type="password" id="txtPassword" value="<?php echo $row['c_password'];?>" />
                      </label>
                  </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="button" id="button" value="Submit" />
                    </label></td>
                  </tr>
                </table>
</form>
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

<script type="text/javascript">
<!--

var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
//-->
</script>
</body>
</html>
