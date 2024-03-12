<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
	<link href="../css/font-awesome.min.css" rel="stylesheet" >
	<link href="../css/global.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Cloud cinema</title>
</head>
<body>
<section id="top">
	<div class="container">
 		<div class="row top_1">
  			<div class="col-md-5">
   				<div class="top_1l pt-1">
    				<h3 class="mb-0"><a class="text-white" href="index.php"><i class="fa-solid fa-cloud-moon fa-2xl" style="color: white;"></i> Cloud Cinema</a></h3>
   				</div>
  			</div>
  			<div class="col-md-5">
   				<div class="top_1m">
           <form action="" method="POST">
           <div class="input-group">
						<input type="text" class="form-control bg-black" placeholder="Tìm kiếm..." name="txtsearch">
						<span class="input-group-btn">
							<button class="btn btn text-white bg_red rounded-0 border-0" name="search" type="button">Tìm kiếm</button>
						</span>
              </form>
    				
					</div>
   				</div>
  			</div>

			  <div class="col-md-1 navbar-nav align-items-center ms-auto">
                   
			  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0 bg-dark">
                            <a href="./login.php" class="dropdown-item">
                              <p>Đăng nhập</p>
                            </a>
                            <a href="./signup.php" class="dropdown-item">
                              <p>Đăng ký</p>
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
    		<a class="navbar-brand text-white fw-bold" href="#"><i class="fa-solid fa-cloud-moon fa-2xl" style="color: white;"></i> Cloud cinema</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav mb-0">
        			<li class="nav-item">
          				<a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        			</li>
					<li class="nav-item">
          				<a class="nav-link" href="#">Phim lẻ</a>
        			</li>
					<li class="nav-item">
         				<a class="nav-link" href="#">Phim bộ</a>
        			</li>
        			<li class="nav-item dropdown">
          				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể loại</a>
          				<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                  <?php 
                        $sql = "SELECT * FROM theloai";
                        $qr = mysqli_query($conn, $sql);

                        while($rows= mysqli_fetch_array($qr)){
                          ?>
                      <li><a class="dropdown-item" href="#"><?php echo $rows['tentheloai']; ?></a></li>
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
                        <li><a class="dropdown-item" href="#"><?php echo $rows['tenquocgia']; ?></a></li>
                        <?php } ?>
          				</ul>
        			</li>
      			</ul>
    		</div>
  		</div>
	</nav>
