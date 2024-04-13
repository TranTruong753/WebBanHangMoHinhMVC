<div style="text-align: center;">
<h1 style=" margin-bottom: 20px;">Quản Lý Khuyến Mãi</h1>
</div>
<input type="button" id = "btnAdd" value="Thêm">

<table class="table">
<style></style>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Mức Khuyến Mãi</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row_table">

    
  </tbody>
</table>
<div class ="PhanTrang"></div>

<script>

var tmpKey = "";
var index  = 0 ;
var size = 0;
  
$(document).ready(function(){
loadTable("",1,4)
loadPhanTrang('khuyenmai',1,4);
})


function loadTable(key,index,size)
{
  $.ajax({
    url:"http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSach",
    type:"post",
    dataType: "html",
    data:{
      key:key,
      index:index,
      size:size
    },
    success:function(data){
      console.log(data)
      $(".row_table").html(data);
    }

  })
    
}

document.getElementById("btnAdd").onclick =function(){
window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemKhuyenMaiPage";
}
</script>