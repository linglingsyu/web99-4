<?php

include_once "../base.php";
//如果前端沒有對商品編號做處理 , 這邊要做 rand 6位數 ，記得商品編號不得更新
// if(empty($_POST['id'])){
//   $_POST['no'] = rand(100000,999999);
// }

// $_POST['sh'] = 1;  資料庫定義1 可以不用寫

if(!empty($_FILES['img']['tmp_name'])){
  $_POST['img'] = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_POST['img']);
}
$Goods->save($_POST);

to("../admin.php?do=th");

?>