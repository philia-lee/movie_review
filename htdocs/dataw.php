
<html>
<head>
<title>hi </title>
<style>
 h3,h4 {margin:0px; float:left;}
</style>
</head>
<body>
<form action="./dataw.php" method="post">
<h3>한줄평 기능</h3><br><br>
<a href="./index.php"><input type="button" value="돌아가기" /></a>
<hr>
닉네임:<input type="text" name=add /><br>
  <textarea rows="5" cols="30" name="address"></textarea>

<input type="submit" value="작성">
</form>
<br>
<br>

<form action="./dataw.php" method="post">
  <input type="hidden" name="del" value="2"/>
 <a href="./dataw.php"><input type=submit value="초기화"/></a>
</form>

<?php
include("session.php");

  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  // create short variable names
if(empty($_POST['del'])==FALSE){
  $clear="";
          $fp = fopen("$DOCUMENT_ROOT/orders.txt", 'w');//파일오픈
          flock($fp, LOCK_EX);//건들지마
  if (!$fp) {
            echo "file call fail";
            exit;//php문 탈출
          }

          fwrite($fp, $clear, strlen("$clear"));
          flock($fp, LOCK_UN);
          fclose($fp);

          //echo "<p>글 작성 완료!</p>";
            echo file_get_contents("orders.txt");
}
  if(empty($_POST['address'])==FALSE){
  $address = $_POST['address'];
  $main = $_POST['add'];
        //echo "<p>Address save to file :".$address."</p>";

        $ipadd=$_SERVER["REMOTE_ADDR"];
        //ip * 처리
        $cnt=0;
        for($k=0;$k<strlen($ipadd);$k++){
          if($ipadd[$k]=="."){
            $cnt++;
            continue;
            }
              if($cnt>1){
                $ipadd[$k]="*";
              }
            }
            //
        $outputstring =$main."\n".$address."\n".$ipadd."\n";
        // open file for appending
        $fp = fopen("/orders.txt", 'w+');//파일오픈
        flock($fp, LOCK_EX);//건들지마
if (!$fp) {
          echo "file call fail";
          exit;//php문 탈출
        }

        fwrite($fp, $outputstring, strlen($outputstring));
        flock($fp, LOCK_UN);
        fclose($fp);
          echo "<meta http-equiv='refresh' content='0; url=./main.php'>"; //php 새로고침 post중복방지
}
        //echo "<p>글 작성 완료!</p>";
          echo file_get_contents("/orders.txt");

?>
</body>
