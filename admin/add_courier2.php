<?php 
session_start();
error_reporting(0);
include('dbconnection.php');
require_once('library.php');
$rand = get_rand_id(8);
if (strlen($_SESSION['cuid']==0)) {
header('location:login.php');
} else{

//echo $rand;
$userid=$_SESSION['cuid'];
$query=mysqli_query($con,"select * from tbl_courier_officers where cuid='$userid'");
$result=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<head>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	$("input").change(function(){
		var total=1;
		$("input[name=Qnty]").each(function(){
			total = total * parseInt($(this).val());
		})
		$("input[name=Totalfreight]").val(total);
	});
});
</script>

<style>
#hidden{}
</style>
<script type="text/javascript">
	function showHide(){
		var selectoption = document.getElementById("Shiptype");
		var hiddeninputs = document.getElementById("hidden");
		
		if(selectoption.value=="Money"){
			hiddeninputs.style.display="none";
		}else{
			hiddeninputs.style.display="block";
		}
	}
</script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
<body>
<td rowspan="2" bgcolor="#FFFFFF">
<img src="\courrier\img\marsamaroc.png" width="150" height="100"/>
</td>
<style>


h1 {
	color:#6D6E75;
}

</style>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="courier_list.php">
                        Liste des courriers
                    </a>
                </li>
                
                <li>
                    <a href="add_courier.php">Ajouter les courriers reçus</a>
                </li>
		<li>
                    <a href="add_courier2.php">Ajouter les courriers envoyés</a>
                </li>
                
                <li>
                    <a href="search.php">Chercher un courrier</a>
                </li>
		<li>
                    <a href="Liste.php">Liste des coordonnées</a>
                </li>
                <li>
                    <a href="delivered.php">Liste des courriers livrés</a>
                </li>
                <li>
                    <a href="datewise.php">Liste des courriers reçus</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1 align="center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Ajouter les courriers envoyés</h1>
                <p></p>
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Menu</a>
				<a href="#" class="btn btn-info" style="margin-left:10px;">Ajouter un courrier</a>
            </div>
<script type="text/javascript">
// <!-- <![CDATA[

// Project: Dynamic Date Selector (DtTvB) - 2006-03-16
// Script featured on JavaScript Kit- http://www.javascriptkit.com
// Code begin...
// Set the initial date.
var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();

// Get Element By Id
function ds_getel(id) {
	return document.getElementById(id);
}

// Get the left and the top of the element.
function ds_getleft(el) {
	var tmp = el.offsetLeft;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetLeft;
		el = el.offsetParent;
	}
	return tmp;
}
function ds_gettop(el) {
	var tmp = el.offsetTop;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetTop;
		el = el.offsetParent;
	}
	return tmp;
}

// Output Element
var ds_oe = ds_getel('ds_calclass');
// Container
var ds_ce = ds_getel('ds_conclass');

// Output Buffering
var ds_ob = ''; 
function ds_ob_clean() {
	ds_ob = '';
}
function ds_ob_flush() {
	ds_oe.innerHTML = ds_ob;
	ds_ob_clean();
}
function ds_echo(t) {
	ds_ob += t;
}

var ds_element; // Text Element...

var ds_monthnames = [
'January', 'February', 'March', 'April', 'May', 'June',
'July', 'August', 'September', 'October', 'November', 'December'
]; // You can translate it for your language.

var ds_daynames = [
'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
]; // You can translate it for your language.

// Calendar template
function ds_template_main_above(t) {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
	     + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Close]</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>'
		 + '</tr>'
	     + '<tr>'
		 + '<td colspan="7" class="ds_head">' + t + '</td>'
		 + '</tr>'
		 + '<tr>';
}

function ds_template_day_row(t) {
	return '<td class="ds_subhead">' + t + '</td>';
	// Define width in CSS, XHTML 1.0 Strict doesn't have width property for it.
}

function ds_template_new_week() {
	return '</tr><tr>';
}

function ds_template_blank_cell(colspan) {
	return '<td colspan="' + colspan + '"></td>'
}

function ds_template_day(d, m, y) {
	return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
	// Define width the day row.
}

function ds_template_main_below() {
	return '</tr>'
	     + '</table>';
}

