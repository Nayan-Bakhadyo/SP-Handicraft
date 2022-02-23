<?php
include_once('connection.php');
if(isset($_POST['edit'])){
$pid = $_GET['pid'];

$result = mysqli_query($conn,"SELECT * FROM products WHERE product_id=$pid"); 
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $cat_id = $row['category_id'];
        $price = $row['price'];
        $description = $row['product_description'];
        $image_data = $row['image_data'];
       
    }
}else {
    echo"<script>alert('Cannot perform edit! Database error');<script>";
}
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

<body id="page-top" style="background-image:url('assets/img/admin2.jpg');"><nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
    <img src="assets/img/logo.jpg" alt="sp handicraft" style="height:50px; width:50px; border-radius:50%;">&nbsp;&nbsp;
    <a class="navbar-brand js-scroll-trigger" href="#page-top">S.P Handicraft</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
            
                <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="index.php" >Logout</a></li>
            </ul>
    </div>
    </div>
</nav>
<div class="container centered" style="padding-bottom:50px;" id="product_modal">
            <div class="modal-dialog modal modal-dialog-centered" role="document">
                <div class="modal-content" >
                    <div class="header text-center" style="padding-top:10px;">
                        <h4 class="modal-title " >Edit Product</H4></div>
                    <div class="modal-body">
                    <div class="container">
                    <div class="row">
                        <form action="edit_product_process.php?pid= <?php echo $id; ?>" method="post" name="add_product" id="add_product"  onsubmit="return validate_product()"  enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-list-ul"></i></span></div>
                                      <input class="form-control" type="text" value=<?php echo $name?> required="" placeholder="Enter product name!!" name="product_name" id="product_name">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text">|<i class="fa fa-dollar"></i></span></div>
                                      <input class="form-control" type="number"value=<?php echo $price?>  required="" placeholder="Enter product price!!" name="product_price" id="product_price">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <?php
                            $result = mysqli_query($conn,"SELECT * FROM category WHERE category_id=$cat_id");
                            $data= mysqli_fetch_array($result);
                            ?>
                            <!-- get data from category -->
                        <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-chevron-down"></i></span></div>&nbsp;&nbsp;
                                      <?php $result = mysqli_query($conn,"SELECT * FROM category"); ?>
                                      <label for="category">Select a category:</label>&nbsp;
                                        <select name="product_category" value = <?php echo $data['title'];?> id="product_category" class="custom-select custom-select-sm ">
                                        <?php
                                         if (mysqli_num_rows($result) > 0) {?>
                                           <option value="<?php echo $data['title'];?>"><?php echo $data['title'];;?></option>
                                           <?php
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
                                      <textarea class="form-control" required=""  id="product_description" name="product_description" placeholder="Enter Description" rows="4" cols="45"><?php echo $description;?></textarea>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>              
                            <hr>
                            <div class="form-group"><button class="btn btn-primary btn-lg text-white"  type="submit" id="submit" name="submit" style="width: 100%;" type="button">Edit</button></div>
                            <a  href="manage.php" ><div class="form-group"> <button class="btn btn-primary btn-lg text-white" style="width: 100%;" type="button">Close</button></div></a>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</header>
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