<?php 
include('../include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	mysqli_query($sql_con,"DELETE from booking where id = '$id'");
	echo "<script>alert('Booking record deleted successfully !!!')</script>";
	echo "<script>window.location = 'accepted_bookings.php'</script>";
}
 ?>