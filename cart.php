<?php
include('db.php');
  include('head.php');
  include('functions2.php');
  include('db2.php');
    include('functions3.php');




?>

<?php if(isset($_GET['accept-cookies'])){
  setcookie('accept-cookies', 'true', time() + 43,200);
  header('Location: ./cart.php');

} ?>


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
<?php
if(!isset($_COOKIE['accept-cookies'])) {
 ?>
  <div class="cookie-banner" >
    <div class="container">
      <p> <<<   배송사 사정상 제품 발송이 2일 정도 소요될 수 있습니다.   >>><a href="/cookies"></a>.</p>
      <a href="?accept-cookies" class="button"> ok, continue</a>
    </div>
  </div>
  <?php
} ?>



  <!-- Navigation -->


  <!-- Page Content -->
  <div class="container">

    <div class="row">



      <div class="col-lg-9">
<div class="card card-outline-secondary my-4" style="width:150%;"><!--장바구니 들어가는 부분-->

<div id="cart" class="col-md-9">
<div class="box">
<form action="cart.php" method="post" enctype="multipart/form-data">
<h1>Shopping Cart</h1>



<p class="text-muted"> You currently have <?php echo $count; ?> items ins</p>
<div class="table-responsive"style="width:135%;" >

<table class="table" style="width:100%;">
<!--tr td img tbody-->
<thead >

<tr>
<th colspan="2">product</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Size</th>
<th colspan="1">Delete</th>
<th colspan="2">Sub-Total</th>
</tr>

</thead>

<tbody>



<?php
//

if(isset($_GET['page'])){
  $per_page=5;
  $page = $_GET['page'];

$start_from = ($page-1) * $per_page;






$id = $_SESSION['user_id'];
// 로그인시 생성했던 세션을 활용하여 user_id 값을 id 변수에 담는다.
$select_cart = "select * from cart where uid='$id' order by 1 DESC LIMIT $start_from, $per_page";
 //where 다음은 조건문이다, uid에 들어가있는 값과 $id 값과 같은 조건의 데이터를 가지고와서
 // $select_cart 변수에 담는다.
$run_cart = mysqli_query($con,$select_cart); //mysql 쿼리 실행
// $count = mysqli_num_rows($run_cart);//쿼리날려서 나온 레코드들의 행값을 얻는다.



// mysqli_fetch_array 함수는 mysqli_query를 통해 얻은 리절트 셋에서
//레코드를 1개씩 리턴해주는 함수이다.
       //mysqli_fetch_array(리절트셋) 밑에 리절트 셋이 run_cart로 되어있는데
       //위에서 실행한 쿼리에서 나온 프로덕트 정보들이다.
       //이 정보들을 배열형태로 한개씩 리턴해서 row_cart에 반복적으로 담는다.
$total =0;
while($row_cart = mysqli_fetch_array($run_cart)){
  //장바구니에 저장된 상품정보를 불러와서 변수들에 넣는 과정이 시작된다.
//쿼리실행결과인 run_cart에서 받아온데이터값중 P_id($pro_id) 가 아이디와 담은 상품을
//연결해주는 중효한 연결고리이다.!!!!!!!!!!!
  $pro_id = $row_cart['p_id'];
  $pro_size = $row_cart['size'];
  $pro_qty = $row_cart['qty'];
  $pro_index = $row_cart['index'];

  $get_products = "select * from products where product_id='$pro_id' ";
  //products 테이블의 product_id와 cart 테이블의 p_id와 같은 값을 셀렉트하여 get_product에 담는다.
  $run_products = mysqli_query($con,$get_products); // 쿼리를 실행한다.
  while($row_products = mysqli_fetch_array($run_products)){
    // 쿼리실행한 리절트셋을 row_products에 배열 형태로 담는다.
    // 밑에 변수에 차례대로 담는다.

      $product_title = $row_products['product_title'];
      $product_img1 = $row_products['product_img1'];
      $only_price = $row_products['product_price'];
      $sub_total = $row_products['product_price']*$pro_qty;
      $total += $sub_total

 ?>



  <tr>

    <td>
      <img class="img-responsive" src="img/<?php echo $product_img1; ?>" alt="Product 3a" style="width:50px;">
    </td>

    <td>
      <a href="detail.php/pro_id=$pro_id" ><?php echo $product_title; ?></a>
    </td>
    <td>
      <div class="col-md-7">
        <select name="product_qty" id="" value="<?php echo $pro_qty; ?>" class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    </td>
    <td>
      <?php echo $only_price; ?>
    </td>
    <td>
      <?php echo $pro_size; ?>
    </td>
    <td>
      <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"> <!--체크박스에 체크를 하면 remove라는 배열이 만들어 지는데 그 값들은 상품정보들이다.-->
    </td>
    <td>
    $  <?php echo $sub_total; ?>
    </td>



  </tr>

<?php }}}?>

