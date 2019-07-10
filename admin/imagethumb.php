<?php
session_start();
if(!$_SESSION['email'])
{
	echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--Custom Style-->
<style>
.my-img-inp
{
	border-radius:0;
}
.my-img-inp-btn
{
	border-radius:0;
	width:250px;
	padding:5px;
	background-color:#DC4D41;
	border:none;
	padding:1rem;
	transition:background 1s;
}
.my-img-inp-btn:hover
{
	background-color:#9EDA46;
}
</style>
</head>

<body>
<div class="container">
<div class="row">
  <div class="col-sm-2"></div>
  	<a href="index.php">Home</a>
  <div class="col-sm-8">
    <form class="form-group" method="POST" enctype="multipart/form-data">
        <table class="table">
          <tr>
	       <td>Product Name</td>
	       <td>
		    <select class="my-img-inp form-control" name="select_proid">
			<option>PRODUCT NAME</option>
			 <?php 
			 while($product = mysqli_fetch_Array($product_table))
			 {
				 $productId = $product['id'];
				 $productName = $product['product_name'];
			 
			 ?>
			  <option  value="<?php echo $productId ;?>"><?php echo $productName ;?></option>
			 <?php } ?>
			</select>
		   </td>
	    </tr>
	    <tr>
	      <td>IMAGE-1</td>
		  <td><input type="file"  name="img1" class="my-img-inp form-control"></td>
	    </tr>
		<tr>
	      <td>IMAGE-2</td>
		  <td><input type="file"  name="img2" class="my-img-inp form-control"></td>
	    </tr>
		<tr>
	      <td>IMAGE-3</td>
		  <td><input type="file"  name="img3" class="my-img-inp form-control"></td>
	    </tr>
		<tr>
	      <td>IMAGE-4</td>
		  <td><input type="file"  name="img4" class="my-img-inp form-control"></td>
	    </tr>
		<tr>
	      <td>IMAGE-5</td>
		  <td><input type="file"  name="img5" class="my-img-inp form-control"></td>
	    </tr>
		<tr>
	      <td></td>
		  <td><input type="submit"  name="submit" value="INSERT" class="my-img-inp-btn btn "></td>
	    </tr>
       </table>
    </form>
    </div>
	<div class="col-sm-2"></div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$product_id= mysqli_real_escape_string($conn,$_POST['select_proid']);
	$image1 = mysqli_real_escape_string($conn , file_get_contents($_FILES['img1']['tmp_name']));
	$image2 = mysqli_real_escape_string($conn , file_get_contents($_FILES['img2']['tmp_name']));
	$image3 = mysqli_real_escape_string($conn , file_get_contents($_FILES['img3']['tmp_name']));
	$image4 = mysqli_real_escape_string($conn , file_get_contents($_FILES['img4']['tmp_name']));
	$image5 = mysqli_real_escape_string($conn , file_get_contents($_FILES['img5']['tmp_name']));
	
	$insert_into_imagethumb = "insert into imagethumb(product_id,image1,image2,image3,image4,image5) values ('$product_id','$image1','$image2','$image3','$image4','$image5')";
	$init_imagethumb = mysqli_query($conn,$insert_into_imagethumb);
 
    echo $product_id;
	
	if($init_imagethumb)
	{
		echo "<script>alert('Images Inserted')</script>";
		header("Location:imagethumb.php");
	}
	else
	{
		die();
	}
}
?>