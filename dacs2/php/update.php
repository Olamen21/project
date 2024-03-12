<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $maloai = $_POST['maloai'];
        $matheloai = $_POST['matheloai'];
        $mota = $_POST['mota'];
        $madaodien = $_POST['madaodien'];
        $maquocgia = $_POST['maquocgia'];

        $sql = "UPDATE phim SET tenphim='$name',maloai='$maloai',matheloai='$matheloai',mota='$mota',madaodien='$madaodien',maquocgia='$maquocgia' WHERE maphim=$id";
    if( mysqli_query($conn,$sql)) {
        header("Location: phim.php");
    }
}

    
?>


