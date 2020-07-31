<h2 class="ct">商品分類</h2>

<div class="ct">
  新增大分類
  <input type="text" name="big" id="big">
  <button onclick="addbig()">新增</button>
</div>

<div class="ct">
  新增中分類<select name="mid" id="mid"></select>
  <input type="text" name="mid_name" id="mid_name">
  <button onclick="addmid()">新增</button>
</div>

<table class="type-list all">
</table>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
  <tr>
    <td width="10%" class="tt ct">編號</td>
    <td width="30%" class="tt ct">商品名稱</td>
    <td width="5%" class="tt ct">庫存量</td>
    <td width="5%" class="tt ct">狀態</td>
    <td width="30%" class="tt ct">操作</td>
  </tr>
  <?php
    $goods = $Goods->all();
    foreach($goods as $g){
  ?>
<tr>
    <td class="ct pp"><?= $g['no'] ?></td>
    <td class="ct pp"><?= $g['name'] ?></td>
    <td class="ct pp"><?= $g['stock'] ?></td>
    <td id="g<?= $g['id'] ?>" class="ct pp"><?= ($g['sh'] == "1" ? "販售中" : "已下架") ?></td>
    <td class="ct pp">
      <button onclick="location.href='?do=edit_goods&id=<?= $g['id']?>'">修改</button>
      <button onclick="del('goods',<?= $g['id']?>)">刪除</button>
      <button onclick="sh(<?= $g['id']?>,1)">上架</button>
      <button onclick="sh(<?= $g['id']?>,0)">下架</button>
    </td>
  </tr>

  <?php
}
  ?>


</table>




<script>

  getbigOption()
  getTypeList();

  function addbig() {
    $.post("api/save_type.php", {
      'name': $("#big").val(),
      'parent': 0
    }, function() {
      getbigOption()
      getTypeList();
    })

  }

  function getbigOption() {
    $.get("api/get_big.php", function(options) {
      $("#mid").html(options);
    })
  }

  function edit(id){
    let newName = prompt("請輸入要修改的名稱",$("#t"+id).html());
    if(newName != null){
      $("#t"+id).html(newName);
        $.post("api/edit_type.php",{id,newname},function(){
        })
    }

  }


  function addmid() {
    let name = $("#mid_name").val();
    let big = $("#mid").val();
    $.post("api/save_type.php", {'name': name,'parent': big },function(){
      getbigOption();
      getTypeList();
    })
  }

  function getTypeList() {
    $.get("api/get_typelist.php", function(list) {
      $(".type-list").html(list);
    })
  }


  function sh(id,sh){
    $.post("api/sh.php",{id,sh},function(res){
      console.log(res);
        switch(res){
          case "1" : 
          $(`#g${id}`).html("販售中");
          break;
          case "0" : 
          $(`#g${id}`).html("已下架");
          break;
        }
    })
  }

</script>