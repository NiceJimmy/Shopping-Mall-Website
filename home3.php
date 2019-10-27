<!DOCTYPE html>

<?php
    include('dbcon.php');
    include('check.php');
      include('head.php');


?>





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

  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full">
<img class="img-fluid d-block mx-auto" src="backg2.png" alt="">
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>QUIKSILVER KOREA.</h1>

      <p>Our philosophy is to keep on innovating. To keep pursuing new materials and new designs. Because, to us, it’s never been about just making boardshorts. It’s been about using boardshorts to enhance the surfing lifestyle and experience. </p>
    </div>
  </section>

  <!-- Image Section - set the background image for the header in the line below -->
  <section class="py-5 bg-image-full" >
<img class="img-fluid d-block mx-auto" src="backg3.png" alt="">

    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
  </section>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Inspired by the ocean.</h1>
      <p class="lead">Made for the outdoors.</p>
      <p>Quiksilver Waterman is a premium collection of highly functional essentials.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>



<?php
   $popupNum = 20160801;//팝업창 고유번호
   $popupWidth = 600;//팝업창 너비
   $popupHeight = 600;//팝업창 높이
   $popupTop = 130;//팝업창 너비
   $popupLeft = 170;//팝업창 높이
   ?>
   <!-- 레이어스타일 -->
   <style type="text/css">
       #_hidden_layer_{position: absolute;z-index:999; width: 100%;top: 0px; left: 0px;}/*팝업을 담아 제어할 레이어 - 그냥 상단에 커튼걸이 비슷한 용도*/
       #pop-layer-<?=$popupNum?>{position:absolute;z-index:999;display:none;width:<?=$popupWidth?>px;height:<?=$popupHeight?>px;top:<?=$popupTop?>px;left:<?=$popupLeft?>px;}/* 레이어 너비/높이, 상단/좌측 위치 width:600px;height:600px;top:130px;left:170px; */
       #pop-layer-<?=$popupNum?>-body{height:<?=$popupHeight-25?>px;overflow-x:hidden;overflow-y:hidden;border:#dfdfdf solid 1px;background:#ffffff;}/* 레이어 높이 -25 = height:575px;*/
       #pop-layer-<?=$popupNum?>-close{height:25px;background:#343434;text-align:center;color:#ffffff;}
       #pop-layer-<?=$popupNum?>-ckd{}
       #pop-layer-<?=$popupNum?>-btn{position:relative;left:20px;}
   </style>
   <!-- 레이어엘리먼트 -->
   <div id="_hidden_layer_">
       <div id="pop-layer-<?=$popupNum?>">
           <div id="pop-layer-<?=$popupNum?>-body" align="center" style="font-size:180%">
               <!-- 팝업 내용 입력영역 -->

               <br><br>
 <br><br>
               <배송 휴무 공지>
               <br><br>


               3/9~3/15 택배사 사정으로 인한 배송 정지
               <br><br>


               죄송합니다.
               <!-- 팝업 내용 입력영역 끝-->
               <br><br>
           </div>
           <div id="pop-layer-<?=$popupNum?>-close">
               <!-- 하단 버튼영역 -->
               <input id="pop-layer-<?=$popupNum?>-ckd" type="checkbox">오늘 하루 동안 이 창을 그만 엽니다. &nbsp;
               <button id="pop-layer-<?=$popupNum?>-btn" onclick="hideLayerPopup('<?=$popupNum?>');" class="hand" alt="창닫기">X</button>
               <!-- 하단 버튼영역 끝-->
           </div>
       </div>
   </div>
   <script type="text/javascript">
   <!--
   /*쿠키삭제*/
   function delPopupCookie(id){
       var nowcookie = getPopupCookie('popview');
       setPopupCookie('popview', '['+id+']' + nowcookie , 0);
   }
   /*쿠키세팅*/
   function setPopupCookie(name,value,expiredays) {
       var todayDate = new Date();
       todayDate.setDate( todayDate.getDate() + expiredays );
       document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
   }
   /*쿠키추출*/
   function getPopupCookie( name ){
       var nameOfCookie = name + "=";
       var x = 0;
       while ( x <= document.cookie.length ){
           var y = (x+nameOfCookie.length);
           if ( document.cookie.substring( x, y ) == nameOfCookie ) {
               if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) endOfCookie = document.cookie.length;
               return unescape( document.cookie.substring( y, endOfCookie ) );
           }
           x = document.cookie.indexOf( " ", x ) + 1;
           if ( x == 0 ) break;
       }
       return "";
   }
   /*객체얻기*/
   function getElm(id){
       return document.getElementById(id);
   }
   /*닫기동작*/
   function hideLayerPopup(uid) {
       if (getElm('pop-layer-'+uid+'-ckd').checked == true){
           var nowcookie = getPopupCookie('popview');
           setPopupCookie('popview', '['+uid+']' + nowcookie , 1);
       }
       getElm('pop-layer-'+uid).style.display = 'none';
   }
   /*숨기기체크*/
   if (getPopupCookie('popview').indexOf('[<?=$popupNum?>]') == -1){
       getElm('pop-layer-<?=$popupNum?>').style.display = 'block';
   }
   /*숨겨진 팝업 쿠키를 초기화 할때 사용 - 스크립트가 아래 존재하기에 새로고침을 두번 해야 적용됨*/
   //delPopupCookie('<?=$popupNum?>');
   //-->
   </script>
