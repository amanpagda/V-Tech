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
                    <h2 class="main-title">Add Category</h2>

                    <!-- form start -->
                    <div class="container">
                        <form action="category.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category</label>
                                <select class="form-select" name="sub_category">
                                    <option disabled selected>Open this select menu</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="cat_submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                            </div>
                        </form>

                        <?php
                        // insert start
                        $targetdir = "image/category/";
                        $watermark_path = "watermark.png";
                        $statusMsg = "";

                        if (isset($_POST["cat_submit"])) {
                            $name = $_POST["category"];
                            $sub_name = $_POST["sub_category"];
                            $desc = $_POST["description"];

                            $random = rand(1, 99999);
                            $image = $random . '-' . $_FILES["image"]["name"];

                            $sql = "INSERT INTO `category`(`category`, `sub_category`, `image`, `description`, `date`) VALUES ('$name','$sub_name','$image','$desc', current_timestamp())";
                            $result = mysqli_query($conn, $sql);

                            if (!empty($_FILES["image"]["name"])) {
                                $image_name = basename($image);
                                $file_name = $image_name;
                                $targetFilePath = $targetdir . $file_name;
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                $newFolder = "image/category_image/";
                                $newtargetFilePath = $newFolder . $file_name;

                                $allow_type = array('jpg', 'png', 'jpeg', 'webp');

                                if (in_array($fileType, $allow_type)) {

                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $newtargetFilePath)) {
                                        $watermark_img = imagecreatefrompng($watermark_path);
                                        switch ($fileType) {
                                            case 'jpg':
                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                                break;
                                            case 'jpeg':
                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                                break;
                                            case 'webp':
                                                $im = imagecreatefromwebp($newtargetFilePath);
                                                break;
                                            case 'png':
                                                $im = imagecreatefrompng($newtargetFilePath);
                                                break;
                                            default:
                                                $im = imagecreatefromjpeg($newtargetFilePath);
                                        }

                                        $main_width = imagesx($im);
                                        $main_height = imagesy($im);
                                        $watermark_width = imagesx($watermark_img);
                                        $watermark_height = imagesy($watermark_img);

                                        $x = ($main_width - $watermark_width) / 2;
                                        $y = ($main_height - $watermark_height) / 2;

                                        imagecopy($im, $watermark_img, $x, $y, 0, 0, $watermark_width, $watermark_height);


                                        imagepng($im, $targetFilePath);
                                        imagedestroy($im);

                                        if (file_exists($targetFilePath)) {
                                            echo "<script>
                                                alert('insert Successfully');
                                                window.location.href = 'category.php';
                                                </script>";
                                        } else {
                                            $statusMsg = '<p style="color:#EA4335;">Errom watermark</p>';
                                        }
                                    } else {
                                        $statusMsg = '<p style="color:#EA4335;">Errom upload your watermark</p>';
                                    }
                                } else {
                                    $statusMsg = '<p style="color:#EA4335;">Sorry only jpg, png, & jpeg file uploaded</p>';
                                }
                            } else {
                                $statusMsg = '<p style="color:#EA4335;">Please select a file to upload</p>';
                            }
                        }
                        //  insert end

                        // delete start

                        if (isset($_POST["delete_id"])) {
                            $id = $_POST['del_id'];
                            $image = $_POST['del_image'];

                            $sql = "DELETE FROM `category` WHERE id='$id'";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                unlink("image/category/" . $image);
                                unlink("image/category_image/" . $image);
                                echo "<script>
                                alert('Deleted Successfully');
                                window.location.href = 'category.php';
                                </script>";
                            } else {
                                header("location: category.php?Error=Deleted.");
                            }
                        }
                        // delete end
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
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `category`";
                                    $result = mysqli_query($conn, $sql);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i += 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["sub_category"]; ?></td>
                                            <td><img src="<?php echo "image/category/" . $row["image"]; ?>" width="150px"></td>
                                            <td>
                                                <a href="<?php echo "cat_update.php?id=$row[id]" ?>" class='btn btn-primary mb-3'>
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form action="category.php" method="POST">
                                                    <input type="hidden" name="del_id" value="<?php echo "$row[id]"; ?>">
                                                    <input type="hidden" name="del_image" value="<?php echo "$row[image]"; ?>">
                                                    <button type="submit" name="delete_id" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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