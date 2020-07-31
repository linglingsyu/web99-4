<?php

include_once "../base.php";
$goods=$Goods->find($_POST['id']);
switch($_POST['sh']){
  case 1: $goods['sh'] = 1;
  break;
  case 0: $goods['sh'] = 0 ;
  break;
}
$Goods->save($goods);
echo $Goods->find($_POST['id'])['sh'];



?>