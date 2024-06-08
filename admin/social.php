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
                    <div class="container-fluid">
                        <table class="table text-center fw-bold table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SNO</th>
                                    <th scope="col">SOCIAL MEDIA</th>
                                    <th width="50%" scope="col">PROFILE LINK</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `social` WHERE `id`=1";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <th scope="row"><?php echo $row["id"]; ?></th>
                                        <td><i class="fa-brands fa-facebook" style="font-size:40px;"></i></td>
                                        <td><?php echo $row["link"]; ?></td>
                                        <td>
                                            <div class="form-lg-check form-switch">
                                                <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                    echo "checked";
                                                                                } ?> onclick="toggleStatus(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                            </div>
                                        </td>
                                        <td><a href="<?php echo "social_edit.php?id=$row[id]" ?>" class='btn btn-primary' style="margin-right:5px;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `social` WHERE `id`=2";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <th scope="row"><?php echo $row["id"]; ?></th>
                                        <td><i class="fa-brands fa-instagram" style="font-size:40px;"></i></td>
                                        <td><?php echo $row["link"]; ?></td>
                                        <td>
                                            <div class="form-lg-check form-switch">
                                                <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                    echo "checked";
                                                                                } ?> onclick="toggleStatus(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                            </div>
                                        </td>
                                        <td><a href="<?php echo "social_edit.php?id=$row[id]" ?>" class='btn btn-primary' style="margin-right:5px;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `social` WHERE `id`=3";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <th scope="row"><?php echo $row["id"]; ?></th>
                                        <td><i class="fa-brands fa-linkedin" style="font-size:40px;"></i></td>
                                        <td><?php echo $row["link"]; ?></td>
                                        <td>
                                            <div class="form-lg-check form-switch">
                                                <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                    echo "checked";
                                                                                } ?> onclick="toggleStatus(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                            </div>
                                        </td>
                                        <td><a href="<?php echo "social_edit.php?id=$row[id]"?>" class='btn btn-primary' style="margin-right:5px;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `social` WHERE `id`=4";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <th scope="row"><?php echo $row["id"]; ?></th>
                                        <td><i class="fa-brands fa-square-x-twitter" style="font-size:40px;"></i></td>
                                        <td><?php echo $row["link"]; ?></td>
                                        <td>
                                            <div class="form-lg-check form-switch">
                                                <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                    echo "checked";
                                                                                } ?> onclick="toggleStatus(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                            </div>
                                        </td>
                                        <td><a href="<?php echo "social_edit.php?id=$row[id]" ?>" class='btn btn-primary' style="margin-right:5px;">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                            </tbody>
                        </table>
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
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function toggleStatus(id) {
            var id = id;
            $.ajax({
                url: "active.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    if (result == '1') {
                        alert('Update Successfuly On');
                    } else {
                        alert('Update Successfuly Off');
                    }
                }
            });
        }
    </script>
</body>


<!-- Mirrored from themewagon.github.io/elegant/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 06:57:20 GMT -->

</html>