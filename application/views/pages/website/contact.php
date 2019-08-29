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

  <section class="pt-5">
    <h1 class="text-center pb-4 animated bounceIn">About Us - Easy Will India</h1>
  </section>

  <div class="container">


    <div class="row">
      <div class="col-lg-12">
      <h3 class="text-center">Email us with any question or inquiries.</h3>
      <p class="text-center pb-5">We would be happy to answer your questions and set up a meeting with you.</p>
     </div>
    </div>

<div class="row">
    <div class="col-md-8 offset-md-2">
      <form id="contact-form" method="post" action="contact.php" role="form">
      <div class="messages"></div>
      <div class="controls">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_name">First Name *</label>
              <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your first name *" required="required" data-error="Firstname is required.">
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_lastname">Last Name *</label>
              <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your last name *" required="required" data-error="Lastname is required.">
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_email">Email *</label>
              <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_phone">Phone</label>
              <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="form_message">Message *</label>
              <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-md-12">
            <input type="submit" class="btn btn-success btn-send" value="Send message">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="text-muted mt-2 mb-5"><strong>*</strong> These fields are required. </p>
          </div>
        </div>
      </div>

      </form>

    </div>



  </div>
  <!-- form row end -->


</div>

  <section class="p-2 protect mt-5 text-center">
    <h2>Protect Your Family Today </h2>
  </section>

<!-- footer -->
<?php include(__DIR__ .'../../footer.php');  ?>
  </body>
</html>
