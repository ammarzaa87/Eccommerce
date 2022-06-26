<?php
include "php/connection.php";
session_start();
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styless.css" />
  <title>Your Cart</title>
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

  <!-- Cart Items -->
  <div class="container-md cart">
 
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Store Name</th>
		<th>Price</th>
      </tr>
	  <!-- show the products that this user has added to his cart with the store name beside each product -->
	   <?php
	   $sql = "SELECT U.id,P.price AS pprice,P.name AS pname,P.image,P.quantity,S.name AS sname 
FROM `products` AS P,`stores` AS S, `users_buy_products` AS UP, `users` AS U  
WHERE P.id = UP.product_id AND P.store_id = S.id AND U.id = UP.user_id 
ORDER BY U.id;";
		$result = $connection->query($sql);
		
		
		while($row = $result->fetch_assoc()) {
			if($_SESSION["user_id"] == $row["id"]){
			
			?>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./images/<?php echo $row['image'];?>" alt="">
            <div>
              <p><?php echo $row["pname"];?></p>
              
              <br />
              <a href="#">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" min="1" max="1"></td>
		<td><?php echo $row["sname"];?></td>
        <td>$<?php echo $row["pprice"];?></td>
      </tr>
	  <?php
			}
		}
		?>
    </table>

    <div class="total-price">
     
      <a href="#" class="checkout btn">Proceed To Checkout</a>

    </div>

  </div>



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
        <div id = "footer" class="footer-center">
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