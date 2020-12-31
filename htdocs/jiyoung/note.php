<?php
include("../inmovie.php");
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
     echo "제목:".$lines[0]."<hr>";
     echo "글쓴이:".$lines[1]." 날짜:".$lines[2]." 조회수:".$lines[3]."번호:".$lines[4]."<hr>";
     $buffer="";
     for($k=5;empty($lines[$k])==FALSE;$k++){
      $buffer .= $lines[$k]."<br>";
   }
   echo $buffer."<hr>";
 ?>

<a href=./post1.php><input type=button value="목록으로"/></a>
