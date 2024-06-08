<?php include("admin/db.php"); ?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light number">
    <div class="container-fluid ps-4">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql = "SELECT * FROM `contact` WHERE status = 1 LIMIT 1";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <a class="navbar-brand number fw-bold" style="color: #7b7b7c;" aria-current="page" href="#">
          <i class="fa-solid fa-phone-volume number pt-2"></i>
          +91<?php echo $row["number"] ?>
        </a>
      <?php
      }
      ?>


      <div class="collapse navbar-collapse" id="navbarText">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM `email` WHERE status = 1 LIMIT 1";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active " style="color: #7b7b7c;" aria-current="page" href="#"><i class="fa-solid fa-envelope text-dark"></i> <?php echo $row["email"] ?></a>
            </li>
          </ul>
        <?php
        }
        ?>

        <span class="navbar-text">
          <i class="fa-solid fa-clock text-dark"></i> <span id="clock" class="fw-bold"> </span>
          <span class="ps-4 pe-4">
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-facebook-f"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 3";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-linkedin-in ps-2"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 2";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-instagram ps-2"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-twitter ps-2"></i></a>
            <?php
            }
            ?>
          </span>
      </div>
    </div>
  </nav>

  <!-- navbar -->
  <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="ASSETS/logo1.webp" alt="logo" class="img-fluid" style="height: 75px; width: 200px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fw-bold" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item ps-5">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <div class="dropdown nav-link">
                <a href="product.php" class="dropbtn" style="color:rgb(0 0 0 / 65%);">
                  products
                </a>
                <div class="dropdown-content mt-3" style="width:290px;">
                  <a href="page1.php">Brass Modular Switch Parts and Terminals</a>
                  <a href="page1.php">Brass Modular Socket Parts</a>
                  <a href="page1.php"> Brass Moulding Inserts </a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quality.php">Quality</a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link" href="inquiry.php">Inquiry</a>
            </li>
            <li class="nav-item ps-3">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "test");
          $sql = "SELECT * FROM `brochure` WHERE status = 1 LIMIT 1";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <form class="d-flex me-5 rounded brochure">
              <button class="btn" type="submit"><?php echo $row["brochere"];?></button>
            </form>
          <?php
          }
          ?>

        </div>
      </div>
    </nav>
  </div>
</header>