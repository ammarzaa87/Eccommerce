<?php
include "php/connection.php";
session_start();
/* don't allow any one to enter product-details without loging in first*/
if(empty($_SESSION['user_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styless.css" />
  <title>Product Details</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="nav">
    <div class="navigation container">
      <div class="logo">
        <h1>SE Shop</h1>
      </div>

      <div class="menu">
        <div class="top-nav">
          <div class="logo">
            <h1>SE Shop</h1>
          </div>
          <div class="close">
            <i class="bx bx-x"></i>
          </div>
        </div>

        <ul class="nav-list">
          <li class="nav-item">
            <a href="welcome.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="welcome.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="#footer" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#footer" class="nav-link">Contact</a>
          </li>
         
          <li class="nav-item">
            <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
          </li>
		   <li class="nav-item">
            <a href="logout.php" class="nav-link">Log Out</a>
          </li>
        </ul>
      </div>

      <a href="cart.php" class="cart-icon">
        <i class="bx bx-shopping-bag"></i>
      </a>

      <div class="hamburger">
        <i class="bx bx-menu"></i>
      </div>
    </div>
  </nav>

  <!-- Product Details -->
   <?php 
	  $p_id = $_GET["product_id"];
	 
	   $sql1 = "SELECT * FROM products where id =?";
	   $stmt1 = $connection->prepare($sql1);
	   $stmt1->bind_param("i",$p_id);
	   $stmt1->execute();
		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
	  ?>
  <section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="./images/<?php echo $row['image'];?>" alt="">
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="./images/<?php echo $row['image'];?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="./images/<?php echo $row['image'];?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="./images/<?php echo $row['image'];?>" alt="">
          </div>
          <div class="thumbnail">
            <img src="./images/<?php echo $row['image'];?>" alt="">
          </div>
        </div>
      </div>
	 
      <div class="right">
        <span>Home/T-shirt</span>
        <h1><?php echo $row["name"];?> By Handsome</h1>
        <div class="price">$<?php echo $row["price"];?></div>
		<h3>Size: <?php echo $row["size"];?></h3>

        <form class="form">
          <input type="text" placeholder="1">
          <a href="php/buy.php?product_id=<?php echo $row['id'];?>" class="addCart">Add To Cart</a>
        </form>
        <h3>Product Details</h3>
        <p><?php echo $row['details'];?></p>
      </div>
	  
    </div>
  </section>

  <!-- Related -->
  <section class="section featured">
    <div class="top container">
      <h1>Related Products</h1>
      <a href="#" class="view-more">View more</a>
    </div>

    <div class="product-center container">
	<?php
		$s_id = $_SESSION['s_id'];
	   $sql1 = "SELECT * FROM products where store_id =?";
	   $stmt1 = $connection->prepare($sql1);
	   $stmt1->bind_param("i",$s_id);
	   $stmt1->execute();
		$result = $stmt1->get_result();
		while($row = $result->fetch_assoc()) {
			
			
			?>
      <div class="product">
        <div class="product-header">
          <img src="./images/<?php echo $row['image'];?>" alt="">
          <ul class="icons">
            <span><i class="bx bx-heart"></i></span>
			<a href="php/buy.php?product_id=<?php echo $row['id'];?>">
            <span><i class="bx bx-shopping-bag"></i></span>
			</a>
			
			<a href="product-details.php?product_id=<?php echo $row['id'];?>">
            <span><i class="bx bx-search"></i></span>
			</a>
          </ul>
        </div>
        <div class="product-footer">
          <a href="#"><h3><?php echo $row["name"];?></h3></a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">$<?php echo $row["price"];?></h4>
        </div>
      </div>
       <?php
		}
		?>
      
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Brands</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            Beirut, Lebanon
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            Lebanon.SE@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            03 000 000
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            Dream Town
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- GSAP -->
  <script src="./js/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>