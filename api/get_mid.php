<?php
include_once "../base.php";
//取得大分類項目
$mids = $Type->all(['parent'=>$_GET['bigid']]);
foreach ($mids as $m){
  echo '<option value="'.$m['id'].'">'.$m['name'].'</option>';
}
?>

