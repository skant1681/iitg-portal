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
$sql = "select * from std_applied where company_id ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
?>
<h4><span>Students Who Applied</span></h4>
                <table width="100%" border="1" cellspacing="2" cellpadding="1">

                    
					<?php
					while($row = mysql_fetch_array($result))
					{	
						echo"<tr>";
						echo "<td>";
						 $rollnum=$row['roll_num'];
							$user=$ID;
							echo "<a href='View_stud_info.php?id=$rollnum' > $rollnum</a>";
							echo"<td ><input type=\"checkbox\" name=$rollnum value=$user id=$rollnum class='check'></td>";echo "</tr>";
						//echo $rollnum;
						echo"</td>";
						echo "</tr>";
					}
					?>
					
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
	
		var r=confirm("do you want to select this student?");
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
	   //alert(temp);
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


