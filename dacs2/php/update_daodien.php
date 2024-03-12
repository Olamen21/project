<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['name'])) {
        $id = $_POST['id'];
        $ten = $_POST['name'];

        $sql = "UPDATE daodien SET ten='$ten' WHERE id=$id";
    if( mysqli_query($conn,$sql)) {
        header("Location: daodien.php");
    }
}

    
?>