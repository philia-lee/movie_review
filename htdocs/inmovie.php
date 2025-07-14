<?php
include ("../session.php");
$root=$_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION['login_num'])==true){
$link= $root."/user/user".$_SESSION['login_num'].".txt";
$userfile=file($link);
}else{
  //세션 없을경우
  echo "<meta http-equiv='refresh' content='0; url=/mainpage/main.php'>";
  echo "<script> alert(\"로그인 이후 이용하실 수 있습니다.\"); </script>";

}
//각무비 리뷰페이지에 적용됨
  ?>
