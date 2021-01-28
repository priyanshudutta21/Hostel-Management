<!DOCTYPE html>
<html>
<title>HMS SYSTEM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}

#image1{
    background-size: cover;
    width: 100%;
    max-height: 720px;
}
#logo{
    position: relative;
    transform: translate(-50%);
    left: 50%;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top ">
  <div class="w3-row w3-large w3-light-grey py-3">
    <div class="w3-col s2">
        
      <a href="#" class="w3-button w3-block"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
    </div>

    <div class="w3-col s2">
      <a href="#plans" class="w3-button w3-block">Rooms Pricing</a>
    </div>
    <div class="w3-col s2">
      <a href="#about" class="w3-button w3-block">About Us</a>
    </div>
    <div class="w3-col s2">
        <a href="#features" class="w3-button w3-block">Why US ?</a>
  
      </div>
    <div class="w3-col s2">
      <a href="#contact" class="w3-button w3-block">Contact Us</a>

    </div>
    <div class="w3-col s2">
        <a href="admin/login.php" class="w3-button w3-block">Login</a>
      </div>
    
    </div>
  </div>
</div>

<div class="w3-content" style="max-width:100%;margin-top:80px;margin-bottom:80px">
    
  <div class="w3-panel ">
    <!-- <h1 class="text-center align-center text-dark">L&C Boys Hostel</h1> -->
    <img id="logo" src="./images/logo.png" alt="" srcset="">
  </div>

  <!-- Slideshow -->
  <div class="w3-container" style="width:100%;">
    <div class="w3-display-container mySlides">
      <img src="./images/joanna-kosinska-7ACuHoezUYk-unsplash.jpg" id="image1">
      
    </div>
    <div class="w3-display-container mySlides">
      <img src="./images/nicate-lee-kT-ZyaiwBe0-unsplash1.jpg" style="width:100%">
     
    </div>
    <div class="w3-display-container mySlides">
      <img src="./images/norelyn-asupan-pcGg8xu132I-unsplash.jpg" style="width:100%">
      <div class="w3-display-topright w3-container w3-padding-32">
      </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
      <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
      <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>
    
      <div class="w3-center">
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

  
  <!-- Grid -->
  <div class="w3-row w3-container" id ="features">
    <div class="w3-center w3-padding-64">
      <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Why Us?</span>
    </div>
    <div class="w3-col l3 m6 w3-light-grey w3-container w3-padding-16">
      <h3>24*7 Electricity</h3>
      
    </div>

    <div class="w3-col l3 m6 w3-grey w3-container w3-padding-16">
      <h3>24*7 Water supply</h3>
     
    </div>

    <div class="w3-col l3 m6 w3-dark-grey w3-container w3-padding-16">
      <h3>Wifi facility</h3>
     
    </div>

    <div class="w3-col l3 m6 w3-black w3-container w3-padding-16">
      <h3>Low cost</h3>
    
    </div>
  </div>

  <!-- Grid 
  <div class="w3-row-padding" id="plans">
    <div class="w3-center w3-padding-64">
      <h3>Pricing Plans</h3>
      <p>Choose a pricing plan that fits your needs.</p>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
          <li class="w3-black w3-xlarge w3-padding-32">Single Room</li>
          
          <li class="w3-padding-16">
            <h2 class="w3-wide">₹ 7000</h2>
            <span class="w3-opacity">per month</span>
          </li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-green w3-padding-large">Call Us</button>
          </li>
        </ul>
      </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow">
        <li class="w3-dark-grey w3-xlarge w3-padding-32">Double Room</li>
      
        <li class="w3-padding-16">
          <h2 class="w3-wide">₹ 3500</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large">Call us</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Triple Room</li>
        
        <li class="w3-padding-16">
          <h2 class="w3-wide">₹ 2500</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large">Call Us</button>
        </li>
      </ul>
    </div>
  </div> -->

<<<<<<< HEAD:indexold.php
  <div class="w3-center w3-padding-64" id="about">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">About Us</span>
    <p>Me and my brother, the both of us built this place, a place we call home.
    We had ideas of having an environment which allows anyone and everyone to be able to work while also having an atmosphere which is relaxing and calm. The common area is large, this allows us to make events which customers are welcome to partake in, such as games and movie nights. We designed the area to completely open, allowing fresh air to breezes through and being a bit in touch with some nature.
    Located on a quiet street, having convenient stores and a bakery close by, while not being too distant from the more populated areas as the Fisherman’s Village and having a fresh Thai local market right across the street.
    What does us mean to us?
    You, me and everyone creating and sharing enjoyable moments that develops in Us Hostel, so it can be a memory that will not be forgotten. Like family.
   </p>
  </div>
=======
>>>>>>> 0a3350fbe9f38a6a6b4c0989a683adf93ebda2ae:index.php
 

  <!-- Contact -->
  <div class="w3-center w3-padding-64" id="contact">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Contact Us</span>
  </div>

  <form class="w3-container" action="/action_page.php" target="_blank">
    <div class="w3-section">
      <label>Name</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
    </div>
    <div class="w3-section">
      <label>Subject</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black">Send</button>
  </form>

</div>

<!-- Footer -->

<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
    <h4>L&C Hostels</h4>
  <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Created by Prafulla Saikia & Paribhraj Bordoloi</p>
</footer>


<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
