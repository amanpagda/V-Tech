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
    <title>Document</title>
</head>
<body style="font-family: arial;"> 
  <div id="app">
    <div id="hero">

   
  <!-- nav -->
  
  <!-- navbar -->
  <?php include("header.php");?>
<!-- body -->

<section class="page-header hed">
  <div class="page-header_bg hedbg">
    <div class="container">
      <h2 class=" text-center fw-bold pt-5 about">CONTECT US
      </h2>
      <ul class="click pt-2 fw-bold">
        <li><a href="Home.php" class=" me-3 p-1 text11">Home</a></li>
      </ul>
    </div>
  </div>
</section>

<div class="container mt-5">
  <div class="row"> 
  <!-- section 1 -->
    <div class="col-lg-12 col-md-12 col-sm-12 rounded-5">
      <div class="text-white fw-bold con_fw">
        <h6 id="con_fw">CONTACT US</h6>
      </div>
      <div class="contect_main" style="background-color:#06425e;height: 455px;">
        <h2 class="fw-bold text-white con_h2">Get in Touch: Reach Out to V-Tech Metalcraft</h2>
		<!-- sec 1 -->
        <div class="d-flex mt-4">
			<i class="fa-solid fa-phone-volume con_i"></i>
			<p class="con_num">+91 9725093613 <br> +91 9023614184</p>
		</div>
		<!-- sec 2 -->
		 <div class="d-flex mt-3">
			<i class="fa-solid fa-envelope con_i"></i>
			<p class="con_num">info@vtechmetalcraft.com</p>
		</div>
		<!-- sec 3 -->
		 <div class="d-flex mt-4 pb-5">
			<i class="fa-solid fa-location-dot con_i"></i>
			<p class="con_num">
				Gala no. 25, Plot no. 555, GIDC,<br> Phase-2, Dared, Jamnagar,<br> Gujarat - 361005.
			</p>
		</div>

    <div style="background-color:#f4f2f9;" class="fom_main">
		  <form class="pt-4" >
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control py-3" placeholder="Your Name" name="name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control py-3" placeholder="Enter email" name="email">
                    </div>
                  </div>
				  
				  <div class="row mt-3">
                    <div class="col">
						<input type="tel" class="form-control py-3" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
					</div>
                    <div class="col">
                     <input type="text" class="form-control py-3" placeholder="Subject" name="sub">
                    </div>
                  </div>
				  
                </form>
                <form action="/action_pag.php">
                  <div class="mb-5 mt-3">
                    <textarea class="form-control" rows="5" placeholder="Write a message" id="comment" name="text"></textarea>
                  </div>
                  <button type="submit" class="btn py-3 px-5 fw-bold rounded-5 sub1">Submit</button>
                </form>
				</div>
	  </div>
    </div>
		
	</div>
</div>
<div class="container-fluid">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14752.156311318477!2d70.062223!3d22.427554949999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1708346963954!5m2!1sen!2sin" width="100%" height="550" style=" border:0;padding-top:50px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


  <!-- footer -->
  <?php include("footer.php");?>

</div>
</div>
<script src="app.js"></script>
</body>
</html>