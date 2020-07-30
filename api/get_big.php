<?php
include_once "../base.php";
//取得大分類項目
$bigs = $Type->all(['parent'=>0]);
foreach ($bigs as $b){
  echo '<option value="'.$b['id'].'">'.$b['name'].'</option>';
}
?>

