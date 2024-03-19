<?php
  include 'connect.php';
?> 
<?php 
    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
        $sqli = "SELECT * FROM users WHERE id_user='$id_user'";
        $qrr = mysqli_query($conn, $sqli);
        $line = mysqli_fetch_array($qrr);
    }
    if(isset($_GET['id_cake'])){
        $id_cake = $_GET['id_cake'];
        $sqlcake = "SELECT * FROM cake WHERE id_cake='$id_cake'";
        $qrcake = mysqli_query($conn, $sqlcake);
        $linecake = mysqli_fetch_array($qrcake);
    }
    if(isset($_POST['edit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
    
        if($username=="" | $email=="" | $phone=="" || $address==""){
          echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        }else{
          $sqlii = "UPDATE users SET username='$username', address='$address', email='$email', phone='$phone' WHERE id_user=$id_user";
          $query = mysqli_query($conn, $sqlii);
          echo "<script>alert('Cập nhật thông tin thành công.');</script>";
        //   header("location: index_user.php?id_user=$id_user");
        }
      }
      if(isset($_POST['edit_pass'])){
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $new_pass_again = $_POST['new_pass_again'];
        $sql = "SELECT * FROM users WHERE id_user='$id_user'";
        $qr = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($qr);
    
        if($old_pass=="" | $new_pass=="" | $new_pass_again==""){
          echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        }else if($old_pass==$row['pass']){ 
          if($new_pass==$new_pass_again){
            $sqlii = "UPDATE users SET pass='$new_pass' WHERE id_user=$id_user";
            $query = mysqli_query($conn, $sqlii);
            echo "<script>alert('Đổi mật khẩu thành công.');</script>";
            // header("location: index_user.php?id_user=$id_user");
          }else{
            echo "<script>alert('Mật khẩu nhập lại không khớp. Vui lòng nhập lại');</script>";
          }
        }else{
          echo "<script>alert('Mật khẩu hiện tại không đúng. Vui lòng nhập lại');</script>";
         
        }
      }
      if(isset($_POST['search'])){
        $txtsearch = $_POST['txtsearch'];
        if($txtsearch==""){
            echo "<script>alert('Vui lòng nhập vào thanh tìm kiếm để tìm.');</script>";
        }else{
            $sql = "SELECT * FROM cake WHERE cakename LIKE '%$txtsearch%'";
            $qr = mysqli_query($conn, $sql);
        
            $rows= mysqli_fetch_array($qr);
            if($rows<=0){
                echo "<script>alert('Không có sản phẩm bạn cần tìm');</script>";
            }else{
                header("location: search.php?id_user=$id_user&txtsearch=$txtsearch");
            }
        }}
        if(isset($_POST['addcart'])){
            $quantity = $_POST['amount'];
            
            
            $sqlcart = "INSERT INTO cart(userid, cakeid, quantity) VALUES ('$id_user', '$id_cake', '$quantity');";
            if(mysqli_query($conn, $sqlcart)){
                echo "<script>alert('Thêm vào giỏ hàng thành công');</script>";
            }else{
                echo "<script>alert('Thêm vào giỏ hàng thất bại.');</script>";
            }
        }
    
        if(isset($_POST['addfav'])){
            $sqlfav = "INSERT INTO favorite(id_user, id_cake) VALUES ('$id_user', '$id_cake');";
            $qrfav=mysqli_query($conn, $sqlfav);
        }
        if(isset($_POST['nofav'])){
            $sqlnofav = "DELETE FROM favorite WHERE id_cake='$id_cake'";
            $qrnofav= mysqli_query($conn, $sqlnofav);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SWEETCAKE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
html{
    overflow-x: hidden;
}
 body{
    align-items: center;
    justify-content: center;
    min-height: 50vh ;
 }
 .row {
     display: flex;
 }
 
 
 .flex-box {
     display: flex;
     /* width: 100%; */
     /* margin: 100px auto; */
 }
 
 .left {
     width: 50%;
 }
 
 .right {
     margin-left: 100px;
     width: 60%;
     display: table;
 }
 
 .url {
     font-size: 20px;
     font-weight: 400;
     color: rgb(232, 143, 42);
 }
 
 .flex-box .right a {
     font-size: 20px;
     font-weight: 400;
     color: rgb(232, 143, 42);
 }
 
 .pname {
     font-size: 30px;
     font-weight: 600;
     margin-top: 30px;
 }
 
 .ratings {
     color: rgb(232, 143, 42);
     padding-top: 15px;
     display: flex;
 }
 
 .price {
     font-size: 20px;
     font-weight: 500;
     margin: 20px 0;
 }

 #buy-amount{
    display: flex;
 }
 #buy-amount #amount{
    width: 50px;
    text-align: center;
    border: 1px solid #ececec;
    cursor: pointer;
 }
 #buy-amount button{
    width: 33px;
    height: 33px;
    outline: none;
    background: none;
    border: 1px solid #ececec;
    background: #ececec;
 }
 #buy-amount button:hover{
    background-color: #ececec;
 }
 #buy-amount button svg{
    color: #4f4f4f;
 }
 #buy-amount button:hover svg{
    color: black;
 }

 .btn-box {
     display: flex;
 }
 
 .btn-box button {
     width: 190px;
     height: 50px;
     display: flex;
     margin: 20px 0 12px;
     transition: all 0.3s ease;
     font-size: 15px;
     margin: 8px 12px 0px 0px;
 }
 
 .btn-box button:first-child {
     justify-content: space-evenly;
     align-items: center;
     background-color: #ffff;
     border: 2px solid black;
     cursor: pointer;
 }
 
 .btn-box button:first-child:hover {
     background-color: black;
     color: #ffff;
 }
 
 .btn-box button:last-child {
     justify-content: space-evenly;
     align-items: center;
     background-color: #ffff;
     border: 2px solid black;
     cursor: pointer;
 }
 
 .btn-box button:last-child:hover {
     background-color: black;
     color: #ffff;
 }
 
 .product-content-button {
     border-top: 1px, solid #dddddd;
     position: relative;
 }
 
 .product-content-botton-content-title {
     border-bottom: 2px solid #dddddd;
     margin-top: 20px;
 }
 
 .product-content-botton-content-title-item {
     padding: 6px;
     cursor: pointer;
     margin-right: 6px;
 }
 
 .product-content-botton-content-mota {
     font-size: 15px;
     display: none;
 }
 
 .product-content-botton-content {
     padding-top: 30px;
     /* font-size: 12px; */
 }
 .big-img img{
    height: 500px;
    width: 600px;
 }
    </style>
