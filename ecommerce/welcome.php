<?php
include "php/connection.php";
session_start();
/* don't allow any one to enter welcome without loging in first*/
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

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styless.css" />
  <title>Ecommerce Website</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
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
              <a href="#home" class="nav-link scroll-link">Home</a>
            </li>
            
            <li class="nav-item">
              <a href="#footer" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link scroll-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="#account" class="nav-link scroll-link">Account</a>
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

    <!-- Hero -->
    <img src="./images/banner.png" alt="" class="hero-img" />

    <div class="hero-content">
      <h2><span class="discount">70% </span> SALE OFF</h2>
      <h1>
        <span>Summer Vibes</span>
        <span>mode on</span>
      </h1>
      <a class="btn" href="#shop">shop now</a>
    </div>
  </header>

  <!-- Main -->
  <main>
    <section class="advert section">
      <div class="advert-center container">
        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Girls <br />
                Clothing
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/advert1.png" alt="">
        </div>

        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Summer <br />
                Clothing
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/advert2.png" alt="">
        </div>

        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Boys <br />
                Clothing
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/advert3.png" alt="">
        </div>
      </div>
    </section>
    <!-- Testimonials -->
    <section id = "shop" class="section">
	<div class="title">
        <h1>Stores</h1>
      </div>
      <div class="testimonial-center container">
	  <!-- Show all available stores as cards with their images -->
	   <?php
	   $sql = "SELECT * FROM stores";
		$result = $connection->query($sql);
		while($row = $result->fetch_assoc()) {
			?>
			<!-- when user click on a certain store he will directed to proucts with the store id -->
        <div class="testimonial" onclick="location.href='product.php?s_id=<?php echo $row['id'];?>';">
          <span>&ldquo;</span>
          <p>
            <?php echo $row["description"];?>
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/<?php echo $row['image'];?>" alt="" />
          </div>
          <h4><?php echo $row["name"];?></h4>
        </div>
		<?php
		}
		?>
      </div>
    </section>
	
  


    <!-- Product Banner -->
    <section class="section">
      <div class="product-banner">
        <div class="left">
          <img src="./images/test.jpg" alt="" />
        </div>
        <div class="right">
          <div class="content">
            <h2><span class="discount">70% </span> SALE OFF</h2>
            <h1>
              <span>Collect Your</span>
              <span>Kids Collection</span>
            </h1>
            <a class="btn" href="#shop">shop now</a>
          </div>
        </div>
      </div>
    </section>



    <!-- Brands -->
    <section class="section">
	
      <div class="brands-center container">
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#footer">Brands</a>
          <a href="#footer">Gift Certificates</a>
          <a href="#footer">Affiliate</a>
          <a href="#footer">Specials</a>
          <a href="#footer">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#footer">About Us</a>
          <a href="#footer">Privacy Policy</a>
          <a href="#footer">Terms & Conditions</a>
          <a href="#footer">Contact Us</a>
          <a href="#footer">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#footer">My Account</a>
          <a href="#footer">Order History</a>
          <a href="#footer">Wish List</a>
          <a href="#footer">Newsletter</a>
          <a href="#footer">Returns</a>
        </div>
        <div id ="contact" class="footer-center">
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