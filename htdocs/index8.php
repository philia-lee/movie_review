<!DOCTYPE html>
<head>
<title>hi</title>
<meta charset="UTF-8">
<script language="javascript" src="./object.js"></script>
</head>
<body>
<a href="./dataw.php">한줄평 쓰기</a>
<hr>
<a href="./jocker/post1.php">영화 조커</a>
<br>
<a href="./avengers/post1.php">영화 어벤져스</a>
<hr>
<form action="./search/search.php" method="get">
<input type="text" name="know"/>
<input type="submit" value="검색"/>
</form>

<hr>
<?php
include("session.php");
include("addpoint.php");
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
//회원가입 정보
if(empty($_POST['input_id1'])==FALSE && empty($_POST['input_pw1'])==FALSE){
  $cnt=count(scandir("./user/"))-2;
  if($cnt<0){
    $cnt=0;
  }
  $outputstring= $_POST['input_id1']."\n".$_POST['input_pw1']."\n".$_POST['nick']."\n".$_POST['mail']."\n"."0";
  $fp = fopen("./user/user".$cnt.".txt", 'a');//파일오픈
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
$long=0;
if(empty($_POST['id'])==FALSE && empty($_POST['pw'])==FALSE){
$id = $_POST['id'];
$pw = $_POST['pw'];
$load=count(scandir("./user/"))-2;
for($i=0;$i<$load;$i++){
$user = file("./user/user".$i.".txt");
if(trim($user[0])==$id && trim($user[1])==$pw){
    $long=100;
    $_SESSION["login_num"]=$i;
    $_SESSION["login_ch"]=$long;
    break;
}else{
  continue;
}
}
}
if(isset($_SESSION["login_ch"])==FALSE){
echo "<form action=\"./\" method=\"post\">
ID:<input type=text name=id />
<br>PW:<input type=password name=pw /><br>
<input type=\"submit\" value=\"로그인\"/>
</form>

<form action=\"./register.php\" method=\"post\">
<input type=\"submit\" value=\"회원가입\"/>
</form>";
}else{
  $userfile=file("./user/user".$_SESSION['login_num'].".txt");
  echo "\"".trim($userfile[2])."\""."님 반갑습니다.<br>포인트:".trim($userfile[4])."<br>";
  echo "<form action=\"./\" method=\"post\">
  <input type=hidden name=logout value=10 />
  <input type=\"submit\" value=\"로그아웃\"/>
  </form>";
}
echo "<hr>";

 ?>
 <script language="javascript" src="./object.js"></script>
<form id=addpoint method="post" action="./index.php">
  <input type=hidden value=0 name=point id=point />
</form>
 <script language="javascript">object('aa.swf','1200','550','transparent');</script>
<script>
function javaCall(e){
  document.getElementById("point").value=e;
  document.getElementById("addpoint").submit();
  //자바 함수 실행
}
</script>



</body>
</html>
