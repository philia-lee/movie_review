<?php
$load=count(scandir("./user/"))-2;
for($i=0;$i<$load;$i++){
  $userid = file("./user/user".$i.".txt");
  $j_userid[$i]=$userid[0];
  $j_nick[$i]=$userid[2];
}
if($load>0){
$users=json_encode($j_userid);
$nicks=json_encode($j_nick);
}else{
  $j_userid=array();
  $j_nick=array();
  $users=json_encode($j_userid);
  $nicks=json_encode($j_nick);
}
?>

<script>

</script>

<html>
<head>
<title>회원가입</title>
</head>
<body>
  <script>
  var jaa=<?php echo $users ?>;
  var jnick=<?php echo $nicks ?>;
   function ch(){
     var test = document.getElementById("input_i").value;
     if(test.search(/\s/)!=-1){
       var replacedString = "공백을 제거해주세요.";
       document.getElementById("id_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
       return false;
     }
     if(test.length<4){
       var replacedString = "4글자 이상 입력하세요";
       document.getElementById("id_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
       return false;
     }
     for(var i=0;i<jaa.length;i++){
       if(test==jaa[i].trim()){
         var replacedString = "이미 사용중인 아이디 입니다";
         document.getElementById("id_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
         return false;
       }
     }
     var replacedString = "사용가능한 아이디 입니다";
     document.getElementById("id_txt").innerHTML ="<font color='blue'>"+replacedString+"</font>";
     return true;
   }

   function nick_ch(){
     var test = document.getElementById("nick").value;
     if(test.search(/\s/)!=-1){
       var replacedString = "공백을 제거해주세요.";
       document.getElementById("nick_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
       return false;
     }
     if(test.length<2){
       var replacedString = "2글자 이상 입력하세요";
       document.getElementById("nick_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
       return false;
     }
     for(var i=0;i<jnick.length;i++){
       if(test==jnick[i].trim()){
         var replacedString = "이미 사용중인 닉네임 입니다";
         document.getElementById("nick_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
         return false;
       }
     }
     var replacedString = "사용가능한 닉네임 입니다";
     document.getElementById("nick_txt").innerHTML ="<font color='blue'>"+replacedString+"</font>";
     return true;
   }
     </script>

<form action="./index.php" method="post" id=login_form>
아이디 : <input type=text id="input_i" name="input_id1" /><span id=id_txt>4글자 이상 입력하세요</span><br>
비밀번호 : <input type=password id=pw1 name="input_pw1" /><br>
비밀번호 확인 : <input type=password id=pw2 /><br>
<div id="pw_txt"></div>
닉네임 : <input type=text id=nick name=nick /><span id=nick_txt>2글자 이상 입력하세요</span><br>
이메일 : <input type=text name=mail /><br>
<input type=button id=submit_user value=확인>
</form>

<script>
var btn_submit = document.getElementById("submit_user");
btn_submit.addEventListener("click",submit_ch);

var nickname= document.getElementById("nick");
nickname.addEventListener("keyup",nick_ch);

var check_id= document.getElementById("input_i");
check_id.addEventListener("keyup",ch);

var p1 = document.getElementById("pw1")
var p2 = document.getElementById("pw2")
p1.addEventListener("keyup",pw_ch);
p2.addEventListener("keyup",pw_ch);

function submit_ch(){
  if(ch()==true && pw_ch()==true && nick_ch()==true){
    document.getElementById('login_form').submit();
  }else{
    alert("잘못 입력 하셨습니다. 확인하세요!");
  }
}
function pw_ch(){

var string1 = document.getElementById("pw1").value;
var string2 =document.getElementById("pw2").value;
if(string1.search(/\s/)!=-1){
  var replacedString = "공백을 제거해주세요.";
  document.getElementById("pw_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
  return false;
}
if(string1==string2 && string1.length>0){
var replacedString = "비밀번호가 일치합니다.";
document.getElementById("pw_txt").innerHTML = "<font color='blue'>"+replacedString+"</font>";
return true;
}else{
var replacedString="비밀번호가 다릅니다.";
document.getElementById("pw_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
return false;
}
};
</script>
</body>

</html>
