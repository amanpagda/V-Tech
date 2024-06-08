<?php 
session_start();
include("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">



<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/svg/logo.html" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <?php include("sidebar.php"); ?>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <?php include("header.php"); ?>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title">Update Now</h2>

                    <!-- form start -->
                    <div class="container">
                        <?php
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `admin` WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row["name"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Role</label>
                                    <select class="form-control" name="role">
                                        <option value="Admin" <?php if ($row["role"] == "Admin") {
                                            echo "selected";
                                        } ?>>Admin</option>
                                        <option value="Super-Admin" <?php if ($row["role"] == "Super-Admin") {
                                            echo "selected";
                                        } ?>>Super-Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="<?php echo $row["password"]; ?>">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>


                        <?php
                        if (isset($_POST["update"])) {
                            $id = $_POST["id"];
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $role = $_POST["role"];
                            $password = $_POST["password"];
                            $token = md5(rand());

                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`role`='$role',`password`='$hash',`token`='$token', `date`= current_timestamp() WHERE id='$id'";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo "<script>
                                alert('Update Successfully');
                                window.location.href = 'index1.php';
                                </script>";
                            } else {
                                echo "<script>
                                alert('Update Error');
                                window.location.href = 'index1.php';
                                </script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Chart library -->
    <script src="plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>


<!-- Mirrored from themewagon.github.io/elegant/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 06:57:20 GMT -->

</html>