<?php
include "php/connection.php";
session_start();
$_SESSION['s_id'] = $_GET["s_id"];
/* don't allow any one to enter product without loging in first*/
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
    <title>Products</title>
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
                        <a href="#products" class="nav-link">Products</a>
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

    <!-- All Products -->
    <section class="section all-products" >
        <div class="top container">
            <h1>All Products</h1>
            <form>
               
                    <p>Default Sorting</p>
            </form>
        </div>

        <div id="products" class="product-center container">
		<!-- Show all products available by the chosen store as cards with their images -->
		<?php
		$s_id = $_SESSION['s_id'];
	   $sql1 = "SELECT * FROM products where store_id =?";
	   $stmt1 = $connection->prepare($sql1);
	   $stmt1->bind_param("i",$s_id);
	   $stmt1->execute();
		$result = $stmt1->get_result();
		while($row = $result->fetch_assoc()) {
			$p_id = $row['id'];
			
			?>
			
            <div class="product">
                <div class="product-header">
				<img src="./images/<?php echo $row['image'];?>" alt="">
				<?php
				$sql2 = "SELECT COUNT(user_id) AS count FROM `likes` WHERE product_id =$p_id";
				$stmt2 = $connection->prepare($sql2);
				$stmt2->execute();
				$result2 = $stmt2->get_result();
				$row2 = $result2->fetch_assoc();
				?>
                    <ul class="icons">
						<a href="php/like.php?product_id=<?php echo $row['id'];?>">
                        <span><i class="bx bx-like"></i></span>
						</a>
                         <!-- when user click on shoping bag of a certain product he will directed to cart with the product id -->
					 <a href="php/buy.php?product_id=<?php echo $row['id'];?>"><span><i class="bx bx-shopping-bag"></i></span>
						</a>
				   
                        
                        <a href="product-details.php?product_id=<?php echo $row['id'];?>"><span><i class="bx bx-search"></i></span>
						</a>
                    </ul>
                </div>
                <div class="product-footer">
				
                    
                        <h3><?php echo $row["name"];?></h3>
                    
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bx-star"></i>
                    </div>
					<h4 class="price"><?php echo $row2["count"];?> Likes</h4>
                    <h4 class="price">$<?php echo $row["price"];?></h4>
                </div>
            </div>
			
            <?php
		}
		?>
        </div>
		
    </section>

    <section class="pagination">
        <div class=" container">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span><i class='bx bx-right-arrow-alt'></i></span>
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