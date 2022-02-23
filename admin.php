<?php 
include_once('connection.php');
session_start();

if($_SESSION['logged_in']==0){
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SP Handicraft</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="icon" href="assets/img/logo.jpg" type="image/icon type">
</head>

<body id="page-top"><nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
    <img src="assets/img/logo.jpg" alt="sp handicraft" style="height:50px; width:50px; border-radius:50%;">&nbsp;&nbsp;
    <a class="navbar-brand js-scroll-trigger" href="#page-top">S.P Handicraft</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href=""  data-toggle="modal" data-target="#product_modal" >Add product</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href=""  data-toggle="modal" data-target="#category">Add Category</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="index.php" >Logout</a></li>
            </ul>
    </div>
    </div>
</nav>
<header class="masthead text-center text-white d-flex" style="background-image:url('assets/img/admin2.jpg');">
<div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase"><strong>Admin Panel</strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">Manage Products and Category </p><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="manage.php">Manage Products</a></div>
        </div>
    </header>

                        <!-- add product section -->
   

<!-- bootstrap modal for category -->
<div class="modal fade" role="dialog" tabindex="-1" id="category">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Add Category</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                    <form id="add_category" name="add_category" action="category.php" onsubmit="return validate_category()"  method="post">
                            <div class="form-group">
                            <div class="form-group has-feedback"><label for="from_name" style="font-size:14px;">Category Title:
                            </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-list-ul"></i></span></div><br>
                                      <input class="form-control" type="text" required="" placeholder="Enter Category" name="category_name" id="category_name">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-lg text-white"  type="submit" id="add" name="add" style="width: 100%;" type="button">add</button></div>
                        </form>
                </div>
            </div>
       </div>
       </div>
       </div>
<!-- bootstrap modal for product -->

<div class="modal fade" role="dialog"  id="product_modal">
            <div class="modal-dialog modal modal-dialog-centered" role="document">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title" >Add Product:</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                    <div class="container">
                    <div class="row">
                        <form action="product.php" method="post" name="add_product" id="add_product"  onsubmit="return validate_product()"  enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-list-ul"></i></span></div>
                                      <input class="form-control" type="text" required="" placeholder="Enter product name!!" name="product_name" id="product_name">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text">|<i class="fa fa-dollar"></i></span></div>
                                      <input class="form-control" type="number" required="" placeholder="Enter product price!!" name="product_price" id="product_price">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-camera-retro"></i></span>
                                      <input type="file" name="files[]" multiple required=""></div>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>

                            <!-- get data from category -->
                        <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-chevron-down"></i></span></div>&nbsp;&nbsp;
                                      <?php $result = mysqli_query($conn,"SELECT * FROM category"); ?>
                                      <label for="category">Select a category:</label>&nbsp;
                                        <select name="product_category" id="product_category" class="custom-select custom-select-sm ">
                                        <?php
                                         if (mysqli_num_rows($result) > 0) {
                                           
                                            $i=0;
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["title"];?>"><?php echo $row["title"];?></option>

                                         <?php }}
                                            else{
                                                ?>
                                                <option value="no">--No Category--</option>
                                                <?php
                                            }
                                         ?>
                                        </select>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>  

                            <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                                      <textarea class="form-control" required="" id="product_description" name="product_description" placeholder="Enter Description" rows="4" cols="45"></textarea>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>              
                            <hr>
                            <div class="form-group"><button class="btn btn-primary btn-lg text-white"  type="submit" id="submit" name="submit" style="width: 100%;" type="button">add</button></div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

       
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/index.js"></script>
 
</body>
</html>