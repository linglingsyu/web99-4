<h2 class="ct">訂單管理</h2>
<table class="all ct">
  <tr class="tt">
    <td>訂單編號</td>
    <td>金額</td>
    <td>會員帳號</td>
    <td>姓名</td>
    <td>下單時間</td>
    <td>操作</td>
  </tr>
  <?php
  $ords = $Ord->all();
  foreach ($ords as $ord) {

  ?>
    <tr>
      <td class="pp"><a href="?do=detail&id=<?=$ord['id']?>"><?= $ord['no'] ?></a></td>
      <td class="pp"><?= $ord['total'] ?></td>
      <td class="pp"><?= $ord['acc'] ?></td>
      <td class="pp"><?= $ord['name'] ?></td>
      <td class="pp"><?= $ord['ord_time'] ?></td>
      <td class="pp">
        <button onclick="del('ord',<?= $ord['id'] ?>)">刪除</button> </td>
    </tr>
  <?php
  }
  ?>

</table>

<div class="ct"><button onclick="location.href='index.php'">返回</button></div>