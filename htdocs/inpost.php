<?php
//영화 게시판 파일 수정
if(empty($_POST['contents'])==FALSE){
$contents = $_POST['contents'];
$writer = $_POST['writer'];
$thema = $_POST['thema'];
      //echo "<p>Address save to file :".$address."</p>";
      for($i=0;$i<100;$i++){

          $test_file = "./inpost/inpost".$i.".txt";
          if(file_exists($test_file))
          {
              //파일존재
          }else{
            //파일 없다면

            $outputstring =$thema."\n".$writer."\n".date("Y/m/d h:i:s")."\n"."0\n".$i."\n".$contents;
            //포스트입력
            $fp2 = fopen("./inpost/inpost".$i.".txt", 'a');//포스트 생성
            flock($fp2, LOCK_EX);//건들지마
            if (!$fp2) {
                    echo "content call fail";
                    exit;//php문 탈출
                  }
            fwrite($fp2, $outputstring, strlen($outputstring));
            flock($fp2, LOCK_UN);
            fclose($fp2);
            echo "<meta http-equiv='refresh' content='0; url=./readpage.php'>";
            break;
          }
}


}
?>

<?php
 $max=5; //게시글 갯수 제한
$m_row=count(scandir("./inpost/"))-2;
for($i=0;$i<$m_row;$i++){
    $test_file = "./inpost/inpost".$i.".txt";
    if(file_exists($test_file))
    {
      $lines=file($test_file);
for($j=0; $j<6;$j++){
 $result[$i][$j] = $lines[$j];
}

}
}
/*
 for($row=0; $row<m_row; $row++) {
   for($col=0; $col<m_col; $col++) {
       echo $result[$row][$col];
   }
}
*/

?>
