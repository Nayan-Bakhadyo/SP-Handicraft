<?php
include_once('connection.php');
$flag=1;
if(isset($_POST['add'])){
    $title = $_POST['category_name'];
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$title)) {
            echo "<script>
                alert('No special characters allowed!!');
                window.location.href='admin.php';
                </script>";
        }else{
            $sql = "select * from category";
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result))
            {
                if($title == $row['title']){
                    $flag=0;
                }
            }
            if($flag == 1){
            $sql = "INSERT INTO category (category_id, title) VALUES (NULL, '$title')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>
                    alert('Category added successfully!');
                    window.location.href='admin.php';
                    </script>";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }else{
                echo "<script>
                alert('Category already exist!!');
                window.location.href='admin.php';
                </script>";
            }
        }
}
?>