<?php

include_once "../base.php";
//撈出大分類
$bigs = $Type->all(['parent' => 0]);

foreach ($bigs as $b) {

?>
  <tr class="tt">
    <td id="t<?=$b['id'] ?>" class="pp"><?= $b['name'] ?></td>
    <td  class="pp"><button onclick="edit(<?=$b['id']?>)">修改</button><button onclick="del('type',<?= $b['id'] ?>)">刪除</button></td>
  </tr>

  <?php

$mids = $Type->all(['parent' => $b['id']]);
if (!empty($mids)) {
  foreach ($mids as $mid) {
  ?>
    <tr >
      <td  id="t<?=$mid['id'] ?>" class="pp"><?= $mid['name'] ?></td>
      <td class="pp"><button onclick="edit(<?=$mid['id']?>)">修改</button><button onclick="del('type',<?= $mid['id'] ?>)">刪除</button></td>
    </tr>
<?php
    }
  }
}
?>