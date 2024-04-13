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
        if($this->KhuyenMaiModel->update($MaKhuyenMai,$TenKhuyenMai,$MucKhuyenMai))
        {
            echo "Cập nhật Dữ Liệu Thành Công!";
        }else echo "Cập nhật Dữ Liệu Thất Bại!";

        
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
                <th style='text-align: center;' scope='row'>".$row["MaKhuyenMai"]."</th>
                <td style='text-align: center;'>".$row["TenKhuyenMai"]."</td>
                <td style='text-align: center;'>".$row["MucKhuyenMai"]."%</td>
                <td style='text-align: center;'><input type='checkbox' /></td>
                <td style='text-align: center;'><pre><a href=''>Sửa</a> |  <a href=''>Xóa</a> | <a href=''>Chi Tiết</a> </pre></td>
              </tr>";
            }
        }

        echo $html;



        
    }
}
?>