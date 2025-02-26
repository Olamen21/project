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
  if(isset($_GET['maphim'])){
    $maphim = $_GET['maphim'];
    $sqll = "SELECT * FROM phim WHERE maphim='$maphim'";
    $query = mysqli_query($conn, $sqll);
    $row = mysqli_fetch_array($query);
	$matheloai = $row['matheloai'];
	$maquocgia = $row['maquocgia'];
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
  if(isset($_POST['watch'])){
	
	$sqladd = "INSERT INTO interesting (id_user, id_phim) VALUES ('$id_user', '$maphim')";
	$qrhadd = mysqli_query($conn, $sqladd);
	echo "<script>alert('Thêm vào phim yêu thích thành công.');</script>";
  }
  if(isset($_POST['nowatch'])){
	
	$sqldelete = "DELETE FROM interesting  WHERE id_phim='$maphim'";
	$qrdelete = mysqli_query($conn, $sqldelete);
	echo "<script>alert('Đã xóa khỏi phim yêu thích.');</script>";
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cloud cinema</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" >
	<link href="../css/font-awesome.min.css" rel="stylesheet" >
	<link href="../css/global.css" rel="stylesheet">
	<link href="../css/xemphim.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">	
	
	<script src="../js/bootstrap.bundle.min.js"></script>
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

          
          

<section id="center" class="center_home">
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
    		<div class="carousel-item active">
				<img src="../img/<?php echo $row['background']?>" class="d-block w-100" alt="...">
      			<div class="carousel-caption d-md-block">
       				<h1 class="font_60"> <?php echo $row['tenphim']; ?></h1>
					<form action="" method="POST">
	   				<h6 class="mt-3">
						
		 				4.5 (Imdb)      Năm : 2022
						<?php 
							if($row['maloai']==2){
								$sql = "SELECT * FROM movie WHERE id_phim='$maphim'";
								$qr = mysqli_query($conn, $sql);
								while($rows = mysqli_fetch_array($qr)){
								?>
								<a class="bg_red p-2 pe-4 ps-4 ms-3 text-white d-inline-block" href="../video/<?php echo $row['trailer'] ?>" > Xem phim</a>
							<?php } } else {
							?>
							
							<a class="bg_red p-2 pe-4 ps-4 ms-3 text-white d-inline-block" data-bs-toggle="modal" data-bs-target="#myModal">Xem phim</a>
						<!-- The Modal -->
						<div class="modal" id="myModal">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Chọn tập</h4>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<div class="row">
										<?php 
											$sql = "SELECT * FROM movie WHERE id_phim='$maphim'";
											$qr = mysqli_query($conn, $sql);
											while($rows = mysqli_fetch_array($qr)){
										?>
										<div class="col-sm-1">
											<a class="button"  href="../video/<?php echo $rows['link'] ?>"><?php echo $rows['tập_phim']; ?></a>
										</div>
										<?php } ?>
										</div>
									
										<!-- <table>
											<tr>
												
												<td><a class="button"  href="../video/<?php echo $rows['link'] ?>"><?php echo $rows['tập_phim']; ?></a></td>
												
											</tr>
					
										</table> -->
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
									</div>

								</div>
							</div>
						</div>
						
						<?php
					}
						?>
						<?php 
							$sqlCountInterest = "SELECT COUNT(*) AS interestCount FROM interesting WHERE id_phim='$maphim'";
							$qrCountInterest = mysqli_query($conn, $sqlCountInterest);
							$rowCountInterest = mysqli_fetch_assoc($qrCountInterest);
							
							
							$interestCount = $rowCountInterest['interestCount'];
							
							if($interestCount==0){
								?>
								<button name="watch" class="button "><i class="fa-solid fa-bookmark"></i></i></i><b> Thêm vào yêu thích</b></button>
							 <?php } else { 
							
							
							$sqladdinterest = "SELECT * FROM interesting WHERE id_phim='$maphim'";
							$qraddinterest = mysqli_query($conn, $sqladdinterest);
							$rowaddinterest = mysqli_fetch_array($qraddinterest);
							if($rowaddinterest['id_phim']==$maphim){
						?>
							<button name="nowatch" class="button "><i class="fa-regular fa-bookmark"></i></i></i><b> Bỏ yêu thích</b></button>
						<?php } else{ ?>
							<button name="watch" class="button "><i class="fa-solid fa-bookmark"></i></i></i><b> Thêm vào yêu thích</b></button>
						<?php } } ?>
			
						
	   				</h6>
					   </form>
	   				<p class="mt-3"><?php echo $row['mota']; ?></p>

					<!-- daodien -->
					<?php
						$madaodien = $row['madaodien'];
						$sql = "SELECT * FROM daodien WHERE id='$madaodien'";
						$qr = mysqli_query($conn, $sql);
						while($rows = mysqli_fetch_array($qr)){
					?>
	   				<p class="mb-2"><span class="col_red me-1 fw-bold">Đạo diễn:</span> <?php echo $rows['ten'];?></p>
					<?php } ?>

					<!-- dienvien -->
					<p class="mb-2">
						<span class="col_red me-1 fw-bold">Diễn viên:</span>
						<?php
							$sql = "SELECT * FROM phim_dienvien WHERE id_phim='$maphim'";
							$qr = mysqli_query($conn, $sql);
							while($rows = mysqli_fetch_array($qr)){
								$role = $rows['role'];
								$madienvien = $rows['id_dienvien'];
								$db = "SELECT * FROM dienvien WHERE id='$madienvien'";
								$querry = mysqli_query($conn, $db);
								while($linee = mysqli_fetch_array($querry)){
									
									$sqlrole = "SELECT * FROM role WHERE id='$role'";
									$qrrole = mysqli_query($conn, $sqlrole);
									while($rowrole = mysqli_fetch_array($qrrole)){
						?>
	   				 	<?php echo $linee['ten'];?> (<?php echo $rowrole['ten'] ?>), 
					<?php }}} ?>
					</p>

					<!-- theloai -->
					   <?php
						$matheloai = $row['matheloai'];
						$sql = "SELECT * FROM theloai WHERE matheloai='$matheloai'";
						$qr = mysqli_query($conn, $sql);
						while($rows = mysqli_fetch_array($qr)){
					?>
					   <p class="mb-2"><span class="col_red me-1 fw-bold">Thể loại:</span> <?php echo $rows['tentheloai']; ?></p>
					   <?php } ?>

					   <!-- thoigian -->
					   <?php 
					   		$taplonnhat=0;
							$sql = "SELECT * FROM movie WHERE id_phim='$maphim'";
							$qr = mysqli_query($conn, $sql);
							if($row['maloai']==1){
								while($rows = mysqli_fetch_array($qr)){
									$tapphim = $rows['tập_phim'];
									if($tapphim>$taplonnhat){
										$taplonnhat=$tapphim;
									}}
						?>
						<p><span class="col_red me-1 fw-bold">Tập phim: </span><?php echo $taplonnhat ?></p>
						<?php } else {
							while($rows = mysqli_fetch_array($qr)){
						?>
						<p><span class="col_red me-1 fw-bold">Thời gian: </span> <?php echo $rows['thoigian']; ?></p>	
							<?php }} ?>
							 
	   				
	   				<h6 class="mt-4"><a class="button"  href="../trailer/<?php echo $row['trailer'] ?>"><i class="fa fa-play-circle align-middle me-1"></i> Xem trailer</a></h6>
      			</div>
    		</div>
  		</div>
	</div>
</section>

<section id="trend" class="pt-4 pb-5">
	<div class="container">
 		<div class="row trend_1">
  			<div class="col-md-6 col-6">
   				<div class="trend_1l">
    				<h4 class="mb-0"><i class="fa-brands fa-youtube"></i><span class="col_red">Phim</span> tương tự</h4>
   				</div>
  			</div>
 		</div>
 		<div class="row trend_2 mt-4">
   			<div id="carouselExampleCaptions1" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
				</div>
				<div class="carousel-inner">
    				<div class="carousel-item active">
      					<div class="trend_2i row">
						  <?php 
							$sql = "SELECT * FROM phim WHERE matheloai='$matheloai' AND maphim!='$maphim' LIMIT 4 ";
							$qr = mysqli_query($conn, $sql);

							while($rows= mysqli_fetch_array($qr)){
						?>
							<div class="col-md-3 col-6">
		  						<div class="trend_2im clearfix position-relative">
		   							<div class="trend_2im1 clearfix">
		     							<div class="grid">
											<figure class="effect-jazz mb-0">
												<a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rows['maphim'];?>"><img src="../img/<?php echo $rows['anh']?>" class="w-100" alt="img25"></a>
											</figure>
	  									</div>
		   							</div>
									<div class="trend_2im2 clearfix text-center position-absolute w-100 top-0">
										<span class="fs-1"><a class="col_red" href="#"><i class="fa-brands fa-youtube"></i></a></span>
									</div>
		  						</div>
								<div class="trend_2ilast bg_grey p-3 clearfix">
									<h5><a class="col_red" href="#"><?php echo $rows['tenphim']; ?></a></h5>
									<p class="mb-2"></p>
								</div>  
							</div>
							
							<?php } ?>
	    					
						
					</div>
				</div>
				<div class="carousel-item">
					<div class="trend_2i row">
					<?php 
							$sql = "SELECT * FROM phim WHERE maquocgia='$maquocgia' AND maphim!='$maphim' LIMIT 4 ";
							$qr = mysqli_query($conn, $sql);

							while($rows= mysqli_fetch_array($qr)){
						?>
							<div class="col-md-3 col-6">
		  						<div class="trend_2im clearfix position-relative">
		   							<div class="trend_2im1 clearfix">
		     							<div class="grid">
											<figure class="effect-jazz mb-0">
												<a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rows['maphim'];?>"><img src="../img/<?php echo $rows['anh']?>" class="w-100" alt="img25"></a>
											</figure>
	  									</div>
		   							</div>
									<div class="trend_2im2 clearfix text-center position-absolute w-100 top-0">
										<span class="fs-1"><a class="col_red" href="#"><i class="fa-brands fa-youtube"></i></a></span>
									</div>
		  						</div>
								<div class="trend_2ilast bg_grey p-3 clearfix">
									<h5><a class="col_red" href="#"><?php echo $rows['tenphim']; ?></a></h5>
									
								</div>  
							</div>
							
							<?php } ?>
	    					
					</div>
				</div> 
  			</div>
		</div>
	</div>
	</div>
</section>


<script>
window.onscroll = function() {myFunction()};

var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;

function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}
</script>
</body>
</html>