<?php
include("db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$reset_token = bin2hex(random_bytes(16));
$email = $_POST["email"];
function sendMail($email, $reset_token){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'amanpagda20@gmail.com';                     //SMTP username
        $mail->Password   = 'ehwewnaryrtrnkna';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('amanpagda20@gmail.com', 'Alish Don');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link From Company Name';
        $mail->Body    = "This is the HTML message body <b>Click The Link</b><br>
        <button type='button' class='btn btn-primary'>
        <a href='http://localhost/v-tech/admin/upreset.php?email=$email&token=$reset_token'>Reset Passwor</a>
        </button>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

} 

if(isset($_POST["reset_submit"])){
    
    $sql = "SELECT * FROM `admin` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_num_rows($result)==1){

            
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            $sql_i = "UPDATE `admin` SET `token`='$reset_token',`resettoken`='$date' WHERE `email`='$_POST[email]'";

            if(mysqli_query($conn, $sql_i) && sendMail($email, $reset_token)){
                echo "<script>
                alert('Password Reset Link Send To Mail');
                window.location.href = 'index.php';
                </script>";
            }else{
                echo "<script>
                alert('Error.....');
                window.location.href = 'index.php';
                </script>";
            }

        }else{
        echo "<script>
         alert('Invalid Email');
         window.location.href = 'index.php';
         </script>";
        }
    }else{
        echo "<script>
         alert('Error');
         window.location.href = 'index.php';
         </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="login/css/iofrm-theme29.css">
</head>

<body>
    
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.php">
                <div class="logo">
                    <img class="logo-size" src="login/images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="login/images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Reset Password</h3>
                        <p>Enter Your Link Email</p>
                        <form method="post" action="reset_pass.php">
                            <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
                            <div class="form-button">
                                <button id="submit" type="submit" name="reset_submit" class="ibtn">Reset Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.min.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
</body>

</html>