<?php
include("../inmovie.php");
 ?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <title>글쓰기</title>

  <style>
  /*여기서부터 탑파트*/
  .search {
      padding-top: 80px;
      float: right;
  }

  .search__input {
      width: 400px;
      height: 5px;
      color: white;
      padding: 12px 24px;
      transform: translate(0px,10px);
      background-color: #5b5b5b;
      transition: transform 250ms ease-in-out;
      font-size: 14px;
      line-height: 18px;

      color: white;
      background-color: #5b5b5b;
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-size: 18px 18px;
      background-position: 95% center;
      border-radius: 50px;
      border: 1px solid #575756;
      transition: all 250ms ease-in-out;
      backface-visibility: hidden;
      transform-style: preserve-3d;
  }

    .search__input:placeholder {
      color: color(white a(0.8));
      text-transform: uppercase;
      letter-spacing: 1.5px;
    }

    .search__input:hover,
    .search__input:focus {
      padding: 12px 0;
      outline: 0;
      border: 1px solid transparent;
      border-bottom: 1px solid #575756;
      border-radius: 0;
      background-position: 100% center;
      background-color: transparent;
  }
  /*여기까지는 검색파트*/

      #top {
        height: 150px;
        position: relative;
        width:1200px;
        margin: auto;
      }
      #top_logo {
        display: inline-block;
        position: relative;
        float: left;
        transform: translate(0px, 20px);
      }

      #top_search {
        border:1px solid red;
        display: inline-block;
        position: relative;
        float: right;
        transform: translate(0px,90px);
        overflow: hidden;
      }
      #search{
        width: 400px;
        height:25px;
        text-align: left;
        color:black;
        border-radius: 10px;
        padding : 0px 10px;
      }

      #logo {
          height: 130px;
          width: 400px;
          display: inline-block;
          position: relative;
          margin: auto;
          transform: translate(0px,-10px);
      }

  /*추가 파트*/
  #top_case{
    text-align: center;
    position: relative;
    width: auto;
    height: auto;
    border-bottom: 1px solid gray;
    margin: auto;
  }

  /*여기까지 top파트*/


  #sec_top{
    margin:20px 0px 30px 0px;
  }
  body{
    text-align: center;
    background-color:#191919;
    color:white;
    margin-bottom: 100px;
    font-family: "맑은 고딕";
  }
  a{
    text-decoration: none;
      color:white;
  }

  .밑줄:hover, a:hover{
    text-decoration: underline;
  }

  #main {
      width: 1200px;
      height: auto;
      margin: 0px auto;
  }
  #게시판{
    margin-top: 10px;
    font-size: 30px;
  }

  #review{
    line-height:160%;
  }
  #사이공간{
    width: auto;
    height: 30px;
    text-align: left;
    border-top: 1px solid gray;
    border-bottom: 1px solid gray;

  }
  #사이공간2{
    width: auto;
    height: 30px;
    text-align: left;
    border-top: 1px solid gray;
    border-bottom: 1px solid gray;
    margin-top: 13px;
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
    display: grid;
    grid-template-columns: 50px 1fr;
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
    overflow: hidden;
    position: relative;
  }


  #current_page, .index_num:hover, #글쓰기:hover{
    border: 2px solid #3163C9;
  }
  .clear{
    clear:both;
  }
  #글쓰기_틀{
    float: right;
    position: relative;
  }
  #글쓰기{
    border: 1px solid gray;
    width: 120px;
    height: 40px;
    background-color: #353535;
    line-height:240%;
    color:white;
    text-align: center;
    letter-spacing: 10px;
    padding-right: 0px;
  }
  button{
    overflow: hidden;
  }
  .review_layout1{
    display: inline-block;
    text-align: center;
    position: relative;
    font-size: 20px;
    margin-right: 10px;
  }
  .review_layout2{

  }
  .중앙{
  transform: translate(0, 50%);
  }
  .글쓰기{
    background: linear-gradient(135deg,white,gray);
    width: 1060px;
    height: 500px;
    margin: 10px 0px;
    border-radius: 20px;
    text-align:left;
    padding: 40px 70px;
    line-height: 120%;
    font-family: "맑은 고딕";
    font-size: 15px;
  }
  .name{
    height: 25px;
    width: 450px;
    padding:0px 10px;
    background: linear-gradient(135deg,white,gray);
    border-radius: 7px;
  }
  #nick_case{
    margin-top: 10px;
    height: 10px;

  }
  #nick{
    display: inline-block;
    float: right;
  }
  </style>
</head>


<body>

<div id="top_case">
  <div id="top">
      <div id="top_logo">
        <a href="main.html">
          <img src="logo.png" id="logo">
        </a>
      </div>
        <div class="search" id="sc"> <input class="search__input" type="text" placeholder="Search">
      </div>
  </div>
</div>
<div id="main">

  <div id="nick_case">
  <div id="nick">
    닉네임:
    <span><?=$userfile[2] ?></span>
    Point:
    <span><?=$userfile[4] ?></span>
  </div>
    </div>

    <div id="sec_top">
      <span id ="게시판">글쓰기</span>
    </div>
<form action="./post1.php" method="post">
  <input type=hidden name="writer" value= <?=$userfile[2] ?> >
    <div id="review">
      <div id="사이공간">
        <input type="text" placeholder="제목을 입력하세요." name="thema" value="" class="name">
      </div>
      <!--<div id="사이공간2">-->
        <!--</div>-->
  </div> <!--메인속 review 파트-->
  <textarea class="글쓰기" name=contents placeholder="글을 입력하세요"></textarea>
  <div id="사이공간">
  </div>

  <div id="index_layout"> <!--(전체 layout)혹시 게시글을 줄이고 페이지로 넘어간다는 가정을 대비-->

    <div id="글쓰기_틀">
      <span class="중앙정렬">
      <button id="글쓰기">글쓰기</button>
    </span>
    </div>

  </div>
</form>
  <div class="clear">

  </div>

</div>  <!--메인 틀-->

</body>
</html>
