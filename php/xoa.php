<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "Delete from phim where maphim = $id";
$sql1 = "Delete from phim_dienvien where id_phim = $id";
$sql2 = "delete from interesting where id_phim = $id";
$sql3 = "delete from movie where id_phim = $id";
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql);
header("Location: phim.php");
?>