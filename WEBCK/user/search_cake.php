<?php
     include 'connect.php';
    $sql =  "SELECT * FROM cake inner join typecake on cake.caketype = typecake.id ";
    $query = mysqli_query($conn,$sql);

    $id = $_GET['id'];
    $sql_search =  "SELECT * FROM cake inner join typecake on cake.caketype = typecake.id WHERE id=$id";
    $query_search = mysqli_query($conn,$sql_search);
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .dropdown-menu{
            background-color: rgb(43, 40, 37);
        }
        .dropdown-menu li a{
            color: white;
            transition: 0.5s ease;
        }
        .dropdown-menu li a:hover{
            color: rgb(232, 143, 42);
        }
        .collapse a{
            color: black;
        }
        .collapse a:hover{
            color: rgb(232, 143, 42);
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
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="user.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-cookie-bite fs-1 text-primary me-3"></i>SWEETCAKE</h1>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="user.php" class="nav-item nav-link">Trang chủ</a>
                <a href="about.php" class="nav-item nav-link">Về chúng tôi</a>
                <a href="tatcasanpham.php" class="nav-item nav-link active">Thực đơn & giá cả</a>
                <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                <a href="./login.php" class="nav-item nav-link">Đăng nhập</a>
                <a href="./signup.php" class="nav-item nav-link">Đăng ký</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Bánh mì</h1>
                <a href="./user.php">Trang chủ</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="#">Thực đơn & giá cả</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Khám phá bánh của chúng tôi</h1>
            </div>
            <div class="row gx-5">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="bg-light p-3 rounded mb-2">
                                    <?php
                                        $cakeTypes = array(
                                            1 => "bánh bông lan",
                                            2 => "bánh kem",
                                            3 => "bánh mì",
                                            4 => "bánh mặn",
                                            5 => "bánh bao",
                                            6 => "bánh cookies"
                                        );

                                        foreach ($cakeTypes as $typeId => $typeName) {
                                            echo '<a href="search_cake.php?id=' . $typeId . '">' . $typeName . '</a><br>';
                                        }
                                    ?>
                                    
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 pb-5">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-3" >
                                <?php
                                    while($row = mysqli_fetch_assoc($query_search)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex h-100">
                                        <div class="flex-shrink-0">
                                            <a href="chitietbanh.php?id=<?php echo $row['id_cake']; ?>"><img class="img-fluid" src="../admin/images/<?php echo $row['ava'] ?>" style="width: 150px; height: 150px;"></a>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4" style="width: 260px;">
                                            <a href="chitietbanh.php?id=<?php echo $row['id_cake']; ?>"><h4 class="text-uppercase"><?php echo $row['cakename']?></h4><br>
                                            <h5 class="bg-dark text-primary p-2 m-0 text-center"><?php echo $row['price']?> VNĐ</h5></a>
                                        </div>
                                    </div>
                                </div><?php }   ?>
                            </div>
                    </div>
                </div>
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