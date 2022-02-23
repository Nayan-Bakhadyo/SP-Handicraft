<?php

include_once('connection.php');
$query = "select * from admin";
$result= mysqli_query($conn, $query);
$result = mysqli_fetch_row($result);

    if($_POST['username']==$result[1] && $_POST['password']==$result[2]){
        session_start();
                                                                                    // Set session variables
        $_SESSION["logged_in"] =1;
                                                                    // Set cookie if remember me is checked
        if(isset($_POST['remember'])){
            //COOKIES for username
            setcookie ("username",$_POST["username"],time()+24*3600, "/","", 0);
            //COOKIES for password
            setcookie ("userpassword",$_POST["password"],time()+24*3600, "/","", 0);
         }
        header('Location: admin.php');
    }
    else{
        $_SESSION['logged_in']=0;
        header('Location: index.php');
    }
?>