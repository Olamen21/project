<?php
    session_start();
    include 'connect.php';
    $quocgia = mysqli_query($conn, "select * from quocgia" );
    $phanloai = mysqli_query($conn, "select * from phanloai");
    $theloai = mysqli_query($conn, "select * from theloai");
    $daodien = mysqli_query($conn, "select * from daodien");
    $dienvien = mysqli_query($conn,"select *from dienvien");
    $role = mysqli_query($conn,"select * from role");
    if(isset($_POST['name'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        if(isset($_FILES['anh'])) {
            $anh = $_FILES['anh'];
            $ten_anh = $anh['name'] ;
            move_uploaded_file($anh['tmp_name'],"../img/".$ten_anh);
           
            $background = $_FILES['background'];
            $background_name = $background['name'] ;
            move_uploaded_file($background['tmp_name'],"../img/".$background_name);

            $trailer = $_FILES['trailer'];
            $trailer_name = $trailer['name'] ;
            move_uploaded_file($trailer['tmp_name'],"../trailer/".$trailer_name);
            
        }
        $maloai = $_POST['maloai'];
        $matheloai = $_POST['matheloai'];
        $mota = $_POST['mota'];
        $madaodien = $_POST['madaodien'];
   
        $maquocgia = $_POST['maquocgia'];

        $sql = "INSERT INTO phim(maphim,tenphim,anh,background,maloai,matheloai,mota,madaodien,trailer,maquocgia) VALUES
            ('$id','$name','$ten_anh','$background_name','$maloai','$matheloai','$mota','$madaodien','$trailer_name','$maquocgia')";
        
        
    $query = mysqli_query($conn,$sql);
    
    
    }

    $phim = mysqli_query($conn, "select * from phim as p , theloai as t, quocgia as q where p.matheloai = t.matheloai and p.maquocgia = q.maquocgia;");

    $user = mysqli_query($conn, "select * from users");
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
    
    <title>Admin</title>
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
                    <a href="./index_admin.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./phim.php" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Phim</a>
                    <a href="./user.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Người dùng</a>
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

            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <!-- table cinema -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Phim </h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã phim</th>
                                        <th scope="col">Tên phim</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Quốc gia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($phim as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $value['maphim'] ?></th>
                                        <td><?php echo $value['tenphim'] ?></td>
                                        <td><?php echo $value['tentheloai'] ?></td>
                                        <td><?php echo $value['tenquocgia'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end table cinema-->

                    <!-- table user -->
                    <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Người dùng </h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã người dùng</th>
                                        <th scope="col">Tên người dùng</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($user as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $value['id_user'] ?></th>
                                        <td><?php echo $value['user_name'] ?></td>
                                        <td><?php echo $value['phone'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                    </div>
                    <!--  end table user-->
                </div>

            </div>
           
            <!-- form  phim-->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <!-- Phim -->
                    <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Thêm phim</h6>
                            <form action="" method="POST" role="form" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Mã phim</label>
                                    <input type="text" class="form-control" id="text" name="id">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Background</label>
                                    <input type="file" class="form-control" id="text" name="background">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Ảnh</label>
                                    <input type="file" class="form-control" id="text" name="anh">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên phim</label>
                                    <input type="text" class="form-control" id="text" name="name">
                                </div>
                                <select name="maloai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <?php foreach($phanloai as $key => $value){ ?>
                                <option value="<?php echo $value['maphanloai'] ?>"><?php echo $value['tenphanloai'] ?></option>
                                <?php } ?>
                                </select>
                                <label for="exampleInputEmail1" class="form-label">Thể loại phim</label>
                                <select name="matheloai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <?php foreach($theloai as $key => $value){ ?>
                                <option value="<?php echo $value['matheloai'] ?>"><?php echo $value['tentheloai'] ?></option>
                                <?php } ?>
                                </select>
                                <div class="input-group">
                                    <span class="input-group-text">Mô tả phim</span>
                                    <textarea name="mota" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Đạo diễn</label>
                                <select name="madaodien" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <?php foreach($daodien as $key => $value){ ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                                <?php } ?>
                                </select>
                                
                                <div class="mb-3">
                                    <label class="form-label">Trailer</label>
                                    <input type="file" class="form-control" id="text" name="trailer">
                                </div>
                                <label for="exampleInputEmail1" class="form-label">Quốc gia</label>
                                <select name="maquocgia" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <?php foreach($quocgia as $key => $value){ ?>
                                <option value="<?php echo $value['maquocgia'] ?>"><?php echo $value['tenquocgia'] ?></option>
                                <?php } ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                    </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <form action="phim_dienvien.php" method="post">
                                <label for="" class="form-label">Phim</label>
                                <select name="maphim" class="form-select form-select-lg-mb-3" aria-label=".form-select-lg example" id="">
                                <?php foreach($phim as $key => $value) { ?>
                                    <option value="<?php echo $value['maphim'] ?>"><?php echo $value['tenphim'] ?></option>
                                <?php } ?>
                                </select>
                                <label for="" class="form-label">Diễn viên</label>
                                <select name="madienvien" class="form-select form-select-lg-mb-3" aria-label=".form-select-lg example" id="">
                                <?php foreach($dienvien as $key => $value){ ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                                <?php } ?>
                                </select>
                                <label for="" class="form-label">Vai diễn</label>
                                <select name="mavaidien" class="form-select form-select-lg-mb-3" aria-label=".form-select-lg exampke" id="">
                                <?php foreach($role as $key => $value){ ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                                <?php } ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </div>

                    
                </div>

            </div>
            
            <!-- end form  -->
            
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