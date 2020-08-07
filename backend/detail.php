<?php
$ord= $Ord->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red;"><?=$ord['no']?></span>的詳細資料</h2>
<table class="all">
<tr>
    <td class="tt ct">登入帳號</td>
    <td class="pp"><?=$_SESSION['member']?></td>
  </tr>
  <tr>  
    <td class="tt ct">姓名</td>
    <td class="pp"><?= $ord['name']?></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><?= $ord['email']?></td>
  </tr>
  <tr>
    <td class="tt ct">郵寄地址</td>
    <td class="pp"><?= $ord['addr']?></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><?= $ord['tel']?></td>
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
  $cart = unserialize($ord['goods']); //裡面殂的是購物車資料
  foreach($cart as $goods => $qt){
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
  ?>

  <tr>
    <td colspan="5" class="ct tt">購買金額：<?=$ord['total']?></td>
  </tr>
</table>
<div class="ct">
  <button onclick="location.href='?do=order'">返回訂單管理</button>
</div>

