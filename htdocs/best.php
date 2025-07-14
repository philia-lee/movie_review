<?php
//모든 영화의 inpost를 읽은 후, 각 inpost주소 값을 조회수별 오름차순 정렬 한다.
include ("init_val.php");

for($i=0; $i<$max_dir;$i++){
$load= "./".$movie[$i]."/inpost/";
$cnt[$i]=count(scandir($load))-2;
}
//각 영화폴더별 리뷰글 갯수 파악
$sum=0;
for($i=0;$i<count($cnt);$i++){
for($j=0;$j<$cnt[$i];$j++){
  $fi = file("./".$movie[$i]."/inpost/inpost".$j.".txt");
  $check[$sum][0]=(int)$fi[3];
  $check[$sum][1]="./".$movie[$i]."/inpost/inpost".$j.".txt";
  $check[$sum][2]=$fi[0];//제목
  $check[$sum][3]=$fi[1];//니네임
  $check[$sum][4]=$fi[2];//작성일
  $check[$sum][5]=$fi[5];//내용


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
for($i=0;$i<count($check);$i++){
  //sdsdfsdf
echo $check[$i][2].$check[$i][2].":".$check[$i][1]."<br>";
}
/*

*/
 ?>
