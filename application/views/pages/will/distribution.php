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
    <li class="assets-tab">Assets</li>
    <li class="executor-tab is-active">Distribution</li>
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
            <h5 class="text-left txt-black mb-4">Distribution of Assets </h5>
            <ul class="nav nav-tabs" style="height:105px;">
              <?php
                $next = 0;
                if($real_estate_data){
                $act_tab1 = ' active show ';
              ?>
                <li class="nav-item text-center" style="width:20%; height:105px;">
                  <a id="real_estate_tab" style="height:105px;" class="nav-link active rem_class" data-toggle="tab" href="#real_estate"><i class="fa fa-home fa-2x"  ></i></br>Real Estate</a>
                </li>
              <?php } else { $act_tab1 = ''; } ?>
              <?php if($bank_assets_data){ ?>
                <li class="nav-item text-center" style="width:20%; height:105px;">
                  <a id="bank_assets_tab" style="height:105px;" class="nav-link rem_class" data-toggle="tab" href="#bank_assets"><i class="fa fa-university fa-2x" ></i></br>Bank Assets</a>
                </li>
              <?php } ?>
              <?php if($vehicle_assets_data){ ?>
              <li class="nav-item text-center" style="width:20%; height:105px;">
                <a id="vehicle_tab"  style="height:105px;" class="nav-link rem_class" data-toggle="tab" href="#vehicle"><i class="fa fa-car fa-2x"  ></i></br>Vehicle</a>
              </li>
              <?php } ?>
              <?php if($other_gift_data){ ?>
              <li class="nav-item text-center" style="width:20%; height:105px;">
                <a id="other_gifts_tab" style="height:105px;" class="nav-link rem_class" data-toggle="tab" href="#other_gifts"><i class="fa fa-gift fa-2x"  ></i></br>Other Gifts</a>
              </li>
              <?php } ?>
              <li class="nav-item text-center" style="width:20%; height:105px;">
                <a id="omitted_tab" style="height:105px;" class="nav-link rem_class" data-toggle="tab" href="#omitted"><i class="fa fa-eye-slash fa-2x"  ></i></br>Omitted Assets</a>
              </li>
            </ul>

            <div id="myTabContent" class="tab-content">

              <!------------------------------ Real Estate Add Destribution --------------------------->

              <div class="tab-pane fade <?php echo $act_tab1; ?> rem_class" id="real_estate">
                <h6 class="mt-3">Real Estate</h6>
                <hr>
                <?php
                  $i=0;
                  foreach($real_estate_data as $real1){
                  $i++;
                ?>
                <div class="row info-div">
                  <div class="col-md-12 p-0">
                    <p class="mb-0 border-bottom pb-2">
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
                    </p>
                    <?php
                      $estate_id = $real1->id;
                      $will_id = $this->session->userdata('will_id');
                      $estate_type = 'real_estate';
                      $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                      foreach ($destr_data as $destr_data1){
                      }
                      $distribution_percent = $destr_data1->distribution_percent;
                      $remaining = 100 - $distribution_percent;
                      if($remaining > 0){
                        $next++;
                    ?>
                    <div class="share_div">
                      <p class="mb-0 mt-2 txt-red">Remaining <?php echo $remaining; ?> %
                        <span class="percent_error txt-red" style="display:none;">Invalid value % entered.</span>
                      </p>
                      <form class="pt-2 distri-form" action="<?php echo base_url(); ?>Will_Controller/save_distribution" method="post">
                        <input type="hidden" id="estate_id" name="estate_id" value="<?php echo $real1->id; ?>">
                        <input type="hidden" id="estate_type" name="estate_type" value="real_estate">
                        <input type="hidden" class="remain_assets_percent" name="remain_assets_percent" value="<?php echo $remaining; ?>">
                        <input type="hidden" name="flashdata" value="real">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <select class="required form-control form-control-sm pr-0 distribution_name_title" name="distribution_name_title" id="distribution_name_title">
                              <option>Mr.</option>
                              <option>Mrs.</option>
                              <option>Ms.</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 p-0">
                            <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm distribution_name" id="inputEmail4" placeholder="Full Name">
                          </div>
                          <div class="form-group col-md-2">
                            <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm distribution_percent" id="inputPassword4" placeholder="%">
                          </div>
                          <div class="form-group col-md-2 align-self-center">
                            <button type="button" class="btn btn-sm btn-success w-100 real_estate_save_share">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  <?php } else{ ?>
                    <p class="mb-0 mt-2 txt-green distri_complete">100% distribution completed.</p>
                  <?php } ?>
                  </div>
                </div>
                <hr class="mt-1 mb-0">
                <?php } ?>
              </div>

              <!-------------------------------------------------------------------------------->
              <!------------------------------ Bank Add Destribution --------------------------->
              <!-------------------------------------------------------------------------------->

              <div class="tab-pane fade rem_class" id="bank_assets">
                <h6 class="mt-3">Bank Assets</h6>
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
                    <div class="col-md-12 p-0">
                      <p class="mb-0 border-bottom pb-2">
                        <?php
                          echo ''.$i.') Type: <b>'.$assets_type.'</b>, '.$name.': '.$bank->bank_name.', Branch: '.$bank->bank_branch.', '.$acc_no.': '.$bank->account_number.''.$other.'';
                        ?>
                      </p>
                      <?php
                        $estate_id = $bank->id;
                        $will_id = $this->session->userdata('will_id');
                        $estate_type = 'bank_estate';
                        $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                        foreach ($destr_data as $destr_data1){
                        }
                        $distribution_percent = $destr_data1->distribution_percent;
                        $remaining = 100 - $distribution_percent;
                        if($remaining > 0){
                          $next++;
                      ?>
                      <div class="share_div">
                        <p class="mb-0 mt-2 txt-red">Remaining <?php echo $remaining; ?> %
                          <span class="percent_error txt-red" style="display:none;">Invalid value % entered.</span>
                        </p>
                        <form class="pt-2 distri-form" action="<?php echo base_url(); ?>Will_Controller/save_distribution" method="post">
                          <input type="hidden" id="estate_id" name="estate_id" value="<?php echo $bank->id; ?>">
                          <input type="hidden" id="estate_type" name="estate_type" value="bank_estate">
                          <input type="hidden" class="remain_assets_percent" name="remain_assets_percent" value="<?php echo $remaining; ?>">
                          <input type="hidden" name="flashdata" value="bank">
                          <div class="form-row">
                            <div class="form-group col-md-2">
                              <select class="required form-control form-control-sm pr-0 distribution_name_title" name="distribution_name_title" id="distribution_name_title">
                                <option>Mr.</option>
                                <option>Mrs.</option>
                                <option>Ms.</option>
                              </select>
                            </div>
                            <div class="form-group col-md-6 p-0">
                              <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm distribution_name" id="inputEmail4" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-2">
                              <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm distribution_percent" id="inputPassword4" placeholder="%">
                            </div>
                            <div class="form-group col-md-2 align-self-center">
                              <button type="button" class="btn btn-sm btn-success w-100 real_estate_save_share">Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    <?php } else{ ?>
                      <p class="mb-0 mt-2 txt-green">100% distribution completed.</p>
                    <?php } ?>
                    </div>
                  </div>
                  <hr class="mt-1 mb-0">
                <?php } ?>
              </div>


              <!----------------------------------------------------------------------------------->
              <!------------------------------ Vehicle Add Destribution --------------------------->
              <!----------------------------------------------------------------------------------->



              <div class="tab-pane fade rem_class" id="vehicle">
                <h6 class="mt-3">Vehicle Assets</h6>
                <hr>
                <?php
                  $i = 0;
                  foreach ($vehicle_assets_data as $vehicle):
                  $i++;
                ?>
                <div class="row info-div">
                  <div class="col-md-12 p-0">
                    <p class="mb-0 border-bottom pb-2">
                      <?php echo ''.$i.') <b>Vehicle</b> with model name <b>'.$vehicle->vehicle_model_name.'</b>, registration no '.$vehicle->vehicle_registration_no.'. and make year '.$vehicle->vehicle_make_year.''; ?>
                    </p>
                    <?php
                      $estate_id = $vehicle->id;
                      $will_id = $this->session->userdata('will_id');
                      $estate_type = 'vehicle_estate';
                      $vehicle_destr_percent = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                      foreach ($vehicle_destr_percent as $vehicle_destr_percent1){
                      }
                      $vehicle_distribution_percent = $vehicle_destr_percent1->distribution_percent;
                      $remaining = 100 - $vehicle_distribution_percent;
                      if($remaining > 0){
                        $next++;
                    ?>
                    <div class="share_div">
                      <!-- <p class="mb-0 mt-2 txt-red">Remaining <?php echo $remaining; ?> %
                        <span class="percent_error txt-red" style="display:none;">Invalid value % entered.</span>
                      </p> -->
                      <form class="pt-2 distri-form" action="<?php echo base_url(); ?>Will_Controller/save_distribution" method="post">
                        <input type="hidden" id="estate_id" name="estate_id" value="<?php echo $vehicle->id; ?>">
                        <input type="hidden" id="estate_type" name="estate_type" value="vehicle_estate">
                        <input type="hidden" class="remain_assets_percent" name="remain_assets_percent" value="<?php echo $remaining; ?>">
                        <input type="hidden" name="flashdata" value="vehicle">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <select class="required form-control form-control-sm pr-0 distribution_name_title" name="distribution_name_title" id="distribution_name_title">
                              <option>Mr.</option>
                              <option>Mrs.</option>
                              <option>Ms.</option>
                            </select>
                          </div>
                          <div class="form-group col-md-8 p-0">
                            <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm distribution_name" id="inputEmail4" placeholder="Full Name">
                          </div>
                          <input type="hidden" name="distribution_percent" class="distribution_percent" value="100">
                          <!-- <div class="form-group col-md-3">
                            <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm distribution_percent" id="inputPassword4" placeholder="%">
                          </div> -->
                          <div class="form-group col-md-2 align-self-center">
                            <button type="button" class="btn btn-sm btn-success w-100 real_estate_save_share">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  <?php } else{ ?>
                    <p class="mb-0 mt-2 txt-green">Distribution completed.</p>
                  <?php } ?>
                  </div>
                </div>
                <hr class="mt-1 mb-0">
                <?php endforeach; ?>
              </div>

              <!-------------------------------------------------------------------------------------->
              <!------------------------------ Other Gift Add Destribution --------------------------->
              <!-------------------------------------------------------------------------------------->


              <div class="tab-pane fade rem_class" id="other_gifts">
                <h6 class="mt-3">Other Gift Assets</h6>
                <hr>
                <?php
                  $i = 0;
                  foreach ($other_gift_data as $other_gift) {
                  $i++;
                ?>
                <div class="row info-div">
                  <div class="col-md-12 p-0">
                    <p class="mb-0 border-bottom pb-2">
                      <?php echo ''.$i.') Gift Type : '.$other_gift->gift_type.', <br> Description : '.$other_gift->gift_description.''; ?>
                    </p>

                    <?php
                      $estate_id = $other_gift->id;
                      $will_id = $this->session->userdata('will_id');
                      $estate_type = 'other_gift_estate';
                      $gift_destr_percent = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                      foreach ($gift_destr_percent as $gift_destr_percent1){
                      }
                      $vehicle_distribution_percent = $gift_destr_percent1->distribution_percent;
                      $remaining = 100 - $vehicle_distribution_percent;
                      if($remaining > 0){
                        $next++;
                    ?>
                    <div class="share_div">
                      <p class="mb-0 mt-2 txt-red">Remaining <?php echo $remaining; ?> %
                        <span class="percent_error txt-red" style="display:none;">Invalid value % entered.</span>
                      </p>
                      <form class="pt-2 distri-form" action="<?php echo base_url(); ?>Will_Controller/save_distribution" method="post">
                        <input type="hidden" id="estate_id" name="estate_id" value="<?php echo $other_gift->id; ?>">
                        <input type="hidden" id="estate_type" name="estate_type" value="other_gift_estate">
                        <input type="hidden" class="remain_assets_percent" name="remain_assets_percent" value="<?php echo $remaining; ?>">
                        <input type="hidden" name="flashdata" value="other_gifts">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <select class="required form-control form-control-sm pr-0 distribution_name_title" name="distribution_name_title" id="distribution_name_title">
                              <option>Mr.</option>
                              <option>Mrs.</option>
                              <option>Ms.</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 p-0">
                            <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm distribution_name" id="inputEmail4" placeholder="Full Name">
                          </div>
                          <!-- <input type="hidden" name="distribution_percent" class="distribution_percent" value="100"> -->
                          <div class="form-group col-md-2">
                            <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm distribution_percent" id="inputPassword4" placeholder="%">
                          </div>
                          <div class="form-group col-md-2 align-self-center">
                            <button type="button" class="btn btn-sm btn-success w-100 real_estate_save_share">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  <?php } else{ ?>
                    <p class="mb-0 mt-2 txt-green">Distribution completed.</p>
                  <?php } ?>

                  </div>
                </div>
                <hr class="mt-1 mb-0">
                <?php } ?>
              </div>

              <!------------------------------------------------------------------------------------->
              <!------------------------------ Omited Assets Destribution --------------------------->
              <!------------------------------------------------------------------------------------->


              <div class="tab-pane fade rem_class" id="omitted">
                <h6 class="mt-3">Omited Assets</h6>
                <hr>

                <div class="row info-div">
                  <div class="col-md-12 p-0">
                    <p class="mb-0 border-bottom pb-2">
                      Any assets, movable or immovable, which might be omitted from being mentioned in this will or which may hereafter be acquired by me.
                    </p>

                    <?php
                      $estate_id = '-1';
                      $will_id = $this->session->userdata('will_id');
                      $estate_type = 'omited_estate';
                      $omited_destr_percent = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                      foreach ($omited_destr_percent as $omited_destr_percent1){
                      }
                      $om_destr_percent = $omited_destr_percent1->distribution_percent;
                      $remaining = 100 - $om_destr_percent;
                      if($remaining > 0){
                        $next++;
                    ?>
                    <div class="share_div">
                      <p class="mb-0 mt-2 txt-red">Remaining <?php echo $remaining; ?> %
                        <span class="percent_error txt-red" style="display:none;">Invalid value % entered.</span>
                      </p>

                      <form class="pt-2 distri-form" action="<?php echo base_url(); ?>Will_Controller/save_distribution" method="post">
                        <input type="hidden" id="estate_id" name="estate_id" value="-1">
                        <input type="hidden" id="estate_type" name="estate_type" value="omited_estate">
                        <input type="hidden" class="remain_assets_percent" name="remain_assets_percent" value="<?php echo $remaining; ?>">
                        <input type="hidden" name="flashdata" value="omited">
                        <div class="form-row">
                          <div class="form-group col-md-2">
                            <select class="required form-control form-control-sm pr-0 distribution_name_title" name="distribution_name_title" id="distribution_name_title">
                              <option>Mr.</option>
                              <option>Mrs.</option>
                              <option>Ms.</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 p-0">
                            <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm distribution_name" id="inputEmail4" placeholder="Full Name">
                          </div>
                          <!-- <input type="hidden" name="distribution_percent" class="distribution_percent" value="100"> -->
                          <div class="form-group col-md-2">
                            <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm distribution_percent" id="inputPassword4" placeholder="%">
                          </div>
                          <div class="form-group col-md-2 align-self-center">
                            <button type="button" class="btn btn-sm btn-success w-100 real_estate_save_share">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  <?php } else{ ?>
                    <p class="mb-0 mt-2 txt-green">Distribution completed.</p>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--------------------------------------------------------------------------------------->
          <!------------------------------ Next and Prev Buttons----------------------------------->
          <!--------------------------------------------------------------------------------------->

          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="destribution_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <?php if($next > 0){ ?>
                <p style="color:red;"><b>Complete Destribution for Next</b></p>
              <?php } else{ ?>
                <button type="button" class="btn btn-md btn-primary" id="destribution_next_btn">Next</button>
            <?php  } ?>
            </div>
          </div>
        </div>



