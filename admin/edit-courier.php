<?php
session_start();
error_reporting(0);
include('dbconnection.php');
require_once('library.php');
if (strlen($_SESSION['cuid']==0)) {
header('location:login.php');
} else{
$cid=$_GET['cid'];

$userid=$_SESSION['cuid'];
$query=mysqli_query($con,"select * from tbl_courier where cid='$cid'");

							
							}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Admin</title>
<link href="css/mystyle.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
.style1 {color: #FF0000}
.style3 {font-family: verdana, tohama, arial}
</style>
</head>

<body>
<td rowspan="2" bgcolor="#FFFFFF">
<img src="\courrier\img\marsamaroc.png" width="100" height="100"/>
</td>


	
<style type="text/css">
.ds_box {
	background-color: #FFF;
	border: 1px solid #000;
	position: absolute;
	z-index: 32767;
}
.ds_tbl {
	background-color: #FFF;
}
.ds_head {
	background-color: #333;

	color: #FFF;

	font-family: Arial, Helvetica, sans-serif;

	font-size: 13px;

	font-weight: bold;

	text-align: center;

	letter-spacing: 2px;

}
.ds_subhead {
	background-color: #CCC;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}
.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;

	text-align: center;

	font-family: Arial, Helvetica, sans-serif;

	padding: 5px;

	cursor: pointer;

}
.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */
</style>
<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}
tr{
 border-width:1px;
 border-style:dotted;
 border-color:black;

 }

-->

</style>


<style>
strong {
	color:#2284d5;
}
h4 {
	color:#FFFFFF;
}

</style>
 





  <br>

  <table border="0" align="center" width="100%">

    <tbody>

      <td class="Partext1" bgcolor="F9F5F5" align="center" ><strong>Plus d'informations  &nbsp; &nbsp;&rarr;<a href="courier_list.php">Retourner à la liste des courriers</a></strong></td>

   

  </tbody></table>



  <br>





							<?php while($result=mysqli_fetch_array($query)){
							$cid=$result['cid'];
							$Statut=$result['Statut'];
if ($Statut == "Arrivé"){
	$Expéditeur=$result['Nom'];
	$Récepteur=$result['MarsaMaroc'];
	$Fax=$result['Fax'];
	$Adresse=$result['Adresse'];
	$Email=$result['Email'];
	$Tel=$result['Tel'];
	$FaxM=" ";
	$AdresseM=" ";
	$EmailM=" ";
	$TelM=" ";
}
else{
	$Expéditeur=$result['MarsaMaroc'];
	$Récepteur=$result['Nom'];
	$Fax=" ";
	$Adresse=" ";
	$Email=" ";
	$Tel=" ";
	$FaxM=$result['Fax'];
	$AdresseM=$result['Adresse'];
	$EmailM=$result['Email'];
	$TelM=$result['Tel'];
	
}


$pdf=$result['pdf'];
$pdf1='$pdf';

?>

  <table bgcolor="#EEEEEE" cellpadding="0" cellspacing="0" align="center" width="50%"> 

    

    <tbody><tr>

      <td class="Partext1" bgcolor="#FFFFFF">
	  <div align="center">

        <table border="0" cellpadding="0" cellspacing="0" width="100%" >


          <tbody>

	<tr>

            <td width="30%" ><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Récepteur :</strong> </td>

            <td class="Partext1" bgcolor="#FFFFFF"width="200%"><div align="left" class="style3"><?php echo $Récepteur; ?>&nbsp;</td>

          </tr>

          <tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Téléphone : </strong></div></td>

            <td><div align="left" class="style3">

              <?php echo $TelM; ?>
            </div></td>
          </tr>


          <tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : </strong></div></td>

            <td><div align="left" class="style3">
			<?php echo $EmailM; ?>
			</div></td>
          </tr>
	<tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adresse : </strong></div></td>

            <td><div align="left" class="style3">
			<?php echo $AdresseM; ?>
			</div></td>
          </tr>
<tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : </strong></div></td>

            <td><div align="left" class="style3">
			<?php echo $FaxM; ?>
			</div></td>
          </tr>
        </tbody></table>

      </div></td>



</td><tr></table>

      <td class="Partext1" bgcolor="#FFFFFF">
	  <div align="center">

        <table border="0" cellpadding="0" cellspacing="0" width="50%">

          <tbody><tr>

            <td width="30%" class="style3"><div align="left"><strong><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expéditeur :</strong> </div></td>

            <td width="200%" class="style3"><div align="left"><br/><br/><?php echo $Expéditeur; ?></div></td>

          </tr>

          <tr>

            <td class="style3"><div align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Téléphone :</strong></td>

            <td class="style3"><div align="left"><?php echo $Tel; ?>&nbsp;</td>
          </tr>

          <tr>

            <td class="style3"><div align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : </strong></div></td>

            <td class="style3"><div align="left">
			<?php echo $Email; ?>
            </div></td>
          </tr>
<tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adresse :</strong> </div></td>

            <td><div align="left" class="style3">
			<?php echo $Adresse; ?>
			</div></td>
          </tr>
<tr>

            <td><div align="left" class="style3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : </strong></div></td>

            <td><div align="left" class="style3">
			<?php echo $Fax; ?>
			</div></td>
          </tr>
        



      </div></td>

    </tr>


 <tr> 

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong> <br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Objet   </strong>
<td class="style3" bgcolor="#FFFFFF" color="red"  width= 60%>  
<br/><br/><?php echo $result['Objet']; ?></font>&nbsp;</td>
    </tr> 

    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date </strong></td>

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $result['Date']; ?>&nbsp;</td>
    </tr>
    
    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outil </strong></td>

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $result['Outil']; ?>&nbsp;</td>
    </tr>

    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commentaire  </strong></td>

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $result['Commentaire']; ?>&nbsp;</td>
    </tr>
    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entité  </strong></td>

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $result['Entité']; ?>&nbsp;</td>
    </tr>
    <tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instruction  </strong></td>

      <td class="style3" bgcolor="#FFFFFF">&nbsp;<?php echo $result['Instruction']; ?>&nbsp;</td>
    </tr>
<tr>

      <td class="style3" bgcolor="#FFFFFF" align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Courrier  </strong></td>
	<td class="style3" bgcolor="#FFFFFF">&nbsp; <a href="pdf.php">Télécharger le fichier&nbsp;</a></td>
     
    </tr>

     

   
  </tbody></table> 






<br></td>

      
  </tbody></table>

  

  </form>    </td>
  
 <tr>

  <table border="1" align="center" width="100%">

    <tbody>

      <td class="Partext1" bgcolor="F9F5F5" align="center" ></td>

   

  </tbody></table>


</tbody>

</tbody></table>
<?php }?>




</body></html>

