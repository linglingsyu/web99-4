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
</script>