</section>
  
  <section id="banner" class="banner">
    <div class="content the-little-mermaid-movie active">
      <img src="../img/the-little-mermaid-title.png" alt="" class="movie-title">
      <h4>
        <span>2023</span><span><i>12+</i></span>
        <span>2h 14 phút</span><span>Lãng mạn</span>
      </h4>
      <p>
        Nàng Tiên Cá - The Little Mermaid (2023) Là con gái út của vua thủy tề Triton và cũng là người lì lợm nhất, 
        Ariel mơ ước được khám phá thế giới đất liền. Trong một lần lên trên mặt biển, cô đã nảy sinh tình cảm với hoàng tử điển trai Eric. 
        Do mối quan hệ giữa người cá và con người bị nghiêm cấm, Ariel đã giao kèo với mụ phù thủy biển xấu xa Ursula để có cơ hội lên đất liền mà không biết rằng cô đã đưa mình và ngai vàng của cha mình vào nguy hiểm.
      </p>
    </div>
    <div class="content avatar">
      <img src="../img/avatar_title.png" alt="" class="movie-title">
      <h4>
        <span>2022</span><span><i>13+</i></span>
        <span>3h 12 phút</span><span>Hành động</span>
      </h4>
      <p>
      Avatar 2: Dòng Chảy Của Nước - Avatar 2 (2022) Sau avatar 1 Hai nhân vật chính, Jake Sully và Neytiri, giờ đã thành đôi, nguyện sẽ ở bên nhau. 
      Tuy nhiên, cả hai buộc phải rời khỏi nhà và khám phá những miền đất mới trên mặt trăng Pandora, cũng chính là lúc những mối nguy cũ trở lại với họ.
      </p>
    </div>
    <div class="content elemental">
      <img src="../img/elemental_title.png" alt="" class="movie-title">
      <h4>
        <span>2023</span><span><i>13+</i></span>
        <span>1h 42 phút</span><span>Gia đình - Hoạt hình</span>
      </h4>
      <p>
      Xứ Sở Các Nguyên Tố - Elemental (2023) lấy bối cảnh tại thành phố các các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. 
      Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. 
      Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này.
      </p>
    </div>
    <div class="content the_black_demon">
      <img src="../img/the_black_demon_title.png" alt="" class="movie-title">
      <h4>
        <span>2023</span><span><i>16+</i></span>
        <span>1h 40 phút</span><span>Kinh dị- Hành động</span>
      </h4>
      <p>
      Quái Vật Đen - The Black Demon (2023) Quái Vật Đen xoay quanh câu chuyện khi kỳ nghỉ bình dị của gia đình Oilman Paul Sturges biến thành cơn ác mộng. 
      Bởi họ đã gặp phải một con cá mập Megalodon hung dữ, không từ bất kỳ khoảnh khắc nào để bảo vệ lãnh thổ của mình. 
      Bị mắc kẹt và tấn công liên tục, Paul và gia đình của mình phải tìm cách để an toàn sống sót trở về bờ trước khi con cá mập khát máu này tấn công lần nữa.
      </p>
    </div>
    <div class="content wednesday">
      <img src="../img/wednesday_title.png" alt="" class="movie-title">
      <h4>
        <span>2022</span><span><i>16+</i></span>
        <span>8 tập</span><span>Bí ẩn</span>
      </h4>
      <p>
      Thông minh, hay châm chọc và "chết trong lòng" một chút, 
      Wednesday Addams điều tra một vụ giết người liên hoàn trong khi có thêm bạn và cả kẻ thù mới ở Học viện Nevermore.
      </p>
    </div>
    <div class="content beauty_and_the_beast">
      <img src="../img/beauty_and_the_beast_title.png" alt="" class="movie-title">
      <h4>
        <span>2017</span><span><i>16+</i></span>
        <span>2h 10 phút</span><span>Tình cảm</span>
      </h4>
      <p>
      Phim Người Đẹp Và Quái Vật – Beauty And The Beast 2017: Chuyển thể từ truyện cổ Grimm nổi tiếng, 
      câu chuyện tình lãng mạn giữa một cô gái vùng quê và vị hoàng tử bị dính lời nguyền trở thành quái vật. 
      Vì quá ích kỷ, chàng hoàng tử bị biến thành quái vật, sống trong tòa lâu đài cùng những đồ vật biết nói. 
      Chỉ đến khi nào một cô gái thật lòng yêu, chàng mới trở lại thành người. 
      Nhiều năm đã trôi qua, khi Quái vật gần như tuyệt vọng thì cô gái thông minh Belle xuất hiện.
      </p>
    </div>
    <div class="content it">
      <img src="../img/it2_title.png" alt="" class="movie-title">
      <h4>
        <span>2019</span><span><i>18+</i></span>
        <span>2h 49 phút</span><span>Kinh dị</span>
      </h4>
      <p>
      Gã Hề Ma Quái 2 là một bộ phim thuộc thể loại kinh dị âu mỹ, phim It Chapter Two (Gã Hề Ma Quái 2) vẫn là câu chuyện về những cô cậu bé của nhóm The Losers Club, lúc này đã trưởng thành và đối mặt với vô số vấn đề trong cuộc sống. 
      Chưa dừng lại ở đó, ám ảnh ma hề Pennywise cứ 27 năm lại xuất hiện một lần tại thị trấn Derry buộc 7 cô cậu bé ngày nào phải tiếp tục cuốn vào cuộc chạm trán tiếp theo giữa hai bên thiện và ác. 
      Mặc dù có thể cả nhóm đã trưởng thành và khôn ngoan hơn, cuộc chiến của họ với Pennywise vẫn còn đó những hậu quả bất ngờ, thậm chí khiến một số thành viên phải trải qua đau đớn đến tột cùng.
      </p>
    </div>
    <div class="content maleficent">
      <img src="../img/maleficent_title.png" alt="" class="movie-title">
      <h4>
        <span>2019</span><span><i>15+</i></span>
        <span>1h 58 phút</span><span>Bí ẩn</span>
      </h4>
      <p>
      Thời gian trôi qua thật bình yên với Maleficent và Aurora. 
      Mặc dù mối quan hệ của cả hai được tạo dựng từ những tổn thương, thù hận rồi sau đó mới đến tình yêu thương nhưng cuối cùng thì nó cũng đã đơm hoa kết trái. 
      Tuy vậy, xung đột giữa hai giới: loài người và tiên tộc vẫn vẫn luôn hiện hữu. 
      Cuộc hôn nhân vốn bị trì hoãn giữa Aurora và Hoàng tử Phillips chính là cầu nối gắn kết Vương quốc Ulstead và nước láng giềng Moors lại với nhau. 
      Bất ngờ thay, sự xuất hiện của một phe đồng minh hoàn toàn mới sẽ khiến Maleficent và Aurora bị chia cắt về hai chiến tuyến trong trận Đại Chiến. 
      Trận chiến này sẽ thử thách lòng tin lẫn tình cảm của cả hai. 
      Liệu rằng họ có thật sự trở thành một gia đình hay không? 
      </p>
    </div>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" 
        onclick="changeBg('the_little_mermaid_wallpaper.jpg', 'the-little-mermaid-movie')">
          <img src="../img/the-little-mermaid-movie-poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('avatar_background_.jpg', 'avatar')">
          <img src="../img/avatar_poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('elemental_background_.jpg', 'elemental')">
          <img src="../img/elemental_poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('the_black_demon_background.jpeg', 'the_black_demon')">
          <img src="../img/the_black_demon_poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('wednesday_background.jpg', 'wednesday')">
          <img src="../img/wednesday_poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('beauty_and_the_beast_background.jpg', 'beauty_and_the_beast')">
          <img src="../img/beauty_and_the_beast_poster.jpg" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('it2_background.png', 'it')">
          <img src="../img/it2_poster.png" alt="">
        </div>
        <div class="swiper-slide" onclick="changeBg('maleficent_background.jpg', 'maleficent')">
          <img src="../img/maleficent_poster.jpg" alt="">
        </div>
      </div>
    </div>
      
    
  </section>

 
  <section class="series_movie" id="series_movie">
        <h1 class="heading">Phim bộ nổi bật</h1>
        <div class="swiper movie-slider">
            <div class="swiper-wrapper">
              <?php 
                 $sql = "SELECT * FROM phim WHERE maloai=1";
                 $qr = mysqli_query($conn, $sql);

                 while($rows= mysqli_fetch_array($qr)){
              ?>
                <div class="swiper-slide box">
                    <div class="image">
                        <img src="../img/<?php echo $rows['anh'] ?>" >
                    </div>
                    <i class="fa-solid fa-play fa-2xl play-icon"></i>
                    <h3><?php echo $rows['tenphim']; ?></h3>
                </div>
                <?php } ?>
               
           
                
            </div>
            
        </div>

    </section>
    <section class="all_film" id="all_film">
      <div class="heading">
        <h1 class="left-text">Phim nổi bật</h1>
        <button type="button" class="btn btn-danger right-button">Xem tất cả</button>
      </div>
        <div class="box-container" id="box-container">
          <div class="row">
          <?php 
                 $sql = "SELECT * FROM phim LIMIT 10";
                 $qr = mysqli_query($conn, $sql);

                 while($rows= mysqli_fetch_array($qr)){
              ?>
                <div class="col-sm-3 custom-col">
                  <div class="image">
                    <img src="../img/<?php echo $rows['anh'] ?>" >
                  </div>
                  <i class="fa-solid fa-play fa-2xl play-icon"></i>
                  <h3><?php echo $rows['tenphim']; ?></h3>
                </div>
                <?php } ?>

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
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Phim lẻ</a></li>
            <li><a href="#">Phim bộ</a></li>
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