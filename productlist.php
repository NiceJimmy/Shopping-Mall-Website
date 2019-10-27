<!DOCTYPE>
<?php

    include('dbcon.php');
    include('check.php');
      include('head.php');
      include('functions2-2.php');

?>


<html lang="en">

<head>

  <meta charset="utf-8"> <!--html의 문자세트인 charset로 전세계 문자와 기호를 하는 방법인 utf-8로 한다는 뜻이다.-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>






  <!-- Navigation -->


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">CATEGORY</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">ALL</a>




          <a href="http://localhost/MEN.php?category=MEN" class="list-group-item" type="submit">MEN</a>
<a href="http://localhost/MEN.php?category=WOMEN" class="list-group-item" type="submit">WOMEN</a>
<a href="http://localhost/MEN.php?category=KIDS" class="list-group-item" type="submit">KIDS</a>


        </div>










      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="quik3.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="quik1.PNG" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="quik2.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

           <?php
             getPro();
            ?>

        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
