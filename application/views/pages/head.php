<?php
$user_is_login = $this->session->userdata('user_is_login');
$user_id = $this->session->userdata('user_id');
$will_id = $this->session->userdata('will_id');
if($will_id){
  $will_details = $this->Will_Model->get_will_data($will_id);
  foreach ($will_details as $will_data) {
  }
}
if($user_is_login && $user_id){
  $user_details = $this->User_Model->user_details($user_id);
  foreach ($user_details as $user) {
    // code...
  }
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EasyWill - Home</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="<?php base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Animate -->
  <link href="<?php base_url(); ?>assets/css/animate.css" rel="stylesheet">
  <!-- hover effect -->
  <link href="<?php base_url(); ?>assets/css/website/hover.css" rel="stylesheet"/>
  <!-- font awesome -->
  <link href="<?php base_url(); ?>assets/css/font-css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom Css -->
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/website/style.css">
  <!-- Custom Css -->
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/bootstrap-datepicker.min.css">
  <!-- Custom Css -->
  <?php if($will == 'will'){ ?>
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/will_style.css">
  <?php } ?>

  <?php if($will == 'user_dashboard'){ ?>
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/dashboard.css">
  <?php } ?>

  <!-- <link rel="stylesheet" href="css/newslider.css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
</head>
