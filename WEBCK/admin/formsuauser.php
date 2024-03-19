<?php
    require_once 'db.php';
    $sql_typeuser = "SELECT * FROM type_user ";
    $query_typeuser = mysqli_query($conn,$sql_typeuser);

    $id = $_GET['id'];
    $sql_all = "SELECT * FROM users WHERE id_user = $id";
    $query_all = mysqli_query($conn,$sql_all);
    $r = mysqli_fetch_assoc($query_all);

    if (isset($_POST['sbm'])) {
        $tenuser = $_POST['tenuser'];
        $pass = $_POST['pass'];
        $diachi = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $typeuser = $_POST['typeuser'];

        $sql = "UPDATE users SET username = '$tenuser', address = '$diachi',
            phone = '$phone',email = '$email',pass ='$pass' ,usertype = $typeuser  
            WHERE id_user = $id "; 
                
        $query = mysqli_query($conn,$sql);
        header('location: user.php');
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
    <title>Update người dùng</title>
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
    <link rel="stylesheet" href="../css">

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
                        <li >
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                        </li>
                        <li >
                            <a href="quanlybanh.php">
                                <i class="fas fa-chart-bar"></i>Quản lý bánh</a>
                        </li>
                        <li class="active has-sub">
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
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
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

            <!-- MAIN CONTENT -->
             <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div style="background-color: pink; height: 40px;">
                            <label class="text-dark" style="margin:7px 0 0 7px;">THÊM MỚI NGƯỜI DÙNG</label>
                        </div><br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Tên người dùng</label><br>
                                    <input name="tenuser" type="text" class="form-control" value="<?php echo $r['username']?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Mật khẩu</label><br>
                                    <input name="pass" type="text" class="form-control" value="<?php echo $r['pass']?>" required>
                                </div>
                                <div class="col-sm"><label class="text-dark font-weight-bold">Địa chỉ</label><br>
                                    <input name="address" type="text" class="form-control" value="<?php echo $r['address']?>" required>
                                </div>
                            </div><br>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Email</label><br>
                                    <input type="text" name="email" class="form-control" value="<?php echo $r['email']?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Điện thoại</label><br>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $r['phone']?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Loại người dùng</label><br>
                                    <select class="form-control" name="typeuser">
                                        <?php
                                            require_once 'db.php';
                                            while($row_typeuser = mysqli_fetch_assoc($query_typeuser)){ ?>
                                            <option value="<?php echo $row_typeuser['id']; ?>"><?php echo $row_typeuser['type_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><br>
                                <button name="sbm" class="btn btn-outline-dark" type="submit">Sửa</button>
                                <a class="btn btn-outline-dark" href="user.php" >Danh sách</a>
                            </div>
                        </form>
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