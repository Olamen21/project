<?php
    include 'connect.php';

    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
    
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql = "DELETE FROM cart WHERE id='$id'";
        $qr = mysqli_query($conn, $sql);
        header("location: cart.php?id_user=$id_user");
    }
?>