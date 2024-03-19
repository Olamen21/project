<?php
    require_once 'db.php';
    $sql_typecake = "SELECT * FROM typecake ";
    $query_typecake = mysqli_query($conn,$sql_typecake);

    $id = $_GET['id'];
    $sql_all = "SELECT * FROM cake WHERE id_cake=$id";
    $query_all = mysqli_query($conn,$sql_all);
    $r = mysqli_fetch_assoc($query_all);

    if (isset($_POST['sbm'])) {
        $tenbanh = $_POST['tenbanh'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];

        if($_FILES['image']['name']==''){
            $image = $r['image'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,'./images/'.$image);
        }

        $mota = $_POST['mota'];
        $typecake = $_POST['typecake'];

        $sql = "UPDATE cake SET ava='$image', cakename='$tenbanh', caketype='$typecake',
         price = $gia, quantity=$soluong , decription='$mota' WHERE id_cake = $id"; 
                
        $query = mysqli_query($conn,$sql);

        header('location: quanlybanh.php');
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
    <title>Update bánh</title>
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
                        <li class="active has-sub">
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
                            <label class="text-dark" style="margin:7px 0 0 7px;">CẬP NHẬT BÁNH</label>
                        </div><br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Tên bánh</label><br>
                                    <input name="tenbanh" type="text" class="form-control" required value="<?php echo $r['cakename']; ?>" > 
                                </div>
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Giá</label><br>
                                    <input name="gia" type="number" class="form-control" required value="<?php echo $r['price']; ?>">
                                </div>
                                <div class="col-sm"><label class="text-dark font-weight-bold">Số lượng</label><br>
                                    <input name="soluong" type="number" class="form-control" required value="<?php echo $r['quantity']; ?>">
                                </div>
                            </div><br>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Ảnh bánh</label><br>
                                    <input type="file" name="image" class="form-control" required  >
                                </div>
                                <div class="col-sm">
                                    <label class="text-dark font-weight-bold">Loại bánh</label><br>
                                    <select class="form-control" name="typecake">
                                        <?php
                                            require_once 'db.php';
                                            while($row_typecake = mysqli_fetch_assoc($query_typecake)){ ?>
                                            <option value="<?php echo $row_typecake['id']; ?>"><?php echo $row_typecake['typename']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm"><label class="text-dark font-weight-bold">Mô tả</label><br>
                                    <input name="mota" type="text" class="form-control" value="<?php echo $r['decription']; ?>" required>
                                </div>
                            </div><br>
                                <button name="sbm" class="btn btn-outline-dark" type="submit">Sửa</button>
                                <a class="btn btn-outline-dark" href="quanlybanh.php" >Danh sách</a>
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