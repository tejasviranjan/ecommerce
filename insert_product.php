<!DOCTYPE>
<?php
include("includes/db.php");



?>

<html>
	<head>
		<title>inserting product</title>

		 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>
			tinymce.init({ selector:'textarea' });
		</script>

		</head>
<body bgcolor="skyblue">
		
		
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table bgcolor="orange" align="center" width="600px" border="2">
			<tr align="center">
				<td colspan="8"><h2>insert new post here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>product title</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
				
			</tr>
			<tr>
				<td align="right"><b>product category</b></td>
				
				<td>
				<select name="product_cat" >
				<option>select a category</option>
				<?php
				
				$get_cats = "select * from categories";     //$get_cat is local variable
	
				$run_cats = mysqli_query($con, $get_cats);
	
				while ($row_cats=mysqli_fetch_array($run_cats)){   //this is to retrieve all the data from the database categories
	 
				$cat_id=$row_cats['cat_id'];
				$cat_title=$row_cats['cat_title'];
				echo "<option value='$cat_id'>$cat_title</option>";
				
		
				}

				?>
				</select>
				</td>
			</tr>
			<tr>
				
				<td align="right"><b>product brand</b></td>
				<td>
				<select name="product_brand" >
				<option>select a brand</option>
				
				<?php
				$get_brands = "select * from brands";     //$get_cat is local variable
	
				$run_brands = mysqli_query($con, $get_brands);
	
				while ($row_brands=mysqli_fetch_array($run_brands)){   //this is to retrieve all the data from the database
	 
				$brands_id=$row_brands['brand_id'];
				$brands_title=$row_brands['brand_title'];
				
				echo "<option value='$brands_id'>$brands_title</option>";
		
	
				}
				?>	
				</select>	
				
				
				
				</td>
				
				
			</tr>
			<tr>
				<td align="right"><b>product image</b></td>
				<td><input type="file" name="product_image" required /></td>
	
			</tr>
			<tr>
				<td align="right"><b>product price</b></td>
				<td><input type="text" name="product_price" required /></td>
				
			</tr>
			<tr>
				<td align="right"><b>product description</b></td>
				<td><textarea name="product_desc" cols="20" rows="10" > </textarea></td>
				
			</tr>
			<tr>
				<td align="right"><b>product keywords</b></td>
				<td><input type="text" name="product_keyword" size="50" required/></td>
				
			</tr>
			<tr align="center">
				
				<td colspan="8"><input type="submit" name="insert_post" value="insert product now"/></td>
				
			</tr>
		</table>
		
	</form>	
		
		
		
		
		
		
</body>
</html>		

<?php
	
	
	
	if(isset($_POST['insert_post'])){
	//getting the text data from fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keyword = $_POST['product_keyword'];
		
	//getting the images from the fields
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
		
		
		 $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keyword) 
		values('$product_cat','$product_brand','$product_title ','$product_price','$product_desc','$product_image ','$product_keyword')";
		
		$insert_pro = mysqli_query($con,$insert_product);
		
		if($insert_pro){
			echo "<script>alert('product has been inserted!!!')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
		}
	
	



?>