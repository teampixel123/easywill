<!doctype html>
<html lang="en">
  <?php
  $will = 'website';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>

  <div id="about" class="carousel-item active text-center">
    <div class="aboutimg">
    </div>
  </div>

  <section id="srv_prc" class="pt-5">
    <h1 class="text-center pb-4 animated bounceIn">Services & Pricing</h1>
  </section>

  <section class="package pb-5">
    <div class="container">
      <div class="row">
        <div class="sliverbox col-md-4">
          <div class="shadow">
          <div class="sliver">
            <h2 class="text-center">SILVER</h2>
          </div>
          <div class="starter">
            <div class="pricetop"></div>
              <ul class="m-4">
                <li>Standard online services</li>
                <li>User can  fill details with Online guidance @tools tips and FAQ’s&nbsp;&nbsp;
                <!-- <a href="#" class="circle" data-toggle="tooltip" title="Tooltip information goes here ! Tooltip information goes here !">?</a> -->
                </li>
                <li>It’s easy, simple and affordable</li>
                <li>User friendly experience</li>
                <li>Confidential, safe and secure</li>
                <li>Preview before print / finalize</li>
                <li>User can fill details as per wish and ease.</li>
                <li>Final will delivery by Email</li>
              </ul>
              <div class="rs p-3 text-center">
               <h2><span>Only @</span> <del>Rs.2000/-</del> </h2>
                  <h2 style="color:#00abc2;"><span>Discount 25 %</span>  Rs.1,500/-</h2>
                <br> <span>(inclusive of all applicable taxes , excluding payment gateway fees )</span>
              </div>
              <div class="text-center">
                <?php if($user_is_login && $user_id){ ?>
                  <form class="" action="<?php base_url() ?>Payment_Controller/payment" method="post">
                    <input type="hidden" name="pack_name" id="pack_name" value="Silver" >
                    <input type="hidden" name="amount" id="amount" value="1500" >
                    <input type="hidden" name="promocode" id="no_promocode" value="no_promocode">
                    <input type="hidden" name="name" id="name" value="<?php echo $user->user_fullname; ?>" >
                    <input type="hidden" name="email" id="email" value="<?php echo $user->user_email_id; ?>" >
                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $user->user_mobile_number; ?>" >
                    <div class="text-center">
                    <input type="submit" class="btn btn-lg btn-primary" value="Get Started  »" />
                    </div>
                  </form>
                <?php } else{ ?>
                  <a href="<?php echo base_url(); ?>Login"><button class="btn btn-lg btn-primary" type="button">Get Started  »</button></a>
                  <!-- <button class=" btn btn-lg btn-primary" type="button" name="button"><a href="makewill.html">Get Started  »</a> </button> -->
                <?php } ?>

              </div>
            </div>
          </div>
        </div>

        <div id="mid" class="col-md-4">
          <div class="shadow">
            <img src="<?php base_url(); ?>assets/images/website/featured.svg" alt="">
            <div class="gold">
              <h2 class="text-center">GOLD</h2>
            </div>
            <div class="starter-mid">
              <div class="pricetop"></div>
                <ul class="m-4">
                  <li>Executive online services</li>
                  <li>Our executive will interact/help for your details through call, E mail. Four calls of up to 30 mins.</li>
                  <li>It’s easy, simple and affordable</li>
                  <li>User friendly experience</li>
                  <li>Confidential, safe and secure</li>
                  <li>Preview before print / finalize</li>
                  <li>User can receive will by email or courier as per wish.</li>
                  <li>One modification / updation up to 3 months</li>
                </ul>
                <div class="rs p-3 text-center">
                  <h2><span>Only @</span> <del>Rs.5000/-</del> </h2>
                  <h2 style=""><span>Discount 30 %</span>  Rs.3,500/-</h2>
                  <br>
                  <span>(inclusive of all taxes)</span>
              </div>
              <div class="line"> </div>
              <ul class="details">
                <li>same package will of user’s Spouse, Real Sister, Mother, Father, Son, Daughter’s is at <strong>Rs.2500</strong> </li>
                <li>Final will delivery by <strong>E-mail</strong>  or <strong>Courier</strong>  at user’s choice in India.</li>
              </ul>

              <div class="text-center">
                <button class="btn btn-lg btn-outline-primary" type="button" name="button"><a href="makewill.html">Get Started  »</a></button>
              </div>
            </div>
          </div>
        </div>



        <div class="col-md-4 sliverbox">
          <div class="shadow">


        <div class="sliver">
        <h2 class="text-center">PLATINUM</h2>
        </div>
          <div class="platinum">
            <div class="pricetop">
            </div>
              <ul class="m-4">
              <li>Premium  online / offline services</li>
              <li>Our legal executive will interact/help for  your details through call, E mail , Eight calls of up to 30 mins.,
customization as per users requirement.
</li>
              <li>It’s easy, simple and affordable</li>
              <li>Our executive will help to complete your will.</li>
              <li>Confidential, safe and secure</li>
              <li>Preview before print / finalize to user</li>
              <li>User can complete the will within 30 days (excluding postal or courier time)  from payment</li>
              <li>Two modifications / updations up to 6 months</li>
              </ul>
              <div class="rs p-3 text-center">
               <h2><span>Only @</span> <del>Rs.12000/-</del> </h2>
                  <h2 style=""><span>Discount 25 %</span>  Rs.9,000/-</h2>
                <br> <span>(inclusive of all taxes)</span>
              </div>
              <div class="line"></div>
                <ul class="details">
                  <li>same package will of user’s Spouse, Real Sister, Mother, Father, Son, Daughter’s is at <strong>Rs.6000</strong>  + GST @ 18%</li>
                  <li>Final will document delivery for execution of user by E mail or Courier at user’s choice in India.</li>
                </ul>
            <div class="text-center">
            <button class=" btn btn-lg btn-primary" type="button" name="button"><a href="makewill.html">Get Started  »</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </section>
  <section class="p-2 protect text-center">
    <h2>Protect Your Family Today </h2>
  </section>

<!-- footer -->
<?php include(__DIR__ .'../../footer.php');  ?>
  </body>
</html>
