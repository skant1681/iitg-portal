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
<SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
<SCRIPT language="JavaScript1.2">
var arrFormValidation=
             [
			 		[//Name
						  ["minlen=1",
		"Please Enter Name "
						  ] 
					
                     ],
                   [//Address
						   ["minlen=1",
		"Please Enter Address "
						  ] 
						  
                   ],
                   [//Country
						 
						 
					  
						  				
                   ],
				   [//State
						  
						  
                   ],
				   [//City
						  
						  
                   ],
				   [//Mobile
						  
						  ["num",
		"Please Enter valid Mobile "
						  ],
						  ["minlen=10",
		"Please Enter valid Mobile "
						  ]
						 
						 
						  
                   ],
				   [//Email
						   ["minlen=1",
		"Please Enter Email "
						  ], 
						  ["email",
		"Please Enter valid email "
						  ]
						  
                   ],
				   [//ID
						  
						  
                   ],
				   [//TDType
						  
						  ["minlen=1",
		"Please Select File "
						  ]
						  
                   ],
				   [//UserName
						  
					 ["minlen=1",
		"Please Enter UserName "
						  ]	
                   ],
				   [//Password
						  
						 ["minlen=1",
		"Please Enter Password "
						  ] 
						  
                   ],
				   [//Confirm
						  
						   ["minlen=1",
		"Please Enter Confirm Password "
						  ]
						  
                   ]
            ];
</SCRIPT>
<!-- Main -->
<div id="main" class="box">
<?php 
include "Header.php"
?>
<?php 
include "menu.php"
?>   

    <div id="page" class="box">
    <div id="page-in" class="box">

        <div id="strip" class="box noprint">


            <hr class="noscreen" />


            <p id="breadcrumbs">&nbsp;</p>
          <hr class="noscreen" />
            
        </div>

        
        <div id="content">

            <hr class="noscreen" />

            <hr class="noscreen" />
            
            <hr class="noscreen" />

            <div class="article">
                <h2><span><a href="#">List of Registered Students</a></span></h2>
               

                <p>
                <table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
<tr>
<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Roll Num</strong></div></th>
<th height="32" width="33%" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Registered Students </strong></div></th>
<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>User Name</strong></div></th>
</tr>
<?php

$con = mysql_connect("localhost","root");
mysql_select_db("placement_portal", $con);

$sql = "select * from stud_basic_info ;";
$result = mysql_query($sql,$con); 
while($row = mysql_fetch_array($result))
{
$fName=$row['first_name'];
$lName=$row['last_name'];
$roll=$row['roll_num'];
$user=$row['std_username'];

?>
<tr>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $roll;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $fName."&nbsp;".$lName;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $user;?></strong></div></td>
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
                </p>

                <div align="center"><a href="stud_reg_form.php"><strong>Register Here</strong></a></div>
                <p class="btn-more box noprint">&nbsp;</p>
          </div> 

            <hr class="noscreen" />
            
        </div> 

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
