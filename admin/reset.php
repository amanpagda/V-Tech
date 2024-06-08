<?php
include("login.php");
$email = $_POST["email"];
if(isset($_POST["reset_submit"])){
    $sql = "SELECT * FROM `admin` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_num_rows($result)==1){

            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            $sql_i = "UPDATE `admin` SET `token`='$reset_token',`resettoken`='$date' WHERE `email`='$_POST[email]'";

            if(mysqli_query($conn, $sql_i)){
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