<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if(strlen($_SESSION['cuid']==0)) {
header('location:login.php');
}else{


//select office name
$userid=$_SESSION['cuid'];
$sql=mysqli_query($con,"select * from tbl_courier_officers where cuid='$userid'");
$row=mysqli_fetch_array($sql);
$office=$row['office'];
//echo $office;

$query=mysqli_query($con,"select * from tbl_courier where statut='Envoyé' and cuid=$userid ORDER BY cid DESC");
//echo $office;
?>
<!DOCTYPE html>
<html lang="en">

<head>

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
      table {
      border-collapse:collapse;
      }
      td, th {
      padding: 10px;
      border-bottom: 2px solid #6D6E75;
      text-align: center;
      
      
      }
    </style>
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
                <h1 align="center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Liste des courriers envoyés</h1>
                <p></p>
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Menu</a>
<a class="btn btn-info" id="menu-toggle" download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet');">Exporter en Excel</a>
            </div>
<?php 
include 'dbcon.php';
$sql = $conn ->prepare("SELECT COUNT(cid) as m FROM tbl_courier WHERE Statut ='Envoyé'  and cuid=$userid");
                                           $sql -> execute();
                                           $count = $sql->fetchAll(); 
                                           foreach ($count as $field);
                                           ?>			
			<div class="col-md-9">
					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
						<h3 class="panel-title">Vous avez envoyé [<?php echo $field['m'];?>] Courriers </h3>
					  </div>
					  	<div class="panel-body">
							<div class="row">
							
						</div><!--end of row-->
						
						<!-- Table -->
						  <table class="table table-striped table-hover" style="margin-top:20px;">
							<tr>    <td><strong>N_Ordre</strong></td>
								<td><strong>Expéditeur</strong></td>
								<td><strong>Récepteur</strong></td>
								<td><strong>Objet</strong></td>
								
								
								<td></td>
							</tr>
	
							<?php while($result=mysqli_fetch_array($query)){
							$cid=$result['cid'];
							$Expéditeur=$result['MarsaMaroc'];
							$Récepteur=$result['Nom'];
							?>	

							<tr>	<td><?php echo $cid; ?></td>
								<td><?php echo $Expéditeur; ?></td>
								<td><?php echo $Récepteur; ?></td>
								<td><?php echo $result['Objet']; ?></td>
								
								<td><a class="btn btn-default"href="edit-courier.php?cid=<?php echo $cid; ?>">Plus de détails</a> </td>
							</tr>
							 <?php
							}//while
							?>
						  </table>
					  </div>
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