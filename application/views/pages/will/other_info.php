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
                <a style="height:100px;" id="adequate_provision_tab" class="nav-link rem_class" data-toggle="tab" href="#adequate_provision"><i class="fa fa-user-times fa-2x"  ></i></br> Adequate Provision</a>
              </li>
              <li class="nav-item text-center" style="width:24%;">
                <a style="height:100px;" id="date_place_tab" class="nav-link rem_class" data-toggle="tab" href="#date_place"><i class="fa fa-calendar fa-2x"  ></i></br> Date and Place</a>
              </li>
            </ul>

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active show rem_class" id="executor">
                <h6 class="mt-3">Add Executor</h6>
                <hr>
              </div>
              <div class="tab-pane fade rem_class" id="witness">
                <h6 class="mt-3">Add witness</h6>
                <hr>
              </div>
              <div class="tab-pane fade rem_class" id="adequate_provision">
                <h6 class="mt-3">Make Adequate Provision</h6>
                <hr>
              </div>
              <div class="tab-pane fade rem_class" id="date_place">
                <h6 class="mt-3">Add Date & Place</h6>
                <hr>
              </div>
            </div>


            <!-- <form class="" autocomplete="off" id="form_family_info" action="<?php echo base_url() ?>Will_Controller/save_family_info" method="post">
              <fieldset>
                <h5 class="text-left txt-black mb-4 ">Family Information </h5>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Relationship</label>
                    <div class="col-md-10">
                      <select class="required text title-case form-control form-control-sm" name="relationship" id="relationship">
                        <option value="0">Select</option>

                        <option >Son</option>
                        <option >Daughter</option>
                      </select>
            				</div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Name</label>
                    <div class="col-md-10">
            					<input type="text" name="family_person_name" id="family_person_name" value="" class="required text title-case form-control form-control-sm" placeholder="">
            				</div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Birthdate</label>
                    <div class="col-md-6">
            					<input type="text" name="family_person_dob" id="family_person_dob" value="" class="required form-control form-control-sm" placeholder="" readonly style="background:#fff;">
                      <p id="invalide_dob" style="color:red; display:none" class="text-left valide">*Invalide Birthdate.</p>
                    </div>
                  </div>
                </div>
                <div class="" id="guardian_div" style="display:none;">
                  <div class="form-group">
                    <div class="row text-center">
                      <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Guardian Name</label>
                      <div class="col-md-2 pr-0">
                        <select class="required form-control form-control-sm pr-0" name="guardian_name_title" id="guardian_name_title">
                          <option>Mr.</option>
                          <option>Mrs.</option>
                          <option>Ms.</option>
                        </select>
              				</div>
                      <div class="col-md-8">
              					<input type="text" name="guardian_name" id="guardian_name" value="" class="required text title-case form-control form-control-sm" placeholder="">
              				</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row text-center">
                      <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Child Major Age</label>
                      <div class="col-md-6">
              					<input type="text" name="major_age" id="major_age" value="" class="required only_number age-major form-control form-control-sm" placeholder="Age in Year">
              				</div>
                    </div>
                  </div>
                </div>

                <input type="hidden" id="family_person_age" name="family_person_age">
                <input type="hidden" id="today" name="today" value="<?php echo date('d-m-Y'); ?>">
                <input type="hidden" name="member_id" id="member_id">

                <?php //if($personal_info){ ?>
                  <div class="form-group text-right mt-4 mr-3" >
                    <button type="button" class="btn btn-md btn-primary" style="display:none" id="family_update_btn">Update</button>
                    <button type="button" class="btn btn-md btn-success" id="family_save_btn"> Save </button>
                  </div>

              </fieldset>
            </form> -->
          </div>
          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="other_info_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <button type="button" class="btn btn-md btn-success" id="">Create PDF</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <h5 class="txt-black">Family Member Info</h5>
            <hr>
            <?php

            ?>
              <div class="row info-div">
                <div class="col-md-10">
                  <p class="mb-0">

                  </p>
                </div>
                <div class="col-md-2 align-self-center edit-btn-div pl-0 pr-0">
                  <button type="button" style="width:100%" class="badge1 row" title="Delete Family Member">
                    <a id="family_member_delete" data-toggle="modal" data-target="#exampleModal" class="badge1 badge-pill delete_family_member" title="Delete Family Member"> <i class="fa fa-trash" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                    <a id="family_member_edit" class="badge1 badge-pill edit_family_member" title="Edit Family Member"> <i class="fa fa-edit" aria-hidden="true" style="font-size:15px; width:15px;"></i></a>
                  </button>
                  <!-- <button type="button" name="edit_family" class="edit_family">edit</button> -->
                </div>
              </div>
              <hr>

          </div>
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
          <p class="modal-member-relationship"></p>
          <p class="modal-member-name"></p>
          <input type="hidden" name="modal-member-id" id="modal-member-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" id="btn-delete-member-confirm" class="btn btn-primary">Yes</button>
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
  $('#family_person_dob').datepicker({
    format: 'dd/mm/yyyy',
  });
  </script>
  </body>
</html>
