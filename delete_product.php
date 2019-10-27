<?php
include('db2.php');
 ?>





<?php
if(isset($_GET['delete_product'])){
  $delete_id = $_GET['delete_product'];
  $delete_pro = "delete from products where product_id='$delete_id'";
  $run_delete = mysqli_query($con,$delete_pro);

  if($run_delete){
    echo "<script>alert('해당 상품이 삭제되었습니다.')</script>";
    echo "<script>window.open('view_products.php?view_products','_self')</script>";
  }
}
 ?>
