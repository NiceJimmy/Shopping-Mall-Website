
<?php

include('dbcon.php');
// include('check.php'); //로그인 여부를 체크해주는 check.php 를 인클루드 한다.
include('head.php');
include('db2.php');

 ?>




<div class="row">
  <col-lg-12>
    <ol class="breadcrumb">
      <li class="active">

         <i class="fa fa-dashboard"></i> Dashboard / View Products

      </li>
    </ol>
  </col-lg-12>
</div>

<div class="row" align="center">

    <div class="panel panel-default">
      <div class="pannel-heading" >
         <h3 class="panel-title">

           <i class="fa fa-tags"></i> View Products

         </h3>
      </div>

      <div class="panel-body"  >
        <table-responsive>
          <table class="table table-striped table-bordered table-hover" >

             <thead align="center">
               <tr>
                  <th></th>
                 <th>Product ID: </th>
                 <th>Product Title: </th>
                 <th>Product Image: </th>
                 <th>Product Price: </th>

                 <th>Product Date: </th>
                 <th>Product Delete: </th>
                 <th>Product Edit: </th>
               </tr>
             </thead>

          <tbody>
            <?php
                   $i=0;

                  $get_pro = "select * from products";
                  $run_pro = mysqli_query($con,$get_pro);
                  while($row_pro=mysqli_fetch_array($run_pro)){

                    $pro_id = $row_pro['product_id'];
                    $pro_title = $row_pro['product_title'];
                    $pro_img1 = $row_pro['product_img1'];
                    $pro_price = $row_pro['product_price'];
                    $pro_keywords = $row_pro['product_keywords'];
                    $pro_date = $row_pro['date'];
                    $i++;

             ?>

             <tr>
               <td> </td>
               <td><?php echo $i; ?> </td>
               <td><?php echo $pro_title; ?></td>
               <td><img src="img/<?php echo $pro_img1; ?>" width="60" height="60"></td>
               <td>$ <?php echo $pro_price; ?></td>

               <td><?php echo $pro_date ?></td>
               <td>

                 <a href="delete_product.php?delete_product=<?php echo $pro_id; ?>">
                   <i class="fa fa-trash"></i>Delete
                 </a>



               </td>
                <td><a href="edit_product.php?pro_id=<?php echo $pro_id; ?>">
                  <i class="fa fa-pencil"></i>Edit
                </a></td>
             </tr>


           <?php } ?>

          </tbody>


          </table>
        </table-responsive>
      </div>

    </div>

</div>
