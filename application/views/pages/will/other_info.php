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

  <div class="container-fluid mt-3">
    <ul class="list-unstyled multi-steps m-0 pt-3 pb-3">
      <li class="personal-tab" >Personal Information</li>
      <li class="family-tab">Family Information</li>
      <li class="assets-tab">Assets</li>
      <li class="executor-tab">Distribution</li>
      <li class="witness-tab is-active">Other Information</li>
    </ul>
  </div>

  <?php

      $will_place = $will_data->will_place;

  ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="input-box p-4">
            <h5 class="text-left txt-black mb-4 ">Other Information </h5>

            <ul class="nav nav-tabs">
                <li class="nav-item text-center" style="width:25%;">
                  <a style="height:100px;" id="executor_tab" class="nav-link active rem_class" data-toggle="tab" href="#executor"><i class="fa fa-user fa-2x"  ></i></br>Executor</a>
                </li>
                <li class="nav-item text-center" style="width:26%;">
                  <a style="height:100px;" id="witness_tab" class="nav-link rem_class" data-toggle="tab" href="#witness"><i class="fa fa-users fa-2x" ></i></br>Witness</a>
                </li>
              <li class="nav-item text-center" style="width:24%;">
                <a style="height:100px;" id="adequate_provision_tab" class="nav-link rem_class" data-toggle="tab" href="#adequate_provision"><i class="fa fa-user-times fa-2x"  ></i></br>Exclude Person</a>
              </li>
              <li class="nav-item text-center" style="width:24%;">
                <a style="height:100px;" id="date_place_tab" class="nav-link rem_class" data-toggle="tab" href="#date_place"><i class="fa fa-calendar fa-2x"  ></i></br>Date and Place</a>
              </li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active show rem_class" id="executor">
                <h6 class="mt-3">Add Executor</h6>
                <hr>
                <form class="" id="form_save_executor" action="<?php echo base_url(); ?>Will_Controller/save_executor_info" method="post">
                  <input type="hidden" name="executor_id" id="executor_id">
                  <fieldset>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Executor Name</label>
                        <div class="col-md-2 pr-1">
                          <select class="required form-control form-control-sm pl-0 pr-0" name="executor_name_title" id="executor_name_title">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                          </select>
                        </div>
                        <div class="col-md-8 pl-1">
                					<input type="text" name="executor_name" id="executor_name" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Executor Address</label>

                        <div class="col-md-10">
                					<input type="text" name="executor_address" id="executor_address" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>

                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="executor_update_btn">Update</button>
                      <?php
                      $ex_num = 0;
                      foreach ($executor_info as $executor_list) {
                        $ex_num++;
                      }
                      if($ex_num < 2){ ?>
                        <button type="button" class="btn btn-md btn-success" id="executor_save_btn"> Save </button>
                      <?php } else{ ?>
                        <p class="txt-red f-14 m-0">You can add only 2 executors</p>
                      <?php  } ?>
                    </div>

                  </fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="witness">
                <h6 class="mt-3">Add witness</h6>
                <p class="f-14">*Two witness required</p>
                <hr>
                <form class="" id="form_save_witness" action="<?php echo base_url(); ?>Will_Controller/save_witness_info" method="post">
                  <input type="hidden" name="witness_id" id="witness_id">
                  <fieldset>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Witness Name</label>
                        <div class="col-md-2 pr-1">
                          <select class="required form-control form-control-sm pl-0 pr-0" name="witness_name_title" id="witness_name_title">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                          </select>
                        </div>
                        <div class="col-md-8 pl-1">
                					<input type="text" name="witness_name" id="witness_name" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Witness Address</label>
                        <div class="col-md-10">
                					<input type="text" name="witness_address" id="witness_address" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="witness_update_btn">Update</button>
                      <?php
                      $wit_num = 0;
                      foreach ($witness_info as $witness_list) {
                        $wit_num++;
                      }
                      if($wit_num < 2){ ?>
                      <button type="button" class="btn btn-md btn-success" id="witness_save_btn"> Save </button>
                    <?php } else{ ?>
                      <p class="txt-red f-14">You can add only 2 Witness</p>
                    <?php  } ?>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="adequate_provision">
                <h6 class="mt-3">Exclude Person (Optional)</h6>
                <hr>
                <form class="" id="form_save_adequate_provision" action="<?php echo base_url(); ?>Will_Controller/save_adequate_provision_info" method="post">
                  <input type="hidden" name="adequate_provision_id" id="adequate_provision_id">
                  <fieldset>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Name</label>
                        <div class="col-md-2 pr-1">
                          <select class="required form-control form-control-sm pl-0 pr-0" name="adequate_provision_name_title" id="adequate_provision_name_title">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                          </select>
                        </div>
                        <div class="col-md-8 pl-1">
                					<input type="text" name="adequate_provision_name" id="adequate_provision_name" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right p-0" for="exampleInputEmail1">Address</label>
                        <div class="col-md-10">
                					<input type="text" name="adequate_provision_address" id="adequate_provision_address" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <button type="button" class="btn btn-md btn-primary" style="display:none" id="adequate_update_btn">Update</button>
                      <button type="button" class="btn btn-md btn-success" id="adequate_save_btn"> Save </button>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="tab-pane fade rem_class" id="date_place">
                <h6 class="mt-3">Add Date & Place</h6>
                <hr>
                <form class="" id="form_save_date_place" action="<?php echo base_url(); ?>Will_Controller/save_date_place_info" method="post">
                  <fieldset>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right" for="exampleInputEmail1">Date</label>
                        <div class="col-md-8">
                					<input type="text" name="will_date" id="will_date" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row text-center">
                        <label class="col-md-2 f-14 text-right" for="exampleInputEmail1">Place</label>
                        <div class="col-md-8">
                					<input type="text" name="will_place" id="will_place" value="" class="required address title-case form-control form-control-sm" placeholder="">
                				</div>
                      </div>
                    </div>
                    <div class="form-group text-right mt-4 mr-3" >
                      <!-- <button type="button" class="btn btn-md btn-primary" style="display:none" id="date_place_update_btn">Update</button> -->
                      <button type="button" class="btn btn-md btn-success" id="date_place_save_btn"> Save </button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>

          <!--***************************** Bottom Buttons *************************-->

          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="other_info_prev_btn">Previous</button>
            </div>
            <?php if($ex_num < 1 || $wit_num < 2 || !$will_place){ ?>
              <p class="f-14 txt-red f-waight-6">Fill all information for Create PDF.</p>
            <?php } else{ ?>
              <div class="col-6 mb-5 text-right">
                <button type="button" id="create_pdf_btn" class="btn btn-md btn-success" id="">Create PDF</button>
              </div>
            <?php } ?>
          </div>
          <?php
          $will_id = $this->session->userdata('will_id');
          if($user_is_login && $user_id && $will_id){
            $is_blur = $will_data->is_blur;
            if($is_blur == 'yes'){ ?>
              <form target="_blank" class="create_pdf" id="create_pdf_form" action="<?php echo base_url(); ?>Pdf_Controller/blur_pdf" method="post">
                <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
              </form>
            <?php  } else{ ?>
              <form target="_blank" class="create_pdf" id="create_pdf_form" action="<?php echo base_url(); ?>Pdf_Controller/final_pdf" method="post">
                <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
                <input type="hidden" id="is_final_pdf" value="yes">
              </form>
            <?php } ?>
          <?php } else{ ?>
            <form target="_blank" class="create_pdf" id="create_pdf_form" action="<?php echo base_url(); ?>Pdf_Controller/blur_pdf" method="post">
              <input type="hidden" name="will_id" value="<?php echo $this->session->userdata('will_id'); ?>">
            </form>
          <?php } ?>

          <!-- <?php if(isset($_COOKIE['set_update'])){ ?>
            <input type="hidden" id="is_update" value="yes">
          <?php } ?> -->





        </div>

        <div class="col-md-6">
          <h5 class="txt-black">Other Details</h5>

          <!--**************** Executor Details ****************-->

          <?php if($executor_info){ ?>
            <div class="info-box mb-2">
              <h5 class="txt-black f-16 f-waight-6">Executor Details</h5>
              <hr class="mb-1">
              <?php
                $ex = 0;
                foreach ($executor_info as $executor_list1) {
                $ex++;
              ?>
                <div class="row info-div">
                  <div class="col-md-10">
                    <p class="mb-0">
                      <?php echo ''.$ex.') Name : '.$executor_list1->executor_name_title.' '.$executor_list1->executor_name.'<br> &nbsp;&nbsp;&nbsp;&nbsp; Address : '.$executor_list1->executor_address; ?>
                    </p>
                  </div>
                  <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                    <input type="hidden" class="id" name="exec_id" value="<?php echo $executor_list1->id; ?>">
                    <input type="hidden" class="name_title" name="exec_name_title" value="<?php echo $executor_list1->executor_name_title; ?>">
                    <input type="hidden" class="name" name="exec_name" value="<?php echo $executor_list1->executor_name; ?>">
                    <input type="hidden" class="addr" name="exec_addr" value="<?php echo $executor_list1->executor_address; ?>">
                    <input type="hidden" class="type" name="type" value="Executor">

                    <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                      <a class="col-6 text-center p-0 edit_executor" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                      <a class="col-6 text-center p-0 delete_other_info" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                    </button>
                  </div>
                </div>
                <hr class="mb-1 mt-1">
              <?php  }  ?>
            </div>
          <?php } ?>

          <!--**************** Witness Details ****************-->

          <?php if($witness_info){ ?>
            <div class="info-box  mb-2">
              <h5 class="txt-black f-16 f-waight-6">Witness Details</h5>
              <hr class="mb-1">
              <?php
                $wit = 0;
                foreach ($witness_info as $witness_list1) {
                $wit++;
              ?>
                <div class="row info-div">
                  <div class="col-md-10">
                    <p class="mb-0">
                      <?php echo ''.$wit.') Name : '.$witness_list1->witness_name_title.' '.$witness_list1->witness_name.'<br> &nbsp;&nbsp;&nbsp;&nbsp; Address : '.$witness_list1->witness_address; ?>
                    </p>
                  </div>
                  <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                    <input type="hidden" class="id" name="exec_id" value="<?php echo $witness_list1->id; ?>">
                    <input type="hidden" class="name_title" name="name_title" value="<?php echo $witness_list1->witness_name_title; ?>">
                    <input type="hidden" class="name" name="name" value="<?php echo $witness_list1->witness_name; ?>">
                    <input type="hidden" class="addr" name="addr" value="<?php echo $witness_list1->witness_address; ?>">
                    <input type="hidden" class="type" name="type" value="Witness">

                    <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                      <a class="col-6 text-center p-0 edit_witness" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                      <a class="col-6 text-center p-0 delete_other_info" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                    </button>
                  </div>
                </div>
                <hr class="mb-1 mt-1">
              <?php  }  ?>
            </div>
          <?php } ?>


          <!--**************** Witness Details ****************-->

          <?php if($adequate_provision_info){ ?>
            <div class="info-box  mb-2">
              <h5 class="txt-black f-16 f-waight-6">Adequate Provision Details</h5>
              <hr class="mb-1">
              <?php
                $adq = 0;
                foreach ($adequate_provision_info as $adequate_provision_list1) {
                $adq++;
              ?>
                <div class="row info-div">
                  <div class="col-md-10">
                    <p class="mb-0">
                      <?php echo ''.$adq.') Name : '.$adequate_provision_list1->adequate_provision_name_title.' '.$adequate_provision_list1->adequate_provision_name.'<br> &nbsp;&nbsp;&nbsp;&nbsp; Address : '.$adequate_provision_list1->adequate_provision_address; ?>
                    </p>
                  </div>
                  <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                    <input type="hidden" class="id" name="exec_id" value="<?php echo $adequate_provision_list1->id; ?>">
                    <input type="hidden" class="name_title" name="name_title" value="<?php echo $adequate_provision_list1->adequate_provision_name_title; ?>">
                    <input type="hidden" class="name" name="name" value="<?php echo $adequate_provision_list1->adequate_provision_name; ?>">
                    <input type="hidden" class="addr" name="addr" value="<?php echo $adequate_provision_list1->adequate_provision_address; ?>">
                    <input type="hidden" class="type" name="type" value="Adequate Provision">

                    <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                      <a class="col-6 text-center p-0 edit_adequate" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                      <a class="col-6 text-center p-0 delete_other_info" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                    </button>
                  </div>
                </div>
                <hr class="mb-1 mt-1">
              <?php  }  ?>
            </div>
          <?php } ?>

          <?php if($will_place){ ?>

            <div class="info-box  mb-2">
              <h5 class="txt-black f-16 f-waight-6">Date and Place</h5>
              <hr class="mb-1">

                <div class="row info-div">
                  <div class="col-md-10">
                    <p class="mb-0">
                      <?php echo 'Date : '.$will_data->will_date.'<br> Place : '.$will_data->will_place; ?>
                    </p>
                  </div>
                  <!-- <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                    <button style="width:70px;" type="button" name="button" class="row text-center badge1">
                      <a class="col-6 text-center p-0" ><i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;;"></i></a>
                      <a class="col-6 text-center p-0 delete_destribution" ><i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px; padding-top:3px;"></i></a>
                    </button>
                  </div> -->
                </div>
                <hr class="mb-1 mt-1">
            </div>
          <?php } ?>


        </div>
      </div>
    </div>
  </section>

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
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-black" id="exampleModalLabel">Do You want To Delete <span class="type"><span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-info">

          </div>
          <input type="hidden" name="modal_delete_id" id="modal_delete_id">
          <input type="hidden" name="modal_delete_type" id="modal_delete_type">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-other-confirm" class="btn btn-primary">Yes</button>
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
  <script src="<?php echo base_url(); ?>assets/js/will_js/other_info_js.js"></script>
  <script type="text/javascript">
  $('#will_date').datepicker({
    format: 'dd-mm-yyyy',
  });
  </script>
  <?php
  $other_open_tab = $this->session->flashdata('other_tab');
  if($other_open_tab){ ?>
    <input type="hidden" id="other_open_tab" value="<?php echo $other_open_tab; ?>">
    <script type="text/javascript">
      $(document).ready(function(){
        var other_open_tab = $('#other_open_tab').val();
        $('.rem_class').removeClass('show');
        $('.rem_class').removeClass('active');
        if(other_open_tab == 'executor'){
          $('#executor').addClass('active');
          $('#executor').addClass('show');
          $('#executor_tab').addClass('active');
        }
        else if(other_open_tab == 'witness'){
          $('#witness').addClass('active');
          $('#witness').addClass('show');
          $('#witness_tab').addClass('active');
        }
        else if(other_open_tab == 'adequate_provision'){
          $('#adequate_provision').addClass('active');
          $('#adequate_provision').addClass('show');
          $('#adequate_provision_tab').addClass('active');
        }
        else if(other_open_tab == 'date_place'){
          $('#date_place').addClass('active');
          $('#date_place').addClass('show');
          $('#date_place_tab').addClass('active');
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
