<?php
//회원가입시 입력하는 아이디,비밀번호,이메일 값들을 변수에 저장한다.
$user_id = $_POST[user_id];
$user_pw = $_POST[user_pw];
$email = $_POST[email];

if($user_id != " && $user_pw != " "&& $email != "){//아이디, 비밀번호, 이메일을 입력했다면,

  //#1 MySQL에 접속한다
  //mysql_connect(IP Address, 사용자계정, 비밀번호); - 식별자 or false 반환
  $db = mysql_connect(localhost, 'root', 'password1!');
  //mysql 접속에 실패한다면?
  if(!$db){
    //die와 mysql_error()메서드 사용
    //mysql_error() - 최신의 에러내용 출력
    die('MySQL connect ERROR : '.mysql_error());
  }
//#2 DB를 선택한다
//mysql_select_db(db명, mysql식별자);
//mysql식별자 미입력시 최근 연결한 mysql이 자동으로 입력된다.
$ret = mysql_select_db('bbs', $db);
//true or false 반환
if(!$ret){
  die('MySQL select ERROR:'.mysql_error());
}

// #3 query 실행
// 중복되는 값 확인하기
//$user_id : 사용자가 가입하려고 하는 아이디
//해당 아이디가 DB에 있는지 확인한다.
$sql = "SELECT*FROM user WHERE user_id='{$user_id}'";

//mysql_query(변수);- 변수에 저장된 쿼리문을 실행한다
//SELECT 구문은 resource of False 반환
//나머지 구문들은 true or false 반환
$resource = mysql_query($sql);

//mysql_num_rows(resource); =>행의 개수 반환
$num = mysql_num_rows( $resource );

if($num > 0){ //아이디가 이미 존재한다면 이전페이지로 돌아가자
  echo "<script> alert('이미 존재하는 아이디 입니다.');</script>";
  echo "<script> window.history.back();</script>";
  exit(0);
  }

  //아이디가 존재하지 않는다면
  $sql = "INSERT INTO user(user_id, user_pw, email) VALUE('{$user_id}',md5('{$user_pw}'),'{$email}')";
  $ret = mysql_query($sql);
  //True or False 반환
  if($ret){
    echo"<script> alert('회원가입이 완료되었습니다');</script>";
    echo"<meta http-equiv='refresh'content=\"0;url='http://localhost/home3.'\">";
    exit(0);
  }else{
    die('MySQL Query ERRER : '. mysql_error());
  }

}else{




 ?>









<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Full Width Pics - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/full-width-pics.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

      <a class="navbar-brand" href="http://localhost/home3.html" >QUIKSILVER ROXY KOREA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/main.html">Product
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>










  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" method="POST" action="MemberInfo.php">
              <div class="form-label-group">
<label for="inputUserame">Username</label>
                <input type="text" id="inputUserame" name="name"class="form-control" placeholder="Username" required autofocus>

              </div>

              <div class="form-label-group">
<label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>

              </div>

              <hr>

              <div class="form-label-group">
  <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

              </div>

              <div class="form-label-group">
  <label for="inputConfirmPassword">Confirm password</label>
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>

              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>




<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>
