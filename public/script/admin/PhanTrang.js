function loadPhanTrang(tableName,index,size,condition="",key="")
  {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrang/getPhanTrang",
      type: "post",
      dataType: "html",
      data: {
        key:key,
        table: tableName,
        condition: condition,
        index: index,
        size: size
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }


    })
  }