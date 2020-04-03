<?php
  // Create database connection
  include "../../config/config.php";

  // Initialize message variable
  $msg = "";
if (isset($_POST["naamvanverstuurknop"])){
  // If upload button is clicked ...
      $image = $_FILES['image']['name'];
      // Get text
      $product_id = $conn->real_escape_string($_POST['product_id']);

      // image file directory
      $target = "../../assets/img/".basename($image);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        
      $query1 = $conn->prepare('INSERT INTO  `product_image` (product_id, image) VALUES (?,?);');
      if ($query1 === false) {
          echo mysqli_error($conn)." - ";
          exit(__LINE__);
      }
      $query1->bind_param('ss', $product_id, $image); 
      if ($query1->execute() === false) {
          echo mysqli_error($conn)." - ";
          exit(__LINE__);
      } else {
          echo "fototo toegevoegd";
          header("Location: index.php");
          $query1->close();
      }
          
        
    }else{
        $msg = "Failed to upload image";
    }

    $target_dir = "../../assets/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["naamvanverstuurknop"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

      }
  $result = mysqli_query($conn, "SELECT * FROM `product_image`");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='../../assets/img/".$row['image']."' >";
      	echo "<p>".$row['product_id']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" enctype="multipart/form-data">
 
  	  <input type="file" name="image" id="image">
  	<!-- </div> -->
  	<!-- <div> -->
          
      <input type="text" id="text" cols="40" rows="4" name="product_id" required placeholder="id == nummer">
  	<!-- <div> -->
  		<input type="submit" name="naamvanverstuurknop">
  	<!-- </div> -->
  </form>
<!-- </div> -->
</body>
</html>