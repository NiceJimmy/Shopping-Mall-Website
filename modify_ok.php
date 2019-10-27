<?php
include "db.php";

$bno = $_POST['idx']; // modify.php에서 보낸 idx 를 포스트 방식으로 받는다.
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);// password_hash()는 암호화 알고리즘으로 bcrypt를 기본으로 사용하고 있다.
                                                        // 포스트방식으로 받아온 암호화된 패스워드를 userpw에 넣는다.
$sql = mq("update board set name='".$_POST['name']."',pw='".$userpw."',title='".$_POST['title']."',content='".$_POST['content']."' where idx='".$bno."'"); ?>
<!--modify.php에서 포스트 방식으로 보내온 정보들과 작성한 내용을 마이에스큐엘 board 테이블에 업데이트하여 sql 변수에 넣는다.-->


<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=http://localhost/read.php?idx=<?php echo $bno; ?>">
