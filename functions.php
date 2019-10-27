<?php// php 코드가 시작된다.

$con = mysqli_connect("localhost","root","xmrwjstk12","products"); // con이란 변수는 mysql과 연결하는 기능을 한다.
// 여기서 ()안의 내용들은   mysqli_connect([아이피], [아이디], [비밀번호], [DB명], [포트])를 의미한다.


//getting the categories

function getCats(){

   global $con; //global이란? = 전역변수이다. getCats()라는 함수 밖에서 선언된 con이란 변수를 사용하기 위함이다. 즉 함수 밖에서 선언된 변수를
                               //함수 내부에서 접근하여 사용하기 위함이다.
   $get_cats = "select * from categories"; //mysql 테이블에 있는 데이터를 조회하는 명령어이다.
                                           // 여기에서는 categories에 있는 모든 데이터들을 조회하라는 뜻이다.
   $run_cats = mysqli_query($con, $get_cats);//mysqli_connect($con)를 통해 연결된 객체를 이용하여 Mysql 쿼리를 실행하는 함수이다.
                                            // 여기서 $con은 연결객체이고, $get_cats는 쿼리이다.
                                            // 즉 localhost의 mysql과 연결된 con객체를 이용하여 catagories 테이블에 있는 데이터들을 조회하라는 명령을 실행하라는 함수이다.


   while ($row_cats=mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

echo "$cat_title"; //문제 발생 가능성있



   }


}

 ?>
