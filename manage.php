<?php 
include_once('connection.php');
session_start();

if($_SESSION['logged_in']==0){
    header("location:index.php");
}
$cat='';

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
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href=""  data-toggle="modal" data-target="#product_modal" >Add product</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href=""  data-toggle="modal" data-target="#add_category">Add Category</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link href-btn" href="" data-toggle="modal" data-target="#category_delete">Remove Category</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="index.php" >Logout</a></li>
            </ul>
    </div>
    </div>
</nav>

                                       
<div class="container-fluid text-center" style=" padding-top:80px;">
            <h3 style="color: #fff;font-size: 22px; font-weight:bold;">Edit Product Detail</h3><br>
            
            <form action="#" method="post" style="width:150px; text-align:center; margin-bottom:15px; display:inline-block;" enctype="multipart/form-data"> 
            <div style="float:left; margin-bottom:5px; float:left; ">
            <select name="category" id="category" class="custom-select custom-select-sm " >
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
                </select></div>
                <div style="float:right; display:inline-block;position:absolute; text-align:left;">
                <button class="btn btn-primary btn-sm" style="width:50px;" type="submit" id="p_category" name="p_category"  type="button">Go</button>
                                        </div></form>

            <div class="col">
            <div class="dynamic-table">
<div class="row clearfix">
		<div class="col-md-12 column" >
        <?php 
if(isset($_POST['category'])){
    $cat = $_POST['category'];
    include_once("connection.php");
    error_reporting(0);
    $query= "SELECT category_id FROM category WHERE title='$cat';";
    $data=mysqli_query($conn, $query);
    $result= mysqli_fetch_assoc($data);
    $cat_id = $result['category_id'];

    $query = "SELECT * from products WHERE category_id= $cat_id;";
    $data =mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    ?><div class="container-fluid " style="background: rgba(227, 82, 9, 0.60); margin-top:0px;">
    <h4 class="text-center" style=" color:white; padding:2px;"><?php echo $cat?></h4>
    </div>
    <?PHP
if($total !=0){
?>
        <table class="table table-dynamic " style="color:#fff; Overflow-x:scroll; text-align:center;">
            <thead>
                <tr>
                    <th class="text-center">
                        Product ID
                    </th>
                    <th class="text-center">
                        Product Name
                    </th>
                    <th class="text-center">
                        Price
                    </th>
                    <th class="text-center">
                        Image
                    </th>
                    <th class="text-center">
                        Description
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
while($result= mysqli_fetch_assoc($data))
{?>
<tr>
 <td><?php echo $result['product_id']?></td>
 <td><?php echo$result['product_name']?></td>
 <td><?php echo$result['price']?></td>
 <td>
<?php $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $result['image_data'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
// print_r($words);
$i= count($words); 
for($j=0; $j<$i; $j++){
    // echo $words[$j];
?>
 <img src = "assets/product_images/<?php echo $words[$j]?>"
  alt = "Learn HTML5" height = "50" width = "80" />
<?php } ?></td> 
 <td><?php echo$result['product_description']?> 
 </td>
 <td>
 <form action="edit_product.php?pid=<?php echo $result['product_id']; ?>" method="post">
             <button type="submit"  name="edit" id="edit" style="margin-bottom:5px;"  class="btn btn-light action-button" href="edit_product.php?pid=<?php echo $result['product_id'];?>">Edit</button>
             </form> <form action="delete_product.php?pid=<?php echo $result['product_id']; ?>" method="post">
            <button type="submit"  onClick="return confirm('Are you sure you want to delete?')" class="btn btn-light action-button" href="delete_product.php?id=<?php echo $result['product_id'];?>">Delete</button>
  </form>
</td> 
</tr><?php }
}
?>
     </tbody>
 </table>
<?php
}else{

        include_once("connection.php");
        error_reporting(0);
        $query = "SELECT * from products;";
        $data =mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

if($total !=0){
?>
			<table class="table table-dynamic " style="color:#fff; Overflow-x:scroll; text-align:center;">
				<thead>
					<tr>
						<th class="text-center">
							Product ID
						</th>
						<th class="text-center">
                            Product Name
						</th>
						<th class="text-center">
							Price
						</th>
						<th class="text-center">
							Image
						</th>
						<th class="text-center">
						    Description
						</th>
                        <th>
                            Action
                        </th>
					</tr>
				</thead>
				<tbody>
                <?php
 while($result= mysqli_fetch_assoc($data))
 {?>
 <tr>
     <td><?php echo $result['product_id']?></td>
     <td><?php echo$result['product_name']?></td>
     <td><?php echo$result['price']?></td>
     <td>
    <?php $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $result['image_data'], 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    // print_r($words);
    $i= count($words); 
    for($j=0; $j<$i; $j++){
        // echo $words[$j];
    ?>
     <img src = "assets/product_images/<?php echo $words[$j]?>"
      alt = "Learn HTML5" height = "50" width = "80" />
    <?php } ?></td> 
     <td><?php echo$result['product_description']?> 
     </td>
     <td>
     <form action="edit_product.php?pid=<?php echo $result['product_id']; ?>" method="post">
             <button type="submit" name="edit" id="edit" style="margin-bottom:5px;"  class="btn btn-light action-button" href="edit_product.php?pid=<?php echo $result['product_id'];?>">Edit</button>
             </form> <form action="delete_product.php?pid=<?php echo $result['product_id']; ?>" method="post">
            <button type="submit"  onClick="return confirm('Are you sure you want to delete?')" class="btn btn-light action-button" href="delete_product.php?id=<?php echo $result['product_id'];?>">Delete</button>
  </form>
      
 </td> 
 </tr><?php }
 }
?>
         </tbody>
     </table>
<?php }?>
		</div>
	</div>
</div></div></div>


<!-- to remove the category -->
<div class="modal fade" role="dialog" tabindex="-1" id="category_delete">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Remove Category</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                    <form id="delete_category" name="delete_category" action="delete_category.php"  method="post">
                            <div class="form-group">
                            <div class="form-group has-feedback"><label for="from_name" style="font-size:14px;">Category:
                            </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <?php $result = mysqli_query($conn,"SELECT * FROM category"); ?>
                                    <select name="product_category" id="product_category" class="custom-select custom-select-sm " style="width:250px;">
                                        <?php
                                         if (mysqli_num_rows($result) > 0) {
                                           
                                            $i=0;
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["title"];?>"><?php echo $row["title"];?></option>


                                            <!-- <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option> -->

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

                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-lg text-white" onClick="return confirm('Are you sure you want to delete?')"  type="submit" id="submit" name="submit" style="width: 100%;" type="button">Delete</button></div>
                        </form>
                </div>
            </div>
       </div>
       </div>
       </div>   

<!-- bootstrap modal for category -->
<div class="modal fade" role="dialog" tabindex="-1" id="add_category">
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
 <!-- add product section -->
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
                                      <label for="cars">Select a category:</label>&nbsp;
                                        <select name="product_category" id="product_category" class="custom-select custom-select-sm ">
                                        <?php
                                         if (mysqli_num_rows($result) > 0) {
                                           
                                            $i=0;
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row["title"];?>"><?php echo $row["title"];?></option>


                                            <!-- <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option> -->

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