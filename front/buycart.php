<table width="90%">
  <tr>
  <td class="tt">編號</td>
  <td class="tt">商品名稱</td>
  <td class="tt">數量</td>
  <td class="tt">庫存量</td>
  <td class="tt">單價</td>
  <td class="tt">小計</td>
  <td class="tt">刪除</td>
  </tr>
<?php
if(!empty($_GET['id'])){
  //記錄我要購買的商品數量
   $_SESSION['cart'][$_GET['id']] = $_GET['qt'] ;
}else{
  echo '<h2 class="ct">請先選擇商品</h2>';
}
//先判斷有無登入
if(empty($_SESSION['member'])){
  to("?do=login");
}
echo   '<h2 class="ct">'.$_SESSION['member'].'</h2>';
foreach($_SESSION['cart'] as $id => $qt){
  $goods = $Goods->find($id);
?>

<tr>
<td class="pp"><?= $goods['no'] ?></td>
<td class="pp"><?= $goods['name'] ?></td>
<td class="pp"><?= $qt; ?></td>
<td class="pp"><?= $goods['stock'] ?></td>
<td class="pp"><?= $goods['price'] ?></td>
<td class="pp"><?= ($goods['price'])*$qt ?></td>
<td class="pp"><a href="javascript:delcart(<?=$goods['id'] ?>)"><img src="icon/0415.jpg"></a></td>
</tr>
<?php
}
?>
</table>
<div class="ct">

<a href=""><img src="icon/0411.jpg" alt="繼續選購"></a>
<a href=""><img src="icon/0412.jpg" alt="結帳"></a>


</div>

<script>
function delcart(id){
  $.post("api/del_cart.php",{id},function(){
    location.reload();
  })
  
  }

</script>

