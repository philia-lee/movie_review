<?php
include("../inmovie.php");
 ?>
<html>
<head>
  <title>
글쓰기
  </title>
</head>

<body>
<form action="./post1.php" method="post">
  제목:<input type=text name="thema"><br>
<input type=hidden name="writer" value= <?=$userfile[2] ?> ><br>
 <textarea rows="20" cols="50" name="contents"></textarea>
 <input type=submit value="작성"><br>


</form>
</body>
</html>
