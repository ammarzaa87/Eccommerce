<?php
session_start();
/* don't allow anyone to access without signing up first*/
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Store info</title>

    <link href="css/store.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Store info</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action ="php/store.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" placeholder="Enter Store Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="value">
                                    <input class="input--style-6" type="text" name="location" placeholder="Enter Store Location">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="description" placeholder="Describe Your Store"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Store image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="my_image" >
                                    <label class="label--file" for="file"></label>
                                    
                                </div>
								
                                <div class="label--desc">This image will appear to the user as a profile for your store</div>
                            </div>
                        </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" name="submit" type="submit">Send Information</button>
                </div>
				</form>
            </div>
        </div>
    </div>






</body>

</html>
