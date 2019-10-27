<?php
  include ('db.php');
  include('head.php');
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>



<div id="board_area">
  <h1>자유게시판</h1>
  <h4>FAQ 게시판</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php // php 코드가 시작된다. 상단에서 db에 해당하는 파일을 인클루드 했으므로 디비의 자료를 가져와서 게시판에 뿌려주는 코드가 시작되는 부분이다.
          $sql = mq("select * from board order by idx desc limit 0,5");
          // db.php에서 생성한 mq 메소드를 실행한다.
          // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
            while($board = $sql->fetch_array()) //sql 쿼리(디비의 테이블의 정보 요청)가 실행한 결과를 한줄씩 가져온다.(반복해서)
            {
              $title=$board["title"];
              if(strlen($title)>30)
              {
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]); //title이 30을 넘어서면 ...표시
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="http://localhost/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
          <!-- 게시글을 읽을 수 있도록 read.php와 연결해주는 부분이다. DB에서 idx에 저장된 글을 가져와 보여주는 방식이다. -->
          <!-- 여기서 $board는 sql쿼리를 나타낸다. 즉 디비에 요청한 정보를 가져오는 방식인데 디비에 요청한 정보 중 선택한 idx에 해당하는 값을 가져오는 방식이다. -->
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>
