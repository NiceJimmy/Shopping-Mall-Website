<?php
 include "db2.php";
 include "functions2-2.php";
 include "functions3.php";





 ?>




<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Products</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>

<div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> 등록 상품정보 수정 페이지  <a class="btn btn-primary" href="http://localhost/view_products.php"><span class="glyphicon glyphicon-pencil"></span>되돌아가기</a>
        </li>
      </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Edit Product
        </h3>
      </div>

      <div class="panel-body">

        <form class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
              <label class="col-md-3 control-label">Product Title</label>
              <div class="col-md-6">

             <input type="text" name="product_title" class="form-control" value="<?php echo $pro_title ?>" required ></input>

              </div>
            </div>



            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 1</label>
              <div class="col-md-6">

             <input type="file" name="product_img1" class="form-control" required>
              <br>
              <img width="70" height="70" src="img/<?php echo $pro_img1; ?>" alt="<?php echo $pro_image1; ?>">


              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 2</label>
              <div class="col-md-6">

             <input type="file" name="product_img2" class="form-control" required>
             <br>
             <img width="70" height="70" src="img/<?php echo $pro_img2; ?>" alt="<?php echo $pro_image2; ?>">

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 3</label>
              <div class="col-md-6">

             <input type="file" name="product_img3" class="form-control" required>
             <br>
             <img width="70" height="70" src="img/<?php echo $pro_img3; ?>" alt="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Product Price</label>
              <div class="col-md-6">

             <input type="text" name="product_price" class="form-control" required value="<?php echo $pro_price; ?>">

              </div>
            </div>



            <div class="form-group">
              <label class="col-md-3 control-label">Product Desc</label>
              <div class="col-md-6">

             <textarea name="product_desc" rows="6" cols="19" class="form-control"><?php echo $pro_desc; ?></textarea>

              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-6">

            <input type="submit" class="btn btn-primary form-control" name="submit" value="Edit Product">

              </div>
            </div>

        </form>


      </div>



    </div>
  </div>
</div>





    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>

<?php
if(isset($_POST['submit'])){
  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $cat = $_POST['cat'];
  $product_price = $_POST['product_price'];
  $product_keywords = $_POST['product_keywords'];
  $product_desc = $_POST['product_desc'];

  $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
      $product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];


move_uploaded_file($temp_name1,"$product_img1");
move_uploaded_file($temp_name2,"$product_img2");
move_uploaded_file($temp_name3,"$product_img3");

$edit_product = "update products set
date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_desc'
where product_id='$product_id'";

$run_product = mysqli_query($con,$edit_product);

if($run_product){
  echo"<script>alert('선택한 상품정보가 정상적으로 수정되었습니다.')</script>";
  echo"<script>window.open('view_products.php','_self')</script>";
}

}
?>
