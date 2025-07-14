<!DOCTYPE html>
<head>
<title>hi</title>
<meta charset="UTF-8">
<script language="javascript" src="./object.js"></script>
</head>
<body>

  <?php
 //1:내가 실행  2:타인의 실행으로 골라짐
  $na = array('김정규','박미영','원동진','이수호','성재석','한경현','조민선','김민준');
    $fi=file("mani.txt");
  //중복검사
  if(empty($_POST['fruit'])==false){
    $ipf=file("iplist.txt");
    for($w=0;$w<count($ipf);$w++){
        if(substr($ipf[$w],0,9)==substr($_POST['ipadd'],0,9)){
          echo "<script>alert(\"당신은 이미 뽑았습니다 이페이지에서 꺼지세요!.\")</script>당장 시험공부하러 가세요.";
          return;
        }
    }
  //검사완료 실행
    $if=fopen("iplist.txt",'a');
    $ipp=$_POST['ipadd']."\n";
    fwrite($if,$ipp);
    fclose($if);
    $f=fopen("temp2.txt",'w+'); //임시파일 오픈
    for($i=0; $i<count($fi);$i++){
    if($na[$i]==$_POST['fruit']){//원본파일 읽어 오다가 해당 유저면
      $n_num=$fi[$i]; //속성값 변경
      $n_num[0]='o';//속성값 변경
       fwrite($f,$n_num); //임시파일에 한줄씩 쓰기
    }else{
    fwrite($f,$fi[$i]); //임시파일에 한줄씩 쓰기
    }
    }
    fclose($f); //임시파일 닫기
    $test_name = rename("temp2.txt","mani.txt");  //임시파일명 원본파일로 변경
  }

  $fi=file("mani.txt");
  echo "<form method=post>본인 이름을 선택하세요~<hr>";
  for($i=0;$i<8;$i++){
    if($fi[$i][0]=='o'){
      $ch_1=" disabled ";
    }else{
      $ch_1=" ";
    }
  echo "<br><input type=\"radio\"".$ch_1."name=\"fruit\" value=".$na[$i]." /> ".$na[$i]."<br>";
}
echo "<input type=hidden name=ipadd value=".$_SERVER["REMOTE_ADDR"]."><hr><input type=\"submit\" value=\"마니또뽑기\"></form>";


$rand= mt_rand(0, 7);
  if(empty($_POST['fruit'])==false){
for($i=0;$i<100;$i++){
if($na[$rand]!=$_POST['fruit'] && $fi[$rand][1]=='x'){
echo "당신의 마니또는".substr($fi[$rand],2,15);

$f=fopen("temp1.txt",'w+'); //임시파일 오픈

for($i=0; $i<count($fi);$i++){
if($i==$rand){//원본파일 읽어 오다가 해당 유저면
  $n_num=substr($fi[$i],1,15); //속성값 변경
  $n_num[0]='o';//속성값 변경
   fwrite($f,$fi[$i][0].$n_num); //임시파일에 한줄씩 쓰기
}else{
fwrite($f,$fi[$i]); //임시파일에 한줄씩 쓰기
}
}
fclose($f); //임시파일 닫기
$test_name = rename("temp1.txt","mani.txt");  //임시파일명 원본파일로 변경
break;
}else{
  $rand= mt_rand(0, 7);
  continue;
}
}
}
?>
</body>
</html>
