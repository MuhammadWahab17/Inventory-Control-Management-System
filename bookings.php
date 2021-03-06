<?php

  include_once('config.php');

  session_start();

  $sql = "SELECT * FROM booking";
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
                    <h4 class="card-title">Booking list</h4>
                    <a href="add_booking.php" style="float: right; margin-top: -40px;" type="button" class="btn btn-primary  btn-fw">Add New Booking</a>
                    <hr>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Booking Date </th>
                            <th> Customer </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                          while($row = mysqli_fetch_assoc($query)){

                            

                            $c_id = $row['CustomerNo'];



                              $customer_sql = "SELECT * FROM customer WHERE CustomerNo = '$c_id' ";
                              $qry1 = mysqli_query($con, $customer_sql);
                              $customers = mysqli_fetch_assoc($qry1); 


                            
                            ?>

                          <tr>
                            <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['BookingDate']; ?></td>
                            <td><?php echo $customers['fname']; ?></td>
                            
                            <td>
                             <a type="button" href="edit_booking.php?booking_edit_id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                              <a type="button" href="common_script.php?booking_del_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
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

          <!-- Footer start -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ?? <?php echo date('Y') ?></span>
            </div>
          </footer>
          <!-- Footer End -->

        </div>
        <!-- main-panel ends -->
      </div>
        <?php unset($_SESSION['success']); ?>

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