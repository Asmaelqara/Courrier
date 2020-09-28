<?php
include'dbcon.php';
if(isset($_POST['send'])){
$message=$_POST['Comments'];

	$userID = $_POST['cuid'];
	$Shippername = $_POST['Shippername'];
	$Shipperphone = $_POST['Shipperphone'];
	$Shipperaddress = $_POST['Shipperaddress'];
	$Email = $_POST['email'];
	$Fax = $_POST['Fax'];

	
	$Receivername = $_POST['Receivername'];
	$Outil = $_POST['Outil'];
	
	$Statut="Arrivé";
	$Entité = $_POST['Entité'];
	$objet = $_POST['objet'];
	$Packupdate = $_POST['Packupdate'];
	
	
	$instructions = $_POST['instructions'];
	$Comments = $_POST['Comments'];
	$pdf = $_POST['add_pdf'];
//Query for inserting data
$query = "INSERT INTO tbl_courier (cuid,Date,Nom,Tel,Adresse,Email,Fax,MarsaMaroc,Objet,Statut,Commentaire,Outil,Entité,Instruction,pdf)
VALUES('$userID','$Packupdate','$Shippername', '$Shipperphone','$Shipperaddress','$Email','$Fax','$Receivername','$objet' ,'$Statut', '$Comments','$Outil','$Entité','$instructions','$pdf')";

if ($conn->query($query )) {

              $data = array(    
              "sender"=>"+250726259177",
              "recipients"=>$Receiverphone,
              "message"=>"Coucou",
            );

            $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
            
            $data = http_build_query ($data);

            $username="pasteur"; 
            $password="0726259177";
            
            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

            //execute post
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //close connection
            curl_close($ch);
            
			echo"<script>alert('The Notification Has Been Sent');window.location='courier_list.php'</script>";
	}else{
		echo "<script type= 'text/javascript'>alert('Courier Not Updated.');window.location='courier_list.php'</script>";
	} 
}
?>