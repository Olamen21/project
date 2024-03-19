<?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM history WHERE id=$id ";
    $query = mysqli_query($conn,$sql);
    header('location: index.php');

?>