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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
          <h2 class="main-title">Add Sub Category</h2>

          <!-- form start -->
          <div class="container">
            <form action="product.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name">
              </div>
              <div class="mb-3">
                <label class="form-label">Product Category</label>
                <select class="form-select" id="category" name="product_category_name">
                  <option disabled selected>Open this select menu</option>
                  <?php
                                    $sql = "SELECT * FROM `category` WHERE sub_category = 'Yes'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($a = mysqli_fetch_array($result)) {
                                    ?>
                  <option value="<?php echo $a["id"]; ?>"><?php echo $a["category"]; ?></option>
                  <?php
                                    }
                                    ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Product Sub Category</label>
                <select class="form-select" id="sub_category" name="product_sub_category">
                  <option disabled selected>Open this select menu</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Sub Category Image</label>
                <input type="file" class="form-control" name="product_image">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="pro_description" required></textarea>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" name="product_submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
              </div>
            </form>

            <?php
                        // insert start
                        $targetdir = "image/product/";
                        $watermark_path = "watermark.png";
                        $statusMsg = "";

                        if (isset($_POST["product_submit"])) {
                            $name = $_POST["product_name"];
                            $product_category = $_POST["product_category_name"];
                            $product_sub_cat = $_POST["product_sub_category"];
                            $desc = $_POST["pro_description"];

                            $random = rand(1, 99999);
                            $image = $random . '-' . $_FILES["product_image"]["name"];

                            $sql = "INSERT INTO `product`(`product_name`, `product_category_name`, `product_sub_category`, `product_image`, `pro_description`, `date`) VALUES ('$name','$product_category','$product_sub_cat','$image','$desc', current_timestamp())";
                            $result = mysqli_query($conn, $sql);

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
                                                alert('insert Successfully');
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
                        //  insert end


                        ?>
          </div>

          <!-- table -->
          <div class="container row mt-5">
            <div class="col-12">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT CATEGORY</th>
                    <th scope="col">SUB CATEGORY</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">PRODUCT IMAGE</th>
                    <th scope="col">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                                    $sql = "SELECT * FROM `product`";
                                    $result = mysqli_query($conn, $sql);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i += 1;
                                    ?>
                  <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row["product_name"]; ?></td>
                    <?php
                                            $category = $row["product_category_name"];
                                            $sql = "SELECT * FROM `category` WHERE id='$category'";
                                            $result1 = mysqli_query($conn, $sql);
                                            while ($ab = mysqli_fetch_assoc($result1)) {
                                            ?>
                    <td><?php echo $ab["category"]; ?></td>
                    <?php
                                            }
                                            ?>
                    <?php
                                            $sub_category = $row["product_sub_category"];
                                            $sql = "SELECT * FROM `sub_category` WHERE id='$sub_category'";
                                            $result1 = mysqli_query($conn, $sql);
                                            while ($ac = mysqli_fetch_assoc($result1)) {
                                            ?>
                    <td><?php echo $ac["sub_category_name"]; ?></td>
                    <?php
                                            }
                                            ?>
                    <td><?php echo $row["pro_description"]; ?></td>
                    <td><img src="<?php echo "image/product/" . $row["product_image"]; ?>" width="150px"></td>
                    <td>
                      <a href="<?php echo "product_update.php?id=$row[id]" ?>" class='btn btn-primary mb-3'>
                        <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <form action="product.php" method="POST">
                        <input type="hidden" name="del_id" value="<?php echo "$row[id]"; ?>">
                        <input type="hidden" name="del_image" value="<?php echo "$row[product_image]"; ?>">
                        <button type="submit" name="delete_id" class="btn btn-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                                    }
                                    // delete start

                                    if (isset($_POST["delete_id"])) {
                                        $id = $_POST['del_id'];
                                        $image = $_POST['del_image'];

                                        $sql = "DELETE FROM `product` WHERE id='$id'";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            unlink("image/product/" . $image);
                                            unlink("image/product_image/" . $image);
                                            echo "<script>
                                            alert('Deleted Successfully');
                                            window.location.href = 'product.php';
                                            </script>";
                                        } else {
                                            header("location: product.php?Error=Deleted.");
                                        }
                                    }
                                    // delete end
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