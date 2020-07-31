<?php

$goods = $Goods->find($_GET['id']);

?>
<h2 class="ct">編輯商品</h2>
<form action="api/save_goods.php" method="post">
<table class="all">
<tr>
<td class="tt ct">所屬大分類</td>
<td class="pp"><select name="big" id="big"></select></td>
</tr>
<tr>
<td class="tt ct">所屬中分類</td>
<td class="pp"><select name="mid" id="mid"></select></td>
</tr>
<tr>
<td class="tt ct">商品編號</td>
<td class="pp"><input type="text" name="no" id="no" value="<?= $goods['no'] ?>"></td>
</tr>
<tr>
<td class="tt ct">商品名稱</td>
<td class="pp"><input type="text" name="name" id="name" value="<?= $goods['name'] ?>"></td>
</tr>
<tr>
<td class="tt ct">商品價格</td>
<td class="pp"><input type="text" name="price" id="price" value="<?= $goods['price'] ?>"></td>
</tr>
<tr>
<td class="tt ct">規格</td>
<td class="pp"><input type="text" name="spec" id="spec" value="<?= $goods['spec'] ?>"></td>
</tr>
<tr>
<td class="tt ct">庫存量</td>
<td class="pp"><input type="text" name="stock" id="stock" value="<?= $goods['stock'] ?>"></td>
</tr>
<tr>
<td class="tt ct">商品圖片</td>
<td class="pp"><input type="file" name="img" id="img"></td>
</tr>
<tr>
<td class="tt ct">商品介紹</td>
<td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"><?= $goods['intro'] ?></textarea></td>
</tr>
<input type="hidden" name="id" value="<?= $goods['id'] ?>">
</table>
<div class="ct">
<input type="submit" value="修改">
<input type="reset" value="重置">
<input type="button" value="返回">
</div></form>

<script>
  getbigOption();
  function getbigOption(){
    $.get("api/get_big.php", function(options) {
      $("#big").html(options);
      //定位大分類
      $("#big option[value='<?= $goods['big']; ?>']").prop("selected",true);

        getmidOption();
        $("#big").on("change",function(){
          getmidOption();
        })
    })
  }

  function getmidOption(){
    //先取得大分類的值
    let bigid = $("#big").val();
    $.get("api/get_mid.php",{"bigid":bigid }, function(options) {
      $("#mid").html(options);
      //定位中分類
      $("#mid option[value='<?= $goods['big']; ?>']").prop("selected",true);
    })
  }


</script>