// This one draws calendar...
function ds_draw_calendar(m, y) {
	// First clean the output buffer.
	ds_ob_clean();
	// Here we go, do the header
	ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
	for (i = 0; i < 7; i ++) {
		ds_echo (ds_template_day_row(ds_daynames[i]));
	}
	// Make a date object.
	var ds_dc_date = new Date();
	ds_dc_date.setMonth(m - 1);
	ds_dc_date.setFullYear(y);
	ds_dc_date.setDate(1);
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
		days = 31;
	} else if (m == 4 || m == 6 || m == 9 || m == 11) {
		days = 30;
	} else {
		days = (y % 4 == 0) ? 29 : 28;
	}
	var first_day = ds_dc_date.getDay();
	var first_loop = 1;
	// Start the first week
	ds_echo (ds_template_new_week());
	// If sunday is not the first day of the month, make a blank cell...
	if (first_day != 0) {
		ds_echo (ds_template_blank_cell(first_day));
	}
	var j = first_day;
	for (i = 0; i < days; i ++) {
		// Today is sunday, make a new week.
		// If this sunday is the first day of the month,
		// we've made a new row for you already.
		if (j == 0 && !first_loop) {
			// New week!!
			ds_echo (ds_template_new_week());
		}
		// Make a row of that day!
		ds_echo (ds_template_day(i + 1, m, y));
		// This is not first loop anymore...
		first_loop = 0;
		// What is the next day?
		j ++;
		j %= 7;

	}
	// Do the footer
	ds_echo (ds_template_main_below());
	// And let's display..
	ds_ob_flush();
	// Scroll it into view.
	ds_ce.scrollIntoView();
}

// A function to show the calendar.
// When user click on the date, it will set the content of t.
function ds_sh(t) {
	// Set the element to set...
	ds_element = t;
	// Make a new date, and set the current month and year.
	var ds_sh_date = new Date();
	ds_c_month = ds_sh_date.getMonth() + 1;
	ds_c_year = ds_sh_date.getFullYear();
	// Draw the calendar
	ds_draw_calendar(ds_c_month, ds_c_year);
	// To change the position properly, we must show it first.
	ds_ce.style.display = '';
	// Move the calendar container!
	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	// Scroll it into view.
	ds_ce.scrollIntoView();
}

// Hide the calendar.
function ds_hi() {
	ds_ce.style.display = 'none';
}

