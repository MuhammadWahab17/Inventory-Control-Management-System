<?php

include_once 'config.php';

if(isset($_GET['product_edit_id'])){
  $id = $_GET['product_edit_id'];
}

  $sql = "SELECT * FROM product WHERE ProductNo = '$id' ";
  $query = mysqli_query($con, $sql);

  $row = mysqli_fetch_assoc($query);



  if(isset($_POST['edit_product'])){

    $id = $_POST['product_id'];
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $instock = $_POST['instock'];
    $inoder = $_POST['inoder'];
    $supplier = $_POST['supplier'];


    if($instock != 1 AND $instock != 0){
        var_dump($instock);
      die();
      $_SESSION['instock_failed'] = 'Value for InStock should be 1 or 0';
      header('Location: edit_product.php');
    }

    if($inoder != 1 AND $inoder != 0){
      $_SESSION['inoder_failed'] = 'Value for InOder should be 1 or 0';
      header('Location: edit_product.php?product_edit_id='. $id );
    }



    
    $sql = "UPDATE product SET Pname= '$productName', category = '$category', PInOrder='$inoder', Pdescription='$description', price='$price', Pweight='$weight', PInStock='$instock', SupplierNo='$supplier' WHERE ProductNo='$id' ";

    $query = mysqli_query($con, $sql);

    if($query){
      $_SESSION['success'] = 'Successfully Inserted';
      header('Location: products.php');
    }else{
      $_SESSION['failed'] = 'Failed to insert';
      header('Location: edit_product.php');
      
    }

  }


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
                    <h4 class="card-title">Product Details</h4>
                    <a href="products.php" style="float: right; margin-top: -40px;" type="button" class="btn btn btn-light btn-fw"><i class="mdi mdi-keyboard-backspace"></i> Back to product list</a>
                    <form class="form-sample" method="POST" action="edit_product.php?product_edit_id= "asd>

                      <input type="hidden" name="product_id" value="<?php echo $id;  ?>">
                      <hr>

                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                              <input type="text" value="<?=$row['Pname']; ?>" required name="productName" class="form-control"  placeholder="Product Name">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="category" required="" >
                                <option value="">Select Category</option>
                                <option <?php if($row['category'] == 'Grocery'){ echo 'selected' ; }else{ echo ''; }  ?> value="Grocery">Grocery</option>
                                <option <?php if($row['category'] == 'Bevrage'){ echo 'selected'; }else{ echo ''; }  ?> value="Bevrage">Bevrage</option>
                                <option <?php if($row['category'] == 'Other'){ echo 'selected'; }else{ echo ''; }  ?> value="Other">Other</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?=$row['Pdescription']; ?>" required name="description" type="text" placeholder="Description">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?=$row['price']; ?>" required name="price" type="number" placeholder="Price">
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Weight</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?=$row['Pweight']; ?>" required name="weight" type="number" placeholder="Weight">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">InStock</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?=$row['PInStock']; ?>"  required name="instock" type="number" placeholder="(1/0)">
                              <?php if(isset($_SESSION['instock_failed'])){  echo $_SESSION['instock_failed']; } ?>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="row">  
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">In Order</label>
                            <div class="col-sm-9">
                              <input class="form-control"  value="<?=$row['PInOrder']; ?>"  required name="inoder" type="number"  placeholder="(1/0)">
                             <?php if(isset($_SESSION['inoder_failed'])){  echo $_SESSION['inoder_failed']; } ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Suppliers</label>
                            <div class="col-sm-9">
                              <input class="form-control"  value="<?=$row['SupplierNo'];?>"  required name="supplier">
                            </div>
                          </div>
                        </div>
                      </div>
                
                      <hr>
                      <input type="submit" name="edit_product" class="btn btn-primary mr-2" value="Submit">
                      <a href="products.php" class="btn btn-dark">Cancel</a>
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