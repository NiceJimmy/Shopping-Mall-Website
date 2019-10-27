<?php
 include "db2.php";

$_FILES['img/r3.png']['name'];

echo $_FILES;



for($i=1; $i<100; $i++){
$insert_product = "insert into products
(date,product_title,product_img1,product_img2,product_img3,product_price,product_desc) values
(NOW(),'asdfsadf',$_FILES,'asdfsadf','asdfsadf',$i,'asdfsadf')";



$run_product = mysqli_query($con,$insert_product);
}
?>
