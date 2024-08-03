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
  $sql = "SELECT * FROM `seo` WHERE id = '4'";
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
  <header>
    <?php include("header.php");?>
  </header>

  <section class="page-header hed">
    <div class="page-header_bg hedbg">
      <div class="container">
        <h2 class=" text-center fw-bold pt-5 about">Quality</h2>
        <ul class="click pt-2 fw-bold">
          <li><a href="Home.php" class=" me-3 p-1 text11">Home</a></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container-fluid bg-warning pt-5 pb-5">
    <div class="container rounded-5  bg-white">
      <div class="mt-1">
        <ul class="nav nav-pills mb-3 pil_tx1" id="pills-tab" role="tablist">
          <li class="nav-item ms-4 mt-3" role="presentation">
            <button class="nav-link active btn1_pil two" id="pills-home-tab" data-bs-toggle="pill"
              data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
              Quality Assurance
            </button>
          </li>
          <li class="nav-item mt-3" role="presentation">
            <button class="nav-link btn1_pil one" id="pills-profile-tab" data-bs-toggle="pill"
              data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
              aria-selected="false">
              Quality Control
            </button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!--section 1-->
          <div class="tab-pane fade show active shadow rounded-5 mt-3 container" style="background-color: #1d1729;"
            id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
              <div class="col-lg-7 col-md-12 col-sm-12">
                <h2 class="ps-5 pt-4 fw-bold text-white">Quality Assurance</h2>
                <p style="color:#6c6a72;" class="p-lg-5 p-sm-0 pt-lg-3 pt-md-3 pt-sm-0 fw-bold lh-lg" id="pra">
                  Quality assurance is the cornerstone of our operations at V-tech Metalcraft, embodying our steadfast
                  commitment to delivering exceptional products and services. Our approach to quality assurance is
                  comprehensive and systematic, encompassing every stage of the product lifecycle. From the meticulous
                  planning and design phases to production, testing, and post-launch support, we adhere to stringent
                  protocols to ensure consistency and excellence. Our dedicated quality assurance team employs advanced
                  testing methodologies, cutting-edge tools, and a keen attention to detail to identify and address
                  potential issues before they reach our customers.
                </p>
              </div>
              <div class="col-lg-5 col-md-12 col-sm-12">
                <img src="ASSETS/qimage1.webp" alt="" class="img-fluid rounded-5 my-lg-5">
              </div>
            </div>
          </div>
          <!--section 2-->
          <div class="tab-pane fade shadow rounded-5 mt-3 container" id="pills-profile"
            style="background-color: #1d1729;" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12">
                <h2 class="ps-5 pt-4 fw-bold text-white">Quality Control</h2>
                <p style="color:#6c6a72;" class="p-lg-5 p-sm-0 p-md-5 pt-lg-3 pt-md-3 pt-sm-0 fw-bold lh-lg pe-3"
                  id="pra">
                  Quality assurance is the cornerstone of our operations at V-tech Metalcraft, embodying our steadfast
                  commitment to delivering exceptional products and services. Our approach to quality assurance is
                  comprehensive and systematic, encompassing every stage of the product lifecycle. From the meticulous
                  planning and design phases to production, testing, and post-launch support, we adhere to stringent
                  protocols to ensure consistency and excellence. Our dedicated quality assurance team employs advanced
                  testing methodologies, cutting-edge tools, and a keen attention to detail to identify and address
                  potential issues before they reach our customers.
                </p>
              </div>
              <div class="col-lg-5 col-md-7 col-sm-12">
                <img src="ASSETS/qimage2.webp" alt="" class="img-fluid rounded-5 my-lg-5">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <img src="" alt="">


  <div class="container mt-5">
    <h6 class="text-center fw-bold" style="color: #06425e;">V-TECH METALCRAFT</h6>
    <h2 class="text-center fw-bold mb-lg-3" style="font-family: arial;">Mastering Quality: A Step-by-Step Guide to
      Excellence</h2>
    <div class="row mt-lg-5 mt-md-5 mt-sm-2">
      <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
        <div class="redi_u">
          <div class="d-flex justify-content-center redi_us">
            <h3
              class="rou_h3 fw-bold text-black text-center align-items-center bg-white mt-2 rounded-circle d-flex justify-content-center">
              01
            </h3>
            <h2 class="text-white fw-bold ps-3">Establish Clear <br> Quality <br> Standards</h2>
          </div>
          <p class="text-center fw-bold lh-lg my-4 mx-5" style="color: #6c6a72;">
            The first step in maintaining quality is to establish clear and measurable quality standards & define
            specific criteria and benchmarks .
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
        <div class="redi_u">
          <div class="d-flex justify-content-center redi_us">
            <h3
              class="rou_h3 fw-bold text-black text-center align-items-center bg-white mt-2 rounded-circle d-flex justify-content-center">
              02
            </h3>
            <h2 class="text-white fw-bold ps-3">Establish Clear <br> Quality <br> Standards</h2>
          </div>
          <p class="text-center fw-bold lh-lg my-4 mx-5" style="color: #6c6a72;">
            Develop and implement robust quality control processes throughout the entire production or service delivery
            cycle.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
        <div class="redi_u">
          <div class="d-flex justify-content-center redi_us">
            <h3
              class="rou_h3 fw-bold text-black text-center align-items-center bg-white mt-2 rounded-circle d-flex justify-content-center">
              03
            </h3>
            <h2 class="text-white fw-bold ps-3">Establish Clear <br> Quality <br> Standards</h2>
          </div>
          <p class="text-center fw-bold lh-lg my-4 mx-5" style="color: #6c6a72;">
            Embrace a culture of continuous improvement by fostering a feedback loop that encourages input from various
            stakeholders.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php include("footer.php");?>

  </div>
  </div>
  <script src="app.js"></script>
</body>

</html>