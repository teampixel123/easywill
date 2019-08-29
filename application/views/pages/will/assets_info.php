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

  <section class="terms">
    <div class="text-center">
      <h1 class="">Start Your Will Now</h1>
    </div>
  </section>
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
                <a id="vehicle_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts"><i class="fa fa-gift fa-2x"  ></i></br> Vehicle</a>
              </li>
              <!-- <li class="nav-item " style="width:25%;">
                <a id="other_gifts_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts "><i class="fa fa-gift fa-2x"  ></i></br> Other Gifts </a>
              </li> -->
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active show rem_class" id="real_estate">
                <form class="" id="form_real_estate" action="<?php echo base_url(); ?>Will_Controller/save_real_estate_info" method="post">
                  <input type="hidden" name="real_estate_id" id="real_estate_id2">
                  <fieldset>
                    <div class="form-group mt-4">
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
                bank_assets
              </div>
              <div class="tab-pane fade rem_class" id="vehicle">
                vehicle
              </div>
              <div class="tab-pane fade rem_class" id="other_gifts">
                other_gifts
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="assets_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <?php if($real_estate_data){ ?>
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
          <div class="info-box pt-3">
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
                   <span class="measurement_unit">'.$real1->measurement_unit.'</span>
                   </b>, located at <span class="real_estate_address">'.$real1->real_estate_address.'</span>,
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
                  <a data-toggle="modal" data-target="#exampleModal" class="badge1 badge-pill real_estate_delete" title="Delete Family Member"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  <a class="badge1 badge-pill real_estate_edit" title="Edit Family Member"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                </button>
              </div>
            </div>
            <hr>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete</h5>
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

  <!-- <section class="p-2 protect mt-5 text-center">
    <h2>Protect Your Family Today </h2>
  </section> -->

<!-- footer -->
  <?php include(__DIR__ .'../../footer.php');  ?>
  <script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
  <script src="<?php echo base_url(); ?>assets/js/will_js/start_will.js"></script>
  <script type="text/javascript">
  $('#family_person_dob').datepicker({
    format: 'dd/mm/yyyy',
  });
  </script>
  </body>
</html>
