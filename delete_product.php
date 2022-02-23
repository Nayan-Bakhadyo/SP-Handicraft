<?php
$error = 0;
$p = $_GET['pid'];
include('connection.php');
error_reporting(0);
$query="SELECT * from products where product_id=$p;";
$data=mysqli_query($conn, $query);
while ($result= mysqli_fetch_assoc($data)){
    $image =  $result['image_data'];
}
 $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $image, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
// print_r($words);
$i= count($words); 
for($j=0; $j<$i; $j++){
    $d = $words[$j];
    $query= "DELETE FROM images WHERE file_name='$d';";
    if(!mysqli_query($conn, $query)){
        $error = 1;
        echo("image error");
    }
    if (file_exists('assets/product_images/'.$d)) {
        unlink('assets/product_images/'.$d);
    }
    else{
        $error=1;
        echo ("image error 2");
    }
}
if($error ==0){
$query= "DELETE FROM products WHERE product_id=$p;";
if(!mysqli_query($conn, $query)){
    $error = 1;
    echo("product error");
}
}
if($error ==1){
    echo "<script>alert('Delete was not successful!!'); 
    window.history.back();
    </script>";
}else{
    echo "<script>alert('Delete Successful!!'); 
    window.history.back();
    </script>";
}
 ?>