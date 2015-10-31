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
<th height="32" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Company Name</strong></div></th>
<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Job Profile</strong></div></th>
<th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Registered</strong></div></th> 
</tr>
<?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("placement_portal", $con);
// Specify the query to execute
$sql = "select * from companies ;";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$CompanyName=$row['company_name'];
$job_profile=$row['job_profile'];
$company_id=$row['company_id'];
$user=$_SESSION['Name'];

?>
<tr>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CompanyName;?></strong></div></td>
<td class="style3"><div align="left" class="style9 style5"><strong><?php echo $job_profile;?></strong></div></td>
<?php
echo"<td ><input type=\"checkbox\" name=$company_id value=$user id=$company_id class='check'></td>";
echo "</tr>";

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
<script src="../js/jquery_1.9.1.js"></script> 
<script>
$('.check').on( "click", function() {
	if(!$(this).is(':checked')){
	
		/* var popupWindow=null;
		
		var w=screen.width/2-70;
		var h=screen.height/2-100;
		popupWindow = window.open('../project/CurrentWorking.php','name','width=100,height=80,left='+w+',top='+h+''); */
	
	var r=confirm("do you really wanna remove this ?");
		if(r==true){
		var remove = new Array();
		
		remove.push($(this).prop('id'));
		remove.push($(this).prop('value'));
		
		//alert(remove);
			$.ajax({
				url:"unregister_ajax.php?x="+remove,
				success:function(req){
					//alert(req);
				} 	
			});
		}else{
		
		$(this).prop('checked',true);
		}
	
	}
	else{
		var r=confirm("do you want to register for this company ?");
		if(r==true){
		var register = new Array();
		register.push($(this).prop('id'));
		//alert($(this).prop('id'));
		register.push($(this).prop('value'));
		
		//register.push($('input[name=client]:checked').prop('id'));
		$.ajax({
				url:"register_ajax.php?x="+register,
				success:function(req){
					//alert(req);
				} 	
		});
		}
		else{
		$(this).prop('checked',false);
		}
	}
	
	
});
</script>
<script>
$(document).ready(function(){
	$('input[type=checkbox]').each(function () {
	   var temp=new Array();
	   temp.push($(this).prop('id'));
	   temp.push($(this).prop('value'));
	   $.ajax({
			url:"show_detail.php?x="+temp,
			success:function(req){
				//alert(req);
				var idArr = req.split(",");
				//alert(idArr[1]);
				for(var i=1;idArr[i];i++){
				$('#'+idArr[i]).prop('checked', true);
				} 
			} 	
		});
	   
	});
});

/*
$( "input:radio" ).on( "click", function() {
$('.check').prop('checked', false);
	var Client_Id=$(this).attr('id');
	//alert(Client_Id);
	//$('.check').prop('checked', true);
	$.ajax({
		url:"showProj.php?x="+Client_Id,
		success:function(req){
			//alert(req);
			var idArr = req.split(",");
			//alert(idArr[1]);
			for(var i=1;idArr[i];i++){
			$('#'+idArr[i]).prop('checked', true);
			} 
		} 	
	});
});
*/






</script>


