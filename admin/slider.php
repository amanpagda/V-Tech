<?php
session_start();
include("db.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<?php
if(isset($_POST['row_submit']))
{
    $random = rand(1,99999);
    $image = $random."-".$_FILES['image']['name'];
    $target = "image/slider/".basename($image);
    $title = $_POST['title'];


    $sql = "INSERT INTO `slider`(`title`, `image`, `date`) VALUES ('$title','$image', current_timestamp())";

    mysqli_query($conn,$sql);


    if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
    {
        echo "<script>
        alert('Successful');
        window.location.href = 'slider.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Inset Error');
        window.location.href = 'slider.php';
        </script>";

    }

}

if (isset($_POST["slider_delete"])) 
{
    $id = $_POST['del_id'];
    $image = $_POST['del_image'];

    $sql = "DELETE FROM `slider` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        unlink("all-image/slider_image/" . $image);
        echo "<script>
        alert('Deleted Successful');
        window.location.href = 'slider.php';
        </script>";
    }else{
        echo "<script>
        alert('Deleted Error');
        window.location.href = 'slider.php';
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
                    <h2 class="main-title">Seo Tools</h2>

                    <!-- form start -->
                    <div class="row">
                <!-- form Start -->

                <div class="container-fluid bg-white rounded">
                    <form action="slider.php" method="post" enctype="multipart/form-data" class="my-3">
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label class="form-label">Slider Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Slider Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Slider Image</label>
                            <input class="form-control" name="image" type="file" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="row_submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                        </div>
                    </form>
                </div>

                <!-- form end -->

                <!-- Table Start -->
                <div class="container-fluid mt-5">
                    <h4 class="fw-bold mb-3">Slider Ditails</h4>
                    <table class="table table-success table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Slider Title</th>
                                <th scope="col">Slider Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `slider`";
                            $result = mysqli_query($conn, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i += 1;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><img src="<?php echo "image/slider/".$row["image"]; ?>" width="150px"></td>
                                    <td>
                                        <a href="<?php echo "slider_edit.php?id=$row[id]" ?>" class="btn btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="slider.php" method="POST">
                                            <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                            <input type="hidden" name="del_image" value="<?php echo $row["image"]; ?>">
                                            <button type="submit" name="slider_delete" class="btn btn-danger mt-3"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Table End -->

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