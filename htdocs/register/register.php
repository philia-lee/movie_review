<?php
$load=count(scandir("../user/"))-2;
for($i=0;$i<$load;$i++){
  $userid = file("../user/user".$i.".txt");
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
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>회원가입</title>
    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link href="./font/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <link href="./css/style.css" rel="stylesheet">

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./js/jquery.min_1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/bootstrap.min.js"></script>
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
    <article class="container">
        <div class="page-header">
            <div class="col-md-6 col-md-offset-3">
                <h3>회원가입</h3>
            </div>
        </div>
        <div class="col-sm-6 col-md-offset-3">
            <form role="form" id='login_form' method="post" action="/mainpage/main.php">
                <div class="form-group"style="margin-bottom:17px;">
                    <label for="inputName">성명</label>
                    <input type="text" class="form-control" id="inputName" name=myName placeholder="이름을 입력해 주세요">
                    <p id="na_txt" style="color:red;visibility:visible;font-size:12px;padding-top: : 3px;"></p>
                </div>

                <div class="form-group" style="margin-bottom:10px;">
                    <label for="inputnicname">닉네임</label>
                    <input type="text" class="form-control" id="nick" name=nick placeholder="닉네임을 입력해 주세요">
                    <p id="nick_txt" style="color:red;visibility:visible;font-size:12px;padding-top: : 3px;"></p>
                </div>
                <div class="form-group" style="margin-bottom:10px;">
                    <label for="inputName">아이디</label>
                    <input type="text" class="form-control" id="input_i" name="input_id1" placeholder="아이디를 입력해 주세요">
                    <p id=id_txt style="color:red;visibility:visible;font-size:12px;padding-top: : 3px;"></p>
                </div>
                <div class="form-group" style="margin-bottom:17px;">
                    <label for="inputPassword">비밀번호</label>
                    <input type="password" class="form-control" id="pw1" name="input_pw1"  placeholder="비밀번호를 입력해주세요">
                    <p></p>
                </div>
                <div class="form-group" style="margin-bottom:10px;">
                    <label for="inputPasswordCheck">비밀번호 확인</label>
                    <input type="password" class="form-control" id="pw2" placeholder="비밀번호 확인을 위해 다시한번 입력 해 주세요">
                    <p id="pw_txt" style="color:red;visibility:visible;font-size:12px;padding-top: : 3px;"></p>
                </div>
                <div class="form-group" style="margin-bottom:17px;">
                    <label for="inputMobile">휴대폰 번호</label>
                    <input type="tel" class="form-control" id="inputMobile" name=myPhone placeholder="휴대폰번호를 입력해 주세요">
                    <p id=ph_txt style="color:red;visibility:visible;font-size:12px;padding-top: : 3px;"></p>
                </div>



                <div class="form-group text-center">
                    <button type="button" id="submit_user" class="btn btn-primary">
                        회원가입<i class="fa fa-check spaceLeft"></i>
                    </button>
                    <button class="btn btn-warning">
                        가입취소<i class="fa fa-times spaceLeft"></i>
                    </button>
                </div>
            </form>
        </div>

    </article>
    <script>
     var btn_submit = document.getElementById("submit_user");
     btn_submit.addEventListener("click",submit_ch);

     var myname=document.getElementById("inputName");
     myname.addEventListener("keyup",name_ch);

     var nickname= document.getElementById("nick");
     nickname.addEventListener("keyup",nick_ch);

     var check_id= document.getElementById("input_i");
     check_id.addEventListener("keyup",ch);

     var p1 = document.getElementById("pw1")
     var p2 = document.getElementById("pw2")
     p1.addEventListener("keyup",pw_ch);
     p2.addEventListener("keyup",pw_ch);

     var myphone=document.getElementById("inputMobile");
     myphone.addEventListener("keyup",phone_ch);

     function submit_ch(){
       if(ch()==true && pw_ch()==true && nick_ch()==true && phone_ch()==true&& name_ch()==true){//&& phone_ch()==true&& name_ch()==true
         document.getElementById('login_form').submit();
       }else{
         alert("잘못 입력 하셨습니다. 확인하세요!");
       }
     }

     function phone_ch(){
       var string1 = document.getElementById("inputMobile").value;
       if(string1.length>8 &&string1.length<13){
            document.getElementById("ph_txt").innerHTML ="";
         return true;
       }else{
         var replacedString ="올바른 전화번호를 기입하세요! ( - 생략).";
         document.getElementById("ph_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
         return false;
       }
     }
     function name_ch(){
       var string1 = document.getElementById("inputName").value;
       if(string1.length>1){
         document.getElementById("na_txt").innerHTML ="";
         return true;
       }else{
         var replacedString = "올바른 이름을 입력하세요!";
         document.getElementById("na_txt").innerHTML ="<font color='red'>"+replacedString+"</font>";
         return false;
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
</body></html>
