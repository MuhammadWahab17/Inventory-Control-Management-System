<?php
	include_once "config.php";

	session_start();

	if(isset($_POST['add_product'])){

		$productName = $_POST['productName'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$weight = $_POST['weight'];
		$instock = $_POST['instock'];
		$inoder = $_POST['inoder'];
		$supplier = $_POST['SupplierNo'];


		if($instock != 1 AND $instock != 0){
			$_SESSION['instock_failed'] = 'Value for InStock should be 1 or 0';
			header('Location: add_product.php');
			
		}

		if($inoder != 1 AND $inoder != 0){
			$_SESSION['inoder_failed'] = 'Value for InOder should be 1 or 0';
			header('Location: add_product.php');
			
		}


		$sql = "INSERT INTO product (Pname, category, Pdescription , price, Pweight, PInStock,PInOrder, SupplierNo) VALUES ('$productName','$category','$description','$price','$weight','$instock','$inoder','$supplier')";


		$query = mysqli_query($con, $sql);
        
		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: products.php');
		}else{
			$_SESSION['failed'] = 'Failed to insert';
			header('Location: add_product.php');
			
		}

	}


//edit product
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


		if($instock != "1" AND $instock != "0"){
				var_dump($instock);
			die();
			$_SESSION['instock_failed'] = 'Value for InStock should be 1 or 0';
			header('Location: edit_product.php');
		}

		if($inoder != "1" AND $inoder != "0"){
			$_SESSION['inoder_failed'] = 'Value for InOder should be 1 or 0';
			header('Location: edit_product.php');
		}


		$sql = "UPDATE product SET Pname= '$productName', category = '$category', PInOrder='$inoder', Pdescription='$description', price='$price', Pweight='$weight', PInStock='$instock', SupplierNo='$supplier' ";

		var_dump($sql);
		die();

		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: products.php');
		}else{
			$_SESSION['failed'] = 'Failed to insert';
			header('Location: edit_product.php');
			
		}

	}

//delete product
	if(isset($_GET['product_del_id'])){

		$id = $_GET['product_del_id'];
		

		$sql = "DELETE FROM product WHERE ProductNo = '$id' ";

		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Deleted';
			header('Location: products.php');
		}else{
			echo 'Failed to Delete';
		}}


//add supplier
	if(isset($_POST['add_supplier'])){

		$company_fname = $_POST['company_fname'];
		$company_lname = $_POST['company_lname'];
		$title = $_POST['title'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		

		$sql = "INSERT INTO supplier (Comfname, ComLname, Comtitle, Address, Contactno) VALUES ('$company_fname','$company_lname','$title','$contact','$address')";

		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: suppliers.php');
		}else{
			$_SESSION['failed'] = 'Failed to insert';
			header('Location: add_supplier.php');
			
		}
	}


//edit supplier
	if(isset($_POST['edit_supplier'])){


		$id = $_POST['supplier_id'];
		$company_fname = $_POST['company_fname'];
		$company_lname = $_POST['company_lname'];
		$title = $_POST['title'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		

		 $sql = "UPDATE supplier SET Comfname= '$company_fname', ComLname = '$company_lname', Comtitle='$title', Address='$address', Contactno='$contact' WHERE SupplierNo='$id' ";

	
		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Updated';
			header('Location: suppliers.php');
		}else{
			$_SESSION['failed'] = 'Failed to Update';
			header('Location: edit_supplier.php');
			
		}

	}

//delete supplier
	if(isset($_GET['supplier_del_id'])){

		$id = $_GET['supplier_del_id'];
		
		$sql = "DELETE FROM supplier WHERE SupplierNo = '$id' ";

		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Deleted';
			header('Location: suppliers.php');
		}else{
			echo 'Failed to Delete';
		}
	}


//add Customer
	if(isset($_POST['add_customer'])){



		$fname = $_POST['company_fname'];
		$lname = $_POST['company_lname'];
		$RegNo = $_POST['title'];
		$Address = $_POST['address'];
		$ContactNo = $_POST['contact'];
		
		$sql = "INSERT INTO customer (fname, lname, RegNo, Address, ContactNo) VALUES ('$fname','$lname','$RegNo','$Address','$ContactNo')";



		$query = mysqli_query($con, $sql);


	    
		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: customers.php');
		}else{
			$_SESSION['failed'] = 'Failed to Insert';
			header('Location: add_customer.php');
		}

	}
	//edit Customer
	if(isset($_POST['edit_customer'])){

		$id = $_POST['customer_id'];
		$fname = $_POST['company_fname'];
		$lname = $_POST['company_lname'];
		$RegNo = $_POST['title'];
		$Address = $_POST['address'];
		$ContactNo = $_POST['contact'];
		

		 $sql = "UPDATE customer SET fname= '$fname', lname = '$lname', RegNo='$RegNo', Address='$Address', ContactNo='$ContactNo' WHERE CustomerNo='$id' ";

	
		$query = mysqli_query($con, $sql);

		if($query){
			$_SESSION['success'] = 'Successfully Updated';
			header('Location: customers.php');
		}else{
			$_SESSION['failed'] = 'Failed to Update';
			header('Location: edit_customer.php');
			
		}

	}


