<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cinema";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        echo "Kết nối thất bại.";
    }else {

    } 
    ?>