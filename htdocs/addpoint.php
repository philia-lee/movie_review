<?php
$root=$_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION['login_num'])==true && isset($_POST['point'])==true){

$point=$_POST['point'];

$orif=$root."/user/user".$_SESSION['login_num'].".txt";//원본파일명
$fi = file($orif); //원본파일 배열화
  $f=fopen("temp.txt",'w+'); //임시파일 오픈

for($i=0; $i<count($fi);$i++){
  if($i==4){//원본파일 읽어 오다가 포인트 단락이면
    $n_num=((int)$fi[$i]+$point)."\n"; //포인트 올리기
     fwrite($f,$n_num); //임시파일에 한줄씩 쓰기
  }else{
 fwrite($f,$fi[$i]); //임시파일에 한줄씩 쓰기
}
}
fclose($f); //임시파일 닫기
$test_name = rename("temp.txt",$orif);  //임시파일명 원본파일로 변경

}
 ?>
