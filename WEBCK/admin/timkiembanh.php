
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
    <title>Quản lý bánh</title>
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
                           <form class="form-header" action="timkiembanh.php" method="post">
                                <input class="au-input au-input--xl" type="text" name="tukhoa" placeholder="Tìm kiếm bánh" />
                                <button class="au-btn--submit" name="timkiem" value="Tìm kiếm" type="submit">
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
                            <label class="text-dark" style="margin:7px 0 0 7px;">DANH SÁCH BÁNH</label>
                        </div><br>
                        <form action="timkiembanh.php" method="post">
                            <br>
                            <?php
                                require_once 'db.php';
                                if(isset($_POST['timkiem'])){
                                    $s = $_POST['tukhoa'];
                                    if($s == ""){
                                        echo "Vui lòng nhập vào thanh tìm kiếm !!!";
                                    }else{
                                        $sql = "SELECT * FROM cake INNER JOIN typecake ON cake.caketype = typecake.id
                                           WHERE cake.cakename LIKE '%$s%';";
                                        $query = mysqli_query($conn,$sql);
                                        $count = mysqli_num_rows($query);
                                    if($count <=0 ){
                                        echo "Không tìm thấy kết quả ".$s;
                                    }else{
                                        ?>
                                        <div class="table--no-card">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên bánh</th>
                                                        <th>Ảnh</th>
                                                        <th>Loại bánh</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Mô tả</th>
                                                        <th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i =1;
                                                        while($row = mysqli_fetch_assoc($query)){ ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td> <?php echo $row['cakename'] ?> </td>
                                                            <td>
                                                                <img style="width: 100px;" src="./images/<?php echo $row['ava'] ?> ">
                                                            </td>
                                                            <td> <?php echo $row['typename'] ?> </td>
                                                            <td> <?php echo $row['price'] ?> </td>
                                                            <td> <?php echo $row['quantity'] ?> </td>
                                                            <td> <?php echo $row['depict'] ?> </td>
                                                            <td>
                                                                <a  class="btn btn-info text-dark" href="formsuabanh.php?id= <?php echo $row['id_cake'] ?>">Sửa</a>
                                                                <a onclick="return confirm('Bạn có muốn xóa <?php echo $row['cakename']; ?> này không?');" href="xoabanh.php?id= <?php echo $row['id_cake'] ?>" class="btn btn-danger text-dark" >Xóa</a></th>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php
                                        }
                                    }  
                                }            
                            ?>
                        </form>
                        <a class="btn btn-outline-dark" href="./quanlybanh.php" >Danh sách</a>
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
