<?php
$conn = mysqli_connect("localhost","root","","profile");

$user=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from tb_user where id = 1")); //getting the values from the table tb_

if(isset($_FILES["image"]["name"])){  //checking if the varialbles is not null

		$imageName = $_FILES["image"]["name"]; //variable declared
		$imageSize = $_FILES["image"]["size"];
		$tmpName = $_FILES["image"]["tmp_name"];

		//imagevalidation
		$validImageExtension = ['jpg', 'jpeg', 'png'];	 //variable for valid image extension
		$imageExtension = explode('.', $imageName); 	//exploding the imageName
		$imageExtension = strtolower(end($imageExtension)); //the extensions are in small letters so strtolower si used.

		if(!in_array($imageExtension, $validImageExtension)){  //if the file is not compatible with the declared extension
			echo 
			"
			<script>
				alert('Invalid Image Extension');
			</script>
			"
			;
		}
		elseif ($imageSize > 1200000) {  //if the image is too large
			// code...
			echo 
			"
			<script>
				alert('Image is too large');
			</script>
			"
			;
		}
		else{ //else it will be uploaded
			date_default_timezone_set("Singapore");
			$newImageName = date("Y.m.d") . " - " . date("h.i.sa"); // generate new image name
			$newImageName .= "." . $imageExtension;
			$query = "UPDATE tb_user SET image = '$newImageName' WHERE id = 1";
			mysqli_query($conn,$query);
			move_uploaded_file($tmpName, 'img/' . $newImageName);
			echo
			"
			<script>
				document.location.href = '../ulogo';
			</script>

			"
			;
		}

	}
?>
