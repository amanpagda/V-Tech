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
                    <h2 class="main-title">Update Product</h2>

                    <!-- form start -->
                    <div class="container">
                        <?php
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `product` WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form action="product_update.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" value="<?php echo $row["product_name"];?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-select" id="category" name="product_category_name">
                                        <option disabled selected>Open this select menu</option>
                                        <?php
                                        $cate = $row["product_category_name"];
                                        $sql = "SELECT * FROM `category` WHERE sub_category = 'Yes'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($a = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $a["id"] ?>" <?php if ($cate == $a["id"]) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                                <?php echo $a["category"] ?>
                                            </option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Sub Category</label>
                                    <select class="form-select" id="sub_category" name="product_sub_category">
                                        <option disabled selected>Open this select menu</option>
                                        <?php
                                        $cate_sub = $row["product_sub_category"];
                                        $sql_sub = "SELECT * FROM `sub_category` WHERE id = '$cate_sub'";
                                        $result_sub = mysqli_query($conn, $sql_sub);
                                        while ($row1 = mysqli_fetch_array($result_sub)) {
                                        ?>
                                            <option value="<?php echo $row1["id"] ?>" <?php if ($cate_sub == $row1["id"]) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?php echo $row1["sub_category_name"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sub Category Image</label>
                                    <input type="file" class="form-control mb-3" name="product_image">
                                    <input type="hidden" class="form-control" name="old_product_image" value="<?php echo $row["product_image"];?>">
                                    <img src="<?php echo "image/product/".$row["product_image"];?>" width="150px">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="pro_description" required><?php echo $row["pro_description"];?></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="product_update" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                        <?php
                        $targetdir = "image/product/";
                        $watermark_path = "watermark.png";
                        $statusMsg = "";

                        // update start

                        if (isset($_POST["product_update"])) {
                            $id = $_POST["id"];
                            $name = $_POST["product_name"];
                            $product_category = $_POST["product_category_name"];
                            $product_sub_cat = $_POST["product_sub_category"];
                            $desc = $_POST["pro_description"];

                            $random = rand(1, 99999);
                            $image = $_FILES["product_image"]["name"];
                            $old_image = $_POST["old_product_image"];

                            if ($image !== '') {
                                $update_file = $image;
                                unlink("image/product/" . $old_image);
                                unlink("image/product_image/" . $old_image);
                                if (file_exists("image/product/" . $image)) {

                                    header("location: product.php?already_exists_file");
                                }
                            } else {
                                $update_file = $old_image;
                            }

                            $sql = "UPDATE `product` SET `product_name`='$name',`product_category_name`='$product_category',`product_sub_category`='$product_sub_cat',`product_image`='$update_file',`pro_description`='$desc',`date`=current_timestamp() WHERE id='$id'";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo "<script>
                                    window.location.href = 'product.php';        
                                   </script>";
                            }

                            if (!empty($_FILES["product_image"]["name"])) {
                                $image_name = basename($image);
                                $file_name = $image_name;
                                $targetFilePath = $targetdir . $file_name;
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                $newFolder = "image/product_image/";
                                $newtargetFilePath = $newFolder . $file_name;

                                $allow_type = array('jpg', 'png', 'jpeg', 'webp');

                                if (in_array($fileType, $allow_type)) {

                                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $newtargetFilePath)) {
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
                                            alert('Update Successfully');
                                            window.location.href = 'product.php';
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
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var category = $(this).val();
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        cate: category
                    },
                    success: function(data) {
                        $('#sub_category').html(data);
                    }
                })
            })
        })
    </script>
</body>


<!-- Mirrored from themewagon.github.io/elegant/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 06:57:20 GMT -->

</html>