<?php
  include 'connect.php';
?>
<?php 
    if(isset($_POST['signup'])){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass= $_POST['pass'];

        if($user_name == "" || $email == "" || $phone == "" || $pass == ""){
            echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        }else{
            $sql = "SELECT * FROM users WHERE user_name LIKE '%user_name%'";
            $qr = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($qr);
            if($user_name==$rows['user_name']){
                echo "Username này đã tồn tại. Vui lòng nhập lại.";
            } else{

                $sqli = "INSERT INTO users(user_name, email, phone, pass,type_id,created) VALUES ('$user_name', ' $email', '$phone', '$pass', 2, Now() );";
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
    <link rel="stylesheet" href="../css/signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Sign up</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Đăng ký</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="user_name" required>
                <i class='bx bxs-user'></i>
                <span id="text"></span>
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
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock' ></i>
            </div>

            <button type="submit" class="btn" name="signup">Đăng ký</button>

            <div class="signup">
                <p>Bạn đã có tài khoản <a href="login.php">Đăng nhập</a> ngay</p>
            </div>
        </form>
    </div>
</body>
</html>