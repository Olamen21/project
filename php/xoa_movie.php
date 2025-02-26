<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "Delete from movie where id = $id";
mysqli_query($conn,$sql);
header("Location: movie.php");
?>