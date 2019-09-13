<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Products = $_POST['products'];
	$ID = $_POST['id'];
	$ProductDescription = $_POST['productdescription'];
	$ProductPrice = $_POST['productprice'];
	$ProductQuantity = $_POST ['productquantity'];
	// checking empty fields
	if(empty($products) || empty($id) || empty($productdescription) ||  empty($productprice) || empty($productquantity)) {
				
		if(empty($Products)) {
			echo "<font color='red'>Product field is empty.</font><br/>";
		}
		
		if(empty($ID)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		
		if(empty($ProductDescription)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		if(empty($ProductPrice)) {
			echo "<font color='red'>Product Price field is empty.</font><br/>";
		}
		if(empty($ProductQuantity)) {
			echo "<font color='red'>Product Quantity field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(Products, ID, ProductDescription, ProductPrice, ProductQuantity) VALUES(:Products, :id, :ProductDescription, :ProductPrice, :ProductQuantity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':products', $Products);
		$query->bindparam(':id', $ID);
		$query->bindparam(':productdescription', $ProductDescription);
		$query->bindparam('productprice', $ProductPrice);
		$query->bindparam('productquantity', $ProductQuantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':products' => $Products, ':id' => $ID, ':productdescription' => $ProductDescription ':productprice' => $ProductPrice ':productquantity' => $ProductQuantity));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
