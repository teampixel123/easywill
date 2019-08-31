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
            <h5 class="text-left txt-black mb-4">Distribution of Assets </h5>
            <ul class="nav nav-tabs">
              <?php if($real_estate_data){ ?>
                <li class="nav-item text-center" style="width:25%;">
                  <a id="real_estate_tab" class="nav-link active rem_class" data-toggle="tab" href="#real_estate"><i class="fa fa-home fa-2x"  ></i></br> Real Estate</a>
                </li>
              <?php } ?>
              <?php if($bank_assets_data){ ?>
                <li class="nav-item text-center" style="width:26%;">
                  <a id="bank_assets_tab" class="nav-link rem_class" data-toggle="tab" href="#bank_assets"><i class="fa fa-university fa-2x" ></i></br> Bank Assets</a>
                </li>
              <?php } ?>
              <?php if($vehicle_assets_data){ ?>
              <li class="nav-item text-center" style="width:24%;">
                <a id="vehicle_tab" class="nav-link rem_class" data-toggle="tab" href="#vehicle"><i class="fa fa-car fa-2x"  ></i></br> Vehicle</a>
              </li>
              <?php } ?>
              <?php if($other_gift_data){ ?>
              <li class="nav-item text-center" style="width:24%;">
                <a id="other_gifts_tab" class="nav-link rem_class" data-toggle="tab" href="#other_gifts"><i class="fa fa-gift fa-2x"  ></i></br> Other Gifts</a>
              </li>
              <?php } ?>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active show rem_class" id="real_estate">
                <h6 class="mt-3">Real Estate</h6>
                <hr>
                <?php
                  $i=0;
                  foreach($real_estate_data as $real1){
                  $i++;
                ?>
                <div class="row info-div">
                  <div class="col-md-12">
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
                       <input type="hidden" id="real_estate_id" value="<?php echo $real1->id; ?>">
                    </p>
                    <p class="mb-0 mt-2">Remaining 100%</p>
                    <form class="pt-2 distri-form">
                      <div class="form-row">
                        <div class="form-group col-md-7">
                          <input type="text" class="required text title-case form-control form-control-sm" id="inputEmail4" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="number" class="required text title-case form-control form-control-sm" id="inputPassword4" placeholder="%">
                        </div>
                        <div class="form-group col-md-2 align-self-center">
                          <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
                        </div>
                      </div>
                    </form>

                  </div>
                  <!-- <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                    <button type="button" style="width:100%" class="badge1 row" title="Delete Family Member">
                      <a data-toggle="modal" data-target="#exampleModal" class="badge1 badge-pill real_estate_delete" title="Delete Real Estate"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                      <a class="badge1 badge-pill real_estate_edit" title="Edit Real Estate"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                    </button>
                  </div> -->
                </div>
                <hr class="mt-1 mb-0">
                <?php } ?>
              </div>
              <div class="tab-pane fade rem_class" id="bank_assets">
                <h6 class="mt-3">Bank Assets</h6>
                <hr>

              </div>
              <div class="tab-pane fade rem_class" id="vehicle">
                <h6 class="mt-3">Vehicle Assets</h6>
                <hr>

              </div>
              <div class="tab-pane fade rem_class" id="other_gifts">
                <h6 class="mt-3">Vehicle Assets</h6>
                <hr>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="assets_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <?php //if($real_estate_data || $bank_assets_data || $vehicle_assets_data){ ?>
                <button type="button" class="btn btn-md btn-primary" id="assets_next_btn">Next</button>
              <?php //} else{
                echo '<p style="color:red;"><b>Add Information for Next</b></p>';
            //  }?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h5 class="txt-black">Distribution Details</h5>

        <?php //if($real_estate_data){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Real Estate Distribution</h6>
            <hr>

          </div>
          <?php //} ?>
          <?php //if($bank_assets_data){ ?>
          <div class="info-box pt-3 mb-2">
            <h6 class="txt-black">Bank Assets Distribution</h6>
            <hr>
          </div>
          <?php //} ?>
          <?php //if($vehicle_assets_data){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Vehicle Distribution</h6>
              <hr>

            </div>
          <?php //} ?>
          <?php //if($other_gift_data){ ?>
            <div class="info-box pt-3 mb-2">
              <h6 class="txt-black">Other Gift Distribution</h6>
              <hr>

          <?php //} ?>
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
  //$assets_open_tab = $this->session->flashdata('assets_tab');
  //if($assets_open_tab){ ?>
    <input type="text" id="assets_open_tab" value="<?php //echo $assets_open_tab; ?>">
    <script type="text/javascript">
      // $(document).ready(function(){
      //   var assets_open_tab = $('#assets_open_tab').val();
      //   $('.rem_class').removeClass('show');
      //   $('.rem_class').removeClass('active');
      //   if(assets_open_tab == 'real'){
      //     $('#real_estate').addClass('active');
      //     $('#real_estate').addClass('show');
      //     $('#real_estate_tab').addClass('active');
      //   }
      //   else if(assets_open_tab == 'bank'){
      //     $('#bank_assets').addClass('active');
      //     $('#bank_assets').addClass('show');
      //     $('#bank_assets_tab').addClass('active');
      //   }
      //   else if(assets_open_tab == 'vehicle'){
      //     $('#vehicle').addClass('active');
      //     $('#vehicle').addClass('show');
      //     $('#vehicle_tab').addClass('active');
      //   }
      //   else if(assets_open_tab == 'other_gifts'){
      //     $('#other_gifts').addClass('active');
      //     $('#other_gifts').addClass('show');
      //     $('#other_gifts_tab').addClass('active');
      //   }
      // });
    </script>
  <?php //} ?>
  </body>
</html>
