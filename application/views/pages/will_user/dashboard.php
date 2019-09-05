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
                foreach ($will_list as $will_list1) {
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
                    <button type="button" class="btn btn-sm btn-outline-info btn-outline mx-1 btn_will_edit"><i class="fa fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-sm btn-outline-success btn-outline mx-1"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary btn-outline mx-1"><i></i>Subscribe</button>

                    <form class="edit_will_form" action="<?php echo base_url(); ?>Will_Controller/start_will_view" method="post">
                      <input type="hidden" name="will_id" value="<?php echo $will_list1->will_id; ?>">
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
  </body>
</html>
