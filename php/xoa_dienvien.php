<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "Delete from dienvien where id = $id";
$sql1 = " delete from phim_dienvien where id_dienvien = $id";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql);
header("Location: dienvien.php");
?>