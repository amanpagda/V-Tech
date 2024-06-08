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
  <?php include("header.php");?>
<!-- body -->

<section class="page-header hed">
    <div class="page-header_bg hedbg">
      <div class="container">
        <h2 class=" text-center fw-bold pt-5 about">INQUIRY
        </h2>
        <ul class="click pt-2 fw-bold">
          <li><a href="Home.php" class=" me-3 p-1 text11">Home</a></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <img src="ASSETS/in1.webp" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                <h6 class="fw-bold" style="color: #06425e;">V-TECH METALCRAFT</h6>
                <h1 class="fw-bold">Inquire Within, Inspire Beyond: Your Questions, Our Expertise</h1>
                <form class="pt-4">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control py-3" placeholder="Your Name" name="name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control py-3" placeholder="Enter email" name="email">
                    </div>
                  </div>
                </form>
                <form action="/action_pag.php">
                  <div class="mb-3 mt-3">
                    <textarea class="form-control" rows="5" placeholder="Write a message" id="comment" name="text"></textarea>
                  </div>
                  <button type="submit" class="btn py-3 px-5 fw-bold rounded-5 sub1">Submit</button>
                </form>
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