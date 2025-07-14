<?php
$myMovie="avengers";
  ?>
<!DOCTYPE html>
<html>

<head>
     <link rel="shortcut icon" href="./img/favicon.ico"> <!--16x16픽셀-->
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
    <link rel="stylesheet" type="text/css" href="./css/swiper.css">
    <link rel="stylesheet" type="text/css" href="./css/footer_black.css">
    <!--파비콘-->
    <link rel="shortcut icon" href="./img/favicon.ico"> <!--16x16픽셀-->
    <!-- HTLM5shiv ie6~8 -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script type="text/javascript">
         alert("현재 브라우저는 지원하지 않습니다. 크롬 브라우저를 추천합니다.!");
      </script>
   <![endif]-->
    <title>포토샵본</title>

    <style> /*수정해야할것들 꺼내놓음*/

    /*  민준이가 찝은거 스타일시트 ********************************/
     .slider .ss1 {
        background: url(img/endgame_image_1.jpg) no-repeat center center;
        background-size: cover;
    }

    .slider .ss2 {
        background: url(img/endgame_image_2.jpg) no-repeat center center;
        background-size: cover;
    }

    .slider .ss3 {
        background: url(img/endgame_image_3.jpg) no-repeat center center;
        background-size: cover;
    }

    .slider .ss4 {
        background: url(img/endgame_image_4.jpg) no-repeat center center;
        background-size: cover;
    }
    #re2 .re_mov1 {
        margin: 0 auto;
        position: relative;
        width: 354px;
        height: 200px;
        background: #ccc url(img/mv_review1.webp) center center;
        background-size: cover;
    }
    #re2 .re_mov2 {
        margin: 0 auto;
        position: relative;
        width: 354px;
        height: 200px;
        background: #ccc url(img/mv_review2.webp) center center;
        background-size: cover;
    }
        /*  민준이가 찝은거 스타일시트 ********************************/
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

  //화의 inpost를 읽은 후, 각 inpost주소 값을 조회수별 오름차순 정렬 한다.

  $load= "../".$myMovie."/inpost/";
  $leng=count(scandir($load))-2;
  for($i=0;$i<$leng;$i++){
    $fi = file("../".$myMovie."/inpost/inpost".$i.".txt");
    $check[$i][0]=(int)$fi[3];
    $check[$i][1]=$lode."inpost".$i.".txt";
    $check[$i][2]=$fi[0];//제목
    $check[$i][3]=$fi[1];//니네임
    $check[$i][4]=$fi[2];//작성일
    $check[$i][5]=$fi[5];//내용
    $check[$i][6]=$i;//내용
    $sum++;
  }
  //각 리뷰별 조회수 입력
  for($i=1;$i<$leng;$i++){
    for($j=$i-1;$j>=0;$j--){
    if($check[$j][0]<$check[$j+1][0]){
     $temp=$check[$j];
     $check[$j]=$check[$j+1];
     $check[$j+1]=$temp;
    }
    }
  }
  //조회수별 오름 차순
  /*
  for($i=0;$i<$leng;$i++){
    //sdsdfsdf
  echo $check[$i][0].$check[$i][2].":".$check[$i][1]."<br>";
  }


  */
   ?>
  <section id="header">
          <div class="container">
              <div class="row">
                 <div class="header clearfix">
                  <div class="logo" OnClick="location.href ='/mainpage/main.php';"style="cursor:pointer;" ></div>
                  <?php
                  if(!isset($_SESSION['login_ch'])){
                  echo "<div class=toolbar>
                      <ul>
                          <li><a href=\"/register/register.php\">회원가입</a></li>
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
    <!--민준이가 찝은거 2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->    <!--민준이가 찝은거 2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div id= "name_case">
    <div id="poster">
       Avengers: Endgame
    </div>
  </div>

    <div id="main"> <!--가로 조정범위 11.27-->
            <div id="story">  <!--첫번째 부분-->
              <div class="sub_title">
                영화 소개
              </div>
              <div id ="one_text">
                <span id="h3">“위대한 어벤져스! 운명을 바꿀 최후의 전쟁이 펼쳐진다!”</span>
              </div>
                <div id="main_story">
                    ‘인피니티 워 이후 절반만 살아남은 지구
                     마지막 희망이 된 어벤져스<br>
                    먼저 떠난 그들을 위해 모든 것을 걸었다!
                </div>
            </div>

            <div class="margin190"></div>

            <div id="still"><!--두번째 부분-->
              <div class="sub_title">
                이미지
              </div>

                <div class="slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ss1"></div>
                            <div class="swiper-slide ss2"></div>
                            <div class="swiper-slide ss3"></div>
                            <div class="swiper-slide ss4"></div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper_text">이미지를 클릭하면 더욱 큰 화면으로 보실 수 있습니다.</div>
                </div>
            </div>

            <div class="margin190"></div>

        <div id="character">
          <div class="sub_title">
            제작/출연
          </div>

            <div id ="character2_틀">
            <div class="character2">

                <img src="img/gamdok.jpg" class="char_img">
                <div class="ch_name">
                  감독 <br>
                  안소니 루소
                </div>

            </div>
            <div class="character2">
                <img src="img/juyeon1.jpg" class="char_img">
                <div class="ch_name">
                    주연<br>
                    로버트 다우니 주니어
                </div>
            </div>
            <div class="character2">
                <img src="img/juyeon2.jpg" class="char_img">
                <div class="ch_name">
                    주연<br>
                    크리스 에반스
                </div>
            </div>
            <div class="character2">
                <img src="img/juyeon3.jpg" class="char_img">
                <div class="ch_name">
                  주연<br>
                  크리스 헴스워스
                </div>
            </div>
            <div class="character2">
                <img src="img/juyeon4.jpg" class="char_img">
                <div class="ch_name">
                  주연<br>
                  마크 러팔로
                </div>
            </div>

          </div>
        </div>

          <div class="margin190"></div>


        <div class="sub_title2" id="re">
          리뷰
        </div>
            <!--민준이가 찝은거 2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->    <!--민준이가 찝은거 2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
        <div id="last">   <!--리뷰 파트-->

            <div id="re1">

                <div id="review">
                    <div class="review_layout">
                        <span class="review_line">
                            <p class="review_title"><?=$check[0][2]?>
                            </p>
                        </span><span class="review_line">작성일 :<?=$check[0][4]?></span>조회수 : <?=$check[0][0]?>
                        <br>
                        <a href=./note.php?num=<?=$check[0][6]?> target="_blank" class="밑줄">
                          <?=$check[0][5]?>
                        </a>
                    </div>
                    <div class="review_layout">
                        <span class="review_line">
                            <p class="review_title"><?=$check[1][2]?></p>
                        </span><span class="review_line">작성일 : <?=$check[1][4]?></span>조회수 : <?=$check[1][0]?>
                        <br>
                        <a href=./note.php?num=<?=$check[1][6]?> target="_blank" class="밑줄">
                            <?=$check[1][5]?>
                        </a>
                    </div>

                </div>
                <br>
                  <div id="더보기">
                    <a href="./readpage.php" target="_blank">
                        더보기 &gt;
                    </a>
                  </div>
            </div>
            <!--#re1 리뷰글 part 왼쪽꺼-->

            <div id="re2">
                <div id="re_mov">
                    동영상리뷰
                </div>

                <div class="re_mov1">
                    <div class="play" id="showTrailer" data-youtube="L63PKoYFvec">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve">
                            <circle class="st0" cx="60" cy="60.4" r="56" />
                            <path class="st1" d="M81,65.4c4.8-2.8,4.8-7.2,0-10L53.5,39.6c-4.8-2.8-8.7-0.5-8.7,5v31.7c0,5.5,3.9,7.8,8.7,5L81,65.4z" />
                        </svg>
                    </div>
                </div>
                <div class="re_mov2">
                    <div class="play" id="showTrailer2" data-youtube="RubSR6XgONA">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve">
                            <circle class="st0" cx="60" cy="60.4" r="56" />
                            <path class="st1" d="M81,65.4c4.8-2.8,4.8-7.2,0-10L53.5,39.6c-4.8-2.8-8.7-0.5-8.7,5v31.7c0,5.5,3.9,7.8,8.7,5L81,65.4z" />
                        </svg>
                    </div>
                </div>
                <br>
                  <div id="더보기">
                    <a href="https://www.youtube.com/results?search_query=%EC%A1%B0%EC%BB%A4+%EB%A6%AC%EB%B7%B0" target="_blank">
                        더보기 &gt;
                    </a>
                  </div>
            </div>
        </div>
        <!--last-->
        <div class="margin190"></div>

      <div id="other_comment_layout"> <!--글쓰기시 나오는 곳-->
        <div class="sub_title">
            한줄평
          </div>
        <div id="review"> <!--줄 간격-->

          <?php
          $orderfile=file("./orders.txt");
        for($i=0;$i<count($orderfile)/4;$i++){
        echo "<div class=\"chat_case\">
		  <div class=\"chat_icon\"><img src=\"img/people.jpg\" class=\"c_icon\"></div>
      			   <div class=\"jb-image\">
                 <img src=\"chat.png\" alt=\"\" id=\"ch\">
               </div>
      			<div class=\"chat_text\">
              <span class=\"review_line\">
                  <p class=\"review_title\">".
                  $orderfile[$i*4+0].
                  "</p>
                  <span>(</span>
                  <p class=\"ip\">".
                  $orderfile[$i*4+2].
                   "</p>
                   <span>)</span>
              </span>
              <p class=\"date\">".
              $orderfile[$i*4+1].
               "</p>
              <p class=\"\">".
              $orderfile[$i*4+3].
               "</p>
      			</div>
      		</div>";
  }
          ?>

        </div>
        <div class="num1">
          <div class="num2">
            <button class="number"> 1 </button>
            <button class="number"> 2 </button>
            <button class="number"> 3 </button>
          </div>
        </div>

    </div>  <!--리뷰 달리는곳 전체 레이아웃-->

          <div id="한줄평_틀">
            <form action="./main.php" method="post">
            <div id="comment_part">

              <div id= nick_틀>
                <input type ="text" name=add placeholder="닉네임" class="nick" value="" id="">
              </div>
              <textarea class="comment" name=address placeholder="내용을 입력해주세요." ></textarea>
                </div>
            <button class="snip1535">글쓰기</button>
          </form>
        </div> <!--한줄평 틀-->


    </div>  <!--main-->
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

    <div id="nav">
      <div id ="nav_title">
      NAV
    </div>
        <div id ="nav2">
          <a href="#sc">
          search
          </a>
        </div>
        <div id ="nav2">
          <a href="#story">
            information
          </a>
        </div>
        <div id ="nav2">
          <a href="#still">
            img
          </a>
        </div>
        <div id ="nav2">
          <a href="#character">
            character
          </a>
        </div>

      <!--  <div id ="nav2">
          <a href="#video" id="nav3">
            movie
          </a>
        </div>  -->

        <div id ="nav2">
          <a href="#re" id="nav3">
            review
          </a>
        </div>
        <div id ="nav2">
          <a href="#other_comment_layout" id="nav3">
            my_review
          </a>
        </div>
    </div>
    <!-- 트레일러-->
    <aside role="complementary" id="blackout" class="overlay">
        <div id="trailerModal" class="modal">
            <div id="trailer"></div><!-- YouTube 플레이어로 대체되는 부분 -->
        </div>
        <button id="hideTrailer" class="modal_close">닫기</button>
    </aside>
    <!--- 자바 라이브러리 -->
    <script type="text/javascript" src="./js/jquery.min_1.12.4.js"></script>
    <script type="text/javascript" src="./js/modernizr-custom.js"></script>
    <script type="text/javascript" src="./js/ie-checker.js"></script>
    <script type="text/javascript" src="./js/swiper.min.js"></script>
    <script type="text/javascript" src="./js/iframe_api.js"></script>
    <script type="text/javascript" src="./js/movie.js"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            cssMode: true,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

    </script>


    <?php
      if(empty($_POST['address'])==FALSE){
      $address = $_POST['address'];
      $main = $_POST['add'];
            //echo "<p>Address save to file :".$address."</p>";

            $ipadd=$_SERVER["REMOTE_ADDR"];
            //ip * 처리
            $cnt=0;
            for($k=0;$k<strlen($ipadd);$k++){
              if($ipadd[$k]=="."){
                $cnt++;
                continue;
                }
                  if($cnt>1){
                    $ipadd[$k]="*";
                  }
                }
                //
            $outputstring =$main."\n".date("Y/m/d h:i:s")."\n".$ipadd."\n<hr>".$address."<hr>\n";
            // open file for appending
            $fp = fopen("./orders.txt", 'a+');//파일오픈
            flock($fp, LOCK_EX);//건들지마
    if (!$fp) {
              echo "file call fail";
              exit;//php문 탈출
            }

            fwrite($fp, $outputstring, strlen($outputstring));
            flock($fp, LOCK_UN);
            fclose($fp);
              echo "<meta http-equiv='refresh' content='0; url=./main.php'>"; //php 새로고침 post중복방지
    }
            //echo "<p>글 작성 완료!</p>";
    ?>

</body>

</html>
