<?php
  include 'connect.php';
?>
<?php 
 if(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $sqli = "SELECT * FROM users WHERE id_user='$id_user'";
    $qrr = mysqli_query($conn, $sqli);
    $line = mysqli_fetch_array($qrr);
  }
  if(isset($_GET['txtsearch'])){
    $txtsearch = $_GET['txtsearch'];
  }
  if(isset($_POST['search'])){
    $txtsearch = $_POST['txtsearch'];
    $sql = "SELECT * FROM phim WHERE tenphim LIKE '%$txtsearch%'";
    $qr = mysqli_query($conn, $sql);

    $rows= mysqli_fetch_array($qr);
    
    if($txtsearch==""){
      echo "<script>alert('Vui lòng nhập vào thanh tìm kiếm để tìm.');</script>";
    }else if($rows<=0){
      $sqldv = "SELECT * FROM dienvien WHERE ten LIKE '%$txtsearch%'";
      $qrdv = mysqli_query($conn, $sqldv);
      $rowdv = mysqli_fetch_array($qrdv);
      if($rowdv<=0){
        echo "<script>alert('Không có phim hoặc diễn viên bạn cần tìm');</script>";
      }else{
        header("location: searchdv.php?id_user=$id_user&txtsearch=$txtsearch");
      }
      
    }else{
      header("location: search.php?id_user=$id_user&txtsearch=$txtsearch");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
	<link href="../css/font-awesome.min.css" rel="stylesheet" >
	<link href="../css/global.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
    
    <title>Tất cả phim</title>
</head>
<body>
<section id="top">
	<div class="container">
 		<div class="row top_1">
  			<div class="col-md-5">
   				<div class="top_1l pt-1">
    				<h3 class="mb-0"><a class="text-white" href="./indexuser.php?id_user=<?php echo $id_user;?>"><i class="fa-solid fa-cloud-moon fa-2xl" style="color: white;"></i> Cloud Cinema</a></h3>
   				</div>
  			</div>
  			<div class="col-md-5">
   				<div class="top_1m">
           <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control bg-black" placeholder="Tìm kiếm..." name="txtsearch">
              <span class="input-group-btn">
                <button class="btn btn text-white bg_red rounded-0 border-0" name="search" >Tìm kiếm</button>
              </span>
              </form>
    				
					</div>
   				</div>
  			</div>

			  <div class="col-md-1 navbar-nav align-items-center ms-auto">
                   
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
              <span class="d-none d-lg-inline-flex"><?php echo $line['user_name']; ?></span>
            </a>
              <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0 bg-dark">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalInf">
                  <p>Thông tin tài khoản</p>
                </a>
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalEdit">
                  <p>Chỉnh sửa thông tin </p>
                </a>
                <a  href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalPass">
                  <p>Đổi mật khẩu</p>
                </a>
                <a href="./interesting.php?id_user=<?php echo $id_user;?>" class="dropdown-item">
                  <p>Phim yêu thích</p>
                </a>
                <a href="./index.php" class="dropdown-item">
                  <p>Đăng xuất</p>
                </a>
              </div>
          </div>
        </div>
 		</div>
	</div>
</section>

<section id="header">
	<nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
  		<div class="container">
    		<a class="navbar-brand text-white fw-bold" href="./indexuser.php?id_user=<?php echo $id_user;?>"><i class="fa-solid fa-cloud-moon fa-2xl" style="color: white;"></i> Cloud cinema</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav mb-0">
        			<li class="nav-item">
          				<a class="nav-link" aria-current="page" href="./indexuser.php?id_user=<?php echo $id_user;?>">Trang chủ</a>
        			</li>
					<li class="nav-item">
          				<a class="nav-link" href="./feature_film.php?id_user=<?php echo $id_user;?>">Phim lẻ</a>
        			</li>
					<li class="nav-item">
         				<a class="nav-link" href="./series_movie.php?id_user=<?php echo $id_user;?>">Phim bộ</a>
        			</li>
        			<li class="nav-item dropdown">
          				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể loại</a>
          				<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                  <?php 
                        $sql = "SELECT * FROM theloai";
                        $qr = mysqli_query($conn, $sql);

                        while($rows= mysqli_fetch_array($qr)){
                          ?>
                      <li><a class="dropdown-item" href="./type_film.php?id_user=<?php echo $id_user;?>&matheloai=<?php echo $rows['matheloai'];?>"><?php echo $rows['tentheloai']; ?></a></li>
                      <?php } ?>
         			 	</ul>
        			</li>
					<li class="nav-item dropdown">
          				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quốc gia</a>
          				<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                  <?php 
                        $sql = "SELECT * FROM quocgia";
                        $qr = mysqli_query($conn, $sql);

                        while($rows= mysqli_fetch_array($qr)){
                          ?>
                        <li><a class="dropdown-item" href="./nation_film.php?id_user=<?php echo $id_user;?>&maquocgia=<?php echo $rows['maquocgia'];?>"><?php echo $rows['tenquocgia']; ?></a></li>
                        <?php } ?>
          				</ul>
        			</li>
      			</ul>
    		</div>
  		</div>
	</nav>
</section>
    <div class="modal fade" id="ModalInf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST">
              <div class="input-box">
                  <input type="text" placeholder="Username" name="user_name" value="<?php echo $line['user_name']; ?>" required>
                  <i class="fa-solid fa-user"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Email" name="email" value="<?php echo $line['email']; ?>" required>
                  <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Phone" name="phone" value="<?php echo $line['phone']; ?>" required>
                  <i class="fa-solid fa-phone"></i>
              </div>
            </form>
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST" action="">
              <div class="input-box">
                  <input type="text" placeholder="Username" name="user_name" value="<?php echo $line['user_name']; ?>" required>
                  <i class="fa-solid fa-user"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Email" name="email" value="<?php echo $line['email']; ?>" required>
                  <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Phone" name="phone" value="<?php echo $line['phone']; ?>" required>
                  <i class="fa-solid fa-phone"></i>
              </div>
           
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" name="edit">Lưu thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title text-center" id="exampleModalLabel">Đổi mật khẩu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="POST" action="">
              <div class="input-box">
                  <input type="password" placeholder="Nhập mật khẩu hiện tại" name="old_pass" required>
                  <i class="fa-solid fa-lock"></i>
              </div>
              <div class="input-box">
                  <input type="password" placeholder="Nhập mật khẩu mới" name="new_pass"  required>
                  <i class="fa-solid fa-lock"></i>
              </div>
              <div class="input-box">
                  <input type="password" placeholder="Nhập lại mật khẩu mới" name="new_pass_again"  required>
                  <i class="fa-solid fa-lock"></i>
              </div>
           
          </div>
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" name="edit_pass">Lưu thông tin</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <section class="all_film" id="all_film">
      
        <h1 class="heading">Phim có diễn viên cần tìm</h1>
        <hr>
      
       

        <div class="box-container" id="box-container">
        <div class="row">
        <?php 
                 $sql = "SELECT * FROM dienvien WHERE ten LIKE '%$txtsearch%'";
                 $qr = mysqli_query($conn, $sql);

                 $rows= mysqli_fetch_array($qr);
                 $id = $rows['id'];

                 $dbphim = "SELECT * FROM phim_dienvien WHERE id_dienvien='$id'";
                 $qrphim = mysqli_query($conn, $dbphim);
                 while($rowphim = mysqli_fetch_array($qrphim)){
                    $maphim=$rowphim['id_phim'];
                    $dbphimdv = "SELECT * FROM phim WHERE maphim='$maphim'";
                    $qrphimdv = mysqli_query($conn, $dbphimdv);
                    while($rowphimdv = mysqli_fetch_array($qrphimdv)){
              ?>
                <div class="col-sm-3 custom-col">
                  <div class="image">
                  <a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rowphimdv['maphim'];?>"><img src="../img/<?php echo $rowphimdv['anh']?>" ></a>
                  </div>
                  <i class="fa-solid fa-play fa-2xl play-icon"></i>
                  <h3><?php echo $rowphimdv['tenphim']; ?></h3>
                  <?php 
                    $taplonnhat=0;
                    $db = "SELECT * FROM movie WHERE id_phim='$maphim'";
                    $qur = mysqli_query($conn, $db);
                    if($rowphimdv['maloai']==1){
                      while($linee = mysqli_fetch_array($qur)){
                        $tapphim = $linee['tập_phim'];
                        if($tapphim>$taplonnhat){
                          $taplonnhat=$tapphim;
                        }}
                  ?>
                  <span>Full (<?php echo $taplonnhat; ?>/<?php echo $taplonnhat; ?>) Vietsub</span>
                  <?php } else {
                    while($linee = mysqli_fetch_array($qur)){
                  ?>
                  <span>Thời gian: <?php echo $linee['thoigian']; ?></span>
                    <?php }} ?>
                      </div>
                <?php }} ?>
        </div>

          </div>
        
   
  </section>
  <section id="footer">
    <nav class="bg-dark">
      <div class="footer_info">
        <div class="footer_width about">
          <h5>
            <a class="navbar-brand" href="index.php">
              <i class="fa-solid fa-cloud-moon fa-2xl" style="color: white;"></i>
              <b>Cloud Cinema</b>
            </a>
          </h5>
          <p>
              Trang web xem phim số 1 với thư viện đa dạng. 
              Trải nghiệm phim chất lượng vượt trội và dễ sử dụng. 
              Khám phá thế giới điện ảnh tại đây!
          </p>
          <div class="social-media">
            <ul>
              <li><a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="footer_width link">
          <b>Liên kết nhanh</b>
          <ul>
            <li><a href="./indexuser.php?id_user=<?php echo $id_user;?>">Trang chủ</a></li>
            <li><a href="./feature_film.php?id_user=<?php echo $id_user;?>">Phim lẻ</a></li>
            <li><a href="./series_movie.php?id_user=<?php echo $id_user;?>">Phim bộ</a></li>
          </ul>
    </div>
    <div class="footer_width Contact">
      <b>Liên hệ</b>
      <ul>
        <li>
          <span><i class="fa-solid fa-location-dot"></i></span>
          <p>
            Trường đại học Công nghệ thông tin và Truyền thông Việt-Hàn
          </p>
        </li>
        <li>
          <span><i class="fa-solid fa-envelope"></i></span>
          <p>
            nganttt.22ite@vku.udn.vn <br>
            thuyht.22ite@vku.udn.vn
          </p>
        </li>
        <li>
          <span><i class="fa-solid fa-phone-volume"></i></span>
          <p>
            09xxxxxxxxx
          </p>
        </li>
      </ul>
    </div>
      </div>
    </nav>
    
  </section>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
<script src="../js/index.js"></script>
</body>
</html>