<!doctype html>
<html lang="en">
  <?php
  $will = 'user_dashboard';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php include(__DIR__ .'../../navbar.php'); ?>

  <?php include('user_navbar.php'); ?>

  <div class="container-fluid">
    <div class="row">

      <?php include('user_sidebar.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="min-height:calc(100vh - 150px);;">



        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active text-dark" aria-current="page"><h4 class="m-0">Profile</h4></li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-4 user-profile text-center">
            <div class="card mx-auto text-center" style="width: 18rem;">
              <img class="card-img-top mx-auto mt-2" style="height:10rem; width:10rem; border-radius: 50%;" src="<?php echo base_url(); ?>assets/images/will_user/<?php echo $user->profile_phto; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" style="font-size:18px;"><b><?php echo $user->user_fullname; ?></b></h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              </div>
              <ul class="list-group list-group-flush">
                <?php
                if($user->user_mobile_number){
                  echo '<li class="list-group-item">Mobile : '.$user->user_mobile_number.'</li>';
                }
                if($user->user_email_id){
                  echo '<li class="list-group-item">Email : '.$user->user_email_id.'</li>';
                }
                ?>
                <?php
                $today = date('d-m-Y');
                $user_subscription_end_date = $user->user_subscription_end_date;
                $updation_end_date = $user->updation_end_date;
                if(strtotime($user_subscription_end_date) >= strtotime($today)){
                  echo '<li class="list-group-item">Subscription End On : '.$user_subscription_end_date.'</li>';
                  echo '<li class="list-group-item">Package : '.$user->user_subscription_type.'</li>';
                  echo '<li class="list-group-item">Remaining Will : '.$user->rem_will.'</li>';
                }
                if(strtotime($updation_end_date) >= strtotime($today)){
                  echo '<li class="list-group-item">Updation End On : '.$updation_end_date.'</li>';
                }
                ?>
              </ul>
              <!-- <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div> -->
            </div>
          </div>
          <div class="col-md-8">
            <div class="tab-content">
              <div class="tab-pane active" id="home">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-home" aria-selected="true">Update Profile</a>
                    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-profile" aria-selected="false">Update Password</a>
                    <a class="nav-item nav-link" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-profile" aria-selected="false">Change Photo</a>
                  </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <form class="" autocomplete="off" id="form_update_profile" action="<?php echo base_url() ?>User_Controller/update_profile" method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                      <fieldset>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Name</label>
                          <input name="user_fullname" value="<?php echo $user->user_fullname; ?>" type="text" class="required text title-case form-control form-control-sm" id="user_fullname" placeholder="">
                        </div>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Mobile Number</label>
                          <input name="user_mobile_number" value="<?php echo $user->user_mobile_number; ?>" type="text" class="required only_number mobile form-control form-control-sm" id="user_mobile_number" placeholder="">
                        </div>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Email</label>
                          <input name="user_email_id" value="<?php echo $user->user_email_id; ?>" type="text" class="required email form-control form-control-sm" id="user_email_id" placeholder="">
                        </div>
                        <hr>
                        <div class="form-group py-1 px-5">
                          <button type="button" name="button" id="btn_profile_update" class="btn btn-md btn-primary">Update</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <br>
                    <form class="" autocomplete="off" id="form_update_password" action="<?php echo base_url() ?>User_Controller/update_password" method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                      <fieldset>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Old Password</label>
                          <input name="old_password" type="password" class="required form-control form-control-sm" id="old_password" placeholder="Enter Your Old Password">
                        </div>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">New Password</label>
                          <input name="new_password" type="password" class="required form-control form-control-sm" id="new_password" placeholder="Enter New Pasword">
                        </div>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Retype New Password</label>
                          <input name="confirm_password" type="password" class="required form-control form-control-sm" id="confirm_password" placeholder="Retype New Password">
                        </div>
                        <div class="form-group py-1 px-5">
                          <p class="confirm_pwd_error">New Password and Retype New Password do not match </p>
                        </div>
                        <hr>
                        <div class="form-group py-1 px-5">
                          <button type="button" name="button" id="btn_update_password" class="btn btn-md btn-primary">Update</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <br>
                    <form class="" autocomplete="off" id="form_update_photo" action="<?php echo base_url() ?>User_Controller/update_photo" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="old_photo" value="<?php echo $user->profile_phto; ?>">
                      <fieldset>
                        <div class="form-group py-1 px-5">
                          <label for="exampleInputPassword1">Select Photo</label>
                          <input type="file" name="profile_phto" class="form-control form-control-sm" id="profile_phto" placeholder="Enter Your Old Password" required>
                        </div>
                        <div class="form-group py-1 px-5">
                          <p>*Photo must be less than 2mb and .jpg format.</p>
                        </div>
                        <hr>
                        <div class="form-group py-1 px-5">
                          <button type="submit" name="button" id="btn_update_photo" class="btn btn-md btn-primary">Update</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>

              </div><!--/tab-pane-->
            </div>
          </div>

        </div>
        <!-- <hr>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-5">
            <li class="breadcrumb-item active text-dark" aria-current="page">Will List</li>
          </ol>
        </nav> -->


      </main>
    </div>
  </div>

  <!-- Update Success Alert -->
  <div class="row alert-div w-100" id="alert_update">
    <div class="col-md-12">
      <div class="alert alert-success " role="alert">
        Updated Successfully.
      </div>
    </div>
  </div>

  <!-- Update Success Alert -->
  <div class="row alert-div w-100" id="alert_delete">
    <div class="col-md-12">
      <div class="alert alert-success " role="alert">
        Invalide Old Password.
      </div>
    </div>
  </div>


<!-- <input type="hidden" id="is_reload" value=""> -->
<!-- footer -->
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<?php include(__DIR__ .'../../footer.php');  ?>
<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_js/dashboard.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#will_list1').DataTable();
  } );
</script>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>
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
