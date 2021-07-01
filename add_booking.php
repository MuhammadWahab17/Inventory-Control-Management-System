<?php

  include_once('config.php');
  session_start();

  $sql_customer = "SELECT * FROM customer";
  $query1 = mysqli_query($con, $sql_customer);

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
          
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Booking</h4>
                    <a href="bookings.php" style="float: right; margin-top: -40px;" type="button" class="btn btn btn-light btn-fw"><i class="mdi mdi-keyboard-backspace"></i> Back to Bookings list</a>
                    <form class="form-sample" action="common_script.php" method="POST">
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Booking Date </label>
                            <div class="col-sm-9">
                              <input type="date" name="booking_date" required class="form-control" placeholder="Date">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                         <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="customer_id" required>
                                <option value="">Select customer</option>
                                <?php
                                  while($row = mysqli_fetch_assoc($query1)){ ?>
                                    <option value="<?php echo $row['CustomerNo'] ?>"><?=$row['fname'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      
                 
                      
                   
                      <hr>
                      <input type="submit" name="add_booking" value="Add Booking" class="btn btn-primary mr-2">
                      <a href="bookings.php" class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>          
          
          </div>
          <!-- content-wrapper ends -->

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

<?php
      unset($_SESSION['failed']);
      unset($_SESSION['instock_failed']);
      unset($_SESSION['inoder_failed']);
      ?>

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