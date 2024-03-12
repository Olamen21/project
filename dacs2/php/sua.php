<?php
    include 'connect.php';
    $id = $_GET['id'];
    $quocgia = mysqli_query($conn, "select * from quocgia" );
    $phanloai = mysqli_query($conn, "select * from phanloai");
    $theloai = mysqli_query($conn, "select * from theloai");
    $daodien = mysqli_query($conn, "select * from daodien");
    $sql = "select * from phim as p , theloai as t, quocgia as q, phanloai as pl, daodien as d where p.matheloai = t.matheloai and p.maquocgia = q.maquocgia and p.maloai = pl.maphanloai and p.maphim = $id and p.madaodien = d.id; ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    
    <title>Edit</title>
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
                    <a href="./phim.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Phim</a>
                    <a href="./user.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Người dùng</a>
                    <a href="./daodien.php" class="nav-link nav-item "><i class="fa fa-laptop me-2"></i>Đạo diễn</a>
                    <a href="./dienvien.php" class="nav-link nav-item "><i class="fa fa-keyboard me-2"></i>Diễn viên</a>
                    <a href="./movie.php" class="nav-link nav-item "><i class="fa fa-table me-2"></i>Movie</a>
                </div>
            </nav>
    </div>
    <!-- Sidebar End -->

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
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
        <!-- end navbar -->

        <!-- Form -->
        <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                    <div class="bg-secondary rounded h-100 p-4">
                   
                            <form action="update.php" method="POST" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="mb-3">
                                   
                                   <img src="../img/<?php echo $row['anh'] ?>" alt="" width="100">
                               </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên phim</label>
                                    <input type="text" class="form-control" id="text" name="name" value="<?php echo $row['tenphim'] ?>">
                                </div>
                                
                                <select name="maloai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="<?php echo $row['maloai'] ?>"><?php echo $row['tenphanloai'] ?></option>
                                <?php foreach($phanloai as $key => $value){ ?>
                                <option value="<?php echo $value['maphanloai'] ?>"><?php echo $value['tenphanloai'] ?></option>
                                <?php } ?>
                                </select>
                                <label for="exampleInputEmail1" class="form-label">Thể loại phim</label>
                                <select name="matheloai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                               
                                <option value="<?php echo $row['matheloai'] ?>" ><?php echo $row['tentheloai'] ?></option>
                                <?php foreach($theloai as $key => $value){ ?>
                                <option value="<?php echo $value['matheloai'] ?>"><?php echo $value['tentheloai'] ?></option>
                                <?php } ?>
                                
                                </select>
                                <div class="input-group">
                                    <span class="input-group-text">Mô tả phim</span>
                                    <textarea name="mota" class="form-control" aria-label="With textarea"><?php echo $row['mota'] ?></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Đạo diễn</label>
                                <select name="madaodien" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                               
                                <option value="<?php echo $row['madaodien'] ?>" ><?php echo $row['ten'] ?></option>
                                <?php foreach($daodien as $key => $value){ ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                                <?php } ?>
                                
                                </select>
                                
                                <label for="exampleInputEmail1" class="form-label">Quốc gia</label>
                                <select name="maquocgia" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                
                                <option value="<?php echo $row['maquocgia'] ?>"><?php echo $row['tenquocgia'] ?></option>
                                <?php foreach($quocgia as $key => $value){ ?>
                                <option value="<?php echo $value['maquocgia'] ?>"><?php echo $value['tenquocgia'] ?></option>
                                <?php } ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>
                    </div>
                    </div>
                </div>
        </div>
        <!-- end form -->

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