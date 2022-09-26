<?php 
include('../include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"DELETE from messages where id = '$id'");
	echo "<script>alert('Message deleted successfully !!!')</script>";
	echo "<script>window.location = 'contacts.php'</script>";
}
 ?>