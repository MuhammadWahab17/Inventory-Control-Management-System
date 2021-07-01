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

              <?php if(isset($_SESSION['failed'])){  ?>

                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> <?php echo $_SESSION['failed']; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

              <?php } ?>
          
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Details</h4>
                    <a href="customers.php" style="float: right; margin-top: -40px;" type="button" class="btn btn btn-light btn-fw"><i class="mdi mdi-keyboard-backspace"></i> Back to product list</a>
                   <form class="form-sample" method="POST" action="common_script.php">
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="company_fname" required placeholder="First Name">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="company_lname" required  placeholder="Last Name">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">RegNo</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="title" required placeholder="RegNo">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="contact" required placeholder="Contact">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9"> 
                              <input type="text" class="form-control" name="address" required placeholder="Address">
                            </div>
                          </div>
                        </div>
                        
                        </div>
                   
                   
                      <hr>
                      <input type="submit" name="add_customer" class="btn btn-primary mr-2" value="Add Customer">
                      <a href="customers.php" class="btn btn-dark">Cancel</a>
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