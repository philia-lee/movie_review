<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="./css/style.css?ver=1.12">
    <link rel="stylesheet" type="text/css" href="./css/swiper.css?ver=2.13">
    <link rel="stylesheet" type="text/css" href="./css/reset.css?ver=3.7">
        <link rel="stylesheet" type="text/css" href="./css/footer_white.css?ver=4.61">
    <!--파비콘-->
    <link rel="shortcut icon" href="./img/favicon.ico"> <!--16x16픽셀-->
    <!-- HTLM5shiv ie6~8 -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.min.js"></script>
      <script type="text/javascript">
         alert("현재 브라우저는 지원하지 않습니다. 크롬 브라우저를 추천합니다.!");
      </script>
   <![endif]-->
</head>

<body>
  <?php
  $myLogin=0;
  //모든 영화의 inpost를 읽은 후, 각 inpost주소 값을 조회수별 오름차순 정렬 한다.
  include ("../init_val.php");
  //로그아웃되었습니다
  if(empty($_POST['logout'])==FALSE){
    if($_POST['logout']==10){
  session_unset();     // 현재 연결된 세션에 등록되어 있는 모든 변수의 값을 삭제한다
  session_destroy();  //현재의 세션을 종료한다
  /*
   echo"
   <script>
       alert('로그아웃되었습니다');
       location.replace('이동할페이지');
   </script>
   ";
   */
    }
  }

  //로그아웃
  //회원가입 정보
  if(empty($_POST['input_id1'])==FALSE && empty($_POST['input_pw1'])==FALSE){
    $cnt=count(scandir("../user/"))-2;
    if($cnt<0){
      $cnt=0;
    }
    $outputstring= $_POST['input_id1']."\n".$_POST['input_pw1']."\n".$_POST['nick']."\n".$_POST['myName']."\n"."0"."\n".$_POST['myPhone'];
    $fp = fopen("../user/user".$cnt.".txt", 'a');//파일오픈
    flock($fp, LOCK_EX);//건들지마
  if (!$fp) {
      echo "file call fail";
      exit;//php문 탈출
    }

    fwrite($fp, $outputstring, strlen($outputstring));
    flock($fp, LOCK_UN);
    fclose($fp);

  }
  //회원가입 완료
  //세션 존재했을때 자동으로 로그인하기
  $root=$_SERVER['DOCUMENT_ROOT'];
  if(isset($_SESSION['login_num'])==true){
    //echo "<script>alert(\"hi\") </script>";
  $link= $root."/user/user".$_SESSION['login_num'].".txt";
  $user=file($link);
  $myLogin=1;
  }

//로그인 정보 받고 로그인하기
    $long=0;
    if(empty($_POST['id'])==FALSE && empty($_POST['pw'])==FALSE){
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $load=count(scandir("../user/"))-2;
    for($i=0;$i<$load;$i++){
    $user = file("../user/user".$i.".txt");
    if(trim($user[0])==$id && trim($user[1])==$pw){
        $long=100;
        $_SESSION["login_num"]=$i;
        $_SESSION["login_ch"]=$long;
        $myLogin=1;
        break;
    }else{
      continue;
    }
    }
    if($myLogin ==0){
          echo "<script>alert(\"로그인 실패 하였습니다.\") </script>";
          echo "<script>location.href='/login/'</script>";
    }
    }
