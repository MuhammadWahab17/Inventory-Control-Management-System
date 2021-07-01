<?php

  include_once('config.php');

  session_start();

  $sql = "SELECT * FROM customer";
  $query = mysqli_query($con, $sql);

?>
<!-- header start -->
<?php include 'header.php'; ?>
<!-- header End -->
    <div class="container-scroller">
      <!-- Nav Menu Start -->
        <?php include 'navbar.php'; ?>
      <!-- Nav Menu End -->

      <div class="container-fluid page-body-wrapper">
      
        <div class="main-panel">
          <div class="content-wrapper">

            <?php if(isset($_SESSION['success'])){  ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          <?php } ?>
          
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer list</h4>
                    <a href="add_customer.php" style="float: right; margin-top: -40px;" type="button" class="btn btn-primary  btn-fw">Add New Customer</a>
                    <hr>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Reg No</th>
                            <th> Address </th>
                            <th> ContactNo </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>

                           <?php
                          while($row = mysqli_fetch_assoc($query)){ ?>


                          <tr>
                             <td><?php echo $row['CustomerNo']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['RegNo']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['ContactNo']; ?></td>
                            <td>
                             <a type="button" href="edit_customer.php?customer_edit_id=<?php echo $row['CustomerNo']; ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                              <a type="button" href="common_script.php?customer_del_id=<?php echo $row['CustomerNo']; ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                            </td>
                          </tr>

                           <?php  } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>          
          
          </div>
          <!-- content-wrapper ends -->


            <?php unset($_SESSION['success']); ?>

          <!-- Footer start -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date('Y') ?></span>
            </div>
          </footer>
          <!-- Footer End -->

        </div>
        <!-- main-panel ends -->
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>