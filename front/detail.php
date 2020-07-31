<?php
$good = $Goods->find($_GET['id']);
?>

<h2 class="ct"><?= $good['name'] ?>的購物車</h2>
<div style="display:flex;">
  <div style="width:30%;display:flex;justify-content:center;align-items:center"><a href="?do=detail?id=<?= $g['id'] ?>"><img style="width:90%;" src="img/<?= $g['img'] ?>" alt=""></a></div>
  <div style="width:70%">
    <div>分類:<?= $Type->find($good['big'])['name']?> > <?= $Type->find($good['mid'])['name']?></div>
    <div>編號:<?= $good['no'] ?></div>
    <div>價格:<?= $good['price'] ?></div>
    <div>簡介：<?= nl2br($good['intro']) ?></div>
    <div>庫存量:<?= $good['stock'] ?></div>
  </div>
</div>
<div class="ct">
  購買數量<input type="number" name="qt" id="qt">
  <input type="hidden" name="id" id="id" value="<?= $good['id'] ?>">
  <a href="javascript:buy()"><img src="icon/0402.jpg" alt=""></a>
</div>
<button onclick="location.href='index.php'">返回</button>

<script>
  function buy(){
    let id = $("#id").val();
    let qt = $("#qt").val();
    location.href=`?do=buycart&id=${id}&qt=${qt}`;
  }
</script>