//로그인 정보 받고 로그인하기
  for($i=0; $i<$max_dir;$i++){
  $load= "../".$movie[$i]."/inpost/";
  $cnt[$i]=count(scandir($load))-2;
  }
  //각 영화폴더별 리뷰글 갯수 파악
  $sum=0;
  for($i=0;$i<count($cnt);$i++){
  for($j=0;$j<$cnt[$i];$j++){
    $fi = file("../".$movie[$i]."/inpost/inpost".$j.".txt");
    $check[$sum][0]=(int)$fi[3];
    $check[$sum][1]="../".$movie[$i]."/inpost/inpost".$j.".txt";
    $check[$sum][2]=$fi[0];//제목
    $check[$sum][3]=$fi[1];//니네임
    $check[$sum][4]=$fi[2];//작성일
    $check[$sum][5]=$fi[5];//내용
    $check[$sum][6]=$j;//인덱스
    $check[$sum][7]=$movie[$i];//영화폴더


    $sum++;
  }
  }
  //각 리뷰별 조회수 입력
  for($i=1;$i<count($check);$i++){
    for($j=$i-1;$j>=0;$j--){
    if($check[$j][0]<$check[$j+1][0]){
     $temp=$check[$j];
     $check[$j]=$check[$j+1];
     $check[$j+1]=$temp;
    }
    }
  }
  //조회수별 오름 차순
  //for($i=0;$i<count($check);$i++){
    //sdsdfsdf
  //echo $check[$i][2].$check[$i][2].":".$check[$i][1]."<br>";
  //}
  /*

  */
   ?>
   <?php
   //검색 확인
   if(empty($_GET['know'])==FALSE){
   $know=$_GET['know'];
   }else{
   $know="";
   }
    ?>
    <script>
    var myLogin=<?=$myLogin ?>;
    function postgoto(e){
      if(myLogin==0){
        alert("로그인 이후 이용하실 수 있습니다.");
        return false;
    }else{
      window.open(e,'_blank');
      }
    }
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
    <!-- 헤더 끝 -->
    <section id="movie">
        <div class="container">
            <div class="row">
                <div class="movie">
                    <div class="title"><h3>최신영화</h3></div>
                    <div class="movie_chart">
                        <div class="swiper-container2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster.jpg" alt="조커">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>조커</h3>
                                        <div class="infor_btn">
                                            <a href="/jocker/main.php">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster1.jpg" alt="타짜">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>타짜</h3>
                                        <div class="infor_btn">
                                            <a href="/tazza/main.php">상세보기</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster2.jpg" alt="어밴져스">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>어밴져스</h3>
                                        <div class="infor_btn">
                                            <a href="/avengers/main.php">상세보기</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster4.jpg" alt="스파이더맨">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>스파이더맨</h3>
                                        <div class="infor_btn">
                                            <a href="/spider/main.php">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster3.jpg" alt="82년생 김지영">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>82년생 김지영</h3>
                                        <div class="infor_btn">
                                            <a href="#">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster5.jpg" alt="변신">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>변신</h3>
                                        <div class="infor_btn">
                                            <a href="#">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster6.jpg" alt="블랙머니">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>블랙머니</h3>
                                        <div class="infor_btn">
                                            <a href="#">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="poster">
                                        <figure>
                                            <img src="./img/poster7.jpg" alt="신의한수:귀수편">
                                        </figure>
                                    </div>
                                    <div class="infor">
                                        <h3>신의한수:귀수편</h3>
                                        <div class="infor_btn">
                                            <a href="#">상세보기</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--리뷰+예고편-->
       <section id="left">
        <div class="container">
            <div class="row">
               <div class="review">
                <div class="prereview a1">
                    <div class="title">
                        <h3>인기리뷰</h3>
                        <a href="#"><span></span></a>
                    </div>
                    <div class="review_box">

                        <div class="box_top">

                            <span class="review_line">
                                <p class="review_title"><?=$check[0][2]?>
                                </p>
                            </span><span class="review_line"><?=$check[0][4]?></span>조회수 <?=$check[0][0]?>
                            <br>
                            <a href="javascript:postgoto('../<?=$check[0][7]?>/note.php?num=<?=$check[0][6]?>');" class="밑줄">
                                <?=substr(trim($check[0][5]),0,300).". . ."?>
                            </a></div>

                            <hr style="border:1px dashed gray;">

                        <div class="box_mid">
                          <span class="review_line">
                            <p class="review_title"><?=$check[1][2]?>
                            </p>
                          </span><span class="review_line"><?=$check[1][4]?></span>조회수 <?=$check[1][0]?>
                          <br>
                          <a href="javascript:postgoto('../<?=$check[1][7]?>/note.php?num=<?=$check[1][6]?>');" class="밑줄">
                                  <?=substr($check[1][5],0,300).". . ."?>
                          </a>
                        </div>

                        <hr style="border:1px dashed gray;">
                        <div class="box_bot">
                          <span class="review_line">
                              <p class="review_title"><?=$check[2][2]?>
                              </p>
                          </span><span class="review_line"><?=$check[2][4]?></span>조회수 <?=$check[2][0]?>
                          <br>
                          <a href="javascript:postgoto('../<?=$check[2][7]?>/note.php?num=<?=$check[2][6]?>');" class="밑줄">
                              <?=substr($check[2][5],0,300).". . ."?>
                          </a>
                        </div>
                    </div>
                </div>

            <div class="preview a2">
                <div class="title ">
                    <h3>예고편</h3>
                    <a href="#"><span></span></a>
                </div>
                <div class="previewbox">
                    <div class="preview_vd">
                        <div class="play" id="showTrailer" data-youtube="TTrpe9JIMe8">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve">
                                <circle class="st0" cx="60" cy="60.4" r="56" />
                                <path class="st1" d="M81,65.4c4.8-2.8,4.8-7.2,0-10L53.5,39.6c-4.8-2.8-8.7-0.5-8.7,5v31.7c0,5.5,3.9,7.8,8.7,5L81,65.4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="preview_vd1" id="showTrailer1" data-youtube="6fdDp_U55zU">
                    </div>
                    <div class="preview_vd2" id="showTrailer2" data-youtube="YnLtR9HT52U">

                    </div>
                    <div class="preview_vd3" id="showTrailer3" data-youtube="cfJpcDAyzqE">

                    </div>
                    <div class="preview_vd4" id="showTrailer4" data-youtube="JiJtqqYr18U">

                    </div>
                    <div class="preview_vd5" id="showTrailer5" data-youtube="Gz0ZeY1U4vY">

                    </div>
                    <div class="preview_vd6" id="showTrailer6" data-youtube="x60mB0zXZ38">

                    </div>

                </div>
            </div>
            </div>
        </div>
        </div>
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
        var swiper = new Swiper('.swiper-container2', {
            slidesPerView: 4,
            spaceBetween: 24,
            loop:true,
            //            mousewheel: {
            //                invert: true,
            //            },
            keyboard: {
                enabled: true,
                onlyInViewport: false,
            },
            autoplay: {
                delay: 2000,
            },
            breakpoints: {
                600: {
                    slidesPerView: 1.4,
                    spaceBetween: 24
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 24
                },
                960: {
                    slidesPerView: 3,
                    spaceBetween: 24
                }
            }
        });
    </script>
</body></html>
