<?php
include '../connectDB.php';
	if(isset($_POST['submit'])){
	session_start();
	$image_email = $_POST['image_email'];
	$image_name = $_FILES['image']['name'];
    $image_error = $_FILES['image']['error'];
    $originalimage_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$img_content = addslashes(file_get_contents($image_tmp)); 
	$image_path = "../upload/".$image_name;
	if($image_error > 0){
		$_SESSION['image_status'] = "Unknown Error! Please use a different image.";
		$_SESSION['image_status_code'] = "error";
		echo "<script>window.location.href='profile.php'</script>";
	}
	else{
		$image_types_available = array("image/jpeg","image/jpg","image/png");
		if(!in_array($originalimage_type,$image_types_available)){
			// echo "Only jpg, jpeg and png images are allowed!";
			$_SESSION['image_status'] = "Only jpg, jpeg and png images are allowed!!!";
            $_SESSION['image_status_code'] = "error";
			echo "<script>window.location.href='profile.php'</script>";

		}
		else{
			if(move_uploaded_file($image_tmp,$image_path)){
				if($image_size < 1000000){
					echo $image_email;
					echo $image_path;
					$sql = "UPDATE `employee` SET `image`='$img_content' WHERE `E_email`='$image_email';";

					$result = mysqli_query($con,$sql);
					if($result){
						// echo "Image uploaded successfully";
						$_SESSION['image_status'] = "Profile Picture Successfully Updated";
						$_SESSION['image_status_code'] = "success";
						echo "<script>window.location.href='profile.php'</script>";
					}
					else{
						echo "Error running query";
					}
				}
				else{
					// echo "Image size must be less than 1MB!";
					$_SESSION['image_status'] = "Image size must be less than 1MB!!!";
					$_SESSION['image_status_code'] = "warning";
					echo "<script>window.location.href='profile.php'</script>";
				}
			}
			else{
				echo "Error uploadingasdasd image";
			}
		}
	}

    // print_r($_FILES);
	}
?>
