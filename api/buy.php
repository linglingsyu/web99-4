<?php

include_once "../base.php";

$data['no'] = date("Ymd").rand(100000,999999);
$data['total'] = 0;
//goods=商品id
foreach($_SESSION['cart'] as $goods => $qt){
  $g = $Goods->find($goods);
  $data['total'] += ($g['price']*$qt); 
}

$data = array_merge($data,$_POST); //將data跟$_POST 合併成一個陣列
$data['acc'] = $_SESSION['member'];
$data['goods'] = serialize(($_SESSION['cart']));
$Ord->save($data);
unset($_SESSION['cart']);
?>