<?php 
include('../include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$data = mysqli_query($sql_con,"SELECT *from images where id ='$id'");
	$row = mysqli_fetch_array($data);
	$img = $row['img'];
	if (file_exists($img)) {
		unlink($img);
	}
	mysqli_query($sql_con,"DELETE from images where id = '$id'");
	echo "<script>alert('Image deleted successfully !!!')</script>";
	echo "<script>window.location = 'delete_images.php'</script>";
}
 ?>