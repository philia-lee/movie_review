<?php
include ("init_val.php");
if(empty($_GET['know'])==FALSE){
$know=$_GET['know'];
}else{
$know="";
}

 ?>
<meta charset="UTF-8">
<html>
<form action="findmovie.php" method="get">
<input type="text" name="know"/>
<input type="submit" value="검색"/>
</form>
<hr>
"<?=$know ?>"에 대한 검색 결과
<hr>
<?php
//$max_dir:int $movie:array

$cnt=0;
for($i=0;$i<$max_dir;$i++){
  $load="./".$movie[$i]."/tag.txt";
  $tag=file_get_contents($load);
  if (stripos($tag,$know)!==false){
    $cnt++;
      echo "<a href=".$movie[$i]."/readpage.php>영화 : ". $movie_name[$i]."</a>이(가) 검색됨<br>";
  }
}
if($cnt==0){
  echo "검색 결과가 없습니다.";
}
 ?>


<hr>
<a href=../><input type=button value="돌아가기" /></a>
</html>
