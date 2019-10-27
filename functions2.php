<?php


$db = mysqli_connect("localhost","root","xmrwjstk12","products");


function getRealIpUser(){
  switch(true){

       case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
       case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
       case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

       default : return $_SERVER['REMOTE_ADDR'];

  }
}

function add_cart(){

  global $db; //메소드라는 벙커 외부에 선언된 변수를 벙커 내부에서 쓸수 있도록 해주는 전역변//
  if(isset($_GET['add_cart'])){ //
    $ip_add = getRealIpUser();
    $p_id = $_GET['add_cart'];
    $id = $_SESSION['user_id'];
    $product_qty = $_POST['product_qty'];
    $product_size = $_POST['product_size'];
    $check_product = "select * from cart where uid='$id' AND p_id='$p_id'";// 아이디가 같고 상품아이디가 같은경우 ?
    $run_check = mysqli_query($db,$check_product);

    if(mysqli_num_rows($run_check)>0){
      echo "<script>alert('이미 장바구니에 담은 상품입니다.')</script>";
      echo "<script>window.open('detail.php?pro_id=$p_id','_self')</script>";
    }else{

       $query = "insert into cart (p_id,ip_add,qty,size,uid) values ('$p_id','$ip_add','$product_qty','$product_size','$id')";
       $run_query = mysqli_query($db,$query);
         echo "<script>alert('장바구니에 상품이 담겼습니다.')</script>";
      echo "<script>window.open('detail.php?pro_id=$p_id','_self')</script>";
    }
  }


}







function getPro(){

global $db;

$per_page=6;
if(isset($_GET['page'])){
  $page = $_GET['page'];


$start_from = ($page-1) * $per_page;

$get_products = "select * from products order by 1 DESC LIMIT $start_from, $per_page";


$run_products = mysqli_query($db, $get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];
$pro_title = $row_products['product_title'];
$pro_price = $row_products['product_price'];
$pro_img1 = $row_products['product_img1'];

echo "
<div class='col-md-4 col-sm-6 center-responsive'>

  <div class='product'>

     <a href='detail.php?pro_id=$pro_id'>

        <img class='img-responsive' src='img/$pro_img1'
     </a>

  <div class='text'>

  <h3>

    <a href='detail.php?pro_id=$pro_id'>
         $pro_title
    </a>

  </h3>

   <p class='price'> ￦ $pro_price </p>

  <p class='button'>
    <a class='btn btn-default' href='detail.php?pro_id=$pro_id'> View Details </a>
  <a class='btn btn-primary' href='detail.php?pro_id=$pro_id'>
  <i class='fa fa-shopping-cart'></i> Add to Cart
  </a>
  </p>

      </div>

  </div>

</div>



";



}//while문 종료


}else{

    $page=1;

  $start_from = ($page-1) * $per_page;

  $get_products = "select * from products order by 1 DESC LIMIT $start_from, $per_page";


  $run_products = mysqli_query($db, $get_products);

while($row_products=mysqli_fetch_array($run_products)){

 $pro_id = $row_products['product_id'];
 $pro_title = $row_products['product_title'];
 $pro_price = $row_products['product_price'];
 $pro_img1 = $row_products['product_img1'];

echo "
<div class='col-md-4 col-sm-6 center-responsive'>

    <div class='product'>

       <a href='detail.php?pro_id=$pro_id'>

          <img class='img-responsive' src='img/$pro_img1'>
       </a>

    <div class='text'>

    <h3>

      <a href='detail.php?pro_id=$pro_id'>
           $pro_title
      </a>

    </h3>

     <p class='price'> ￦ $pro_price </p>

    <p class='button'>
      <a class='btn btn-default' href='detail.php?pro_id=$pro_id'> View Details </a>
    <a class='btn btn-primary' href='detail.php?pro_id=$pro_id'>
    <i class='fa fa-shopping-cart'></i> Add to Cart
    </a>
    </p>

        </div>

    </div>

</div>



";



}//while문 종료

}

}//function getPro








 ?>
