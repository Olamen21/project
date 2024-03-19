<?php
  include 'connect.php';
?>
<?php 
    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass= $_POST['pass'];

        if($username == "" || $email == "" || $phone == "" || $pass == "" || $address==""){
            echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        }else{
            $sql = "SELECT * FROM users WHERE username LIKE '%username%'";
            $qr = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($qr);
            if($username==$rows['username']){
                echo "Username này đã tồn tại. Vui lòng nhập lại.";
            } else{

                $sqli = "INSERT INTO users(username,address, email, phone, pass,usertype) VALUES ('$username', '$address', ' $email', '$phone', '$pass', 2);";
                $query = mysqli_query($conn, $sqli);
                // echo "hi";
                header("location: login.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">	

    <title>Sign up</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Đăng ký</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email" id="email" name="email" pattern="\S+@\S+(\.com|\.vn)" title="Nhập địa chỉ email hợp lệ có đuôi .com hoặc .vn" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Phone" name="phone" pattern="0[0-9]{9}" title="Nhập số điện thoại hợp lệ có số 10 số và có số 0 ở đầu" required>
                <i class='bx bxs-phone'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Address" name="address" required>
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock' ></i>
            </div>

            <button name="signup" class="btn">Đăng ký</button>

            <div class="signup">
                <p>Bạn đã có tài khoản <a href="login.php">Đăng nhập</a> ngay</p>
            </div>
        </form>
    </div>
</body>
</html>