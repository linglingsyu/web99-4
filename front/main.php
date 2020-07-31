<h1>全部商品</h1>

<?php
if(isset($_GET['type'])){
  $type = $_GET['type']; //是大分類還是小分類的ID
}else{
  $type = 0;
}
if(empty($type)){
  //全部商品
  $goods = $Goods->all(['sh' => 1]);
  $nav = '全部商品 ';
}else{
  //先找出傳來的ID是哪一個分類
  $tt = $Type->find($type);
  if($tt['parent'] == 0){
    //大分類
    $goods = $Goods->all(['sh' => 1,'big'=>$type]);
    $nav = $tt['name'];  //大分類的文字
  }else{
    //中分類
    $goods = $Goods->all(['sh' => 1,'mid'=>$type]);
    $bigname = $Type->find($tt['parent'])['name']; //找出大分類文字:中分類的parent = 大分類的ID
    $nav = $bigname . " > " .$tt['name'];
  }
}
echo "<h3>".$nav."</h3>";
foreach ($goods as $g) {
?>

  <div style="display:flex;">
    <div style="width:30%;display:flex;justify-content:center;align-items:center"><a href="?do=detail&id=<?=$g['id'] ?>"><img style="width:90%;" src="img/<?= $g['img'] ?>" alt=""></a></div>
    <div style="width:70%">
      <div>
        <h3><?= $g['name'] ?></h3>
      </div>
      <div>價格:<?= $g['price'] ?></div>
      <div><a href="?do=buycart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg"></a></div>
      <div>規格：<?= $g['spec']; ?></div>
      <div>簡介：<?= nl2br($g['intro']) ?>...</div>
    </div>
  </div>

<?php
}
?>
