<?php
  include 'connect.php';
?>
<?php
   if(isset($_POST['login'])){
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];

    if($user_name == "" || $pass == ""){
        echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
    } else {
         // Use parameterized query to prevent SQL injection
         $sqlUser = "SELECT * FROM users";
         $qrUser = mysqli_query($conn, $sqlUser);
 
         // Initialize a flag to check if the username is found
         $usernameFound = false;
 
         while($rowUser = mysqli_fetch_array($qrUser)){
             if($user_name==$rowUser['user_name']){
                 $usernameFound = true; // Set the flag to true if username is found
                 $sql = "SELECT * FROM users WHERE user_name LIKE '%$user_name%'";
                 $qr = mysqli_query($conn, $sql);
 
                 if($qr){
                     $rows = mysqli_fetch_array($qr);
                     $id_user = $rows['id_user'];
 
                     if($user_name==$rows['user_name'] && $pass==$rows['pass']){
                         if($rows['type_id']==1){
                            header("location: index_admin.php");
                         } else {
                            header("location: indexuser.php?id_user=$id_user");
                         }
                         
                     } else {
                         echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng thử lại.');</script>";
                     }
                 } else {
                     echo "<script>alert('Đã xảy ra lỗi trong quá trình truy vấn.');</script>";
                 }
                 break; // Exit the loop once the username is found
             }
         }
 
         // Display alert if the username is not found
         if (!$usernameFound) {
             echo "<script>alert('Bạn chưa đăng ký cho tài khoản này. Vui lòng đăng ký.');</script>";
         }
             }
       
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Đăng nhập</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="user_name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock' ></i>
            </div>

            <button  class="btn" name="login">Đăng nhập</button>
            
            <div class="signup">
                <p>Bạn chưa có tài khoản? <a href="signup.php">Đăng ký</a> ngay</p>
            </div>
        </form>
    </div>
</body>
</html>