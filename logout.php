<?php

    include('dbcon.php');
    include('check.php');

    if (is_login()){

        unset($_SESSION['user_id']);
        session_destroy();
    }


echo "로그아웃 하였습니다";

    header("Location: home3.php");



?>
