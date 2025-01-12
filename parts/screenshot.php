<?php
include_once "classes/ImageLoader.php";
use classes\ImageLoader;
$imageLoader = new ImageLoader();
?>
<section id="screenshot">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <div class="section-title">
                         <h1>App Screenshots</h1>
                         <p class="wow fadeInUp" data-wow-delay="0.8s">Nulla nisi purus, ultrices et scelerisque at, ullamcorper et ex. Phasellus at nisi lobortis, semper tortor sed, gravida neque.</p>
                    </div>
               </div>

               <!-- Screenshot Owl Carousel -->
               <div id="screenshot-carousel" class="owl-carousel">
               <?php echo $imageLoader->loadImages(); ?>
               </div>

          </div>
     </div>
</section>