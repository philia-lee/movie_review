<!doctype html>
<?php
include("../inmovie.php");
if($userfile[4]>=10 && isset($_SESSION['login_num'])==true){
  //포인트 차감
  $point=10;
  $orif=$root."/user/user".$_SESSION['login_num'].".txt";//원본파일명
  $fi = file($orif); //원본파일 배열화
    $f=fopen("temp.txt",'w+'); //임시파일 오픈

  for($i=0; $i<count($fi);$i++){
    if($i==4){//원본파일 읽어 오다가 포인트 단락이면
      $n_num=((int)$fi[$i]-$point)."\n"; //포인트 감소
       fwrite($f,$n_num); //임시파일에 한줄씩 쓰기
    }else{
   fwrite($f,$fi[$i]); //임시파일에 한줄씩 쓰기
  }
  }
  fclose($f); //임시파일 닫기
  $test_name = rename("temp.txt",$orif);  //임시파일명 원본파일로 변경
echo "<script> alert(\"10포인트가 차감 되었습니다.\"); </script>";
  }else{
    echo "<script> alert(\"포인트가 부족합니다. 필요포인트 10\"); </script>";
    echo "<script>location.href='/mainpage/main.php'</script>";
  }

  $num=$_GET['num'];
  $orif="./inpost/inpost".$num.".txt";
  $fi = file($orif); //원본파일 배열화
    $f=fopen("temp.txt",'w+'); //임시파일 오픈

  for($i=0; $i<count($fi);$i++){
    if($i==3){//원본파일 읽어 오다가 조회수 단락이면
      $n_num=((int)$fi[$i]+1)."\n"; //조회수 올리수 올리기
       fwrite($f,$n_num); //임시파일에 한줄씩 쓰기
    }else{
   fwrite($f,$fi[$i]); //임시파일에 한줄씩 쓰기
  }
  }
  fclose($f); //임시파일 닫기
  $test_name = rename("temp.txt",$orif);  //임시파일명 원본파일로 변경

      $test_file = "./inpost/inpost".$num.".txt";
        $lines=file($test_file);
        /*
     echo "제목:".$lines[0]."<hr>";
     echo "글쓴이:".$lines[1]." 날짜:".$lines[2]." 조회수:".$lines[3]."번호:".$lines[4]."<hr>";
*/
     $buffer="";
     for($k=5;empty($lines[$k])==FALSE;$k++){
      $buffer .= $lines[$k]."<br>";
   }
  // echo $buffer."<hr>";

 ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/footer_black.css">
    <link rel="stylesheet" type="text/css" href="./css/footer_black.css">
    <!--파비콘-->
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--16x16픽셀-->
    <!-- HTLM5shiv ie6~8 -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.min.js"></script>
      <script type="text/javascript">
         alert("현재 브라우저는 지원하지 않습니다. 크롬 브라우저를 추천합니다.!");
      </script>
   <![endif]-->

    <title>글쓰기</title>
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

    <div id="main">
        <div id="sec_top">
            <span id="게시판">" <?=$lines[0]?>"</span>
        </div>
        <div id="review">
            <div id="사이공간">
                <div class="제목">
                    <span class="">제목 </span> : <span class=""><?=$lines[0]?></span>
                </div>
            </div>
            <div id="사이공간">
                <div class="제목">
                    <span class="">글쓴이</span>:<span class=""><?=$lines[1]?></span>
                    <span class="" id="blank">날짜 </span>:<span class=""><?=$lines[2]?></span>
                    <span class="" id="blank">조회수</span>:<span class=""><?=$lines[3]?></span>
                    <span class="" id="blank">번호</span>:<span class=""><?=$lines[4]?></span>
                </div>
            </div>
        </div>
        <!--메인속 review 파트-->
        <div class="글읽기"><?=$buffer?></div>
        <div id="사이공간">
        </div>

        <div id="index_layout">
            <!--(전체 layout)혹시 게시글을 줄이고 페이지로 넘어간다는 가정을 대비-->

            <div id="글쓰기_틀">
                <span class="중앙정렬">
                    <a href="./readpage.php">
                        <button id="글쓰기">목록으로</button>
                    </a>
                </span>
            </div>

        </div>
        <div class="clear">

        </div>

    </div>
    <!--메인 틀-->
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
            </div>
            <!--f_img-->

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
                COPYRIGHTⓒ 2019 THEBORN KOREA INC. ALL RIGHTS RESERVED
            </div>
        </div>

    </section>

    <!--footer-->
        <!--- 자바 라이브러리 -->
    <script type="text/javascript" src="./js/jquery.min_1.12.4.js"></script>
    <script type="text/javascript" src="./js/modernizr-custom.js"></script>
    <script type="text/javascript" src="./js/ie-checker.js"></script>
</body></html>
