
<?php
include('dbcon.php');
include('check.php');
include('head.php');
include('functions3.php');
include('functions2.php');

?>






<!DOCTYPE html>
<html lang="en">

<head><!--문서의 메타데이터 즉 웹페이지에 직접적으로 보이지 않는 정보, css파일과 js 파일을 연결하는 부분도 포함됨-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Item - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="startbootstrap-shop-item-gh-pages/css/shop-item.css" rel="stylesheet">

</head>




<body>

  <!-- Navigation -->


  <!-- Page Content -->
  <div class="container">

    <div class="row">


      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

          <div id="productMain" class="row">
            <div class="col-sm-6">
              <div id="mainImage">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/<?php echo $pro_img1; ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/<?php echo $pro_img2; ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/<?php echo $pro_img3; ?>" alt="Third slide">
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
      </div>
    </div>

<div class="col-sm-6">
  <div class="card card-outline-secondary my-4">

    <h1 class="text-center"><?php
error_reporting(E_ALL & ~E_NOTICE);
    echo $pro_title; ?></h1>

     <?php add_cart(); ?>

    <form action="detail.php?add_cart=<?php echo $product_id; ?>" class="form-horizental" method="post"> <!--form태그 안에 get방식과 post방식 모두 사용 가능하다?-->
      <div class="form-group">
        <label for="" class="col-md-5 control-label">Products Quantity</label>
        <div class="col-md-7">
          <select name="product_qty" id="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
        </div>

         <div class="form-group">
          <label class="col-md-5 control-label">Product size</label>

             <div class="col-md-7">
            <select name="product_size" class="form-control" required oninput="setCustomValidity('')"
            oninvalid="setCustomValidity('Must pick 1 size for the product')">
              <option disabled selected>select a size</option>
              <option>small</option>
              <option>medium</option>
              <option>large</option>


            </select>
             </div>

        </div>

     <p class="price" style="font-size:2.0em; color:blue" align="center">￦ <?php echo $pro_price; ?></p>
     <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart">Add to cart</button></p>

      </form>
        </div>
        </div>



  </div>
        <!-- /.card -->






        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p><?php echo $pro_desc; ?></p>
            <small class="text-muted"></small>
            <hr>

            <p align="center"><img src="img/<?php echo $pro_img1; ?>" alt="product 1" class="thumb"></p>
            <small class="text-muted">Detail Cut 1</small>
            <hr>

            <p align="center"><img src="img/<?php echo $pro_img2; ?>" alt="product 1" class="thumb"></p>
            <small class="text-muted">Detail Cut 2</small>
            <hr>

            <p align="center"><img src="img/<?php echo $pro_img3; ?>" alt="product 1" class="thumb"></p>
            <small class="text-muted">Detail Cut 3</small>
            <hr>

          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

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
