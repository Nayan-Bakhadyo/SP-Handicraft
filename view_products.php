<?php
include_once('connection.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SP Handicraft</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/corousel.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="icon" href="assets/img/logo.jpg" type="image/icon type">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">


</head>

<body id="page-top" style="background-image:url('assets/img/admin2.jpg'); overflow:hidden;"><nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
    <img src="assets/img/logo.jpg" alt="sp handicraft" style="height:50px; width:50px; border-radius:50%;">&nbsp;&nbsp;
    <a class="navbar-brand js-scroll-trigger" href="#page-top">S.P Handicraft</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="index.php"  >Home</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="index.php#about" >About Us</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link href-btn" href="index.php#contact">Contact Us</a></li>
            </ul>
    </div>
    </div>
</nav>
<div class="container-fluid" style="overflow-y: scroll; width:100%; height:100%;">
<div class="container-fluid text-center" style=" padding-top:70px;">

<form action="#" method="post" style="width:150px; text-align:center; margin-bottom:15px; display:inline-block;" enctype="multipart/form-data"> 
            <div style="float:left; margin-bottom:5px; float:left; ">
            <label for="category"style="color:white; font-weight:bold;">Select Category:</label>&nbsp;
            <select name="category" id="category" style="display:inline-block;" class="custom-select custom-select-sm " >
              <?php
                                          $result = mysqli_query($conn,"SELECT * FROM category"); 
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
                <!-- <div style="float:right; display:inline-block; text-align:left;"> -->
                <button class="btn btn-primary btn-sm" style="width:100px; margin-top:5px;" type="submit" id="p_category" name="p_category"  type="button">Go</button>
                                        <!-- </div>  -->
                                        </div></form>
                                        </div>


    <?php
   
    if(isset($_POST['category']) || isset($_GET['category'])){
        if(isset($_POST['category'])){
    $cat = $_POST['category'];
        }else{
            $cat = $_GET['category'];
        }
    include_once("connection.php");
    error_reporting(0);
    $query= "SELECT category_id FROM category WHERE title='$cat';";
    $data=mysqli_query($conn, $query);
    $result= mysqli_fetch_assoc($data);
    $cat_id = $result['category_id'];

    $query = "SELECT * from products WHERE category_id= $cat_id;";
    $data =mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
?>
<div class="container " style="background: rgba(227, 82, 9, 0.60); margin-top:0px;">
<h3 class="text-center" style=" color:white; padding:2px;"><?php echo $cat?></h3>
</div>
<?php
    if($total>0){
        while($result= mysqli_fetch_assoc($data)){
?>
<section class="page-section" style="padding-top:2px;" >
        <div class="container">
            <div class="product-item" >
                <div class="d-flex product-item-title">
                    <div class="d-flex mr-auto bg-faded p-2 rounded" style="background: rgba(255, 255, 255, 0.60);">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper" style="font-weight:bold; font-size:15px;" >Product ID: <?php echo $result['product_id']; ?></span><br><span class="section-heading-lower"><?php echo $result['product_name']?></span></h2>
                    </div>
                </div>
                        <!-- get image datas -->
                        <?php $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $result['image_data'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                        // print_r($words);
                        $i= count($words); 
                        if($i == 1){?>
                            <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" style="height:250px; width:auto;" src="assets/product_images/<?php echo $words[0]?>">
                        <?php }
                else{
                        ?>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php for($j=1;$j<$i;$j++){?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $j?>"></li>
                <?php }?>
                </ol>
                    <div class="carousel-inner">
                         <div class="carousel-item active">
                         <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/product_images/<?php echo $words[0]?>" alt="image">
                       </div>
                     
                       <?php
                            for($j=1; $j<$i; $j++){
                               ?>
                                 <div class="carousel-item " >
                                  <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/product_images/<?php echo $words[$j]?>" style="height:250px; width:auto;" alt="image">
                                </div>
                            <?php
                        }
                    ?></div>
                       <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>

                        </div>
                    <?php }?>
                <div class="bg-faded p-5 rounded" style="background: rgba(255, 255, 255, 0.60); ">
                    <p class="mb-0">Price: <?php echo $result['price'];?></p>
                    <p class="mb-0">Description: <?php echo $result['product_description'];?></p>
            </div>
    </section>
<?php
        }
    }else{?>
   
    <div class="container container-centered" style="color:white; text-align:Center; font-size:35px; padding-top:20px;">
    <?php
        echo ("Sorry product of this category is out of stock right now!!");
    }

 }else{ ?>

                    <!-- for all products -->
 <?php
 $query = "SELECT * from products";
    $data =mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if($total>0){
    ?>
    <?php
        while($result= mysqli_fetch_assoc($data)){
?>
<section class="page-section" style="padding-top:2px;" >
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex mr-auto bg-faded p-5 rounded" style="background: rgba(255, 255, 255, 0.60);">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper" style="font-weight:bold; font-size:20px;" >Product ID: <?php echo $result['product_id']; ?></span><br><span class="section-heading-lower"><?php echo $result['product_name']?></span></h2>
                    </div>
                    </div>
                    <!-- get image datas -->
                    <?php $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $result['image_data'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                        // print_r($words);
                        $i= count($words); 
                        if($i == 1){?>
                            <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" style="height:250px; width:auto;" src="assets/product_images/<?php echo $words[0]?>">
                        <?php }
                else{
                        ?>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php for($j=1;$j<$i;$j++){?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $j?>"></li>
                <?php }?>
                </ol>
                    <div class="carousel-inner">
                         <div class="carousel-item active">
                         <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/product_images/<?php echo $words[0]?>" alt="image">
                       </div>
                     
                       <?php
                            for($j=1; $j<$i; $j++){
                               ?>
                                 <div class="carousel-item " >
                                  <img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/product_images/<?php echo $words[$j]?>" style="height:250px; width:auto;" alt="image">
                                </div>
                            <?php
                        }
                    ?></div>
                       <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>

                        </div>
                    <?php }?>

                <div class="bg-faded p-5 rounded" style="background: rgba(255, 255, 255, 0.60); ">
                    <p class="mb-0">Price: <?php echo $result['price'];?></p>
                    <p class="mb-0">Description: <?php echo $result['product_description'];?></p>
            </div>
        </div>
    </section>
<?php
        }
    }else{?>
     </div>
    <div class="container container-centered" style="color:white; text-align:Center; font-size:35px; padding-top:20px;">
    <?php
        echo ("Sorry no products available right now!!");
    }}
?>
</div></div>
</div>
   
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/current-day.js"></script>
<script src="assets/js/index.js"></script>
<script src="assets/js/corousel.js"></script>
</body>
</html>