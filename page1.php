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
  $sql = "SELECT * FROM `seo` WHERE title = 1 LIMIT 1 where id=1";
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
        <h2 class=" text-center fw-bolder pt-5 about">Brass Modular Switch Parts and Terminals</h2>
        <ul class="click pt-2 fw-bold">
          <li><a href="home.php" class="me-3 p-1 text11">Home</a></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container d-flex justify-content-center mt-5">
    <img src="ASSETS/pb1.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb2.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb3.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb4.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
    </div>

    <div class="row mt-lg-5 mt-md-4">
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb5.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb6.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
        <img src="ASSETS/pb7.webp" alt="image" class="img-fluid" style="border: 1px solid #06425e;">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4">
        <h3 class="fw-bold pb-4 mb-4 au">Our Products</h3>
        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>

        <a class="ao text-secondary" href="#">
          <i class="fa-solid fa-chevron-right" style="color: #0b4661;"><i class="fa-solid fa-chevron-right"
              style="color: #7697a6;"></i></i>
          Brass Modular Switch Parts and Terminals
        </a><br>
        <hr>
      </div>
      <div class="col-lg-8">
        <h6 class="fw-bold" style="color: #06425e;">V-TECH METALCRAFT</h6>
        <h1 class="fw-bold">Brass Modular Switch Parts and <br> Terminals</h1>
        <p class="fw-bold text-secondary lh-lg pt-4">
          We are among the reputed organizations, deeply engaged in offering an optimum quality range of brass modular
          switch parts. They exhibit the superior finish and durability due to the super fine raw materials. These brass
          modular switch parts are sturdy and safe as we follow the international standards in the production process.
          Our products are well recognized for their reliability and cost-effectiveness. We produce them in bulk with
          different sizes, dimensions, and specifications given by the clients.
        </p>
        <p class="text-secondary fw-bold pt-5" style="font-family: sans-serif;">
          Product Range
        </p>
        <p class="text-secondary fw-bold pt-3 d-flex" style="font-family: sans-serif;">
          <span>» Brass HRC Fuse <br> connectors</span>
          <span class="ms-5 ps-5">» Brass connectors</span>
        </p>

        <p class="text-secondary fw-bold pt-3 d-flex" style="font-family: sans-serif;">
          <span>» Brass PCB connectors</span>
          <span class="ps-5">» Brass Switchgear connectors</span>
        </p>

        <p class="text-secondary fw-bold pt-3 d-flex" style="font-family: sans-serif;">
          <span>» Brass Switch Parts</span>
          <span class="ps-5 ms-4">» Brass Round Nut Terminals</span>
        </p>

        <p class="fw-bold text-dark pt-5 d-flex">
          <span class="pt-2"> Material :</span>
          <span class="text-secondary ps-2">» Brass Switch Parts <br>» Brass Round Nut Terminals</span>
        </p><br>
        <hr class="mt-5">
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