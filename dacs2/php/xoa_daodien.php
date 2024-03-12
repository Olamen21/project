<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "Delete from daodien where id = $id";
mysqli_query($conn,$sql);
header("Location: daodien.php");
?>