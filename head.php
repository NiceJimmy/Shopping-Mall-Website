<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
    charset=UTF-8" />
<title>로그인 예제</title>
<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/full-width-pics.css" rel="stylesheet">


<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">

    <a class="navbar-brand" href="http://localhost/home3.php" >QUIKSILVER ROXY KOREA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <?php if (isset($_SESSION['user_id'])){?>
            <a class="nav-link" href="http://localhost/main.php"><?php
            if($_SESSION['user_id']!='admin'){
              echo"Product";}
            ?></a>
          <?php }?>

          <?php if (empty($_SESSION['user_id'])){?>
            <a class="nav-link" href="http://localhost/main.php">Product</a>
          <?php }?>

        </li>



        <li class="nav-item">
          <a class="nav-link" href="http://localhost/index2.php">FAQ
            <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item">
        <?php if (isset($_SESSION['user_id'])){?>
          <a class="nav-link" href="http://localhost/cart.php"><?php
          if($_SESSION['user_id']!='admin'){
            echo"Cart";}
          ?></a>
        <?php }?>

        </li>

        <?php if (!empty($_SESSION['user_id'])&&$_SESSION['user_id']=='admin'){?>
  <a class="nav-link" href="http://localhost/admin.php">Admin Page</a>
        <?php }?>

        <?php if (!empty($_SESSION['user_id'])){?>
  <a class="nav-link" href="http://localhost/main.php">Product</a>
        <?php }?>


        <?php if (isset($_SESSION['user_id'])) { ?>

            <a class="nav-link" href=""><?php
             if($_SESSION['user_id']!='admin'){
             echo"Signed in as ", $_SESSION['user_id'];}

             if($_SESSION['user_id']=='admin'){
             echo "Signed in as admin";
           }
             ?></a>
            <a class="nav-link" href="logout.php">Log Out</a>

        <?php }

         else { ?>
            <li><a class="nav-link" href="index.php">Login</a></li>

         <?php } ?>




      </ul>
    </div>
  </div>
</nav>
