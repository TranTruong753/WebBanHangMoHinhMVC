<?php

class AjaxKhuyenMai extends controller{
    private $KhuyenMaiModel;

    public function __construct() {
        $this->KhuyenMaiModel = $this->model("KhuyenMaiModel");
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
        if($this->KhuyenMaiModel->KiemTraTonTaiQuaTen($TenKhuyenMai) == 1)
        {
            echo "-1";
        }else

        {
            if($this->KhuyenMaiModel->update($MaKhuyenMai,$TenKhuyenMai,$MucKhuyenMai) == 1)
            {
                echo "1";
            }else echo "0";
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
                <td><input type='checkbox' id='".$row["MaKhuyenMai"]."' onchange='DoiTrangThaiKhuyenMai(this)'/></td>
                <td>
                    <a href='http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaKhuyenMaiPage,".$row['MaKhuyenMai']."'>Sửa</a>
                    <a href=''>Xóa</a>
                    <a href=''>Chi Tiết</a>
                </td>
              </tr>";
            }
        }

        echo $html;



        
    }
}
?>