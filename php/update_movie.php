<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $id_phim = $_POST['id_phim'];
        $tap = $_POST['tap'];
        $time = $_POST['time'];

        $sql = "UPDATE movie SET id_phim='$id_phim',tập_phim='$tap',thoigian='$time' WHERE id=$id";
    if( mysqli_query($conn,$sql)) {
        header("Location: movie.php");
    }
}

    
?>