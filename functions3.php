<?php
include('db2.php');
//db2.php 에는 mysql 과 연결해준 객체 $con 이 선언되어 있으며 이것을 활용하기 위해 인클루드 해준다.

 ?>
<?php
// 이 functions3.php는 detail.php와 edit_product.php 에 인클루드 시켜서 활용할 것이다
//(상품리스트에서 상품을 선택했을때 디비에 저장되어 있는 해당 상품 정보를 디테일 페이지에 로드하기 위함이다.)
//(등록된 상품목록을 수정할때 이미 등록되어있는 상품 정보를 edit_product.php에 로드하기 위함이다.)

if(isset($_GET['pro_id'])){//isset이란 입력된 변수에 값이 존재하는지 확인해 주는 함수이다.
  //겟방식으로 받아온 pro_id 가 존재할 경우 조건문을 실행해준다.
  $product_id = $_GET['pro_id']; //겟으로 받아온 pro_id 를 $product_id에 담는다.
  $get_product = "select * from products where product_id='$product_id'";
   //상단에 db2.php 를 include 했으므로 마이에스큐엘에서 products 테이블의 product_id(key value) 데이터를 가져와 사용할수 있다.
  $run_product = mysqli_query($con,$get_product);
   //마이에스큐엘과 연결하여 product_id 데이터를 불러오는 쿼리를 실행하여 run_product에 담는다.
  $row_product = mysqli_fetch_array($run_product);
  // 쿼리를 실행하여 불러온 데이터를 1개씩 리턴하여 row_product에 담는다.

  // 위에서 리턴하여 담은 데이터중 'p_cat_id'에 해당하는 데이터를 p_cat_id에 담는다
  $pro_title = $row_product['product_title'];
  $pro_price = $row_product['product_price'];
  $pro_desc = $row_product['product_desc'];
  $pro_img1 = $row_product['product_img1'];
  $pro_img2 = $row_product['product_img2'];
  $pro_img3 = $row_product['product_img3'];


}


?>