//delete supplier
	if(isset($_GET['customer_del_id'])){

		$id = $_GET['customer_del_id'];

		
		$sql = "DELETE FROM customer WHERE CustomerNo = '$id' ";


		$query = mysqli_query($con, $sql);


		if($query){
			$_SESSION['success'] = 'Successfully Deleted';
			header('Location: customers.php');
		}else{
			echo 'Failed to Delete';
		}
	}


//add orders
	if(isset($_POST['add_order'])){

		$product_id = $_POST['product_id'];
		$customer_id = $_POST['customer_id'];
		$quantity = $_POST['quantity'];
		$place = $_POST['place'];

		$product_sql = "SELECT price as product_price FROM product WHERE ProductNo='$product_id' ";
		$q = mysqli_query($con, $product_sql);
		$row = mysqli_fetch_assoc($q);

		$totalPrice = $row['product_price'] * $quantity ;


		$sql = "INSERT INTO ordered (quantity, place, totalPrice, product_id, customer_id)
			VALUES ('$quantity', '$place', '$totalPrice', '$product_id', '$customer_id')";

	
		$query = mysqli_query($con, $sql);

		
		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: orders.php');
		}else{

			 echo "Error: " . $sql . "<br>" . mysqli_error($con);
			 die();

			$_SESSION['failed'] = 'Failed to Insert';
			header('Location: add_order.php');
			
		}

	}



//edit order
	if(isset($_POST['update_order'])){


		$id = $_POST['order_id'];

		$product_id = $_POST['product_id'];
		$customer_id = $_POST['customer_id'];
		$quantity = $_POST['quantity'];
		$place = $_POST['place'];


		$product_sql = "SELECT price as product_price FROM product WHERE ProductNo='$product_id' ";
		$q = mysqli_query($con, $product_sql);
		$row = mysqli_fetch_assoc($q);

		$totalPrice = $row['product_price'] * $quantity ;
		

		 $sql = "UPDATE ordered SET quantity= '$quantity', place = '$place', totalPrice='$totalPrice', product_id='$product_id', customer_id='$customer_id' WHERE Id='$id' ";

		

	
		$query = mysqli_query($con, $sql);


		if($query){
			$_SESSION['success'] = 'Successfully Updated';
			header('Location: orders.php');
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
			die();
			$_SESSION['failed'] = 'Failed to Update';
			header('Location: edit_order.php');
			
		}

	}


	//order delete
	if(isset($_GET['order_del_id'])){

		$id = $_GET['order_del_id'];

		
		$sql = "DELETE FROM ordered WHERE Id = '$id' ";


		$query = mysqli_query($con, $sql);


		if($query){
			$_SESSION['success'] = 'Successfully Deleted';
			header('Location: orders.php');
		}else{
			echo 'Failed to Delete';
		}
	}




//add orders
	if(isset($_POST['add_booking'])){


		$booking_date = $_POST['booking_date'];
		$customer_id = $_POST['customer_id'];


		$sql = "INSERT INTO  booking (BookingDate, CustomerNo)
			VALUES ('$booking_date', '$customer_id')";

	
		$query = mysqli_query($con, $sql);

		
		if($query){
			$_SESSION['success'] = 'Successfully Inserted';
			header('Location: bookings.php');
		}else{

			 echo "Error: " . $sql . "<br>" . mysqli_error($con);
			 die();

			$_SESSION['failed'] = 'Failed to Insert';
			header('Location: add_order.php');
			
		}

	}

//booking delete
	if(isset($_GET['booking_del_id'])){

		$id = $_GET['booking_del_id'];

		
		$sql = "DELETE FROM booking WHERE id = '$id' ";


		$query = mysqli_query($con, $sql);


		if($query){
			$_SESSION['success'] = 'Successfully Deleted';
			header('Location: bookings.php');
		}else{
			echo 'Failed to Delete';
		}
	}


//update_booking 
	if(isset($_POST['update_booking'])){


		$id = $_POST['booking_id'];

		$booking_date = $_POST['booking_date'];
		$customer_id = $_POST['customer_id'];
		


		 $sql = "UPDATE booking SET BookingDate= '$booking_date', CustomerNo = '$customer_id' WHERE id='$id' ";

	
	
		$query = mysqli_query($con, $sql);


		if($query){
			$_SESSION['success'] = 'Successfully Updated';
			header('Location: bookings.php');
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
			die();
			$_SESSION['failed'] = 'Failed to Update';
			header('Location: edit_order.php');
			
		}

	}
?>