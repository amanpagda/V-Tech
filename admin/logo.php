<?php 
session_start();
include("db.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_POST["row_update"])) {

    $id = $_POST["id"];
    $new_image = $_FILES["image"]["name"];
    $old_image = $_POST["image_old"];

    if ($new_image != '') {
        $update_file = $new_image;
        if (file_exists("image/logos/" . $_FILES["image"]["name"])) {

            echo "<script>
                alert('File already Exists');
                window.location.href = 'logo.php';
                </script>";

        }
    } else {
        $update_file = $old_image;
    }
    $sql = "UPDATE `logos` SET `image`='$update_file',`date`=current_timestamp() WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($_FILES["image"]["name"] != '') {
            move_uploaded_file($_FILES["image"]["tmp_name"], "image/logos/" . $_FILES["image"]["name"]);
            unlink("image/logos/" . $old_image);
        }
        echo "<script>
                alert('Update Successfuly');
                window.location.href = 'logo.php';
                </script>";
    } else {
        echo "<script>
                alert('Update Error!');
                window.location.href = 'logo.php';
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
                    <h2 class="main-title">Edit Logos</h2>
                    <div class="row">

                        <div class="container-fluid bg-white rounded mt-3">
                            <h5 class="fw-bold mb-4 mt-3">→ Update Header Logo</h5>
                            <?php
                            $sql = "SELECT * FROM `logos` WHERE id=1";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form action="logo.php" method="post" enctype="multipart/form-data" class="my-3">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Header Logo</label>
                                        <input class="form-control" name="image" type="file">
                                        <input class="form-control" name="image_old" type="hidden" value="<?php echo $row["image"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <img src="<?php echo "image/logos/" . $row["image"]; ?>" width="150px">
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="row_update" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="container-fluid bg-white rounded mt-3">
                            <h5 class="fw-bold mb-4 mt-3">→ Update Footer Logo</h5>
                            <?php
                            $sql = "SELECT * FROM `logos` WHERE id=2";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form action="logo.php" method="post" enctype="multipart/form-data" class="my-3">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Footer Logo</label>
                                        <input class="form-control" name="image" type="file">
                                        <input class="form-control" name="image_old" type="hidden" value="<?php echo $row["image"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <img src="<?php echo "image/logos/" . $row["image"]; ?>" width="150px">
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="row_update" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="container-fluid bg-white rounded my-3">
                            <h5 class="fw-bold mb-4 mt-3">→ Update Favicon Logo</h5>
                            <?php
                            $sql = "SELECT * FROM `logos` WHERE id=3";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form action="logo.php" method="post" enctype="multipart/form-data" class="my-3">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Favicon Logo</label>
                                        <input class="form-control" name="image" type="file">
                                        <input class="form-control" name="image_old" type="hidden" value="<?php echo $row["image"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <img src="<?php echo "image/logos/" . $row["image"]; ?>" width="150px">
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" name="row_update" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
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