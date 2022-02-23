<?php 
if(isset($_POST['submit'])){ 
    // Include the database configuration file 
    include 'connection.php'; 
    $image_data='';   
    $size_error= 0;
    $i= 0;
    $error =0;
    $cat = $_POST['product_category'];   
    $sql="SELECT category_id FROM category WHERE title ='$cat'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $cat_id= $row['category_id'];
    $name= $_POST['product_name'];
    $price= $_POST['product_price'];
    $desc = $_POST['product_description'];

    // File upload configuration 
    $targetDir = "assets/product_images/"; 
    $allowTypes = array('jpg','png','jpeg'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            echo ($_FILES["files"]["size"][$i]);
            echo ("--");
                if(($_FILES["files"]["size"][$i])== 0){
                    echo "<script>alert('File size should be less than 2 MB!!!');
                    window.history.back();
                    </script>";
                    $size_error = 1;
                }
            $i= $i+1;
        }
    if($size_error == 0){
        foreach($_FILES['files']['name'] as $key=>$val){ 
            
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 

            //check if the image already exist
            $sql="SELECT * FROM images";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
            if($fileName == $row['file_name']){
                $error = 1;
            }
            }
            $sql ="SELECT * FROM products";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                if($name == $row['product_name']){
                    $error = 2;
                }
            }
            $image_data= $image_data.' '.'"'.$fileName.'"';
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
            
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                            // Image db insert sql 
                            $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                        }else{ 
                            $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                        } 
                    }else{ 
                        $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                    } 
        } 
        if($error == 1){
            echo "<script>alert('Image with this filename already exist!!') 
            window.history.back();
            </script>";

        }
        if($error == 2){
            echo "<script>alert('This product Name already exist!'); 
            window.history.back();
            </script>";
        }
    if($error == 0){
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 
            $insert = "INSERT INTO products( product_id, product_name, price, product_description, category_id, image_data) VALUES (NULL,'$name', $price, '$desc', $cat_id, '$image_data');";
            $insert .= "INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL;";
            // echo $name; echo "<br>";
            // echo $price; echo "<br>";
            // echo $desc; echo "<br>";
            // echo $cat_id; echo "<br>";
            // echo $image_data; echo "<br>";

            // $insert .= "INSERT INTO products (product_id, product_name, price, product_description, category_id, image_id) VALUES (Null, '$name', $price, '$desc', $cat_id, '$image_data');";
            $result = mysqli_multi_query($conn, $insert);
            if($result === TRUE){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully."; 
                
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 
    }else{ 
        $conn -> close();
        $statusMsg = 'Please select a file to upload.'; 
    } 
    // $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $image_data, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    // print_r($words);
    // echo count($words); 
    // Display status message 
  
    echo "<script>alert('$statusMsg'); 
    window.history.back();
    </script>";
} }}
?>

