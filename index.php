<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Image</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>	
<body>
	<h1 style="margin: auto; color: #fff;">MyLogo</h1> 
	<form class="form" id="form" action="" enctype="multipart/form-data" method="post">
		<div class="upload">
			<?php  
				$image = $user["image"]; //to get the image from the database
			?>	

			<img src="img/<?php echo $image; ?>" width = 300 height = 300 title = " <?php echo $image; ?>">
			<div class="round">
				<input type="file" name="image" id="image" accept=".jpeg, .jpg, .png">
			</div>
		</div>
	</form>

	<script type="text/javascript"> //javascript for the upload instead of using button
		document.getElementById("image").onchange = function(){
			document.getElementById('form').submit();
		}
	</script>
</body>
</html>