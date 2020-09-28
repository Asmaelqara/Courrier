<?php
session_start();
error_reporting(0);
include('dbconnection.php');
require_once('library.php');
if (strlen($_SESSION['cuid']==0)) {
header('location:login.php');
} else{
$Name=$_POST['Consignment'];
echo $cid;
$userid=$_SESSION['cuid'];
$query=mysqli_query($con,"select * from tbl_courier where MarsaMaroc='$Name' OR Nom='$Name' OR Objet='$Name' OR Entité='$Name' ");
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
                <li>
                    <a href="process.php?action=logOut">Se déconnecter</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Liste des courriers</h1>
                <p></p>
                <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Menu</a>
				
            </div>
<?php 
include 'dbcon.php';
$sql = $conn ->prepare("SELECT COUNT(cid) as m FROM tbl_courier");
                                           $sql -> execute();
                                           $count = $sql->fetchAll(); 
                                           foreach ($count as $field);
                                           ?>		
			<div class="col-md-12">
					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
						<h3 class="panel-title"> <?php echo $field['m'];?> Courriers</h3>
					  </div>
					  	
						
						<!-- Table -->
						  <table class="table table-striped table-hover" style="margin-top:30px;">
							<tr>	<td>N_Ordre</td>
								<td>Expéditeur</td>
								<td>Récepteur</td>
								<td>Objet</td>
								
								<td></td>
							</tr>
							<?php while($result=mysqli_fetch_array($query)){
							$cid=$result['cid'];
							$Statut=$result['Statut'];
							if ($Statut == "Arrivé"){
							$Expéditeur=$result['Nom'];
							$Récepteur=$result['MarsaMaroc'];
							
							}else{
							$Expéditeur=$result['MarsaMaroc'];
							$Récepteur=$result['Nom'];
								}

							?>
							
							<tr>	<td><?php echo $cid; ?></td>
								<td><?php echo $Expéditeur; ?></td>
								<td><?php echo $Récepteur; ?></td>
								<td><?php echo $result['Objet']; ?></td>
								
								<td><a class="btn btn-default"href="edit-courier.php?cid=<?php echo $cid; ?>">Plus de détails</a></td>
							</tr>
							
							
							<?php } ?>
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