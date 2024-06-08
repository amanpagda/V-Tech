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
                    <h2 class="main-title">Dashboard</h2>
                    <div class="row stat-cards">
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon primary">
                                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon warning">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon purple">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit danger">
                                            <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon success">
                                    <i data-feather="feather" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">1478 286</p>
                                    <p class="stat-cards-info__title">Total visits</p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit warning">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- form start -->
                    <div class="container">
                        <?php
                        $role = $_SESSION["role"];
                        if ($role == "Super-Admin") {
                        ?>
                            <form action="index1.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Role</label>
                                    <select class="form-select" name="role">
                                        <option disabled selected>Open this select menu</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Super-Admin">Super-Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        <?php } ?>

                        <?php
                        if (isset($_POST["submit"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $role = $_POST["role"];
                            $password = $_POST["password"];
                            $token = md5(rand());

                            if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `admin` WHERE `name`='$name'")) > 0) {
                                echo "<script>
                                alert('Username Already Present');
                                window.location.href = 'index1.php';
                                </script>";
                            } else {
                                $hash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_query($conn, "INSERT INTO `admin`(`name`, `email`, `role`, `password`, `token`, `date`) VALUES ('$name','$email','$role','$hash', '$token',current_timestamp())");
                                echo "<script>
                                alert('Thank You');
                                window.location.href = 'index1.php';
                                </script>";
                            }
                        }
                        ?>
                    </div>

                    <!-- table -->
                    <div class="container row mt-5">
                        <div class="col-12">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">ROLE</th>
                                        <?php
                                        $role = $_SESSION["role"];
                                        if ($role == "Super-Admin") {
                                        ?>
                                            <th scope="col">ACTIONS</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `admin`";
                                    $result = mysqli_query($conn, $sql);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i += 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["role"]; ?></td>
                                            <?php
                                            $role = $_SESSION["role"];
                                            if ($role == "Super-Admin") {
                                            ?>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo "update.php?id=$row[id]" ?>" class='btn btn-primary' style="margin-right:5px;">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="index1.php" method="POST">
                                                        <input type="hidden" name="del_id" value="<?php echo "$row[id]"; ?>">
                                                        <button type="submit" name="delete_id" class="btn btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    // delete Query start
                                    if (isset($_POST['delete_id'])) {
                                        $id = $_POST['del_id'];

                                        $sql = "DELETE FROM `admin` WHERE id='$id'";

                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            echo "<script>
                                            alert('Delete Successfully');
                                            window.location.href = 'index1.php';        
                                            </script>";
                                        } else {
                                            echo "<script>
                                            alert('Delete Error....');
                                            window.location.href = 'index1.php';        
                                            </script>";
                                        }
                                    }
                                    // delete Query end
                                    ?>
                                </tbody>
                            </table>
                        </div>
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