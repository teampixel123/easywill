<!doctype html>
<html lang="en">
  <?php
  $will = 'website';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>

  <!-- <section id="login"> -->
    <div class="container-fluid signup" style="padding-bottom: 0px;">
      <div class="signupbox pl-3 pr-3 mb-5">
        <div class="panel panel-info" >
          <div class="panel-heading text-center">
            <div class="panel-title"><h3 class="m-0">Owner Login</h3></div>
            <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
          </div>

          <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
            </div>
            <form id="loginform" method="post" class="form-horizontal" action="">

              <div class="form-group">
                <div class="row text-center">
                  <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">Username</label>
                  <div class="col-md-9">
                    <input type="text" name="owner_username" id="owner_username" class="required form-control" placeholder="Username">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row text-center">
                  <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">Password</label>
                  <div class="col-md-9">
                    <input type="password" name="owner_password" id="owner_password" class="required form-control" placeholder="Password">
                    <!-- <p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide Password</p> -->
                  </div>
                  <p id="error_invalide_login" style="color:red; display:none" class="text-center invalide mt-4 w-100">*Invalide Sign-In Information.</p>
                </div>

              </div>


              <!-- <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  style="width: 100%" id="login-username" type="text" class="form-control" name="username" value="" placeholder="Mobile Number or Email">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input style="width: 100%" minlength="6" id="login-password" type="Password" class="form-control" name="password" placeholder="Password">
              </div> -->

              <div class="input-group mb-3 ">
                <button type="button" id="btn_login" class="btn btn-success m-auto w-25">Login</button>
              </div>


              <div class="input-group">
                <div class="col-md-12 p-0">
                  <div class="text-center" style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >

                    <!-- onClick="$('#loginbox').hide(); $('#signupbox').show()" -->
                    <a href="#">Forgot password?</a>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
  <!-- </section> -->

  <!-- <section class="p-2 protect mt-5 text-center">
    <h2>Protect Your Family Today </h2>
  </section> -->

<!-- footer -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<?php include(__DIR__ .'../../footer.php');  ?>
  </body>
</html>
