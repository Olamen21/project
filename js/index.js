
let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
}
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 15,
    stretch: 0,
    depth: 300,
    modifier: 1,
    slideShadows: true,
  },
  loop: true,
  clickable: true, 

});
swiper.slides.forEach(function (slide, index) {
  slide.addEventListener('click', function () {
    // Slide to the clicked slide
    swiper.slideTo(index);
  });
});

function changeBg(bg,title){
  const banner = document.querySelector('.banner');
  const contents = document.querySelectorAll('.content');
  banner.style.background = `url("../img/${bg}")`;
  banner.style.backgroundSize='cover';
  banner.style.backgroundPosition = 'center';

  contents.forEach(content => {
    content.classList.remove('active');
    if(content.classList.contains(title)){
      content.classList.add('active');
    }
  })
}
var swiper_movie = new Swiper(".movie-slider", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
      delay: 7500,
      disableOnInteraction: false,
  },
  centeredSlides: true,
  breakpoints: {
      0: {
          slidesPerView: 1,
      },
      225:{
        slidesPerView: 1,
      },
      575:{
        slidesPerView: 2,
      },
      840: {
          slidesPerView: 3,
      },
      1200: {
          slidesPerView: 4,
      },
  },
 
  
});