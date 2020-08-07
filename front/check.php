<h2 class="ct">填寫資料</h2>
<?php
$mem= $Member->find(['acc'=>$_SESSION['member']]);
?>
<table class="all">
<tr>
    <td class="tt ct">登入帳號</td>
    <td class="pp"><?=$_SESSION['member']?></td>
  </tr>
  <tr>  
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" id="name" value="<?= $mem['name']?>"></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email" value="<?= $mem['email']?>"></td>
  </tr>
  <tr>
    <td class="tt ct">郵寄地址</td>
    <td class="pp"><input type="text" name="addr" id="addr" value="<?= $mem['addr']?>"></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" id="tel" value="<?= $mem['tel']?>"></td>
  </tr>
</table>
<table class="all">
<tr>
    <td class="ct tt">商品名稱</td>
    <td class="ct tt">編號</td>
    <td class="ct tt">數量</td>
    <td class="ct tt">單價</td>
    <td class="ct tt">小計</td>
  </tr>
  <?php
  $sum = 0;
  foreach($_SESSION['cart'] as $goods => $qt){
    $g = $Goods->find($goods);
  ?>
    <tr>
    <td class="ct pp"><?=$g['name'] ?></td>
    <td class="ct pp"><?=$g['no'] ?></td>
    <td class="ct pp"><?=$qt ?></td>
    <td class="ct pp"><?=$g['price'] ?></td>
    <td class="ct pp"><?=$g['price']*$qt ?></td>
  </tr>

  <?php
    }
    $sum += ($g['price']*$qt);
  ?>

  <tr>
    <td colspan="5" class="ct tt">購買金額：<?=$sum?></td>
  </tr>
</table>
<div class="ct">
  <button onclick="buy()">確定送出</button>
  <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
  function buy(){
    let data = {
      'name':$("#name").val(),
      'email':$("#email").val(),
      'tel':$("#tel").val(),
      'addr':$("#addr").val()
    };
    $.post("api/buy.php",data,function(res){
        alert("訂購成功\n感謝您的選購");
        location.href="index.php";
    })
  }
</script>