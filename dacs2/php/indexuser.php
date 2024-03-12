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
  if(isset($_POST['edit'])){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($user_name=="" | $email=="" | $phone==""){
      echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
    }else{
      $sqlii = "UPDATE users SET user_name='$user_name', email='$email', phone='$phone' WHERE id_user=$id_user";
      $query = mysqli_query($conn, $sqlii);
      header("location: indexuser.php?id_user=$id_user");
    }
  }
  if(isset($_POST['edit_pass'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];
    $sql = "SELECT * FROM users WHERE id_user='$id_user'";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);

    if($old_pass=="" | $new_pass=="" | $new_pass_again==""){
      echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
    }else if($old_pass==$row['pass']){ 
      if($new_pass==$new_pass_again){
        $sqlii = "UPDATE users SET pass='$new_pass' WHERE id_user=$id_user";
        $query = mysqli_query($conn, $sqlii);
        header("location: indexuser.php?id_user=$id_user");
      }else{
        echo "<script>alert('Mật khẩu nhập lại không khớp. Vui lòng nhập lại');</script>";
      }
    }else{
      echo "<script>alert('Mật khẩu hiện tại không đúng. Vui lòng nhập lại');</script>";
     
    }
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
    
    <title>Cloud cinema</title>
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
          				<a class="nav-link active" aria-current="page" href="./indexuser.php?id_user=<?php echo $id_user;?>">Trang chủ</a>
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
  
    <div class="modal fade" id="ModalInf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
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
                  <input type="text" placeholder="Email" name="email" value="<?php echo $line['email']; ?>" pattern="\S+@\S+(\.com|\.vn)" title="Nhập địa chỉ email hợp lệ có đuôi .com hoặc .vn"  required>
                  <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                  <input type="text" placeholder="Phone" name="phone" value="<?php echo $line['phone']; ?>" pattern="0[0-9]{9}" title="Nhập số điện thoại hợp lệ có số 10 số và có số 0 ở đầu" required>
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

  <section class="history_movie" id="history_movie">
        <div class="heading">
            <h1 class="left-text">Phim yêu thích</h1>
            <button class="btn text-white bg_red rounded-0 border-0 right-button"><a href="./history_film.php?id_user=<?php echo $id_user;?>">Xem tất cả</a></button>
        </div>
        <div class="swiper movie-slider">
            <div class="swiper-wrapper">
            <?php 
                 $sql = "SELECT * FROM interesting WHERE id_user=$id_user";
                 $qr = mysqli_query($conn, $sql);

                 while($rows= mysqli_fetch_array($qr)){
                  $maphim=$rows['id_phim'];
                  $sqlhistory = "SELECT * FROM phim WHERE maphim='$maphim'";
                  $qrhistory = mysqli_query($conn, $sqlhistory);
                  while($rowhistory= mysqli_fetch_array($qrhistory)){
              ?>
                <div class="swiper-slide box">
                    <div class="image">
                    <a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rows['id_phim'];?>"><img src="../img/<?php echo $rowhistory['anh']?>" ></a>
                    </div>
                    <i class="fa-solid fa-play fa-2xl play-icon"></i>
                    <h3><?php echo $rowhistory['tenphim']; ?></h3>

                    <?php 
                    $taplonnhat=0;
                    $db = "SELECT * FROM movie WHERE id_phim='$maphim'";
                    $qur = mysqli_query($conn, $db);
                    if($rowhistory['maloai']==1){
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
                <?php } } ?>
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
                  $maphim=$rows['maphim'];
              ?>
                <div class="swiper-slide box">
                    <div class="image">
                    <a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rows['maphim'];?>"><img src="../img/<?php echo $rows['anh']?>" ></a>
                    </div>
                    <i class="fa-solid fa-play fa-2xl play-icon"></i>
                    <h3><?php echo $rows['tenphim']; ?></h3>
                  <?php 
                    $taplonnhat=0;
                    $db = "SELECT * FROM movie WHERE id_phim='$maphim'";
                    $qur = mysqli_query($conn, $db);
                      while($linee = mysqli_fetch_array($qur)){
                        $tapphim = $linee['tập_phim'];
                        if($tapphim>$taplonnhat){
                          $taplonnhat=$tapphim;
                        }}
                        
                  ?>
                  <span>Full (<?php echo $taplonnhat; ?>/<?php echo $taplonnhat; ?>) Vietsub</span>
                
                </div>
                
                <?php }  ?>
                
            </div>
   
        </div>

    </section>
    <section class="all_film" id="all_film">
      <div class="heading">
        <h1 class="left-text">Phim nổi bật</h1>
       
        <button  class="btn text-white bg_red rounded-0 border-0 right-button"> <a href="./allfilm.php?id_user=<?php echo $id_user;?>">Xem tất cả</a></button>
      </div>
       

        <div class="box-container" id="box-container">
        <div class="row">
        <?php 
                 $sql = "SELECT * FROM phim LIMIT 12";
                 $qr = mysqli_query($conn, $sql);

                 while($rows= mysqli_fetch_array($qr)){
                  $maphim=$rows['maphim'];
              ?>
                <div class="col-sm-3 custom-col">
                  <div class="image">
                  <a href="./xemphim.php?id_user=<?php echo $id_user;?>&maphim=<?php echo $rows['maphim'];?>"><img src="../img/<?php echo $rows['anh']?>" ></a>
                  </div>
                  <i class="fa-solid fa-play fa-2xl play-icon"></i>
                  <h3><?php echo $rows['tenphim']; ?></h3>
                  <?php 
                    $taplonnhat=0;
                    $db = "SELECT * FROM movie WHERE id_phim='$maphim'";
                    $qur = mysqli_query($conn, $db);
                    if($rows['maloai']==1){
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