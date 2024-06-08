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
                        <?php
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `category` WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form method="post" enctype="multipart/form-data" action="cat_update.php">
                                <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category" value="<?php echo $row["category"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sub Category</label>
                                    <select class="form-select" name="sub_category" value="<?php echo $row["sub_category"]; ?>" required>
                                        <option disabled selected>Open this select menu</option>
                                        <option value="Yes" <?php if ($row["sub_category"] == "Yes") {
                                                                echo "selected";
                                                            } ?>>Yes</option>
                                        <option value="No" <?php if ($row["sub_category"] == "No") {
                                                                echo "selected";
                                                            } ?>>No</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control mb-3" name="image">
                                    <input type="hidden" class="form-control" name="old_image" value="<?php echo $row["image"]; ?>">
                                    <img src="<?php echo "image/category/".$row["image"]; ?>" width="150px">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" required><?php echo $row["description"]; ?></textarea>
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
                        $targetdir = "image/category/";
                        $watermark_path = "watermark.png";
                        $statusMsg = "";

                        // update start

                        if(isset($_POST["update"])) {
                            $id = $_POST["id"];
                            $category = $_POST["category"];
                            $sub_category = $_POST["sub_category"];
                            $description = $_POST["description"];

                            $random = rand(1, 99999);
                            $image = $_FILES["image"]["name"];
                            $old_image = $_POST["old_image"];

                            if ($image !== '') {
                                $update_file = $image;
                                unlink("image/category/" . $old_image);
                                unlink("image/category_image/" . $old_image);
                                if (file_exists("image/category/" . $image)) {

                                    header("location: category.php?already_exists_file");
                                }
                            } else {
                                $update_file = $old_image;
                            }

                            $sql = "UPDATE `category` SET `category`='$category',`sub_category`='$sub_category',`image`='$update_file',`description`='$description',`date`=current_timestamp() WHERE id='$id'";
                            $result = mysqli_query($conn, $sql);

                            if($result){
                                echo "<script>
                                    window.location.href = 'category.php';        
                                   </script>";
                            }

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
                                            header('location: category.php');
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
                        // update end
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