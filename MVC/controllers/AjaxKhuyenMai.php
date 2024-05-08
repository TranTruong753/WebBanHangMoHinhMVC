<?php

class AjaxKhuyenMai extends controller{
    private $KhuyenMaiModel;
    private $ChiTietQuyenModel;
    public function __construct() {
        $this->KhuyenMaiModel = $this->model("KhuyenMaiModel");
        $this->ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
    }
    public function DoiTrangThai()
    {
        $ma = $_POST['ma'];
        $trangThai = $_POST['trangThai'];
        $this->KhuyenMaiModel->updateTrangThai($ma,$trangThai);
    }
    public function insert()
    {
        $TenKhuyenMai =  $_POST["TenKhuyenMai"];
        $MucKhuyenMai = $_POST["MucKhuyenMai"];
        if($this->KhuyenMaiModel->insert($TenKhuyenMai,$MucKhuyenMai))
        {
            echo "Thêm Dữ Liệu Thành Công!";
        }else echo "Thêm Dữ Liệu Thất Bại!";
    }

    
    public function update()
    {
        $MaKhuyenMai = $_POST["MaKhuyenMai"];
        $TenKhuyenMai =  $_POST["TenKhuyenMai"];
        $MucKhuyenMai = $_POST["MucKhuyenMai"];
        // if($this->KhuyenMaiModel->KiemTraTonTaiQuaTen($TenKhuyenMai) == 1)
        // {
        //     echo "-1";
        // }
       // else

        {
            if($this->KhuyenMaiModel->update($MaKhuyenMai,$TenKhuyenMai,$MucKhuyenMai) == 1)
            {
                echo "1";
            }else echo "0";
        }
       
    }
    public function delete()
    {
      //được xóa khi trang thái bằng 0 trong DB
        $ma = $_POST["ma"];
        if($this->KhuyenMaiModel->delete($ma)){
          echo 'Xóa tài khoản Thành Công!';
        }else{
          echo 'Xóa tài khoản Thất bại!';
        }
   
      }
    public function getDanhSach() {
        $key = $_POST["key"];
        $index = $_POST["index"];
        $size = $_POST["size"];
        $html = "";

        if($this->KhuyenMaiModel->getDanhSach($key,$index,$size)->num_rows > 0 )
        {
            $result =  $this->KhuyenMaiModel->getDanhSach($key,$index,$size);
            while($row = $result->fetch_assoc())
            {
                $html .= "<tr>
                <td>".$row["MaKhuyenMai"]."</td>
                <td>".$row["TenKhuyenMai"]."</td>
                <td>".$row["MucKhuyenMai"]."%</td>
                <td>
                <label class='switch'>
                <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
                  <input onchange='DoiTrangThaiKhuyenMai(this)' id='".$row['MaKhuyenMai']."' type='checkbox' value='1'";
                  if ($row["TrangThai"] == 1) {
                    $html .= "checked = 'checked'";
  
                  }
                  $html .=">
                  <span class='slider round'></span>
                </label>  
                </td>
                <td>";
                if($this->ChiTietQuyenModel->KiemTraHanhDong("Xóa",$_SESSION["MaNhomQuyen"],$_SESSION["Khuyến Mãi"])==1)
                {
                  $html.= " <a class = 'btn btn_delete' href='#' onclick='btnXoa(this)' id='".  $row["MaKhuyenMai"] ."'><i class='bx bx-x'></i></a>   ";
                }
                if($this->ChiTietQuyenModel->KiemTraHanhDong("Sửa",$_SESSION["MaNhomQuyen"],$_SESSION["Khuyến Mãi"])==1)
                {
                  $html.= "<a class = 'btn btn_fix' href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKhuyenMaiPage,".$row['MaKhuyenMai']."'><i class='bx bxs-edit'></i></a>";
                }
               
                    
                   $html.="
                </td>
              </tr>";
            }
        }

        echo $html;



        
    }
}
?>