<!DOCTYPE>
<?php 
include("functions/functions.php");
?>
<html>
	<head>
		<title>online shopping</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
	
<body>
	
	<div class="main_wrapper">                                          <!-- this is main divison-->
	
	<!--header starts-->
		<div class="header_wrapper">                                     
		
			<img src="images/xampp-cloud.png" id="logo" />
			<img src="images/img3.png"  id="banner"/>
		</div>
	<!--header ends-->
		
		
		<!--navigation bar-->
		<div class="menubar">
		<ul id="menu">
			<li><a href="@">home</a></li>
			<li><a href="@">all products</a></li>
			<li><a href="@">cart</a></li>
			<li><a href="@">my account</a></li>
			<li><a href="@">contact us</a></li>
			
			
		</ul>
		
		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data" >
			<input type="text" name="user_query" placeholder="search a product" />
			<input type="submit" name="search" value="search"/>
			</form>
		</div>
		</div>
		<!--navigation bar ends-->
		
	<!--content area-->	
		<div class="content_wrapper">
		
		
		
		<div id="sidebar">
			<div id="sidebar_title">Categories</div>
			
			<ul id="cats">            <!--this is php code here-->
				<?php getcats(); ?>
			</ul>
			
			<div id="sidebar_title">Brands</div> 
			<ul id="cats">
			<?php getbrands();?>
				</ul>
		
		</div>
		<div id ="content_area" >
		
			<div id="shopping_cart">
				
				<span style="float:right;font-size:18px;padding:5px;line-height:40px"> 
				welcome guest!! <b style="color:orange">shopping cart...</b> - Total ITEMS: Total price: <a href="cart.php" style="text-decoration:none;color:yellow">go to cart</a>
				
				
				</span>
				
				
			</div>
			<div id="products_box">
			<?php
			
			if(isset($_GET['pro_id'])){
			
			$product_id = $_GET['pro_id'];
			$get_pro = "select * from products where product_id='$product_id'";
	
			$run_pro = mysqli_query($con,$get_pro);
	
			while($row_pro = mysqli_fetch_array($run_pro)){
		 
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_price = $row_pro['product_price'];
		 
			$pro_image = $row_pro['product_image'];
			$pro_desc = $row_pro['product_desc'];
			echo "
		
			<div id='single_product'>
				
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='400px' height='380px' />
				<p><b>Rs $pro_price</b></p>
				<p><i>$pro_desc</i><p>
				<a href='index.php' style='float:left; text-decoration:none;color:red;'>go back</a>
				<a href='index.php?pro_id=$pro_id' ><button style='float:right;'>ADD TO CART</button></a>
			</div>
		 
			";
		 
		
		}
		}
		?>
			</div>
		</div>
		</div>
	<!--content area ends-->	
		
		<div id="footer_area">
	
	<h2 style="text-align:center;padding-top:30px;padding-bottom:20px">&copy;2017 by www.streetlights.com</h2>
	
	</div>
	</div>
	
	
	
	
</body>
</html>