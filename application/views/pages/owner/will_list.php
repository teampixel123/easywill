<!doctype html>
<html lang="en">
  <?php
  $will = 'owner';
  include(__DIR__ .'../../head.php'); ?>
  <body>
  <?php //include(__DIR__ .'../../navbar.php'); ?>

  <?php include('owner_navbar.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <?php include('owner_sidebar.php'); ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="min-height:calc(100vh - 150px);;">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-5">
            <li class="breadcrumb-item active text-dark" aria-current="page"><h4 class="m-0">Will List</h4></li>
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
              <tr>
                <td>1</td>
                <td>2345</td>
                <td>sdfg</td>
                <td>3456456</td>
                <td>fdghdfgh</td>
                <td>3456</td>
                <td>dfgh</td>
              </tr>
            </tbody>
          </table>

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
          <p id="modal_p"></p>
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


<input type="hidden" id="is_reload" value="">
<!-- footer -->

<?php //include(__DIR__ .'../../footer.php');  ?>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/website.js"></script>
<script src="<?php echo base_url(); ?>assets/js/will_js/validation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrao-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">var base_url = "<?php echo base_url() ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/will_js/owner.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#will_list1').DataTable();
  } );
</script>
</body>
</html>
