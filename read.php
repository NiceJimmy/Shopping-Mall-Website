<?php
include('db.php');
	include('head.php');
?>
<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8"> <!--html의 문자세트인 charset로 전세계 문자와 기호를 하는 방법인 utf-8로 한다는 뜻이다.-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style3.css" />
</head>
<body>
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 get방식으로 넣음*/
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
    // hit변수에 board 디비에 저장되어있는 idx 값을 가져온다.
		$hit = $hit['hit'] + 1;//가져오면 hit변수에 hit 항목값을 가져오고 1씩 더해준다. 조회수가 증가하는 로직이다.
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");// 그렇게 하면 디비에도 hit값이 1씩 증가하면서 업데이트가 된다.(fet변수를 통해)
		$sql = mq("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택, sql변수로 bno 변수에 저장된(index2에서 클릭할때 받아온 값)   */
                                                        //글번호와 디비에 저장된 idx과 같은 값을 가져온다.
  $board = $sql->fetch_array(); //board 변수에 sql변수로 idx에 해당하는 디비에 저장된 값을 불러온다.
	?>
<!-- 글 불러오기에 해당하는 부분이다.-->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2> <!--디비에 저장된 idx에 해당하는 title 내용을 출력한다-->
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회수:<?php echo $board['hit']; ?>
        <!-- 디비의 idx에 해당하는 저장된 이름, 날짜, 조회수 값을 출력한다.-->
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?><!-- 디비의 idx에 해당하는 저장된 내용을 불러와 출력한다. -->
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="http://localhost/index2.php">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li> <!-- modify.php에 get방식으로 idx 값을 보냄-->
			<li><a href="delete3.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>





<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>
</html>
