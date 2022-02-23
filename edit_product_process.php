<?php
include_once('connection.php');
if(isset($_POST['submit'])){
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $category = $_POST['product_category'];
    $id = $_GET['pid'];

    $query = "SELECT * FROM category where title = '$category'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        $cat_id= $data['category_id'];
    }
    $query = "UPDATE products SET product_name= '$name' , price=$price , product_description='$description' , category_id=$cat_id WHERE product_id=$id";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Record updated successfully')
        window.location.href='manage.php';
        </script>";
      } else {
        echo "Error updating record: " . $conn->error;
      }
}
?>