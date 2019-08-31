<!doctype html>
<html lang="en">
  <?php
  $will = 'will';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>

  <div class="modal fade" id="save_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-body" >
           <div class="load" style="margin-left:37%; margin-top:33%;"></div>
           <p class="text-center" style="color:#fff; font-size:20px !important; font-weight:600;">Savings your information. Please wait.</p>
         </div>
     </div>
   </div>

  <div class="topstrip"></div>

  <!-- <section class="terms">
    <div class="text-center">
      <h1 class="">Start Your Will Now</h1>
    </div>
  </section> -->
  <div class="container-fluid mt-3">
  <ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
    <li class="personal-tab" >Personal Information</li>
    <li class="family-tab">Family Information</li>
    <li class="assets-tab is-active">Assets</li>
    <li class="executor-tab">Distribution</li>
    <li class="witness-tab">Other Information</li>
  </ul>
  </div>
  <?php
  // foreach($personal_info as $personal_info1){
  // }
  ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="input-box p-4">
            <h5 class="text-left txt-black mb-4">Assets Information </h5>
            <ul class="nav nav-tabs">
              <li class="nav-item text-center" style="width:25%;">
                <a id="real_estate_tab" class="nav-link active rem_class" data-toggle="tab" href="#real_estate"><i class="fa fa-home fa-2x"  ></i></br> Real Estate</a>
              </li>
              <li class="nav-item text-center" style="width:26%;">
                <a id="bank_assets_tab" class="nav-link rem_class" data-toggle="tab" href="#bank_assets"><i class="fa fa-university fa-2x" ></i></br> Bank Assets</a>
              </li>
              <li class="nav-item text-center" style="width:24%;">
                <a id="vehicle_tab" class="nav-link rem_class" data-toggle="tab" href="#vehicle"><i class="fa fa-car fa-2x"  ></i></br> Vehicle</a>
              </li>
              <li class="nav-item text-center" style="width:24%;">
                <a id="other_gifts_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts"><i class="fa fa-gift fa-2x"  ></i></br> Other Gifts</a>
              </li>
              <!-- <li class="nav-item " style="width:25%;">
                <a id="other_gifts_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts "><i class="fa fa-gift fa-2x"  ></i></br> Other Gifts </a>
              </li> -->
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active show rem_class" id="real_estate">
                <h6 class="mt-3">Real Estate</h6>
                <hr>
                <form class="" id="form_real_estate" action="<?php echo base_url(); ?>Will_Controller/save_real_estate_info" method="post">
                  <input type="hidden" name="real_estate_id" id="real_estate_id2">
                  <fieldset>
                    <div class="form-group mt-1">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Estate Type</label>
                        <div class="col-md-10">
                          <select class="required form-control form-control-sm" name="estate_type" id="estate_type">
                            <option value="0" >Select Estate Type</option>
                            <option>House</option>
                					  <option>Flat</option>
                					  <option>Shop</option>
                					  <option>Land</option>
                					  <option>Plot</option>
                					  <option>Commercial Shop Unit</option>
                					  <option>Commercial Office Unit</option>
                          </select>
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Number</label>
                        <div class="col-md-10">
                					<input type="text" name="estate_number" id="estate_number" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Survey Number</label>
                        <div class="col-md-3">
                          <select class="required form-control form-control-sm" name="survey_number_type" id="survey_number_type">
                            <option>C.S. No.</option>
                            <option>R.S. No.</option>
                          </select>
                        </div>
                        <div class="col-md-7">
                					<input type="text" name="survey_number" id="survey_number" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Measurement Area</label>
                        <div class="col-md-5">
                					<input type="text" name="measurement_area" id="measurement_area" value="" class="required dec_number form-control form-control-sm" placeholder="">
                				</div>
                        <div class="col-md-5">
                          <select class="required form-control form-control-sm" name="measurement_unit" id="measurement_unit">
                            <option value="0">Select Unit</option>
                					  <option>Square Meter</option>
                					  <option>Square Feet</option>
                					  <option>Hector</option>
                				 </select>
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Address</label>
                        <div class="col-md-10">
                					<input type="text" name="real_estate_address" id="real_estate_address" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">City</label>
                        <div class="col-md-4">
                					<input type="text" name="real_estate_city" id="real_estate_city" value="" class="required  text title-case form-control form-control-sm" placeholder="">
                				</div>
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">PIN</label>
                        <div class="col-md-4">
                					<input type="text" name="real_estate_pin" id="real_estate_pin" value="" class="required pin-code only_number form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">State</label>
                        <div class="col-md-4">
                					<input type="text" name="real_estate_state" id="real_estate_state" value="" class="required  text title-case form-control form-control-sm" placeholder="">
                				</div>
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Country</label>
                        <div class="col-md-4">
                					<input type="text" name="real_estate_country" id="real_estate_country" value="" class="required  text title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="real_estate_update_btn">Update</button>
                      <button type="button" class="btn btn-md btn-success" id="real_estate_save_btn"> Save </button>
                    </div>
                  <fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="bank_assets">
                <h6 class="mt-3">Bank Assets</h6>
                <hr>
                <form class="" id="form_bank_assets" action="<?php echo base_url(); ?>Will_Controller/save_bank_assets_info" method="post">
                  <input type="hidden" id="assets_id" name="assets_id">
                  <fieldset>
                    <div class="form-group mt-1">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Account Type</label>
                        <div class="col-md-9">
                          <select class="required form-control form-control-sm" name="account_type" id="account_type">
                            <option value="0" >Select Acount Type</option>
                            <option>Savings Account</option>
                					  <option>Current Account</option>
                					  <option>Fixed Deposits</option>
                					  <option value="PPF">Public Provident Fund</option>
                					  <option>Bank Locker</option>
                					  <option>Mutual Funds</option>
                					  <option>Stock Equities</option>
                					  <option>Insurance Policy</option>
                          </select>
                				</div>
                      </div>
                    </div>
                    <div class="form-group acc_no_div">
                      <div class="row text-center">
                        <label id="lbl_acc_num" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1">Account Number</label>
                        <label id="lbl_cust_id" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1" style="display:none;">Customer ID No.</label>
                        <label id="lbl_lock_num" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1" style="display:none;">Locker No.</label>
                        <label id="lbl_folio_num" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1" style="display:none;">Folio No.</label>
                        <label id="lbl_isin_num" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1" style="display:none;">ISIN/Serial No.</label>
                        <label id="lbl_policy_num" class="col-md-3 f-14 hide text-right p-0" for="exampleInputEmail1" style="display:none;">Policy No.</label>
                        <div class="col-md-9">
                					<input type="text" name="account_number2" id="account_number" value="" class="required only_number form-control form-control-sm" placeholder="">
                          <input type="text" name="account_number" id="acc_no_addr" value="" class="required address form-control form-control-sm" style="display:none;" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group acc_no_div" id="bank_name_div">
                      <div class="row text-center">
                        <label id="lbl_bank_name" class="col-md-3 f-14 bnk-name-hide text-right p-0" for="exampleInputEmail1">Bank Name</label>
                        <label id="lbl_com_name" class="col-md-3 f-14 bnk-name-hide text-right p-0" for="exampleInputEmail1" style="display:none;">Company Name</label>
                        <label id="lbl_inc_com_name" class="col-md-3 bnk-name-hide f-14 text-right p-0" for="exampleInputEmail1" style="display:none;">Insurance Company</label>
                        <div class="col-md-9">
                					<input type="text" name="bank_name" id="bank_name" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="est_brach">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Branch</label>
                        <div class="col-md-9">
                					<input type="text" name="bank_branch" id="bank_branch" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="est_state">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">State</label>
                        <div class="col-md-9">
                					<input type="text" name="bank_state" id="bank_state" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="est_pin">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Pin Code</label>
                        <div class="col-md-9">
                					<input type="text" name="bank_pin_code" id="bank_pin_code" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="fd_rec_no" style="display:none;">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">FD Receipt No</label>
                        <div class="col-md-9">
                					<input type="text" name="fd_recipt_no" id="fd_recipt_no" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="sum_ass_amt" style="display:none;">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Sum Assurance Amount</label>
                        <div class="col-md-9">
                					<input type="text" name="sum_assurance_amount" id="sum_assurance_amount" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group" id="key_num" style="display:none;">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Key Number</label>
                        <div class="col-md-9">
                					<input type="text" name="key_number" id="key_number" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="bank_update_btn">Update</button>
                      <button type="button" class="btn btn-md btn-success" id="bank_save_btn"> Save </button>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="vehicle">
                <h6 class="mt-3">Vehicle Assets</h6>
                <hr>
                <form class="" id="form_vehicle" action="<?php echo base_url(); ?>Will_Controller/save_vehicle_assets_info" method="post">
                  <input type="hidden" id="vehicle_id" name="vehicle_id">
                  <fieldset>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0">Model Name</label>
                        <div class="col-md-9">
                          <input type="text" name="vehicle_model_name" id="vehicle_model_name" value="" class="required address form-control form-control-sm" placeholder="Company & Model Name">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0">Registration No</label>
                        <div class="col-md-9">
                					<input type="text" name="vehicle_registration_no" id="vehicle_registration_no" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0">Make Year</label>
                        <div class="col-md-9">
                					<input type="text" name="vehicle_make_year" id="vehicle_make_year" value="" class="required only_number form-control form-control-sm" placeholder="yyyy">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="vehicle_update_btn">Update</button>
                      <button type="button" class="btn btn-md btn-success" id="vehicle_save_btn"> Save </button>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="other_gifts">
                <h6 class="mt-3">Vehicle Assets</h6>
                <hr>
                <form class="" id="form_other_gifts" action="<?php echo base_url(); ?>Will_Controller/save_other_gift_info" method="post">
                  <input type="hidden" id="gift_id" name="gift_id">
                  <fieldset>
                    <div class="form-group mt-1">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0" for="exampleInputEmail1">Gift Type</label>
                        <div class="col-md-9">
                          <select class="required form-control form-control-sm" name="gift_type" id="gift_type">
                            <option value="0" >Select Gift</option>
                            <option>Jewellery and Valuables</option>
                					  <option>Remained Assets</option>
                          </select>
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-3 f-14 text-right p-0">Description</label>
                        <div class="col-md-9">
                					<input type="text" name="gift_description" id="gift_description" value="" class="required address form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="gift_update_btn">Update</button>
                      <button type="button" class="btn btn-md btn-success" id="gift_save_btn"> Save </button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="assets_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <?php if($real_estate_data || $bank_assets_data || $vehicle_assets_data){ ?>
                <button type="button" class="btn btn-md btn-primary" id="assets_next_btn">Next</button>
              <?php } else{
                echo '<p style="color:red;"><b>Add Information for Next</b></p>';
              }?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h5 class="txt-black">Assets Details</h5>
        <?php if($real_estate_data){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Real Estate</h6>
            <hr>
            <?php
              $i=0;
              foreach($real_estate_data as $real1){
              $i++;
            ?>
            <div class="row info-div">
              <div class="col-md-10">
                <p class="mb-0">
                  <?php
                  echo '<b>'.$i.') <span class="estate_type">'.$real1->estate_type.'</span></b> no. <span class="estate_number">'.$real1->estate_number.'</span>
                   having property bearing <b><span class="survey_number_type">'.$real1->survey_number_type.'</span>
                   <span class="survey_number">'.$real1->survey_number.'</span></b> measuring about
                   <b><span class="measurement_area">'.$real1->measurement_area.'</span>
                   <span class="measurement_unit">'.$real1->measurement_unit.'</span>,
                   </b> located at <span class="real_estate_address">'.$real1->real_estate_address.'</span>,
                   <span class="real_estate_city">'.$real1->real_estate_city.'</span>,
                   <span class="real_estate_state">'.$real1->real_estate_state.'</span>,
                   <span class="real_estate_country">'.$real1->real_estate_country.'</span> -
                   <span class="real_estate_pin">'.$real1->real_estate_pin.'</span>';
                   ?>
                   <input type="hidden" id="real_estate_id" value="<?php echo $real1->id; ?>">
                </p>

              </div>
              <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                <button type="button" style="width:100%" class="badge1 row" title="Delete Family Member">
                  <a data-toggle="modal" data-target="#exampleModal" class="badge1 badge-pill real_estate_delete" title="Delete Real Estate"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  <a class="badge1 badge-pill real_estate_edit" title="Edit Real Estate"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                </button>
              </div>
            </div>
            <hr>
            <?php } ?>
          </div>
          <?php } ?>
          <?php if($bank_assets_data){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Bank Information</h6>
            <hr>
            <?php
              $i=0;
              foreach ($bank_assets_data as $bank) {
              $i++;
              $assets_type = $bank->account_type;

              if($assets_type == 'Savings Account' || $assets_type == 'Current Account'){
                $name = 'Bank Name';
                $acc_no = 'Account Number';
                $other='';
              }
              elseif($assets_type == 'Fixed Deposits'){
                $name = 'Bank Name';
                $acc_no = 'Customer ID No.';
                $other = ', FD Receipt No: '.$bank->fd_recipt_no;

              }
              elseif($assets_type == 'PPF'){
                $name = 'Company Name';
                $acc_no = 'Account Number';
                $other='';
              }
              elseif($assets_type == 'Bank Locker'){
                $name = 'Bank Name';
                $acc_no = 'Locker Number';
                $other = ', Key Number: '.$bank->key_number;
              }
              elseif($assets_type == 'Mutual Funds'){
                $name = 'Company Name';
                $acc_no = 'Folio Number';
                $other='';
              }
              elseif($assets_type == 'Stock Equities'){
                $name = 'Company Name';
                $acc_no = 'ISIN/Serial Number';
                $other='';
              }
              elseif($assets_type == 'Insurance Policy'){
                $name = 'Company Name';
                $acc_no = 'Policy Number';
                $other=', Sum Assurance Amount: '.$bank->sum_assurance_amount.'Rs.';
              }

            ?>
              <div class="row info-div">
                <div class="col-md-10">
                  <p class="mb-0">
                    <?php
                      echo ''.$i.') Type: <b>'.$assets_type.'</b>, '.$name.': '.$bank->bank_name.', Branch: '.$bank->bank_branch.', '.$acc_no.': '.$bank->account_number.''.$other.'';
                    ?>
                    <input type="hidden" id="bank_assets_id" value="<?php echo $bank->id; ?>">
                    <input type="hidden" id="acc_type" value="<?php echo $bank->account_type; ?>">
                    <input type="hidden" id="acc_number" value="<?php echo $bank->account_number; ?>">
                    <input type="hidden" id="bnk_name" value="<?php echo $bank->bank_name; ?>">
                    <input type="hidden" id="bnk_branch" value="<?php echo $bank->bank_branch; ?>">
                    <input type="hidden" id="bnk_state" value="<?php echo $bank->bank_state; ?>">
                    <input type="hidden" id="bnk_pin" value="<?php echo $bank->bank_pin_code; ?>">
                    <input type="hidden" id="fd_re_no" value="<?php echo $bank->fd_recipt_no; ?>">
                    <input type="hidden" id="sum_assu_amt" value="<?php echo $bank->sum_assurance_amount; ?>">
                    <input type="hidden" id="key_nmbr" value="<?php echo $bank->key_number; ?>">
                  </p>
                </div>
                <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                  <button type="button" style="width:100%" class="badge1 row" title="Delete Family Member">
                    <a data-toggle="modal" data-target="#bank_delete_modal" class="badge1 badge-pill bank_assets_delete" title="Delete Bank Assets"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                    <a class="badge1 badge-pill bank_assets_edit" title="Edit Bank Assets"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  </button>
                </div>
              </div>
              <hr>
            <?php } ?>
          </div>
          <?php } ?>
          <?php if($vehicle_assets_data){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Vehicle Information</h6>
              <hr>
              <?php
                $i = 0;
                foreach ($vehicle_assets_data as $vehicle):
                $i++;
              ?>
              <div class="row info-div">
                <div class="col-md-10">
                  <p class="mb-0">
                    <?php echo ''.$i.') <b>Vehicle</b> with model name <b>'.$vehicle->vehicle_model_name.'</b>, registration no '.$vehicle->vehicle_registration_no.'. and make year '.$vehicle->vehicle_make_year.''; ?>
                    <input type="hidden" id="vehicle_ass_id" value="<?php echo $vehicle->id; ?>">
                    <input type="hidden" id="vehicle_model" value="<?php echo $vehicle->vehicle_model_name; ?>">
                    <input type="hidden" id="vehicle_registration" value="<?php echo $vehicle->vehicle_registration_no; ?>">
                    <input type="hidden" id="vehicle_make" value="<?php echo $vehicle->vehicle_make_year; ?>">
                  </p>
                </div>
                <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                  <button type="button" style="width:100%" class="badge1 row" title="Delete Family Member">
                    <a data-toggle="modal" data-target="#vehicle_delete_modal" class="badge1 badge-pill vehicle_delete" title="Delete This Vehicle Information"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                    <a class="badge1 badge-pill vehicle_edit" title="Edit This Vehicle Information"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  </button>
                </div>
              </div>
              <hr>
              <?php endforeach; ?>
            </div>
          <?php } ?>
          <?php if($other_gift_data){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Other Gift Information</h6>
              <hr>
              <?php
                $i = 0;
                foreach ($other_gift_data as $other_gift) {
                $i++;
              ?>
              <div class="row info-div">
                <div class="col-md-10">
                  <p class="mb-0">
                    <?php echo ''.$i.') Gift Type : '.$other_gift->gift_type.', <br> Description : '.$other_gift->gift_description.''; ?>
                    <input type="hidden" id="other_gift_id" value="<?php echo $other_gift->id; ?>">
                    <input type="hidden" id="gift_typ" value="<?php echo $other_gift->gift_type; ?>">
                    <input type="hidden" id="gift_desc" value="<?php echo $other_gift->gift_description; ?>">
                  </p>
                </div>
                <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                  <button type="button" style="width:100%" class="badge1 row">
                    <a data-toggle="modal" data-target="#other_gifts_delete_modal" class="badge1 badge-pill other_gifts_delete" title="Delete This Other Gift Information"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                    <a class="badge1 badge-pill other_gifts_edit" title="Edit This Other Gift Information"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  </button>
                </div>
              </div>
              <hr>
              <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal Real Estate Delete-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete Real Estate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-real-type"></p>
          <input type="hidden" name="modal-real-id" id="modal-real-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-assets-confirm" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Bank Assets Delete-->
  <div class="modal fade" id="bank_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete Bank Asset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-bank-type"></p>
          <p class="modal-bank-name"></p>
          <p class="modal-bank-num"></p>
          <input type="hidden" name="modal-bank-id" id="modal-bank-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-bank-confirm" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Vehicle Delete-->
  <div class="modal fade" id="vehicle_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete Vehicle Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-vehicle-model"></p>
          <p class="modal-vehicle-reg"></p>
          <p class="modal-vehicle-make"></p>
          <input type="hidden" name="modal-vehicle-id" id="modal-vehicle-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-vehicle-confirm" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Other Gift Delete-->
  <div class="modal fade" id="other_gifts_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete Gift Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-gift-type"></p>
          <p class="modal-gift-description"></p>
          <input type="hidden" name="modal-other-gift-id" id="modal-other-gift-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-other-gift-confirm" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

<!-- footer -->
  <?php include(__DIR__ .'../../footer.php');  ?>
  <script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
  <script src="<?php echo base_url(); ?>assets/js/will_js/assets_js.js"></script>
  <script type="text/javascript">
    $('#family_person_dob').datepicker({
      format: 'dd/mm/yyyy',
    });
  </script>
  <?php
  $assets_open_tab = $this->session->flashdata('assets_tab');
  if($assets_open_tab){ ?>
    <input type="text" id="assets_open_tab" value="<?php echo $assets_open_tab; ?>">
    <script type="text/javascript">
      $(document).ready(function(){
        var assets_open_tab = $('#assets_open_tab').val();
        $('.rem_class').removeClass('show');
        $('.rem_class').removeClass('active');
        if(assets_open_tab == 'real'){
          $('#real_estate').addClass('active');
          $('#real_estate').addClass('show');
          $('#real_estate_tab').addClass('active');
        }
        else if(assets_open_tab == 'bank'){
          $('#bank_assets').addClass('active');
          $('#bank_assets').addClass('show');
          $('#bank_assets_tab').addClass('active');
        }
        else if(assets_open_tab == 'vehicle'){
          $('#vehicle').addClass('active');
          $('#vehicle').addClass('show');
          $('#vehicle_tab').addClass('active');
        }
        else if(assets_open_tab == 'other_gifts'){
          $('#other_gifts').addClass('active');
          $('#other_gifts').addClass('show');
          $('#other_gifts_tab').addClass('active');
        }
        // other_gifts
      });
    </script>
  <?php } ?>
  </body>
</html>
