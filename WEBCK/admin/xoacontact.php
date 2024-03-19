<?php
    
    $id = $_GET['id'];
    require_once 'db.php';
    $sql = "DELETE FROM contact WHERE id=$id";
    $query = mysqli_query($conn,$sql);
    header('location: contact.php');

?>