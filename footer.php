<footer>
    <div class="container-fluid pb-5" style="background-color: #06425e;"> 
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <img src="ASSETS/logo2.webp" alt="LOGO" style="height: 53px; width: 200px;" class="mt-4 img-fluid">
            <p class="fw-bold text-white pt-3 lh-lg">
              Welcome to the dynamic world of V-Tech Metalcraft. At V-Tech Metalcraft, we take pride in being at the forefront of innovation and excellence within this ever-evolving landscape. 
            </p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5 class="pt-4 fw-bold text-white d-flex justify-content-lg-center">
              Quick Links
            </h5>
            <span class="fw-normal text-white text-lg-center"> 
              <p class="pt-4">Home</p>
              <p>About</p>
              <p>Product</p>
              <p>Quality</p>
              <p>Inquiry</p>
              <p>Contect us</p>
            </span>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5 class="pt-4 fw-bold text-white">
              Our Products
            </h5>
            <span class="fw-normal">
              <a href="#" class="text-white"><p class="pt-4">Brass Modular Switch Parts and Terminals </p></a>
              <a href="#" class="text-white"><p>Brass Modular Socket Parts  </p></a>
              <a href="#" class="text-white"><p>Brass Moulding Inserts  </p></a>
              <a href="#" class="text-white"><p>Brass Power Cord Plug Pins </p></a>
              <a href="#" class="text-white"><p>Brass Power Cord Inserts and Connectors </p></a>
              <a href="#" class="text-white"><p>Brass Industrial Plug Pins and Sockets  </p></a>
            </span>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5 class="pt-4 fw-bold text-white">
              Contact
            </h5>
            <p class="text-white fw-bold pt-4">
              Gala no. 25, Plot no. 555,<br> GIDC, Phase-2, Dared,<br> Jamnagar, Gujarat - 361005. 
            </p>
            <i class="fa-solid fa-phone-volume" style="color: #ffffff;"><span class="ps-3 fw-normal">+91 9725093613</span></i><br>
            <i class="fa-solid fa-phone-volume pt-2" style="color: #ffffff;"><span class="ps-3 fw-normal">+91 9023614184 </span></i><br>
            <i class="fa-solid fa-envelope pt-2" style="color: #ffffff;"><span class="fw-light ps-3 mail2">info@vtechmetalcraft.com </span></i><br>
            <div class="pt-4 d-flex justify-content-lg-center">
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-square-facebook pe-3" style="color: #ffffff;"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 3";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-linkedin-in pe-3" style="color: #ffffff;"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 2";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-instagram pe-3" style="color: #ffffff;"></i></a>
            <?php
            }
            ?>
            <?php
            $sql = "SELECT * FROM `social` WHERE status = 1 AND id = 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <a href="<?php echo $row["link"]; ?>"><i class="fa-brands fa-twitter pe-3 " style="color: #ffffff;"></i></a>
            <?php
            }
            ?>
              
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-warning pb-4 pt-5">
      <div class="text-center">
        <p>© 2024 V-Tech Metalcraft, All Rights Reserved. <br>Developed by<span class="text-secondary"> Web World Developing.</span></p>
      </div>
    </div>  
  </footer>