
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

$pdf=$result['pdf'];


$filename = 'File'; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($pdf));
header('Accept-Ranges: bytes');

@readfile($pdf)

?>
