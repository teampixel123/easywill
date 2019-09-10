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

        <div class="alert alert-danger subscribe_alert" id="subscribe_alert" role="alert">
          <a href="#" class="alert-link">Subscribe for create new will.</a>
        </div>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active text-dark" aria-current="page"><h4 class="m-0">Dashboard</h4></li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-md-4">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading font-weight-bold">1</h4>
              <hr>
              <p class="mb-0">Complete Will</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading font-weight-bold">1</h4>
              <hr>
              <p class="mb-0">Incomplete Will</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading font-weight-bold">1</h4>
              <hr>
              <p class="mb-0">End Subscription Date</p>
            </div>
          </div>
        </div>
        <hr>

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-5">
            <li class="breadcrumb-item active text-dark" aria-current="page">Will List</li>
          </ol>
        </nav>

        <div class="table-responsive mb-5">
          <table class="table table-striped table-sm" id="will_list1">
            <thead>
              <tr>
                <th>#</th>
                <th>Will Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>End Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $will_num = 0;
                $today = date('d-m-Y');
                foreach ($will_list as $will_list1) {
                $is_will_complete = $will_list1->is_will_complete;
                $will_rem_updations = $will_list1->will_rem_updations;
                $updation_last_date = $will_list1->updation_last_date;
                $is_blur = $will_list1->is_blur;

                $will_num++;
              ?>
                <tr>
                  <td> <?php echo $will_num; ?> </td>
                  <td> <?php echo $will_list1->will_id; ?> </td>
                  <td> <?php echo $will_list1->full_name; ?> </td>
                  <td> <?php echo $will_list1->mobile_no; ?> </td>
                  <td> <?php echo $will_list1->email; ?> </td>
                  <td> <?php echo $will_list1->updation_last_date; ?> </td>
                  <td class="action-td">

                    <!-- Edit Button -->
                    <?php if($will_rem_updations > 0 && strtotime($updation_last_date) >= strtotime($today)){ ?>
                      <button type="button" class="btn btn-sm btn-outline-info btn-outline mx-1 btn_will_edit" data-toggle="modal" data-target="#editModal">
                        <i class="fa fa-edit"></i> Edit
                      </button>
                      <input type="hidden" name="will_id" class="will_id" value="<?php echo $will_list1->will_id; ?>">
                      <input type="hidden" name="will_rem_updations" class="will_rem_updations" value="<?php echo $will_rem_updations; ?>">
                    <?php } else if($is_blur == 'yes'){ ?>
                      <button type="button" class="btn btn-sm btn-outline-info btn-outline mx-1 btn_blur_edit"><i class="fa fa-edit"></i> Edit</button>
                    <?php } else{ ?>
                      <button type="button" class="btn btn-sm btn-outline-info btn-outline mx-1" disabled><i class="fa fa-edit"></i> Edit</button>
                    <?php } ?>

                    <!-- PDF Button -->
                    <?php if($is_will_complete == 'yes'){ ?>
                      <button type="button" class="btn btn-sm btn-outline-success btn-outline mx-1 btn_pdf" ><i class="fa fa-file-pdf-o"></i> PDF</button>
                    <?php } else{ ?>
                      <button type="button" class="btn btn-sm btn-outline-success btn-outline mx-1" disabled><i class="fa fa-file-pdf-o"></i> PDF</button>
                    <?php } ?>

                    <!-- Subscribe Button -->
                    <?php if($is_blur == 'yes'){ ?>
                      <button type="button" class="btn btn-sm btn-outline-secondary btn-outline mx-1"><i></i>Subscribe</button>
                    <?php } ?>
                    <!-- PDF Forms -->
                    <?php if($is_blur == 'no'){ ?>
                      <form class="pdf_form" target="_blank" action="<?php echo base_url(); ?>Pdf_Controller/final_pdf" method="post">
                        <input type="hidden" name="will_id" value="<?php echo $will_list1->will_id; ?>">
                      </form>
                    <?php } else{ ?>
                      <form class="pdf_form" target="_blank" action="<?php echo base_url(); ?>Pdf_Controller/blur_pdf" method="post">
                        <input type="hidden" name="will_id" value="<?php echo $will_list1->will_id; ?>">
                      </form>
                    <?php } ?>

                    <form class="edit_blur_form" action="<?php echo base_url(); ?>Will_Controller/start_will_view" method="post">
                      <input type="hidden" name="will_id" id="will_id_blur" class="will_id_blur" value="<?php echo $will_list1->will_id; ?>">
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Edit Msg Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Will Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Only 1 time you can edit this will.</p>
          <form class="edit_will_form" action="<?php echo base_url(); ?>Will_Controller/start_will_view" method="post">
            <input type="hidden" name="will_id" id="will_id" class="will_id">
            <input type="hidden" name="is_edit" value="yes">
            <input type="hidden" name="will_rem_updations" id="will_rem_updations">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="edit_will_confirm"><i class="fa fa-edit"></i> Edit</button>
        </div>
      </div>
    </div>
  </div>



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

<?php
$is_have_blur = $this->session->flashdata('is_have_blur');
if($is_have_blur){ ?>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#subscribe_alert').show().delay(5000).fadeOut();
  } );
  </script>
<?php } ?>

  </body>
</html>
