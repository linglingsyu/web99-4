<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
<h2 class="ct">新增商品</h2>
<table class="all">
<tr>
<td class="tt ct">所屬大分類</td>
<td class="pp"><select name="big" id="big"></select></td>
</tr>
<tr>
<td class="tt ct">所屬中分類</td>
<td class="pp"><select name="mid" id="mid"></select></td>
</tr>
<tr>
<td class="tt ct">商品編號</td>
<td class="pp">
<span id="noo">完成分類後自動分配</span>
<input type="hidden" name="no" id="no" >
</td>
</tr>
<tr>
<td class="tt ct">商品名稱</td>
<td class="pp"><input type="text" name="name" id="name"></td>
</tr>
<tr>
<td class="tt ct">商品價格</td>
<td class="pp"><input type="text" name="price" id="price"></td>
</tr>
<tr>
<td class="tt ct">規格</td>
<td class="pp"><input type="text" name="spec" id="spec"></td>
</tr>
<tr>
<td class="tt ct">庫存量</td>
<td class="pp"><input type="text" name="stock" id="stock"></td>
</tr>
<tr>
<td class="tt ct">商品圖片</td>
<td class="pp"><input type="file" name="img" id="img"></td>
</tr>
<tr>
<td class="tt ct">商品介紹</td>
<td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"></textarea></td>
</tr>
</table>
<div class="ct">
<input type="submit" value="新增">
<input type="reset" value="重置">
<input type="button" value="返回">
</div></form>


<script>
  getbigOption();
  function getbigOption(){
    $.get("api/get_big.php", function(options) {
      $("#big").html(options);
      //大選單執行後才跑取得中分類，先跑一次然後註冊事件，讓每一次大分類變動都會動態去取得中分類
        getmidOption();
        getno();
        $("#big").on("change",function(){
          getmidOption();
          getno();
        })
    })
  }

  function getmidOption(){
    //先取得大分類的值
    let bigid = $("#big").val();
    $.get("api/get_mid.php",{"bigid":bigid }, function(options) {
      $("#mid").html(options);
    })
  }

//取得商品編號
  function getno(){
    //將0.121546545648484的小數轉成字串，再從第二個位字往後取6碼
    let no =  Math.random().toString().substr(2,6);
    $("#noo").html(no); // span 給他數字
    $("#no").val(no);  // 表單隱藏欄位給他value
  }

</script>

