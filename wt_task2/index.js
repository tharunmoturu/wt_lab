let slideIndex = 0;
let autoSlideInterval;
const slidesWrapper = document.querySelector(".slides-container");
const slides = document.getElementsByClassName("mySlides");
const dots = document.getElementsByClassName("dot");
if (slidesWrapper) {
  showSlides(slideIndex);
  startAutoSlide();
}
const plusSlides = (n)=> {
  slideIndex += n;
  showSlides(slideIndex);
  resetAutoSlide();
}
function currentSlide(n) {
  slideIndex = n - 1;
  showSlides(slideIndex);
  resetAutoSlide();
}
function showSlides(n) {
  if (n >= slides.length) slideIndex = 0;
  if (n < 0) slideIndex = slides.length - 1;
slidesWrapper.style.transform = `translateX(-${slideIndex * 100}%)`;
for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }
  dots[slideIndex].classList.add("active");
}
function startAutoSlide() {
  autoSlideInterval = setInterval(() => {
    slideIndex++;
 showSlides(slideIndex);
  }, 3000);
}
function resetAutoSlide() {
  clearInterval(autoSlideInterval);
  startAutoSlide();
}
(function(){
  alert("Welcome to FreeLanceHub! Carefully read the T&C");
})();
function goToSignin() {
  window.location.href = "signin_page.html"
}
function goToSignup() {
  window.location.href = "signup_page.html"
}