</head>

<body>
     <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-3 text-center bg-secondary py-3">
            </div>
            <div class="col-lg-6 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="./index_user.php?id_user=<?php echo $id_user; ?>" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-cookie-bite fs-1 text-dark me-3"></i>SWEETCAKE</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 text-center bg-secondary py-3">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0 sticky-top">
        <a href="./index_user.php?id_user=<?php echo $id_user; ?>" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-cookie-bite fs-1 text-primary me-3"></i>SWEETCAKE</h1>
        </a>
        
        <div class="collapse navbar-collapse p-3" id="navbarCollapse">
            <a href="./index_user.php?id_user=<?php echo $id_user; ?>" class="">
                <h1 class="m-0 text-uppercase text-white"><i class="fa fa-cookie-bite fs-1 text-primary me-3"></i>SWEETCAKE</h1>
            </a>
            <div class="navbar-nav ms-auto mx-lg-auto  py-0">
                <a href="./index_user.php?id_user=<?php echo $id_user; ?>" class="nav-item nav-link active">Trang chủ</a>
                <a href="./about_user.php?id_user=<?php echo $id_user; ?>" class="nav-item nav-link">Về chúng tôi</a>
                <a href="./allproduct_user.php?id_user=<?php echo $id_user; ?>" class="nav-item nav-link">Thực đơn & giá cả</a>
                <a href="./contact_user.php?id_user=<?php echo $id_user; ?>" class="nav-item nav-link">Liên hệ</a>
            </div>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-black" placeholder="Tìm kiếm..." name="txtsearch">
                    
                        <button class="btn btn-search text-white bg-red rounded-0 border-0" name="search" ><i class="fa-solid fa-magnifying-glass"></i></button>
                    
                </div>
            </form>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="./img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex"><?php echo $line['username']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0 bg-dark">
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalInf">
                    <p>Thông tin tài khoản</p>
                    </a>
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit">
                    <p>Chỉnh sửa thông tin </p>
                    </a>
                    <a  href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalPass">
                    <p>Đổi mật khẩu</p>
                    </a>
                    <a href="./history_cart.php?id_user=<?php echo $id_user;?>" class="dropdown-item">
                    <p>Lịch sử đặt hàng</p>
                    </a>
                    <a href="./product_fav.php?id_user=<?php echo $id_user;?>" class="dropdown-item">
                    <p>Sản phẩm yêu thích</p>
                    </a>
                    <a href="./index.php" class="dropdown-item">
                    <p>Đăng xuất</p>
                    </a>
                </div>
            </div>
            <div class="iconCart">
                <a href="./cart.php?id_user=<?php echo $id_user;?>"><img src="./img/iconcart.png" alt=""></a>
                <?php 
                    $sqlcart = "SELECT COUNT(*) AS cartCount FROM cart WHERE userid='$id_user'";
                    $qrcart = mysqli_query($conn, $sqlcart);
                    $rowcart = mysqli_fetch_assoc($qrcart);
                    $cartCount = $rowcart['cartCount'];
                ?>
                <div class="totalQuantity"><?php echo $cartCount;?></div>
            </div>
            
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- modal -->
    <div class="modal fade" id="ModalInf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST">
              <div class="input-box">
                  <input type="text" placeholder="Username" name="user_name" value="<?php echo $line['username']; ?>" required>
                  <i class="fa-solid fa-user"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Email" name="email" value="<?php echo $line['email']; ?>" required>
                  <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Phone" name="phone" value="<?php echo $line['phone']; ?>" required>
                  <i class="fa-solid fa-phone"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Address" name="address" value="<?php echo $line['address']; ?>" required>
                  <i class="fa-solid fa-location-dot"></i>
              </div>
              
            </form>
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST" action="">
              <div class="input-box">
                  <input type="text" placeholder="Username" name="username" value="<?php echo $line['username']; ?>" required>
                  <i class="fa-solid fa-user"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Email" name="email" value="<?php echo $line['email']; ?>" pattern="\S+@\S+(\.com|\.vn)" title="Nhập địa chỉ email hợp lệ có đuôi .com hoặc .vn"  required>
                  <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Phone" name="phone" value="<?php echo $line['phone']; ?>" pattern="0[0-9]{9}" title="Nhập số điện thoại hợp lệ có số 10 số và có số 0 ở đầu" required>
                  <i class="fa-solid fa-phone"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Address" name="address" value="<?php echo $line['address']; ?>" required>
                  <i class="fa-solid fa-location-dot"></i>
              </div>
           
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" name="edit">Lưu thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title text-center" id="exampleModalLabel">Đổi mật khẩu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST" action="">
              <div class="input-box">
                  <input type="password" placeholder="Nhập mật khẩu hiện tại" name="old_pass" required>
                  <i class="fa-solid fa-lock"></i>
              </div>
              <div class="input-box">
                  <input type="password" placeholder="Nhập mật khẩu mới" name="new_pass"  required>
                  <i class="fa-solid fa-lock"></i>
              </div>
              <div class="input-box">
                  <input type="password" placeholder="Nhập lại mật khẩu mới" name="new_pass_again"  required>
                  <i class="fa-solid fa-lock"></i>
              </div>
           
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" name="edit_pass">Lưu thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
          

    <div class="flex-box"  style="background-color: #f3efea;">
        <div class="left" style="margin-top: 4%;margin-bottom: 3%; margin-left:3%">
            <div class="big-img">
                <img src="../admin/images/<?php echo $linecake['ava']; ?>" alt="" >
           </div>
        </div>
        <div class="right" style="margin-top: 4%;margin-bottom: 3%;margin-right:2%">
            <div class="url"><a href="./index_user.php?id_user=<?php echo $id_user; ?>">Trang chủ </a> > <span style="color: #581008;"><?php echo $linecake['cakename']; ?></span> </div>
            <div class="pname"><h2><?php echo $linecake['cakename']; ?></h2></div>
            <div class="price"><?php echo $linecake['price']; ?> VND</div>
            <form action="" method="POST">
                <div id="buy-amount">
                    <button type="button" class="minus-btn" onclick="handleMinus()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                    </button>
                    <input type="text" id="amount" name="amount" value="1" min="1">
                    <button type="button" class="plus-btn" onclick="handlePlus()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div><br>
                
                <div class="btn-box">
                    <?php 
						$sqlCountFav = "SELECT COUNT(*) AS favCount FROM favorite WHERE id_cake='$id_cake'";
						$qrCountFav = mysqli_query($conn, $sqlCountFav);
						$rowCountFav = mysqli_fetch_assoc($qrCountFav);
						$favCount = $rowCountFav['favCount'];
							
						if($favCount==0){
					?>
					<button class="buy-btn" name="addfav"><i class="fa-solid fa-heart-circle-plus"></i>Thêm vào yêu thích</button>
					<?php } else { 
						$sqladdfav = "SELECT * FROM favorite WHERE id_cake='$id_cake'";
						$qraddfav = mysqli_query($conn, $sqladdfav);
						$rowaddfav = mysqli_fetch_array($qraddfav);
						if($rowaddfav['id_cake']==$id_cake){
					?>
					<button class="buy-btn" name="nofav"><i class="fa-solid fa-heart-circle-minus"></i>Bỏ yêu thích</button>
					<?php } else{ ?>
						<button class="buy-btn" name="addfav"><i class="fa-solid fa-heart-circle-plus"></i>Thêm vào yêu thích</button>
					<?php } } ?>
                    
                    <button class="cart-btn" name="addcart"><i class="fa fa-cart-arrow-down"></i>Thêm giỏ hàng</button>
                </div>
            </form>
            <div class="product-content-button">
                <div class="product-content-botton-content-big">
                    <div class="product-content-botton-content-title row">
                        <div class="product-content-botton-content-title-item mota">
                           <h5 >Mô tả sản phẩm  </h5> 
                           <div class="product-content-botton-content-chitiet">
                                <p><b><?php echo $linecake['cakename']; ?></b> <?php echo $linecake['decription'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="tab-class text-center">
                <h3>Sản phẩm liên quan</h3><br>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-3" >
                            <?php 
                                $caketype = $linecake['caketype'];
                                $sqlloadcake = "SELECT * FROM cake WHERE caketype='$caketype' AND id_cake!= '$id_cake' LIMIT 9";
                                $qrloadcake = mysqli_query($conn, $sqlloadcake);
                                while($rowloadcake=mysqli_fetch_array($qrloadcake)){
                            ?>
                            <div class="col-lg-4">
                                <div class="d-flex h-100">
                                    <div class="flex-shrink-0">
                                        <a href="./product.php?id_user=<?php echo $id_user; ?>&id_cake=<?php echo $rowloadcake['id_cake']; ?>"><img class="img-fluid" src="../admin/images/<?php echo $rowloadcake['ava']; ?>" alt="" style="width: 150px; height: 150px;"></a>
                                        
                                    </div>
                                    <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4" style="width: 260px;">
                                        <a href="./product.php?id_user=<?php echo $id_user; ?>&id_cake=<?php echo $rowloadcake['id_cake']; ?>"><h4 class="text-uppercase"><?php echo $rowloadcake['cakename']; ?></h4><br>
                                        <h5 class="bg-dark text-primary p-2 m-0 text-center"><?php echo $rowloadcake['price']; ?> VND</h5></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <br><br>
                
            </div>
        </div>
    </div>
    <!-- Products End -->

   <!-- Footer Start -->
   <div class="container-fluid bg-dark bg-img text-secondary" style="margin-top: 235px">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 mt-lg-n5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary border-inner p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0  text-white"><i class="fa fa-cookie-bite fs-1 text-dark me-3"></i>SWEETCAKE</h1>
                        </a>
                        <p class="mt-3" >Tại SWEETCAKE, chúng tôi là cửa ngõ dẫn bạn đến thế giới các món ngon hấp dẫn vị giác của bạn
                             và sưởi ấm trái tim bạn. Chúng tôi tin rằng cuộc sống phải thật ngọt ngào và mỗi ngày là cơ hội hoàn hảo để tận hưởng niềm vui đơn giản của món tráng miệng.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Liên hệ</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">TRUONG DHCNTT-TT VIET HAN</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">suongntt.22ite@vku.udn.vn</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">0917055377</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Liên hệ nhanh</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="./index_user.php?id_user=<?php echo $id_user; ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Trang chủ</a>
                                <a class="text-secondary mb-2" href="./about_user.php?id_user=<?php echo $id_user; ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Về chúng tôi</a>
                                <a class="text-secondary mb-2" href="./tatcasanpham_user.php?id_user=<?php echo $id_user; ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Thực đơn & giá cả</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-primary text-uppercase mb-4">Đăng kí</h4>
                            <p>Để biết thêm về SweetCake</p>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-3" placeholder="Email của bạn">
                                    <button class="btn btn-primary"><a href="./signup.php">Đăng ký</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
   
    <script>
    function handleMinus() {
        const amountInput = document.getElementById('amount');
        let currentAmount = parseInt(amountInput.value, 10);
        currentAmount = Math.max(1, currentAmount - 1);
        amountInput.value = currentAmount;
    }

    function handlePlus() {
        const amountInput = document.getElementById('amount');
        let currentAmount = parseInt(amountInput.value, 10);
        currentAmount += 1;
        amountInput.value = currentAmount;
    }
</script>

</body>

</html>