<?PHP include('../view./header.php')?>


        
<div class="content_details">
  <button class="subbtn" onclick="history.back()">Go Back</button>
  <h1>5 Sapphire Street, Astera, The New World, 00326</h1><br>
  <h2><span>$<?PHP echo $price?></span> Total Price<br>
  <span><?PHP echo $percent?>%</span> Remaining Available<br>
  <span>$<?PHP echo 913?></span> Price Per Share<br>
  <span>42</span> Days on Market<br>
  Seller: Avery Lukestan</h2>
  <form class="buy_form">
  <input type="hidden" name="action" value="buyPercent">
  <input type="text" name="percent" placeholder="Percentage"></input>
  <button type="" class="buybtn">Buy Now</button><br>
  </form>

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 4</div>
    <img src="../view/house_3.jpeg" style="width:100%; max-height:700px">
  </div>
  <div class="mySlides fade">
    <div class="numbertext">2 / 4</div>
    <img src="./interior_1.jpg" style="width:100%; max-height:700px">
  </div>
  <div class="mySlides fade">
    <div class="numbertext">3 / 4</div>
    <img src="./interior_2.jpg" style="width:100%; max-height:700px">
  </div>
  <div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <img src="./interior_3.jpg" style="width:100%; max-height:700px">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>
</div>
</div>


    
<script>
  let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>