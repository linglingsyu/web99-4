<h2 class="ct">管理登入</h2>
<table>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="tt ct">驗證碼</td>
    <td class="pp">
      <?php
    $a = rand(10,99);
    $b = rand(10,99);
    $_SESSION['ans'] = $a+$b;
    echo $a . " + " . $b . " = ";
      ?>
      <input type="text" name="ans" id="ans">
    </td>
  </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>


<script>

  function login(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let ans = $("#ans").val();
    $.get("api/chk_ans.php",{ans},function(res){
      if(res == 1){
        $.get("api/chk_pw.php",{'table':'admin',acc,pw},function(res){
            if(res == 1){
              location.href ="admin.php";
            }else{
              alert("帳號或密碼錯誤");
              location.reload();
            }
        })
      }else{
        alert("對不起,您輸入的驗證碼有誤請您重新登入");
      }
    })
  }


</script>