
var count = 0;
function validateForm()
{
	$(".required").each(function(){
		if($(this).val()=="" && $(this).next().attr('id')!='emp' ){
			if($(this).next().attr('id')=='spe'||$(this).next().attr('id')=='email'){
				$(this).next().remove();
			}
			$(this).after("<label id=\"emp\" style=\"color:red;margin-right:2%;\" >* you can't left this empty.</label>");
				count++;
		}
		else if($(this).val()!=""){
			if($(this).next().prop('tagName')=="LABEL"){
				$(this).next().remove();
				count--;
			}
		}
	});
		if(count!=0){
			return false;
		}else{
			return true;
		}	
	
	return false;
}

function color_change(col){
$("#info_bar").css("background-color",col);
}

$(document).on('change',':text', function () {
if($(this).hasClass("special"))
{
  if(!$(this).hasClass("email")){
		if (this.value.match(/[^a-zA-Z0-9 ]/g )) {
			this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
			if($(this).next().prop('id')!='spe'){
				if($(this).next().attr('id')=='emp'){
					$(this).next().remove();
				}
			$(this).after("<label id=\"spe\" style=\"color:red;margin-right:2%;\">*Do not include Special Characters.</label>");
			}
		}
		else if(!this.value.match(/[^a-zA-Z0-9 ]/g ) && $(this).next().prop('id')=='spe'){
		$(this).next().remove();
		}
	}
	else{
		var x=this.value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		  {
			if($(this).next().prop('id')=='emp'||$(this).next().prop('id')=='email'){
				$(this).next().remove();
			}
			$(this).after("<label id=\"email\" style=\"color:red;margin-right:2%;\" >* Not a valid e-mail address.</label>");
			return false;
		  }
		//else if($(this).next().prop('id')=='emp'||$(this).next().prop('id')=='spe')
		  //$(this).next().remove();
	}
}	
});


function del(){
var r=confirm("Press ok to continue");
if(r==true){
	var delclient = new Array();
	 $(".check").each(function(){
			if($(this).is(':checked')){
			//alert($(this).parent().parent().parent().prop('id'));
			$(this).parent().parent().parent().remove();
			delclient.push($(this).parent().parent().parent().prop('id'));
			}
		});
		$.ajax({
			url:"deleteUser.php?x="+delclient,
			success:function(req){
			}
		});
	}
}

function delp(){
var r=confirm("Press ok to continue");
if(r==true){
	var delproject = new Array();
	 $(".check").each(function(){
			if($(this).is(':checked')){
			//alert($(this).parent().parent().parent().prop('id'));
			$(this).parent().parent().parent().remove();
			delproject.push($(this).parent().parent().parent().prop('id'));
			}
			//alert(delproject);
		});
		$.ajax({
			url:"deleteProject.php?x="+delproject,
			success:function(req){
					//alert(req);
			}
		});
	}
}
function delemp(){
var r=confirm("Press ok to continue");
if(r==true){
	var delempy = new Array();
	 $(".check").each(function(){
			if($(this).is(':checked')){
			//alert($(this).parent().parent().parent().prop('id'));
			$(this).parent().parent().parent().remove();
			delempy.push($(this).parent().parent().parent().prop('id'));
			}
			//alert(delempy);
		});
		$.ajax({
			url:"delete_employee.php?x="+delempy,
			success:function(req){
					//alert(req);
			}
		});
	}
}



$(function() {
	$( "#datepicker1" ).datepicker();
});
$(function() {
	$( "#datepicker2" ).datepicker();
});


/* $(".sdlc").click().function{
alert('dd');

} 
foreach(ListItem RadioButton in RadioButtons){
    RadioButton.Attributes.Add("onclick", "alert('hello');");
}
*/

/*
function edit(){
var r=confirm("Press ok to continue");
if(r==true){
	var edclient = new Array();
	 $(".check").each(function(){
			if($(this).is(':checked')){
			edclient.push($(this).parent().prop('id'));
			}
		});
		$.ajax({
			url:"editUser.php?x="+edclient,
			success:function(re){
				if(re){
					alert(re);
				};
			}
		});
	}	
}
*/




