<?php
include("index1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
    <div class="sub">
    	
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="565097.jpg" height="480px" width="1024px">
  <div class="text">Stay Healthy</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="7.jpg"  height="480px" width="1024px">
  <div class="text">Donate Blood</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="1_world_blood_donor_day.jpg" height="480px" width="1024px">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<div><p>Blood donation is a major concern to the society as donated blood is lifesaving for individuals who need it. Blood is scarce. There is a shortage to active blood donors to meet the need of increased blood demand. Blood donation as a therapeutic exercise. Globally, approximately 80 million units of blood are donated each year. One of the biggest challenges to blood safety particularly is accessing safe and adequate quantities of blood and blood products. Safe supply of blood and blood components is essential, to enable a wide range of critical care procedures to be carried out in hospitals. Good knowledge about blood donation practices is not transforming in donating blood. Interactive awareness on blood donation should be organized to create awareness and opportunities for blood donation. Blood donation could be therefore recommended that voluntary blood donations as often as possible may be therapeutically beneficial to the donors in terms of thrombotic complications and efficient blood flow mechanisms. This is also a plus for blood donation campaigns.</p></div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000);
}
</script>
    </div>

</body>
</html>