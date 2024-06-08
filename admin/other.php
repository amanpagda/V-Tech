<?php 
session_start();
include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_POST["row_update"])) {

    $name = $_POST["name"];

    $sql = "UPDATE `other` SET `name`='$name',`date`=current_timestamp() WHERE id='1'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
       echo "<script>
       alert('Update Successfully');
       window.location.href = 'other.php'; 
       </script>";
    } else {
        echo "<script>
       alert('Update Error');
       window.location.href = 'other.php'; 
       </script>";
    }

}
?>

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
                    <h2 class="main-title">Edit Company Name</h2>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");
                        $sql = "SELECT * FROM `other`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="container-fluid bg-white rounded">
                                <form action="other.php" method="post" class="py-3">
                                    <h5 class="fw-bold ps-3 py-3">→ COMPANY NAME</h5>
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" value="<?php echo $row["name"]; ?>" class="form-control" name="name" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="row_update" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                    </div>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
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