// Moves to the next month...
function ds_nm() {
	// Increase the current month.
	ds_c_month ++;
	// We have passed December, let's go to the next year.
	// Increase the current year, and set the current month to January.
	if (ds_c_month > 12) {
		ds_c_month = 1; 
		ds_c_year++;
	}
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the previous month...
function ds_pm() {
	ds_c_month = ds_c_month - 1; // Can't use dash-dash here, it will make the page invalid.
	// We have passed January, let's go back to the previous year.
	// Decrease the current year, and set the current month to December.
	if (ds_c_month < 1) {
		ds_c_month = 12; 
		ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
	}
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the next year...
function ds_ny() {
	// Increase the current year.
	ds_c_year++;
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Moves to the previous year...
function ds_py() {
	// Decrease the current year.
	ds_c_year = ds_c_year - 1; // Can't use dash-dash here, it will make the page invalid.
	// Redraw the calendar.
	ds_draw_calendar(ds_c_month, ds_c_year);
}

// Format the date to output.
function ds_format_date(d, m, y) {
	// 2 digits month.
	m2 = '00' + m;
	m2 = m2.substr(m2.length - 2);
	// 2 digits day.
	d2 = '00' + d;
	d2 = d2.substr(d2.length - 2);
	// YYYY-MM-DD
	return d2 + '/' + m2 + '/'+ y;
}

// When the user clicks the day.
function ds_onclick(d, m, y) {
	// Hide the calendar.
	ds_hi();
	// Set the value of it, if we can.
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_format_date(d, m, y);
	// Maybe we want to set the HTML in it.
	} else if (typeof(ds_element.innerHTML) != 'undefined') {
		ds_element.innerHTML = ds_format_date(d, m, y);
	// I don't know how should we display it, just alert it to user.
	} else {
		alert (ds_format_date(d, m, y));
	}
}

function getSelected(opt)
 {
 
 	var opt=document.frmExport.opt;
            for (var intLoop = 0; intLoop < opt.length; intLoop++)
			 {
			  if (!(opt.options[intLoop].selected))
			   {
			   		alert("Select any one field!");
					return false;
               }
		    }
			return true;           
  }

// And here is the end.

// ]]> -->
</script>			
			<div class="col-md-9" >
					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
						<h3 class="panel-title">Informations sur l'expéditeur</h3>
					  </div>

					  <div class="panel-body">
					  	<form action="senddata2.php" method="post" name="frmShipment"  align="Left"> 
							<div class="form-group">
								<input name="cuid" type="hidden" class="form-control" id="inputPage" value="<?php echo $userid;?>" readonly="true">
							</div>

							<div class="form-group">
							  <label>Nom :</label>
								<select name="Receivername" id="category" class="form-control"> 
								<option value="BO">BO</option>
								<option value="Sec. Dir">Sec.Dir</option>
								</select>
							</div>
							
						
							<div class="form-group">
							  <label>Outil :</label>
								<select name="Outil" id="category" class="form-control"> 
								<option value="Mail">Mail</option>
								<option value="Fax">Fax</option>
								<option value="Original">Original</option>
								</select>
							</div>

							
							 <div class="panel-heading main-color-bg">
								<h3 class="panel-title">Informations sur le récepteur</h3>
							 </div>
							<div class="form-group">
							  <label>Nom :</label>
								<input name="Shippername" type="text" class="form-control" id="inputPage" placeholder="Entrer le nom de l'expéditeur" required>
							</div>
							<div class="form-group">
							  <label>Téléphone :</label>
								<input name="Shipperphone" type="text" class="form-control" id="inputPage" placeholder="Entrer le tél de l'expéditeur" required maxlength="13">
							</div>
							<div class="form-group">
							  <label>L'adresse :</label>
								<input name="Shipperaddress" type="text" class="form-control" id="inputPage" placeholder="Entrer l'adresse de l'expéditeur" required>
							</div>
							<div class="form-group">
							  <label>Email :</label>
								<input name="email" type="text" class="form-control" id="inputPage" placeholder="Entrer l'email de l'expéditeur" required>
							</div>
							<div class="form-group">
							  <label>Fax :</label>
								<input name="Fax" type="text" class="form-control" id="inputPage" placeholder="Entrer le Fax de l'expéditeur" required>
							</div>							


  
							
							
							
							
							
							 <div class="panel-heading main-color-bg">
								<h3 class="panel-title">Informations d'expédition</h3>
							 </div>
					  

							<div class="form-group">
							  <label>Objet :</label>
								<input name="objet" type="text" class="form-control" id="objet" placeholder="Entrer l'objet du courriers" required>
							</div>


							<div class="form-group">
							  <label>Entité :</label>
								<select name="Entité" id="category" class="form-control"> 
								<option value="Technique">D. Technique</option>
								<option value="Arrivé">D. Exploitation</option>
								<option value="Maritime">D. opéretions maritimes</option>
								<option value="Juridique">S. Juridique</option>
								<option value="SQHSSE">SQHSSE</option>
								<option value="DRH">DRH</option>
								<option value="DC">DC</option>
								<option value="DSI">DSI</option>
								<option value="SCG">SCG</option>
								<option value="SAA">SAA</option>
								<option value="DFC">DFC</option>
								<option value="DEP">DEP</option>
								</select>
							</div>
							<div class="form-group">
							  <label>Date :</label>
								<input name="Packupdate" type="date" id="Packupdate" class="form-control" style="cursor: text;" onClick="ds_sh(this);" maxlength="15"  placeholder="Enter Pick Date" required><span class="REDLink"></span> 
							</div>
							
							<div class="form-group">
							  <label>Instructions directeur :</label>
								<textarea name="instructions" class="form-control" id="inputPage" placeholder="......"></textarea>
								<input class="form-control" type="hidden" name="msg" value="Courier yanyu ubu iroherejwe kuri">
							</div>
							  
							<div class="form-group">
							  <label>Commentaire :</label>
								<textarea name="Comments" class="form-control" id="inputPage" placeholder="Ajouter un commentaire"></textarea>
								<input class="form-control" type="hidden" name="msg" value="Courier yanyu ubu iroherejwe kuri">
							</div>
							<input type="submit" class="btn btn-default" value="Soumettre" name="send">
						</form>
						</div>
					</div>
					
					</div>
				</div><!--End of col-md-3-->


        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
<?php }?>