<?php //관리자 전용 페이지이다. '신규상품 등록' 과 '회원관리'를 할 수 있다.

    include('dbcon.php'); //데이터베이스와 계정을 연결하는 부분인 dbcon.php 를 인클루드 한다.
    include('check.php'); //로그인 여부를 체크해주는 check.php 를 인클루드 한다.
    include('head.php');

    if (is_login()){ //로그인이 되었을 경우 조건문 실행(is_login 메소드는 check.php에 있다.
//세션이란?:프로세스들 사이에서 통신을 하기 위해 메세지 교환을 통해 서로를 인식한 이후부터 통신을 마칠때까지의 기간을 의미함
        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1);
        //유저아이디가 admin(관리자이고) admin 계정으로 로그인 했을 경 조건문 실행
        else
            header("Location: welcome.php");
// header(서버와 클라이언트간 본격적으로 송수신하기 전에 있어서 필요한 정보들을 사전에 나누는것) 메세지 이다.
//헤더메세지에는 로그인한 아이디가 관리자계정이 아닐 경우 welcome.php로 이동하라고 지시하고 있다.
    }else
    header("Location: index.php");//로그인을 실패한다면 다시 로그인 페이지로 이동한다.
?>

<div class="container">
	<div class="page-header">
    	<h1 class="h2">&nbsp; 사용자 목록</h1><hr>
    </div>
<div class="row">

    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>
        <tr>
            <th>아이디</th>
            <th>프로필</th>


            <th>삭제</th>
        </tr>
        </thead>

        <?php
	    $stmt = $con->prepare('SELECT * FROM users ORDER BY username DESC');
	    $stmt->execute(); // 디비에 저장되어 있는 회원들의 정보를 불러와서 테이블에 나열한다.

            if ($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	        {
		    extract($row);

		if ($username != 'admin'){ //관리자 계정이 아닌 계정들만 출력해준다.
		?>
			<tr>
			<td><?php echo $username;  ?></td>
			<td><?php echo $userprofile; ?></td>


			<td><a class="btn btn-warning" href="delete.php?del_id=<?php echo $username ?>" onclick="return confirm('<?php echo $username ?> 사용자를 삭제할까요?')">
			<span class="glyphicon glyphicon-remove"></span>Del</a></td>
			</tr>

        <?php
			}
                }
             }
        ?>
        </table>

        <div class="col-md-6">

      <a class="btn btn-primary" href="http://localhost/insert_product.php"><span class="glyphicon glyphicon-pencil"></span>신규상품 등록하기</a>
<a class="btn btn-primary" href="http://localhost/view_products.php"><span class="glyphicon glyphicon-pencil"></span>상품리스트 수정하기</a>
        </div>


</div>

</body>
</html>
