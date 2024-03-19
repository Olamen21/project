<?php
    
    $id = $_GET['id'];
    require_once 'db.php';
    $sql = "DELETE FROM cake WHERE id_cake=$id";
    $query = mysqli_query($conn,$sql);
    header('location: quanlybanh.php');

?>