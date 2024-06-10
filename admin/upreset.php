<?php
include("db.php");

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

                <?php
                if (isset($_GET['email']) && isset($_GET['token'])) {
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `admin` WHERE `email`='$_GET[email]' AND `token`='$_GET[token]' AND `resettoken`='$date'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        if (mysqli_num_rows($result) == 1) {
                ?>
                            <div class="form-content">
                                <div class="form-items">
                                    <h3>Create New Password</h3>
                                    <form method="POST" action="upreset.php">
                                        <input class="form-control" type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                                        <input class="form-control" type="password" name="password" placeholder="Create password" required>
                                        <div class="form-button">
                                            <button id="submit" type="submit" name="reset_update" class="ibtn">Update Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php
                        } else {
                            echo "<script>
                            alert('Invalid Or Expired Link');
                            window.location.href = 'index.php';
                            </script>";
                        }
                    } else {
                        echo "<script>
                        alert('Error');
                        window.location.href = 'index.php';
                        </script>";
                    }
                }

                ?>

            </div>

            <?php

            if (isset($_POST['reset_update'])) {
                include("db.php");
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $update = "UPDATE `admin` SET `password`='$pass',`token`=NULL,`resettoken`=NULL WHERE `email`='$_POST[email]'";
                $result = mysqli_query($conn, $update);
                if($result){
                    echo "<script>
                    alert('Updated Successfully');
                    window.location.href = 'index.php';
                    </script>";
                }else{
                echo "<script>
                        alert('Error.......');
                        </script>";
                    }
            }

            ?>
        </div>
    </div>
    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.min.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
</body>

</html>