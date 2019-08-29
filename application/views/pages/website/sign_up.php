<!doctype html>
<html lang="en">
  <?php
  $will = 'website';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>

  <!-- <section class="login"> -->
    <div class="container-fluid signup">
      <div class="signupbox">
        <div class="panel panel-info">
          <div class="panel-heading text-center">
            <div class="panel-title">Sign Up</div>
            <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
          </div>


          <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">
            </div>
            <form id="register_form" method="post" class="form-horizontal ">
              <input type="hidden" name="contact_type" id="contact_type" >
              <div class="form-group">
                <div class="row text-center">
                  <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">Full Name</label>
                  <div class="col-md-9">
                    <input type="text" name="reg_name" id="reg_name" class="required text title-case form-control" placeholder="Full Name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row text-center">
                  <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">Mobile/Email</label>
                  <div class="col-md-9">
                    <input type="text" name="reg_mob_email" id="reg_mob_email" class="required form-control" placeholder="Mobile Number or Email">
                    <p id="reg_error_invalide" style="color:red; display:none" class="text-left invalide">*Invalide Mobile Number/Email Format</p>
                    <p id="error_mobile_exist" style="color:red; display:none" class="text-left">*This Mobile Number/Email allrady exist</p>
                  </div>
                </div>
              </div>

              <div class="otp_div" id="otp_div" style="display:none;">
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">Security Code</label>
                    <div class="col-md-9">
                      <input type="text" name="security_code" id="security_code" class="required form-control" placeholder="Enter Security Code">
                      <p id="" style="color:green;" class="text-left mb-0"> Security Code send to your Mobile/Email. </p>
                      <p id="error_invalide_otp" style="color:red; display:none" class="text-left invalide">*Invalide Security Code</p>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-3 text-right pt-1 pl-0 pr-1" for="exampleInputEmail1">New Password</label>
                    <div class="col-md-9">
                      <input type="password" name="user_password" id="user_password" class="required form-control" placeholder="Enter New Password">
                    </div>
                  </div>
                </div>
                <div class="input-group mt-4 mb-4 ">
                  <button type="button" id="btn_submit" class="btn btn-success m-auto w-25">Submit</button>
                </div>
              </div>
              <div class="input-group mt-4 mb-4 ">
                <button type="button" id="btn_register" class="btn btn-success m-auto w-25">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- </section> -->

  <section class="p-2 protect text-center">
    <h2>Protect Your Family Today </h2>
  </section>

<!-- footer -->
  <script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
  <?php include(__DIR__ .'../../footer.php');  ?>
  </body>
</html>
