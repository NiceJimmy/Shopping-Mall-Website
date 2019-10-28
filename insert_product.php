<?php
 include "db2.php";

 ?>

 <script src="http://madalla.kr/js/jquery-1.8.3.min.js"></script>
     <script type="text/javascript">
         $(function() {
             $("#imgView").on('change', function(){
                 readURL(this);
             });
             $("#imgView2").on('change', function(){
                 readURL2(this);
             });
             $("#imgView3").on('change', function(){
                 readURL3(this);
             });

         });

         function readURL(input) {
             if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {

                      $('#View').attr('src', e.target.result);

                 }

               reader.readAsDataURL(input.files[0]);
             }
         }



         function readURL2(input) {
             if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {

                      $('#View2').attr('src', e.target.result);

                 }

               reader.readAsDataURL(input.files[0]);
             }
         }

         function readURL3(input) {
             if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {

                      $('#View3').attr('src', e.target.result);

                 }

               reader.readAsDataURL(input.files[0]);
             }
         }

     </script>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert Products</title>
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
          <i class="fa fa-dashboard"></i> 신규상품 등록 페이지  <a class="btn btn-primary" href="http://localhost/admin.php"><span class="glyphicon glyphicon-pencil"></span>되돌아가기</a>
        </li>
      </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Insert Product
        </h3>
      </div>

      <div class="panel-body">

        <form class="form-horizontal" enctype="multipart/form-data" method="post">

            <div class="form-group">
              <label class="col-md-3 control-label">Product Title</label>
              <div class="col-md-6">

             <input type="text" name="product_title" class="form-control" required>

              </div>
            </div>



            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 1</label>
              <div class="col-md-6">

             <input type="file" id="imgView" name="product_img1" class="form-control" required  multiple>
             <img id="View" src="#" alt="이미지 미리보기" />
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 2</label>
              <div class="col-md-6">

             <input type="file" id="imgView2" name="product_img2" class="form-control" required  multiple>
              <img id="View2" src="#" alt="이미지 미리보기2" />
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Product Image 3</label>
              <div class="col-md-6">

             <input type="file" id="imgView3" name="product_img3" class="form-control" required  multiple>
             <img id="View3" src="#" alt="이미지 미리보기3" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Product Price</label>
              <div class="col-md-6">

             <input type="text" name="product_price" class="form-control" required>

              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Product Desc</label>
              <div class="col-md-6">

             <textarea name="product_desc" rows="6" cols="19" class="form-control"></textarea>

              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-6">

            <input type="submit" class="btn btn-primary form-control" name="submit" value="Insert Product">

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

$insert_product = "insert into products
(date,product_title,product_img1,product_img2,product_img3,product_price,product_desc) values
(NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc')";



$run_product = mysqli_query($con,$insert_product);

if($run_product){
  echo"<script>alert('상품이 정상적으로 등록되었습니다.')</script>";
  echo"<script>window.open('admin.php','_self')</script>";
}

}
?>
