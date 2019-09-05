<?php
foreach ($user_details as $user_details) {
}
?>

<nav class="navbar user-dash-nav navbar-expand-md nnavbar-dark bg-dark">
<a class="navbar-brand" href="#"><?php echo $user_details->user_fullname; ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <!-- <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
  </ul> -->
  <!-- <span class="navbar-text">
    Navbar text with an inline element
  </span> -->
</div>
<div class="float-left">
  <!-- <a href="<?php echo base_url(); ?>User-Logout" type="button" class="btn btn-outline-success">Logout</a> -->
  <a href="<?php echo base_url(); ?>User-Logout"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button></a>
</div>
</nav>
