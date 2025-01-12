<?php
include_once "classes/Pricing.php";
use classes\Pricing;
$pricing = new Pricing();
?>
<section id="pricing">
     <div class="container">
          <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                         <h1>App Pricing</h1>
                         <hr>
                    </div>
               </div>
               <?php echo $pricing->getPricing();?>
          </div>
     </div>
</section>