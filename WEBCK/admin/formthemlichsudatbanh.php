<?php 
include 'db.php';
$username = mysqli_query($conn,"select * from users where usertype = 2");
$cakename = mysqli_query($conn,"select * from cake");

if(isset($_POST['id_cake'])) {
    $cakeid = $_POST['id_cake'];
    $userid = $_POST['id_user'];
    $quantity = $_POST['quantity'];

    $sql = "Insert into history(userid,cakeid,quantity) values ('$userid','$cakeid','$quantity')";
    mysqli_query($conn,$sql);

    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>SWEET CAKE</title>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                        </li>
                        <li>
                            <a href="quanlybanh.php">
                                <i class="fas fa-chart-bar"></i>Quản lý bánh</a>
                        </li>
                        <li>
                            <a href="user.php">
                                <i class="fas fa-table"></i>Quản lý người dùng</a>
                        </li>
                        <li >
                            <a class="js-arrow" href="contact.php">
                                <i class="far fa-id-card"></i>Liên hệ</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
             <!-- HEADER DESKTOP-->
             <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="timkiemlichsu.php" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm lịch sử đặt hàng" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/user.jpg" alt="admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            
            <!-- Main content -->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-12">
                                <form action="" method="post">
                                <div class="card">
                                   
                                   <div class="card-body card-block">
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tên người đặt</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="id_user" id="selectLg" class="form-control">
                                                        <?php foreach($username as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_user'] ?>"><?php echo $value['username'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tên bánh</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="id_cake" id="select" class="form-control">
                                                        <?php foreach($cakename as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_cake'] ?>"><?php echo $value['cakename'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                       <div class="has-warning form-group">
                                           <label for="inputWarning2i" class=" form-control-label">Số lượng</label>
                                           <input type="number" id="inputWarning2i" class="form-control-warning form-control" name="quantity">
                                       </div>
                                    
                                       <button type="submit" class="btn btn-outline-dark">Thêm</button>
                                       
                                       
                                   </div>
                               </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

     <!-- Jquery JS-->
     <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>
</html>