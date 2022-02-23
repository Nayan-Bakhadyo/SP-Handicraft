<?php
if(isset($_POST['submit'])){
    $error='';
    $test = '';
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];
    
    // Validation of feedback from customer
$test = validation($name, $subject, $mailFrom, $message);
   if($test==2){
        $error = "Name is required";
   }else if($test == 2){
    $error = "Your name is either empty or there are special characters!!";
   }else if($test == 3){
    $error="Name too long!!";
   }else if($test == 4){
    $error = "Subject is required!!";
   }else if($test == 5){
    $error="Subject too long!!";
    }else if($test == 6){
        $error = "Enter valid email!";
}
    else if($test == 7){
        $error = "Your message is either empty or too long!";
    }
if($test==1){
    require 'phpmailer/PHPMailerAutoload.php';
   
    $mail = new PHPMailer;
    $mail ->Host='smtp.gmail.com';
    $mail ->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='info.sphandicraft@gmail.com';
    $mail->Password='info.sp1234';

    $mail->setFrom($mailFrom,$name);
    $mail->addAddress('sp.handicraft55@gmail.com');
    $mail->addReplyTo($mailFrom,$name);

    $mail->isHTML(true);
    $mail->Subject='Subject: '.$subject;
    $mail->Body='<h3 align=center> Name: '.$name.'<br> Email:'.$mailFrom.'<br>Subject: '.$subject.'<br>Message: '.$message.'</h3>';

    if($mail->send()){
    // echo '<script> alert("Thanks for contacting us. We will get back to you soon."); </script>';
    header("Location: index.php?errorcode=1/#contact");
}}
    else{
        header('Location: index.php?errorcode='.$test.'/#contact');
    }
}
function validation($name, $subject, $mailFrom, $message){
    if (empty($name)) {
        return 2;
      }
    else {if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
        return 2;
      }}
    if(strlen($name)>100){
        return 3;
    }

    if (empty($subject)) {
        return 4;
      }
    if(strlen($subject)>700){
        return 5;
    }
    if (empty($mailFrom)) {
        
        return 6;
      }
    else{if(!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
        return 6;
    }}
    if(empty($message) || strlen($message)>7000){
        return 7;
    }
return true;
}
    ?>