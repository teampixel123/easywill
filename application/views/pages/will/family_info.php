<!doctype html>
<html lang="en">

  <?php
  $will = 'will';

  include(__DIR__ .'../../head.php'); ?>
  <body>
    <!-- <div id="load" class="text-center row">
      <div class="col-md-12 align-self-center">
        <img src="<?php echo base_url() ?>assets/images/gears3.gif" alt="">
      </div>
    </div> -->


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
      <li class="family-tab is-active">Family Information</li>
      <li class="assets-tab">Assets</li>
      <li class="executor-tab">Distribution & Executor</li>
      <li class="witness-tab">Witness</li>
    </ul>
  </div>
  <!-- <section class="terms">
    <div class="text-center">
      <h1 class="">Start Your Will Now</h1>
    </div>
  </section> -->
  <?php
  $is_spouse = 'false';
  foreach($family_info as $family_info2){
    $spouse = $family_info2->relationship;

    if($spouse == 'Spouse'){
      $is_spouse = 'true';
    }
  }
  // foreach($personal_info as $personal_info1){
  // }
  ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="input-box p-4">
            <form class="" autocomplete="off" id="form_family_info" action="<?php echo base_url() ?>Will_Controller/save_family_info" method="post">
              <fieldset>
                <h5 class="text-left txt-black mb-4 ">Family Information </h5>
                <div class="form-group">
                  <div class="row text-center">
                    <label class="col-md-2 text-right p-0" for="exampleInputEmail1">Relationship</label>
                    <div class="col-md-10">
                      <select class="required text title-case form-control form-control-sm" name="relationship" id="relationship">
                        <option value="0">Select</option>
                        <?php if($is_spouse == 'false'){ ?>
                          <option >Spouse</option>
                        <?php } ?>
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
            </form>
          </div>
          <div class="row">
            <div class="col-6 mb-5 text-left">
              <button type="button" class="btn btn-md btn-primary" id="family_prev_btn">Previous</button>
            </div>
            <div class="col-6 mb-5 text-right">
              <button type="button" class="btn btn-md btn-primary" id="family_next_btn">Next</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <h5 class="txt-black">Family Member Info</h5>
            <hr>
            <?php
            $i=0;
            foreach($family_info as $family_info1){
              $i++;
              $is_minar = $family_info1->is_minar;
              $family_person_age = $family_info1->family_person_age;
              $member_id = $family_info1->id;
              if($is_minar == 'yes'){
                $minar_info = '<br> <b>Guardian : </b><span  class="guardian_name_title">'.$family_info1->guardian_name_title.'</span> <span  class="guardian_name">'.$family_info1->guardian_name.'</span>,<b> Major Age : </b><span  class="major_age">'.$family_info1->major_age.'</span>';
              } else{ $minar_info = ''; }
            ?>
              <div class="row info-div">
                <div class="col-md-10">
                  <p class="mb-0">
                    <b><?php echo $i; ?>) Relation : </b><span class="relationship"><?php echo $family_info1->relationship;  ?></span>, <b>Name : </b><span class="family_person_name"><?php echo $family_info1->family_person_name;?></span>,<br><b> Birthdate : </b>
                    <span class="family_person_dob"><?php echo $family_info1->family_person_dob;?></span>
                    <?php echo $minar_info; ?>
                    <input type="hidden" name="is_minar" id="is_minar" value="<?php echo $is_minar; ?>">
                    <input type="hidden" name="family_person_age2" id="family_person_age2" value="<?php echo $family_person_age; ?>">
                    <input type="hidden" name="member_id2" id="member_id2" value="<?php echo $member_id; ?>">
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
            <?php } ?>
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
  <script src="<?php echo base_url(); ?>assets/js/will_js/start_will.js"></script>
  <script type="text/javascript">
  $('#family_person_dob').datepicker({
    format: 'dd/mm/yyyy',
  });
  </script>
  </body>
</html>
