<?php
    
    $id = $_GET['id'];
    require_once 'db.php';
    $sql = "DELETE FROM users WHERE id_user=$id";
    $query = mysqli_query($conn,$sql);
    header('location: user.php');

?>