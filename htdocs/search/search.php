<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="./css/style.css?ver=1.4">
        <link rel="stylesheet" type="text/css" href="./css/footer_white.css?ver=1.5">
    <!--파비콘-->
    <link rel="shortcut icon" href="./img/favicon.ico"> <!--16x16픽셀-->
    <!-- HTLM5shiv ie6~8 -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.min.js"></script>
      <script type="text/javascript">
         alert("현재 브라우저는 지원하지 않습니다. 크롬 브라우저를 추천합니다.!");
      </script>
   <![endif]-->
	<title>검색페이지</title>
<style>

</style>
</head>

<body>

<?php
include ("../init_val.php");
//유저명 확인
$root=$_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION['login_num'])==true){
  //echo "<script>alert(\"hi\") </script>";
$link= $root."/user/user".$_SESSION['login_num'].".txt";
$user=file($link);
}
//검색 확인
if(empty($_GET['know'])==FALSE){
$know=$_GET['know'];
}else{
$know="";
}
 ?>
 <script>
   function say(){
     document.getElementById('seform').submit();
   }
 </script>
<section id="header">

        <div class="container">
            <div class="row">
               <div class="header clearfix">
                <div class="logo" OnClick="location.href ='/mainpage/main.php';"style="cursor:pointer;" ></div>
                <?php
                if(!isset($_SESSION['login_ch'])){
                echo "<div class=toolbar>
                    <ul>
                        <li><a href=\"#\">회원가입</a></li>
                        <li><a href=\"/login/\">로그인</a></li>
                    </ul>
                </div>";
              }else{
                if($_SESSION['login_ch']==100){

                echo "<div class=toolbar1>
                <ul>
                <li><p class=name>".$user[2]."님</p>
                <form action=/mainpage/main.php method=post>
                <input type=hidden name=logout value=10 />
                <input type=submit class=logout value=로그아웃>
                </form>
                </li>
                <li><p>포인트:<span>".$user[4]."</span>[<a href=\"/game/game.php\">포인트적립</a>]</p></li>

                </ul>
                </div>";
              }
              }

                ?>
                <div class="search">
                  <form id="seform" action="/search/search.php" method=get>
                    <input class="search__input" type="text" name=know placeholder="Search">
                    <input class="search__btn" type="button" onclick="say()"></form></div>
            </div>
        </div>
        </div>
</section>
<section>
<div class="main">
<div class="main2">
	<div class="검색결과">
		<div class="검색결과1">
		<span class="검색결과2"><?=$know ?></span>
		<span class="검색결과고정">에 대한 검색결과입니다.</span>
		</div>
	</div>
	<div class="검색결과1-2">
		<span class="검색결과3">검색결과</span><span id="cnt" class="검색결과3">0</span>
	</div>

    <?php
    //$max_dir:int $movie:array
    $cnt=0;
    for($i=0;$i<$max_dir;$i++){
      $load="../".$movie[$i]."/tag.txt";
      $tag=file_get_contents($load);
      if (stripos($tag,$know)!==false){
        $cnt++;

        if($cnt==5 ||$cnt==1){
        echo "<div class=그림파트>";
      }
        echo "<div class=그림세트>
    			<a href=/".$movie[$i]."/main.php>"."<img src=/".$movie[$i]."/poster.jpg class=그림></a>
    			<div class=그림제목><a href=/".$movie[$i]."/main.php>".$movie_name[$i]."</a></div>
    		</div>";
        if($cnt==4){
        echo "</div>";
        }
      }
    }
    if($cnt>4){
    echo "</div>";
    }
    echo "<script>document.getElementById('cnt').innerHTML=\"".$cnt."건\"</script>";
    if($cnt==0){
      echo "검색 결과가 없습니다.";
    }
     ?>

</div>	<!--main2 (안쪽틀)-->
</div>	<!--/main (gray)-->
</section>
<section id="footer">

    <div class="footer2">

      <div class="f_img">
      <div class="f_img2">
          <img src="img/logo1.png" id="foot_img">
      </div>
      <div class="f_logo">
        <div class="f_text"> Movie Entertainment</div>
        <div class="f_text2">home made html</div>
      </div>
    </div>  <!--f_img-->

      <div class="f_info">(주)ComputerScience
        <div class="f_선"></div>사업자등록번호 201-60-10889
        <div class="f_선"></div>팩스: 02-201-91213
     </div>
      <div class="f_info">주소: 진주시 진주대로 501
        <div class="f_선"></div>Server & Game: 김민준
        <div class="f_선"></div>Javascript & Css: 이경재
        <div class="f_선"></div>Css & Html: 이용대
   </div>
      <div class="f_info">본사 대표전화: 055-772-0114
        <div class="f_선"></div>고객센터: 1544-3279
   </div>
      <div class="f_info" id="f_last">
        COPYRIGHTⓒ 2019 ComputerScience INC. ALL RIGHTS RESERVED
      </div>
    </div>

</section>  <!--footer-->
    <!--- 자바 라이브러리 -->
    <script type="text/javascript" src="./js/jquery.min_1.12.4.js"></script>
    <script type="text/javascript" src="./js/modernizr-custom.js"></script>
    <script type="text/javascript" src="./js/ie-checker.js"></script>
    <script type="text/javascript" src="./js/ie-checker.js"></script>
    <script type="text/javascript" src="./js/ie-checker.js"></script>
</body>

</html>
