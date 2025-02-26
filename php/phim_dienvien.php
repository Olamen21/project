<?php 

include 'connect.php';
if(isset($_POST['maphim'])) {
    $id_phim = $_POST['maphim'];
    $id_dienvien = $_POST['madienvien'];
    $role = $_POST['mavaidien'];

    $sql = "INSERT INTO phim_dienvien(id_phim,id_dienvien,role) VALUES 
            ('$id_phim','$id_dienvien','$role')";
    if(mysqli_query($conn,$sql)) {
        header("Location: index_admin.php");
    }
}





?>