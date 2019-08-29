<!doctype html>
<html lang="en">
  <?php
  $will = 'will';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>
  <div class="topstrip"></div>

  <section class="terms">
    <div class="text-center">
      <h1 class="">Start Your Will Now</h1>
    </div>
  </section>
  <?php
  foreach($personal_info as $personal_info1){
  }
  ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="input-box pt-4 pb-4 pl-2 pr-2">
            <form class="" id="form_personal_info" action="<?php echo base_url() ?>Will_Controller/save_personal_info" method="post">
              <fieldset>
                <h5 class="text-left txt-black mb-4 ml-4">Personal Information </h5>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Address</label>
                    <div class="col-md-10">
            					<input type="text" name="address" id="address" value="<?php echo $personal_info1->address; ?>" class="required address title-case form-control form-control-sm" placeholder="">
            				</div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">City</label>
                    <div class="col-md-4">
            					<input type="text" name="city" id="city" value="<?php echo $personal_info1->city; ?>" class="required text title-case form-control form-control-sm" placeholder="">
            				</div>
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Pin Code</label>
                    <div class="col-md-4">
                      <input type="text" name="pincode" id="pincode" value="<?php echo $personal_info1->pincode; ?>" class="required only_number pin-code title-case form-control form-control-sm" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">State</label>
                    <div class="col-md-4">
            					<input type="text" name="state" id="state" value="<?php echo $personal_info1->state; ?>" class="required text title-case form-control form-control-sm" placeholder="">
            				</div>
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Country</label>
                    <div class="col-md-4">
                      <input type="text" name="country" id="country" value="<?php echo $personal_info1->country; ?>" class="required text title-case form-control form-control-sm" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Birthdate</label>
                    <div class="col-md-4">
            					<input type="text" name="birthdate" id="birthdate" value="<?php echo $personal_info1->birthdate; ?>" class="required text title-case form-control form-control-sm" placeholder="">
            				</div>
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Occupation</label>
                    <div class="col-md-4">
                      <input type="text" name="occupation" id="occupation" value="<?php echo $personal_info1->occupation; ?>" class="required text title-case form-control form-control-sm" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Aadhar No</label>
                    <div class="col-md-4">
            					<input type="text" name="aadhar_no" id="aadhar_no" value="<?php echo $personal_info1->aadhar_no; ?>" class="required only_number aadhar-no form-control form-control-sm" placeholder="">
            				</div>
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">PAN No</label>
                    <div class="col-md-4">
                      <input type="text" name="pan_no" id="pan_no" value="<?php echo $personal_info1->pan_no; ?>" class="form-control form-control-sm" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Nationality</label>
                    <div class="col-md-4">
            					<input type="text" name="nationality" id="nationality" value="<?php echo $personal_info1->nationality; ?>" class="required text form-control form-control-sm" placeholder="">
            				</div>
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Religion</label>
                    <div class="col-md-4">
                      <input type="text" name="religion" id="religion" value="<?php echo $personal_info1->religion; ?>" class="required text form-control form-control-sm" placeholder="">
                    </div>
                  </div>
                </div>
                <?php if($personal_info){ ?>
                  <div class="form-group text-right mt-4 mr-3">
                    <button type="button" class="btn btn-md btn-primary" id="personal_save_btn">Update & Next</button>
                  </div>
                <?php } else{ ?>
                  <div class="form-group text-right mt-4 mr-3">
                    <button type="button" class="btn btn-md btn-success" id="personal_save_btn">Save & Next</button>
                  </div>
                <?php } ?>

              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="info-box">
            <p>Name : <?php echo $personal_info1->name_title.' '.$personal_info1->full_name;  ?></p>
            <p>Mobile : <?php echo $personal_info1->mobile_no;  ?></p>
            <p>Email : <?php echo $personal_info1->email;  ?></p>
            <p>Gender : <?php echo $personal_info1->gender;  ?></p>
            <p>Marital Status : <?php echo $personal_info1->marital_status;  ?></p>
            <p>Have Child : <?php echo $personal_info1->is_have_child;  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <section class="p-2 protect mt-5 text-center">
    <h2>Protect Your Family Today </h2>
  </section> -->

<!-- footer -->
  <?php include(__DIR__ .'../../footer.php');  ?>
  <script src="<?php echo base_url(); ?>assets/js/will_js/start_will.js"></script>
  <script type="text/javascript">
  $('#birthdate').datepicker({
    format: 'dd/mm/yyyy',
  }).on('changeDate', function(ev){
    $('.datepicker').hide();
    $(this).removeClass('required-input');
    $(this).removeClass('invalide-input');
  });
  </script>
  </body>
</html>
