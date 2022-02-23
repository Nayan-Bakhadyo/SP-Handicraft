<?php
include_once('connection.php');
$product_exist=0;
if(isset($_POST['submit'])){
$del_category=  ($_POST['product_category']);
$result = mysqli_query($conn,"SELECT category_id FROM category WHERE title='$del_category'"); 
$row= mysqli_fetch_array($result);
$cat_id= $row['category_id'];

$result = mysqli_query($conn,"SELECT * FROM products"); 
while($row = mysqli_fetch_array($result)) {
    if($row["category_id"] == $cat_id){
        $product_exist=1;
    }   
}
if($product_exist==0){
    $query="DELETE FROM category WHERE category_id='$cat_id'";
    $result=mysqli_query($conn, $query);
    if($result){
        echo "<script>alert('Category deleted successfully!!'); window.history.back();</script>";
    }
}else{
    echo "<script>alert('Products are available of this category. Cannot delete (Delete products having this category first)'); window.history.back();</script>";
}
}
?>