<?php if(!isset($_GET['page'])){

  $per_page=5;
  $page = 1;

  $start_from = ($page-1) * $per_page;

  $id = $_SESSION['user_id'];

  $select_cart = "select * from cart where uid='$id' order by 1 DESC LIMIT $start_from, $per_page";

  $run_cart = mysqli_query($con,$select_cart); //mysql 쿼리 실행

  $total =0;

while($row_cart = mysqli_fetch_array($run_cart)){
  $pro_id = $row_cart['p_id'];
  $pro_size = $row_cart['size'];
  $pro_qty = $row_cart['qty'];
  $pro_index = $row_cart['index'];

  $get_products = "select * from products where product_id='$pro_id' ";

  $run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){

  $product_title = $row_products['product_title'];
  $product_img1 = $row_products['product_img1'];
  $only_price = $row_products['product_price'];
  $sub_total = $row_products['product_price']*$pro_qty;
  $total += $sub_total;

  echo"
    <tr>

      <td>
        <img class='img-responsive' src='img/$product_img1' alt='Product 3a' style='width:50px'>
      </td>

      <td>
        <a href='detail.php/pro_id=$pro_id' >$product_title </a>
      </td>
      <td>
        <div class='col-md-7'>
          <select name='product_qty' value='$pro_qty' class='form-control'>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      </td>
      <td>
      $only_price
      </td>
      <td>
        $pro_size
      </td>
      <td>
        <input type='checkbox' name='remove[]'' value='$pro_id'>
      </td>
      <td>
      $ $sub_total
          </td>



    </tr>
  ";



    }
  }
} ?>






</tbody>

<!-- 페이징 유아이가 들어갈 자리 -->




<tfoot>

<tr>

<th colspan="5">Total</th>
<th colspan="3">￦ <?php echo $total; ?></th>

</tr>
</tfoot>
</table>
</div>

<div class="box-footer">

<div class="pull-left">
<a href="index.php" class="btn btn-default">
<i class="fa fa-chevron-left"></i>continue shopping
</a>
</div>
<div class="pull-right">
<button type="submit" name="update" value="Update Cart" class="btn btn-default">
<i class="fa fa-refresh"></i>Update Cart
</button>
<p allign="center">
<a href="checkout.php" class="btn btn-primary">
  proceed checkout<i class="fa fa-chevron-right"></i>
</a></p>

</div>

</div>

</form>


<center>
  <ul class="pagination">
    <?php
    $per_page=5;
$query = "select * from cart where uid='$id'"; //현재 세션값이 현재 로그인한 아이디로 되어있으니깐 카트 디비에서 아이디가 theman21에 들어있는 장바구니 상품정보만 빼내온다. 그러니 페이징할때 이렇게 안하면 다른아이디가 담아논 모든 상품들이 출력이 되므로 페이징이 한 아이디가 가지고있는 상품의 갯수보다 오버해서 갯수가 출ㄹ력되게 된다.
$result = mysqli_query($con,$query);
$total_records = mysqli_num_rows($result);
$total_pages = ceil($total_records / $per_page);
echo"<li>
<a href='cart.php?page=1' style='margin:10px'>".'First Page'." </a>
</li>";

for($i=1; $i<=$total_pages; $i++){
echo "
  <li>
  <a href='cart.php?page=".$i."' style='margin:10px'> ".$i." </a>
  </li>
";
};
echo"<li>
<a href='cart.php?page=$total_pages' style='margin:10px'>".'Last Page'." </a>
</li>";


     ?>
  </ul>
 </center>


</div>

<?php

function update_cart(){ //장바구니를 새로고침하여 변경된 정보를 업데이트 한다.
                       // 장바구니 페이지의 삭제 체크박스를 체크한 뒤에 업데이트 버튼을 누르면 새로고침 되면서 이미 담은 상품을 삭제한다.

global $con;
if(isset($_POST['update'])){ //업데이트 버튼을 누르면 포스트방식으로 값('Update Cart')을 받아온다.

  foreach($_POST['remove'] as $remove_id){ //remove라는 배열 0번째 값의 pro_id가 변수 remove_id 안에 들어간다. 밑에서 이 변수를 정의한다.
    $delete_product = "delete from cart where p_id='$remove_id'"; //remove_id는 무엇인가를 삭제하는 행위이다.
                                                     // 그 무엇이란 cart테이블에서 p_id에 해당하는 데이터이다.

    $run_delete = mysqli_query($con,$delete_product); // 위에서 정의한 마이에스큐엘 쿼리를 실행하고 그 결과를 run_delete에 담는다.
    if($run_delete){ // 만약 쿼리가 실행되면 다시 장바구니 페이지를 출력한다.
      echo "<script>window.open('cart.php','_self')</script>"; //다시 알아보기.
    }
  }

}


// if(isset($_POST['update'])){ // 장바구니에 추가한 아이템의 수량을 수정하기 위한 조건문이다. 업데이트 버튼 누루면 포스트방식으로 정보를 받아온다.
//
//   foreach($_POST['product_qty'] as $update_qty){
//       $update_quantity = "UPDATE cart SET qty='$update_qty' WHERE index = '$pro_index'";
//
//
//     $run_update = mysqli_query($con,$update_qty);
//     if($run_update){
//             echo "<script>window.open('cart.php','_self')</script>";
//     }
//   }
//
// }


}

echo $up_cart = update_cart(); // update_cart 메소드를 실행한다.

?>



</div>



</div><!--장바구니 들어가는 부분 끝-->
      </div>
      <!-- /.col-lg-9 -->






























    </div>

  </div>
  <!-- /.container -->

<div>
  <p></p>

</div>

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