<!--------------------------------------------------------------------------------------->
<!------------------------------ Destribution Details ----------------------------------->
<!--------------------------------------------------------------------------------------->



        <div class="col-md-6">
          <h5 class="txt-black">Distribution Details</h5>

        <!-------------------------------------------------------------------------------------------------->
        <!------------------------------ Real Estate Distribution Details----------------------------------->
        <!-------------------------------------------------------------------------------------------------->

        <!-- Real Estate Distribution Display... -->
        <?php if($real_estate_data){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Real Estate Distribution</h6>
            <hr>
            <?php
              $i=0;
              foreach($real_estate_data as $real1){
              $i++;
              $estate_id = $real1->id;
              $will_id = $this->session->userdata('will_id');
              $estate_type = 'real_estate';
              $real_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);

              $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
              foreach ($destr_data as $destr_data1){
              }
              $distribution_percent = $destr_data1->distribution_percent;
              $real_remaining = 100 - $distribution_percent;
            ?>
            <div class="row info-div">
              <div class="col-md-12">
                <?php if($real_destr_data){ ?>
                  <p class="mb-0 border-bottom pb-2">
                    <?php
                      echo '<b>'.$i.') <span class="estate_type">'.$real1->estate_type.'</span></b> no. <span class="estate_number">'.$real1->estate_number.'</span>';
                     ?>
                  </p>
                  <table class="table w-100 distri_table mb-0 pl-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">%</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php $j = 0; foreach ($real_destr_data as $real_destr_data1){  $j++ ?>
                      <tr>
                        <td><?php echo $j; ?></td>
                        <td><?php echo $real_destr_data1->distribution_name_title.' '.$real_destr_data1->distribution_name; ?></td>
                        <td><?php echo $real_destr_data1->distribution_percent; ?></td>
                        <td width="100px">
                          <input type="hidden" class="distribution_id" value="<?php echo $real_destr_data1->id; ?>">
                          <input type="hidden" class="distribution_estate_type" value="Real Estate">
                          <input type="hidden" class="distribution_estate_details" value="<?php echo ''.$real1->estate_type.', No.'.$real1->estate_number.'';?>">
                          <input type="hidden" class="distribution_name_title" value="<?php echo $real_destr_data1->distribution_name_title; ?>">
                          <input type="hidden" class="distribution_estate_person" value="<?php echo $real_destr_data1->distribution_name; ?>">
                          <input type="hidden" class="distribution_estate_percent" value="<?php echo $real_destr_data1->distribution_percent; ?>">
                          <input type="hidden" class="distribution_remaining_per" value="<?php echo $real_remaining; ?>">
                          <input type="hidden" class="distribution_flashdata" value="real">

                          <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                            <a class="col-6 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                            <a class="col-6 text-center p-0 edit_destribution" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                          </button>
                        </td>
                      </tr>
                    <?php  } ?>
                  </table>
                  <hr class="mt-0">
                <?php } ?>
              </div>
            </div>

            <?php } ?>
          </div>
          <?php } ?>

          <!-------------------------------------------------------------------------------->
          <!------------------------------ Bank Distribution Details ----------------------->
          <!-------------------------------------------------------------------------------->

          <?php if($bank_assets_data ){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Bank Assets Distribution</h6>
            <hr>
            <?php
              $i=0;
              foreach($bank_assets_data as $bank1){
              $i++;
              $assets_type = $bank1->account_type;
              $estate_id = $bank1->id;
              $will_id = $this->session->userdata('will_id');
              $estate_type = 'bank_estate';
              $bank_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);

              $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
              foreach ($destr_data as $destr_data1){
              }
              $distribution_percent = $destr_data1->distribution_percent;
              $bank_remaining = 100 - $distribution_percent;
            ?>
            <div class="row info-div">
              <div class="col-md-12">
                <?php if($bank_destr_data){ ?>
                  <p class="mb-0 border-bottom pb-2">
                    <?php
                      echo '<b>'.$i.') '.$assets_type.'</b> - Name : '.$bank1->bank_name.', Branch : '.$bank1->bank_branch.', No : '.$bank1->account_number.'';
                    ?>
                  </p>
                  <table class="table w-100 distri_table mb-0 pl-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">%</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php $j = 0; foreach ($bank_destr_data as $bank_destr_data1){  $j++ ?>
                      <tr>
                        <td><?php echo $j; ?></td>
                        <td><?php echo $bank_destr_data1->distribution_name_title.' '.$bank_destr_data1->distribution_name; ?></td>
                        <td><?php echo $bank_destr_data1->distribution_percent; ?></td>
                        <td width="100px">
                          <input type="hidden" class="distribution_id" value="<?php echo $bank_destr_data1->id; ?>">
                          <input type="hidden" class="distribution_estate_type" value="Real Estate">
                          <input type="hidden" class="distribution_estate_details" value="<?php echo ''.$assets_type.' <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$bank1->bank_name.', Branch: '.$bank1->bank_branch.', <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No: '.$bank1->account_number; ?>">
                          <input type="hidden" class="distribution_name_title" value="<?php echo $bank_destr_data1->distribution_name_title; ?>">
                          <input type="hidden" class="distribution_estate_person" value="<?php echo $bank_destr_data1->distribution_name; ?>">
                          <input type="hidden" class="distribution_estate_percent" value="<?php echo $bank_destr_data1->distribution_percent; ?>">
                          <input type="hidden" class="distribution_remaining_per" value="<?php echo $bank_remaining; ?>">
                          <input type="hidden" class="distribution_flashdata" value="bank">

                          <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                            <a class="col-6 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                            <a class="col-6 text-center p-0 edit_destribution" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                          </button>
                        </td>
                      </tr>
                    <?php  } ?>
                  </table>
                  <hr class="mt-0">
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        <?php } ?>

            <!-------------------------------------------------------------------------------->
            <!------------------------------ Vehicle Distribution Details -------------------->
            <!-------------------------------------------------------------------------------->


          <?php if($vehicle_assets_data && !$vehicle_distribution_percent < 100){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Vehicle Distribution</h6>
              <hr>
              <?php
                $i=0;
                foreach($vehicle_assets_data as $vehicle1){
                $i++;
                $estate_id = $vehicle1->id;
                $will_id = $this->session->userdata('will_id');
                $estate_type = 'vehicle_estate';
                $vehicle_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
                // Get Remaining % ...
                $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                foreach ($destr_data as $destr_data1){
                }
                $distribution_percent = $destr_data1->distribution_percent;
                $vehicle_remaining = 100 - $distribution_percent;
              ?>
              <div class="row info-div">
                <div class="col-md-12">
                  <?php if($vehicle_destr_data){ ?>
                    <p class="mb-0 border-bottom pb-2">
                      <?php echo '<b>'.$i.') Vehicle - '.$vehicle1->vehicle_model_name.'</b>, No. : '.$vehicle1->vehicle_registration_no.'. Year : '.$vehicle1->vehicle_make_year.''; ?>
                    </p>
                    <table class="table w-100 distri_table mb-0 pl-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <!-- <th scope="col">%</th> -->
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <?php $j = 0; foreach ($vehicle_destr_data as $vehicle_destr_data1){  $j++ ?>
                        <tr>
                          <td><?php echo $j; ?></td>
                          <td><?php echo $vehicle_destr_data1->distribution_name_title.' '.$vehicle_destr_data1->distribution_name; ?></td>
                          <!-- <td><?php echo $vehicle_destr_data1->distribution_percent; ?></td> -->
                          <td  width="100px">
                            <input type="hidden" class="distribution_id" value="<?php echo $vehicle_destr_data1->id; ?>">
                            <input type="hidden" class="distribution_estate_type" value="Real Estate">
                            <input type="hidden" class="distribution_estate_details" value="<?php echo 'Vehicle - '.$vehicle1->vehicle_model_name.', <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. : '.$vehicle1->vehicle_registration_no.'. <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Year : '.$vehicle1->vehicle_make_year.''; ?>">
                            <input type="hidden" class="distribution_name_title" value="<?php echo $vehicle_destr_data1->distribution_name_title; ?>">
                            <input type="hidden" class="distribution_estate_person" value="<?php echo $vehicle_destr_data1->distribution_name; ?>">
                            <input type="hidden" class="distribution_estate_percent" value="<?php echo $vehicle_destr_data1->distribution_percent; ?>">
                            <input type="hidden" class="distribution_remaining_per" value="<?php echo $vehicle_remaining; ?>">
                            <input type="hidden" class="distribution_flashdata" value="vehicle">

                            <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                              <a class="col-12 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                              <!-- <a class="col-6 text-center p-0 edit_destribution" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a> -->
                            </button>
                          </td>
                        </tr>
                      <?php  } ?>
                    </table>
                    <hr class="mt-0">
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          <?php } ?>

          <!-------------------------------------------------------------------------------->
          <!------------------------------ Gift Distribution Details ----------------------->
          <!-------------------------------------------------------------------------------->

          <?php if($other_gift_data){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Other Gift Distribution</h6>
              <hr>
              <?php
                $i=0;
                foreach($other_gift_data as $other_gift1){
                $i++;
                $estate_id = $other_gift1->id;
                $will_id = $this->session->userdata('will_id');
                $estate_type = 'other_gift_estate';
                $gift_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);

                // Get Remaining % ...
                $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
                foreach ($destr_data as $destr_data1){
                }
                $distribution_percent = $destr_data1->distribution_percent;
                $gift_remaining = 100 - $distribution_percent;
              ?>
              <div class="row info-div">
                <div class="col-md-12">
                  <?php if($gift_destr_data){ ?>
                    <p class="mb-0 border-bottom pb-2">
                      <?php echo ''.$i.') Gift Type : '.$other_gift1->gift_type.', <br> Description : '.$other_gift1->gift_description.''; ?>
                    </p>
                    <table class="table w-100 distri_table mb-0 pl-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">%</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <?php $j = 0; foreach ($gift_destr_data as $gift_destr_data1){  $j++ ?>
                        <tr>
                          <td><?php echo $j; ?></td>
                          <td><?php echo $gift_destr_data1->distribution_name_title.' '.$gift_destr_data1->distribution_name; ?></td>
                          <td><?php echo $gift_destr_data1->distribution_percent; ?></td>
                          <td  width="100px">
                            <input type="hidden" class="distribution_id" value="<?php echo $gift_destr_data1->id; ?>">
                            <input type="hidden" class="distribution_estate_type" value="Real Estate">
                            <input type="hidden" class="distribution_estate_details" value="<?php echo 'Gift Type : '.$other_gift1->gift_type.', <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Description : '.$other_gift1->gift_description; ?>">
                            <input type="hidden" class="distribution_name_title" value="<?php echo $gift_destr_data1->distribution_name_title; ?>">
                            <input type="hidden" class="distribution_estate_person" value="<?php echo $gift_destr_data1->distribution_name; ?>">
                            <input type="hidden" class="distribution_estate_percent" value="<?php echo $gift_destr_data1->distribution_percent; ?>">
                            <input type="hidden" class="distribution_remaining_per" value="<?php echo $gift_remaining; ?>">
                            <input type="hidden" class="distribution_flashdata" value="other_gifts">

                            <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                              <a class="col-6 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                              <a class="col-6 text-center p-0 edit_destribution" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                            </button>
                          </td>
                        </tr>
                      <?php  } ?>
                    </table>
                    <hr class="mt-0">
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          <?php } ?>

          <!-------------------------------------------------------------------------------->
          <!------------------------------ Omited Assets Distribution Details ----------------------->
          <!-------------------------------------------------------------------------------->

          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Omited Assets Distribution</h6>
            <hr>
            <?php
              $i=0;
              $i++;
              $estate_id = '-1';
              $will_id = $this->session->userdata('will_id');
              $estate_type = 'omited_estate';
              $ommit_destr_data = $this->Will_Model->get_distribution_list($estate_id, $will_id, $estate_type);
              // Get Remaining % ...
              $destr_data = $this->Will_Model->get_distribution_percent($estate_id, $will_id, $estate_type);
              foreach ($destr_data as $destr_data1){
              }
              $distribution_percent = $destr_data1->distribution_percent;
              $ommit_remaining = 100 - $distribution_percent;
            ?>
            <div class="row info-div">
              <div class="col-md-12">
                <?php if($ommit_destr_data){ ?>
                  <p class="mb-0 border-bottom pb-2">
                      Any assets, movable or immovable, which might be omitted from being mentioned in this will or which may hereafter be acquired by me
                  </p>
                  <table class="table w-100 distri_table mb-0 pl-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">%</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php $j = 0; foreach ($ommit_destr_data as $ommit_destr_data1){  $j++ ?>
                      <tr>
                        <td><?php echo $j; ?></td>
                        <td><?php echo $ommit_destr_data1->distribution_name_title.' '.$ommit_destr_data1->distribution_name; ?></td>
                        <td><?php echo $ommit_destr_data1->distribution_percent; ?></td>
                        <td  width="100px">
                          <input type="hidden" class="distribution_id" value="<?php echo $ommit_destr_data1->id; ?>">
                          <input type="hidden" class="distribution_estate_type" value="Omited Estate">
                          <input type="hidden" class="distribution_estate_details" value="<?php echo 'Assets Type : Omited Estate'?>">
                          <input type="hidden" class="distribution_name_title" value="<?php echo $ommit_destr_data1->distribution_name_title; ?>">
                          <input type="hidden" class="distribution_estate_person" value="<?php echo $ommit_destr_data1->distribution_name; ?>">
                          <input type="hidden" class="distribution_estate_percent" value="<?php echo $ommit_destr_data1->distribution_percent; ?>">
                          <input type="hidden" class="distribution_remaining_per" value="<?php echo $ommit_remaining; ?>">
                          <input type="hidden" class="distribution_flashdata" value="omited">

                          <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                            <a class="col-6 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                            <a class="col-6 text-center p-0 edit_destribution" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                          </button>
                        </td>
                      </tr>
                    <?php  } ?>
                  </table>
                  <hr class="mt-0">
                <?php } ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal Real Estate Update-->
  <div class="modal fade" id="edit_destribution_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Update Destribution</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="pt-2 distri_update_form" action="<?php echo base_url(); ?>Will_Controller/update_distribution" method="post">
            <input type="hidden" id="edit_distribution_id" name="distribution_id">
            <input type="hidden" id="rem_per" name="rem_per">
            <input type="hidden" id="flashdata" name="flashdata">
            <div class="form-row">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Name </label>
              <div class="form-group col-md-2">
                <select class="required form-control form-control-sm pr-0 edit_distribution_name_title" name="distribution_name_title" id="edit_distribution_name_title">
                  <option>Mr.</option>
                  <option>Mrs.</option>
                  <option>Ms.</option>
                </select>
              </div>
              <div class="form-group col-md-7">
                <input type="text" name="distribution_name" class="required text title-case form-control form-control-sm edit_distribution_name" id="edit_distribution_name" placeholder="Full Name">
              </div>
            </div>
            <div class="form-row">
              <label class="col-md-3 text-right" for="exampleInputEmail1">Percentage </label>
              <div class="form-group col-md-3">
                <input type="text" name="distribution_percent" class="required only_number form-control form-control-sm edit_distribution_percent" id="edit_distribution_percent" placeholder="%">
              </div>
              <div class="form-group col-md-6">
                <p class="f-14 txt-green edit_rem_per"></p>
              </div>
            </div>
            <p class="f-14 txt-red text-center per_error" style="display:none;">Invalid percentage value</p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn_update_destribution_confirm" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Real Estate Delete-->
  <div class="modal fade" id="delete_destribution_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete This Destribution</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-info"></div>
          <input type="hidden" name="modal_distribution_id" id="modal_distribution_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn_delete_destribution_confirm" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row alert-div w-100" id="alert_success">
    <div class="col-md-12">
      <div class="alert alert-success " role="alert">
        Information Saved Successfully.
      </div>
    </div>
  </div>

  <div class="row alert-div w-100" id="alert_update">
    <div class="col-md-12">
      <div class="alert alert-success " role="alert">
        Information Updated Successfully.
      </div>
    </div>
  </div>

  <div class="row alert-div w-100" id="alert_delete">
    <div class="col-md-12">
      <div class="alert alert-success " role="alert">
        Information Deleted Successfully.
      </div>
    </div>
  </div>


<!-- footer -->
  <?php include(__DIR__ .'../../footer.php');  ?>
  <script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
  <script src="<?php echo base_url(); ?>assets/js/will_js/distribution_js.js"></script>
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
        else if(assets_open_tab == 'omited'){
          $('#omitted').addClass('active');
          $('#omitted').addClass('show');
          $('#omitted_tab').addClass('active');
        }
      });
    </script>
  <?php } ?>
  <?php $is_success = $this->session->flashdata('is_success');
    if($is_success){ ?>
      <input type="hidden" id="is_success" value="<?php echo $is_success; ?>">
      <script type="text/javascript">
        $(document).ready(function(){
          var is_success = $('#is_success').val();
          if(is_success == 'save'){
            $('#alert_success').fadeIn(1000);
            $('#alert_success').delay(3000).fadeOut(1000);
          }
          else if(is_success == 'update'){
            $('#alert_update').fadeIn(1000);
            $('#alert_update').delay(3000).fadeOut(1000);
          }
          else if(is_success == 'delete'){
            $('#alert_delete').fadeIn(1000);
            $('#alert_delete').delay(3000).fadeOut(1000);
          }
        });
      </script>
  <?php }  ?>
  </body>
</html>
