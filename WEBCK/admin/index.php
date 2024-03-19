<?php
    include 'db.php';
    $sql = mysqli_query($conn,"Select * from lich_su_dat_banh;"); 
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

            

            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">

                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-dark">THÔNG TIN</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Bánh
                                            </div>
                                                <?php
                                                    $banh_query = "SELECT * FROM cake";
                                                    $banh_query_run = mysqli_query($conn,$banh_query);
                                                    if($tong_banh = mysqli_num_rows($banh_query_run)){
                                                        echo '<h4 class="mb-0 h5 mb-0 font-weight-bold text-dark">'.$tong_banh.'</h4>';
                                                    }else{
                                                        echo '<h4>Khong co du lieu !</h4>';
                                                    }
                                                ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-home fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Doanh thu</div>
                                            <div class="h5 mb-0 font-weight-bold text-dark">
                                                <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                   <?php 
                                                function currency_format($amount) {
                                                    // Your currency formatting logic here
                                                    
                                                    return number_format($amount, 3, '.', '.') . ' VND';
                                                }
                                                    $tong  = 0;
                                                $doanhthu = "SELECT total FROM lich_su_dat_banh";
                                                $query1 = mysqli_query($conn,$doanhthu);
                                                while($row = mysqli_fetch_array($query1)){
                                                    $tong += $row['total'];
                                                    
                                                }
                                                echo currency_format($tong);
                                               
                                                    
                                                ?>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Người dùng
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                   <?php
                                                    $user_query = "SELECT * FROM users";
                                                    $user_query_run = mysqli_query($conn,$user_query);
                                                    if($tong_user = mysqli_num_rows($user_query_run)){
                                                        echo '<h4 class="mb-0 h5 mb-0 font-weight-bold text-dark">'.$tong_user.'</h4>';
                                                    }else{
                                                        echo '<h4>Khong co du lieu !</h4>';
                                                    }
                                                ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user fa-2x text-dark" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Đặt bánh
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                   <?php
                                                    $datbanh_query = "SELECT * FROM lich_su_dat_banh";
                                                    $datbanh_query_run = mysqli_query($conn,$datbanh_query);
                                                    if($tong_datbanh = mysqli_num_rows($datbanh_query_run)){
                                                        echo '<h4 class="mb-0 h5 mb-0 font-weight-bold text-dark">'.$tong_datbanh.'</h4>';
                                                    }else{
                                                        echo '<h4>Khong co du lieu !</h4>';
                                                    }
                                                ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    

                </div>

            <!-- MAIN CONTENT-->
            
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="title-1 m-b-25">Lịch sử đặt hàng</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Ngày đặt bánh</th>
                                                
                                                <th>Tên người đặt</th>
                                                <th>Tên bánh</th>
                                                <th class="text-right">Số lượng</th>
                                                <th class="text-right">Giá</th>
                                                <th class="text-right">Tổng tiền</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($sql as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value['date'] ?></td>
                                                
                                                <td><?php echo $value['username'] ?></td>
                                                <td><?php echo $value['cakename'] ?></td>
                                                <td class="text-right"><?php echo $value['quantity'] ?></td>
                                                <td class="text-right"><?php echo $value['price'] ?></td>
                                                <td class="text-right"><?php echo $value['total'] ?></td>
                                                <td>
                                                    <a  class="btn btn-info text-dark" href="formsualichsu.php?id= <?php echo $value['id'] ?>">Sửa</a>
                                                   
                                                </td>
                                                <td> <a onclick="return confirm('Bạn có muốn xóa đơn này không?');" href="xoalichsu.php?id= <?php echo $value['id'] ?>" class="btn btn-danger text-dark" >Xóa</a></th></td>
                                            </tr>
                                            <?php } ?> 
                                        </tbody>
                                    </table>
                                   
                                </div>
                                <a class="btn btn-outline-dark" href="formthemlichsudatbanh.php" >Thêm đơn đặt bánh</a>
                                
                            </div>
                            
                            
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
<!-- end document-->
