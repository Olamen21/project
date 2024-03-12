<?php 
session_start();
include 'connect.php';
$inter = mysqli_query($conn, "select * from view_interesting");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap_admin.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style_admin.css" rel="stylesheet">
    <link href="../css/bootstrap_admin.min.css" rel="stylesheet">
    
    <title>Phim</title>
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="./index_admin.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Cloud</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="./index_admin.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./phim.php" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Phim</a>
                    <a href="./user.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Người dùng</a>
                    <a href="./daodien.php" class="nav-link nav-item "><i class="fa fa-laptop me-2"></i>Đạo diễn</a>
                    <a href="./dienvien.php" class="nav-link nav-item "><i class="fa fa-keyboard me-2"></i>Diễn viên</a>
                    <a href="./movie.php" class="nav-link nav-item "><i class="fa fa-table me-2"></i>Movie</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
    
        <!-- Content -->
        <div class="content">
            <!-- Navbar -->
             <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="./index.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navbar -->

            <!-- table -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Phim yêu thích</h6>
                </div>
                <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Tên phim</th>
                                    <th scope="col">Ảnh</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($inter as $key => $value) { ?>
                                    <tr>
                                        
                                        <td><?php echo $value['user_name'] ?></td>
                                        <td><?php echo $value['tenphim'] ?></td>
                                        <td><img src="../img/<?php echo $value['anh'] ?>" width="100px"></td>
                                    </tr>
                                    <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end table -->

            
            
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>