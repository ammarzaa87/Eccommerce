<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
} /* select the admin who log in in order to display his info*/
$u_id = $_SESSION["u_id"];
$sql = "SELECT * FROM stores where user_id =?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i",$u_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$s_id = $row['id'];
$name = $row['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/admin.css" />
	<link rel="stylesheet" href="css/ojLzJK.css" />
	<link href="css/store.css" rel="stylesheet" media="all">
    <title>Edit Product</title>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>      SE Shop</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
				<a href="#add" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Add Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Projects</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Edit Product</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $row['name'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
				<?php
								/* display products available by this store*/
									$p_id = $_GET['item_id'];
									$sql1 = "SELECT * FROM products where id =?";
									$stmt1 = $connection->prepare($sql1);
									$stmt1->bind_param("i",$p_id);
									$stmt1->execute();
									$result1 = $stmt1->get_result();
									$row1 = $result1->fetch_assoc();
									?>
            <div class="container-fluid px-4">

				<div id="add" class="row my-5">
                    <h3 class="fs-4 mb-3">Edit Product</h3>
					 <form method="POST" action ="php/edit.php?p_id=<?php echo $p_id;?>&s_id=<?php echo $s_id;?>" enctype="multipart/form-data">
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                           
                                    
                                    
                            <tbody>
							 
                                <tr>
                                    <th scope="col">name</th>
                                    <th><div class="value">
                                <input class="input--style-6" type="text" name="name" placeholder="<?php echo $row1['name'];?>">
                            </div></th>
                                </tr>
								<tr>
                                    <th scope="col">price</th>
                                    <th><div class="value">
                                <input class="input--style-6" type="text" name="price" placeholder="<?php echo $row1['price'];?>">
                            </div></th>
                                </tr>
                          
						  <tr>
						  <th scope="col">Size</th>
						  <td><div class="value">
										<input class="input--style-6" type="text" name="size" placeholder="<?php echo $row1['size'];?>">
										</div>
									</td>
						  </tr>
						  <tr>
						  <th scope="col">Quantity</th>
						  <td><div class="value">
										<input class="input--style-6" type="text" name="quantity" placeholder="<?php echo $row1['quantity'];?>">
										</div>
									</td>
						  </tr>
						  
							
								<tr>
								<th scope="col">Description</th>
								<td><div class="value">
										<input class="input--style-6" type="text" name="description" placeholder="<?php echo $row1['details'];?>">
										</div>
									</td>
									
								</tr>
								<tr>
                                    <th scope="col">image</th>
                                    <td>
									
									<div class="input-group js-input-file">
										<input type="file" name="my_image" size="60">
										
                                    
									</div>
								</td>
                                </tr>
								<tr>
							<td>	
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
					</td>
					</tr>
								    </tbody>
                        </table>
						</div>
						</div>
						
               
					</form>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
 
</body>

</html>