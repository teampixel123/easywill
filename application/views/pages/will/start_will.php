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

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="input-box">


            <form class="" id="start_will_form" action="<?php echo base_url() ?>Will_Controller/save_start_info" method="post">
              <fieldset>
                <h3 class="text-center mb-4">Personal Information </h3>

                <div class="form-group">
                  <div class="row text-center">
            				<div class="col-md-2"></div>
                    <label class="col-md-2 text-right" for="exampleInputEmail1">Full Name</label>
            				<!-- <div class="col-md-2">
            					<select class="form-control required" name="name_title" id="name_title">
            					 <option value="0">Select</option>
            					 <option>Mr.</option>
            					 <option>Mrs.</option>
            					 <option>Ms.</option>
            				 </select>
                    </div> -->
                    <div class="col-md-6">
            					<input type="text" name="full_name" id="full_name" class="required text title-case form-control" placeholder="Full Name">
            				</div>
                  </div>
                </div>
                <div class="form-group" style="">
                  <div class="row">
            				<div class="col-md-2"></div>
            				<div class="col-md-2 text-right">
            					<label for="exampleInputEmail1">Gender</label>
            				</div>
            				<div class="col-md-3" style="padding-left:30px;">
            					<div class="row">
              					<div class="custom-control custom-radio col-md-6">
              						<input type="radio" id="male" name="gender" class="custom-control-input gender-radio" value="male" checked="">
              						<label class="custom-control-label" for="male">Male </label>
              					</div>
              					<div class="custom-control custom-radio col-md-6">
              						<input type="radio" id="female" name="gender" value="female" class="custom-control-input gender-radio">
              						<label class="custom-control-label" for="female">Female</label>
              					</div>
            				  </div>
                  </div>
            			</div>
            		</div>
                <div class="form-group" style="">
                  <div class="row">
            				<div class="col-md-2"></div>
                    <label class="col-md-2 text-right" for="exampleInputEmail1">Marital status</label>
            				<div class="col-md-4">
            					<select class="required form-control" name="marital_status" id="marital_status">
            					 <option value="0">select </option>
            					 <option id="Married">Married</option>
            					 <option id="Unmarried">Unmarried</option>
            					 <option id="Divorcee">Divorcee</option>
            					 <option id="Widove" disabled>Widow</option>
            				 </select>
                   </div>
                  </div>
                </div>
                <div class="form-group have_child_div" style="display:none;">
                  <div class="row">
            				<div class="col-md-2"></div>
            				<div class="col-md-2 text-right">
            					<label for="exampleInputEmail1">Child</label>
            				</div>
            				<div class="col-md-3" style="padding-left:30px;">
            					<div class="row">
            					<div class="custom-control custom-radio col-md-6">
            						<input type="radio" id="child_yes" name="is_have_child" class="custom-control-input" value="yes">
            						<label class="custom-control-label" for="child_yes">Yes</label>
            					</div>
            					<div class="custom-control custom-radio col-md-6">
            						<input type="radio" id="child_no" name="is_have_child" value="no" class="custom-control-input" checked="">
            						<label class="custom-control-label" for="child_no">No</label>
            					</div>
            				</div>
            				 <p id="error_is_have_child" style="color:red; display:none" class="text-left invalide  m-0">*This field is required.</p>
            				</div>
            			</div>
            		</div>
                <div class="form-group">
                  <div class="row">
            				<div class="col-md-2"></div>
                    <div class="col-md-2 text-right">
                      <label for="exampleInputEmail1">Mobile No</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" name="mobile_no" class="required mobile only_number form-control" id="mobile_no" aria-describedby="emailHelp" placeholder="Mobile No">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
            				<div class="col-md-2"></div>
                    <div class="col-md-2 text-right">
                      <label for="exampleInputEmail1">Email</label>
                    </div>
                    <div class="col-md-4">
                      <input type="email" name="email" class="required email form-control" id="email" aria-describedby="emailHelp" placeholder="Email Id">
                    </div>
                  </div>
                </div>
                <?php if($will_start_data){ ?>
                  <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-md btn-info pl-4 pr-4" id="start_save_btn">Update and Next</button>
                  </div>
                <?php } else{ ?>
                  <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-md btn-success pl-4 pr-4" id="start_save_btn">Save and Next</button>
                  </div>
                <?php } ?>
              </fieldset>
            </form>
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

  <?php if($will_start_data){
    foreach ($will_start_data as $will_start_data1) {
    }
  ?>
    <input type="hidden" name="full_name2" id="full_name2" value="<?php echo $will_start_data1->full_name; ?>">
    <input type="hidden" name="gender2" id="gender2" value="<?php echo $will_start_data1->gender; ?>">
    <input type="hidden" name="marital_status2" id="marital_status2" value="<?php echo $will_start_data1->marital_status; ?>">
    <input type="hidden" name="is_have_child2" id="is_have_child2" value="<?php echo $will_start_data1->is_have_child; ?>">
    <input type="hidden" name="mobile_no2" id="mobile_no2" value="<?php echo $will_start_data1->mobile_no; ?>">
    <input type="hidden" name="email2" id="email2" value="<?php echo $will_start_data1->email; ?>">

    <script type="text/javascript">
      $('#start_will_form').attr('action', "<?php echo base_url(); ?>Will_Controller/update_start_info");

      var full_name = $('#full_name2').val();
      var gender = $('#gender2').val();
      var marital_status = $('#marital_status2').val();
      var is_have_child = $('#is_have_child2').val();
      var mobile_no = $('#mobile_no2').val();
      var email = $('#email2').val();

      $('#full_name').val(full_name);
      $('#mobile_no').val(mobile_no);
      $('#email').val(email);
      $('#marital_status').val(marital_status);

      if(gender == 'male'){
        $('#male').prop("checked", true);
      }
      else if (gender == 'female'){
        $('#female').prop("checked", true);
        $('#Widove').prop('disabled', false)
      }

      if(marital_status != 'Unmarried'){
        $('.have_child_div').show();
      }
      else{
        $('.have_child_div').hide();
      }

      if(is_have_child == 'child_yes'){
        $('#child_yes').prop("checked", true);
      }
      else if (is_have_child == 'child_no'){
        $('#child_no').prop("checked", true);
      }
    </script>
  <?php } ?>
  </body>
</html>
