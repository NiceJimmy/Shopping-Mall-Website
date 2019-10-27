<!--- 게시글 수정 -->
<?php
	include "db.php"; //db.php 파일의 내용을 반영한다.

	$bno = $_GET['idx']; // read.php 에서 겟방식으로 보낸 idx 값을 bno 변수에 넣는다.
	$sql = mq("select * from board where idx='$bno';"); // 겟방식으로 받아온 idx 에 해당하는 디비에 저장된 값을 조회하여 sql 변수에 넣는다.
	$board = $sql->fetch_array(); // db에 저장된 값을 조회한 sql 을 통해 board 변수에 db 안의 데이타를 불러온다.
 ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_ok.php/<?php echo $board['idx']; ?>" method="post"> <!-- 포스트 방식으로 데이타를 보낼 폼을 만든다-->
                                                                   <!-- 폼안에 내용을 작성하여 modify_ok.php 에 post 방식으로 전송할 것이다-->
                    <input type="hidden" name="idx" value="<?=$bno?>" />
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 수정</button>
                        <!--디비에 저장된 내용을 불러와 수정을 한다음에 글작성 버튼을 눌러서 modify_ok.php로 보낼것이다.-->
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
