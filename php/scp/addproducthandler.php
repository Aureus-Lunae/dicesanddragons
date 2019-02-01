<?php
	require '../classes.php';
	require '../db/connect.php';


if (isset($_POST)){
	$name = $_POST['product_name'];
	$price = $_POST['product_price'];
	$desc = $_POST['product_desc'];
	$cat = $_POST['product_cat'];


	//Upload select category folder
	switch ($cat){
		case 0:
			$catname="7dice";
			break;
		case 1:
			$catname="12d6";
			break;
		case 2:
			$catname="10d10";
			break;
		default:
			$catname="7dice";
			break;
	}
	$targetDir = '../../img/' . $catname . '/';

	//set file
	$newPhoto = rand(10000,9999999) . '-' . $catname . '-' . basename($_FILES['product_photo']['name']);
	$targetFile = $targetDir . $newPhoto;
	echo $newPhoto;
	echo $targetFile;

	//Set filename
	$uploadOK = 1;
	$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

	//Check if the image is really a photo
	$check = getimagesize($_FILES['product_photo']['tmp_name']);
	if ($check == false) {
		$uploadOK = 0;
	}

	//Check if the image doesn't already exist
	if (file_exists($targetFile)) {
		$uploadOK = 0;
	}

	//Check if the image size isn't too big
	if ($_FILES['product_photo']['size'] > 2097152) {
    $uploadOK = 0;
	}

	//Uploads photo if image isn't too big.
	if ($uploadOK == 0) {
		echo 'File not uploaded';
	} else {
		if (move_uploaded_file($_FILES['product_photo']['tmp_name'], $targetFile)) {
			//Makes the query and object if all is fine
			$sql_query = 'INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_photo`, `product_category`, `product_desc`, `product_discount`, `product_featured`) VALUES (NULL, :name, :price, :photo, :cat, :descr, 0, 0);';
			$newProduct = new getDBData($conn, $sql_query);

			$newProduct -> getData(array(':name'=>"$name", ':price'=>"$price", ':photo'=>"$newPhoto", ':cat'=>"$cat", ':descr'=>"$desc"));

		}
		else {
			echo "error uploading the file";
		}
	}

	header('Location: ../../scp/addproduct.php?add=1');

}




?>