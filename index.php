<!DOCTYPE html>
<html lang="en">

<?php
include_once "parts/head.php";
?>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>

<?php
include_once "parts/nav.php";
?>

<!-- Home Section -->

<section id="home" class="main">
     <div class="overlay"></div>
	<div class="container">
		<div class="row">

               <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
                    <img src="images/home-img.png" class="img-responsive" alt="Home">
               </div>

               <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="home-thumb">
                         <h1 class="wow fadeInUp" data-wow-delay="0.6s">App Starter Page</h1>
                         <p class="wow fadeInUp" data-wow-delay="0.8s">The optimal way to present your beautiful mobile app for your startup team. Let us create amazing things!</p>
                         <a href="#pricing" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Download App</a>
                    </div>
               </div>

		</div>
	</div>
</section>


<!-- About Section -->

<section id="about">
     <div class="container">
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="wow bounceIn section-title">
                         <h1>welcome to new app</h1>
                         <hr>
                    </div>
               </div>

               <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                   <h2>Our Mobile App Team</h2>
                   <h3 class="wow fadeInUp" data-wow-delay="0.8s">App Starter page is provided by templatemo that can be used for any site.</h3>
                   <p class="wow fadeInUp" data-wow-delay="0.4s">This is a responsive <a href="https://plus.google.com/+templatemo" target="_blank">HTML CSS template</a> designed for your mobile app pages. You can modify and use it to fit your needs.</p>
               </div>

               <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                    <div class="about-thumb">
                         <img src="images/team-img1.jpg" class="img-responsive" alt="Team">
                              <div class="about-overlay">
                                   <h3>Sandar Lynn</h3>
                                   <h4>UI Designer</h4>
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                   </ul>
                              </div>
                    </div>
               </div>

                <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
                    <div class="about-thumb">
                         <img src="images/team-img2.jpg" class="img-responsive" alt="Team">
                              <div class="about-overlay">
                                   <h3>Candy </h3>
                                   <h4>UX Specialist</h4>
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-pinterest"></a></li>
                                        <li><a href="#" class="fa fa-behance"></a></li>
                                        <li><a href="#" class="fa fa-google-plus"></a></li>
                                   </ul>
                              </div>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Divider Section -->

<section id="divider">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <h2 class="wow fadeInUp" data-wow-delay="0.4s">Praesent tempor nec orci eu condimentum. Vestibulum varius lorem sed odio lacinia, ut efficitur tellus convallis. Phasellus convallis est nisi, sit amet accumsan ipsum elementum quis. Mauris ac sem mi.</h2>
                    <a href="#screenshot" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="0.8s">Learn More</a>
               </div>

          </div>
     </div>
</section>

<!-- Screenshot Section -->
<?php
include_once "parts/screenshot.php";
include_once "parts/pricing.php";
?>

<!-- Newsletter Section -->

<section id="newsletter">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="wow bounceIn section-title">
                         <h2>Subscribe Newsletter</h2>
                         <p class="wow fadeInUp" data-wow-delay="0.5s">Maecenas orci sem, mollis quis risus a, venenatis condimentum felis. Integer ut bibendum ipsum. Etiam a tristique sapien, ut dictum augue.</p>
                    </div>
                    <div class="wow fadeInUp newsletter-form" data-wow-delay="0.8s">
                         <form action="#" method="post">
                              <div class="col-md-8 col-sm-7">
                                   <input name="email" type="email" class="form-control" id="email" placeholder="Your Email here">
                           	  </div>
                              <div class="col-md-4 col-sm-5">
                                   <input name="submit" type="submit" class="form-control" id="submit" value="Send Newsletter">
                              </div>
                         </form>
                    </div>
               </div>

          </div>
     </div>
</section>

<?php
include_once "parts/footer.php";
include_once "parts/modalContact.php";
?>

<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>