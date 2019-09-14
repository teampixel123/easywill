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
      <?php
      $send_email = $this->session->flashdata('send_email');
      if($send_email == 'error'){ ?>
        <div class="alert alert-danger" role="alert">
        Email Not send.
        </div>
      <?php } else if($send_email == 'success'){ ?>
        <div class="alert alert-success" role="alert">
        Email send seccessfully.
        </div>
      <?php } ?>

      <!-- <?php echo validation_errors(); ?> -->
      <form id="contact-form" method="post" action="<?php echo base_url(); ?>Contact-Us" role="form">
      <div class="messages"></div>
      <div class="controls">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_name">First Name *</label>
              <input id="form_name" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control" placeholder="Please enter your first name *" >
              <div class="help-block with-errors"></div>
              <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_lastname">Last Name *</label>
              <input id="form_lastname" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control" placeholder="Please enter your last name *" >
              <div class="help-block with-errors"></div>
              <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_email">Email *</label>
              <input id="form_email" type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Please enter your email *" >
              <div class="help-block with-errors"></div>
              <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="form_phone">Phone</label>
              <input id="form_phone" type="tel" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Please enter your phone">
              <div class="help-block with-errors"></div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="form_message">Message *</label>
              <textarea id="form_message" name="message" value="<?php echo set_value('message'); ?>" class="form-control" placeholder="Message for me *" rows="4"></textarea>
              <div class="help-block with-errors"></div>
              <?php echo form_error('message', '<div class="text-danger">', '</div>'); ?>
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
