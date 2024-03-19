<?php
  include 'connect.php';
?> 
<?php 
   
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
    <link href="./css/style.css" rel="stylesheet">

    <style>
     .navbar{
        padding: 2;
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
                    <a href="index.html" class="navbar-brand">
                        <h1 class="m-0 text-white"><i class="fa fa-cookie-bite fs-1 text-dark me-3"></i>SWEETCAKE</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 text-center bg-secondary py-3">
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm  py-3 py-lg-2 px-3 px-lg-0 sticky-top">
        <a href="user.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-white"><i class="fa fa-cookie-bite fs-1 text-primary me-3"></i>SWEETCAKE</h1>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="./index.php" class="nav-item nav-link active">Trang chủ</a>
                <a href="./about.php" class="nav-item nav-link">Về chúng tôi</a>
                <a href="./tatcasanpham.php" class="nav-item nav-link">Thực đơn & giá cả</a>
                <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                <a href="./login.php" class="nav-item nav-link">Đăng nhập</a>
                <a href="./signup.php" class="nav-item nav-link">Đăng ký</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End --> 


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="font-secondary text-primary mb-4">Super Crispy</h1>
                    <h1 class="display-1 text-uppercase text-white mb-4">SWEETCAKE</h1>
                    <h1 class="text-uppercase text-white">Tiệm bánh ngon nhất Việt Nam</h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Về chúng tôi</h2>
                <h1 class="display-4 text-uppercase">Chào mừng đến với SWEETCAKE </h1>
                <h2 class="text-primary font-secondary">Nơi mỗi miếng bánh là một niềm vui</h2>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <video class="position-absolute w-100 h-100" src="./img/video (1080p).mp4" loop muted autoplay style="object-fit: cover;"></video>
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <h4 class="mb-4">Tại SWEETCAKE,</h4>
                    <p class="mb-5" >Chúng tôi đam mê tạo ra những chiếc bánh và món tráng miệng tinh tế, hấp dẫn, để lại ấn tượng lâu dài trong vị giác của bạn. 
                        Chúng tôi tin rằng cuộc sống quá ngắn để bỏ qua món tráng miệng và chúng tôi ở đây để làm cho mọi khoảnh khắc trở nên ngọt ngào hơn một chút.
                    </p>
                    <p>Mỗi chiếc bánh ở SWEETCAKE lại mang một vẻ riêng, từ hương vị đến cách trang trí. Hình thức giản dị nhưng chất lượng nhờ cách làm tinh tế và tỉ mỉ. 
                        Bánh có vị ngọt không quá đậm, vị béo thì thanh nên không gây cảm giác ngán cho người thưởng thức. Cũng rất hiếm khi tìm thấy sự trùng lặp trong các loại bánh ở SWEETCAKE vì tất cả chúng, từ bánh mì, bánh ngọt, bánh quy đều được làm 100% hand-made.
Hơn nữa, chúng tôi cũng là những người khá khó tính trong việc lựa chọn nguyên liệu cho các sản phẩm của cửa hàng.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid bg-img py-5 mb-5">
        <div class="container py-5">
            <div class="row gx-5 gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">Bánh</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">
                                <?php
                                    $banh_query = "SELECT * FROM cake";
                                    $banh_query_run = mysqli_query($conn,$banh_query);
                                    if($tong_banh = mysqli_num_rows($banh_query_run)){
                                        echo $tong_banh;
                                    }else{
                                        echo '<h4>Khong co du lieu !</h4>';
                                    }
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">Đặt bánh</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">
                                <?php
                                    $datbanh_query = "SELECT * FROM lich_su_dat_banh";
                                    $datbanh_query_run = mysqli_query($conn,$datbanh_query);
                                    if($tong_datbanh = mysqli_num_rows($datbanh_query_run)){
                                        echo $tong_datbanh;
                                    }else{
                                        echo '<h4>Khong co du lieu !</h4>';
                                    }
                                ?> 
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-mug-hot text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">Doanh thu</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">
                            <?php 
                                function currency_format($amount) {
                                    return number_format($amount, 0, ',', '.') . '.000';
                                }
                                $tong  = 0;
                                $doanhthu = "SELECT total FROM lich_su_dat_banh";
                                $query1 = mysqli_query($conn,$doanhthu);
                                while($row = mysqli_fetch_array($query1)){
                                    $tong += $row['total'];
                                }
                                    echo currency_format($tong);
                            ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex">
                        <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="text-primary text-uppercase">Người dùng</h6>
                            <h1 class="display-5 text-white mb-0" data-toggle="counter-up">
                            <?php
                                $user_query = "SELECT * FROM users";
                                $user_query_run = mysqli_query($conn,$user_query);
                                if($tong_user = mysqli_num_rows($user_query_run)){
                                    echo $tong_user;
                                }else{
                                    echo '<h4>Khong co du lieu !</h4>';
                                }
                            ?> 
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->
    
   

    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Thực đơn & giá cả</h2>
                <h1 class="display-4 text-uppercase">Khám phá bánh của chúng tôi</h1>
            </div>
            <div class="tab-class text-center">
                <h3>Sản phẩm nổi bật</h3><br>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-3" >
                            <?php 
                                $sqlcake = "SELECT * FROM cake LIMIT 9";
                                $qrcake = mysqli_query($conn, $sqlcake);
                                while($rowcake=mysqli_fetch_array($qrcake)){
                            ?>
                            <div class="col-lg-4">
                                <div class="d-flex h-100">
                                    <div class="flex-shrink-0">
                                        <a href="./product.php?id_user=<?php echo $id_user; ?>&id_cake=<?php echo $rowcake['id_cake']; ?>"><img class="img-fluid" src="../admin/images/<?php echo $rowcake['ava']; ?>" alt="" style="width: 150px; height: 150px;"></a>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4" style="width: 260px;">
                                        <a href="./product.php?id_user=<?php echo $id_user; ?>&id_cake=<?php echo $rowcake['id_cake']; ?>"><h4 class="text-uppercase"><?php echo $rowcake['cakename']; ?></h4><br>
                                        <h5 class="bg-dark text-primary p-2 m-0 text-center"><?php echo $rowcake['price']; ?> VND</h5></a>
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
                                <a class="text-secondary mb-2" href="./index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Trang chủ</a>
                                <a class="text-secondary mb-2" href="./about.php"><i class="bi bi-arrow-right text-primary me-2"></i>Về chúng tôi</a>
                                <a class="text-secondary mb-2" href="./tatcasanpham.php"><i class="bi bi-arrow-right text-primary me-2"></i>Thực đơn & giá cả</a>
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
    <script src="js/main.js"></script>
    
</body>

</html>