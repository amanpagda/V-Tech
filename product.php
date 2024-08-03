<!-- header -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Responsive.css">
  <?php
  $conn = mysqli_connect("localhost", "root", "", "test");
  $sql = "SELECT * FROM `seo` WHERE id = '3'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
  <title><?php echo $row["title"]; ?></title>
  <?php
  }
  ?>
</head>

<body style="font-family: arial;">
  <!-- nav -->
  <?php include("header.php"); ?>
  <!-- body -->

  <section class="page-header hed">
    <div class="page-header_bg hedbg">
      <div class="container">
        <h2 class=" text-center fw-bold pt-5 about">Category</h2>
        <ul class="click pt-2 fw-bold">
          <li><a href="Home.php" class=" me-3 p-1 text11">Home</a></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container-fluid mt-5">
    <div class="container">
      <!-- section 1 -->
      <div class="row">
        <?php
      include("admin/db.php");
      $sql = "SELECT * FROM `product`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-4">
          <img src="<?php echo "admin/image/product/".$row["product_image"];?>" alt="image"
            class="img-fluid p_img rounded-5">
          <div class="d-grid gap-2">
            <button class="btn btn-primary py-lg-3 py-sm-0 fw-bold rounded-5 pbtn" type="button">
              <?php echo $row["product_name"];?>
            </button>
          </div>
        </div>
        <?php
      }
      ?>
      </div>

    </div>
  </div>

  <!-- footer -->
  <?php include("footer.php"); ?>

  </div>
  </div>
  <script src="app.js"></script>
</body>

</html>