<?php
include ("../inmovie.php");
include ("../inpost.php");
$movie="조커";

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <title>게시판</title>

  <style>
  body{
    text-align: center;
    background-color:#191919;
    color:white;
    margin: 100px 0px;
  }
  a{
    text-decoration: none;
      color:white;
  }

  .밑줄:hover, a:hover{
    text-decoration: underline;
  }

  #main {
      width: 1000px;
      height: auto;
      margin: 0px auto;
  }
  #top{
  }
  #게시판{
    font-size: 30px;
  }
  #게시판2{
      margin: auto auto 40px auto;
  }
  #review{
    line-height:160%;
  }
  #사이공간{
    width: auto;
    height: 30px;
    border-top: 1px solid gray;
    border-bottom: 1px solid gray;
  }
  .review_line{
    border-right: 1px solid gray;
    margin-right: 10px;
    padding-right: 12px;
  }
  .review_title{
    color:#FFE08C;
    display: inline;
  }
  .review_layout{
    padding:30px 0px;
    border-bottom: 1px dashed gray;
    text-align: left;
  }
  .review_layout_last{
    padding:30px 0px;
    text-align: left;
  }
  #index_layout{
    margin:20px auto;
  }
  #index{
    text-align: center;
    align-self: center;
    margin: 0px auto;
  }
  .index_num{
    border: 1px solid gray;
    width: 40px;
    height: 40px;
    float: left;
    background-color: #353535;
    line-height:240%;

  }


  #current_page, .index_num:hover{
    border: 2px solid #3163C9;
    color: ;
  }
  .clear{
    clear:both;
  }
  </style>
</head>
<body>
  <script>
    function f_page(e){
      document.getElementById('num').value=e;
      document.getElementById('frm').submit();
    }
  </script>
  <div id="main">

    <div id="top">
      <div id ="게시판2">
      <span id ="게시판"><?=$movie?> 게시판</span>
    </div>
    <?php
    if(isset($_SESSION['login_num'])==true){
    echo "\"".trim($userfile[2])."\""."님 반갑습니다.";
  }else{
    echo "로그인이 필요합니다.";
  }
    ?>
    <br>
    <a href="/mainpage/main.php"><input type="button" value="돌아가기" /></a>
    <a href="./write.php"> <input type=button value="글쓰기"> </a>
    </div>

    <div id="review">

      <div id="사이공간">
      </div>

 <?php
 if(empty($_GET['page_num'])==false){
   $page=$_GET['page_num'];
 }else{
 $page=1;
}

 $total_page=ceil($m_row/$max);
 for($row=($page-1)*$max;$row<$m_row;$row++) {
   if(($row-(($page-1)*$max))/$max>=1){
     break;
   }
    echo "<div class=\"review_layout\">".
      "<span class=\"review_line\">"."<p class=\"review_title\">".$result[($m_row-1)-$row][0]."</p></span>".
    "<span class=\"review_line\">작성 : ".$result[($m_row-1)-$row][1]."</span>".
  "<span class=\"review_line\">".$result[($m_row-1)-$row][2]."</span>".
    "<span class=\"review_line\">번호 : ".$result[($m_row-1)-$row][4]."</span>".
    "조회수 : ".$result[($m_row-1)-$row][3].
  "<br><a href=\"./note.php?num=".$result[($m_row-1)-$row][4]."\" target=\"_self\" class=\"밑줄\">".
    substr($result[($m_row-1)-$row][5],0,150)." . . .".
  "</a>".
"</div>";
}

?>
<form id="frm" method="get" action="./post1.php">
  <input type=hidden value="1" name=page_num id=num />
</form>
  </div> <!--메인속 review 파트-->

  <div id="사이공간">
  </div>

  <div id="index_layout"> <!--(전체 layout)혹시 게시글을 줄이고 페이지로 넘어간다는 가정을 대비-->

    <div id=index><!--안쪽 틀-->
      <?php
      for($i=0;$i<$total_page;$i++){
        if($page-1==$i){
          $id="id=\"current_page\"";
        }else{
          $id="";
        }
      echo "<div ".$id."class=\"index_num\" onclick=\"f_page(".($i+1).")\" >".($i+1)."</div>";
    }

       ?>

    </div>

  </div>
  <div class="clear">

  </div>

</div>  <!--메인 틀-->

</body>

</html>
