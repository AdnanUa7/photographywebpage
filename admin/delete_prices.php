<?php 
include('../include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"DELETE from prices where id = '$id'");
	echo "<script>alert('Prices deleted successfully !!!')</script>";
	echo "<script>window.location = 'manage_prices.php'</script>";
}
 ?>