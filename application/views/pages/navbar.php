<div class="topstrip fixed-top"></div>
<!-- <section class="shadow fixed-top">
  <div class="container"> -->
    <nav class="navbar shadow sticky-top navbar-top navbar-expand-lg navbar-light bg-light top-nav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php base_url(); ?>assets/images/website/easy_logo-01.svg" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item top-nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item top-nav-item ">
          <a class="nav-link" href="<?php echo base_url(); ?>About-Us">About Us</a>
        </li>
        <li class="nav-item top-nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>Pricing">Pricing</a>
        </li>
        <li class="nav-item top-nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>FAQs">FAQs</a>
        </li>
        <li class="nav-item top-nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>Contact-Us">Contact Us</a>
        </li>
      </ul>
      <?php if($this->session->userdata('user_is_login')){ ?>
        <a href="<?php echo base_url(); ?>User-Dashboard"><button type="submit" class="login btn btn-sm btn-primary">Dashboard</button></a>
      <?php } else{ ?>
        <a href="<?php echo base_url(); ?>Login"><button type="submit" class="login btn btn-sm btn-primary">Sign In / Sign Up</button></a>
      <?php } ?>

    </div>
  </nav>
<!-- </div>
</section> -->
